<?
if(($_SESSION['u_niveau']!= 90) && ($_SESSION['u_niveau'] != 7)) {
	header("location:index.php?error=false");
	exit;
 }
?>
