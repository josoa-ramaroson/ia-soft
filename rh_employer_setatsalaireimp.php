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
$sql = "SELECT * FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie' ORDER BY matricule ASC "; //DESC 
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
<p align="center"><em>ETAT SALAIRE
    <? $n1=$moispaie; 
	  if ($n1==1) echo 'Janvier';
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
   <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>Matricule </strong></font></td>
     <td width="14%" align="center"><font color="#FFFFFF"><strong>Direction</strong> </font></td>
     <td width="15%" align="center"><font color="#FFFFFF"><strong>Service</strong></font></td>
     <td width="34%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF"><strong>Compte de Virement </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Net à payer </strong></font></td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
$idrh=$data['idrh'];
$sqlconnect="SELECT * FROM $tb_rhpersonnel  WHERE idrhp=$idrh";
$resultconnect=mysql_query($sqlconnect);
$rmat=mysql_fetch_array($resultconnect);
$nCPP= $rmat['CPP'];

?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['matricule'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['direction'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['service'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo strtoupper($data['nomprenom']);?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $nCPP;?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo strrev(chunk_split(strrev($data['SNET']),3," ")); ?></td>
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