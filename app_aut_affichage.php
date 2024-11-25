<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
	if((($_SESSION['u_niveau'] != 40) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

</head>
<?
require("bienvenue.php"); // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p><font size="2"><font size="2"><font size="2">
  <?php
 
$mois=$_POST['mois'];
$annee=$_POST['annee']; 
$service=$_POST['service']; 
 
$sql = "SELECT * FROM $tbl_appaut where  MONTH(date)=$mois and YEAR(date)=$annee  and  service='$service' ORDER BY idapp_aut DESC ";  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  


	$sqPT="SELECT SUM(Montant) AS montant  FROM $tbl_appaut where  MONTH(date)=$mois and YEAR(date)=$annee  and  service='$service' "; 
	$RPT = mysql_query($sqPT); 
	$AFPT = mysql_fetch_assoc($RPT);
	$tPT=$AFPT['montant']; 
	
?>
<a href="app_aut_affichage_imp.php?a=<? echo md5(microtime()).$mois;?>&b=<? echo md5(microtime()).$annee;?>&c=<? echo md5(microtime()).$service;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>

  </font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font>
<form name="form2" method="post" action="produit_cancel.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#FFFFFF"> 
      <td width="52" bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
      <td width="123" bgcolor="#3071AA"><font color="#FFFFFF">Date</font></td>
      <td width="178" bgcolor="#3071AA" ><font color="#FFFFFF">Service</font></td>
      <td width="231" bgcolor="#3071AA" ><font color="#FFFFFF">Nature</font></td>
      <td width="281" bgcolor="#3071AA" ><font color="#FFFFFF">Motif</font></td>
      <td width="98" bgcolor="#3071AA" ><font color="#FFFFFF">Montant</font></td>
    </tr>
    <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr> 
      <td align="center" bgcolor="#FFFFFF"> <div align="left"><? echo $data['idapp_aut'];?></div>
        <div align="left"></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['date'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['service'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['Nature'];?></em></div></td>
      <td width="281"   style="background-color:#FFF;"><em><? echo $data['Motif'];?></em></td>
      <td width="98"   style="background-color:#FFF;"><? echo $data['Montant'];?></td>
    </tr>
    <?php

}
  
?>
  </table>
</form>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="672" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="430" align="center" bgcolor="#3071AA"><font color="#FFFFFF">MONTANT TOTAL</font> </td>
  </tr>

  <tr bgcolor="#FFFFFF">
    <td align="center">&nbsp;</td>
    <td align="center"><em><? echo $tPT;?></em></td>
  </tr>
</table>
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
