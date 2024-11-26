<?php
require "fonction.php"; // le variable de connexion Mysqli $linki est définie ici

@$idrh = $_GET['idrh'];

// Preventing injection attack
if (!is_numeric($idrh)) {
    echo "Data Error";
    exit;
}
// end of checking injection attack

// Requête directe
$sql = "SELECT * FROM $tb_rhservice WHERE iddr = '$idrh'";
$result = mysqli_query($linki, $sql);

// Fetch all results as associative array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Create the same output structure
$main = array('data' => $data);

// Output JSON
echo json_encode($main);

// Free result
mysqli_free_result($result);
?>