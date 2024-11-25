<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IaSoft - Connexion</title>
    <?php include 'inc/head.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        .main-content {
            min-height: calc(100vh - 100px);
            padding: 60px 0;
        }

        .login-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .brand-title {
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .brand-title i {
            font-size: 36px;
            margin-right: 10px;
        }

        h1 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 40px;
        }

        h1 i {
            font-size: 30px;
            margin-right: 10px;
        }

        .form-floating {
            margin-bottom: 25px;
        }

        .form-floating .form-control {
            height: calc(4rem + 5px);
            font-size: 14px;
            padding: 1.5rem 1rem;
        }

        .form-floating label {
            padding: 1.2rem 1rem;
            font-size: 14px;
        }

        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            transform: scale(0.85) translateY(-2.5rem) translateX(0.15rem);
            font-size: 1.1rem;
        }

        .btn-lg {
            padding: 15px 25px;
            font-size: 14px;
            border-radius: 10px;
        }

        .alert {
            font-size: 1.2rem;
            padding: 20px;
            border-radius: 10px;
            margin-top: 25px;
        }

        .footer {
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.9);
            text-align: center;
            padding: 25px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer p {
            margin: 0;
            color: #6c757d;
            font-size: 1.1rem;
        }

        /* Agrandissement des icônes dans les inputs */
        .form-floating label i {
            font-size: 1.3rem;
            margin-right: 8px;
        }

        /* Style du bouton au survol */
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
            transition: all 0.3s ease;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .login-container {
                max-width: 90%;
                padding: 30px 20px;
            }

            .form-floating .form-control {
                height: calc(3.8rem + 2px);
            }
        }
    </style>
</head>
<body class="bg-light">
    <div class="main-content">
        <div class="container">
            <div class="login-container">
                <div class="brand-title">
                    
                    <i class="fas fa-laptop-code"></i> IaSoft
                </div>
                <h1 class="text-secondary">
                    <i class="fas fa-user-lock"></i> Identification
                </h1>
                
                <form name="form1" id="loginForm" action="identification.php" method="POST">
                    <div class="form-floating mb-4">
                        <input type="text" 
                               class="form-control" 
                               id="m1"
                               name="m1" 
                               placeholder="Nom d'utilisateur"
                               required>
                        <label for="m1">
                            <i class="fas fa-user"></i> Nom d'utilisateur
                        </label>
                    </div>
                    
                    <div class="form-floating mb-4">
                        <input type="password" 
                               class="form-control" 
                               id="m2"
                               name="m2" 
                               placeholder="Mot de passe"
                               required>
                        <label for="m2">
                            <i class="fas fa-key"></i> Mot de passe
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 btn-lg">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </button>
                </form>
                
                <?php if (isset($_GET["a"])) : ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> 
                    Votre login ou le mot de passe est erroné.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <p>
            <i class="far fa-copyright"></i> 2024 ComoresBusiness - SONELEC ANJOUAN. Tous droits réservés.
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script language="JavaScript" type="text/javascript">
        var frmvalidator = new Validator("form1");
        frmvalidator.EnableOnPageErrorDisplay();
        frmvalidator.EnableMsgsTogether();
        frmvalidator.addValidation("m1", "req", "SVP enregistre le libelle");
        frmvalidator.addValidation("m2", "req", " SVP enregistre la validite");
    </script>
</body>
</html>