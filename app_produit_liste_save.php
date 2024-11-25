<?php
    require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);
	
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
$resultp=mysql_query($sqlp);
if($resultp){
}
else {
echo "ERROR";
}
header("location: app_produit_liste.php");
?>