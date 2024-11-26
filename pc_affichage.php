<?php
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
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<p><font size="2"><font size="2"></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font><font size="2"><font size="2"><span style="margin-left: 30">
  <?php
require 'fonction.php';
$sql = "SELECT count(*) FROM $tbl_pc where id_u='$id_user'";  

$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
 
$nb_total = mysqli_fetch_array($resultat);  

if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
   $nb_affichage_par_page = 10; 

$sql = "SELECT * FROM $tbl_pc  where id_u='$id_user' ORDER BY id ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
 
// on ex?cute la requ?te  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
</span></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="74"  bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
    <td width="201" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="3">Ile</font></strong></td>
    <td width="201" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="3">Agence/service</font></strong></td>
    <td width="176" bgcolor="#3071AA"><strong><font color="#FFFFFF">Nom du Pc </font></strong></td>
    <td width="157" bgcolor="#3071AA"><strong><font color="#FFFFFF">Utilisation </font></strong></td>
    <td width="124" bgcolor="#3071AA"><strong><font color="#FFFFFF">Utilisateur</font></strong></td>
    <td width="166" bgcolor="#3071AA">&nbsp;</td>
  </tr>
  <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><?php echo $data['id']; ?>
      <div align="left"></div></td>
    <td  bgcolor="#FFFFFF"><span style="background-color:#FFF;"><?php echo $data['ile'].'-'.$data['ville']; ?></span></td>
    <td  bgcolor="#FFFFFF"><span style="background-color:#FFF;"><?php echo $data['agence']; ?></span></td>
    <td width="176"   style="background-color:#FFF;"><?php echo $data['nom'];?></td>
    <td width="157"   style="background-color:#FFF;"><?php echo $data['utilisation'];?></td>
    <td width="124"   style="background-color:#FFF;"><?php echo $data['utilisateur'];?></td>
    <td width="166"   style="background-color:#FFF;"><a href="pc_affichage_user.php?id=<?php echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-success" >Apperçu</a></td>
  </tr>
  <?php

}

mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  

 mysqli_close($linki);;  
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