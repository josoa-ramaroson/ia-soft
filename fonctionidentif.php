<?php 
if (!isset($_SESSION['u_login'])) {
    header("Location: index.php");
    exit();
}
require 'fonction.php';

$_POST['m1']=$_SESSION['u_login'];

$sql = "SELECT * FROM $tbl_utilisateur WHERE u_login = ?";
$stmt = mysqli_prepare($linki, $sql);

if ($stmt) {
    // Liaison du paramètre
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['u_login']);
    
    // Exécution de la requête
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        
        if ($u_utilisateur = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            // Récupération des données utilisateur
            $id_user = $u_utilisateur['id_u'];
            $nom = htmlspecialchars($u_utilisateur['u_nom']);
            $prenom = htmlspecialchars($u_utilisateur['u_prenom']);
            $u_niveau = $u_utilisateur['u_niveau'];
            $id_agence = $u_utilisateur['agence'];
            $id_nom = $u_utilisateur['u_login'];
            
            // Mise à jour des variables de session
            $_SESSION['id_nom'] = $id_nom;
            $_SESSION['u_niveau'] = $u_niveau;
            
            // Inclusion du fichier de niveau
            require 'fonction_niveau_save.php';
            
            // Affichage du message de bienvenue
            echo "Bienvenu(e) " . $nom . " " . $prenom . " (" . $type . ")<br/>";
        } else {
            echo "Utilisateur non trouvé";
        }
        
        // Libération du résultat
        mysqli_free_result($result);
    } else {
        echo "Erreur d'exécution de la requête : " . mysqli_error($linki);
    }
    
    // Fermeture du statement
    mysqli_stmt_close($stmt);
} else {
    echo "Erreur de préparation de la requête : " . mysqli_error($linki);
}