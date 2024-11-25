<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>

<?
require 'session_niveau_trasfertmagasin.php';    // on appelle la page contenant la fonction
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>

<? require 'app_transfert_menu.php';?>

  <?php
require 'fonction.php';
$sql = "SELECT count(*) FROM $tbl_apptransfert where statut='1'";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
$nb_total = mysql_fetch_array($resultat);  

if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
   $nb_affichage_par_page = 50; 

$sql = "SELECT * FROM $tbl_apptransfert  where statut='1' ORDER BY idtansft DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
 
// on ex?cute la requ?te  ASC
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

	$sqldate="SELECT * FROM $tbl_caisse"; //DESC  ASC
	$resultldate=mysqli_query($linki,$sqldate);
	$datecaisse=mysqli_fetch_array($resultldate);

?>
</span></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="84"  bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N&deg;Envoi</strong></font></td>
    <td width="77"  bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Date (S)</strong></font></td>
    <td width="110" bgcolor="#3071AA"><strong><font color="#FFFFFF">Produit (S)</font></strong></td>
    <td width="70" bgcolor="#3071AA"><strong><font color="#FFFFFF">Quantite  </font></strong></td>
     <td width="67" bgcolor="#3071AA"><strong><font color="#FFFFFF">N (S)  </font></strong></td>
    <td width="89" bgcolor="#3071AA"><strong><font color="#FFFFFF">Agent (S)</font></strong></td>
    <td width="91" bgcolor="#3071AA"><strong><font color="#FFFFFF">Date (E)</font></strong></td>
    <td width="168" bgcolor="#3071AA"><strong><font color="#FFFFFF">Produit (E)</font></strong></td>
    <td width="132" bgcolor="#3071AA"><strong><font color="#FFFFFF">Agent(E)</font></strong></td>
    <td width="150" bgcolor="#3071AA"><strong><font color="#FFFFFF">Agent(C)</font></strong></td>
  </tr>
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr bgcolor="<? gettatut($data['statut']); ?>">
    <td ><? echo $data['idtansft']; ?>
      <div align="left"></div></td>
    <td ><? echo $data['Sdate']; ?></span></td>
    <td ><? echo $data['Stitre'];?></td>
    <td ><? echo $data['Qvente'];?></td>
    <td ><? echo $data['Snumero'];?></td>
    <td ><? echo $data['Sid_nom'];?></td>
    <td ><? echo $data['Edate']; ?></span></td>
    <td ><? echo $data['Etitre'];?></td>
    <td >  
 <? if ((($_SESSION['u_niveau']==40)||($_SESSION['u_niveau']==40)) and ($data['statut']==1)) {?>
      
 <a href="app_transfert_etape_confstatut.php?id=<? echo md5(microtime()).$data['idtansft']; ?>&satut=<? $a='2';echo md5(microtime()).$a;?>&d=<? echo  md5(microtime()).$datecaisse['datecaisse'];?>&ti=<? echo  md5(microtime()).$data['Etitre'];?>&q=<? echo  $data['Qvente'];?>&id_nom=<? echo  $id_nom;?>&agence=<? echo  md5(microtime()).$data['agence'];?>" onClick="return confirm('Etes-vous sûr d'avoir receptioner cette quantité de stock )" ; style="margin:5px"   class="btn btn-sm btn-danger" >Confirmation</a><? } else { } ?>
 </td>
    <td >&nbsp;</td>
    <td width="50" ><? if (($data['Sid_nom']==$id_nom) and ($data['statut']==1)) {?>
      
 <a href="app_produit_sortie_cancel.php?ID=<? echo md5(microtime()).$data['idcsortie']; ?>&d=<? echo  md5(microtime());?>" 
 onClick="return confirm('Etes-vous sûr d'avoir RETOURNER cette quantité de stock )" ; style="margin:5px"   class="btn btn-sm btn-danger">Retour</a><? } else { } ?>
    </td>
  </tr>
  <?php

}

mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
	                 function gettatut($fetat){
				 if ($fetat=='1') { echo $couleur="#fdff00";}//jaune	
				 if ($fetat=='2') { echo $couleur="#87e385";}//vert fonce
				 if ($fetat=='3') { echo $couleur="#ffffff";}//finaliser blanc				 
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