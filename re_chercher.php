<?
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
<?php
if (isset($_POST['mr1']))
{
$mr1=addslashes($_POST['mr1']);
$s=explode(" ",$mr1);

$sql = "SELECT count(*) FROM $tbl_contact";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 2; 


$sql = "SELECT * FROM $tbl_contact where "; 

foreach($s as $mot) {
        			 if (strlen($mot)>0)

	$sql.="nomprenom like '%".$mot."%' OR tel like '%".$mot."%' OR adresse like '%".$mot."%' OR ville like '%".$mot."%' OR quartier like '%".$mot."%' OR surnom  like '%".$mot."%' OR Police  like '%".$mot."%' OR id like '%".$mot."%' OR "; 
					
					}
//$sql.=" 0 ORDER BY raisonsociale ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  

$sql.=" 0 ORDER BY nomprenom ASC ";  

$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
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
while($data=mysql_fetch_array($req)){ // Start looping table row 

	$id=$data['id'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $id = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$id);
	 }
	 }
	 
$nomprenom=$data['nomprenom'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $nomprenom = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$nomprenom);
	 }
	 }
	 
	 
	$tel=$data['tel'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $tel = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$tel);
	 }
	 }
	 
	$ville=$data['ville'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $ville = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$ville);
	 }
	 }
	 
	$quartier=$data['quartier'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $quartier = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$quartier);
	 }
	 }
	 
	$Police=$data['Police'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $Police = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$Police);
	 }
	 }
	 
	$adresse=$data['adresse'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $adresse = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$adresse);
	 }
	 }


?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $id;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $nomprenom;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $Police;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $adresse;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $ville;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $quartier;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><a href="re_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" 
     
      <? $n=$data['statut']; 
	  if ($n==1) $codecouleur='btn btn-sm btn-default';
	  if ($n==2) $codecouleur='btn btn-sm btn-warning'; 
	  if ($n==3) $codecouleur='btn btn-sm btn-info';
	  if ($n==4) $codecouleur='btn btn-sm btn-success';
	  if ($n==5) $codecouleur='btn btn-sm btn-success';
	  if ($n==6) $codecouleur='btn btn-sm btn-success';
	  if ($n==7) $codecouleur='btn btn-sm btn-danger';
	  ?>
        
     class="<? echo $codecouleur; ?>" >Aperçu</a></td>
   </tr>
   <?php
}
mysql_free_result ($req); 
   //echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close (); 
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