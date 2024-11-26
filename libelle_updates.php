<?php
    require 'fonction.php';
	
$idL=addslashes($_POST['idL']);
$libelle=addslashes($_POST['libelle']);
$categorie=addslashes($_POST['categorie']);
$id_nom=addslashes($_POST['id_nom']);
 
#---------------------------------------------------3 
$sqlp="update  $tbl_libelle  set  id_nom='$id_nom', libelle='$libelle' , categorie='$categorie'    WHERE  idL='$idL'";
$resultp=mysqli_query($linki,$sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysqli_close($linki);
?>
<?php
header("location: libelle.php");
?>