<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
	if(($_SESSION['u_niveau'] != 40) ) {
	header("location:index.php?error=false");
	exit;
 }
?>

<html>
<head>
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
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?
require("bienvenue.php"); // on appelle la page contenant la fonction
	$sqldate="SELECT * FROM $tbl_app_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">Ajouter une autorisation de depenses</h3>
            </div>
            <div class="panel-body">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="panel-body">
                <tr>
                  <td width="47%"><form name="form1" method="post" action="app_aut_save.php">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="32%">&nbsp;</td>
                        <td width="68%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="panel-title">Date</span></td>
                        <td><input name="date" type="text" id="date" value="<? echo $datecaisse['datecaisse'];?>" size="30" readonly /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Service demandeur</td>
                        <td><select name="service" id="service">
                          <option selected>Administratif</option>
                          <option>Commercial</option>
                          <option>Distribution</option>
                          <option>Production</option>
                          
                        </select></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Nature de la d&eacute;pense</td>
                        <td><input class="form-control"  name="Nature" type="text" id="Nature" value="" size="50"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="panel-title">Motif</span></td>
                        <td><input class="form-control" name="Motif" type="text" id="Motif" value="" size="50"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><p>&nbsp;</p></td>
                      </tr>
                      <tr>
                        <td><span class="panel-title">Montant</span></td>
                        <td><input class="form-control" name="Montant" type="text" id="Montant" value="" size="50"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                          <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>">
                        </font></strong></font></strong></font></td>
                        <td><input type="submit" name="Submit" value="Enregistrer" class="btn btn-primary" ></td>
                      </tr>
                    </table>
                  </form></td>
                  <td width="53%"><table width="100%" border="0">
                    <tr>
                      <td width="8%">&nbsp;</td>
                      <td width="81%"><div class="panel-body">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
                          <tr>
                            <td width="47%"><form action="app_aut_affichage.php" method="post" name="form2" id="form2">
                              <select name="service" id="service">
                                <option selected>Administratif</option>
                                <option>Commercial</option>
                                <option>Distribution</option>
                                <option>Production</option>
                              </select>
                              <font color="#000000">
                                <select name="mois" size="1" id="mois">
                                  <option value="1">Janvier</option>
                                  <option value="2">F&eacute;vrier</option>
                                  <option value="3">Mars</option>
                                  <option value="4">Avril</option>
                                  <option value="5">Mai</option>
                                  <option value="6">Juin</option>
                                  <option value="7">Juillet</option>
                                  <option value="8">Ao&ucirc;t</option>
                                  <option value="9">Septembre</option>
                                  <option value="10">Octobre</option>
                                  <option value="11">Novembre</option>
                                  <option value="12">D&eacute;cembre</option>
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
                              <input type="submit" name="valider4" id="valider5" value="Valider" />
                            </form></td>
                          </tr>
                        </table>
                      </div></td>
                      <td width="11%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                                        <tr>
                      <td>&nbsp;</td>
                      <td>Récapitulatif des mouvements entre 2 dates </td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><form action="app_aut_affichage_2date.php" method="post" name="form3" id="form3">
                        <?php
					  $myCalendar = new tc_calendar("date1", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?> 
                        <?php
					  $myCalendar = new tc_calendar("date2", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
<input type="submit" name="valider3" id="valider3" value="Valider" />
                      </form></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>Récapitulatif des mouvements entre 2 dates et le choix du service</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><form action="app_aut_affichage_2date_service.php" method="post" name="form3" id="form3">
                        <select name="service" id="service">
                          <option selected>Administratif</option>
                          <option>Commercial</option>
                          <option>Distribution</option>
                          <option>Production</option>
                        </select>
                        <?php
					  $myCalendar = new tc_calendar("date3", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?> 
                        <?php
					  $myCalendar = new tc_calendar("date4", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
<input type="submit" name="valider3" id="valider3" value="Valider" />
                      </form></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table>
            </div>
          </div>
<p><font size="2"><font size="2"><font size="2">
  <?php

mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");
  
$sql = "SELECT count(*) FROM $tbl_appaut ";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
 
$nb_total = mysql_fetch_array($resultat);  
 
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 

if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    

   $nb_affichage_par_page = 10; 
   

$sql = "SELECT * FROM $tbl_appaut  ORDER BY idapp_aut DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 

$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
  </font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font>
</p>
<form name="form2" method="post" action="produit_cancel.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#FFFFFF"> 
      <td width="52" bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
      <td width="123" bgcolor="#3071AA"><font color="#FFFFFF">Date</font></td>
      <td width="178" bgcolor="#3071AA" ><font color="#FFFFFF">Service</font></td>
      <td width="231" bgcolor="#3071AA" ><font color="#FFFFFF">Nature</font></td>
      <td width="281" bgcolor="#3071AA" ><font color="#FFFFFF">Motif</font></td>
      <td width="98" bgcolor="#3071AA" ><font color="#FFFFFF">Montant</font></td>
      <td width="78" bgcolor="#3071AA" >&nbsp;</td>
    </tr>
    <?php
while($data=mysql_fetch_array($req)){ 
?>
    <tr> 
      <td align="center" bgcolor="#FFFFFF"> <div align="left"><? echo $data['idapp_aut'];?></div>
        <div align="left"></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['date'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['service'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['Nature'];?></em></div></td>
      <td width="281"   style="background-color:#FFF;"><em><? echo $data['Motif'];?></em></td>
      <td width="98"   style="background-color:#FFF;"><? echo $data['Montant'];?></td>
      <td width="78"   style="background-color:#FFF;"><a href="app_aut_imp.php?id=<? echo md5(microtime()).$data['idapp_aut']; ?>"  style="margin:5px"   class="btn btn-xs btn-warning" target="_blank">IMPRIMER</a></td>
    </tr>
    <?php

}

mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
?>
  </table>
</form>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center"></div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
  </tr>
  <tr> 
    <td height="21"> 
      <?php
include_once('pied.php');
?>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();

	frmvalidator.addValidation("Nature","req","SVP entre un nombre");
	
	frmvalidator.addValidation("Motif","req","SVP entre un nombre");
	
	frmvalidator.addValidation("Montant","req","SVP entre un nombre");
	

</script>