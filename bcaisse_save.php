<?php
require 'fonction.php';


require 'xbackup_caisse.php';


$date=addslashes($_POST['date']);
$blogin=addslashes($_POST['blogin']);
$verification=addslashes($_POST['verification']);
$valbsc=md5($date);
$valbsc=$valbsc.md5($CONTRATN.(date("Y", strtotime($date))).$CONSULTANT);
$valbsc=md5("y/m/d H:i:s").$valbsc.md5($valbsc);


$dfin = explode("-", $date); 
$debut = explode("-", $verification);

$dateverif = str_replace("/","-",$date);
$dateconf= strtotime($dateverif);

if ($dfin <= $debut)
{

header("location: bcaisse.php");
exit;
}
else
{
$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_caisse ";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{
$sqlp="update  $tbl_caisse  set  datecaisse='$date' , blogin='$blogin' , valbsc='$valbsc' ";
$resultp=mysqli_query($linki,$sqlp);


$sqlp2="update  $tbl_date  set  date='$date' ";
$resultp2=mysqli_query($linki,$sqlp2);


header("location: bcaisse.php");
}
else 
{

$sqlp="INSERT INTO $tbl_caisse  ( blogin  ,  datecaisse , valbsc )
                    VALUES      ('$blogin','$date' , '$valbsc')";								
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error($linki));



$sqldate="INSERT INTO $tbl_date  (date) VALUES ('$date')";								
$rdate=mysqli_query($linki,$sqldate);
mysqli_close($linki);

header("location: bcaisse.php");
}
}
?>