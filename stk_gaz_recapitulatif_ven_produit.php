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
$titre=addslashes($_POST['titre1']); 
$sql1="SELECT * FROM ginv_vente where  titre='$titre' and  type=1 ";
$req=mysqli_query($linki,$sql1);
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
            <td width="36%" align="center"><font color="#CCCCCC" size="3"><strong>Produit 
              </strong></font></td>
            <td width="20%" align="center"><font color="#CCCCCC" size="3"><strong>Quantite</strong></font></td>
            <td width="18%" align="center"><font color="#CCCCCC" size="3"><strong>Prix 
              Unitaire </strong></font></td>
          </tr>
          <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
          <tr> 
            <td bgcolor="#FFFFFF"><div align="left"><strong><em><?php echo $data['id_nom'];?></em></strong><BR>
              </div></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $data['datev'];?></td>
            <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['titre'];?></em> 
            </td>
            <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['Qvente'];?></em> 
            </td>
            <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data['PUnitaire']),3," ")) ?></em></td>
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
<?php
$tbl_name="ginv_vente"; // Table name 
$sql2="SELECT datev, titre,  SUM(Qvente) AS qtvendu , SUM(PTotal) AS prix  FROM $tbl_name where  titre='$titre'  and type=1 GROUP BY titre";
$result2=mysqli_query($linki,$sql2);
?>
</font></strong></font></font></font></font>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <?php
while($rows2=mysqli_fetch_array($result2)){ // Start looping table row 
?>
  <tr> 
    <td width="82%" bgcolor="#FFFFFF"><div align="right"><strong>Total </strong><BR>
      </div></td>
    <td width="18%" align="center" bgcolor="#FFFFFF"><div align="center"></div>
      <?php echo strrev(chunk_split(strrev($rows2['prix']),3," "));  ?></td>
  </tr>
  <?php
// Exit looping and close connection 
}
mysqli_close($linki);
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