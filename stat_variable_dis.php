    <?
	require 'fonction.php';
	function stat_eda3($mois,$annee,$tbl_production){
	$sql = "SELECT * FROM $tbl_production where  mois=$mois and  annee=$annee ";

	$resultat = mysql_query($sql) or exit(mysql_error()); 
	$nqt = mysql_fetch_assoc($resultat);

	if((!isset($nqt['dist'])|| empty($nqt['dist']))) { $qt=0; return $qt;}
	else {$qt=$nqt['dist']; return $qt;}

	}	
	?>
    
        <?
	//$annee=$_POST['annee']; 
	require 'fonction.php';
	$annee=$_REQUEST['annee'];
	$b31=stat_eda3(1,$annee,$tbl_production);
	$b32=stat_eda3(2,$annee,$tbl_production);
	$b33=stat_eda3(3,$annee,$tbl_production);
	$b34=stat_eda3(4,$annee,$tbl_production);
	$b35=stat_eda3(5,$annee,$tbl_production);
	$b36=stat_eda3(6,$annee,$tbl_production);
	$b37=stat_eda3(7,$annee,$tbl_production);
	$b38=stat_eda3(8,$annee,$tbl_production);
	$b39=stat_eda3(9,$annee,$tbl_production);
	$b40=stat_eda3(10,$annee,$tbl_production);
	$b41=stat_eda3(11,$annee,$tbl_production);
	$b42=stat_eda3(12,$annee,$tbl_production);

	?>

