<?
require 'session.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';
?>
<?
	if($_SESSION['u_niveau'] != 50) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
</head>
<?
//Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<p>
  <?php

$sql2="SELECT SUM(cotisation) AS cotisation , SUM(avances) AS avances , SUM(pret) AS pret, SUM(adeduction) AS adeduction,  moispaie ,anneepaie  FROM $tb_rhpaie   where anneepaie='$anneepaie' and moispaie='$moispaie' "; 
$resultat2 = mysql_query($sql2);	
$data2=mysql_fetch_array($resultat2)
?>
  <?php
$sql = "SELECT * FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie' ORDER BY matricule ASC "; //DESC 
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
<p align="center"><em>ECAPITULATIF TOTAL INDEMNITES
        <? $n1=$moispaie; 
	  if ($n1==1) echo 'janvier';
	  if ($n1==2) echo 'février'; 
	  if ($n1==3) echo 'Mars';
	  if ($n1==4) echo 'Avril'; 
	  if ($n1==5) echo 'Mai'; 
	  if ($n1==6) echo 'Juin'; 
	  if ($n1==7) echo 'Juillet'; 
	  if ($n1==8) echo 'Août'; 
	  if ($n1==9) echo 'Septembre'; 
	  if ($n1==10) echo 'Octobre';
	  if ($n1==11) echo 'Novembre'; 
	  if ($n1==12) echo 'Decembre';  
	  ?>
</em> - <em><? echo  $anneepaie;?></em></p>
<table width="97%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="8%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="9%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="19%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>Caisse mutuelle </strong></font></td>
    <td width="13%" align="center"><font color="#FFFFFF"><strong>Avance sur Salaire</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>Pret </strong></font></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>Autres deduction </strong></font></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">TOTAL</td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['cotisation']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['avances'];?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['pret'];?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['adeduction'];?></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<table width="97%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
   <td width="8%" align="center"><font color="#FFFFFF" size="4"><strong>Matricule </strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF"><strong>Direction</strong> </font></td>
     <td width="19%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Caisse mutuelle </strong> </font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Avance sur Salaire</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Pret </strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Autres deduction </strong></font></td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['matricule'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['direction'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['nomprenom'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['cotisation']; ?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['avances'];?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['pret'];?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['adeduction'];?></td>
   </tr>
   <?php
}

mysql_close ();  
?>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="21"><?php
include_once('pied.php');
?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>