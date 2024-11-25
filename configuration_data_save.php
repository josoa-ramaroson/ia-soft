<?php
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

$nserie=addslashes($_POST['nserie']);
$cserie=addslashes($_POST['cserie']);
$date=addslashes($_POST['date']);
$datelimite=addslashes($_POST['datel']);
$annee=addslashes($_POST['annee']);
$blogin=addslashes($_POST['blogin']);

$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_config  WHERE idconf='1' ";
$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
$nb = mysql_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{
$sqlp="update  $tbl_config  set  nserie='$nserie' , cserie='$cserie' , date='$date', datelimite='$datelimite' , annee='$annee'  WHERE idconf='1'  ";
$resultp=mysql_query($sqlp);
header("location: configuration_data.php");
}
else 
{

$sqlp="INSERT INTO $tbl_config  ( nserie  , cserie  , date , datelimite, annee)
                    VALUES      ('$nserie', '$cserie', '$date', '$datelimite', '$annee')";								
$r=mysql_query($sqlp)
or die(mysql_error());
mysql_close($link);
header("location: configuration_data.php");
}
?>