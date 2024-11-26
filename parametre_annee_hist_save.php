<?php
require 'fonction.php';

 $annee=addslashes($_POST['annee']);
 $verification=addslashes($_POST['verification']);



if ($verification <= $annee  )
{
header("location: parametre_annee_hist.php");
exit;
}

$sqlcomp = "SELECT count(*) FROM anneeref  WHERE  annee='$annee' ";  
$resultatcomp = mysqli_query($linki,$sqlcomp) or die('Erreur SQL !<br />'.$sqlcomp.'<br />'.mysqli_error($linki));  
$nb_total = mysqli_fetch_array($resultatcomp); 

if (($nb_total = $nb_total[0]) == 0) {   


$sqlp1="INSERT INTO anneeref ( annee)
                    VALUES      ( '$annee')";								
$r1=mysqli_query($linki,$sqlp1) or die(mysqli_error($linki));


$sqlp2="INSERT INTO z_annee ( annee)
                    VALUES      ( '$annee')";								
$r2=mysqli_query($linki,$sqlp2) or die(mysqli_error($linki));

mysqli_close($linki);

header("location: parametre_annee_hist.php");

} 
  else 

{  

header("location: parametre_annee_hist.php");

}  




?>