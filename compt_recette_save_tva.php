<?php
require 'fonction.php';
require 'configuration.php';

$id_nom=addslashes($_POST['id_nom']);
$Date=addslashes($_POST['Date']);
$Compte=addslashes($_POST['Compte']);
$Description=addslashes($_POST['Description']);
$Modep=addslashes($_POST['Modep']);
$Ht=addslashes($_POST['Ht']);
$Tva=addslashes($_POST['Tva']);
$Fourniseur=addslashes($_POST['Fourniseur']);
$Pieces=addslashes($_POST['Pieces']);

if ($Tva==0) {
$d=$Ht;
}

if ($Tva>=0) {
$t=$Tva/100;
$tt=$Ht*$t;
$ttt=$tt;
$d=$Ht-$ttt;
}


$sqlconnect="SELECT * FROM $tb_comptconf  WHERE idcomp='$id_nom' ";
$resultconnect=mysql_query($sqlconnect);
$rowsc=mysql_fetch_array($resultconnect);
$Maxa_id = $rowsc['idc'];

	if(!isset($Maxa_id)|| empty($Maxa_id)) {
	header("compt_recette_crediter_tva.php");
	exit;
 }
 

mysql_query("INSERT INTO  $tb_ecriture (Date,idc,Compte,Description,Credit,Debit,Tva,TTC,Fourniseur,Pieces,Type,mo) 
VALUE ('$Date','$Maxa_id','$Compte','$Description','$d','0','$Tva','$d','$Fourniseur','$Pieces','C','C')");

///////////////////////////

mysql_query("INSERT INTO  $tb_ecriture (Date,idc,Compte,Description,Credit,Debit,Tva,TTC,Fourniseur,Pieces,Type,mo) 
VALUE ('$Date','$Maxa_id','1000','TVA','$tt','0','0','$tt','$Fourniseur','$Pieces','C','C')");
///////////////////////


$req="select * from $plan where Code='$Modep'";
$resul=mysql_query($req);
while($row=mysql_fetch_array($resul)) {
$mdd=$row['Code'];
$md=$row['Description'];
}


mysql_query("INSERT INTO $tb_ecriture(Date,idc,Compte,Description,Credit,Debit,Tva,TTC,Fourniseur,Pieces,Type,mo) 
VALUE ('$Date','$Maxa_id','$Modep','$md','0','$Ht','0','$Ht','$Fourniseur','$Pieces','D','C')");

$sqlcon="update $tb_comptconf set idcomp='$Compte' where idc='$Maxa_id'";
$connection=mysql_query($sqlcon);

mysql_close();


include ("compt_recette_crediter_tva.php");
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

</body>
</html>