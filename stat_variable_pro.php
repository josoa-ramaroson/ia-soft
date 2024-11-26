    <?php
 	require_once 'fonction.php';
	?>
	<?php
	function stat_eda1($mois,$annee,$tbl_production){
		global $linki;
	$sql = "SELECT * FROM $tbl_production where  mois=$mois and  annee=$annee ";
	$resultat = mysqli_query($linki, $sql);
	$nqt = mysqli_fetch_assoc($resultat);
	if((!isset($nqt['prod'])|| empty($nqt['prod']))) { $qt=0; return $qt;}
	else {$qt=$nqt['prod']; return $qt;}

	}	
 //$annee=$_POST['annee']; 
	
	$annee=$_REQUEST['annee'];
	$b13=stat_eda1(1,$annee,$tbl_production);
	$b14=stat_eda1(2,$annee,$tbl_production);
	$b15=stat_eda1(3,$annee,$tbl_production);
	$b16=stat_eda1(4,$annee,$tbl_production);
	$b17=stat_eda1(5,$annee,$tbl_production);
	$b18=stat_eda1(6,$annee,$tbl_production);
	$b19=stat_eda1(7,$annee,$tbl_production);
	$b20=stat_eda1(8,$annee,$tbl_production);
	$b21=stat_eda1(9,$annee,$tbl_production);
	$b22=stat_eda1(10,$annee,$tbl_production);
	$b23=stat_eda1(11,$annee,$tbl_production);
	$b24=stat_eda1(12,$annee,$tbl_production);

	?>

