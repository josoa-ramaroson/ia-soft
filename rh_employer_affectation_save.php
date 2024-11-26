<?php
require 'fonction.php';
require 'configuration.php';

$id_nom=addslashes($_POST['id_nom']);
$id=$_POST['id'];

$iddirection=addslashes($_POST['direction']);
$idservice=addslashes($_POST['subcat']);


	if(!isset($iddirection)|| empty($iddirection)) {
	header("location:rh_employer_user.php?id=$idr");
	exit;
 }
  
 	if(!isset($idservice)|| empty($idservice)) {
	header("location:rh_employer_user.php?id=$idr");
	exit;
 }
 

$sql1 = "SELECT * FROM $tb_rhservice where idser=$idservice";
$result1 = mysqli_query($linki,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
$service=$row1['service'];
}  

$sql2 = "SELECT * FROM $tb_rhdirection where idrh=$iddirection";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$direction=$row2['direction'];
} 


$sql="update $tb_rhpersonnel  set 

 id_nom='$id_nom' , direction='$direction',  service='$service' WHERE idrhp LIKE '$_POST[id]' ";
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
