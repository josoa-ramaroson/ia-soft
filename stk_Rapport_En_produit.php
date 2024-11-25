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
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
            <?php
require('stk_Rapport_lien.php');
?>
  <?php
$titre=addslashes($_POST['titre']); 
$sql1="SELECT * FROM $tbl_enreg   where  titre='$titre' ";
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
            <td width="13%" align="center"><font color="#CCCCCC" size="4"><strong>Date</strong></font><font color="#000000" size="3">&nbsp;</font></td>
            <td width="29%" align="center"><font color="#CCCCCC" size="3"><strong>Produit 
              </strong></font></td>
            <td width="21%" align="center"><font color="#000000" size="3">&nbsp;</font><font color="#CCCCCC" size="3"><strong>Validite</strong></font></td>
            <td width="18%" align="center"><font color="#CCCCCC" size="3"><strong>Quantite</strong></font></td>
            <td width="19%" align="center"><font color="#CCCCCC" size="3"><strong>Prix 
              Unitaire </strong></font></td>
            <td width="19%" align="center"><font color="#CCCCCC" size="3"><strong> 
              Utilisateur</strong></font></td>
          </tr>
          <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
          <tr> 
            <td bgcolor="#FFFFFF"><div align="left"><? echo $data['date'];?><BR>
              </div></td>
            <td align="center" bgcolor="#FFFFFF"><em><? echo $data['titre'];?></em></td>
            <td align="center" bgcolor="#FFFFFF"> <em><? echo $data['Validite'];?></em> 
            </td>
            <td align="center" bgcolor="#FFFFFF"><em><? echo $data['Quantite'];?></em> 
            </td>
            <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data['PrixUnitaire']),3," ")) ?></em> 
            </td>
            <td align="center" bgcolor="#FFFFFF"><em><? echo $data['id_nom'];?></em></td>
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
