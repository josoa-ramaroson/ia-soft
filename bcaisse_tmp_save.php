<?php
require 'fonction.php';

$date=addslashes($_POST['date']);
$blogin=addslashes($_POST['blogin']);

$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_caisse_tmp ";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error()); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{
$sqlp="update  $tbl_caisse_tmp set  datecaisseT='$date' , blogin='$blogin'  ";
$resultp=mysqli_query($linki,$sqlp);

header("location: bcaisse.php");
}
else 
{

$sqlp="INSERT INTO $tbl_caisse_tmp  ( blogin  ,  datecaisseT  )
                    VALUES      ('$blogin','$date')";								
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error());

header("location: bcaisse.php");
}

?>