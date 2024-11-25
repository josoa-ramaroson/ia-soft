<?php
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
span.surlign1{font-style:italic; background-color:#ffff00;}
span.surlign2{font-style:italic; background-color:#ff99FF;}
span.surlign3{font-style:italic; background-color:#ff9999;}
span.surlign4{font-style:italic; background-color:#9999FF;}
body {
	background-image: url(images/bg.jpg);
	background-color: #FFF;
}
body,td,th {
	color: #000;
}
</style>
<title><?php include 'titre.php' ?> - Résultat de recherche </title>
</head>
<?php
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
<?php
if (isset($_POST['mr2']))
{
$mr2=addslashes($_POST['mr2']);

$sql = "SELECT count(*) FROM $tbl_contact";  
$resultat = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 2; 


$sql = "SELECT * FROM $tbl_contact where id='$mr2'"; 

$sql.=" ORDER BY nomprenom ASC ";  

$req = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
<table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>ID</strong></font></td>
     <td width="23%" align="center"><font color="#FFFFFF" size="3"><strong> Nom / Raison Social</strong></font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="3"><strong>Police</strong></font></td>
     <td width="19%" align="center" bgcolor="#3071AA"><font color="#FFFFFF"><strong>Adresse</strong> </font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Ville</strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Quartier</strong></font></td>
     <td width="8%" align="center">&nbsp;</td>
   </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 

	$id=$data['id'];

	$nomprenom=$data['nomprenom'];
 
	$tel=$data['tel'];
	 
	$ville=$data['ville'];
	 
	$quartier=$data['quartier'];
 
	$Police=$data['Police'];

	$adresse=$data['adresse'];

?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $id;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $nomprenom;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $Police;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $adresse;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $ville;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $quartier;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><a href="re_affichage_user.php?id=<?php echo md5(microtime()).$data['id']; ?>" 
     
      <?php $n=$data['statut']; 
	  if ($n==1) $codecouleur='btn btn-sm btn-default';
	  if ($n==2) $codecouleur='btn btn-sm btn-warning'; 
	  if ($n==3) $codecouleur='btn btn-sm btn-info';
	  if ($n==4) $codecouleur='btn btn-sm btn-success';
	  if ($n==5) $codecouleur='btn btn-sm btn-success';
	  if ($n==6) $codecouleur='btn btn-sm btn-success';
	  if ($n==7) $codecouleur='btn btn-sm btn-danger';
	  ?>
        
     class="<?php echo $codecouleur; ?>" >Aperçu</a></td>
   </tr>
   <?php
}
mysqli_free_result ($req); 
   //echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ($linki); 
}
else {
echo " Pas de recherche <br>";
} 
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>