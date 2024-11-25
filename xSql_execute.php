<?
require 'session.php';
require 'fonction.php';
?>
<?
if(($_SESSION['privileges']!= 7)) {
	header("location:index.php?error=false");
	exit;
 }
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
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Ecrire la requête a executé</h3>
  </div>
  <div class="panel-body">
    <form name="form1" method="post" action="xSql_editor.php">
      <table width="100%" border="0">
        <tr>
          <td width="13%">&nbsp;</td>
          <td width="44%">&nbsp;</td>
          <td width="7%">&nbsp;</td>
          <td width="36%">&nbsp;</td>
        </tr>
        <tr>
          <td>Sql</td>
          <td><textarea name="sqlfichier" cols="150" rows="4" id="sqlfichier"></textarea></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>">
          </font></strong></font></strong></font></td>
          <td>&nbsp;</td>
          <td><input type="submit" name="executer" id="executer" value="Lancer"></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
                     <?php
                $llErreur = false;
                if (isset($_GET["a"]))
                $llErreur = true;
                ?>
                <div id="error" class="boiteorange" style="display:<?php if ($llErreur){echo "block";}else{echo "none";}?>;width:300px;">
                <p style="color:#F00" align="center">&nbsp;</p>
                </div></div>
</div>


<p>&nbsp;</p>
<div class="panel panel-success">
<div class="panel-heading">
  <h3 class="panel-title">&nbsp;</h3>
</div>
  <div class="panel-body"><a href="xSql_execute.php" class="btn btn-sm btn-success" >SQL Editor Boltosoft </a>|</div>

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
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("sqlfichier","req","SVP entre un nombre");
	
</script>
