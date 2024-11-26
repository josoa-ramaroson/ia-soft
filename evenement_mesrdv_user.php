<?php
require 'fonction.php';

// Vérifier que le chemin vers les classes du calendrier est correct
if(file_exists('calendar/classes/tc_calendar.php')) {
    require_once('calendar/classes/tc_calendar.php');
} else {
    die("Erreur: Le fichier tc_calendar.php n'a pas été trouvé dans le dossier calendar/classes/");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Rendez-vous</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/validator.js"></script>
    <script src="calendar/calendar.js"></script>
    <style>
        :root {
            --primary: #1976D2;
            --primary-dark: #1565C0;
            --primary-light: #BBDEFB;
            --accent: #43A047;
            --accent-light: #A5D6A7;
            --text: #212121;
            --text-secondary: #757575;
            --background: #F5F5F5;
            --white: #FFFFFF;
            --error: #D32F2F;
            --border: #E0E0E0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: var(--background);
            color: var(--text);
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .panel {
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .panel-heading {
            background: var(--primary);
            color: var(--white);
            padding: 1rem 1.5rem;
            font-weight: 500;
        }

        .panel-body {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 4px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px var(--primary-light);
        }

        select.form-control {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23555' viewBox='0 0 16 16'%3E%3Cpath d='M8 10l4-4H4z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 12px;
            padding-right: 2.5rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            text-align: center;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .calendar-input {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .calendar-icon {
            font-size: 1.25rem;
            color: var(--primary);
            cursor: pointer;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table th {
            background: var(--primary);
            color: var(--white);
            padding: 1rem;
            text-align: left;
        }

        .table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .table tr:hover {
            background: var(--primary-light);
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Formulaire d'ajout de RDV -->
    <div class="panel">
        <div class="panel-heading">
            <h3>Ajouter un rendez-vous</h3>
        </div>
        <div class="panel-body">
            <form id="form1" name="form1" method="post" action="evenement_liste_save.php">
                <div class="form-group">
                    <label class="form-label">Login</label>
                    <select name="u_login" id="u_login" class="form-control">
                        <option value="<?php echo htmlspecialchars($id_nom); ?>">
                            <?php echo htmlspecialchars($nom.' '.$prenom); ?>
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Date & Heure</label>
                    <div class="calendar-input">
                        <?php
                        $myCalendar = new tc_calendar("datet1", true, false);
                        $myCalendar->setIcon("calendar/images/iconCalendar.gif");
                        $myCalendar->setPath("calendar/");
                        $myCalendar->setYearInterval($annee1, $annee2);
                        $myCalendar->dateAllow($date1, $date2);
                        $myCalendar->setDateFormat('j F Y');
                        $myCalendar->setAlignment('left', 'bottom');
                        $myCalendar->writeScript();
                        ?>
                        <input name="heures" type="time" id="heures" class="form-control" value="00:00">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Durée</label>
                    <div class="duration-inputs">
                        <select name="Ndh" id="Ndh" class="form-control">
                            <?php
                            for($i = 0; $i <= 24; $i++) {
                                $selected = ($i === 0) ? ' selected' : '';
                                echo "<option value=\"$i\"$selected>$i heure" . ($i > 1 ? 's' : '') . "</option>";
                            }
                            ?>
                        </select>
                        <select name="Ndm" id="Ndm" class="form-control">
                            <option value="0">0 minute</option>
                            <option value="15">15 minutes</option>
                            <option value="30" selected>30 minutes</option>
                            <option value="45">45 minutes</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Commentaire</label>
                    <input class="form-control" name="evenement" type="text" id="evenement">
                </div>

                <div class="form-group">
                    <button type="submit" name="Enregistrer" class="btn btn-primary">
                        Ajouter le rendez-vous
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Panneau de recherche de RDV -->
    <div class="panel">
        <div class="panel-heading">
            <h3>Afficher les rendez-vous</h3>
        </div>
        <div class="panel-body">
            <form id="form2" name="form2" method="post" action="evenement.php">
                <div class="form-group">
                    <label class="form-label">Date</label>
                    <div class="calendar-input">
                        <?php
                        $myCalendar = new tc_calendar("datet2", true, false);
                        $myCalendar->setIcon("calendar/images/iconCalendar.gif");
                        $myCalendar->setPath("calendar/");
                        $myCalendar->setYearInterval($annee1, $annee2);
                        $myCalendar->dateAllow($date1, $date2);
                        $myCalendar->setDateFormat('j F Y');
                        $myCalendar->setAlignment('left', 'bottom');
                        $myCalendar->writeScript();
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="Afficher" class="btn btn-primary">
                        Afficher les rendez-vous
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var frmvalidator = new Validator("form1");
    frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("heures", "req", "Veuillez saisir une heure");
    frmvalidator.addValidation("evenement", "req", "Veuillez saisir un commentaire");
    frmvalidator.addValidation("datet1", "req", "Veuillez sélectionner une date");
</script>
</body>
</html>