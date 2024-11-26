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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/dracula.min.css" rel="stylesheet">
    <script language="JavaScript" src="js/validator.js"></script>
    <style>
        :root {
            --primary-color: #2d3436;
            --secondary-color: #0984e3;
            --accent-color: #00cec9;
            --text-color: #dfe6e9;
            --bg-color: #2d3436;
            --card-bg: #353b48;
        }

        body {
            background-color: var(--bg-color);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--text-color);
            min-height: 100vh;
            padding: 20px;
        }

        .editor-card {
            background: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--accent-color);
            margin: 0;
        }

        .sql-textarea {
            width: 100%;
            min-height: 200px;
            background: var(--primary-color);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 1rem;
            color: var(--text-color);
            font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
            font-size: 1rem;
            resize: vertical;
            margin-bottom: 1rem;
        }

        .sql-textarea:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 2px rgba(0,206,201,0.2);
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-execute {
            background: var(--secondary-color);
            color: white;
            border: none;
        }

        .btn-execute:hover {
            background: #0077d1;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(9,132,227,0.3);
        }

        .btn-link {
            background: var(--accent-color);
            color: white;
            text-decoration: none;
            border: none;
            padding: 0.6rem 1.2rem;
            font-size: 0.9rem;
        }

        .btn-link:hover {
            background: #00b5b5;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,206,201,0.3);
        }

        .error-message {
            background: rgba(255,59,48,0.1);
            border: 1px solid #ff3b30;
            color: #ff3b30;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
            display: none;
        }

        footer {
            margin-top: 2rem;
            text-align: center;
            padding: 1rem;
            color: var(--text-color);
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        @media (max-width: 768px) {
            .editor-card {
                padding: 1rem;
            }
            
            .sql-textarea {
                min-height: 150px;
            }
        }
    </style>
</head>
<body>
    <?php require("bienvenue.php"); ?>

    <div class="container-fluid">
        <div class="editor-card">
            <div class="card-header">
                <i class="fas fa-code"></i>
                <h3 class="card-title">Éditeur de Requêtes SQL</h3>
            </div>
            
            <form name="form1" method="post" action="xSql_editor.php">
                <textarea name="sqlfichier" id="sqlfichier" class="sql-textarea" placeholder="Écrivez votre requête SQL ici..."></textarea>
                
                <input type="hidden" name="id_nom" value="<?php echo $id_nom; ?>">
                
                <div class="text-end">
                    <button type="submit" name="executer" class="btn btn-execute">
                        <i class="fas fa-play"></i>
                        Exécuter la requête
                    </button>
                </div>
            </form>

            <?php if (isset($_GET["a"])): ?>
            <div class="error-message" style="display: block;">
                Une erreur est survenue lors de l'exécution de la requête
            </div>
            <?php endif; ?>
        </div>

        <div class="editor-card">
            <div class="card-header">
                <i class="fas fa-tools"></i>
                <h3 class="card-title">Outils SQL</h3>
            </div>
            <div>
                <a href="xSql_execute.php" class="btn btn-link">
                    <i class="fas fa-database"></i>
                    SQL Editor Boltosoft
                </a>
            </div>
        </div>
    </div>

    <footer>
        <?php include_once('pied.php'); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var frmvalidator = new Validator("form1");
        frmvalidator.EnableOnPageErrorDisplaySingleBox();
        frmvalidator.EnableMsgsTogether();
        frmvalidator.addValidation("sqlfichier", "req", "Veuillez entrer une requête SQL");
    </script>
</body>
</html>