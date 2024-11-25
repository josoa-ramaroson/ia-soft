<?php
$datev=addslashes($_POST['datev']);
$titre=addslashes($_POST['titre']); 
$Qvente=addslashes($_POST['Qvente']); 
$PUnitaire=addslashes($_POST['PUnitaire']);
$id_nom=addslashes($_POST['id_nom']);
$nc=addslashes($_POST['nc']);
$a_nom=addslashes($_POST['a_nom']);

//$PTotal=addslashes($_POST['PTotal']); 
$PTotal=$Qvente*$PUnitaire;

if ($nc >='500000') { $type='1';} else { $type='0';}

require 'fonction.php';

$sqlp="INSERT INTO $tbl_vente  ( datev  , titre  , Qvente  ,  PUnitaire   , PTotal ,nc, a_nom, id_nom , type  )
                    VALUES    ('$datev','$titre','$Qvente', '$PUnitaire', '$PTotal','$nc', '$a_nom', '$id_nom' , '$type')";
					
$r=mysqli_query($linki,$sqlp)

or die(mysqli_error());
mysqli_close($linki);
header("location: stk_vente_g.php");
?>