<?php
require 'fonction.php';
require 'configuration.php';

$id_nom=addslashes($_POST['id_nom']);
$id=$_POST['id'];
$nconge=addslashes($_POST['nconge']);


$sql="update $tb_rhpersonnel  set 

 id_nom='$id_nom' , nconge='$nconge' WHERE idrhp LIKE '$_POST[id]' ";
$result=mysqli_query($linki,$sql);

  if($result){
	   //SUCCESS
	   $idr=md5(microtime()).$id;
	   header("location:rh_employer_user.php?id=$idr");
   }
   else {
   echo "ERROR";
   }
  mysqli_close($linki); 
?>
