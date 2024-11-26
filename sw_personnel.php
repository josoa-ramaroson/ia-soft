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
    <h3 class="panel-title"><?php echo $affichemois.' '.$anneepaie ; ?></h3>
  </div>
  <div class="panel-body">
	  <a href="rh_employer_affichage_liste.php" class="btn btn-sm btn-success" >Profil des employes </a> |
      <a href="rh_employer_affichage.php" class="btn btn-sm btn-success" >Liste des employes </a> |
      <a href="rh_conge.php" class="btn btn-sm btn-success" > Gestion des conges </a> |
      <a href="rh_employer_setatsalaire.php" class="btn btn-sm btn-success" > Etat de Salaire </a> | 
      <a href="rh_employer_recapitulatif.php" class="btn btn-sm btn-success" > Recapitulatif par Direction </a> |
      <a href="rh_bulletin_type.php" class="btn btn-sm btn-success" > Bulletins </a> |
      
  </div>
</div>

<p align='center'><img src="images/paie.jpg" width="411" height="291"></p>
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
