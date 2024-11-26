<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';
?>
<?php
 if((($_SESSION['u_niveau'] != 50) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<style type="text/css">
.centre {	font-weight: bold;
	font-size: 36px;
}
.centre {	text-align: center;
}
</style>
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
$sql = "SELECT count(*) FROM $tb_rhpersonnel where statut='Operationnel' and idrhp NOT IN(SELECT idrh FROM $tb_rhconge where anneeconge='$anneepaie')";  
$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM  $tb_rhpersonnel where statut='Operationnel' and idrhp NOT IN(SELECT idrh FROM $tb_rhconge where anneeconge='$anneepaie') ORDER BY matricule ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  

	//recherche du repport  
?>
  <span class="centre"> Les congés restant de l'année <?php echo $anneepaie;?>  . Voir la liste Globale <a href="rh_conge.php">&gt;&gt;</a></span></p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="8%" align="center"><font color="#FFFFFF" size="4"><strong>Matricule </strong></font></td>
      <td width="16%" align="center"><font color="#FFFFFF" size="3"><strong>Direction </strong></font></td>
      <td width="16%" align="center"><font color="#FFFFFF" size="3"><strong>Service </strong></font></td>
     <td width="32%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
     <td width="15%" align="center"><strong><font color="#FFFFFF">Annee</font></strong></td>
     <td width="13%" align="center">&nbsp;</td>
  </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
$idrh=$data['idrhp'];
?>
   <tr bgcolor="<?php gettatut(stat_eda3($tb_rhconge, $anneepaie, $idrh)); ?>">
     <td height="33" align="center"><em><?php echo $data['matricule'];?></em></td>
     <td height="33" ><em><?php echo $data['direction'];?></em></td>
     <td height="33" ><em><?php echo $data['service'];?></em></td>
     <td align="center"><div align="left"><em><?php echo $data['nomprenom'];?></em></div></td>
     <td align="center" ><em><?php echo $anneepaie;?></em></td>
     <td align="center" bgcolor="#FFFFFF">
      <?php if ($_SESSION['u_niveau']==50){?>
     <a href="rh_conge_save.php?id=<?php echo md5(microtime()).$data['idrhp']; ?>&@i=<?php echo md5(microtime()).$id_nom; ?>" class="btn btn-sm btn-success" >Enregistre </a>
      <?php } else {} ?>
     </td>
   </tr>
   <?php
}
mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat); 


		function stat_eda3($tb_rhconge, $anneepaie, $idrh){ 
		$sqlv="SELECT COUNT(*) AS nombre FROM $tb_rhconge  WHERE idrh='$idrh'  and anneeconge='$anneepaie'" ;
        $rev = mysqli_query($linki,$sqlv); 
	    $nqtv = mysqli_fetch_array($rev);
        if((!isset($nqtv['nombre'])|| empty($nqtv['nombre']))) { $qt=''; return $qt; } else {$qt=$nqtv['nombre']; return $qt;}
		} 
		
		function gettatut($fetat){
		if ($fetat>0) { echo $couleur="#87e385";} else { echo $couleur="#ffc88d";}//vert
		}
		 
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