<?php
// Récupération et nettoyage des données POST
$date = mysqli_real_escape_string($linki, $_POST['date']);
$service = mysqli_real_escape_string($linki, $_POST['service']);
$Nature = mysqli_real_escape_string($linki, $_POST['Nature']);
$Motif = mysqli_real_escape_string($linki, $_POST['Motif']);
$Montant = mysqli_real_escape_string($linki, $_POST['Montant']);
$id_nom = mysqli_real_escape_string($linki, $_POST['id_nom']);

require 'fonction.php';

// Insertion dans la base de données
$sqlp = "INSERT INTO $tbl_appaut (id_nom, service, Nature, Motif, Montant, date) 
         VALUES ('$id_nom', '$service', '$Nature', '$Motif', '$Montant', '$date')";

$r = mysqli_query($linki, $sqlp)
    or die(mysqli_error($linki));

// Redirection
header("location: app_aut.php");
?>