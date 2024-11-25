<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
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
<table width="98%" border="0">
  <tr>
    <td width="32%"><form name="form1" method="post" action="re_chercherid.php">
      <label for="mr2"></label>
      <input name="mr2" type="text" id="mr2" size="30">
      <input type="submit" name="Cherchez " id="Cherchez " value="Chercher ID">
    </form></td>
    <td width="0%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="37%"><form name="form1" method="post" action="re_chercher.php">
      <label for="mr1"></label>
      <input name="mr1" type="text" id="mr1" size="30">
      <input type="submit" name="Cherchez " id="Cherchez " value="Chercher">
    </form></td>
  </tr>
</table>
<p>
  <?php
$sql = "SELECT count(*) FROM $tbl_contact where statut='6'";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_contact where statut='6' ORDER BY nomprenom ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="8%" align="center"><font color="#FFFFFF" size="4"><strong>ID </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF" size="3"><strong> Police</strong></font></td>
     <td width="25%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Tel</strong> </font></td>
     <td width="21%" align="center"><font color="#FFFFFF"><strong>Ville</strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Quartier</strong></font></td>
     <td width="8%" align="center">&nbsp;</td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><a href="re_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-default" ><? echo $data['id'];?></a></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['Police'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['nomprenom'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['tel'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['ville'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['quartier'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><a href="re_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-success" >Aperçu</a></td>
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