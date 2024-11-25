<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';
?>
<?
	if($_SESSION['u_niveau'] != 4) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>

<title><? include("titre.php"); ?></title>
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
<?
Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
 
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
    <a href="paiement.php" class="btn btn-sm btn-success" > Paiement </a> |
	<a href="paiementcb.php"><img src="images/barre.png" width="100" height="34"/></a> |
    <a href="#" class="btn btn-sm btn-success" > Paiement par Importation </a>| 
    <a href="paiement_gaz.php" class="btn btn-sm btn-warning" > Paiement par Gaz </a> |
    <a href="re_edit_modif_liste_gaz.php" class="btn btn-sm btn-warning" > Suivi GAZ  </a> |
    <a href="coi_facturation_liste.php" class="btn btn-sm btn-success" > Les penalités </a> |
    <a href="re_edit_modif_liste.php" class="btn btn-sm btn-success" >Tansfert & Changement de nom </a> |

  </div>



</div>
<p align='center'><img src="images/cfa.jpg" width="657" height="411"></p>
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
