<?php
session_start();
require 'fonction.php';

// Récupération et nettoyage de l'ID
$id = mysqli_real_escape_string($linki, substr($_REQUEST["ID"], 32));

// Mise à jour du statut
$sql5 = "UPDATE $tbl_appbonachat SET statut='Finaliser' WHERE id_dem='$id'";
$result5 = mysqli_query($linki, $sql5);

if(!$result5) {
    echo "ERROR: " . mysqli_error($linki);
}

// Redirection
header("location: app_bonachat.php");
?>