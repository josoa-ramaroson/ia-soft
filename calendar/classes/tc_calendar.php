<?php
require_once('tc_date.php');

class tc_calendar {
    protected $mydate;
    protected $icon;
    protected $objname;
    protected $txt = "Select";
    protected $date_format = 'd-M-Y';
    protected $year_display_from_current = 30;

    var $day = 00;
    var $month = 00;
    var $year = 0000;
    var $width = 150;
    var $height = 205;
    var $year_start;
    var $year_end;
    var $year_start_input;
    var $year_end_input;
    var $startDate = 0;
    var $time_allow1 = false;
    var $time_allow2 = false;
    var $show_not_allow = false;
    var $auto_submit = false;
    var $form_container;
    var $target_url;
    var $show_input = true;
    var $date_picker = false;
    var $zindex = 1;
    var $path = '';
	var $h_align = "left";
	var $v_align = "center";
    public function __construct($objname, $date_picker = false, $show_input = true) {
        $this->objname = $objname;
        $this->date_picker = $date_picker;
        $this->show_input = $show_input;

        $this->mydate = new tc_date();

        $thisyear = date('Y');
        $this->year_start = $thisyear - $this->year_display_from_current;
        $this->year_end = $thisyear + $this->year_display_from_current;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }

    public function setPath($path) {
        $last_char = substr($path, strlen($path)-1, strlen($path));
        if($last_char != "/") $path .= "/";
        $this->path = $path;
    }

    public function setDate($day, $month, $year) {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function setDateFormat($format) {
        $this->date_format = $format;
    }

    public function setTimestamp($timestamp) {
        if($timestamp) {
            $this->day = date('d', $timestamp);
            $this->month = date('m', $timestamp);
            $this->year = date('Y', $timestamp);
        }
    }

    public function setYearInterval($start, $end) {
        if($start < $end) {
            $this->year_start = $start;
            $this->year_end = $end;
        } else {
            $this->year_start = $end;
            $this->year_end = $start;
        }

        $this->year_start_input = $start;
        $this->year_end_input = $end;
    }

    public function setAlignment($h_align, $v_align) {
        $this->h_align = $h_align;
        $this->v_align = $v_align;
    }

    public function dateAllow($from = "", $to = "", $show_not_allow = true) {
        if (!$this->mydate) {
            $this->mydate = new tc_date();
        }

        $time_from = ($from) ? $this->mydate->getTimestamp($from) : 0;
        $time_to = ($to) ? $this->mydate->getTimestamp($to) : 0;

        if ($time_from === false) $time_from = 0;
        if ($time_to === false) $time_to = 0;

        if (version_compare(PHP_VERSION, '5.1.0') < 0) {
            if ($time_from == -1) $time_from = 0;
            if ($time_to == -1) $time_to = 0;
        }

        if ($time_from > 0 && $time_to > 0 && $time_from > $time_to) {
            $tmp = $time_from;
            $time_from = $time_to;
            $time_to = $tmp;
        }

        $this->time_allow1 = $time_from;
        $this->time_allow2 = $time_to;

        if ($time_from > 0) {
            $y = date('Y', $time_from);
            if ($this->year_start && $y > $this->year_start) {
                $this->year_start = $y;
            }
        }

        if ($time_to > 0) {
            $y = date('Y', $time_to);
            if ($this->year_end && $y < $this->year_end) {
                $this->year_end = $y;
            }
        }

        $this->show_not_allow = $show_not_allow;
    }

    public function writeScript() {
        if (!$this->mydate) {
            $this->mydate = new tc_date();
        }

        if (!$this->checkDefaultDateValid()) {
            $this->setDate(00, 00, 0000);
        }

        $this->writeHidden();

        if ($this->date_picker) {
            echo "<div style='position:relative; z-index:{$this->zindex}; float:left;' id='container_{$this->objname}'>";

            if ($this->show_input) {
                $this->writeDay();
                $this->writeMonth();
                $this->writeYear();
            }

            echo "<a href='javascript:void(0);' onclick='toggleCalendar(\"{$this->objname}\")'>";
            if (is_file($this->icon)) {
                echo "<img src='{$this->icon}' id='tcbtn_{$this->objname}' name='tcbtn_{$this->objname}' border='0' align='absmiddle' />";
            } else {
                echo $this->txt;
            }
            echo "</a>";

            $this->writeCalendarContainer();
            echo "</div>";
        } else {
            $this->writeCalendarContainer();
        }
    }

    protected function writeHidden() {
        echo "<input type='hidden' name='{$this->objname}' id='{$this->objname}' value='' />";
    }

    protected function writeDay() {
        echo "<select name='{$this->objname}_day' id='{$this->objname}_day' class='tcday'>";
        echo "<option value='00'>Day</option>";
        for($i=1; $i<=31; $i++) {
            $selected = ($this->day == $i) ? " selected" : "";
            echo "<option value='".str_pad($i, 2, "0", STR_PAD_LEFT)."'$selected>$i</option>";
        }
        echo "</select>";
    }

    protected function writeMonth() {
        echo "<select name='{$this->objname}_month' id='{$this->objname}_month' class='tcmonth'>";
        echo "<option value='00'>Month</option>";
        $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        for($i=1; $i<=12; $i++) {
            $selected = ($this->month == $i) ? " selected" : "";
            echo "<option value='".str_pad($i, 2, "0", STR_PAD_LEFT)."'$selected>".$months[$i-1]."</option>";
        }
        echo "</select>";
    }

    protected function writeYear() {
        echo "<select name='{$this->objname}_year' id='{$this->objname}_year' class='tcyear'>";
        echo "<option value='0000'>Year</option>";
        for($i=$this->year_start; $i<=$this->year_end; $i++) {
            $selected = ($this->year == $i) ? " selected" : "";
            echo "<option value='$i'$selected>$i</option>";
        }
        echo "</select>";
    }

    protected function writeCalendarContainer() {
        echo "<div id='calendar_{$this->objname}' class='calendar'></div>";
    }

    protected function checkDefaultDateValid() {
        if (!$this->mydate) {
            return false;
        }

        if($this->year == 0 || $this->month == 0 || $this->day == 0) {
            return false;
        }

        $date_str = $this->year . "-" . $this->month . "-" . $this->day;
        return $this->mydate->validDate($date_str);
    }
}
?>