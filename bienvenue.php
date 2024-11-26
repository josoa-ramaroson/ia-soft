<html>
<head>
<title>D-IA Tool</title>
	
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,400italic,700italic,600italic,300italic' rel='stylesheet' type='text/css'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="shortcut icon" href="/img/favicon.ico">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/menuderoulant.css">
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
