<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fonction.php';
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
Require("bienvenue.php"); 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="47%" height="21">          <?php
require('stk_Rapport_lien.php');
?>&nbsp;</td>
  </tr>
</table>
  <?php
$vendeur=addslashes($_POST['Vendeur']);
$id_nom=addslashes($_POST['user']);
$sql1="SELECT * FROM $tbl_vente  where id_nom='$id_nom' and datev='$vendeur' ";
$req=mysql_query($sql1);
?>
  </font></strong></font></font></font></font></p>
<p><font size="2"><font size="2"><font size="2"><font size="2"><strong><font color="#0000FF"> 
  </font></strong></font></font></font></font></p>
<table width="100%" border="0" align="center">
  <tr> 
    <td width="84%"> 
      <div align="center"></div></td>
  </tr>
  <tr> 
    <td><form name="form2" method="post" action="formationsupprime1_question.php">
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
          <tr bgcolor="#006ABE"> 
            <td width="13%" align="center"><strong><em><font color="#CCCCCC" size="3"><strong>Vendeur</strong></font></em></strong></td>
            <td width="13%" align="center"><font color="#CCCCCC" size="4"><strong>Date</strong></font><font color="#000000" size="3">&nbsp;</font><font color="#CCCCCC" size="3">&nbsp;</font></td>
            <td width="36%" align="center"><font color="#CCCCCC" size="3"><strong>Produit </strong></font></td>
            <td width="10%" align="center"><font color="#CCCCCC" size="3"><strong>Quantite</strong></font></td>
            <td width="18%" align="center"><font color="#CCCCCC" size="3"><strong>Prix Unitaire </strong></font></td>
            <td width="18%" align="center"><font color="#CCCCCC" size="3"><strong>Prix TOTAL  </strong></font></td>
          </tr>
          <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
          <tr> 
            <td bgcolor="#FFFFFF"><div align="left"><strong><em><? echo $data['id_nom'];?></em></strong><BR>
              </div></td>
            <td align="center" bgcolor="#FFFFFF"><? echo $data['datev'];?></td>
            <td align="center" bgcolor="#FFFFFF"><em><? echo $data['titre'];?></em> 
            </td>
            <td align="center" bgcolor="#FFFFFF"><em><? echo $data['Qvente'];?></em> 
            </td>
            <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data['PUnitaire']),3," ")) ?></em></td>
            <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data['PTotal']),3," ")) ?></em></td>
          </tr>
          <?php
// Exit looping and close connection 
}
//mysql_close();
?>
        </table>
      </form></td>
  </tr>
</table>
<font size="2"><font size="2"><font size="2"><font size="2"><strong><font color="#0000FF">
<?php
$sql2="SELECT datev, titre, id_nom,  SUM(Qvente) AS qtvendu , SUM(PTotal) AS prix  FROM $tbl_vente where   id_nom='$id_nom' and datev='$vendeur'   GROUP BY datev";
$result2=mysql_query($sql2);
?>
</font></strong></font></font></font></font>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <?php
while($rows2=mysql_fetch_array($result2)){ // Start looping table row 
?>
  <tr> 
    <td width="82%" bgcolor="#FFFFFF"><div align="right"><strong>Total </strong><BR>
      </div></td>
    <td width="18%" align="center" bgcolor="#FFFFFF"><div align="center"></div>
      <? echo strrev(chunk_split(strrev($rows2['prix']),3," "));  ?></td>
  </tr>
  <?php
// Exit looping and close connection 
}
mysql_close();
?>
</table>
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
