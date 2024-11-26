<?php
    require 'fonction.php';
 
$idproduit=addslashes($_POST['idp']);
//echo "$idproduit <BR>";	
$titre=addslashes($_POST['mproduit']);
//echo "$titre <BR>";
if(empty($titre)) 
{ 
exit(); 
}
#---------------------------------------------------3 
$prix=addslashes($_POST['prix']);

$type=addslashes($_POST['type']);

$id_nom='';
$sqlp="update $tbl_appproduit_liste set titre='$titre' , idproduit='$idproduit', prix='$prix' , id_nom='$id_nom' , type='$type' 
WHERE  idproduit='$idproduit'";
$resultp=mysqli_query($linki, $sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysqli_close($linki);
header("location:app_produit_liste.php");
?>