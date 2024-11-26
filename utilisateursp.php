<?php
require 'session.php';
require 'fonction.php';

if(($_SESSION['privileges']!= 7)) {
    header("location:index.php?error=false");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php include("titre.php"); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script language="JavaScript" src="js/validator.js"></script>
    <script language="javascript" src="calendar/calendar.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
        }

        .panel {
            background: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .panel-heading {
            background: #198754;
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 15px 15px 0 0;
        }

        .panel-title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .panel-body {
            padding: 1.5rem;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 0.6rem 1rem;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
        }

        .form-label {
            font-weight: 500;
            color: #444;
            margin-bottom: 0.5rem;
        }

        .btn {
            padding: 0.6rem 1.5rem;
            font-size: 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-success {
            background-color: #198754;
            border: none;
            color: white;
        }

        .btn-success:hover {
            background-color: #146c43;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3);
        }

        .btn-sql {
            background-color: #0d6efd;
            color: white;
            border: none;
        }

        .btn-sql:hover {
            background-color: #0b5ed7;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        .btn-tools {
            margin-right: 1rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
            border: none;
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .tools-section {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }

        @media (max-width: 768px) {
            .panel-body {
                padding: 1rem;
            }

            .btn {
                width: 100%;
                justify-content: center;
                margin-bottom: 0.5rem;
            }

            .tools-section {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <?php require("bienvenue.php"); ?>

    <div class="container-fluid">
        <!-- Section Changement de niveau -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fas fa-user-shield"></i>
                    Changement du niveau
                </h3>
            </div>
            <div class="panel-body">
                <form name="form1" method="post" action="utilisateursp_save.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="u_login" class="form-label">Login</label>
                                <input name="u_login" type="text" class="form-control" id="u_login" value="<?php echo $id_nom; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="u_niveau" class="form-label">Niveau</label>
                                <select name="u_niveau" id="u_niveau" class="form-select">
                                    <?php require 'fonction_niveau_choix.php'; ?>
                                </select>
                            </div>
                            <input type="hidden" name="id_nom" value="<?php echo $id_nom; ?>">
                            <button type="submit" name="Valider" class="btn btn-success">
                                <i class="fas fa-save"></i>
                                Enregistrer
                            </button>
                        </div>
                    </div>
                </form>

                <?php if (isset($_GET["a"])): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        Une erreur est survenue
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Section Outils -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fas fa-tools"></i>
                    Outils administrateur
                </h3>
            </div>
            <div class="panel-body">
                <div class="tools-section">
                    <a href="xSql_execute.php" class="btn btn-sql">
                        <i class="fas fa-database"></i>
                        Éditeur SQL
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('pied.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var frmvalidator = new Validator("form1");
        frmvalidator.EnableOnPageErrorDisplay();
        frmvalidator.EnableMsgsTogether();
    </script>
</body>
</html>