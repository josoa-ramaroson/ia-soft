<?php
require 'fonction.php';
$id_nom=addslashes($_POST['id_nom']);

$id=addslashes($_POST['id']);
//echo  $id;
$idpc=addslashes($_POST['idpc']);

$realisateur=addslashes($_POST['realisateur']);
$suivi=addslashes($_POST['suivi']);
$date=date("y/m/d H:i:s"); 


$sql="update $tbl_pctaches  set realisateur='$realisateur', suivi='$suivi' , date='$date' WHERE id='$id' and idpc='$idpc' ";
$result=mysql_query($sql);
   if($result){
	   //SUCCESS
	   $idr=md5(microtime()).$id;
	   header("location:pc_affichage_user.php?id=$idr");
   }
   else {
   echo "ERROR";
   }
  mysql_close(); 
?>
