<?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

$idrh=substr($_REQUEST["id"],32);
$id_nom=substr($_REQUEST["@i"],32);
	  
$valeur_existant = "SELECT COUNT(*) AS nb FROM $tb_rhconge  WHERE  idrh='$idrh'  and anneeconge='$anneepaie'";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{ 	
$sql="INSERT INTO update  set idrh='$idrh' , id_nom='$id_nom' , anneeconge='$anneepaie'
      WHERE  idrh='$idrh'  and anneeconge='$anneepaie'";
$result=mysqli_query($linki,$sql);
header("location:rh_conge.php");
exit;
}

	  
$sql2="INSERT INTO $tb_rhconge (idrh, id_nom , anneeconge) VALUES ('$idrh','$id_nom' , '$anneepaie')";
$result2=mysqli_query($linki,$sql2);


header("location:rh_conge.php");
?>
