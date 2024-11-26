<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';
?>
<?php
 if($_SESSION['u_niveau'] != 50) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<p>
  <?php

$sql2="SELECT SUM(sbase) AS sbase , SUM(igr) AS igr , SUM(retraite) AS retraite, SUM(prevoyance) AS prevoyance,  SUM(aretenue) AS aretenue, moispaie ,anneepaie  FROM $tb_rhpaie   where anneepaie='$anneepaie' and moispaie='$moispaie' "; 
$resultat2 = mysqli_query($linki,$sql2);	
$data2=mysqli_fetch_array($resultat2)
?>
  <?php
$sql = "SELECT count(*) FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie'";  
$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie' ORDER BY matricule ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page; //DESC 
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
 </p>
 <a href="rh_employer_retenuesimp.php?<?php echo md5(microtime());?><?php echo md5(microtime());?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a><a href="rh_employer_retenues_export.php"><img src="images/telecharger.jpg" width="47" height="36"></a>
<p align="center"><em>RECAPITULATIF  RETENUES
  <?php $n1=$moispaie; 
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
</em> - <em><?php echo  $anneepaie;?></em></p>
<table width="97%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="8%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="8%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="11%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="20%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>Salaire base</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>IGR</strong></font></td>
    <td width="12%" align="center"><font color="#FFFFFF"><strong>C de Retraite</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>C prevoyance</strong></font></td>
    <td width="8%" align="center"><font color="#FFFFFF"><strong>Autres </strong></font></td>
  </tr>

  <tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">TOTAL</td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['sbase'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['igr'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['retraite'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['prevoyance'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data2['aretenue'];?></td>
  </tr>

</table>
<p align="center">&nbsp;</p>
<table width="97%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
   <td width="8%" align="center"><font color="#FFFFFF" size="4"><strong>NTC </strong></font></td>
     <td width="8%" align="center"><font color="#FFFFFF" size="4"><strong>Matricule </strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Direction</strong> </font></td>
     <td width="20%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Salaire base</strong> </font></td>
      <td width="11%" align="center"><font color="#FFFFFF"><strong>IGR</strong> </font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>C de Retraite</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>C prevoyance</strong></font></td>
     <td width="8%" align="center"><font color="#FFFFFF"><strong>Autres </strong></font></td>
  </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
$idrh=$data['idrh'];
$sqlconnect="SELECT * FROM $tb_rhpersonnel  WHERE idrhp=$idrh";
$resultconnect=mysqli_query($linki,$sqlconnect);
$rmat=mysqli_fetch_array($resultconnect);
$nCPP= $rmat['CPP'];
$NTC= $rmat['NTC'];
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><?php echo $NTC;?></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['matricule'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['direction'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo strtoupper($data['nomprenom']);?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['sbase'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['igr'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['retraite'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['prevoyance'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><?php echo $data['aretenue'];?></td>
   </tr>
   <?php
}
mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ();  
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