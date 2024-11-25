<?
require 'session.php';
require 'fonction.php';
?>
<?
	if($_SESSION['u_niveau'] != 6) {
	header("location:index.php?error=false");
	exit;
 }
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
$idr=$_POST['idr'];

$sqlreservation="SELECT * FROM $tbl_paiement WHERE id='$idr' ORDER BY idp desc limit 0,1";
$resultatreserv=mysql_query($sqlreservation);
$ident=mysql_fetch_array($resultatreserv);

if ($ident) {
$idr=$ident['idp'];
$idf=$ident['idf'];
$id=$ident['id'];
$Nomclient=$ident['Nomclient'];
$montant=$ident['montant'];
$paiement=$ident['paiement'];
$report=$ident['report'];
$date=$ident['date'];
}

	$sqfac="SELECT * FROM $tbl_paiement WHERE id='$id'  ORDER BY idp DESC "; //DESC  ASC
	$resultfac=mysql_query($sqfac);
	
	$sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);

if ($ident) {
}
else {
	header("location:rembourssement.php");
	}
	
?>
<body>
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Etape 2 ANNULATION </h3>
  </div>
  <div class="panel-body">
    <form action="rembourssement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0">
        <tr>
          <td width="16%">ID_client</td>
          <td width="28%"><em><? echo $ident['id'];?></em></td>
          <td width="21%">&nbsp;</td>
          <td width="35%">&nbsp;</td>
        </tr>
        <tr>
          <td>Nom client</td>
          <td><em><? echo $ident['Nomclient'];?></em></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>N° Facture </td>
          <td><em><? echo $ident['nfacture'];?></em></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Date Facturation</td>
          <td><em><? echo $ident['date'];?></em></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Montant facturé</td>
          <td><em><? echo $ident['montant'];?></em></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Paiement</td>
          <td><em><? echo $ident['paiement'];?></em></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="26">Montant restant</td>
          <td><em><? echo $ident['report'];?></em></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="26">Date de paiement </td>
          <td><? echo $datecaisse['datecaisse'];?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="26">&nbsp;</td>
          <td><? if ($ident['date']!=$datecaisse['datecaisse']) { } else { ?>  <input type="submit" name="Paiement" id="Paiement" value="Rembourser" /> <? } ?> </td>
          <td><em><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="idf" type="hidden" id="idf" value="<? echo $idf; ?>" />
          </font><font size="2"><strong><font size="2"><strong><font color="#FF0000">
          <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          <input name="Nomclient" type="hidden" id="Nomclient" value="<? echo $ident['Nomclient']; ?>" />
          <input name="nserie" type="hidden" id="nserie" value="<? echo $ident['nserie']; ?>" />
          <input name="idp" type="hidden" id="idp" value="<? echo $ident['idp']; ?>" />
          <input name="paiement" type="hidden" id="paiement" value="<? echo $ident['paiement']; ?>" />
          </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></em></td>
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
    <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>N Reçu </strong></font></td>
    <td width="12%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Montant</strong></font></td>
    <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Payé</strong></font></td>
    <td width="17%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
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
