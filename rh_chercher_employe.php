<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
	if((($_SESSION['u_niveau'] != 50) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
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
     <td width="32%">&nbsp;</td>
     <td width="0%">&nbsp;</td>
     <td width="21%">&nbsp;</td>
     <td width="10%">&nbsp;</td>
     <td width="37%"><div class="panel panel-primary">
       <div class="panel-heading">
         <h3 class="panel-title">Nom ,Matricule, Tel , Direction, Service </h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="52%"><form name="form1" method="post" action="rh_chercher_employe.php">
                   <label for="mr1"></label>
                   <input name="mr1" type="text" id="mr1" size="30">
                   <input type="submit" name="Cherchez " id="Cherchez " class="btn btn-sm btn-default"value="Chercher un employe">
                 </form></td>
               </tr>
             </table></td>
           </tr>
         </table>
       </div>
     </div></td>
   </tr>
 </table>
<?php
if (isset($_POST['mr1']))
{
$mr1=addslashes($_POST['mr1']);
$s=explode(" ",$mr1);

$sql = "SELECT count(*) FROM $tb_rhpersonnel";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 2; 


$sql = "SELECT * FROM $tb_rhpersonnel where "; 

foreach($s as $mot) {
        			 if (strlen($mot)>0)

	$sql.="nomprenom like '%".$mot."%' OR tel like '%".$mot."%' OR matricule like '%".$mot."%' OR direction like '%".$mot."%' OR service  like '%".$mot."%' OR "; 
					
					}
//$sql.=" 0 ORDER BY raisonsociale ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  

$sql.=" 0 ORDER BY matricule ASC ";  

$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
<table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="12%" align="center">&nbsp;</td>
     <td width="29%" align="center"><font color="#FFFFFF" size="3"><strong>Nom &amp; prénom </strong></font></td>
     <td width="21%" align="center" bgcolor="#3071AA"><font color="#FFFFFF"><strong>Matricule</strong> </font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Direction</strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF"><strong>Service</strong></font></td>
     <td width="10%" align="center">&nbsp;</td>
   </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 

 
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
	 
	$matricule=$data['matricule'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $matricule = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$matricule);
	 }
	 }
	 
	$direction=$data['direction'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $direction = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$direction);
	 }
	 }
	 
	$service=$data['service'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $service = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$service);
	 }
	 }
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><div align="left">         <? $filename = 'upload/employer/'.$data['idrhp'].'.jpg'; ?>
									<div class="row">
										<? if (file_exists($filename) == true) { ?>
	<img class="pix" width="100" src="<? echo $filename; ?>" alt="<? echo $data['nomprenom']; ?>" />
										<? } else { ?>
                             <? if ($data['sex'] == 'Masculin') { $picture='homme.jpg';} else {$picture='femme.jpg';} ?>
                                    
	<img class="pix" height="100" width="100" src="upload/employer/<? echo $picture; ?>" alt="<? echo $data['nomprenom']; ?> 
	" />
										<? } ?></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $nomprenom;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $matricule;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $direction;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $service;?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><a href="rh_employer_user.php?id=<? echo md5(microtime()).$data['idrhp']; ?>" class="btn btn-sm btn-success" >Aperçu</a></td>
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