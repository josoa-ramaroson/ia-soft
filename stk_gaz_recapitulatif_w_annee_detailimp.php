<?php
Require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fonction.php';
?>
<html>
<head>
<title>
<?php include("titre.php"); ?></title>
<?php include 'inc/head.php'; ?>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?
//require("bienvenue.php"); 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">

<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="47%" height="21">          <?php
//require('stk_gaz_recapitulatif_lien.php');
?></td>
  </tr>
</table>
  <?php
$annee=substr($_REQUEST["annee"],32);

$sql1="SELECT MONTHNAME(datev) AS mois, YEAR(datev) AS annee , SUM(PTotal) AS prix  FROM $tbl_vente  where type=1  and YEAR(datev)=$annee GROUP BY YEAR(datev) ";
$req=mysqli_query($linki,$sql1);

$sql2="SELECT titre  , SUM(Qvente) AS Qvente ,  PUnitaire , SUM(PTotal) AS prix2 FROM $tbl_vente  where type=1 and  YEAR(datev)=$annee GROUP BY titre ";
$req2=mysqli_query($linki,$sql2);

?>
  </font></strong></font></font></font></font></p>
<p>&nbsp;</p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Montant r&eacute;capitulatif </h3> 
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52%"></td>
          </tr>
          
          <tr>
            <td width="52%"><form action="" method="post" name="form5" id="form11">
              <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1">
                <tr >
                  <td width="13%" align="center" ><font  size="3"><strong>ANNEE</strong></font></td>
                  <td width="36%" align="center" ><font size="4"><strong></strong></font></td>
                  <td width="20%" align="center" ><font  size="3">&nbsp;</font></td>
                  <td width="18%" align="center" ><font  size="3"><strong>MONTANT</strong></font></td>
                </tr>
                <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
                <tr>
                  <td align="center" bgcolor="#FFFFFF"><?php echo $data['annee'];?></td>
                  <td align="center" bgcolor="#FFFFFF"></td>
                  <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                  <td align="center" bgcolor="#FFFFFF"><?php echo strrev(chunk_split(strrev($data['prix']),3," "));  ?></td>
                </tr>
                <?php
// Exit looping and close connection 
}
//mysqli_close($linki);
?>
              </table>
            </form></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Les d&eacute;tails</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52%"></td>
          </tr>
          <tr>
            <td width="52%"><form action="" method="post" name="form5" id="form2">
              <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1">
                <tr >
                  <td width="13%" align="center" ><font  size="3"><strong>Description</strong></font></td>
                  <td width="36%" align="center" ><font size="4"><strong>Quantit&eacute;</strong></font></td>
                  <td width="20%" align="center" ><font  size="3">Prix Unitaire </font></td>
                  <td width="18%" align="center" ><font  size="3"><strong>MONTANT</strong></font></td>
                </tr>
                <?php
while($data2=mysqli_fetch_array($req2)){ // Start looping table row 
?>
                <tr>
                  <td align="center" bgcolor="#FFFFFF"><?php echo $data2['titre'];?></td>
                  <td align="center" bgcolor="#FFFFFF"><?php echo $data2['Qvente']; ?></td>
                  <td align="center" bgcolor="#FFFFFF"><?php echo $data2['PUnitaire']; ?></td>
                  <td align="center" bgcolor="#FFFFFF"><?php echo strrev(chunk_split(strrev($data2['prix2']),3," "));  ?></td>
                </tr>
                <?php
// Exit looping and close connection 
}
//mysqli_close($linki);
?>
              </table>
            </form></td>
          </tr>
        </table></td>
      </tr>
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
<p>&nbsp; </p>
</body>
</html>
