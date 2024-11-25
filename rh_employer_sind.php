<?
require 'session.php';
require 'fc-affichage.php';
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
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<p>
  <?php

$sql2="SELECT SUM(fonction) AS fonction , SUM(transport) AS transport , SUM(logement) AS logement, SUM(telephone) AS telephone, SUM(risque) AS risque, SUM(caisse) AS caisse, SUM(astreinte) AS astreinte, SUM(panier) AS panier,SUM(remboursement) AS remboursement, moispaie ,anneepaie  FROM $tb_rhpaie   where anneepaie='$anneepaie' and moispaie='$moispaie' "; 
$resultat2 = mysql_query($sql2);	
$data2=mysql_fetch_array($resultat2)
?>
  <?php
$sql = "SELECT count(*) FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie'";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie' ORDER BY matricule ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page; //DESC 
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
 <a href="rh_employer_sindimp.php?<? echo md5(microtime());?><? echo md5(microtime());?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
<p align="center"><em>RECAPITULATIF TOTAL INDEMNITES
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
<table width="99%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="8%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="8%" align="center" bgcolor="#3071AA">Fonction </td>
    <td width="8%" align="center" bgcolor="#3071AA">Transport</td>
    <td width="9%" align="center" bgcolor="#3071AA">Logement</td>
    <td width="9%" align="center" bgcolor="#3071AA">Téléphone </td>
    <td width="9%" align="center" bgcolor="#3071AA">Risque/ AuT</td>
    <td width="8%" align="center" bgcolor="#3071AA">Caisse </td>
    <td width="9%" align="center" bgcolor="#3071AA">Prime Nuit </td>
    <td width="9%" align="center" bgcolor="#3071AA">P.Panier</td>
    <td width="8%" align="center" bgcolor="#3071AA">Rembours</td>
  </tr>

  <tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">TOTAL</td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['fonction']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['transport']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['logement']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['telephone']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['risque'];?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['caisse'];?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['astreinte'];?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['panier']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['remboursement']; ?></td>
  </tr>

</table>
<p align="center">&nbsp;</p>
<table width="99%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
   <td width="8%" align="center"><font color="#FFFFFF" size="4"><strong>Matricule </strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
     <td width="8%" align="center">Fonction </td>
      <td width="8%" align="center">Transport</td>
     <td width="9%" align="center">Logement</td>
     <td width="9%" align="center">Téléphone </td>
     <td width="9%" align="center">Risque/ AuT</td>
     <td width="8%" align="center">Caisse </td>
     <td width="9%" align="center">Prime Nuit </td>
     <td width="9%" align="center">P.Panier</td>
     <td width="8%" align="center">Rembours</td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['matricule'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['nomprenom'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['fonction']; ?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['transport']; ?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['logement']; ?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['telephone']; ?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['risque'];?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['caisse'];?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['astreinte'];?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['panier']; ?></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['remboursement']; ?></td>
   </tr>
   <?php
}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
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