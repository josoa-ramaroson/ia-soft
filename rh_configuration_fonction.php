<?php
//----------------parametre de configuration--------
$sqlpaie = "SELECT * FROM $tb_rhconfig";
$resultpaie = mysqli_query($linki,$sqlpaie);
while ($rowpaie = mysqli_fetch_assoc($resultpaie)) {
$anneepaie=$rowpaie['annee'];
$moispaie=$rowpaie['mois'];
$tauxsalaire=$rowpaie['taux'];
$aigr=$rowpaie['aigr'];
$acr=$rowpaie['acr'];


      $moispaie=$rowpaie['mois']; 
	  if ($moispaie==1) $affichemois='Janvier';
	  if ($moispaie==2) $affichemois='Fevrier'; 
	  if ($moispaie==3) $affichemois='Mars';
	  if ($moispaie==4) $affichemois='Avril'; 
	  if ($moispaie==5) $affichemois='Mai'; 
	  if ($moispaie==6) $affichemois='Juin'; 
	  if ($moispaie==7) $affichemois='Juillet'; 
	  if ($moispaie==8) $affichemois='Aout'; 
	  if ($moispaie==9) $affichemois='Septembre'; 
	  if ($moispaie==10) $affichemois='Octobre';
	  if ($moispaie==11) $affichemois='Novembre'; 
	  if ($moispaie==12) $affichemois='Decembre';  

} 

if(!isset($anneepaie)|| empty($anneepaie)) {
	$anneepaie='Veuillez configure l annee '; 
	} 

if(!isset($moispaie)|| empty($moispaie)) {
	$affichemois='Veuillez configure le mois -----'; 
	} 	
	
//--------------------------------------------------- 
?>