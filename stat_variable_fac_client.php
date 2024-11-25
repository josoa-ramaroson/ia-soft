    <?
	require 'fonction.php';
	function stat_eda($mois,$annee,$tv_facturation, $id){
	$sql = "SELECT SUM(cons) AS cons, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , st 
	FROM $tv_facturation where  st='E' and  fannee='$annee'  and nserie='$mois' and id='$id' "; 
	$resultat = mysql_query($sql) or exit(mysql_error()); 
	$nqt = mysql_fetch_assoc($resultat);

	if((!isset($nqt['totalnet'])|| empty($nqt['totalnet']))) { $qt=0; return $qt;}
	else {$qt=$nqt['totalnet']; return $qt;}

	}	
	?>
    
        <?
	//$annee=$_POST['annee']; 
	require 'fonction.php';
	$annee=$_REQUEST['annee']; 
	$id=$_REQUEST['id'];
	
	$b1=stat_eda(1,$annee,$tv_facturation,$id);
	$b2=stat_eda(2,$annee,$tv_facturation,$id);
	$b3=stat_eda(3,$annee,$tv_facturation,$id);
	$b4=stat_eda(4,$annee,$tv_facturation,$id);
	$b5=stat_eda(5,$annee,$tv_facturation,$id);
	$b6=stat_eda(6,$annee,$tv_facturation,$id);
	$b7=stat_eda(7,$annee,$tv_facturation,$id);
	$b8=stat_eda(8,$annee,$tv_facturation,$id);
	$b9=stat_eda(9,$annee,$tv_facturation,$id);
	$b10=stat_eda(10,$annee,$tv_facturation,$id);
	$b11=stat_eda(11,$annee,$tv_facturation,$id);
	$b12=stat_eda(12,$annee,$tv_facturation,$id);

	?>

