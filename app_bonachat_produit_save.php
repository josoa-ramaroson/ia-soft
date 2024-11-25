<?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

$id_nom=addslashes($_POST['id_nom']);
$date_dem=addslashes($_POST['date_dem']);

$id_dem=addslashes($_POST['id_dem']);
$fournisseur=addslashes($_POST['fournisseur']);
$direction=addslashes($_POST['direction']);
$service=addslashes($_POST['service']);

$designation=addslashes($_POST['designation']);
$quantite=addslashes($_POST['quantite']);
$prixu=addslashes($_POST['prixu']);
$prixt=$prixu*$quantite;

//---------------------------------------------------------------------
$sql="INSERT INTO $tbl_appbonachatp ( id_dem, id_nom , date_dem, fournisseur, direction, service, designation, quantite, prixu, prixt )

VALUES
(  '$id_dem',  '$id_nom' ,  '$date_dem', '$fournisseur', '$direction', '$service', '$designation', '$quantite', '$prixu', '$prixt')";
$result=mysql_query($sql);

mysql_close(); 
?>
<?php
$idr=md5(microtime()).$id_dem;
header("location:app_bonachat_produit.php?id=$idr");
?>
