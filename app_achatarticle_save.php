<?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

$id_nom=addslashes($_POST['id_nom']);
$date_dem=addslashes($_POST['date_dem']);

$fournisseur=addslashes($_POST['fournisseur']);

$designation=addslashes($_POST['designation']);
$quantite=addslashes($_POST['quantite']);
$prixu=addslashes($_POST['prixu']);
$prixt=$prixu*$quantite;

$codecompte=addslashes($_POST['codecompte']);


$iddirection=addslashes($_POST['direction']);
$idservice=addslashes($_POST['subcat']);


	if(!isset($iddirection)|| empty($iddirection)) {
	header("location:app_achatarticle.php");
	exit;
 }
  
 	if(!isset($idservice)|| empty($idservice)) {
	header("location:app_achatarticle.php");
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


//---------------------------------------------------------------------
$sql="INSERT INTO $tbl_appachat ( id_nom , date_dem, fournisseur, direction, service, designation, quantite, prixu, prixt, codecompte )

VALUES
(   '$id_nom' ,  '$date_dem', '$fournisseur', '$direction', '$service', '$designation', '$quantite', '$prixu', '$prixt' , '$codecompte')";
$result=mysql_query($sql);

mysql_close(); 
?>
<?php
header("location:app_achatarticle.php");
?>
