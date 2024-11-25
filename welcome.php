<?php
require 'session.php';
require 'fonction.php';
require 'fc-affichage.php';
require 'bienvenue.php';
?>
<div class="text-center">
        <div class="wheel-container">
            <div id="wheel-svg"></div>
        </div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
            <td height="21">
</td>
          </tr>
        </table>
        <p>&nbsp;</p>
                <?php
include_once('pied.php');
?>


<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: system-ui, -apple-system, sans-serif;
        background: linear-gradient(to bottom right, #f8fafc, #e2e8f0);
        min-height: 100vh;
       
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        gap: 1.5rem;
        align-items: flex-start;
        padding: 0 1rem;
    }

    .wheel-container {
        flex: 3;
        background: white;
        border-radius: 0.75rem;
        padding: 1.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 100%;
        max-height: 700px;
    }

    .sidebar {
        flex: 1;
        background: white;
        border-radius: 0.75rem;
        padding: 1.25rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .category-list h2 {
        font-size: clamp(1.25rem, 2vw, 1.5rem);
        color: #1e293b;
        margin-bottom: 1.25rem;
        /* Nouvelles propriétés pour la gestion du titre */
        max-width: 100%;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        line-height: 1.3;
    }

    .category-item {
        display: flex;
        align-items: flex-start; /* Changé de center à flex-start */
        gap: 0.75rem;
        padding: 0.75rem;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: background-color 0.2s;
        /* Ajout de propriétés pour contenir le contenu */
        width: 100%;
        min-width: 0; /* Important pour permettre le flex shrink */
    }

    .category-item:hover {
        background-color: #f8fafc;
    }

    .category-color {
        min-width: 1rem;
        height: 1rem;
        border-radius: 50%;
        box-shadow: 0 0 0 2px white;
        transition: transform 0.2s;
        flex-shrink: 0; /* Empêche le point de couleur de rétrécir */
    }

    .category-item:hover .category-color {
        transform: scale(1.1);
    }

    .category-name {
        font-weight: 500;
        color: #334155;
        flex: 1;
        font-size: clamp(0.875rem, 1.5vw, 1rem);
        /* Nouvelles propriétés pour la gestion du texte */
        min-width: 0;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        line-height: 1.4;
        /* Gestion de l'overflow avec ellipsis si nécessaire */
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Limite à 3 lignes maximum */
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .module-count {
        color: #64748b;
        font-size: clamp(0.75rem, 1.2vw, 0.875rem);
        white-space: nowrap; /* Empêche le compteur de se scinder */
        flex-shrink: 0; /* Empêche le compteur de rétrécir */
        margin-left: 0.5rem;
    }

    /* Styles pour les sous-titres dans toute l'application */
    .subtitle,
    h3,
    .h3-like {
        font-size: clamp(1rem, 1.5vw, 1.25rem);
        color: #475569;
        margin-bottom: 1rem;
        /* Gestion du texte */
        max-width: 100%;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        line-height: 1.4;
        /* Conteneur flex pour meilleure gestion de l'espace */
        display: inline-flex;
        flex-wrap: wrap;
    }

    /* Table styles */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 0.75rem;
        /* Gestion du texte dans les cellules */
        max-width: 0; /* Force le wrapping */
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
    }

    /* Pagination styles */
    .text-center {
        text-align: center;
        margin: 1.5rem 0;
    }

    .btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        text-decoration: none;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        transition: all 0.2s;
    }

    .btn-primary {
        background-color: #2563eb;
        color: white;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }

    /* Media Queries */
    @media (max-width: 1024px) {
        .container {
            gap: 1rem;
            padding: 0 0.75rem;
        }

        .wheel-container, .sidebar {
            padding: 1rem;
        }

        /* Ajustement des marges pour les sous-titres */
        .subtitle, h3, .h3-like {
            margin-bottom: 0.875rem;
        }
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .wheel-container, .sidebar {
            flex: none;
            width: 100%;
        }

        body {
            padding: 0.75rem;
        }

        /* Réduction du nombre de lignes sur mobile */
        .category-name {
            -webkit-line-clamp: 2;
        }
    }

    @media (max-width: 480px) {
        body {
            padding: 0.5rem;
        }

        .container {
            padding: 0 0.5rem;
        }

        .wheel-container, .sidebar {
            padding: 0.875rem;
            border-radius: 0.5rem;
        }

        .category-item {
            padding: 0.625rem;
        }

        .btn {
            padding: 0.375rem 0.75rem;
            font-size: 0.813rem;
        }

        /* Ajustements supplémentaires pour petits écrans */
        .subtitle, h3, .h3-like {
            font-size: 1rem;
            margin-bottom: 0.75rem;
        }
    }
</style>
<script type="text/javascript" src="/js/wheel.js"></script>