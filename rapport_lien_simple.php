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
    <td><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Liste des ventes par date &amp; agent</h3>
        </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="rapport_listedateagent.php" method="post" name="form3" id="form5">
                  <?php
					  $myCalendar = new tc_calendar("dateB", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                  &nbsp;<font color="#000000"><strong>
                    <select name="agentv" id="agentv">
                      <?php
$sql8 = ("SELECT * FROM $tbl_paiement where id_nom= '$id_nom' GROUP BY  id_nom ORDER BY id_nom ASC ");
$result8 = mysql_query($sql8);

while ($row8 = mysql_fetch_assoc($result8)) {
echo '<option> '.$row8['id_nom'].' </option>';
}

?>
                      </select>
                    </strong></font>
  <input type="submit" name="valider2" id="valider2" value="Valider" />
                  </form></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Activité par Date &amp; Agent </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="rapport_agent.php" method="post" name="form2" id="form6">
              <?php
					  $myCalendar = new tc_calendar("datec", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
              <font color="#000000"><strong>
                <select name="agent" id="agent">
                  <?php
$sql8 = ("SELECT * FROM $tbl_paiement where id_nom= '$id_nom' GROUP BY  id_nom ORDER BY id_nom ASC ");
$result8 = mysql_query($sql8);

while ($row8 = mysql_fetch_assoc($result8)) {
echo '<option> '.$row8['id_nom'].' </option>';
}

?>
                </select>
                </strong>&nbsp;&nbsp; </font>
              <input type="submit" name="valider6" id="valider4" value="Valider" />
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td>&nbsp;</td>
    <td><div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title">&nbsp;</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><a href="paiement_doublon.php" class="btn btn-sm btn-success" >SCAN THE DUPLICATES</a>|</td>
          </tr>
        </table>
      </div>
    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>
