<?php
require 'session.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';

//$fichier='EDA'.'_'.$affichemois.'_'.$anneepaie.'.csv';
$fichier='EDA'.'_'.'RETENUES'.'_'.$affichemois.'_'.$anneepaie.'.bsc';

header('Content-Type: text/csv; charset=utf-8');
//header('Content-Disposition: attachment; filename=data.csv');
header("Content-Disposition: attachment; filename=$fichier");
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('NTC','Matricule', 'Direction', 'Service', 'Fonction', 'nom prenom', 'moispaie', 'anneepaie', 'sbase', 'IGR', 'retraite', 'Prevoyance',  'Retenue'));

$rows = mysql_query("SELECT n.NTC, p.matricule, p.direction, p.service, p.titre, p.nomprenom, p.moispaie, p.anneepaie, p.sbase, p.igr, p.retraite, p.prevoyance,  p.aretenue FROM $tb_rhpaie p, $tb_rhpersonnel n where p.idrh=n.idrhp and  moispaie='$moispaie' and anneepaie='$anneepaie'");




// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
?>