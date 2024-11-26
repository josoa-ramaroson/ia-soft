<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
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

 <a href="co_affichage_user_repartion_resultat.php" class="btn btn-xs btn-success"> Résultats des répartions >>> </a>
 
<p>
  <?php
  
require 'co_affichage_variable_repartion.php';



$sql = "SELECT count(*) FROM $tbl_contact  where RefLocalite='$RefLocalite' and RefQuartier='$RefQuartier' and  statut='6'";  
$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 100; 
$sql = "SELECT * FROM $tbl_contact  where  RefLocalite='$RefLocalite' and RefQuartier='$RefQuartier'  and statut='6' ORDER BY id ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  


	$sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysqli_query($linki,$sqldate);
	$datecaisse=mysqli_fetch_array($resultldate);
	
?>
 </p>
     
<table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="6%" align="center"><font color="#FFFFFF" size="4"><strong>ID </strong></font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF"><strong>Ville</strong></font></td>
     <td width="16%" align="center"><font color="#FFFFFF"><strong>Quartier SOURCE </strong></font></td>
     <td width="16%" align="center"><font color="#FFFFFF"><strong> SOURCE </strong></font></td>
     <td width="18%" align="center"><font color="#FFFFFF"><strong> REPARTITION 1</strong></font></td>
     <td width="18%" align="center"><font color="#FFFFFF"><strong>REPARTITION 2</strong></font></td>
   </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center"><div align="left"><em><?php echo $data['id'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $data['nomprenom'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php  $ville=$data['ville']; echo $data['ville'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $data['quartier'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div>
     
 <a href="co_affichage_user_repartion_save.php?quartier=<?php echo $RefQuartier;?>&refville=<?php echo $RefLocalite;?>&id=<?php echo $data['id'];?>&id_nom=<?php echo $id_nom; ?>&nomprenom=<?php echo $data['nomprenom'];?>&date=<?php echo $datecaisse['datecaisse'];?>"
 
 
 
  class="btn btn-sm btn-warning"> <?php echo $quartier;?> </a>
  
     </div></td>
    
     <td align="center" bgcolor="#FFFFFF">
     
     <div>
       
        <?php    
     	if(!isset($RefQuartier_1)|| empty($RefQuartier_1)) {
 } else {?>
 
 <a href="co_affichage_user_repartion_save.php?quartier=<?php echo $RefQuartier_1;?>&refville=<?php echo $RefLocalite_1;?>&id=<?php echo $data['id'];?>&id_nom=<?php echo $id_nom; ?>&nomprenom=<?php echo $data['nomprenom'];?>&date=<?php echo $datecaisse['datecaisse'];?>"
       
       
       
       
       class="btn btn-sm btn-info"> <?php echo $quartier_1;?> </a>   
       
    <?php }?>   
       
       
       
     </div>
     
     
     </td>
     <td align="center" bgcolor="#FFFFFF">
     
     <div>
     
      <?php    
     	if(!isset($RefQuartier_2)|| empty($RefQuartier_2)) {
 } else {?>
     
 <a href="co_affichage_user_repartion_save.php?quartier=<?php echo $RefQuartier_2;?>&refville=<?php echo $RefLocalite_2;?>&id=<?php echo $data['id'];?>&id_nom=<?php echo $id_nom; ?>&nomprenom=<?php echo $data['nomprenom'];?>&date=<?php echo $datecaisse['datecaisse'];?>"
       
       
       
       
       class="btn btn-sm btn-primary"> <?php echo $quartier_2;?> </a>   
       <?php }?>   
       
     
      </div>
     
     
     
     </td>
     <?php
}
mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  

 mysqli_close($linki);;  
?>
</table>
<p>&nbsp;</p>
</body>
</html>