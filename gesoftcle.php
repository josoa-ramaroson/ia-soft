<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
if(($_SESSION['u_niveau']!= 7) &&($_SESSION['u_niveau']!= 10)) {
	header("location:index.php?error=false");
	exit;
 }
?>

<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

<style type="text/css">
.rouge {	color: #F00;
}
</style>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p>
<?
 $fichier="cle.crt";
 if($fp=fopen("$fichier","r"))
 {
 $i=0;
 while($ligne=fgets($fp,7000))
 {
 $i++;
 "$ligne <BR> ";
  ?> 
 
<form id="form1" name="form1" method="post" action="">
  <textarea name="textarea" id="textarea" cols="100" rows="10"><?php echo $ligne; ?>  </textarea>
</form>
  <?
 }
 fclose($fp);
 }
 ?> 

</p>
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
