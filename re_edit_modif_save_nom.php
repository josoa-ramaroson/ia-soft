<?php
require 'fonction.php';
require 'configuration.php';


$id_nom=addslashes($_POST['id_nom']);
$Designation=addslashes($_POST['Designation']);
$nomprenom=addslashes($_POST['nomprenom']);
$id=$_POST['id'];

$sql="update $tbl_contact  set id_nom='$id_nom', Designation='$Designation' , nomprenom='$nomprenom'  WHERE id='$id'";
$result=mysql_query($sql);

  if($result){

    $idr=md5(microtime()).$id;
	header("location:re_affichage_user.php?id=$idr");
		
   }
   else {
echo "ERROR";
   }
  mysql_close(); 
?>
