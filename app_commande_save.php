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
$result1 = mysqli_query($linki,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
$service=$row1['service'];
}  

$sql2 = "SELECT * FROM $tb_rhdirection where idrh=$iddirection";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$direction=$row2['direction'];
} 

$statut='Traitement';

$num1=date("Y", strtotime($date_dem));
$num2=date("m", strtotime($date_dem));
$num3='SAPP';
$num=$num1.$num2.'/'.$num3;


//---------------------------------------------------------------------
$sql="INSERT INTO $tbl_appcommande ( id_nom , date_dem, nomprenom, direction, service, statut, num)

VALUES
('$id_nom' ,  '$date_dem', '$nomprenom', '$direction', '$service', '$statut', '$num')";
$result=mysqli_query($linki,$sql);

mysqli_close($linki); 
?>
<?php
header("location:app_commande.php");
?>
