<?
require 'session.php';
require 'fonction.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
$id=$_REQUEST['id'];
//$id=substr($_REQUEST["id"],32);

$sqlm="SELECT * FROM $tbl_contact WHERE id='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);

	/*$sqact="SELECT * FROM $tbl_activite WHERE id='$id'";
	 $resultact=mysql_query($sqact);*/
	 
	 	 
	$sqfac="SELECT * FROM $tbl_fact WHERE id='$id' and st='E' ORDER BY idf desc";
	$resultfac=mysql_query($sqfac);
	
	$sqfacd="SELECT * FROM $tbl_fact WHERE id='$id' and st!='E' ORDER BY idf desc";
	$resultfacd=mysql_query($sqfacd);
	
	$sqpaie="SELECT * FROM $tbl_paiement   WHERE id='$id' and st='E' ORDER BY idp DESC";
	$resultpaie=mysql_query($sqpaie);
	
	$sqpaied="SELECT * FROM $tbl_paiement  WHERE id='$id' and st!='E' ORDER BY idp DESC";
	$resultpaied=mysql_query($sqpaied);
	
	
?>
<body>
<a href="co_facture_user_imp.php?id=<? echo md5(microtime()).$id;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
<table width="100%" border="0" align="center">
                  <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information de l'activité </font></strong></div></td>
        </tr>
  <tr>
    <td height="130"><form action="re_enregistrement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
           

           <tr>
                  <td width="11%" bgcolor="#FFFFFF"><? if ($_SESSION['u_niveau']==1) {?><a href="re_affichage_user.php?id=<? echo md5(microtime()).$datam['id']; ?>" class="btn btn-sm btn-success">Aperçu du client</a><? } else {} ?></td>
                  <td width="1%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="35%" bgcolor="#FFFFFF"><strong>Information de la personne</strong></td>
                  <td width="1%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="12%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="40%" bgcolor="#FFFFFF"><strong>Information du compteur</strong></td>
          </tr>
        <tr>
          <td>SIDCLIENT</td>
          <td>&nbsp;</td>
          <td><strong>
            <? echo $datam['id'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td>Ville</td>
          <td><strong><? echo $datam['ville'];?></strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Designation</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
           <? echo $datam['Designation'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td>Quartier</td>
          <td><strong><? echo $datam['quartier'];?></strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['nomprenom'];?>&nbsp;</td>
          <td>&nbsp;</td>
          <td><label for="checkbox_row_38">Numero Compteur</label></td>
          <td><? echo $datam['ncompteur']; ?></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"> Historique des facturations </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52%"><table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                  <tr bgcolor="#0794F0">
                    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
                    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000">Facturation</font></td>
                    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date facturé</strong></font></td>
                    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>ID_client</strong></font></td>
                 <td width="6%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Index J</strong></font></td>
                 <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Index N</strong></font></td>
                 <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Mont TTC</strong></font></td>
                    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>ortc</strong></font></td>
                    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Impayee</strong></font></td>
                    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>D remise</strong></font></td>
                    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Total net</strong></font></td>
                    <td width="9%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
                    <td width="13%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
                  <?php
while($rowsfac=mysql_fetch_array($resultfac)){ 
?>
                  <tr>
                    <td align="center" bgcolor="#FFFFFF"><em><a href="<? if ($datam['Tarif']!=10){echo'co_billimp.php';} else { echo'co_billMTimp.php';}?>?idf=<? echo md5(microtime()).$rowsfac['idf'];?>" target="_blank" ><? echo $rowsfac['nfacture'];?></a></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['nserie'];?>/<? echo $rowsfac['fannee'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['date'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['id'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['nf'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['nf2'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['totalttc'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['ortc'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['impayee'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['Pre'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['totalnet'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['report'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em>
                      <? if (($rowsfac['etat']=="facture") and (($_SESSION['u_niveau']==8)or ($_SESSION['u_niveau']==7))){?>
                      <a href="<? if ($datam['Tarif']!=10){echo'co_modification.php';} else { echo'co_modificationMT.php';}?>?idf=<? echo md5(microtime()).$rowsfac['idf'];?>" class="btn btn-sm btn-warning" >Modification</a>
                      <? } else {} ?>
                    </em></td>
                  </tr>
                  <?php
}
?>
              </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <p><span class="panel-title">Historique des  paiements </span></p>
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#0794F0">
        <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>N Reçu </strong></font></td>
        <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
        <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000">Facturation</font></td>
        <td width="11%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date Paiement</strong></font></td>
        <td width="25%" align="center" bgcolor="#FFFFFF"><strong><font color="#000000" size="3">Nom du client</font></strong></td>
        <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Total net</strong></font></td>
        <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Payé</strong></font></td>
        <td width="11%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
      </tr>
      <?php
while($rowsp=mysql_fetch_array($resultpaie)){ 
?>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><em> <a href="paiement_billimp.php?idp=<? echo md5(microtime()).$rowsp['idp'];?>" target="_blank" > <? echo $rowsp['idp'];?></a></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsp['nfacture'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsp['nserie'];?>/<? echo $rowsp['fanneefacture'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsp['date'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsp['Nomclient'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsp['montant'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsp['paiement'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsp['report'];?></em></td>
      </tr>
      <?php
}
?>
    </table>
    <p>&nbsp;</p>
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