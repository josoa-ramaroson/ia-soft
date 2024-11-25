    <?
	require 'fonction.php';
	function stat_eda($mois,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk){
	$sql = "SELECT SUM(cons) AS cons, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet,  nserie , fannee , st 
	FROM $dbbk.z_"."$ARCH"."_$tbl_fact where  st='E' and  fannee='$annee'  and nserie='$mois'"; 
	$resultat = mysqli_query($linkibk,$sql) or exit(mysqli_error()); 
	$nqt = mysqli_fetch_assoc($resultat);

	if((!isset($nqt['cons'])|| empty($nqt['cons']))) { $qt=0; return $qt;}
	else {$qt=$nqt['cons']; return $qt;}

	}	
	?>
    
        <?
	//$annee=$_POST['annee']; 
	require 'fonction.php';
	$annee=$_REQUEST['annee']; 
	$ARCH=$_REQUEST['annee'];
	$b1=stat_eda(1,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b2=stat_eda(2,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b3=stat_eda(3,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b4=stat_eda(4,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b5=stat_eda(5,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b6=stat_eda(6,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b7=stat_eda(7,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b8=stat_eda(8,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b9=stat_eda(9,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b10=stat_eda(10,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b11=stat_eda(11,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);
	$b12=stat_eda(12,$annee,$dbbk,$ARCH,$tbl_fact,$linkibk);

	?>

