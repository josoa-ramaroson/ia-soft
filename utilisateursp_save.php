<?
	global $u_utilisateur;
	$u_login=addslashes($_POST['u_login']);
	$u_niveau=addslashes($_POST['u_niveau']);
	
	require 'fonction.php';
	$sql="SELECT * FROM $tbl_utilisateur WHERE u_login='$u_login'" ;
	$resultat= mysql_query($sql);
	$u_utilisateur=mysql_fetch_array($resultat);

	if ($u_utilisateur===FALSE)
	{
		header("location:utilisateursp.php");
		exit;
	} else {
$sqlp="update  $tbl_utilisateur set  u_niveau='$u_niveau' WHERE  u_login='$u_login'";
$resultp=mysql_query($sqlp);

   header("location:deconnexion.php");
   }
?>