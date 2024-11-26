<?php
require_once "fonction.php";

// Vérification de la présence du paramètre
if(!isset($_GET['refville'])) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Paramètre refville manquant']);
    exit;
}

$refville = $_GET['refville'];

// Validation plus stricte
if(!is_numeric($refville) || $refville < 0) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Paramètre refville invalide']);
    exit;
}

// Échappement pour prévenir les injections SQL
$refville = mysqli_real_escape_string($linki, $refville);

$sql = "SELECT quartier, id_quartier FROM quartier WHERE refville = '$refville'";
$result = mysqli_query($linki, $sql);

if(!$result) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => 'Erreur base de données']);
    exit;
}

$result_array = array();
while($row = mysqli_fetch_assoc($result)) {
    $result_array[] = $row;
}

header('Content-Type: application/json');
echo json_encode(['data' => $result_array]);