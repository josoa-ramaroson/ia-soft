<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<script language="javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="js/validator.js"></script>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Choix de la Matricule :</h3>
  </div>
  <div class="panel-body">
    <form id="recherche-societe" name="recherche-societe" method="post" action="svi_facturation.php">
      <table width="100%" border="0">
        <tr>
          <td width="9%"><strong><font size="2">Matricule</font></strong></td>
          <td width="32%"><strong>
            <select name="idau" id="idau">
              <?php
$idau=0;
$id=0;

require 'configuration.php';

$sql5="SELECT matricule , idau FROM $tbl_automobile  ORDER BY matricule ASC";
$result5 = mysql_query($sql5);
while ($row5 = mysql_fetch_assoc($result5)) {
echo '<option value='.$row5['idau'].'>'.$row5['matricule'].'</option>';
}
$idau=$_POST['idau'];
$sql4 = "SELECT * FROM $tbl_automobile  where idau='$idau'";
$result4 = mysql_query($sql4);
while ($row4 = mysql_fetch_assoc($result4)) {
$id=$row4['id'];
}  
?>
            </select>
          </strong></td>
          <td width="7%"><strong>
            <input type="submit" name="Valider" id="envoyer" value="Chercher " />
          </strong></td>
          <td width="52%">&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php
//$id=$_GET['id'];
//$idau=$_GET['idau'];

$sqlm="SELECT  co.Designation as coDesignation, co.nomprenom as conomprenom, co.surnom as cosurnom, co.email as coemail, co.titre as cotitre, co.tel as cotel, co.fax as cofax, co.url as courl,  co.id ,  au.id as auid, au.idau as auidau,

 co.quartier as coquartier, co.ville as coville, co.ile as coile , 

au.matricule as  aumatricule, au.marque as aumarque, au.modèle as aumodèle, au.annee as auannee, au.cylindre as aucylindre, au.utilisation as auutilisation , au.statut as austatut

 FROM $tbl_contact co , $tbl_automobile au WHERE au.id='$id' and au.idau='$idau' and au.id=co.id";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);

	// affichage des transport
	 $sqact="SELECT * FROM $tbl_automobile WHERE id='$id'";
	 $resultact=mysql_query($sqact);
	 
	 	 
	$sqfac="SELECT * FROM $tbl_fact WHERE id='$id' and idso='$idau' ORDER BY idf desc";
	$resultfac=mysql_query($sqfac);
	 
?>
<table width="100%" border="0" align="center">
                  <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information de l'activité </font></strong></div></td>
        </tr>
  <tr>
    <td height="84"><form action="re_enregistrement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
           

           <tr>
                  <td width="11%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="1%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="35%" bgcolor="#FFFFFF"><strong>Information de la personne</strong></td>
                  <td width="1%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="14%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="38%" bgcolor="#FFFFFF"><strong>Information de l'activite </strong></td>
          </tr>
        <tr>
          <td>SIDCLIENT</td>
          <td>&nbsp;</td>
          <td><strong>
            <? echo $datam['auid'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td>SIDTransport</td>
          <td><strong><? echo $datam['auidau'];?></strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['conomprenom'];?></td>
          <td>&nbsp;</td>
          <td><strong>
            <label for="checkbox_row_4">Matricule</label>
          </strong></td>
          <td><strong>
           <? echo $datam['aumatricule'];?>
          </strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<form id="formfacture" name="formfacture" method="post" action="sovi_facturation_save.php">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#0794F0">
    <td width="100%" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Facturation </font></strong></div></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4%">Date :</td>
    <td width="12%"><?php
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1, $date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
    <td width="2%">&nbsp;</td>
    <td width="6%">Libelle</td>
    <td width="14%"><select name="libelle" id="libelle">
      <?php
$sql2 = ("SELECT *  FROM $tbl_libelle where categorie='Ti' ORDER BY libelle  ASC ");
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
echo '<option> '.$row2['libelle'].' </option>';
}

?>
    </select></td>
    <td width="2%">&nbsp;</td>
    <td width="7%">Montant</td>
    <td width="12%"><strong>
      <input class="form-control" name="montant" type="text" id="montant" size="20" />
    </strong></td>
    <td width="1%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="22%"><input type="submit" name="button" id="button" value="Enregistre le montant " />
      <input name="id" type="hidden" value="<? echo $datam['auid']; ?>" />
      <input name="idso" type="hidden" value="<? echo $datam['auidau']; ?>" />
      <input name="st" type="hidden" value="Ti" />
      <input name="stlib" type="hidden" value="<? echo $datam['aumatricule']; ?>" />
      <font size="2"><strong><font size="2"><strong><font color="#FF0000">
      <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
      </font></strong></font></strong></font></td>
  </tr>
</table>
</form>






<p>&nbsp;</p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Facturation </h3>
  </div>
</div>
<form id="formfacture2" name="formfacture" method="post" action="sovi2_facturation_save.php">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="6%"><strong>
        <label for="checkbox_row_2">Matricule</label>
      </strong></td>
      <td width="12%"><strong>
        <input name="stlib" type="text" class="form-control" id="stlib" size="20" />
      </strong></td>
      <td width="2%">&nbsp;</td>
      <td width="6%">Date :</td>
      <td width="12%"><?php
					  $myCalendar = new tc_calendar("date1", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(2014, 2016);
					  $myCalendar->dateAllow('2014-11-28', '2016-12-31');
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
      <td width="2%">&nbsp;</td>
      <td width="7%">Libelle</td>
      <td width="12%"><select name="libelle" id="libelle">
        <?php
$sql2 = ("SELECT *  FROM $tbl_libelle where categorie='Ti' ORDER BY libelle  ASC ");
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
echo '<option> '.$row2['libelle'].' </option>';
}

?>
      </select></td>
      <td width="1%">&nbsp;</td>
      <td width="5%">Montant</td>
      <td width="12%"><strong>
        <input class="form-control" name="montant" type="text" id="montant" size="20" />
      </strong></td>
      <td width="1%">&nbsp;</td>
      <td width="22%"><input type="submit" name="button2" id="button2" value="Enregistre le montant " />
        <input name="st" type="hidden" id="st" value="Ti" />
        <font size="2"><strong><font size="2"><strong><font color="#FF0000">
          <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
        </font></strong></font></strong></font></td>
    </tr>
  </table>
</form>
<p></p>
<p>&nbsp;</p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("formfacture");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("montant","req","SVP entre un nombre");
	frmvalidator.addValidation("montant","num","Allow numbers only ");
	
</script>