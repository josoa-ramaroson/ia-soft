<?php
require 'fonction.php';
require 'configuration.php';
$id_nom=addslashes($_POST['id_nom']);
$Date=addslashes($_POST['Date']);
$Compte=addslashes($_POST['Compte']);
$Description=addslashes($_POST['Description']);
$Modep=addslashes($_POST['Modep']);
$Ht=addslashes($_POST['Ht']);
//$Tva=addslashes($_POST['Tva']);
$Fourniseur=addslashes($_POST['Fourniseur']);
$Pieces=addslashes($_POST['Pieces']);
$d=$Ht;
//if ($Tva==0) {
//$d=$Ht;
//}

//if ($Tva>=0) {
//$t=$Tva/100;
//$tt=$Ht*$t;
//$ttt=$tt;
//$d=$Ht-$ttt;
//}

$sqlconnect="SELECT * FROM $tb_comptconf  WHERE idcomp='$id_nom' ";
$resultconnect=mysqli_query($linki,$sqlconnect);
$rowsc=mysqli_fetch_array($resultconnect);
$Maxa_id = $rowsc['idc'];

	if(!isset($Maxa_id)|| empty($Maxa_id)) {
	header("compt_depense.php");
	exit;
 }
 
mysqli_query("INSERT INTO  $tb_ecriture (Date,idc,Compte,Description,Credit,Debit,Tva,TTC,Fourniseur,Pieces,Type,mo) 
VALUE ('$Date','$Maxa_id','$Compte','$Description','0','$d','0','$d','$Fourniseur','$Pieces','D','D')");



$Modep=addslashes($_POST['Modep']);
$req="select Code , Description  from $plan where Code='$Modep'";
$resul=mysqli_query($linki,$req);
while($row=mysqli_fetch_array($resul)) {
$mdd=$row['Code'];
$md=$row['Description'];
}


mysqli_query("INSERT INTO $tb_ecriture(Date,idc,Compte,Description,Credit,Debit,Tva,TTC,Fourniseur,Pieces,Type,mo) 
VALUE ('$Date','$Maxa_id','$Modep','$md','$Ht','0','0','$Ht','$Fourniseur','$Pieces','C','D')");

$sqlcon="update $tb_comptconf set idcomp='$Compte' where idc='$Maxa_id'";
$connection=mysqli_query($linki,$sqlcon);

mysqli_close($linki);


include ("compt_depense_debiter.php");
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

</body>
</html>