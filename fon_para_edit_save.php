<?php
require 'fonction.php';
$id_nom=addslashes($_POST['id_nom']);
$idfon_sys=addslashes($_POST['id']);
$annee2=addslashes($_POST['annee2']);
$date2=addslashes($_POST['date2']);

$annee2A=addslashes($_POST['annee2A']);
$date2A=addslashes($_POST['date2A']);

$annee=addslashes($_POST['annee']);
$annee_facturation=addslashes($_POST['annee_facturation']);
$annee_recouvrement=addslashes($_POST['annee_recouvrement']);


$sql="update fonction_systeme  set  

annee2='$annee2',
date2='$date2',
annee2A='$annee2A',
date2A='$date2A',
annee='$annee',
annee_facturation='$annee_facturation',
annee_recouvrement='$annee_recouvrement',
id_nom='$id_nom'
  WHERE idfon_sys='$idfon_sys' ";


$result=mysql_query($sql);
   if($result){
	   //SUCCESS
	   header("location:fon_para_affichage.php");
   }
   else {
   echo "ERROR";
   }
  mysql_close(); 
?>
