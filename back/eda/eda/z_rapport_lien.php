<table width="100%" border="0">
  <tr>
    <td width="19%"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"> Activité par date</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="z_rapport_date.php" method="post" name="form3" id="form3">
                  <?php
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1A, $annee2A);
					  $myCalendar->dateAllow($date1A,$date2A);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                  &nbsp;
                  <input type="submit" name="valider3" id="valider3" value="Valider"  class="btn btn-warning"  />
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="26%"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Activité par mois </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="z_rapport_mois.php" method="post" name="form1" id="form1">
              Mois : <font color="#000000">
                <select name="mois" size="1" id="mois">
                  <option value="1">Janvier</option>
                  <option value="2">Février</option>
                  <option value="3">Mars</option>
                  <option value="4">Avril</option>
                  <option value="5">Mai</option>
                  <option value="6">Juin</option>
                  <option value="7">Juillet</option>
                  <option value="8">Août</option>
                  <option value="9">Septembre</option>
                  <option value="10">Octobre</option>
                  <option value="11">Novembre</option>
                  <option value="12">Décembre</option>
                </select>
                </font> <font color="#000000">
                  <select name="annee" size="1" id="annee">
                    <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                  </select>
                  </font>
              <input type="submit" name="valider4" id="valider5" value="Valider" class="btn btn-warning"/>
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="2%">&nbsp;</td>
    <td width="22%"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"> Activité par secteur sans Gaz</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="z_rapport_datesecteur.php" method="post" name="form3" id="form6">
                  <?php
					  $myCalendar = new tc_calendar("dated", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1A, $annee2A);
					  $myCalendar->dateAllow($date1A,$date2A);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                  &nbsp;
                  <input type="submit" name="valider6" id="valider4" value="Valider" class="btn btn-warning"/>
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="29%"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Activité par Date &amp; Agent </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="z_rapport_agent.php" method="post" name="form2" id="form2">
              <?php
					  $myCalendar = new tc_calendar("datec", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1A, $annee2A);
					  $myCalendar->dateAllow($date1A,$date2A);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
              <font color="#000000"><strong>
                <select name="agent" id="agent">
                  <?php
$sql8 = ("SELECT * FROM $tbl_paiement GROUP BY  id_nom ORDER BY id_nom ASC ");
$result8 = mysqli_query($linki,$sql8);

while ($row8 = mysqli_fetch_assoc($result8)) {
echo '<option> '.$row8['id_nom'].' </option>';
}

?>
                </select>
                </strong>&nbsp;&nbsp; </font>
              <input type="submit" name="valider5" id="valider9" value="Valider"  class="btn btn-warning"/>
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="77"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"> Activité par date &amp; agent</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="z_rapport_dateagent.php" method="post" name="form3" id="form4">
                  <?php
					  $myCalendar = new tc_calendar("dateA", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1A, $annee2A);
					  $myCalendar->dateAllow($date1A,$date2A);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                  &nbsp;
                  <input type="submit" name="valider" id="valider" value="Valider" class="btn btn-warning" />
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td>&nbsp;</td>
    <td><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Recouvrement ORTC /</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="z_rapport_mois_ortc.php" method="post" name="form1" id="form8">
              Mois : <font color="#000000">
                <select name="mois" size="1" id="mois">
                  <option value="1">Janvier</option>
                  <option value="2">Février</option>
                  <option value="3">Mars</option>
                  <option value="4">Avril</option>
                  <option value="5">Mai</option>
                  <option value="6">Juin</option>
                  <option value="7">Juillet</option>
                  <option value="8">Août</option>
                  <option value="9">Septembre</option>
                  <option value="10">Octobre</option>
                  <option value="11">Novembre</option>
                  <option value="12">Décembre</option>
                </select>
                </font> <font color="#000000">
                  <select name="annee" size="1" id="annee">
                    <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                  </select>
                  </font>
              <input type="submit" name="valider8" id="valider7" value="Valider" class="btn btn-warning"/>
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td>&nbsp;</td>
    <td><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Détail par Date</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="z_rapport_dateautre.php" method="post" name="form3" id="form7">
                  <?php
					  $myCalendar = new tc_calendar("datef", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1A, $annee2A);
					  $myCalendar->dateAllow($date1A,$date2A);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                  &nbsp;
                  <input type="submit" name="valider7" id="valider6" value="Valider" class="btn btn-warning" />
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td>&nbsp;</td>
    <td><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"> Liste des ventes par date &amp; agent</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" height="36" border="0.5" cellpadding="0" cellspacing="0">
              <tr>
                <td width="52%"><form action="z_rapport_listedateagent.php" method="post" name="form3" id="form5">
                  <?php
					  $myCalendar = new tc_calendar("dateB", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1A, $annee2A);
					  $myCalendar->dateAllow($date1A,$date2A);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                  &nbsp;<font color="#000000"><strong>
                  <select name="agentv" id="agentv">
                    <?php
$sql8 = ("SELECT * FROM $tbl_paiement GROUP BY  id_nom ORDER BY id_nom ASC ");
$result8 = mysqli_query($linki,$sql8);

while ($row8 = mysqli_fetch_assoc($result8)) {
echo '<option> '.$row8['id_nom'].' </option>';
}

?>
                  </select>
                  </strong></font>
<input type="submit" name="valider2" id="valider2" value="Valider" class="btn btn-warning" />
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
