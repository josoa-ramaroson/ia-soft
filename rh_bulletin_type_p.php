<?
require 'session.php';
require 'fonction.php';

function barre_navigation ($nb_total,$nb_affichage_par_page,$debut, $matricule,  $nb_liens_dans_la_barre) { 
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
            $barre .= "&matricule=$matricule'>".$cpt."</A>"; 
         } 
         else { 
            
            $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
            $barre .= "&matricule=$matricule'>".$cpt."</A>&nbsp;-&nbsp;"; 
		
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

$matricule=addslashes($_REQUEST['matricule']);
    $m1p=$matricule;
?>
<body>
<a href="rh_bulletindp.php?<? echo md5(microtime());?>&matricule=<? echo $m1p;?>&<? echo md5(microtime());?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>IMPRIMER LA TOTALITE DES BULLETIN 
<p>
<?php

$sql = "SELECT count(*) FROM $tb_rhpaie where matricule='$m1p'";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page =12; 
$sql = "SELECT * FROM $tb_rhpaie where  matricule='$m1p' ORDER BY nomprenom ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //DESC
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
  Matricule : <? echo  $m1p ?></p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="4%" align="center">&nbsp;</td>
     <td width="15%" align="center"><font color="#FFFFFF" size="4"><strong>Nom de l'employé</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF">Periode</font> </td>
     <td width="10%" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="3"><strong>Service </strong></font></td>
     <td width="7%" align="center"><font color="#FFFFFF" size="3"><strong>Indice </strong></font></td>
     <td width="8%" align="center"><font color="#FFFFFF"><strong>T SBASE  </strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>TINDEMNITES </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>T DEDUCTIONS</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>T RETENUES</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>SALAIRE NET</strong></font></td>
   </tr>
   <?php
while($datafact=mysql_fetch_array($req)){ // Start looping table row 
?>

    <tr bgcolor="<? gettatut($datafact['SNET']); ?>">
     <td align="center"><font color="#000000">
           <a href="rh_bulletinp.php?ipaie=<? echo md5(microtime()).$datafact['ipaie'];?>" class="btn btn-sm btn-warning" target="_blank" > Cliquez ici </a></font></td>
     <td align="center"><font color="#000000"><? echo $datafact['nomprenom'];?></font></td>
     <td align="center"><font color="#000000">
     
     <? $n=$datafact['moispaie']; 
	  if ($n==1) echo 'janvier';
	  if ($n==2) echo 'février'; 
	  if ($n==3) echo 'Mars';
	  if ($n==4) echo 'Avril'; 
	  if ($n==5) echo 'Mai'; 
	  if ($n==6) echo 'Juin'; 
	  if ($n==7) echo 'Juillet'; 
	  if ($n==8) echo 'Août'; 
	  if ($n==9) echo 'Septembre'; 
	  if ($n==10) echo 'Octobre';
	  if ($n==11) echo 'Novembre'; 
	  if ($n==12) echo 'Decembre';  
	   
	  ?>
      <? echo $datafact['anneepaie'] ;?>

     </font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['service'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['indice'];?></font></td>
     <td align="center" ><em><font color="#000000"><? echo $datafact['SS'];?></font></em></td>
     <td align="center" ><font color="#000000"><? echo $datafact['SI'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['SD'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['SR'];?></font></td>
     <td align="center" ><? echo $datafact['SNET'];?>
     

     
     </td>
   </tr>
   <?php
}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], $matricule,  10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
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