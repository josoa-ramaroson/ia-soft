<?php
Require 'session.php';
require 'fonction.php';
function barre_navigation ($nb_total,$nb_affichage_par_page,$debut, $refville , $RefQuartier, $nb_liens_dans_la_barre) { 
    $barre = ''; 
   if ($_SERVER['QUERY_STRING'] == "") { 
      $query = $_SERVER['PHP_SELF'].'?debut='; 
   } 
   else { 
      $tableau = explode ("debut=", $_SERVER['QUERY_STRING']); 
      $nb_element = count ($tableau); 
      if ($nb_element == 1) { 
         $query = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&debut='; 
      } 
      else { 
         if ($tableau[0] == "") { 
            $query = $_SERVER['PHP_SELF'].'?debut='; 
         } 
         else { 
            $query = $_SERVER['PHP_SELF'].'?'.$tableau[0].'debut='; 
         } 
      } 
   } 
   
   $page_active = floor(($debut/$nb_affichage_par_page)+1); 
   $nb_pages_total = ceil($nb_total/$nb_affichage_par_page); 
   if ($nb_liens_dans_la_barre%2==0) { 
      $cpt_deb1 = $page_active - ($nb_liens_dans_la_barre/2)+1; 
      $cpt_fin1 = $page_active + ($nb_liens_dans_la_barre/2); 
   } 
   else { 
      $cpt_deb1 = $page_active - floor(($nb_liens_dans_la_barre/2)); 
      $cpt_fin1 = $page_active + floor(($nb_liens_dans_la_barre/2)); 
   } 
   if ($cpt_deb1 <= 1) { 
      $cpt_deb = 1; 
      $cpt_fin = $nb_liens_dans_la_barre; 
   } 
   elseif ($cpt_deb1>1 && $cpt_fin1<$nb_pages_total) { 
      $cpt_deb = $cpt_deb1; 
      $cpt_fin = $cpt_fin1; 
   } 
   else { 
       $cpt_deb = ($nb_pages_total-$nb_liens_dans_la_barre)+1; 
      $cpt_fin = $nb_pages_total; 
   } 
 
  if ($nb_pages_total <= $nb_liens_dans_la_barre) { 

      $cpt_deb=1; 
      $cpt_fin=$nb_pages_total; 
   } 
   if ($cpt_deb != 1) { 
      $cible = $query.(0); 
      $lien = '<A HREF="'.$cible.'">&lt;&lt;</A>&nbsp;&nbsp;'; 
   } 
   else { 
      $lien=''; 
   } 
   $barre .= $lien; 
   for ($cpt = $cpt_deb; $cpt <= $cpt_fin; $cpt++) { 
      if ($cpt == $page_active) { 
         if ($cpt == $nb_pages_total) { 
            $barre .= $cpt; 
         } 
         else { 
            $barre .= $cpt.'&nbsp;-&nbsp;'; 
         } 
      } 
      else { 

         if ($cpt == $cpt_fin) { 
            $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
            $barre .= "&refville=$refville&quartier=$RefQuartier'>".$cpt."</A>"; 
         } 
         else { 
            
            $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
            $barre .= "&refville=$refville&quartier=$RefQuartier'>".$cpt."</A>&nbsp;-&nbsp;"; 
         } 
      } 
   } 
   

   $fin = ($nb_total - ($nb_total % $nb_affichage_par_page)); 
   if (($nb_total % $nb_affichage_par_page) == 0) { 
      $fin = $fin - $nb_affichage_par_page; 
   } 
 
   if ($cpt_fin != $nb_pages_total) { 
      $cible = $query.$fin; 
      $lien = '&nbsp;&nbsp;<A HREF="'.$cible.'">&gt;&gt;</A>'; 
   } 
   else { 
      $lien=''; 
   } 
   $barre .= $lien; 
 
   return $barre;   
}  
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EDA</title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction


