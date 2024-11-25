<?php
require 'fonction.php';
require 'configuration.php';

$id_nom=addslashes($_POST['id_nom']);
$id=$_POST['id'];
$igrchoix=addslashes($_POST['igrchoix']);
$crchoix=addslashes($_POST['crchoix']);


$sql="update $tb_rhpersonnel  set 

 id_nom='$id_nom' , igrchoix='$igrchoix' , crchoix='$crchoix' WHERE idrhp LIKE '$_POST[id]' ";
$result=mysql_query($sql);

  if($result){
	   //SUCCESS
	   $idr=md5(microtime()).$id;
	   header("location:rh_employer_user.php?id=$idr");
   }
   else {
   echo "ERROR";
   }
  mysql_close(); 
?>
