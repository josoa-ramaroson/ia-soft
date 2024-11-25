<?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

$id_nom=addslashes($_POST['id_nom']);

$date_dem=addslashes($_POST['date_dem']);

$nomprenom=addslashes($_POST['nomprenom']);
$nomprenom=str_replace("'", '', ($nomprenom));

//IDENTIFICATION CODE QUARTIER """""""""""""""""""""""""""""""""
$iddirection=addslashes($_POST['direction']);
$idservice=addslashes($_POST['subcat']);


	if(!isset($iddirection)|| empty($iddirection)) {
	header("location:app_demande.php");
	exit;
 }
  
 	if(!isset($idservice)|| empty($idservice)) {
	header("location:app_demande.php");
	exit;
 }
 

$sql1 = "SELECT * FROM $tb_rhservice where idser=$idservice";
$result1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($result1)) {
$service=$row1['service'];
}  

$sql2 = "SELECT * FROM $tb_rhdirection where idrh=$iddirection";
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
$direction=$row2['direction'];
} 

$statut='Traitement';

//---------------------------------------------------------------------
$sql="INSERT INTO $tbl_appdemande ( id_nom , date_dem, nomprenom, direction, service, statut)

VALUES
('$id_nom' ,  '$date_dem', '$nomprenom', '$direction', '$service', '$statut')";
$result=mysql_query($sql);

mysql_close(); 
?>
<?php
header("location:app_demande.php");
?>
