<?php
Require 'session.php';
require 'fc-affichage.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
if(($_SESSION['u_niveau'] != 30) && ($_SESSION['u_niveau'] != 7)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><?php include 'titre.php'; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<BODY BGCOLOR="#ffffff" LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
 <?php
				  
require 'fonction.php';

$id=substr($_REQUEST["id"],32);

$sql="SELECT * FROM $tbl_com WHERE idcom='$id'";
$result=mysqli_query($linki,$sql);

$rows=mysqli_fetch_array($result);
?>
 </span>
 <div class="panel panel-primary">
   <div class="panel-heading">
     <h3 class="panel-title"><strong><font color="#ffffff"><?php echo $rows['titre']; ?></font></strong></h3>
   </div>
   <div class="panel-body">
     <p align="center">&nbsp;</p>
     <table width="100%" border="0">
       <tr>
         <td width="33%">&nbsp;</td>
         <td width="67%"><p>&nbsp;</p>
         <p><strong><font color="#000000"><?php echo $rows['detail']; ?></font></strong></p></td>
       </tr>
     </table>
     <p>&nbsp;</p>
   </div>
</div>
 <p>&nbsp;</p>
</body>
</html>
