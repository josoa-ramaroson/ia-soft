<?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

$id_nom=addslashes($_POST['id_nom']);
$date_dem=addslashes($_POST['date_dem']);

$id_dem=addslashes($_POST['id_dem']);
$nomprenom=addslashes($_POST['nomprenom']);
$direction=addslashes($_POST['direction']);
$service=addslashes($_POST['service']);

$designation=addslashes($_POST['designation']);
$quantite=addslashes($_POST['quantite']);
$fournisseur=addslashes($_POST['fournisseur']);

//---------------------------------------------------------------------
$sql="INSERT INTO $tbl_appdeproduit ( id_dem, id_nom , date_dem, nomprenom, direction, service, designation, quantite,fournisseur )

VALUES
(  '$id_dem',  '$id_nom' ,  '$date_dem', '$nomprenom', '$direction', '$service', '$designation', '$quantite', '$fournisseur')";
$result=mysql_query($sql);

mysql_close(); 
?>
<?php
$idr=md5(microtime()).$id_dem;
header("location:app_demande_produit.php?id=$idr");
?>
