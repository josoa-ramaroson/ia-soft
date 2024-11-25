<?
require 'fonction.php';
require 'sessionclient.php';	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include("titre.php"); ?></title>
<? include 'inc/head.php'; ?>
</head>
<?php
//$id=$_GET['id'];
$id=$_REQUEST["id"];
$ARCH=$_REQUEST['annee']; 

$sqlm="SELECT * FROM $tbl_contact WHERE id='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);

	/*$sqact="SELECT * FROM $tbl_activite WHERE id='$id'";
	 $resultact=mysql_query($sqact);*/
	 
	 	 
	$sqfac="SELECT * FROM z_"."$ARCH"."_$tbl_fact WHERE id='$id' and st='E' ORDER BY idf desc";
	$resultfac=mysql_query($sqfac);
	
	$sqfacd="SELECT * FROM z_"."$ARCH"."_$tbl_fact WHERE id='$id' and st!='E' ORDER BY idf desc";
	$resultfacd=mysql_query($sqfacd);
	
	$sqpaie="SELECT * FROM z_"."$ARCH"."_$tbl_paiement   WHERE id='$id' and st='E' ORDER BY idp DESC";
	$resultpaie=mysql_query($sqpaie);
	
	$sqpaied="SELECT * FROM z_"."$ARCH"."_$tbl_paiement WHERE id='$id' and st!='E' ORDER BY idp DESC";
	$resultpaied=mysql_query($sqpaied);
	
	$idc=$datam['id'];
	$nomclient=$datam['nomprenom'];
?>
<body>
<?
require "client_lient.php";
?>
<table width="99%" border="0">
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="44%"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Historique des facturations et paiements Cyclique</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="co_user_archives.php" method="post" name="form1" id="form1">
                  <label for="mr2"></label>
                  <font color="#000000">
                    <select name="annee" size="1" id="annee">
                      <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                    </select>
                    </font><em>
                    <input class="form-control" name="id" type="hidden" id="idp" value="<? echo $id;?>" />
                    </em>
<input type="submit" name="Cher" id="Cher" class="btn btn-sm btn-warning"value="Les factures electriques" />
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="5%">&nbsp;</td>
    <td width="49%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"> Facturations et paiements Cyclique</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52%"><table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                  <tr bgcolor="#0794F0">
                    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
                    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000">Facturation</font></td>
                    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date facturé</strong></font></td>
                    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>ID_client</strong></font></td>
                    <td width="6%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Index J</strong></font></td>
                    <td width="6%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Index N</strong></font></td>
                    <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Montant TTC</strong></font></td>
                    <td width="6%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>ortc</strong></font></td>
                    <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Impayee</strong></font></td>
                    <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>D remise</strong></font></td>
                    <td width="11%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Total net</strong></font></td>
                    <td width="11%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
                    
                  </tr>
                  <?php
while($rowsfac=mysql_fetch_array($resultfac)){ 
?>
                  <tr>
                    <td align="center" bgcolor="#FFFFFF"><em>                    
                    <a href="<? if ($datam['Tarif']!=10){echo'z_co_billimp.php';} else { echo'z_co_billMTimp.php';}?>?idf=<? echo md5(microtime()).$rowsfac['idf'];?>&a=<? echo md5(microtime()).$ARCH;?>" target="_blank" ><? echo $rowsfac['nfacture'];?></a>
                   
                    </em></td>
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
                  
                  </tr>
                  <?php
}
?>
              </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <p>&nbsp;</p>
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
        <td align="center" bgcolor="#FFFFFF"><em> <a href="z_paiement_billimp.php?idp=<? echo md5(microtime()).$rowsp['idp'];?>&a=<? echo md5(microtime()).$ARCH;?>" target="_blank" > <? echo $rowsp['nrecu'];?></a></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsp['nfacture'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsp['nserie'];?>/<? echo $rowsp['fannee'];?></em></td>
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
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Service Clientel &amp; Branchement &amp; Controle &amp; Penalité de Fraude</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52%"><table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
              <tr bgcolor="#0794F0">
                <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
                <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date facturé</strong></font></td>
                <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>ID_client</strong></font></td>
                <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Montant TTC</strong></font></td>
                <td width="11%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Total net</strong></font></td>
                <td width="11%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
                </tr>
              <?php
while($rowsfacd=mysql_fetch_array($resultfacd)){ 
?>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['nfacture'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['date'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['id'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['totalttc'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['totalnet'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['report'];?></em></td>
                </tr>
              <?php
}
?>
            </table>
              <p>&nbsp;</p>
              <p>Paiement du Branchement et Devis</p>
              <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                <tr bgcolor="#0794F0">
                  <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>N Reçu </strong></font></td>
                  <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
                  <td width="11%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date Paiement</strong></font></td>
                  <td width="25%" align="center" bgcolor="#FFFFFF"><strong><font color="#000000" size="3">Nom du client</font></strong></td>
                  <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Total net</strong></font></td>
                  <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Payé</strong></font></td>
                  <td width="11%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
                </tr>
                <?php
while($rowspd=mysql_fetch_array($resultpaied)){ 
?>
                <tr>
                  <td align="center" bgcolor="#FFFFFF"><em> <a href="paiement_bill.php?idp=<? echo md5(microtime()).$rowspd['idp'];?>" target="_blank" > <? echo $rowspd['nrecu'];?></a></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['nfacture'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['date'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['Nomclient'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['montant'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['paiement'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['report'];?></em></td>
                </tr>
                <?php
}
?>
              </table>
              <p>&nbsp;</p></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
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