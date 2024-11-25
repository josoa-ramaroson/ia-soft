    <?
	require 'fonction.php';
	function stat_eda1($mois,$annee,$tbl_paiement){
	$sql = "SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='E' and MONTH(date)=$mois and YEAR(date)=$annee ";

	$resultat = mysql_query($sql) or exit(mysql_error()); 
	$nqt = mysql_fetch_assoc($resultat);

	if((!isset($nqt['Paie'])|| empty($nqt['Paie']))) { $qt=0; return $qt;}
	else {$qt=$nqt['Paie']; return $qt;}

	}	
	?>
    
        <?
	//$annee=$_POST['annee']; 
	require 'fonction.php';
	$annee=$_REQUEST['annee'];
	$b13=stat_eda1(1,$annee,$tbl_paiement);
	$b14=stat_eda1(2,$annee,$tbl_paiement);
	$b15=stat_eda1(3,$annee,$tbl_paiement);
	$b16=stat_eda1(4,$annee,$tbl_paiement);
	$b17=stat_eda1(5,$annee,$tbl_paiement);
	$b18=stat_eda1(6,$annee,$tbl_paiement);
	$b19=stat_eda1(7,$annee,$tbl_paiement);
	$b20=stat_eda1(8,$annee,$tbl_paiement);
	$b21=stat_eda1(9,$annee,$tbl_paiement);
	$b22=stat_eda1(10,$annee,$tbl_paiement);
	$b23=stat_eda1(11,$annee,$tbl_paiement);
	$b24=stat_eda1(12,$annee,$tbl_paiement);

	?>

