<?
require 'session.php';
require 'fonction.php';
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script language="javascript" src="calendar/calendar.js"></script>
<style type="text/css">
.taile {
	font-size: 12px;
}
.taille16 {
	font-size: 16px;
}
.centrevaleur {	text-align: center;
}
</style>
</head>
<?
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>

<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
 <p>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Les traitants<font size="2"><font color="#FFFFFF"><font size="3"><font color="#000000"><strong><font size="5">
     
      <?php
$sql="SELECT * FROM $tbl_utilisateur  where u_niveau='5'  ";
$result=mysqli_query($linki,$sql);
?>

    </font></strong></font></font></font></font></h3>
  </div>
  <div class="panel-body">
    <table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#E6E6E6">
      <tr bgcolor="#3071AA">
        <td width="12%" align="center" ><strong><font color="#CCCCCC" size="4">Nom</font></strong></td>
        <td width="21%" align="center" ><strong><font color="#CCCCCC" size="4">Prenom </font></strong></td>
        <td width="24%" align="center" ><strong><font color="#CCCCCC" size="4">Email </font></strong></td>
        <td width="21%" align="center" ><strong><font color="#CCCCCC" size="4">TEL / GSM</font></strong></td>
      </tr>
      <?php
while($rows=mysqli_fetch_array($result)){ // Start looping table row 
?>
      <tr>
        <td bgcolor="#FFFFFF"><? echo $rows['u_nom']; ?></td>
        <td bgcolor="#FFFFFF"><? echo $rows['u_prenom']; ?><br></td>
        <td bgcolor="#FFFFFF"><? echo $rows['u_email']; ?></td>
        <td bgcolor="#FFFFFF"><? echo $rows['mobile']; ?></td>
      </tr>
      <?php
// Exit looping and close connection 
}
?>
    </table>
   </div>
</div>
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
<p>&nbsp;</p>
</body>
</html>
