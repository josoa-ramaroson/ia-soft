<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
if(($_SESSION['u_niveau'] != 7)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

<style type="text/css">
.rouge {	color: #F00;
}
</style>
</head>
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p><font size="2"><font size="2"><font size="2">
  <?php
  
$sql = "SELECT count(*) FROM $tbl_journal_audit";  

$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
 
 
$nb_total = mysqli_fetch_array($resultat);  
 
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 

if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    

   $nb_affichage_par_page = 50; 
   
 
$sql = "SELECT DISTINCT (Ip_user) , id_nom FROM  $tbl_journal_audit  ORDER BY date_Audit DESC LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC
 

$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  

$Sqlinscrit= "SELECT COUNT(DISTINCT Ip_user) AS nb  FROM  $tbl_journal_audit  ";
$sqLvaleur = mysqli_query($linki,$Sqlinscrit)or exit(mysqli_error($linki)); 
$nb = mysqli_fetch_assoc($sqLvaleur);
$nombre_inscrit=$nb['nb'] ; 

?>

<div class="panel panel-primary">
<a href="Journal_audit_v_bd_read.php" class="btn btn-sm btn-success" > Exploitation du systeme </a>|
<a href="Journal_audit_v_bd_read_connexion.php" class="btn btn-sm btn-success" > Traçabilité  </a> |
<a href="Journal_audit_v_bd_read_filtre.php" class="btn btn-sm btn-success" >  IP & Utilisateur </a> | 
<a href="Journal_audit_v_bd_read_filtreip.php" class="btn btn-sm btn-success" >  IP  </a> | 
</div>

<h2>Nombre des inscrits : <?php echo $nombre_inscrit;  ?> </h2> 
 
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="80" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font><font color="#FFFFFF">SID</font></td>
    <td width="206" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Utilisateur </font></td>
    <td width="175" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Fichier consulter</font></td>
    <td width="186" align="center" bgcolor="#3071AA">&nbsp;</td>
    <td width="212" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Date  </font></td>
    <td width="87" align="center" bgcolor="#3071AA"><font color="#FFFFFF">IP </font></td>
    <td width="86" align="center" bgcolor="#3071AA">&nbsp;</td>
  </tr>
  <?php
while($data=mysqli_fetch_array($req)){ 
?>
   <tr bgcolor=<?php gettatut2($data['id_nom']); ?>>
    <td align="center"  style="background-color:#FFF;"><?php //echo $data['id_j'];?>      <div align="left"></div></td>
    <td align="center"><?php echo $data['id_nom'];?></td>
    <td align="center"  style="background-color:#FFF;"><?php //echo $data['le_file'];?></td>
    <td align="center"  style="background-color:#FFF;">&nbsp;</td>
    <td width="212"  style="background-color:#FFF;"><?php // echo $data['date_Audit'];?></td>
    <td width="87"   style="background-color:#FFF;"><?php echo $data['Ip_user'];?></td>
    <td width="86">&nbsp;</td>
  </tr>
  <?php

}

mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  

	             function gettatut2($statut){
				 $statut_couleur=md5($statut);	
				 $traitement_couleur='#'.strtolower(substr($statut_couleur,0,6));
				 $couleur=$traitement_couleur;
				 echo "$couleur";
				 }
	
		  
mysqli_free_result ($resultat);  
mysqli_close ($linki);  
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
