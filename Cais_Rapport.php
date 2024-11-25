<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fonction.php';
?>
<?
require 'session_niveau_tresorie_rapport.php';
?>
<?php
require"fc-affichage.php";
?>
<html>
<head>
<title>
<? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?
require("bienvenue.php"); 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="47%" height="21">
          <?php
include_once('Cais_Rapport_menu.php');
?>
    </td>
  </tr>
</table>
<p><font size="2"><font size="2"><font size="2"> </font></font></font> </p>
</body>
</html>
