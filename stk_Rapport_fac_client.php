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
require("bienvenue.php"); 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="47%" height="21">          <?php
require('stk_Rapport_lien.php');
?></td>
  </tr>
</table>
  <?php
$nc=addslashes($_POST['nc']);
$_SESSION["nc"]=$nc;
$sql1="SELECT SUM(PTotal) AS prix , nc , datev  FROM $tbl_vente   where  nc='$nc' GROUP BY datev ORDER BY datev  ASC  ";
$req=mysql_query($sql1);

$sql5="SELECT * FROM $tbl_contact  where  id='$nc'  ";
$req5=mysql_query($sql5);
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
            <td width="10%" align="center"><strong><em><font color="#CCCCCC" size="4"><strong>Code 
              Client</strong></font><font color="#CCCCCC" size="3"></font></em></strong></td>
            <td width="20%" align="center"><font color="#CCCCCC" size="4"><strong>Non 
              client </strong></font></td>
            <td width="14%" align="center"><font color="#CCCCCC" size="3">&nbsp;</font><font color="#CCCCCC" size="4"><strong>Telephone</strong></font></td>
            <td width="33%" align="center"><font color="#CCCCCC" size="4"><strong>Adresse</strong></font><font color="#000000" size="3">&nbsp;</font><font color="#CCCCCC" size="3">&nbsp;</font><font color="#CCCCCC" size="3">&nbsp;</font></td>
            <td width="12%" align="center"><font color="#CCCCCC" size="3">&nbsp;</font><font color="#CCCCCC" size="4"><strong>Date</strong></font><font color="#000000" size="3">&nbsp;</font></td>
            <td width="11%" align="center"><font color="#CCCCCC" size="3"><strong>Prix 
              Unitaire </strong></font></td>
          </tr>
          <?php
while($data5=mysql_fetch_array($req5)){ // Start looping table row
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
          <tr> 
            <td bgcolor="#FFFFFF"><div align="left"><strong></strong><? echo $data['nc'];?><BR>
              </div></td>
            <td align="center" bgcolor="#FFFFFF"><? echo $data5['nomprenom'];?> <div align="left"></div>
              <div align="left"></div></td>
            <td align="center" bgcolor="#FFFFFF"> <a href="stk_factureimp.php?m1=<? echo $_SESSION["nc"];?>&m2=<? echo $data['datev'];?>&m3=<? echo $id_nom;?>" target="_blank" > 
              </a><? echo $data5['tel'];?> </td>
            <td align="center" bgcolor="#FFFFFF"><?  echo $data5['adresse'];?> 
              <div align="left"></div></td>
            <td align="center" bgcolor="#FFFFFF"><a href="stk_factureimp.php?m1=<? echo $_SESSION["nc"];?>&m2=<? echo $data['datev'];?>&m3=<? echo $id_nom;?>" target="_blank" ><? echo $data['datev'];?></a></td>
            <td align="center" bgcolor="#FFFFFF"><? echo strrev(chunk_split(strrev($data['prix']),3," "));  ?></td>
          </tr>
          <?php 
}
}
//mysql_close();
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
    <td height="29">&nbsp; </td>
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
