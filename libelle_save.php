<?php
$libelle=addslashes($_POST['libelle']);
$categorie=addslashes($_POST['categorie']);
$id_nom=addslashes($_POST['id_nom']);

require 'fonction.php';

$sqlp="INSERT INTO $tbl_libelle   ( libelle   , categorie   ,id_nom  )
                    VALUES    ('$libelle','$categorie', '$id_nom' )";
					
													
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error());
mysqli_close($link);

?>
<?php
header("location: libelle.php");
?>