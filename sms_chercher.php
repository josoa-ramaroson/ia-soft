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
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<p>
  <?php
if (isset($_POST['mr1']))
{
$mr1=addslashes($_POST['mr1']);
$s=explode(" ",$mr1);

$sql = "SELECT count(*) FROM $tbl_contact where tel!=0 ";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 2; 


$sql = "SELECT * FROM $tbl_contact where  tel!=0 and "; 

foreach($s as $mot) {
        			 if (strlen($mot)>0)

	$sql.="nomprenom like '%".$mot."%' OR tel like '%".$mot."%' OR adresse like '%".$mot."%' OR ville like '%".$mot."%' OR quartier like '%".$mot."%' OR id  like '%".$mot."%' OR Police  like '%".$mot."%' OR "; 
					
					}
//$sql.=" 0 ORDER BY raisonsociale ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  

$sql.=" 0 ORDER BY nomprenom ASC ";  

$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</p>
 <H1>ENVOI DES SMS</H1> 
<table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="13%" align="center"><font color="#FFFFFF" size="3"><strong>ID_client</strong></font></td>
     <td width="25%" align="center"><font color="#FFFFFF" size="3"><strong>Nom du client</strong></font></td>
     <td width="13%" align="center" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="3">GSM</font></strong></td>
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
     <td align="center" ><div align="left"><em><? echo $id;?></em></div></td>
     <td align="center" ><div align="left"><em><? echo $nomprenom;?></em></div></td>
     <td align="center" ><div align="left"><em> <? $GSM=str_replace(' ', '', ($tel)); echo  $GSM;?></em></div></td>
     <td align="center" ><div align="left"><em><? echo $ville;?></em></div></td>
     <td align="center" ><div align="left"><em><? echo $quartier;?></em></div></td>
     <td align="center" >    
     
    
     <a href="sms_envoi_affichage_text.php?id=<? echo md5(microtime()).$data['id']; ?>&id_nom=<? echo $id_nom;?>&GSM=<? echo $GSM;?>&<? echo md5(microtime()).$data['id'];?>"
     
     onclick="return !window.open(this.href, 'pop',  'width=600,height=370,left=120,top=120');"
     
     
     
      <? $n=$data['statut']; 
	  if ($n==1) $codecouleur='btn btn-sm btn-default';
	  if ($n==2) $codecouleur='btn btn-sm btn-warning'; 
	  if ($n==3) $codecouleur='btn btn-sm btn-info';
	  if ($n==4) $codecouleur='btn btn-sm btn-success';
	  if ($n==5) $codecouleur='btn btn-sm btn-success';
	  if ($n==6) $codecouleur='btn btn-sm btn-success';
	  if ($n==7) $codecouleur='btn btn-sm btn-danger';
	  ?>
        
     class="<? echo $codecouleur; ?>"  target=_blank  >Envoi SMS</a>
     
     
     
     
     
     
     
     </td>
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