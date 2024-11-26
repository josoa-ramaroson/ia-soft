<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
if(($_SESSION['u_niveau'] != 2)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
 <p>
<a href="co_facturation_listeNoFacimp.php?id@=<?php echo md5(microtime()).$id_nom;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
<?php
$sqlu = "SELECT * FROM $tbl_saisie where blogin='$id_nom'";
$resultu = mysqli_query($linki,$sqlu);
$bville= "";
$bquartier= "";
while ($rowu = mysqli_fetch_assoc($resultu)) {
$bville=$rowu['bville'];
$bquartier=$rowu['bquartier'];
} 

require 'configuration.php';
$sql = "SELECT count(*) FROM  $tbl_contact where  ville='$bville'  and quartier='$bquartier' and statut='6'  and  (Tarif='2' or Tarif='3' or Tarif='4' or Tarif='6' or Tarif='7' or Tarif='8' or Tarif='9' or Tarif='11') and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec'  and nserie='$nserie') ";  
$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_contact where  ville='$bville'  and quartier='$bquartier' and statut='6'  and  (Tarif='2' or Tarif='3' or Tarif='4' or Tarif='6' or Tarif='7' or Tarif='8' or Tarif='9' or Tarif='11') and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec'  and nserie='$nserie') ORDER BY id  ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>Id_Client </strong></font></td>
     <td width="18%" align="center"><font color="#FFFFFF" size="4"><strong>Police</strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF" size="4"><strong>Ville</strong></font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="3"><strong>Quartier </strong></font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="4"><strong>Nom Raison social </strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF" size="4"><strong>Index</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Total</strong></font></td>
   </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><strong>
       <?php $idcl=$data['id']; echo $data['id'];?>
     </strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><?php echo $data['Police'];?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><?php echo $data['ville'];?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><?php echo $data['quartier'];?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?php echo $data['nomprenom'];?></font></td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
   </tr>
   <?php
}
mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ($linki);  
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>