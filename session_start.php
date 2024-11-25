<?php
	require 'fonction.php';
	
	require 'scriptbsc.php';
	
	$sqlrech = "SELECT * FROM $tbl_caisse";	$reqrech = mysqli_query($linki,$sqlrech); $datarech=mysqli_fetch_array($reqrech);
    $anneereference=($datarech['valbsc']);
    $anneereference=substr($anneereference,64,32);
	
    if($anneereference!=$valbsc) {
	header("location:index.php?error=false");
	exit;
 }

?>