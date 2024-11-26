<?php
require 'session.php';
require 'fonction.php';

if(($_SESSION['u_niveau']!= 7) && ($_SESSION['u_niveau']!= 10)) {
    header("location:index.php?error=false");
    exit;
}

// Traitement de l'export CSV si demandé
if(isset($_REQUEST['sqlfichier'])) {
    $sqlfichier = $_REQUEST['sqlfichier'];
    $date1 = date("y-m-d_H-i-s");
    $fichier = 'Boltosoft_SQL_Editor_Export_' . $date1 . '.csv';
    
    header('Content-Type: text/csv; charset=utf-8');
    header("Content-Disposition: attachment; filename=$fichier");
    
    $output = fopen('php://output', 'w');
    fputcsv($output, array());
    
    $rows = mysqli_query($linki, $sqlfichier);
    while ($row = mysqli_fetch_array($rows)) {
        fputcsv($output, $row);
    }
    
    mysqli_close($linki);
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Editor Boltosoft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/dracula.min.css" rel="stylesheet">
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

        .sql-editor {
            background: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .editor-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .editor-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--accent-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .editor-title .boltosoft-brand {
            color: var(--secondary-color);
            font-weight: 700;
        }

        .CodeMirror {
            height: 300px;
            border-radius: 10px;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .btn-execute {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-execute:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(9, 132, 227, 0.3);
            background: #0077d1;
            color: white;
        }

        .results-panel {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 1.5rem;
            margin-top: 2rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            overflow: auto;
        }

        .results-table {
            width: 100%;
            border-collapse: collapse;
        }

        .results-table th {
            background: var(--secondary-color);
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 500;
        }

        .results-table td {
            padding: 0.8rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .results-table tbody tr:hover {
            background: rgba(255,255,255,0.05);
        }

        .toolbar {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .toolbar-btn {
            background: var(--primary-color);
            color: var(--text-color);
            border: 1px solid rgba(255,255,255,0.1);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .toolbar-btn:hover {
            background: rgba(255,255,255,0.1);
        }

        .query-info {
            font-size: 0.9rem;
            color: var(--accent-color);
            margin-top: 1rem;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--accent-color);
        }

        .brand-logo i {
            font-size: 1.8rem;
        }

        footer {
            margin-top: 2rem;
            text-align: center;
            padding: 1rem;
            color: var(--text-color);
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        @media (max-width: 768px) {
            .editor-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .toolbar {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <?php require("bienvenue.php"); ?>

    <div class="container-fluid">
        <div class="sql-editor">
            <div class="editor-header">
                <div class="brand-logo">
                    <i class="fas fa-database"></i>
                    <h1 class="editor-title">SQL Editor <span class="boltosoft-brand">Boltosoft</span></h1>
                </div>
                <div class="toolbar">
                    <button class="toolbar-btn" onclick="clearEditor()">
                        <i class="fas fa-eraser"></i> Effacer
                    </button>
                    <button class="toolbar-btn" onclick="formatSQL()">
                        <i class="fas fa-magic"></i> Formater
                    </button>
                    <button class="toolbar-btn" onclick="exportResults()">
                        <i class="fas fa-file-export"></i> Exporter CSV
                    </button>
                </div>
            </div>

            <form id="sqlForm" method="post">
                <textarea id="sqlEditor" name="query" class="form-control"></textarea>
                
                <div class="text-end mt-3">
                    <button type="submit" class="btn-execute">
                        <i class="fas fa-play"></i>
                        Exécuter la requête
                    </button>
                </div>
            </form>
        </div>

        <div class="results-panel" id="results">
            <!-- Les résultats seront affichés ici -->
        </div>
    </div>

    <footer>
        <div class="container">
            <?php include_once('pied.php'); ?>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/sql/sql.min.js"></script>
    <script>
        // Initialisation de CodeMirror
        var editor = CodeMirror.fromTextArea(document.getElementById('sqlEditor'), {
            mode: 'text/x-sql',
            theme: 'dracula',
            lineNumbers: true,
            autoCloseBrackets: true,
            matchBrackets: true,
            indentUnit: 4,
            lineWrapping: true
        });

        // Fonctions utilitaires
        function clearEditor() {
            editor.setValue('');
            editor.focus();
        }

        function formatSQL() {
            const sql = editor.getValue();
            // TODO: Ajoutez votre logique de formatage SQL
            editor.setValue(sql);
        }

        function exportResults() {
            const sql = editor.getValue();
            window.location.href = `?sqlfichier=${encodeURIComponent(sql)}`;
        }

        // Gestion du formulaire
        document.getElementById('sqlForm').onsubmit = async (e) => {
            e.preventDefault();
            const sql = editor.getValue();
            
            if (!sql.trim()) {
                alert('Veuillez entrer une requête SQL');
                return;
            }

            try {
                // Vous pouvez implémenter votre propre logique d'exécution SQL ici
                // Pour l'instant, on fait juste une redirection avec la requête
                window.location.href = `?sqlfichier=${encodeURIComponent(sql)}`;
            } catch (error) {
                console.error('Erreur:', error);
                alert('Une erreur est survenue lors de l\'exécution de la requête');
            }
        };
    </script>
</body>
</html>