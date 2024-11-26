<?php
require 'fonction.php';
$id_nom=addslashes($_POST['id_nom']);
$id=substr($_REQUEST["id"],32);
//Information de l'activite 
$c1=addslashes($_POST['c1']);
$c2=addslashes($_POST['c2']);
$c3=addslashes($_POST['c3']);
$c4=addslashes($_POST['c4']);
$d1=addslashes($_POST['d1']);
$d2=addslashes($_POST['d2']);


$sql="update $tbl_plombage  set  id_nom='$id_nom',  c1='$c1' , c2='$c2' ,c3='$c3' ,c4='$c4' ,d1='$d1' ,d2='$d2'  WHERE id='$id'";
$result=mysqli_query($linki,$sql);
   if($result){
	   $idr=md5(microtime()).$id;
	   header("location:re_affichage_user.php?id=$idr");
   }
   else {
	   $idr=md5(microtime()).$id;
	   header("location:re_affichage_user.php?id=$idr");
   }
  mysqli_close($linki); 
?>
