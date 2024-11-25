<?php
require 'session.php';
require 'fonction.php';
require 'fc-affichage.php';
require 'bienvenue.php';
?>
<div class="text-center">
    <h2><img src="images/BSCSR9M1.jpg" width="644" height="410" alt="BSC SR9M1" /></h2>
</div>

<?php
// Comptage du nombre total d'enregistrements
$sql = "SELECT COUNT(*) as total FROM $tbl_com";
$resultat = mysqli_query($linki, $sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysqli_error($linki));
$nb_total = mysqli_fetch_array($resultat, MYSQLI_ASSOC);

// Vérification s'il y a des informations
if ($nb_total['total'] == 0) {
    echo '<p>Aucune information</p>';
} else {
    // Initialisation de la pagination
    if (!isset($_GET['debut'])) {
        $_GET['debut'] = 0;
    }

    // Nombre d'éléments par page
    $nb_affichage_par_page = 1;

    // Requête pour récupérer les données avec pagination
    $sql = "SELECT * FROM $tbl_com 
            ORDER BY idcom DESC 
            LIMIT " . (int)$_GET['debut'] . "," . $nb_affichage_par_page;

    // Exécution de la requête
    $req = mysqli_query($linki, $sql);
    if (!$req) {
        die('Erreur SQL !<br />' . $sql . '<br />' . mysqli_error($linki));
    }
    ?>

    <table width="100%" border="0">
        <?php while ($data = mysqli_fetch_array($req, MYSQLI_ASSOC)) { ?>
            <tr>
                <td>&nbsp;</td>
                <td align="center">
                    <strong>
                        <span style="color: #000000">
                            <?php echo htmlspecialchars($data['detail']); ?>
                        </span>
                    </strong>
                </td>
                <td>&nbsp;</td>
            </tr>
        <?php } ?>
    </table>

    <?php
    // Pagination
    $total_pages = ceil($nb_total['total'] / $nb_affichage_par_page);
    $current_page = floor($_GET['debut'] / $nb_affichage_par_page) + 1;

    if ($total_pages > 1) {
        echo '<div class="text-center mt-3">';
        // Bouton précédent
        if ($current_page > 1) {
            echo '<a href="?debut=' . (($_GET['debut'] - $nb_affichage_par_page)) . '" class="btn btn-sm btn-primary mr-2">Précédent</a> ';
        }

        // Numéros des pages
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                echo '<strong>' . $i . '</strong> ';
            } else {
                echo '<a href="?debut=' . (($i - 1) * $nb_affichage_par_page) . '">' . $i . '</a> ';
            }
        }

        // Bouton suivant
        if ($current_page < $total_pages) {
            echo ' <a href="?debut=' . ($_GET['debut'] + $nb_affichage_par_page) . '" class="btn btn-sm btn-primary ml-2">Suivant</a>';
        }
        echo '</div>';
    }
}

// Fermeture de la connexion
mysqli_close($linki);
?>
        </p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td height="21">&nbsp;</td>
          </tr>
          <tr>
            <td height="21"><?php
include_once('pied.php');
?></td>
          </tr>
        </table>
        <p>&nbsp;</p>
