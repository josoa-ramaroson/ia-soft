<?
require 'session.php';
require 'fonction.php';
?>
<?php
require_once('calendar/classes/tc_calendar.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script language="javascript" src="calendar/calendar.js"></script>
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
/*$Police=$_POST['id'];
$sql82 ="SELECT * FROM $tbl_contact where Police='$Police'";
$result82 = mysql_query($sql82);
while ($row82 = mysql_fetch_assoc($result82)) {
$id=$row82['id'];
}*/

$id=$_REQUEST['id'];
$sqlfacturation="SELECT * FROM $tbl_fact f, $tbl_contact c  WHERE c.id=f.id and f.id='$id' and (f.st='E' or f.st='P' or f.st='D')  ORDER BY idf desc limit 0,1";
$resultatfact=mysql_query($sqlfacturation);
$ident=mysql_fetch_array($resultatfact);


	$sqfac="SELECT * FROM $tbl_paiement WHERE id='$id' and (st='E' or st='P' or st='D') ORDER BY idp DESC "; //DESC  ASC
	$resultfac=mysql_query($sqfac);
	
	$sqfaca="SELECT * FROM $tbl_paiement WHERE id='$id' and (st='F') ORDER BY idp DESC "; //DESC  ASC
	$resultfaca=mysql_query($sqfaca);

	$sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);

if ($ident) {
$idf=$ident['idf'];
}
else {
	header("location:paiement.php");
	}
	
	
	    //choix d espace de memoire pour les connection.---------------------------------------------------------------- 
	$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_paiconn  WHERE idrecu='$id_nom' ";
	$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error()); 
	$nb = mysqli_fetch_assoc($sqLvaleur);
	
	if($nb['nb'] == 1)
   {

   }
   else 
   {
	   	
	$sqlcon="INSERT INTO $tbl_paiconn (idrecu)VALUES('$id_nom')";
    $connection=mysqli_query($linki,$sqlcon);
    }
    //------------------------FIn du Programme ---------------------------------------------------------
	
	$nserie=$ident['nserie'];
	$fanneefacture=$ident['fannee'];
	 //choix paiement ORTC.---------------------------------------------------------------- 
	$valeur_existant_ortc = "SELECT COUNT(*) AS nb FROM $tbl_paiement WHERE id='$id' and st='E' and nserie='$nserie'  and fanneefacture='$fanneefacture' and ortc_dp='250' ";
	$sqLvaleur_ortc = mysqli_query($linki,$valeur_existant_ortc)or exit(mysqli_error()); 
	$nb_ortc = mysqli_fetch_assoc($sqLvaleur_ortc);
	
	if ($nserie==12) {$facmois='Dec'; }
	if ($nserie==11) {$facmois='Nov'; }
	if ($nserie==10) {$facmois='Oct'; }
	if ($nserie==9) {$facmois='Sep'; }
	if ($nserie==8) {$facmois='Aou'; }
	if ($nserie==7) {$facmois='Jul'; }
	if ($nserie==6) {$facmois='Jui'; }
	if ($nserie==5) {$facmois='Mai'; }
	if ($nserie==4) {$facmois='Avr'; }
	if ($nserie==3) {$facmois='Mar'; }
	if ($nserie==2) {$facmois='Fev'; }
	if ($nserie==1) {$facmois='Jan'; }
	if ($nserie==0) {$facmois=''; }
	
	if(($nb_ortc['nb']> 1) or ($nb_ortc['nb']==1))
   {
$couleur='#00FF00'; $couleurV='0'; $couleurL="Il a payé pour fact $facmois $fanneefacture ";

   }
   else 
   {
$couleur='#FF0000'; $couleurV='1'; $couleurL="Il n a pas payé pour fact $facmois $fanneefacture";
    }
    //------------------------FIn du Programme ---------------------------------------------------------
	
	
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Etape 2 PAIEMENT : Enregistre des paiements</h3>
  </div>
  <div class="panel-body">
    <form action="paiement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0">
        <tr>
          <td width="14%">ID_client</td>
          <td width="30%"><em><? echo $ident['id'];?></em></td>
          <td width="21%">Date de paiement </td>
          <td width="35%"><input name="date" type="text" id="date" value="<? echo $datecaisse['datecaisse'];?>" size="30" readonly="readonly" /></td>
        </tr>
        <tr>
          <td>Nom client</td>
          <td><em><? echo $ident['nomprenom'];?></em></td>
          <td>&nbsp;</td>
          <td><?php /*
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();*/
					  ?></td>
        </tr>
        <tr>
          <td>N° Facture </td>
          <td><em><? echo $ident['nfacture'];?></em></td>
          <td>Montant reste à payer</td>
          <td><em><? echo $ident['report'];?></em></td>
        </tr>
        <tr>
          <td>Date Facturuation</td>
          <td><em><? echo $ident['date'];?></em></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Montant</td>
          <td><em><? echo $ident['totalht'];?></em></td>
          <td>Montant</td>
          <td><input name="paiement" type="text" id="paiement" size="30" /></td>
        </tr>
         <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Taxes</td>
          <td><em><? echo $ident['tax'];?></em></td>
          <td bgcolor="<? echo $couleur;?>"> <? if  ($ident['st']=='E') {?> ORTC <? }?></td>
          <td>
          
          <? if  ($ident['st']=='E') {?>
          
          <label for="">
            <select name="ortc_d" id="ortc_d">
              <option value="<? echo $couleurV;?>" selected="selected"><? echo $couleurL;?></option>
              <option value="0">Ne pas facturé   </option>
              <option value="1">Facturé pour 1 mois </option>
              <option value="2">Facturé pour 2 mois </option>
              <option value="3">Facturé pour 3 mois </option>
              <option value="4">Facturé pour 4 mois </option>
              <option value="5">Facturé pour 5 mois </option>
              <option value="6">Facturé pour 6 mois </option>
            </select>
        </label>
        <? }?>
        </td>
        </tr>
                 <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="26">ORTC</td>
          <td><em><? echo $ident['ortc'];?></em></td>
          <td>Modalité de paiement</td>
          <td><select name="modalité" id="modalité">
            <option>Espece</option>
            <option>Chèque</option>
            <option>Virement</option>
            <option>Mobile</option>
          </select>
