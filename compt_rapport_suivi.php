<?php
Require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?php
 if((($_SESSION['u_niveau'] != 20) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="javascript" src="calendar/calendar.js"></script>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.centrevaleur {
	text-align: center;
}
.centrevaleur td {
	text-align: center;
}
.taille16 {	font-size: 16px;
}
</style>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
    
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
   <a href="client_demande_suvi.php" class="btn btn primary"> Client (En ligne)   </a>  | 
   <a href="app_gestionapprov_backup.php" class="btn btn btn-success"> Gestion des commandes (APP)|</a>
  </div>
</div>
     
     
     
</body>
</html>