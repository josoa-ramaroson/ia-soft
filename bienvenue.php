<html>
<head>
<title><?php include 'titre.php'; ?></title>
<?php include 'inc/head.php'; ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body BGCOLOR="#ffffff" LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/welcome.php">
            <i class="fas fa-laptop-code"></i> D-IA TOols
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                
                    <!-- <a class="nav-link" href="#<%= item.id %>">
                        <i class="fas <%= item.icon %>"></i> <%= item.text %>
                    </a> -->
                    <?php include "menu.php"; ?>
                
            </ul>
            
        </div>
        <div class="navbar-text text-light ms-0 ">    
              <?php require 'fonctionidentif.php';?>
        </div>
    </div>
</nav>
    
<p align="center">&nbsp;</p>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
