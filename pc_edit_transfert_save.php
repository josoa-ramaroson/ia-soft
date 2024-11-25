<?php
require 'fonction.php';

$id=addslashes($_POST['id']);
$id_u=addslashes($_POST['id_u']);

$sql9 ="SELECT id_u, u_nom , u_prenom  FROM $tbl_utilisateur  where id_u='$id_u'";
$result9 = mysql_query($sql9);

while ($row9 = mysql_fetch_assoc($result9)) {
$utilisateur=$row9['u_nom'].' '.$row9['u_prenom'];
}
$sql="update $tbl_pc  set  utilisateur='$utilisateur', id_u='$id_u' WHERE id='$id' ";


$result=mysql_query($sql);
   if($result){
	   //SUCCESS
	   $idr=md5(microtime()).$id;
	   header("location:pc_edit.php?id=$idr"); 
   }
   else {
   echo "ERROR";
   }
  mysql_close(); 
?>
