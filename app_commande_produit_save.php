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
$prixu=addslashes($_POST['prixu']);
$prixt=$prixu*$quantite;

$idfournisseur=addslashes($_POST['fournisseur']);

$sqlS = "SELECT * FROM $tb_comptf  where idf=$idfournisseur";
$resultS = mysql_query($sqlS);
$rowS = mysql_fetch_assoc($resultS);
$fournisseur=$rowS['Societef'];

//---------------------------------------------------------------------
$sql="INSERT INTO $tbl_appcoproduit ( id_dem, id_nom , date_dem, nomprenom, direction, service, designation, quantite, prixu, prixt, fournisseur , idfournisseur )

VALUES
(  '$id_dem',  '$id_nom' ,  '$date_dem', '$nomprenom', '$direction', '$service', '$designation', '$quantite', '$prixu', '$prixt', '$fournisseur', '$idfournisseur')";
$result=mysqli_query($linki,$sql);

mysqli_close($linki); 
?>
<?php
$idr=md5(microtime()).$id_dem;
header("location:app_commande_produit.php?id=$idr");
?>
