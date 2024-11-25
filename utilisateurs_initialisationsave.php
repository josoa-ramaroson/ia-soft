<?
   
   	global $u_utilisateur;
	$u_login=addslashes($_POST['u_login']);
	$mois=date("m");  
    $jour=date("d");
	$valeur=$u_login.$jour.$mois;
	$u_pwd=md5(addslashes($valeur));
	require 'fonction.php';
	$sqlp="update  $tbl_utilisateur set  u_pwd='$u_pwd' WHERE  u_login='$u_login'";
	$resultp=mysqli_query($linki,$sqlp);
    header("location:utilisateurs.php");

?>