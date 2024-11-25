<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';
?>

<html>
<head>

<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
    <a href="co_affichage.php" class="btn btn-sm btn-success" > Les clients   </a> | 
    <a href="releve_recherche.php" class="btn btn-sm btn-success" >  Historique Index   </a> |
    <a href="co_affichage_user_repartion.php" class="btn btn-sm btn-success" > Répartition des clients </a> |
    <a href="releve_miseajour.php" class="btn btn-sm btn-success" > Complement d'information  </a> |
    <a href="journal_simple.php" class="btn btn-sm btn-success" > Jounal de vente simple </a> | 
	<a href="journal.php" class="btn btn-sm btn-success" > Jounal de vente Global </a> | 
  </div>
</div>




<p align='center'>&nbsp;</p>
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
