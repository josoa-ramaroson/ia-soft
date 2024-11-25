<?php
require 'fonction.php';

$datev=addslashes($_POST['datev']);

$idproduit=addslashes($_POST['idproduit']);
$sql5 = "SELECT * FROM $tbl_produit where idproduit=$idproduit";
$result5 = mysql_query($sql5);
while ($row5 = mysql_fetch_assoc($result5)) {
$titre=$row5['titre'];
} 
$Qvente=addslashes($_POST['Qvente']); 
$prix=addslashes($_POST['prix']);
$id_nom=addslashes($_POST['id_nom']);
$nc=addslashes($_POST['nc']);
$a_nom=addslashes($_POST['a_nom']);

$PTotal=$Qvente*$prix;

if ($nc >='500000') { $type='1';} else { $type='0';}

echo $sqlp="INSERT INTO $tbl_vente  ( datev  , titre  , Qvente  ,  PUnitaire   , PTotal ,nc, a_nom, id_nom , type  )
                    VALUES    ('$datev','$titre','$Qvente', '$prix', '$PTotal','$nc', '$a_nom', '$id_nom' , '$type')";
					
$r=mysqli_query($linki,$sqlp)

or die(mysqli_error());
mysqli_close($linki);
header("location: stk_vente.php");
?>