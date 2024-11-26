<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
if(($_SESSION['u_niveau'] != 7)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

</head>
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
  <div class="panel-heading">
            <h3 class="panel-title">Mise à jour Tarif </h3>
            </div>
  <form name="form1" method="post" action="tarif_updates.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="16%" height="36"><strong><font color="#CC9933" size="5">
          <?php

//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
$sql3="SELECT * FROM $tbl_tarif WHERE idt='$id'";
$result3=mysqli_query($linki,$sql3);

$rows3=mysqli_fetch_array($result3);
?>
        </font>libelle</strong></td>
        <td width="30%"><em>
          <input name="mnom" type="text" id="mnom" value="<?php echo $rows3['Libelle'];?>" size="30" readonly>
        </em></td>
        <td width="21%">&nbsp;</td>
        <td width="33%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31"><strong>Tarif 1</strong></td>
        <td><em>
          <input name="t1" type="text" id="t1" value="<?php echo $rows3['t1'];?>" size="30">
        </em></td>
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
        <td height="36"><strong>Tarif 2</strong></td>
        <td><em>
          <input name="t2" type="text" id="t2" value="<?php echo $rows3['t2'];?>" size="30">
        </em></td>
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
        <td height="47"><strong>Quantité</strong></td>
        <td><input name="q" type="text" id="q" value="<?php echo $rows3['q'];?>" size="30"></td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><em>
          <input name="idp" type="hidden" id="idp" value="<?php echo $rows3['idt'];?>">
          <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>">
        </em></td>
        <td><input type="submit" name="Submit3" value="Enregistrer"></td>
      </tr>
    </table>
  </form>

  <body link="#0000FF" vlink="#0000FF" alink="#0000FF">

            </div>
</div>
<p><font size="2"><font size="2"></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
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
