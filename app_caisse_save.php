<?php
require 'fonction.php';

$date=addslashes($_POST['date']);
$blogin=addslashes($_POST['blogin']);
$verification=addslashes($_POST['verification']);


$dfin = explode("-", $date); 
$debut = explode("-", $verification);

if ($dfin <= $debut)
{
header("location: app_caisse.php");
}
else
{
$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_app_caisse ";
$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
$nb = mysql_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{
$sqlp="update  $tbl_app_caisse  set  datecaisse='$date' , blogin='$blogin' , date_verif='$date' ";
$resultp=mysql_query($sqlp);

header("location: app_caisse.php");
}
else 
{

$sqlp="INSERT INTO $tbl_app_caisse ( blogin  ,  datecaisse ,date_verif )
                    VALUES      ('$blogin','$date' , '$date')";								
$r=mysql_query($sqlp)
or die(mysql_error());

mysql_close($link);

header("location: app_caisse.php");
}
}
?>