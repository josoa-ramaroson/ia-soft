<?php 
$annee1 = "2018";
$annee2 = "2024";
$startDate = DateTime::createFromFormat('Y-m-d', '2018-01-01');
$endDate = DateTime::createFromFormat('Y-m-d', '2024-12-31');
$date3 = "2015-07-01";
$annee = '2024';
$annee_facturation = '2024';
$annee_recouvrement = '2024';
require "session.php";
require_once 'calendar/classes/tc_calendar.php';
require 'fonction.php';
?>
<table width="100%" border="0">
  <tr>
    <td width="27%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="39%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td width="22%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr>
    <td>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Liste des ventes par date &amp; agent</h3>
        </div>
        <div class="panel-body">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td width="47%">
                <table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%">
                      <form action="rapport_listedateagent.php" method="post" name="form3" id="form5">
                        <?php
                        try {
                          $myCalendar = new tc_calendar("dateB", true, false);
                          $myCalendar->setIcon("calendar/images/iconCalendar.gif");
                          $myCalendar->setPath("calendar/");
                          $myCalendar->setYearInterval($annee1, $annee2);
                          $myCalendar->dateAllow($startDate->format('Y-m-d'), $endDate->format('Y-m-d'));
                          $myCalendar->setDateFormat('j F Y');
                          $myCalendar->setAlignment('left', 'bottom');
                          $myCalendar->writeScript();
                        } catch (Exception $e) {
                          echo "Calendar error: " . $e->getMessage();
                        }
                        ?>
                        <font color="#000000">
                          <strong>
                            <select name="agentv" id="agentv">
                              <?php
                              $sql8 = "SELECT DISTINCT * FROM $tbl_paiement WHERE id_nom = '$id_nom'  ORDER BY id_nom ASC";
                              $result8 = mysqli_query($linki, $sql8);
                              if ($result8) {
                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                  echo '<option value="' . htmlspecialchars($row8['id_nom']) . '">' . 
                                       htmlspecialchars($row8['id_nom']) . '</option>';
                                }
                              }
                              ?>
                            </select>
                          </strong>
                        </font>
                        <input type="submit" name="valider2" id="valider2" value="Valider" />
                      </form>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Activité par Date &amp; Agent</h3>
        </div>
        <div class="panel-body">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td width="47%">
                <form action="rapport_agent.php" method="post" name="form2" id="form6">
                  <?php
                  try {
                    $myCalendar = new tc_calendar("datec", true, false);
                    // $myCalendar->setIcon("calendar/images/iconCalendar.gif");
                    // $myCalendar->setPath("calendar/");
                    // $myCalendar->setYearInterval($annee1, $annee2);
                    // //$myCalendar->dateAllow($startDate->format('Y-m-d'), $endDate->format('Y-m-d'));
                    // $myCalendar->setDateFormat('j F Y');
                    // $myCalendar->setAlignment('left', 'bottom');
                    // $myCalendar->writeScript();
                    var_dump($myCalendar);
                  } catch (Exception $e) {
                    echo "Calendar error: " . $e->getMessage();
                  }
                  ?>
                  <font color="#000000">
                    <strong>
                      <select name="agent" id="agent">
                        <?php
                        $sql8 = "SELECT DISTINCT * FROM $tbl_paiement WHERE id_nom = '$id_nom' ORDER BY id_nom ASC";
                        $result8 = mysqli_query($linki, $sql8);
                        if ($result8) {
                          while ($row8 = mysqli_fetch_assoc($result8)) {
                            echo '<option value="' . htmlspecialchars($row8['id_nom']) . '">' . 
                                 htmlspecialchars($row8['id_nom']) . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </strong>
                  </font>
                  <input type="submit" name="valider6" id="valider4" value="Valider" />
                </form>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </td>
    <td>&nbsp;</td>
    <td>
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">&nbsp;</h3>
        </div>
        <div class="panel-body">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td width="47%">
                <a href="paiement_doublon.php" class="btn btn-sm btn-success">SCAN THE DUPLICATES</a>|
              </td>
            </tr>
          </table>
        </div>
      </div>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>