<?php
require 'session.php';
require 'fonction.php';

if(($_SESSION['u_niveau']!= 7) &&($_SESSION['u_niveau']!= 10)) {
	header("location:index.php?error=false");
	exit;
 }
 
$sqlfichier=($_REQUEST['sqlfichier']);


$date1=date("y/m/d H:i:s");
$date1 = str_replace("/","-",$date1);
$date1 = strtotime($date1);

$fichier='SQL'.'_'.'Editor'.'_'.'Extraction'.'_'.$date1.'.csv';

header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=$fichier");
$output = fopen('php://output', 'w');

fputcsv($output, array( ));
$rows = mysqli_query($linki,"$sqlfichier");
while ($row = mysqli_fetch_array($rows)) fputcsv($output, $row);

mysqli_close($linki);

?>

