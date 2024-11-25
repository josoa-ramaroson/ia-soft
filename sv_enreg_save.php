<?php
require 'fonction.php';
//Information de la personne
$id_nom=addslashes($_POST['id_nom']);
$id=addslashes($_POST['id']);
$nomprenom=addslashes($_POST['nomprenom']);

//Information de l'activite 
$c1=addslashes($_POST['c1']);
$c2=addslashes($_POST['c2']);
$c3=addslashes($_POST['c3']);
$c4=addslashes($_POST['c4']);
$d1=addslashes($_POST['d1']);
$d2=addslashes($_POST['d2']);


$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_plombage  WHERE id='$id'";
$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
$nb = mysql_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{
	
$sqlh="update $tbl_plombage  set  id_nom='$id_nom',  c1='$c1' , c2='$c2' ,c3='$c3' ,c4='$c4' ,d1='$d1' ,d2='$d2'  WHERE id='$id'";
$resulth=mysql_query($sqlh);

echo $idr=md5(microtime()).$id;
header("location:re_affichage_user.php?id=$idr");
}
else 
{
$sql="INSERT INTO $tbl_plombage ( id, id_nom, c1, c2 , c3, c4 , d1, d2)
VALUES
( '$id', '$id_nom' , '$c1', '$c2' ,  '$c3' ,  '$c4' , '$d1', '$d2')";
$result=mysql_query($sql);
$idr=md5(microtime()).$id;
header("location:re_affichage_user.php?id=$idr");
 } 
?>
