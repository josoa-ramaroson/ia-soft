<?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

// Récupération et nettoyage des données
$id_nom = mysqli_real_escape_string($linki, $_POST['id_nom']);
$date_dem = mysqli_real_escape_string($linki, $_POST['date_dem']);
$fournisseur = mysqli_real_escape_string($linki, $_POST['fournisseur']);
$fournisseur = str_replace("'", '', $fournisseur);
$fournisseur = ucfirst(strtolower($fournisseur));

// Vérification des identifiants direction et service
$iddirection = mysqli_real_escape_string($linki, $_POST['direction']);
$idservice = mysqli_real_escape_string($linki, $_POST['subcat']);

// Validation des données
if(!isset($iddirection) || empty($iddirection)) {
    header("location:app_bonachat.php");
    exit;
}
if(!isset($idservice) || empty($idservice)) {
    header("location:app_bonachat.php");
    exit;
}

// Récupération du service
$sql1 = "SELECT * FROM $tb_rhservice WHERE idser=$idservice";
$result1 = mysqli_query($linki, $sql1);
$service = '';
while ($row1 = mysqli_fetch_assoc($result1)) {
    $service = $row1['service'];
}
mysqli_free_result($result1);

// Récupération de la direction
$sql2 = "SELECT * FROM $tb_rhdirection WHERE idrh=$iddirection";
$result2 = mysqli_query($linki, $sql2);
$direction = '';
while ($row2 = mysqli_fetch_assoc($result2)) {
    $direction = $row2['direction'];
}
mysqli_free_result($result2);

$statut = 'Traitement';

// Insertion des données
$sql = "INSERT INTO $tbl_appbonachat (id_nom, date_dem, fournisseur, direction, service, statut) 
        VALUES ('$id_nom', '$date_dem', '$fournisseur', '$direction', '$service', '$statut')";

$result = mysqli_query($linki, $sql) or die(mysqli_error($linki));

// Redirection
header("location:app_bonachat.php");
?>