<?php
require 'session.php';
require 'fonction.php';

if(($_SESSION['u_niveau']!= 7) &&($_SESSION['u_niveau']!= 10)) {
	header("location:index.php?error=false");
	exit;
 }
 
$date= date("Ymd"); 
//$fichier='EDA'.'_'.'Upload'.'_'.'Billing'.'_'.$date.'.bsc';
$fichier='EDA'.'_'.'Upload'.'_'.'client'.'.bsc';

header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=$fichier");
$output = fopen('php://output', 'w');



fputcsv($output, array( ));
$rows = mysqli_query($linki,"SELECT * FROM $tbl_contact  where miseajours=1 and syn=1");
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);

mysqli_close($linki);
?>