N°/Ref
<input name="reference" type="text" id="reference" size="30" /></td>
        </tr>
        <tr>
          <td height="26">Impayée</td>
          <td><em><? echo $ident['impayee'];?></em></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="26">Penalité de retard</td>
          <td><em><? echo $ident['Pre'];?></em></td>
          <td><em><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="idf" type="hidden" id="idf" value="<? echo $idf; ?>" />
          </font><font size="2"><strong><font size="2"><strong><font color="#FF0000">
          <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          <input name="Nomclient" type="hidden" id="Nomclient" value="<? echo $ident['nomprenom']; ?>" />
          <input name="nserie" type="hidden" id="nserie" value="<? echo $ident['nserie']; ?>" />
          <input name="bstatut" type="hidden" id="bstatut" value="<? echo $ident['bstatut']; ?>" />
          <input name="statut" type="hidden" id="statut" value="<? echo $ident['statut']; ?>" />
          <input name="clique" type="hidden" id="clique" value="0" />
          </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></em></td>
          <td><? if ($ident['report']!=0) {?>  <input type="submit" name="Paiement" id="Paiement" value="Paiement"/>
          <? } else { echo 'le Client a tout payé ';} ?></td>
        </tr>
        <tr>
          <td height="26">Total facturé</td>
          <td><em><? echo $ident['totalnet'];?></em></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#0794F0">
    <td width="100%" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Historique des paiements</font></strong></div></td>
  </tr>
</table>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0794F0">
    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000">ID Paiement</font></td>
    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date</strong></font></td>
    <td width="19%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Nom/ Raison sociale</strong></font></td>
    <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>N Reçu </strong></font></td>
    <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Montant</strong></font></td>
    <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Payé</strong></font></td>
    <td width="9%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
    <td width="5%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Mois </strong></font></td>
    <td width="5%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Ortc</strong></font></td>
    <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Tax</strong></font></td>
  </tr>
  <?php
while($rowsfac=mysql_fetch_array($resultfac)){ 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfac['idp'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfac['date'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfac['Nomclient'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['nfacture'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['nrecu'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['montant'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['paiement'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['report'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['nserie'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['ortc_dp'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['tax_dp'];?></em></td>
  </tr>
  <?php
}
?>
</table>
<p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0794F0">
    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000">ID Paiement</font></td>
    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date</strong></font></td>
    <td width="19%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Nom/ Raison sociale</strong></font></td>
    <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
    <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>N Reçu </strong></font></td>
    <td width="12%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Montant</strong></font></td>
    <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Payé</strong></font></td>
    <td width="17%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
  </tr>
  <?php
while($rowsfaca=mysql_fetch_array($resultfaca)){ 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfaca['idp'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfaca['date'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfaca['Nomclient'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfaca['nfacture'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfaca['nrecu'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfaca['montant'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfaca['paiement'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfaca['report'];?></em></td>
  </tr>
  <?php
}
?>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="21"><?php
include_once('pied.php');
?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("paiement","req","SVP entre un nombre");
	
</script>