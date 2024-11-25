    <?
	require 'fonction.php';
	function stat_eda1($mois,$annee,$dbbk,$ARCH,$tbl_paiement, $id,$linkibk){
	$sql = "SELECT SUM(paiement) AS Paie , st FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where st='E' and MONTH(date)=$mois and YEAR(date)=$annee and id='$id' ";

	$resultat = mysqli_query($linkibk,$sql) or exit(mysqli_error()); 
	$nqt = mysqli_fetch_assoc($resultat);

	if((!isset($nqt['Paie'])|| empty($nqt['Paie']))) { $qt=0; return $qt;}
	else {$qt=$nqt['Paie']; return $qt;}

	}	
	?>
    
        <?
	//$annee=$_POST['annee']; 
	require 'fonction.php';
	$annee=$_REQUEST['annee'];
    $id=$_REQUEST['id'];
	$ARCH=$_REQUEST['annee'];
	
	$b13=stat_eda1(1,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b14=stat_eda1(2,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b15=stat_eda1(3,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b16=stat_eda1(4,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b17=stat_eda1(5,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b18=stat_eda1(6,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b19=stat_eda1(7,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b20=stat_eda1(8,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b21=stat_eda1(9,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b22=stat_eda1(10,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b23=stat_eda1(11,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);
	$b24=stat_eda1(12,$annee,$dbbk,$ARCH,$tbl_paiement,$id,$linkibk);

	?>