$RefQuartier=addslashes($_REQUEST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_REQUEST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysqli_query($linki,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 
    $m1v=$ville;
	$m2q=$quartier;

    //$m1v=addslashes($_REQUEST['m1v']);
	//$m2q=addslashes($_REQUEST['m2q']);
?>
<body>
<a href="coupure_listeimp.php?m1v=<?php echo md5(microtime()).$m1v;?>&m2q=<?php echo md5(microtime()).$m2q;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a> Coupure des impayees 

<a href="coupure_qrcode.php?m1v=<?php echo md5(microtime()).$m1v;?>&m2q=<?php echo md5(microtime()).$m2q;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a> Liste en  QRCODE

 <p><?php
require 'configuration.php';
//$st=$_REQUEST["st"];
$anneec=$annee_recouvrement;


$sql = "SELECT count(*) FROM $tbl_fact f, $tbl_contact c  where f.fannee='$anneec' and f.st='E' and nserie='$cserie' and c.id=f.id and c.ville='$m1v' and  c.quartier='$m2q' and  f.totalnet > 1000  and idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$anneec')";  
$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) 
$_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_fact f, $tbl_contact c  where f.fannee='$anneec' and f.st='E' and nserie='$cserie' and c.id=f.id and c.ville='$m1v' and  c.quartier='$m2q' and  f.totalnet > 1000  and idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$anneec') ORDER BY f.id ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req=mysqli_query($linki,$sql);



$sqFP="SELECT  COUNT(*) AS nbres, SUM(f.totalnet) AS totalnet , SUM(f.totalttc) AS totalttc, SUM(f.impayee) AS impayee, SUM(f.ortc) AS ortc,  f.fannee , f.st , f.nserie, c.ville, c.quartier FROM $tbl_fact f, $tbl_contact c  where f.fannee='$anneec' and f.st='E' and nserie='$cserie' and c.id=f.id and c.ville='$m1v' and  c.quartier='$m2q' and  f.totalnet > 1000 and idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$anneec')"; 
	$RFP = mysqli_query($linki,$sqFP); 
	$AFP = mysqli_fetch_assoc($RFP);
	$tFP=$AFP['totalttc'];
	$tFPt=$AFP['totalnet']; 
	$tFPn=$AFP['nbres'];
	$tFPi=$AFP['impayee'];
	$tFPo=$AFP['ortc'];

$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
    LISTE DE COUPURE
: </p>
 <table width="100%" border="0">
   <tr>
     <td width="12%">VILLE</td>
     <td width="16%">Quartier</td>
     <td width="17%">Nombre des clients</td>
     <td width="12%">Somme TTC</td>
     <td width="13%">ORTC</td>
     <td width="12%">Somme Impayée</td>
     <td width="18%">Somme Total Net</td>
   </tr>
   <tr>
     <td><em><?php echo  $m1v;?></em></td>
     <td><em><?php echo $m2q;?></em></td>
     <td><em><?php echo strrev(chunk_split(strrev($tFPn),3," "));?></em></td>
     <td><em><?php echo strrev(chunk_split(strrev($tFP),3," "));?></em></td>
     <td><em><?php echo strrev(chunk_split(strrev($tFPo),3," "));?></em></td>
     <td><em><?php echo strrev(chunk_split(strrev($tFPi),3," "));?></em></td>
     <td><em><?php echo strrev(chunk_split(strrev($tFPt),3," "));?></em></td>
   </tr>
 </table>
 <p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="10%" align="center"><strong><font color="#FFFFFF" size="4">ID Client</font></strong></td>
     <td width="21%" align="center"><font color="#FFFFFF" size="3"><strong>Nom du client</strong></font></td>
     <td width="14%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>ORTC</strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Impayee</strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>D remise</strong></font></td>
     <td width="17%" align="center"><font color="#FFFFFF"><strong>Total net</strong></font></td>
  </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>

   <tr bgcolor="<?php gettatut($data['bstatut']); ?>">
     <td align="center" ><em><?php echo $data['id'];?></em></td>
     <td ><em><?php echo $data['nomprenom'];?></em></td>
     <td align="center" ><em><?php echo $data['totalttc'];?></em></td>
     <td align="center" ><em><?php echo $data['ortc'];?></em></td>
     <td align="center" ><em><?php echo $data['impayee'];?></em></td>
     <td align="center" ><em><?php echo $data['Pre'];?></em></td>
     <td align="center" ><em><?php echo $data['totalnet'];?></em></td>
   </tr>
   <?php
}
mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], $refville , $RefQuartier,  10).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ($linki);  
				  function gettatut($fetat){
				  if ($fetat=='remise')         { echo $couleur="#fdff00";}//jaune	
				  if ($fetat=='couper')         { echo $couleur="#ec9b9b";}//rouge -Declined
				  if ($fetat=='retard')         { echo $couleur="#ffc88d";}//orange 			 
				 //if ($fetat=='enregistre')    { echo $couleur="#87e385";}//jaune	
				 //if ($fetat=='confirme')      { echo $couleur="#87e385";}//vert fonce
				 //if ($fetat=='transfert')     { echo $couleur="#fdff00";}//jaune
				// if ($fetat=='réservation')   { echo $couleur="#ffc88d";}//orange 
				// if ($fetat=='Annuler')       { echo $couleur="#ec9b9b";}//orange
				  }
				 
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>