<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>

<? require 'client_anomalies_menu.php';?>

  <?php
require 'fonction.php';
$sql = "SELECT count(*) FROM $tbl_client_anom where statut='Traité'";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
$nb_total = mysql_fetch_array($resultat);  

if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
   $nb_affichage_par_page = 10; 

$sql = "SELECT * FROM $tbl_client_anom  where statut='Traité' ORDER BY idanomalie DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
 
// on ex?cute la requ?te  ASC
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

    function Nom_prenom_client($LE_idclient, $tbl_contact,$linki){
	$sqld7 = "SELECT * FROM  $tbl_contact where id='$LE_idclient'";
	$resultatd7 = mysqli_query($linki,$sqld7); 
	$nqtd7 = mysqli_fetch_assoc($resultatd7);
	if((!isset($nqtd7['nomprenom'])|| empty($nqtd7['nomprenom']))) { $qt7=''; return $qt7;}
	else {$qt7=$nqtd7['nomprenom']; return $qt7;}
	}	
	
?>
</span></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="104"  bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N&deg; demande</strong></font></td>
    <td width="88"  bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Date</strong></font></td>
    <td width="206" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="3">Nom et prénom - ID client</font></strong></td>
    <td width="237" bgcolor="#3071AA"><strong><font color="#FFFFFF">Probleme à resoudre  </font></strong></td>
      <td width="120" bgcolor="#3071AA"><strong><font color="#FFFFFF">Service  </font></strong></td>
    <td width="120" bgcolor="#3071AA"><strong><font color="#FFFFFF">Statut</font></strong></td>
    <td width="93" bgcolor="#3071AA"><strong><font color="#FFFFFF">Suivi</font></strong></td>
    <td width="204" bgcolor="#3071AA">&nbsp;</td>
  </tr>
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr bgcolor="<? gettatut($data['statut']); ?>">
    <td > <? echo $data['idanomalie']; ?></td>
    <td ><? echo $data['datetinfo']; ?></span></td>
    <td ><? $idclient=$data['idclient']; $nom_prenom=Nom_prenom_client($idclient, $tbl_contact,$linki); echo $nom_prenom;?>     - (<? echo $idclient; ?>) </td>
    <td ><? echo $data['description'];?></td>
     <td ><? echo $data['service'];?></td>
    <td ><? echo $data['niveau'];?></td>
    <td ><? echo $data['statut'];?></td>
    <td >
    
    <a href="client_anomalies_resoudre_intervension.php?id=<? echo md5(microtime()).$data['idanomalie']; ?>" class="btn btn-sm btn-success" > Les  intervensions</a>
      <div align="left"></div>
      
    </td>
  </tr>
  <?php

}

mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
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