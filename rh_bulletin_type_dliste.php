<?php
Require 'session.php';
require 'fonction.php';

function barre_navigation ($nb_total,$nb_affichage_par_page,$debut, $iddirection,  $nb_liens_dans_la_barre) { 
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
            $barre .= "&direction=$iddirection'>".$cpt."</A>"; 
         } 
         else { 
            
            $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
            $barre .= "&direction=$iddirection'>".$cpt."</A>&nbsp;-&nbsp;"; 
		
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
<title>Document sans titre</title>
</head>
<?
//Require 'bienvenue.php';    // on appelle la page contenant la fonction
require 'rh_configuration_fonction.php';

$iddirection=addslashes($_REQUEST['direction']);

$sql2 = "SELECT * FROM $tb_rhdirection where idrh=$iddirection";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$direction=$row2['direction'];
} 
    $m1d=$direction;
?>
<body>
<p align="center"><em>RECAPITULATIF POUR </em> - <em><?php echo  $m1d ;?></em> - <span class="panel-title"><?php echo $affichemois.' '.$anneepaie ; ?></span></p>
<p>
  <?php
$sql2="SELECT SUM(sbase) AS sbase , SUM(SS) AS SS , SUM(SI) AS SI, SUM(SD) AS SD, SUM(SR) AS SR, SUM(SNET) AS SNET, moispaie ,anneepaie , direction, service,  SUM(igr) AS igr ,  SUM(retraite) AS retraite   FROM $tb_rhpaie   where anneepaie='$anneepaie' and moispaie='$moispaie' and direction='$m1d'"; 

$resultat2 = mysqli_query($linki,$sql2);	
$data2=mysqli_fetch_array($resultat2)
?>
  <?php
$sql = "SELECT * FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie' and direction='$m1d' ORDER BY matricule ASC  ";  //DESC
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
  </p>
</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="6%" align="center">&nbsp;</td>
    <td width="16%" align="center">&nbsp;</td>
    <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>Direction </strong></font></td>
    <td width="9%" align="center">&nbsp;</td>
    <td width="10%" align="center"><strong><font color="#FFFFFF" size="3">Total brut</font></strong></td>
    <td width="12%" align="center"><font color="#FFFFFF"><strong>T Indemnites</strong></font></td>
    <td width="13%" align="center"><font color="#FFFFFF"><strong>T Reductions</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>T. Retenues</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>NET A PAYER </strong></font></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">TOTAL </td>
    <td align="center">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?php echo $data2['direction'];?></font></td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data2['SS']),3," ")); ?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data2['SI']),3," "));?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data2['SD']),3," "));?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data2['SR']),3," "));?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data2['SNET']),3," "));?><em></td>
  </tr>
</table>
<p>&nbsp; </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="6%" align="center"><font color="#FFFFFF">Matricule</font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="4"><strong>Nom de l'employé</strong></font></td>
     <td width="13%" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Direction </strong></font></td>
     <td width="8%" align="center"><font color="#FFFFFF" size="3"><strong>Service </strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>T SBASE  </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>TINDEMNITES </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>T DEDUCTIONS</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>T RETENUES</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>SALAIRE NET</strong></font></td>
   </tr>
   <?php
while($datafact=mysqli_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="#FFFFFF">
     <td align="center"><font color="#000000"> <?php echo $datafact['matricule'];?></td>
     <td ><font color="#000000"><?php echo $datafact['nomprenom'];?></font></td>
     <td align="center" ><font color="#000000"><?php echo $datafact['direction'];?></font></td>
     <td align="center" ><font color="#000000"><?php echo $datafact['service'];?></font></td>
     <td align="center" ><em><font color="#000000"><?php echo $datafact['SS'];?></font></em></td>
     <td align="center" ><font color="#000000"><?php echo $datafact['SI'];?></font></td>
     <td align="center" ><font color="#000000"><?php echo $datafact['SD'];?></font></td>
     <td align="center" ><font color="#000000"><?php echo $datafact['SR'];?></font></td>
     <td align="center" ><?php echo $datafact['SNET'];?></td>
   </tr>
   <?php
}

				  function gettatut($fetat){
				  if ($fetat<=1000000 && $fetat>=500000)         { echo $couleur="#ffc88d";}//orange 
				  if ($fetat>=1000000)                          { echo $couleur="#ec9b9b";}//rouge -Declined
				  }
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>