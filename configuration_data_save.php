<?php
require 'fonction.php';

$nserie=addslashes($_POST['nserie']);
$cserie=addslashes($_POST['cserie']);
$date=addslashes($_POST['date']);
$datelimite=addslashes($_POST['datel']);
$annee=addslashes($_POST['annee']);
$blogin=addslashes($_POST['blogin']);

$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_config  WHERE idconf='1' ";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{
$sqlp="update  $tbl_config  set  nserie='$nserie' , cserie='$cserie' , date='$date', datelimite='$datelimite' , annee='$annee'  WHERE idconf='1'  ";
$resultp=mysqli_query($linki,$sqlp);
header("location: configuration_data.php");
}
else 
{

$sqlp="INSERT INTO $tbl_config  ( nserie  , cserie  , date , datelimite, annee)
                    VALUES      ('$nserie', '$cserie', '$date', '$datelimite', '$annee')";								
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error($linki));
mysqli_close($link);
header("location: configuration_data.php");
}
?>