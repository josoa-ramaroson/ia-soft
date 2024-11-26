<?php 	
	
	function le_statut($sta,$tb_role_statut,$linki){
	$sqlpro3 = "SELECT * FROM $tb_role_statut where id_statut='$sta'";
	$resultatpro3 = mysqli_query($linki,$sqlpro3); 
	$nqtpro3 = mysqli_fetch_assoc($resultatpro3);
	if((!isset($nqtpro3['nom_statut'])|| empty($nqtpro3['nom_statut']))) { $pro3=''; return $pro3;}
	else {$pro3=$nqtpro3['nom_statut']; return $pro3;}
	}

?>