<?php
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
$id_user  = $_SESSION["id_user"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php include("titre.php"); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/validator.js"></script>
    <script src="calendar/calendar.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1a73e8;
            --secondary-blue: #4285f4;
            --hover-blue: #1557b0;
            --primary-green: #34a853;
            --hover-green: #2d8d47;
            --background: #f8f9fa;
            --panel-bg: #ffffff;
            --text-primary: #202124;
            --text-secondary: #5f6368;
            --border-color: #dadce0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: var(--background);
            color: var(--text-primary);
            line-height: 1.6;
        }

        .top-nav {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .nav-btn {
            display: inline-block;
            background-color: var(--primary-green);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            margin: 0.25rem;
            transition: all 0.3s ease;
        }

        .nav-btn:hover {
            background-color: var(--hover-green);
            transform: translateY(-1px);
        }

        .nav-btn i {
            margin-right: 0.5rem;
        }

        .panel {
            background: var(--panel-bg);
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .panel-header {
            background: var(--primary-blue);
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 500;
        }

        .panel-content {
            padding: 1.5rem;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: var(--secondary-blue);
            color: white;
            padding: 1rem;
            text-align: left;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        tr:hover {
            background-color: var(--background);
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
            border: 1px solid var(--border-color);
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            outline: none;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--hover-blue);
        }

        .btn-success {
            background-color: var(--primary-green);
            color: white;
        }

        .btn-success:hover {
            background-color: var(--hover-green);
        }

        .alert {
            padding: 1rem;
            border-radius: 5px;
            margin: 1rem 0;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        @media (max-width: 768px) {
            .nav-btn {
                display: block;
                margin: 0.5rem 0;
                text-align: center;
            }

            .panel {
                margin: 1rem 0;
            }

            td, th {
                padding: 0.75rem;
            }
        }
    </style>
</head>

<body>
<?php require("bienvenue.php"); ?>

<nav class="top-nav">
    <a href="evenement.php" class="nav-btn">
        <i class="fas fa-calendar"></i>Gestion des RDV
    </a>
    <a href="evenement_mesrdv.php" class="nav-btn">
        <i class="fas fa-clock"></i>Prise des RDV
    </a>
    <a href="evenement_user.php" class="nav-btn">
        <i class="fas fa-calendar-alt"></i>Mon Agenda
    </a>
    <a href="evenement_cal_s.php" class="nav-btn">
        <i class="fas fa-calendar-week"></i>Calendrier Global simplifié
    </a>
    <?php if (in_array($_SESSION['u_niveau'], [7, 8, 9, 43, 46, 90])): ?>
        <a href="evenement_cal.php" class="nav-btn">
            <i class="fas fa-calendar-check"></i>Calendrier Global
        </a>
    <?php endif; ?>
</nav>

<?php if ($_SESSION['u_niveau'] == 7): ?>
    <div class="panel">
        <div class="panel-header">
            <h3>Les utilisateurs du système</h3>
        </div>
        <div class="panel-content">
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Login</th>
                        <th>Catégorie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM $tbl_utilisateur";
                    $result = mysqli_query($linki, $sql);
                    while($rows = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($rows['u_nom']); ?></td>
                            <td><?php echo htmlspecialchars($rows['u_prenom']); ?></td>
                            <td><?php echo htmlspecialchars($rows['u_email']); ?></td>
                            <td><?php echo htmlspecialchars($rows['u_login']); ?></td>
                            <td><?php echo htmlspecialchars($rows['type']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">
            <h3>Initialisation du mot de passe</h3>
        </div>
        <div class="panel-content">
            <form name="form1" method="post" action="utilisateurs_initialisationsave.php">
                <div class="form-group">
                    <label class="form-label">Login :</label>
                    <select name="u_login" id="u_login" class="form-control">
                        <?php
                        $sql8 = "SELECT * FROM $tbl_utilisateur ORDER BY id_nom ASC";
                        $result8 = mysqli_query($linki, $sql8);
                        while ($row8 = mysqli_fetch_assoc($result8)): ?>
                            <option><?php echo htmlspecialchars($row8['u_login']); ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <button type="submit" name="Valider2" class="btn btn-primary">
                    Initialiser le mot de passe
                </button>
            </form>
        </div>
    </div>
<?php endif; ?>

<div class="panel">
    <div class="panel-header">
        <h3>Changement du mot de passe</h3>
    </div>
    <div class="panel-content">
        <form name="form1" method="post" action="utilisateurs_save.php">
            <div class="form-group">
                <label class="form-label">Login :</label>
                <input name="u_login" type="text" class="form-control" id="u_login"
                       value="<?php echo htmlspecialchars($id_nom); ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Ancien mot de passe :</label>
                <input class="form-control" name="u_pwd" type="password" id="u_pwd">
            </div>
            <div class="form-group">
                <label class="form-label">Nouveau mot de passe :</label>
                <input class="form-control" name="u_pwd1" type="password" id="u_pwd1">
            </div>
            <button type="submit" name="Valider" class="btn btn-primary">Envoyer</button>
        </form>
        <?php if (isset($_GET["a"])): ?>
            <div class="alert alert-success">
                Votre mot de passe a été changé avec succès
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <h3>Changer de rôle</h3>
    </div>
    <div class="panel-content">
        <form name="form_role" method="post" action="role_utilisateur_save.php">
            <div class="form-group">
                <label class="form-label">Rôle :</label>
                <select name="id_role" id="id_role" class="form-control">
                    <?php
                    $sqlrole = "SELECT u.id_u, t.id_role, t.nom_role 
                                   FROM $tb_role_user u  
                                   INNER JOIN $tb_role_type t ON u.id_role=t.id_role 
                                   WHERE u.id_u=$id_user 
                                   ORDER BY id_role ASC";
                    $resultrole = mysqli_query($linki, $sqlrole);
                    while ($rowrole = mysqli_fetch_assoc($resultrole)): ?>
                        <option value="<?php echo htmlspecialchars($rowrole['id_role']); ?>">
                            <?php echo htmlspecialchars($rowrole['nom_role']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                <input name="id_user" type="hidden" id="id_user"
                       value="<?php echo htmlspecialchars($id_user); ?>">
            </div>
            <button type="submit" name="Valider3" class="btn btn-primary">
                Changer de rôle
            </button>
        </form>
    </div>
</div>

<?php if (isset($_GET["b"])): ?>
    <div class="panel">
        <div class="panel-header">
            <h3>Information</h3>
        </div>
        <div class="panel-content">
            <div class="alert alert-success">
                Veuillez faire la demande d'activation aux ressources humaines
                pour visualiser vos bulletins de paie
            </div>
            <a href="rh_bulletin_profil.php" class="btn btn-success">
                Visualiser vos bulletins de salaire
            </a>
        </div>
    </div>
<?php endif; ?>

<footer>
    <?php include_once('pied.php'); ?>
</footer>

<script>
    var frmvalidator = new Validator("form_role");
    frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("id_role", "req", "role");
</script>
</body>
</html>