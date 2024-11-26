<?php
Require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';
?>
<?php
 if($_SESSION['u_niveau'] != 90) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>

<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
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
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?php
Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
 
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
      <a href="compt_rapport.php" class="btn btn-sm btn-success"> Situation/date</a> | 
      <a href="compt_rapport_mois.php" class="btn btn-sm btn-success"> Situation/Mois</a> | 
      <a href="compt_rapport_annee.php" class="btn btn-sm btn-success"> Situation/Annee</a> | 
      <a href="#" class="btn btn-sm btn-success"> Documents comptables & Fiscaux </a> | 
  </div>
</div>

<p align='center'><img src="images/gestioncompte.png" width="630" height="189"></p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center"></div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
  </tr>
  <tr> 
    <td height="21"> 
    
      <?php
include_once('pied.php');
?>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
