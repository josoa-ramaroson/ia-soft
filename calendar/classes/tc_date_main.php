<?php
//*************************************
// Date handling class for tc_calendar
// for php version lower than 5.3.0
// written by TJ @triconsole
// Modified to fix deprecated parameter order
//*************************************

class tc_date_main {
    var $mydate;

    function tc_date_main() {
        $this->mydate = strtotime(date('Y-m-d'));
    }

    function getDayOfWeek($cdate = "") {
        if (($cdate != "" && $this->validDate($cdate)) || $cdate == "") {
            $tmp_date = ($cdate != "") ? strtotime($cdate) : $this->mydate;
            return date('w', $tmp_date);
        }
    }

    function getWeekNumber($cdate = "") {
        if (($cdate != "" && $this->validDate($cdate)) || $cdate == "") {
            $tmp_date = ($cdate != "") ? strtotime($cdate) : $this->mydate;
            return date('W', $tmp_date);
        }
    }

    function setDate($sdate) {
        if ($this->validDate($sdate)) {
            $this->mydate = strtotime($sdate);
        }
    }

    function getDate($format = "Y-m-d", $cdate = "") {
        if (($cdate != "" && $this->validDate($cdate)) || $cdate == "") {
            $tmp_date = ($cdate != "") ? strtotime($cdate) : $this->mydate;
            return date($format, $tmp_date);
        } else {
            return "";
        }
    }

    function setTimestamp($stime) {
        $this->mydate = $stime;
    }

    function getTimestamp($cdate = "") {
        if (($cdate != "" && $this->validDate($cdate)) || $cdate == "") {
            $tmp_date = ($cdate != "") ? strtotime($cdate) : $this->mydate;
            return $tmp_date;
        } else {
            return 0;
        }
    }

    function getDateFromTimestamp($stime, $format = "Y-m-d") {
        if ($stime && $stime > 0) {
            return date($format, $stime);
        } else {
            return "0000-00-00";
        }
    }

    // Correction des signatures avec paramètres optionnels
    function addDay($timespan, $format = "Y-m-d", $cdate = "") {
        if (($cdate != "" && $this->validDate($cdate)) || $cdate == "") {
            $tmp_date = ($cdate != "") ? strtotime($cdate) : $this->mydate;
            return date($format, mktime(0, 0, 0,
                date('m', $tmp_date),
                (date('d', $tmp_date) + $timespan),
                date('Y', $tmp_date)
            ));
        } else {
            return "0000-00-00";
        }
    }

    function addMonth($timespan, $format = "Y-m-d", $cdate = "") {
        if (($cdate != "" && $this->validDate($cdate)) || $cdate == "") {
            $tmp_date = ($cdate != "") ? strtotime($cdate) : $this->mydate;
            return date($format, mktime(0, 0, 0,
                (date('m', $tmp_date) + $timespan),
                date('d', $tmp_date),
                date('Y', $tmp_date)
            ));
        } else {
            return "0000-00-00";
        }
    }

    function addYear($timespan, $format = "Y-m-d", $cdate = "") {
        if (($cdate != "" && $this->validDate($cdate)) || $cdate == "") {
            $tmp_date = ($cdate != "") ? strtotime($cdate) : $this->mydate;
            return date($format, mktime(0, 0, 0,
                date('m', $tmp_date),
                date('d', $tmp_date),
                (date('Y', $tmp_date) + $timespan)
            ));
        } else {
            return "0000-00-00";
        }
    }

    //return the number of day different between date1 and date2
    //if date1 omitted use set date
    function differentDate($date2, $date1 = "") {
        if ($this->validDate($date2)) {
            $date1 = ($date1 != "") ? strtotime($date1) : $this->mydate;
            $date_diff = $date1 - strtotime($date2);
            return abs($date_diff);
        } else {
            return false;
        }
    }

    //check if date1 is before date2
    //if date1 omitted use set date
    function dateBefore($date2, $date1 = "", $equal = true) {
        if ($this->validDate($date2)) {
            $date1 = ($date1 != "") ? strtotime($date1) : $this->mydate;
            $date2 = strtotime($date2);
            return ($equal) ? $date1 <= $date2 : $date1 < $date2;
        } else {
            return false;
        }
    }

    //check if date1 is after date2
    //if date1 omitted use set date
    function dateAfter($date2, $date1 = "", $equal = true) {
        if ($this->validDate($date2)) {
            $date1 = ($date1 != "") ? strtotime($date1) : $this->mydate;
            $date2 = strtotime($date2);
            return ($equal) ? $date1 >= $date2 : $date1 > $date2;
        } else {
            return false;
        }
    }

    function validDate($date_str) {
        if ($date_str != "") {
            $date_arr = explode("-", $date_str, 3);

            if (count($date_arr) == 3) {
                // Validation améliorée pour s'assurer que les composants sont numériques
                $year = intval($date_arr[0]);
                $month = intval($date_arr[1]);
                $day = intval($date_arr[2]);

                return checkdate($month, $day, $year);
            }
        }
        return false;
    }
}
?>