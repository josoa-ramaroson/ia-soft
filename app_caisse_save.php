<?php
require 'fonction.php';

// Récupération et nettoyage des données
$date = mysqli_real_escape_string($linki, $_POST['date']);
$blogin = mysqli_real_escape_string($linki, $_POST['blogin']);
$verification = mysqli_real_escape_string($linki, $_POST['verification']);

$dfin = explode("-", $date);
$debut = explode("-", $verification);

if ($dfin <= $debut) {
    header("location: app_caisse.php");
    exit();
} else {
    // Vérification des entrées existantes
    $valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_app_caisse";
    $sqLvaleur = mysqli_query($linki, $valeur_existant) 
        or exit(mysqli_error($linki));
    
    $nb = mysqli_fetch_assoc($sqLvaleur);
    mysqli_free_result($sqLvaleur);

    if($nb['nb'] == 1) {
        // Mise à jour des données
        $sqlp = "UPDATE $tbl_app_caisse 
                 SET datecaisse='$date',
                     blogin='$blogin',
                     date_verif='$date'";
                     
        mysqli_query($linki, $sqlp) 
            or exit(mysqli_error($linki));
            
        header("location: app_caisse.php");
        exit();
    } else {
        // Insertion de nouvelles données
        $sqlp = "INSERT INTO $tbl_app_caisse 
                (blogin, datecaisse, date_verif)
                VALUES 
                ('$blogin', '$date', '$date')";
                
        mysqli_query($linki, $sqlp) 
            or exit(mysqli_error($linki));
            
        header("location: app_caisse.php");
        exit();
    }
}
?>