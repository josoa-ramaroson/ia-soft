<?
require 'session.php';
require 'fonction.php';
function barre_navigation ($nb_total,$nb_affichage_par_page,$debut, $ARCH , $nb_liens_dans_la_barre) { 
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
            $barre .= "&annee=$ARCH'>".$cpt."</A>"; 
         } 
         else { 
            
            $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
            $barre .= "&annee=$ARCH'>".$cpt."</A>&nbsp;-&nbsp;"; 
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
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
 <p>&nbsp;</p>
 <table width="99%" border="0">
   <tr>
     <td width="2%">&nbsp;</td>
     <td width="44%"><div class="panel panel-warning">
       <div class="panel-heading">
         <h3 class="panel-title">Historique des paiement des Gaz</h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="52%"><form action="z_re_edit_modif_liste_gaz.php" method="post" name="form1" id="form1">
                   <label for="mr2"></label>
                   <font color="#000000">
                     <select name="annee" size="1" id="annee">
                       <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                     </select>
                     </font>
                   <input type="submit" name="Cher" id="Cher" class="btn btn-sm btn-warning"value="Afficher" />
                 </form></td>
               </tr>
             </table></td>
           </tr>
         </table>
       </div>
     </div></td>
     <td width="5%">&nbsp;</td>
     <td width="49%"><div class="panel panel-warning">
       <div class="panel-heading">
         <h3 class="panel-title">Trie par Statut et année ( GAZ)</h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="52%"><form action="z_re_edit_modif_liste_gaz_trie.php" method="post" name="form1" id="form1">
                   <label for="mr2"></label>
                   <font color="#000000">
                     <select name="etat" size="1" id="etat">
                       <option value="accompte">accompte</option>
                       <option value="facture">facture</option>
</select>
                     <select name="annee" size="1" id="annee">
                       <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                     </select>
                     </font>
                   <input type="submit" name="Cher" id="Cher" class="btn btn-sm btn-warning"value="Afficher" />
                 </form></td>
               </tr>
             </table></td>
           </tr>
         </table>
       </div>
     </div></td>
   </tr>
 </table>
 <p>
   <?php

$ARCH=$_REQUEST['annee'];

$sql = "SELECT count(*) FROM $dbbk.z_"."$ARCH"."_$tbl_fact where st='A' and libelle='Gaz' ";  
$resultat = mysqli_query($linkibk,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 100; 
$sql = "SELECT * FROM $dbbk.z_"."$ARCH"."_$tbl_fact where st='A' and libelle='Gaz' ORDER BY idf desc LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysqli_query($linkibk,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
?>
 </p>
 <table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="10%" align="center">&nbsp;</td>
     <td width="7%" align="center"><font color="#FFFFFF" size="4"><strong>N°Facture </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF" size="3"><strong>Vendeur</strong></font></td>
     <td width="12%" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="3"><strong>Date</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Nom</strong></font></td>
     <td width="17%" align="center"><font color="#FFFFFF"><strong>Libelle</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Reste à payer</strong></font></td>
     <td width="9%" align="center"><strong><font color="#FFFFFF">Statut</font></strong></td>
   </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
   ?>
   <tr bgcolor="<? gettatut($data['etat']); ?>">
     <td align="center" ><? if (($data['etat']!="facture")and ($data['etat']!="Annuler")){?>
       <a href="z_paiement_penalite.php?idf=<? echo md5(microtime()).$data['idf']; ?>&a=<? echo md5(microtime()).$ARCH;?>" class="btn btn-sm btn-success"> les détails</a>
       <? } else {} ?>
      
       </td>
     <td align="center" ><em><a href="re_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-default" ><? echo $data['idf'];?></a></em></td>
     <td align="center" ><em><? echo $data['id_nom'];?></em></td>
     <td align="center" ><em><? echo $data['date'];?></em></td>
     <td align="center" ><em><? echo $data['bnom'];?></em></td>
     <td align="center"><em><? echo $data['libelle'];?></em></td>
     <td align="center"><em><? echo $data['totalnet'];?></em></td>
     <td align="center"><em><? echo $data['report'];?></em></td>
     <td align="center"><em><? echo $data['etat'];?></em></td>
   </tr>
   <?php

  }


mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'],$ARCH, 20).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ($linkibk);  
	function gettatut($fetat){
				 if ($fetat=='enregistre')    { echo $couleur="#87e385";}//jaune	
				 if ($fetat=='paye')          { echo $couleur="#87e385";}//vert fonce
				 if ($fetat=='accompte')      { echo $couleur="#fdff00";}//jaune
				 if ($fetat=='Annuler')       { echo $couleur="#ec9b9b";}//orange
				 }   
?>
 </table>
 <p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>