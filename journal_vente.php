<?
require 'session.php';
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
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction


$RefQuartier=addslashes($_REQUEST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_REQUEST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 
    $m1v=$ville;
	$m2q=$quartier;

    //$m1v=addslashes($_REQUEST['m1v']);
	//$m2q=addslashes($_REQUEST['m2q']);
?>
<body>
<a href="journal_vente_listeimp.php?m1v=<? echo md5(microtime()).$m1v;?>&m2q=<? echo md5(microtime()).$m2q;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
<p>
<?php
require 'configuration.php';
$sql = "SELECT count(*) FROM $tbl_contact c , $tbl_fact f  where f.id=c.id  and c.ville='$m1v' and  c.quartier='$m2q'  ";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page =50; 
$sql = " SELECT * FROM $tbl_fact f , $tbl_contact c  where f.id=c.id and f.nserie=$nserie and f.fannee=$anneec 

and c.ville='$m1v' and  c.quartier='$m2q' ORDER BY f.id ASC  LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="6%" align="center"><font color="#FFFFFF">ID Client</font></td>
     <td width="17%" align="center"><font color="#FFFFFF" size="4"><strong>Nom du client </strong></font></td>
     <td width="14%" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Ville</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF" size="3"><strong>Quartier </strong></font></td>
     <td width="12%" align="center"><strong><font color="#FFFFFF">Ancien Index</font></strong></td>
     <td width="10%" align="center"><strong><font color="#FFFFFF">Nouveau Index</font></strong></td>
     <td width="10%" align="center"><strong><font color="#FFFFFF">Consommation</font></strong></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant HT</strong></font></td>
   </tr>
   <?php
while($datafact=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="<? gettatut($datafact['totalht']); ?>">
     <td align="center"><font color="#000000">
	 <a href="co_bill.php?idf=<? echo md5(microtime()).$datafact['idf'];?>" class="btn btn-sm btn-default" target="_blank" ><? echo $datafact['id'];?></a>
	 </font></td>
     <td ><font color="#000000"><? echo $datafact['nomprenom'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['ville'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['quartier'];?></font></td>
     <td align="center" ><em><font color="#000000"><? echo $datafact['n'];?></font></em></td>
     <td align="center" ><font color="#000000"><? echo $datafact['nf'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['cons'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['totalht'];?></font></td>
   </tr>
   <?php
}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], $refville , $RefQuartier,  10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
				  function gettatut($fetat){
				  if ($fetat<=100000 && $fetat>=75000)         { echo $couleur="#ffc88d";}//orange 
				  if ($fetat>=100000)                          { echo $couleur="#ec9b9b";}//rouge -Declined
				  }
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>