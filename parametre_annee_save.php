<?php
require 'fonction.php';

 $annee=addslashes($_POST['annee']);
 $verification=addslashes($_POST['verification']);


$dfin = explode("-", $date); 
$debut = explode("-", $verification);

if ($annee <= $verification)
{
header("location: parametre_annee.php");
}
else
{
$valeur_existant = "SELECT COUNT(*) AS nb FROM annee ";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error()); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{
$sqlp="update  annee set  annee='$annee'";
$resultp=mysqli_query($linki,$sqlp);

header("location: parametre_annee.php");
}
else 
{

$sqlp="INSERT INTO annee ( annee)
                    VALUES      ( '$annee')";								
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error());

mysqli_close($linki);

header("location: parametre_annee.php");
}
}
?>