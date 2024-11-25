<?
require 'session.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';
?>
<?
	if((($_SESSION['u_niveau'] != 50) ) && ($_SESSION['u_niveau'] != 90)) {
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

$sql="SELECT SUM(sbase) AS sbase , SUM(SS) AS SS , SUM(SI) AS SI, SUM(SD) AS SD, SUM(SR) AS SR, SUM(SNET) AS SNET, moispaie ,anneepaie , direction,  SUM(igr) AS igr ,  SUM(retraite) AS retraite   FROM $tb_rhpaie   where anneepaie='$anneepaie' and moispaie='$moispaie' GROUP BY  direction"; 
$resultat = mysql_query($sql);
	

$sql2="SELECT SUM(sbase) AS sbase , SUM(SS) AS SS , SUM(SI) AS SI, SUM(SD) AS SD, SUM(SR) AS SR, SUM(SNET) AS SNET, moispaie ,anneepaie , direction,  SUM(igr) AS igr ,  SUM(retraite) AS retraite   FROM $tb_rhpaie   where anneepaie='$anneepaie' and moispaie='$moispaie'"; 
$resultat2 = mysql_query($sql2);	
$data2=mysql_fetch_array($resultat2)	
?>
 </p>
<p><em> RECAPITULATIF         <? $n1=$moispaie; 
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
	  ?></em> - <em><? echo  $anneepaie;?></em></p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
   <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>DIRECTION</strong></font></td>
     <td width="8%" align="center"><strong><font color="#FFFFFF" size="3">Salaire brut</font></strong></td>
     <td width="11%" align="center"><strong><font color="#FFFFFF" size="3">Total brut</font></strong></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>T Indemnites</strong> </font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>T Reductions</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF"><strong>T. IGR</strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>T. Retraite</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>T. Retenues</strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF"><strong>NET A PAYER </strong></font></td>
  </tr>
   <?php
while($data=mysql_fetch_array($resultat)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['direction'];?></em></td>
     <td align="center" bgcolor="#CCCCCC"><em><? echo strrev(chunk_split(strrev($data['sbase']),3," ")); ?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data['SS']),3," ")); ?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data['SI']),3," "));?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data['SD']),3," "));?></em></td>
     <td align="center" bgcolor="#CCCCCC"><em><? echo strrev(chunk_split(strrev($data['igr']),3," "));?></em></td>
     <td align="center" bgcolor="#CCCCCC"><em><? echo strrev(chunk_split(strrev($data['retraite']),3," "));?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data['SR']),3," "));?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data['SNET']),3," "));?><em></td>
   </tr>
   <?php
}

?>
</table>
<p>&nbsp;</p>
<p>NB : T Retenues = T.IGR+T.Retraite</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="10%" align="center">&nbsp;</td>
    <td width="8%" align="center"><strong><font color="#FFFFFF" size="3">Salaire brut</font></strong></td>
    <td width="11%" align="center"><strong><font color="#FFFFFF" size="3">Total brut</font></strong></td>
    <td width="12%" align="center"><font color="#FFFFFF"><strong>T Indemnites</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>T Reductions</strong></font></td>
    <td width="9%" align="center"><font color="#FFFFFF"><strong>T. IGR</strong></font></td>
    <td width="13%" align="center"><font color="#FFFFFF"><strong>T. Retraite</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>T. Retenues</strong></font></td>
    <td width="15%" align="center"><font color="#FFFFFF"><strong>NET A PAYER </strong></font></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">TOTAL </td>
    <td align="center" bgcolor="#CCCCCC"><em><? echo strrev(chunk_split(strrev($data2['sbase']),3," ")); ?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data2['SS']),3," ")); ?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data2['SI']),3," "));?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data2['SD']),3," "));?></em></td>
    <td align="center" bgcolor="#CCCCCC"><em><? echo strrev(chunk_split(strrev($data2['igr']),3," "));?></em></td>
    <td align="center" bgcolor="#CCCCCC"><em><? echo strrev(chunk_split(strrev($data2['retraite']),3," "));?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data2['SR']),3," "));?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data2['SNET']),3," "));?><em></td>
  </tr>
  <?php
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