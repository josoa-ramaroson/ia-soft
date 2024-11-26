<?php
Require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fonction.php';
?>
<html>
<head>
<title>
<?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?php
Require("bienvenue.php"); 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="47%" height="21">          <?php
require('stk_gaz_recapitulatif_lien.php');
?></td>
  </tr>
</table>
  <?php
$sql1="SELECT YEAR(datev) AS annee , SUM(PTotal) AS prix  FROM $tbl_vente  where type=1 GROUP BY YEAR(datev) ";
$req=mysqli_query($linki,$sql1);
?>
  </font></strong></font></font></font></font></p>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr> 
    <td width="84%"> 
      <div align="center"></div></td>
  </tr>
  <tr> 
    <td><form name="form2" method="post" action="formationsupprime1_question.php">
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
          <tr bgcolor="#006ABE"> 
            <td width="13%" align="center"><font color="#CCCCCC" size="3"><strong>ANNEE</strong></font></td>
            <td width="36%" align="center"><font color="#CCCCCC" size="4">&nbsp;</font></td>
            <td width="20%" align="center"><font color="#CCCCCC" size="3">&nbsp;</font></td>
            <td width="18%" align="center"><font color="#CCCCCC" size="3"><strong>MONTANT</strong></font></td>
          </tr>
          <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
          <tr> 
            <td align="center" bgcolor="#FFFFFF"><?php echo $data['annee'];?></td>
            <td align="center" bgcolor="#FFFFFF">&nbsp; </td>
            <td align="center" bgcolor="#FFFFFF">&nbsp; </td>
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
</table>
<font size="2"><font size="2"><font size="2"><font size="2"><strong><font color="#0000FF"> 
</font></strong></font></font></font></font> 
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
