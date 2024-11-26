<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php include 'titre.php'; ?></title>
<?php include 'inc/head.php'; ?>
<style type="text/css">
.centre {
	text-align: center;
}
</style>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td width="47%" height="67"><p><strong><img src="images/eda.png" width="173" height="65" /></strong></p>
    <p><strong> </strong></p></td>
    <td width="53%"><h1 class="centre"> RECU DE REMBOURSEMENT<span style="width: 75%; font-size: 24px;">
      <?php
require 'fonction.php';

//$idf=substr($_REQUEST["idf"],32); $idp
$idp=substr($_REQUEST["idp"],32);
$sql5="SELECT * FROM $tbl_contact c , $tbl_paiement p WHERE c.id=p.id and p.idp='$idp'";
$req5=mysqli_query($linki,$sql5);

while($data5=mysqli_fetch_array($req5)){
?>
    </span></h1></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="43%" height="128"><p>Tel : 771 01 68 Fax : 771 02 09 </p>
      <p>Email:contact@sonelecanjouan.com</p>
      <p> http://www.sonelecanjouan.com</p>
      <p>Horaire : Lun-Jeu : 7h30-14h30 / Ven : 7h30-11h / Sam : 7h30-12h30</p></td>
    <td width="57%"><table width="100%" border="1">
      <tr>
        <td><table width="93%" border="0.5" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="29%">Nom du client :</td>
            <td width="71%"><font color="#000000"><?php echo $data5['nomprenom'];?></font></td>
          </tr>
          <tr>
            <td>Adresse :</td>
            <td><span style="width: 40%; text-align: left"><span style="width:36%"><?php echo $data5['ville'];?></span> <span style="width:36%"><?php echo $data5['quartier'];?></span></span></td>
          </tr>
          <tr>
            <td>ID Client :</td>
            <td><span style="width:36%"><?php echo $data5['id'];?></span></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="1">
  <tr>
    <td><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
      <tr>
        <td width="19%"><font color="#000000"><strong>N Reçu</strong></font></td>
        <td width="19%"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
        <td width="22%"><font color="#000000" size="3"><strong>Libelle</strong></font></td>
        <?php if ($data5['st']=='E') {?>
        <td width="15%"><font color="#000000" size="3"><strong>Facturation</strong></font></td>
        <td width="25%"><strong>Compteur  N° </strong></td>
        <?php } else { } ?>
      </tr>
      <tr>
        <td><span style="width:36%"><?php echo $data5['nrecu'];?></span></td>
        <td><span style="width:36%"><?php echo $data5['nfacture'];?></span></td>
        <td><span style="width:36%">
          <?php $n=$data5['st']; 
                  if ($n=='E') echo 'FAC ELEC';
                  if ($n=='P') echo 'POLICE'; 
                  if ($n=='D') echo 'DEVIS';
                  if ($n=='F') echo 'PENALITE'; 
                  ?>
        </span></td>
        <?php if ($data5['st']=='E') {?>
        <td><em><?php echo $data5['nserie'];?>/<?php echo $data5['fannee'];?></em></td>
        <td><span style="width:36%"><?php echo $data5['ncompteur'];?></span></td>
        <?php } else { } ?>
      </tr>
    </table></td>
  </tr>
</table>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">DETAIL REMBOURSEMENT</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="76%">ANCIEN MONTANT  :<em> <?php echo ($data5['montant']-$data5['rembourser']);?> </em>KMF</td>
            <td width="24%">LE : <em><?php echo $data5['date'];?></em></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>MONTANT A REMBOURSER : <em><?php echo $data5['rembourser'];?> </em>KMF</td>
            <td><strong>SIGNATURE</strong></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>SOLDE A REPORTER :<em> <b><?php echo $data5['montant'];?></em> KMF</td>
            <td><span style="width:36%"><?php echo $data5['id_nom'];?></span></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<p>
  <?php
}
?>
</p>
<p>&nbsp;</p>
</body>
</html>