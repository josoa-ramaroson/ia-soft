<?php
    require 'fonction.php';
	
$idL=addslashes($_POST['idL']);
$libelle=addslashes($_POST['libelle']);
$categorie=addslashes($_POST['categorie']);
$id_nom=addslashes($_POST['id_nom']);
 
#---------------------------------------------------3 
$sqlp="update  $tbl_libelle  set  id_nom='$id_nom', libelle='$libelle' , categorie='$categorie'    WHERE  idL='$idL'";
$resultp=mysql_query($sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysql_close();
?>
<?php
header("location: libelle.php");
?>