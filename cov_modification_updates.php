<?php
require 'fonction.php';
require 'configuration.php';
$date=addslashes($_POST['date']);
$idf=addslashes($_POST['idf']);
$id=addslashes($_POST['id']);
$id_nom=addslashes($_POST['id_nom']);
$st=$_POST['st'];
$montanti=addslashes($_POST['montanti']);
$montantf=addslashes($_POST['montantf']);
$obs=addslashes($_POST['obs']);

#---------------------------------------------------3 

$sqlp="update $tbl_fact  set  id_nom='$id_nom', date='$date', totalttc='$montantf', totalnet='$montantf', report='$montantf' WHERE  idf='$idf'";
$resultp=mysql_query($sqlp);

if($st=='F'){
echo $sqlbs="INSERT INTO $tbl_recplomb (idf, id, st, id_nom , ni, nf , obs, date , controle) VALUES ('$idf', '$id', '$st', '$id_nom','$montanti', '$montantf', '$obs', '$date', 1)";
$resultbs=mysql_query($sqlbs);
}
header("location:coi_facturation_liste.php");
?>