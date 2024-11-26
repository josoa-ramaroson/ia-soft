<?php
Require 'functions/session.php';
?>
<?php
require 'functions/fc-affichage.php';
require 'functions/main.php';
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
<?php
require 'configuration.php';
$sql = "SELECT count(*) FROM $tbl_activite";  
$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_activite where iden NOT IN(SELECT iden FROM $tbl_factsave where annee='$anneec') ORDER BY raisonsociale ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="11%" align="center"><font color="#FFFFFF" size="4"><strong>Client </strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF" size="4"><strong>Raison social </strong></font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="4"><strong>Ville</strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF" size="3"><strong>Quartier </strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Montant</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Impayee</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Total</strong></font></td>
     <td width="8%" align="center">&nbsp;</td>
   </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?php echo $data['nomprenom'];?></font></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?php echo $data['raisonsociale'];?></font></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?php echo $data['ville'];?></font></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?php echo $data['quartier'];?></font></td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
     <td align="center" bgcolor="#FFFFFF"><em></em></td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
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
<p>&nbsp;</p>
</body>
</html>