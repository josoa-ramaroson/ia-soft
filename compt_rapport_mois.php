<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
	if((($_SESSION['u_niveau'] != 20) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.centrevaleur {
	text-align: center;
}
.centrevaleur td {
	text-align: center;
}
.taille16 {	font-size: 16px;
}
</style>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">RAPPORTS PAR MOIS </h3>
    </div>
  <div class="panel-body">
    <table width="100%" border="0">
      <tr>
        <td width="29%"><div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><strong><em>TVA </em></strong></h3>
          </div>
          <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%"><form name="form1" method="post" action="compt_rapport_tva_m.php">
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
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
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
        <td width="4%">&nbsp;</td>
        <td width="33%"><div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><em><strong>Journal General</strong></em></h3>
          </div>
          <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%"><form name="form1" method="post" action="compt_rapport_general_m.php">
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
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                      </select>
                      </font>
                      <input type="submit" name="valider3" id="valider3" value="Valider" />
                    </form></td>
                  </tr>
                </table></td>
              </tr>
            </table>
          </div>
        </div></td>
        <td width="4%">&nbsp;</td>
        <td width="30%"><div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><em><strong>Grand Livre</strong></em></h3>
          </div>
          <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%"><form name="form1" method="post" action="compt_rapport_livred_m.php">
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
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                      </select>
                      </font>
                      <input type="submit" name="valider2" id="valider2" value="Valider" />
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
      </tr>
      <tr>
        <td><div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><strong><em>Compte de resultat</em></strong></h3>
          </div>
          <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%"><form name="form1" method="post" action="compt_rapport_resultat_m.php">
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
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                      </select>
                      </font>
                      <input type="submit" name="valider4" id="valider4" value="Valider" />
                    </form></td>
                  </tr>
                </table></td>
              </tr>
            </table>
          </div>
        </div></td>
        <td>&nbsp;</td>
        <td><div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><strong><em>Bilan </em></strong></h3>
          </div>
          <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%"><form name="form1" method="post" action="compt_rapport_livrer_m.php">
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
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                      </select>
                      </font>
                      <input type="submit" name="valider5" id="valider5" value="Valider" />
                    </form></td>
                  </tr>
                </table></td>
              </tr>
            </table>
          </div>
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>