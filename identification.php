<?php
	global $u_utilisateur;
	$login=addslashes($_POST['m1']);
	$motdepasse=(md5($_POST['m2']));
	
	require 'fonction.php';
	
	// $link = mysqli_connect ($host,$user,$pass);
	// mysqli_select_db($db);
	//require 'fonction.php';

	$sql = "SELECT * FROM $tbl_utilisateur WHERE u_login='$_POST[m1]' AND u_pwd='$motdepasse' AND statut='Operationnel'";
	$resultat = mysqli_query($linki, $sql);
	 
	$u_utilisateur = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
	
	if (!$u_utilisateur || empty($u_utilisateur))
	{	
		header("location:index.php?a=false");
		exit;
	} else {
		session_start();
		$_SESSION['u_login']=$_POST['m1'];
		$_SESSION['niveau']=$u_utilisateur['u_niveau'];
		$_SESSION['privileges']=$u_utilisateur['privileges'];
		$_SESSION['SID']=$u_utilisateur['id_u'];
		$_SESSION['APP']='111fc469d902d74a481bae7b217f4e58';
		$_SESSION['id_user'] = $u_utilisateur['id_u'];
		$_SESSION['u_niveau'] = $u_utilisateur['u_niveau'];
	    $idsession=$u_utilisateur['id_u'];
		$sqlp="update $tbl_utilisateur  set session=1  WHERE  id_u='$idsession'";
        $resultp=mysqli_query($linki,$sqlp);
		
		
		header("location:welcome.php");
		}
?>
