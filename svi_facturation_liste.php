<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
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
 <p>
<?php
$sql = "SELECT count(*) FROM $tbl_fact";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_fact where st='Ti' ORDER BY idf desc LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
 <p>&nbsp;</p>
 <table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="7%" align="center">&nbsp;</td>
     <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>ID </strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF" size="3"><strong>Utilisateur </strong></font></td>
     <td width="12%" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="3"><strong>Date</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Matricule</strong></font></td>
     <td width="17%" align="center"><font color="#FFFFFF"><strong>Libelle</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Reste à payer</strong></font></td>
     <td width="10%" align="center"><strong><font color="#FFFFFF">Statut</font></strong></td>
   </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
   ?>
   <tr bgcolor="<? gettatut($data['etat']); ?>">
     <td align="center" >
     <? if (($data['etat']!="facturé")and ($data['etat']!="Annuler")){?>
     <a href="paiement_v.php?idf=<? echo md5(microtime()).$data['idf']; ?>" class="btn btn-sm btn-success">les détails</a><? } else {} ?>
     
            <? if (($data['etat']=="facturé") and ($_SESSION['u_niveau']==9)){?> <a href="sov_rectification.php?idf=<? echo md5(microtime()).$data['idf'];?>" class="btn btn-sm btn-warning" >Modification</a><? } else {} ?>
            
     </td>
     <td align="center" ><em><? echo $data['idf'];?></em></td>
     <td align="center" ><em><? echo $data['id_nom'];?></em></td>
     <td align="center" ><em><? echo $data['date'];?></em></td>
     <td align="center" ><em><? echo $data['stlib'];?></em></td>
     <td align="center"><em><? echo $data['libelle'];?></em></td>
     <td align="center"><em><? echo $data['montant'];?></em></td>
     <td align="center"><em><? echo $data['report'];?></em></td>
     <td align="center"><em><? echo $data['etat'];?></em></td>
   </tr>
   <?php

  }


mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
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