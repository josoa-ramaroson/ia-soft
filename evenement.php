<?
require 'session.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<title><? include 'titre.php' ?></title>
<? include 'inc/head.php'; ?>
</head>
<?
require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body>
<p>&nbsp;</p>
<div id="evenement">
  <?php
// Affichage 
include 'evenement_liste.php'; 
?>
</div>

<p>&nbsp;</p>
  <p>
    <?php
/* Affichage 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
*/
?>
    <script language="javascript" src="js/jquery.min.js"></script>
  </p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td height="21">&nbsp;</td>
    </tr>
    <tr>
      <td height="21"><?php
	
include_once('pied.php');
?></td>
    </tr>
  </table>
  <p>&nbsp; </p>
</body>
</html>
