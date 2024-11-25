<?php
require 'fonction.php';
require 'configuration.php';

$idf=addslashes($_POST['idf']);
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


$req="UPDATE  $tb_comptf SET  Societef='$Societef',Adressef='$Adressef',Telephonef='$Telephonef',Statutf='$Statutf',Date='$Date',

personne='$personne' , Telephonem='$Telephonem' , faxe='$faxe' , email='$email' , web='$web' , ville='$ville' , pays='$pays'

 where idf='$idf' ";
 $result=mysql_query($req);
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