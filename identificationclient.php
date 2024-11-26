<?php
 global $u_utilisateur;
	$login=addslashes($_POST['m1']);
	$pwd=addslashes($_POST['m2']);
	require 'fonction.php';
	$sql="SELECT * FROM $tbl_contact WHERE login='$login' and pwd='$pwd'" ;
	$resultat= mysqli_query($linki,$sql);
	$u_utilisateur=mysqli_fetch_array($resultat);

	if ($u_utilisateur===FALSE)
	{
		header("location:index.php?error=false");
		exit;
	} else {
			@session_start();
			$_SESSION['pwd']=$u_utilisateur['pwd'];
			$_SESSION['id']=$u_utilisateur['id'];
			
			$_SESSION['pwd']=$pwd;
			$id=$u_utilisateur['id'];
		    $id=md5(microtime()).$id;
			$_SESSION['s']='8969b6b78258738cd6edb200a1f0ebaf'; 
			header("location:co_user.php?id=$id");
		}
?>
