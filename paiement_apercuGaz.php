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
$idf=$_POST['idg'];

//$sqlfacturation="SELECT * FROM $tbl_fact f, $tbl_clientgaz c WHERE c.id=f.id and f.id='$id' and f.st='A' ORDER BY idf desc";

$sqlfacturation="SELECT * FROM $tbl_fact f, $tbl_clientgaz c WHERE c.id=f.id and f.idf='$idf' and f.st='A'  ORDER BY idf desc";

$resultatfact=mysql_query($sqlfacturation);
$ident=mysql_fetch_array($resultatfact);

	$sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);
	
if ($ident) {
$idf=$ident['idf'];
}
else {
	header("location:paiement_gaz.php");
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
          <td>&nbsp;</td>
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
          <td>Total facturée </td>
          <td><em><? echo $ident['totalttc'];?></em></td>
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
          <td height="26">&nbsp;</td>
          <td>&nbsp;</td>
          <td>Modalité de paiement</td>
          <td><select name="modalité" id="modalité">
            <option>Espece</option>
            <option>Chèque</option>
            <option>Virement</option>
          </select>
N°/Ref
<input name="reference" type="text" id="reference" size="30" /></td>
        </tr>
        <tr>
          <td height="26">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="26">&nbsp;</td>
          <td>&nbsp;</td>
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
          <td><? if ($ident['report']!=0 ) {?>            <input type="submit" name="Paiement" id="Paiement" value="Paiement"/>
          <? } else { echo 'le Client a tout payé ';} ?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>&nbsp;</p>
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