Rapport de la caisse principale (verssement aux institutions)
<table width="100%" border="0">
  <tr>
    <td width="18%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Quotidien (date)</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="Cais_rapport_date.php" method="post" name="form3" id="form3">
                  <?php
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                  &nbsp;
                  <input type="submit" name="valider3" id="valider3" value="Valider" />
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="25%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Mois ( dates)</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="Cais_rapport_mois.php" method="post" name="form1" id="form1">
              Mois: <font color="#000000">
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
                </font><font color="#000000">
                <select name="annee" size="1" id="annee">
                  <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                </select>
                </font>
                <input type="submit" name="valider4" id="valider5" value="Valider" />
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="21%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Annuel ( des mois)</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="Cais_rapport_annee.php" method="post" name="form2" id="form2">
              Année : <font color="#000000">
<select name="annee" size="1" id="annee">
  <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
</select>
&nbsp;&nbsp; </font>
              <input type="submit" name="valider5" id="valider7" value="Valider" />
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="33%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Trimestriel - Semestriel - Annuel</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="Cais_rapport_periode.php" method="post" name="form3" id="form5">
                  &nbsp;
                   <font color="#000000">
                   <select name="mois2" size="1" id="mois2">
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
                   <select name="mois3" size="1" id="mois3">
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
                   <select name="annee" size="1" id="annee">
                     <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                   </select>
                   </font>
<input type="submit" name="valider" id="valider" value="Valider" />
                </form></td>
              </tr>
            </table></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
