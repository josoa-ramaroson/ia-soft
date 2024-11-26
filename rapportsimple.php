<?php
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?php
if(($_SESSION['u_niveau'] != 4)) {
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
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
  <?php require 'rapport_lien_simple.php'; ?> 
<p>&nbsp;</p>
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
