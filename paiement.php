<?php
require 'session.php';
require_once 'fonction.php';
require 'fc-affichage.php';

if(($_SESSION['u_niveau'] != 4)) {
    header("location:index.php?error=false");
    exit;
}

// Correction de la variable indéfinie
$id_nom = isset($_SESSION['id_nom']) ? $_SESSION['id_nom'] : '';

$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_paiconn WHERE idrecu='$id_nom'";
$result = $linki->query($valeur_existant);
$nb = $result->fetch_assoc();

if($nb['nb'] != 1) {
    $sqlcon = "INSERT INTO $tbl_paiconn (idrecu) VALUES ('$id_nom')";
    $linki->query($sqlcon);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php include("titre.php") ?> - Paiement</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        
        .main-content {
            min-height: calc(100vh - 60px); /* Hauteur totale moins footer */
            padding: 2rem 0;
        }
        
        .payment-container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .payment-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .payment-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .payment-card:hover {
            transform: translateY(-5px);
        }
        
        .payment-card h4 {
            color: #198754;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem; /* Plus grand */
        }
        
        .payment-card .form-control {
            border-radius: 10px;
            border: 1px solid #dee2e6;
            padding: 1rem 1.25rem; /* Plus grand padding */
            font-size: 1.2rem; /* Plus grand */
            height: auto;
        }

        .payment-card label {
            font-size: 1.2rem; /* Plus grand */
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .btn {
            font-size: 1.2rem !important; /* Plus grand */
            padding: 0.8rem 1.5rem !important;
        }
        
        .payment-card .form-control:focus {
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.25);
            border-color: #198754;
        }
        
        .btn-success {
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3);
        }
        
        .history-table {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
            overflow: hidden;
        }
        
        .table {
            margin: 0;
        }
        
        .table thead th {
            background-color: #198754;
            color: white;
            border: none;
            padding: 1.2rem; /* Plus grand padding */
            font-weight: 600;
            text-transform: uppercase;
            font-size: 1.1rem; /* Plus grand */
            letter-spacing: 0.5px;
        }
        
        .table tbody tr:hover {
            background-color: rgba(25, 135, 84, 0.05);
        }
        
        .table td {
            vertical-align: middle;
            padding: 1.2rem; /* Plus grand padding */
            font-size: 1.1rem; /* Plus grand */
        }

        .history-table h4 {
            font-size: 1.8rem; /* Plus grand */
            font-weight: 600;
        }

        .btn-sm {
            font-size: 1rem !important; /* Plus grand pour les petits boutons */
            padding: 0.5rem 1rem !important;
        }
        
        .amount-positive {
            color: #198754;
            font-weight: 600;
        }
        
        .amount-negative {
            color: #dc3545;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .payment-cards {
                grid-template-columns: 1fr;
            }
            
            .history-table {
                margin-top: 1rem;
                padding: 1rem;
            }
            
            .table thead th {
                padding: 0.75rem;
            }
            
            .table td {
                padding: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <?php require_once 'bienvenue.php'; ?>
    
    <div class="main-content">
        <div class="payment-container">
            <div class="payment-cards">
                <!-- Carte de paiement électrique -->
                <div class="payment-card">
                    <h4><i class="fas fa-bolt"></i> Paiement Électrique, Police, Devis</h4>
                    <form action="paiement_apercu.php" method="post" name="form2" id="form2">
                        <div class="mb-3">
                            <label class="form-label">ID CLIENT</label>
                            <input class="form-control" name="id" type="text" id="id" placeholder="Entrez l'ID client">
                        </div>
                        <button type="submit" name="Paiement2" class="btn btn-success w-100">
                            <i class="fas fa-arrow-right"></i> Étape suivante
                        </button>
                    </form>
                </div>

                <!-- Carte autres paiements -->
                <div class="payment-card">
                    <h4><i class="fas fa-file-invoice-dollar"></i> Autres Paiements</h4>
                    <form action="paiement_apercuAutre.php" method="post" name="form22" id="form22">
                        <div class="mb-3">
                            <label class="form-label">N° FACTURE</label>
                            <input class="form-control" name="idf" type="text" id="idf" placeholder="Entrez le numéro de facture">
                        </div>
                        <button type="submit" name="Paiement" class="btn btn-success w-100">
                            <i class="fas fa-arrow-right"></i> Étape suivante
                        </button>
                    </form>
                </div>
            </div>

            <!-- Historique des paiements -->
            <div class="history-table">
                <h4 class="mb-4"><i class="fas fa-history"></i> Historique des paiements</h4>
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Client</th>
                                <th>Vendeur</th>
                                <th>Date</th>
                                <th>Nom du client</th>
                                <th>N° Facture</th>
                                <th>N° Reçu</th>
                                <th>Montant</th>
                                <th>Payé</th>
                                <th>Reste</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT count(*) FROM $tbl_paiement where id<500000";
                        $resultat = $linki->query($sql);
                        $nb_total = $resultat->fetch_array(MYSQLI_NUM);

                        if (($nb_total = $nb_total[0]) > 0) {
                            if (!isset($_GET['debut'])) $_GET['debut'] = 0;
                            $nb_affichage_par_page = 50;

                            $sqfac = "SELECT * FROM $tbl_paiement WHERE id < 500000 GROUP BY idp ORDER BY idp DESC LIMIT " . $nb_affichage_par_page . " OFFSET " . $_GET['debut'];
                            $resultfac = $linki->query($sqfac);

                            while ($rowsfac = $resultfac->fetch_array(MYSQLI_ASSOC)) {
                                $reste = $rowsfac['report'];
                                $classe_montant = $reste > 0 ? 'amount-negative' : 'amount-positive';
                            ?>
                                <tr>
                                    <td><?php echo $rowsfac['id']; ?></td>
                                    <td><?php echo $rowsfac['id_nom']; ?></td>
                                    <td><?php echo $rowsfac['date']; ?></td>
                                    <td><?php echo $rowsfac['Nomclient']; ?></td>
                                    <td><?php echo $rowsfac['nfacture']; ?></td>
                                    <td>
                                        <?php if ($rowsfac['id'] < 500000) { ?>
                                            <a href="paiement_billimp.php?idp=<?php echo md5(microtime()) . $rowsfac['idp']; ?>" class="btn btn-sm btn-outline-success">
                                                <?php echo $rowsfac['idp']; ?>
                                            </a>
                                        <?php } else { ?>
                                            <a href="paiement_billimpG.php?idp=<?php echo md5(microtime()) . $rowsfac['idp']; ?>" class="btn btn-sm btn-outline-success">
                                                <?php echo $rowsfac['idp']; ?>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="amount-positive"><?php echo number_format($rowsfac['montant'], 0, ',', ' '); ?> KMF</td>
                                    <td class="amount-positive"><?php echo number_format($rowsfac['paiement'], 0, ',', ' '); ?> KMF</td>
                                    <td class="<?php echo $classe_montant; ?>">
                                        <?php echo number_format($rowsfac['report'], 0, ',', ' '); ?> KMF
                                    </td>
                                </tr>
                            <?php }
                            mysqli_free_result($resultfac);
                            
                            // Pagination
                            echo '<div class="d-flex justify-content-center mt-4">';
                            echo barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10);
                            echo '</div>';
                        }
                        mysqli_free_result($resultat);
                        mysqli_close($linki);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/validator.js"></script>
    <script>
        // Validation pour le formulaire électrique
        var frmvalidator = new Validator("form2");
        frmvalidator.EnableOnPageErrorDisplaySingleBox();
        frmvalidator.EnableMsgsTogether();
        frmvalidator.addValidation("id", "req", "Veuillez entrer un ID client");
        frmvalidator.addValidation("id", "num", "L'ID client doit être un nombre");

        // Validation pour le formulaire autres paiements
        var frmvalidator2 = new Validator("form22");
        frmvalidator2.EnableOnPageErrorDisplaySingleBox();
        frmvalidator2.EnableMsgsTogether();
        frmvalidator2.addValidation("idf", "req", "Veuillez entrer un numéro de facture");
        frmvalidator2.addValidation("idf", "num", "Le numéro de facture doit être un nombre");
    </script>
</body>
</html>