<?php
require 'fonction.php';
require 'configuration.php';

$Numf=addslashes($_POST['Numf']);
$Societef=addslashes($_POST['Societef']);
$Societef=str_replace("'", '', ($Societef));
$Societef=ucfirst(strtolower($Societef));


$Adressef=addslashes($_POST['Adressef']);
$Telephonef=addslashes($_POST['Telephonef']);
$Statutf=addslashes($_POST['Statutf']);
$Date=addslashes($_POST['Date']);

$personne=addslashes($_POST['personne']);
$Telephonem=addslashes($_POST['Telephonem']);
$faxe=addslashes($_POST['faxe']);
$email=addslashes($_POST['email']);
$web=addslashes($_POST['web']);
$ville=addslashes($_POST['ville']);
$pays=addslashes($_POST['pays']);


mysql_query("INSERT INTO $tb_comptf (Numf,Societef,Adressef,Telephonef,Statutf,Date , personne , Telephonem , faxe , email , web ,ville ,pays) 
VALUE ('$Numf','$Societef','$Adressef','$Telephonef','$Statutf','$Date', '$personne' , '$Telephonem' , '$faxe' , '$email' , '$web' , '$ville' , '$pays')");
mysql_close();


include ("compt_fourniseur.php");
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

</body>
</html>