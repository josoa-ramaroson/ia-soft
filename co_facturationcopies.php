<?
require 'session.php';
?>
<?php
require_once('calendar/classes/tc_calendar.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="js/validator.js"></script>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Choix du client:</h3>
  </div>
  <div class="panel-body">
    <form id="recherche-societe" name="recherche-societe" method="post" action="co_facturation.php">
      <table width="100%" border="0">
        <tr>
          <td width="9%"><strong><font size="2">Raison sociale</font></strong></td>
          <td width="32%"><strong>
            <select name="id" id="id">
              <?php
$id=0;
require 'fonction.php';
require 'configuration.php';

$sql5="SELECT * FROM $tbl_contact where id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec') ORDER BY id ASC";
$result5 = mysql_query($sql5);
while ($row5 = mysql_fetch_assoc($result5)) {
echo '<option value='.$row5['id'].'>'.$row5['id'].'</option>';
}
$id=$_POST['id'];
$sql4 = "SELECT * FROM $tbl_contact where id='$id'";
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
          <td width="52%"><?php
//echo $iden;
//echo $id;
$sqlm="SELECT * FROM $tbl_contact WHERE id='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);

	//affichage des facturations
	$sqfac="SELECT * FROM $tbl_fact WHERE id='$id' and idso='$id' and id!='0' and id!='0' and  st='S' ORDER BY idf desc";
	$resultfac=mysql_query($sqfac);
	
	//recherche du repport 
	$sqlp = "SELECT * FROM $tbl_paiement WHERE id='$id' and idso='$id' and st='S' ORDER BY idp desc limit 0,1";  
	$resultp=mysql_query($sqlp);
	$datap=mysql_fetch_array($resultp);
	 
?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<table width="100%" border="0" align="center">
                  <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information du client &amp; du compteur </font></strong></div></td>
  </tr>
  <tr>
    <td height="320"><form action="re_enregistrement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
           

           <tr>
                  <td width="11%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="1%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="35%" bgcolor="#FFFFFF"><strong>Information de la personne</strong></td>
                  <td width="1%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="14%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="38%" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        <tr>
          <td>IDCLIENT</td>
          <td>&nbsp;</td>
          <td><strong>
            <? echo $datam['id'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td>Police </td>
          <td><strong><? echo $datam['Police'];?></strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Designation</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
           <? echo $datam['Designation'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font color="#000000" size="2">Reference géographique</font></strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['nomprenom'];?>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Réference </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Email</font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['email'];?>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Type compteur</font></strong></td>
          <td><strong>
            <? echo $datam['typecompteur'];?>
          </strong></td>
        </tr>
        <tr>
          <td><strong>Titre </strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <? echo $datam['titre'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">N° Phase</font></strong></td>
          <td><strong>
		   <? echo $datam['phase'];?>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <? echo $datam['tel'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong>Puissance</strong></td>
          <td><strong>
			<? echo $datam['puissance'];?>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Fax</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <? echo $datam['fax'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Calibre ( Amperage)</font></strong></td>
          <td><strong>
			<? echo $datam['amperage'];?>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Site Web</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <? echo $datam['url'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Numero Compteur</font></strong></td>
          <td><strong>
			<? echo $datam['ncompteur'];?>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Ville</font></strong></td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['ville'];?></strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Date de pose </font></strong></td>
          <td><strong><font size="2">
			<? echo $datam['datepose'];?>
          </font></strong></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><strong><? echo $datam['quartier'];?></strong></td>
          <td>&nbsp;</td>
          <td>Statut</td>
          <td><strong>
            <? echo $datam['statut'];?>
          </strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<form id="formfacture" name="formfacture" method="post" action="sov_facturation_save.php">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#0794F0">
    <td width="100%" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Facturation </font></strong></div></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="3%">Date :</td>
    <td width="9%"><?php
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(2014, 2016);
					  $myCalendar->dateAllow('2014-11-28', '2016-12-31');
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
    <td width="1%">&nbsp;</td>
    <td width="10%">Ancien Index</td>
    <td width="11%"><strong>
      <input name="libelle" type="text" class="form-control" id="libelle" size="20" readonly="readonly" />
    </strong></td>
    <td width="2%">&nbsp;</td>
    <td width="9%">Nouveau Index</td>
    <td width="11%"><strong>
      <input class="form-control" name="montant" type="text" id="montant" size="20" />
    </strong></td>
    <td width align="center">Impayée</td>
    <td width="14%"><strong>
      <input name="impayee" type="text" class="form-control" id="impayee" value="<? 
	 	  if(!isset($datap['report'])|| empty($datap['report'])){ echo 0;} else { echo $datap['report'];} ?>" size="20" readonly="readonly" />
    </strong></td>
    <td width="1%">&nbsp;</td>
    <td width="21%"><input type="submit" name="button" id="button" value="Enregistre le montant " />
      <input name="id" type="hidden" value="<? echo $datam['acid']; ?>" />
      <input name="idso" type="hidden" value="<? echo $datam['aciden']; ?>" />
      <input name="st" type="hidden" value="S" />
      <input name="stlib" type="hidden" value="<? echo $datam['acraisonsociale']; ?>" />
      <font size="2"><strong><font size="2"><strong><font color="#FF0000">
      <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
      </font></strong></font></strong></font></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#0794F0">
    <td width="100%" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Historique des facturations </font></strong></div></td>
  </tr>
</table>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0794F0">
    <td width="6%" align="center" bgcolor="#FFFFFF"><font color="#000000">ID</font></td>
    <td width="6%" align="center" bgcolor="#FFFFFF"><font color="#000000">Annee</font></td>
    <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date</strong></font></td>
    <td width="16%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
    <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Montant</strong></font></td>
    <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Impayee</strong></font></td>
    <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Total</strong></font></td>
    <td width="10%" align="center" bgcolor="#FFFFFF">Report</td>
    <td width="11%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <?php
while($rowsfac=mysql_fetch_array($resultfac)){ 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfac['idf'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfac['fannee'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfac['date'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['nfacture'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['montant'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['impayee'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['total'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['report'];?></em></td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <?php
}
?>
</table>
<p></p>
<p></p>
<p><script>
		$(document).ready(function(){
		/////////////////////////////////////////////////////////////////////
		// SHOW/HIDE/TOGGLE FUNCTION  ///////////////////////////////////////
		/////////////////////////////////////////////////////////////////////
			
			//return false; - to prevent infinite loop in script
			
			$('#recherche-societe').find(':submit').hide();
			
			$('#recherche-societe').change(function(){
				$('#recherche-societe').find(':submit').click();
				return false;
			}); 

		});
	</script>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("formfacture");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("montant","req","SVP entre un nombre");
	frmvalidator.addValidation("montant","num","Allow numbers only ");
	
</script>
</p>
</body>
</html>
