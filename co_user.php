<?php
Require 'fonction.php';
require 'sessionclient.php';	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include("titre.php"); ?></title>
<?php include 'inc/head.php'; ?>
</head>
<?php
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);

$sqlm="SELECT * FROM $tbl_contact WHERE id='$id'";
$resultm=mysqli_query($linki,$sqlm);
$datam=mysqli_fetch_array($resultm);

	/*$sqact="SELECT * FROM $tbl_activite WHERE id='$id'";
	 $resultact=mysqli_query($linki,$sqact);*/
	 
	 	 
	$sqfac="SELECT * FROM $tbl_fact WHERE id='$id' and st='E' ORDER BY idf desc";
	$resultfac=mysqli_query($linki,$sqfac);
	
	$sqfacd="SELECT * FROM $tbl_fact WHERE id='$id' and st!='E' ORDER BY idf desc";
	$resultfacd=mysqli_query($linki,$sqfacd);
	
	$sqpaie="SELECT * FROM $tbl_paiement   WHERE id='$id' and st='E' ORDER BY idp DESC";
	$resultpaie=mysqli_query($linki,$sqpaie);
	
	$sqpaied="SELECT * FROM $tbl_paiement  WHERE id='$id' and st!='E' ORDER BY idp DESC";
	$resultpaied=mysqli_query($linki,$sqpaied);
	
	$idc=$datam['id'];
	$nomclient=$datam['nomprenom'];
?>
<body>
<?php
Require "client_lient.php";
?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"> INFORMATION DU CLIENT : 
       
    </h3>
  </div>
  <div class="panel-body">

    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
      <tr>
        <td bgcolor="#FFFFFF"><p><strong>

        </strong></p>
        <p>&nbsp;</p></td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">
        <p>&nbsp;</p></td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td>SIDCLIENT</td>
        <td>&nbsp;</td>
        <td><strong> <?php echo $datam['id'];?> </strong></td>
        <td>&nbsp;</td>
        <td>Police</td>
        <td><strong><?php echo $datam['Police'];?></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2">Designation</font></strong></td>
        <td>&nbsp;</td>
        <td><strong> <?php echo $datam['Designation'];?> </strong></td>
        <td>&nbsp;</td>
        <td>Ancien Ref</td>
        <td><strong><?php echo $datam['AncienRef'];?></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
        <td>&nbsp;</td>
        <td><?php echo $datam['nomprenom'];?>&nbsp;</td>
        <td>&nbsp;</td>
        <td><label for="checkbox_row_38">Type compteur</label></td>
        <td><strong><?php echo $datam['typecompteur'];?></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2">Email</font></strong></td>
        <td>&nbsp;</td>
        <td><?php echo $datam['email'];?>&nbsp;</td>
        <td>&nbsp;</td>
        <td>phase</td>
        <td><strong><?php echo $datam['phase'];?></strong></td>
      </tr>
      <tr>
        <td><strong>Titre </strong></td>
        <td>&nbsp;</td>
        <td><strong> <?php echo $datam['titre'];?> </strong></td>
        <td>&nbsp;</td>
        <td><label for="checkbox_row_40">Puissance</label></td>
        <td><strong><?php echo $datam['puissance'];?></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
        <td>&nbsp;</td>
        <td><strong> <?php echo $datam['tel'];?> </strong></td>
        <td>&nbsp;</td>
        <td><label for="checkbox_row_42">Amperage</label></td>
        <td><strong><?php echo $datam['amperage'];?></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2">Fax</font></strong></td>
        <td>&nbsp;</td>
        <td><strong> <?php echo $datam['fax'];?> </strong></td>
        <td>&nbsp;</td>
        <td>Tarif</td>
        <td><?php
$T=$datam['Tarif'];
$sql82 = ("SELECT * FROM tarif where idt='$T'");
$result82 = mysqli_query($linki,$sql82);
while ($row82 = mysqli_fetch_assoc($result82)) {
echo $row82['Libelle'];
}

