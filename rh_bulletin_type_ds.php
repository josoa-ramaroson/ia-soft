<?
require 'session.php';
require 'fonction.php';

function barre_navigation ($nb_total,$nb_affichage_par_page,$debut, $iddirection, $idservice, $nb_liens_dans_la_barre) { 
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
            $barre .= "&direction=$iddirection&subcat=$idservice'>".$cpt."</A>"; 
         } 
         else { 
            
            $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
            $barre .= "&direction=$iddirection&subcat=$idservice'>".$cpt."</A>&nbsp;-&nbsp;"; 
		
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
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
require 'rh_configuration_fonction.php';

$iddirection=addslashes($_REQUEST['direction']);
$idservice=addslashes($_REQUEST['subcat']);

$sql1 = "SELECT * FROM $tb_rhservice where idser=$idservice";
$result1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($result1)) {
$service=$row1['service'];
}  

$sql2 = "SELECT * FROM $tb_rhdirection where idrh=$iddirection";
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
$direction=$row2['direction'];
} 
    $m1d=$direction;
	$m2s=$service;

    //$m1v=addslashes($_REQUEST['m1v']);
	//$m2q=addslashes($_REQUEST['m2q']);
?>
<body>


<p><?php
$sql2="SELECT SUM(sbase) AS sbase , SUM(SS) AS SS , SUM(SI) AS SI, SUM(SD) AS SD, SUM(SR) AS SR, SUM(SNET) AS SNET, moispaie ,anneepaie , direction, service,  SUM(igr) AS igr ,  SUM(retraite) AS retraite   FROM $tb_rhpaie   where anneepaie='$anneepaie' and moispaie='$moispaie' and direction='$m1d' and  service='$m2s'"; 



$resultat2 = mysql_query($sql2);	
$data2=mysql_fetch_array($resultat2)
?>
  </table>
</p>
<p>&nbsp;</p>
<p>
  <?php

$sql = "SELECT count(*) FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie' and direction='$m1d' and  service='$m2s'";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page =50; 
$sql = "SELECT * FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie' and direction='$m1d' and  service='$m2s' ORDER BY matricule ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //DESC
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</p>
 <p align="center"><em>RECAPITULATIF POUR DIRECTION  </em> - <em><? echo  $m1d.' SERVICE '.$m2s ;?></em> - <span class="panel-title"><? echo $affichemois.' '.$anneepaie ; ?></span></p>
 <p align="center">&nbsp;</p>
<p>IMPRIMER LA LISTE <a href="rh_bulletin_type_dsliste.php?<? echo md5(microtime())?>&direction=<? echo $iddirection;?>&subcat=<? echo $idservice;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a> IMPRIMER LES BULLETINS<a href="rh_bulletinds.php?<? echo md5(microtime())?>&direction=<? echo $iddirection;?>&subcat=<? echo $idservice;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
   </p>
</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="6%" align="center">&nbsp;</td>
    <td width="16%" align="center">&nbsp;</td>
    <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>Direction </strong></font></td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Service </strong></font></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF" size="3">Total brut</font></strong></td>
    <td width="12%" align="center"><font color="#FFFFFF"><strong>T Indemnites</strong></font></td>
    <td width="13%" align="center"><font color="#FFFFFF"><strong>T Reductions</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>T. Retenues</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>NET A PAYER </strong></font></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">TOTAL </td>
    <td align="center">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $data2['direction'];?></font></td>
    <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $data2['service'];?></font></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data2['SS']),3," ")); ?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data2['SI']),3," "));?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data2['SD']),3," "));?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data2['SR']),3," "));?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data2['SNET']),3," "));?><em></td>
  </tr>
  <?php
mysql_close ();  
?>
</table>
<p>&nbsp; </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="6%" align="center"><font color="#FFFFFF">Matricule</font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="4"><strong>Nom de l'employé</strong></font></td>
     <td width="13%" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Direction </strong></font></td>
     <td width="8%" align="center"><font color="#FFFFFF" size="3"><strong>Service </strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>T SBASE  </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>T INDEMNITES </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>T DEDUCTIONS</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>T RETENUES</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>SALAIRE NET</strong></font></td>
  </tr>
   <?php
while($datafact=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="<? gettatut($datafact['SNET']); ?>">
     <td align="center"><font color="#000000">
     
	 <a href="rh_bulletinp.php?ipaie=<? echo md5(microtime()).$datafact['ipaie'];?>" class="btn btn-sm btn-warning" target="_blank" ><? echo $datafact['matricule'];?></a>
     
	 </font></td>
     <td ><font color="#000000"><? echo $datafact['nomprenom'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['direction'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['service'];?></font></td>
     <td align="center" ><em><font color="#000000"><? echo $datafact['SS'];?></font></em></td>
     <td align="center" ><font color="#000000"><? echo $datafact['SI'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['SD'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['SR'];?></font></td>
     <td align="center" ><? echo $datafact['SNET'];?></td>
   </tr>
   <?php
}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], $iddirection, $idservice,  10).'</span>';  
}  
mysql_free_result ($resultat);  
//mysql_close ();  
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