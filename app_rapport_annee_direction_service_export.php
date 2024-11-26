<?php
require 'session.php';
require 'fonction.php';

	if((($_SESSION['u_niveau'] != 40) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
 
 $annee=substr($_REQUEST["id"],32);
 $direction=$_REQUEST['dr'];
 $service=$_REQUEST['sr'];
 
 
$date= date("Ymd"); 
$fichier='APP_Export_achat'.'_'.$direction.'_'.$service.'.csv';


header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=$fichier");
$output = fopen('php://output', 'w');




//fputcsv($output, array('idf','id', 'Police', 'ci' , 'st', 'id_nom', 'bnom', 'bquartier', 'nfacture', 'fannee', 'nserie', 'date', 'datelimite', 'libelle' , 'nf' , 'n',  'nf2', 'n2' , 'cons', 'cons1', 'cons2', 't1', 't2', 'mont1', 'mont2', 'puisct', 'totalht', 'tax' , 'totalttc', 'ortc', 'impayee' , 'Pre', 'totalnet' , 'report', 'etat', 'bstatut', 'impression','coefTi' , 'miseajours'));
fputcsv($output, array( ));
$rows = mysqli_query($linki,"SELECT `id_nom`,`date_dem`,`direction`,`service`,`designation`,`quantite`,`prixu`,`prixt` FROM $tbl_appbonachatp where  YEAR(date_dem)='$annee' and direction='$direction' and  service='$service' order by direction ,service");
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);

mysqli_close($linki);
?>