<?php
    require 'fonction.php';
  
$id_nom=addslashes($_POST['id_nom']);	
$titre=addslashes($_POST['titre']);
$type=addslashes($_POST['type']);
//echo "$titre <BR>";
if(empty($titre)) 
{ 
exit(); 
}
#---------------------------------------------------3 
$prix=addslashes($_POST['prix']);

$sqlp="INSERT INTO $tbl_appproduit_liste (titre , prix ,id_nom, type ) VALUES ('$titre','$prix','$id_nom', '$type' )";
$resultp=mysqli_query($linki, $sqlp);
if($resultp){
}
else {
echo "ERROR";
}
header("location: app_produit_liste.php");
?>