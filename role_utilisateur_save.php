<?php
  $id_role=addslashes($_POST['id_role']);
	 $id_user=addslashes($_POST['id_user']);
	
	require 'fonction.php';
	
	$sqlu="SELECT * FROM $tb_role_type WHERE id_role='$id_role'" ;
	$resultatu= mysqli_query($linki,$sqlu);
    $rowu = mysqli_fetch_array($resultatu);
	$u_niveau=$rowu['niveau'];
	$type=$rowu['nom_role'];
	
   $sqlp="update  $tbl_utilisateur set  u_niveau='$u_niveau' , type= '$type' WHERE  id_u='$id_user'";
   $resultp=mysqli_query($linki,$sqlp);
   $idss=md5(microtime()).$id_user;
   mysqli_close($linki);
   header("location:welcome.php");

   //header("location:deconnexion.php?id=$idss");
   
?>