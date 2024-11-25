<?php
$date=addslashes($_POST['date']);
$titre=addslashes($_POST['titre']); 
$Quantite=addslashes($_POST['Quantite']); 
$Validite=addslashes($_POST['Validite']); 
//$PrixUnitaire=addslashes($_POST['PrixUnitaire']); 
$id_nom=addslashes($_POST['id_nom']);
$a_nom=addslashes($_POST['a_nom']);

require 'fonction.php';

$sqlp="INSERT INTO $tbl_enreg ( date  , titre  , Quantite  ,  Validite   , PrixUnitaire , a_nom, id_nom )
                    VALUES    ('$date','$titre','$Quantite', '$Validite', '',          '$a_nom','$id_nom' )";
					
$r=mysqli_query($linki,$sqlp)

or die(mysqli_error());
mysqli_close($link);
?>
<?php
header("location: stk_enregistrement.php");
?>