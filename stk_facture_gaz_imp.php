<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><? include 'titre.php'; ?></title>
<? include 'inc/head.php'; ?>
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
    <td width="53%"><h1 class="centre">FACTURE  GAZ <span style="width: 75%; font-size: 24px;">
      <?php

$m1=$_GET['m1'];
$m2=$_GET['m2'];
$m3=$_GET['m3'];

require 'fonction.php';
require 'configuration.php';
$link = mysql_connect ($host,$user,$pass); 
mysql_select_db($db);

$sql5="SELECT * FROM $tbl_clientgaz where  id='$m1'";
$req5=mysql_query($sql5);

while($data5=mysql_fetch_array($req5)){
?>
    </span></h1></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="43%" height="128"><p>Tel : 771 01 68 Fax : 771 02 09 </p>
      <p>Email:contact@sonelecanjouan.com</p>
      <p>http://www.sonelecanjouan.com</p>
      <p>Horaire : Lun-Jeu : 7h30-14h30 / Ven : 7h30-11h / Sam : 7h30-12h30</p></td>
    <td width="57%"><table width="100%" border="1">
      <tr>
        <td><table width="93%" border="0.5" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="29%">Nom du client :</td>
            <td width="71%"><font color="#000000"><? $nomprenom=addslashes($data5['nomprenom']); echo $data5['nomprenom'];?></font></td>
          </tr>
          <tr>
            <td>Adresse :</td>
            <td><span style="width: 40%; text-align: left"><span style="width:36%"><? echo $data5['ville'];?></span> <span style="width:36%"><? $quartier=addslashes($data5['quartier']); echo $data5['quartier'];?></span></span></td>
          </tr>
          <tr>
            <td>ID Client :</td>
            <td><span style="width:36%"><? echo $data5['id'];?></span></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p><br />
  <?php
}
?>
</p>
<table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
  <tr>
    <td style="width:50%;"></td>
    <td style="width:50%; "><p><h2> Etabli par : <? echo $m3;?></h2></p>
    <p> <h2>le <? echo $m2;?> </h2> 
    </p></td>
  </tr>
</table>
<br />
<br />
<font size="2"><font size="2"><font size="2">
<?php
$sql="SELECT * FROM $tbl_vente where nc='$m1' and  datev='$m2'  ";
$req=mysql_query($sql);
?>
</font></font></font><br />
<table border="1" cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
  <tr>
    <th style="width: 40%">Désignation</th>
    <th style="width: 13%">Prix Unitaire</th>
    <th style="width: 10%">Quantité</th>
    <th style="width: 13%">Prix Net</th>
  </tr>
</table>
<table border="1" cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td style="width: 40%; text-align: left"><font color="#000000"><em><? echo $data['titre'];?></em></font></td>
    <td style="width: 13%"><font color="#000000"><em><? echo strrev(chunk_split(strrev($data['PUnitaire']),3," ")) ?></em></font></td>
    <td style="width: 10%"><font color="#000000"><em><? echo $data['Qvente'];?></em></font></td>
    <td style="width: 13%"><p>&nbsp;</p>
      <p><font color="#000000"><em><? echo strrev(chunk_split(strrev($data['PTotal']),3," ")) ?></em></font></p>
    <p>&nbsp;</p></td>
  </tr>
  <?php
// Exit looping and close connection 
}
?>
</table>
<p>
  <?php
$sql2="SELECT  SUM(PTotal) AS prix  FROM $tbl_vente where  nc='$m1' and  datev='$m2' GROUP BY datev";
$result2=mysql_query($sql2);
?>
</p>
<table width="100%" border="0">
  <tr>
    <?php
while($rows2=mysql_fetch_array($result2)){ // Start looping table row 
$Totaldevis=$rows2['prix'];
$totalttc= $Totaldevis;
$totalnet= $Totaldevis;
?>
    <td width="81%" align="right"><b>TOTAL </b></td>
    <td width="19%" align="center"> <b><? echo  strrev(chunk_split(strrev($Totaldevis),3," ")); ?> </b></td>
  </tr>
</table>
  <?php
}
//---------FACTURATION DEVIS---------------------------------
$sqlmaxf="SELECT MAX(idf) AS Maxa_id FROM $tbl_fact";
$resultmaxf=mysql_query($sqlmaxf);
$rowsmaxf=mysql_fetch_array($resultmaxf);
if ($rowsmaxf) {
$Max_idf = $rowsmaxf['Maxa_id']+1;
}
else {
$Max_idf = 1;
}

$st='A';
$st1='G';
//$nfacture=$Max_idf.$ci.$st.$annee;
$nfacture=$Max_idf.$st1;
$fannee=$annee;
$libelle='Gaz';
$etat='facture';
$date=$m2;

$valeur_existant = "SELECT COUNT(*) AS nb , idf FROM $tbl_fact  WHERE st='A' and id='$m1' and date='$m2'";
$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
$nb = mysql_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{ 	
$sql3="update  $tbl_fact  set date='$date', totalttc='$totalttc', totalnet='$totalnet', report='$totalnet' WHERE  st='A' and id='$m1' and date='$m2' and etat='facture'";
    $result3=mysql_query($sql3);
$Codebare=$nb['idf'];
}
else 
{
$sql2="INSERT INTO $tbl_fact 
( id, ci , st, id_nom, bnom, bquartier, nfacture, fannee, date, libelle, totalttc, totalnet, report, etat) VALUES
( '$m1', '$ci', '$st', '$m3', '$nomprenom', '$quartier', '$nfacture', '$fannee', '$date', '$libelle','$totalttc', '$totalnet', '$totalnet', 'facture')";
$result2=mysql_query($sql2);
$Codebare=$Max_idf;
}

mysql_close();
?>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="52%" align="center"><b><u>FACTURE N° </u></b></td>
    <td width="48%" align="center"><b><u>N° RECU </u></b></td>
  </tr>
  <tr>
    <td align="center"><img src="codeBarre.php?Code=<?=$Codebare?>" /></td>
    <td><p>&nbsp;</p>
    <p align="center">SIGNATURE </p>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>