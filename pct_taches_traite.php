<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?php
 if($_SESSION['u_niveau'] != 10) {
	header("location:index.php?error=false");
	exit;
 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<p><font size="2"><font size="2"></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font><font size="2"><font size="2"><span style="margin-left: 30">
  <?php
require 'fonction.php';
$sql = "SELECT count(*) FROM $tbl_pctaches where suivi='Traité'";  

$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
 
$nb_total = mysqli_fetch_array($resultat);  

if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
   $nb_affichage_par_page = 10; 

$sql = "SELECT * FROM $tbl_pctaches  where suivi='Traité' ORDER BY idpc DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
 
// on ex?cute la requ?te  ASC
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
</span></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="64"  bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
    <td width="83"  bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Date</strong></font></td>
    <td width="79" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="3">Ile</font></strong></td>
    <td width="128" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="3">Agence</font></strong></td>
    <td width="122" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="3">Utilisateur</font></strong></td>
    <td width="140" bgcolor="#3071AA"><strong><font color="#FFFFFF">Nom du Pc</font></strong></td>
    <td width="252" bgcolor="#3071AA"><strong><font color="#FFFFFF">Taches à faire </font></strong></td>
    <td width="90" bgcolor="#3071AA"><strong><font color="#FFFFFF">Statut</font></strong></td>
    <td width="70" bgcolor="#3071AA"><strong><font color="#FFFFFF">Suivi</font></strong></td>
    <td width="99" bgcolor="#3071AA"><strong><font color="#FFFFFF">TI Resp.</font></strong></td>
  </tr>
  <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
  <tr bgcolor="<?php gettatut($data['suivi']); ?>">
    <td ><a href="pc_affichage_user.php?id=<?php echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-success" > <?php echo $data['idpc']; ?></a>
      <div align="left"></div></td>
    <td ><?php echo $data['date']; ?></span></td>
    <td ><?php echo $data['ile']; ?></span></td>
    <td ><?php echo $data['agence']; ?></span></td>
    <td ><?php echo $data['utilisateur'];?></td>
    <td ><?php echo $data['nom'];?></td>
    <td ><?php echo $data['taches'];?></td>
    <td ><?php echo $data['statut'];?></td>
    <td ><?php echo $data['suivi'];?></td>
    <td ><?php echo $data['realisateur'];?></td>
  </tr>
  <?php

}

mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  
	                 function gettatut($fetat){
				 if ($fetat=='En cours') { echo $couleur="#fdff00";}//jaune	
				 if ($fetat=='Traité')   { echo $couleur="#87e385";}//vert fonce
				 if ($fetat=='A faire')  { echo $couleur="#ec9b9b";}//rouge -Declined				 
				 }
?>
</table>
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
<p></p>
</body>
</html>