?></td>
      </tr>
      <tr>
        <td><strong><font size="2">Site Web</font></strong></td>
        <td>&nbsp;</td>
        <td><strong> <?php echo $datam['url'];?> </strong></td>
        <td>&nbsp;</td>
        <td>Numero Compteur</td>
        <td><?php echo $datam['ncompteur']; ?></td>
      </tr>
      <tr>
        <td>Login :</td>
        <td>&nbsp;</td>
        <td><strong><?php echo $datam['login'];?></strong></td>
        <td>&nbsp;</td>
        <td>Taxe</td>
        <td><strong>
          <?php $chtaxe=$datam['chtaxe']; 
		  
		  if ($chtaxe==0) echo 'AVEC TAXE';
	      if ($chtaxe==1) echo 'SANS TAXE'; 
		  
		  ?>
        </strong></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">Pwd :</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><strong><?php echo $datam['pwd'];?></strong></td>
        <td>&nbsp;</td>
        <td>Date pose</td>
        <td><strong><?php echo $datam['datepose'];?></strong></td>
      </tr>
      <tr>
        <td width="11%" valign="top"><strong><font size="2">Ville</font></strong></td>
        <td width="1%">&nbsp;</td>
        <td width="35%"><strong><?php echo $datam['ville'];?></strong></td>
        <td width="1%">&nbsp;</td>
        <td width="12%" bordercolor="#006600" bgcolor="#FFFFFF">&nbsp;</td>
        <td width="40%" bordercolor="#006600" bgcolor="#FFFFFF"><strong><?php echo $datam['CodeActivite'];?></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
        <td valign="top">&nbsp;</td>
        <td><strong><?php echo $datam['quartier'];?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>
          <?php //echo $datam['statut'];?>
        </strong></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</div>
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
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                    </select>
                    </font>
                  <em>
                  <input class="form-control" name="id" type="hidden" id="idp" value="<?php echo $id;?>" />
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
while($rowsfac=mysqli_fetch_array($resultfac)){ 
?>
                  <tr>
                    <td align="center" bgcolor="#FFFFFF"><em>                    
                    <a href="<?php if ($datam['Tarif']!=10){echo'co_billimp.php';} else { echo'co_billMTimp.php';}?>?idf=<?php echo md5(microtime()).$rowsfac['idf'];?>" target="_blank" ><?php echo $rowsfac['nfacture'];?></a>
                   
                    </em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['nserie'];?>/<?php echo $rowsfac['fannee'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['date'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['id'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['nf'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['nf2'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['totalttc'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['ortc'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['impayee'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['Pre'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['totalnet'];?></em></td>
                    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['report'];?></em></td>
                  
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
while($rowsp=mysqli_fetch_array($resultpaie)){ 
?>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><em> <a href="paiement_billimp.php?idp=<?php echo md5(microtime()).$rowsp['idp'];?>" target="_blank" > <?php echo $rowsp['nrecu'];?></a></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['nfacture'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['nserie'];?>/<?php echo $rowsp['fannee'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['date'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['Nomclient'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['montant'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['paiement'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['report'];?></em></td>
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
while($rowsfacd=mysqli_fetch_array($resultfacd)){ 
?>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfacd['nfacture'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfacd['date'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfacd['id'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfacd['totalttc'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfacd['totalnet'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfacd['report'];?></em></td>
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
while($rowspd=mysqli_fetch_array($resultpaied)){ 
?>
                <tr>
                  <td align="center" bgcolor="#FFFFFF"><em> <a href="paiement_bill.php?idp=<?php echo md5(microtime()).$rowspd['idp'];?>" target="_blank" > <?php echo $rowspd['nrecu'];?></a></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowspd['nfacture'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowspd['date'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowspd['Nomclient'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowspd['montant'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowspd['paiement'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowspd['report'];?></em></td>
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