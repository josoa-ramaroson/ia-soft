<?php
 global $u_utilisateur;
	$u_login=addslashes($_POST['u_login']);
	$u_niveau=addslashes($_POST['u_niveau']);
	
	require 'fonction.php';
	$sql="SELECT * FROM $tbl_utilisateur WHERE u_login='$u_login'" ;
	$resultat= mysqli_query($linki,$sql);
	$u_utilisateur=mysqli_fetch_array($resultat);

	if ($u_utilisateur===FALSE)
	{
		header("location:utilisateursp.php");
		exit;
	} else {
$sqlp="update  $tbl_utilisateur set  u_niveau='$u_niveau' WHERE  u_login='$u_login'";
$resultp=mysqli_query($linki,$sqlp);

   header("location:deconnexion.php?id=".$u_utilisateur["id_u"]);
   }
?>