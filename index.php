<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-IA Tools - Connexion</title>
    <?php include 'inc/head.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }
    body {
        background-color: #004db3;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }
    .login-container {
        background: white;
        border-radius: 24px;
        width: 100%;
        max-width: 900px;
        min-height: 500px;
        display: flex;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        margin: 20px auto 80px; /* Marge en bas pour le footer */
    }
    .welcome-section {
        background: white;
        width: 50%;
        padding: 40px;
        color: #0066FF;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .welcome-section img {
        width: 100%;
        max-width: 250px;
        height: auto;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
        filter: drop-shadow(0 0 10px rgba(0,102,255,0.3));
        animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
        0% { transform: translatey(0px); }
        50% { transform: translatey(-10px); }
        100% { transform: translatey(0px); }
    }
    .welcome-section p {
        opacity: 0.8;
        line-height: 1.6;
        position: relative;
        z-index: 1;
        text-align: center;
    }
    .circles {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 0;
        height: 100%;
        width: 100%;
    }
    .circle {
        background: rgba(0, 102, 255, 0.05);
        border-radius: 50%;
        position: absolute;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(0, 102, 255, 0.1);
    }
    .circle:nth-child(1) {
        width: 250px;
        height: 250px;
        bottom: -100px;
        left: -80px;
        animation: float 8s infinite ease-in-out;
    }
    .circle:nth-child(2) {
        width: 180px;
        height: 180px;
        bottom: -40px;
        left: 60px;
        animation: float 6s infinite ease-in-out;
    }
    .circle:nth-child(3) {
        width: 120px;
        height: 120px;
        bottom: 40px;
        left: -20px;
        animation: float 4s infinite ease-in-out;
    }
    .form-section {
        width: 50%;
        padding: 40px;
        background: #0066FF;
        color: white;
    }
    .form-section h2 {
        font-size: 1.8rem;
        margin-bottom: 10px;
        text-align: center;
        color: white;
    }
    .form-section p {
        margin-bottom: 30px;
        font-size: 0.9rem;
        text-align: center;
        color: rgba(255,255,255,0.8);
    }
    .input-group {
        margin-bottom: 20px;
        position: relative;
    }
    .input-group input {
        width: 100%;
        padding: 12px 40px;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 8px;
        font-size: 14px;
        color: white;
    }
    .input-group input::placeholder {
        color: rgba(255,255,255,0.7);
    }
    .input-group i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255,255,255,0.7);
    }
    .sign-in-btn {
        width: 100%;
        padding: 12px;
        background: white;
        color: #0066FF;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }
    .sign-in-btn:hover {
        background: #f0f4ff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .alert {
        padding: 12px;
        border-radius: 8px;
        margin-top: 15px;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        color: white;
        text-align: center;
    }
    
    @media (max-width: 768px) {
        body {
            padding: 10px;
            align-items: flex-start;
        }
        .login-container {
            flex-direction: column;
            height: auto;
            margin: 10px auto 80px;
        }
        .welcome-section, .form-section {
            width: 100%;
            padding: 20px;
        }
        .welcome-section {
            padding-top: 30px;
            padding-bottom: 10px;
        }
        .welcome-section img {
            max-width: 180px;
        }
        .form-section {
            padding-top: 20px;
            padding-bottom: 30px;
        }
        .form-section h2 {
            font-size: 1.5rem;
        }
        .input-group input {
            padding: 10px 35px;
            font-size: 16px; /* Plus lisible sur mobile */
        }
        .sign-in-btn {
            padding: 12px;
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        body {
            padding: 5px;
        }
        .login-container {
            margin: 5px auto 70px;
            border-radius: 16px;
        }
        .welcome-section, .form-section {
            padding: 15px;
        }
        .welcome-section img {
            max-width: 150px;
        }
        .form-section h2 {
            font-size: 1.3rem;
        }
        .form-section p {
            font-size: 0.85rem;
            margin-bottom: 20px;
        }
    }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="welcome-section">
            <img src="/images/logo.png" alt="D-IA Tools Logo">
            <p>Système de gestion intégré</p>
            <div class="circles">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
        </div>
        
        <div class="form-section">
            <h2>Identification</h2>
            <p>Veuillez vous connecter pour accéder à votre espace</p>
            
            <form name="form1" id="loginForm" action="identification.php" method="POST">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" 
                           id="m1"
                           name="m1" 
                           placeholder="Nom d'utilisateur"
                           required>
                </div>
                
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" 
                           id="m2"
                           name="m2" 
                           placeholder="Mot de passe"
                           required>
                </div>
                
                <button type="submit" class="sign-in-btn">
                    <i class="fas fa-sign-in-alt"></i> Se connecter
                </button>

                <?php if (isset($_GET["a"])) : ?>
                <div class="alert">
                    <i class="fas fa-exclamation-circle"></i> 
                    Votre login ou le mot de passe est erroné.
                </div>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <footer style="text-align: center; padding: 15px 0; background-color: white; position: fixed; bottom: 0; left: 0; width: 100%; box-shadow: 0 -2px 10px rgba(0,0,0,0.1); font-size: 14px; color: #666; z-index: 1000;">
        <div class="copyright">
            <?php echo 'Copyright COMORES BUSINESS © ® 2024, AI Marketing. '; ?>
        </div>
        <?php require 'Journal_audit_v_bd_save.php';?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/validator.js"></script>
    <script>
        var frmvalidator = new Validator("form1");
        frmvalidator.EnableOnPageErrorDisplay();
        frmvalidator.EnableMsgsTogether();
        frmvalidator.addValidation("m1", "req", "SVP enregistre le libelle");
        frmvalidator.addValidation("m2", "req", " SVP enregistre la validite");
    </script>
</body>
</html>