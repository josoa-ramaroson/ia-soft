<?
Require("session.php"); 
?>
<?
	if($_SESSION['u_niveau'] != 3) {
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
  <div class="panel-body"><a href="co_affichage.php" class="btn btn-sm btn-success"> Les clients </a>|
<a href="stat_filtre.php" class="btn btn-sm btn-success">Tableaux de bord   </a> |
<a href="stat_tableau.php" class="btn btn-sm btn-success"> Graphiques </a>  |
<a href="stat_traitement.php" class="btn btn-sm btn-success">Traitement  des alertes  </a> |
<a href="stat_traitement_con_affichage.php" class="btn btn-sm btn-success"> Affichage des alertes </a> |
<a href="#" class="btn btn-sm btn-success"> Gestion des SMS </a> |

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
