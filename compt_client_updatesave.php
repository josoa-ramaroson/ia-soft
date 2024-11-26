<?php
require 'fonction.php';
require 'configuration.php';

$Numcsave=addslashes($_POST['Numcsave']);
$Nomcl=addslashes($_POST['Nomcl']);
$Prenomcl=addslashes($_POST['Prenomcl']);
$Adressecl=addslashes($_POST['Adressecl']);
$Telephonecl=addslashes($_POST['Telephonecl']);
$Statutcl=addslashes($_POST['Statutcl']);
$Date=addslashes($_POST['Date']);
$req="UPDATE  $tb_comptcl SET  Nomcl='$Nomcl',Prenomcl='$Prenomcl',Adressecl='$Adressecl',Telephonecl='$Telephonecl',Statutcl='$Statutcl',Date='$Date'
 where Numcsave='$Numcsave' ";
 $result=mysqli_query($linki,$req);
 mysqli_close($linki);


include ("compt_client.php");
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

</body>
</html>