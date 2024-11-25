<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
if(($_SESSION['u_niveau'] != 7)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

</head>
<?
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p><font size="2"><font size="2"><font size="2">
  <?php
  
$sql = "SELECT count(*) FROM $tbl_utilisateur";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
 
$nb_total = mysql_fetch_array($resultat);  
 // on teste si ce nombre de vaut pas 0  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
        // premi?re ligne on affiche les titres pr?nom et surnom dans 2 colonnes
  
    
   
// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas d?j? ?t? d?clar?e, et dans ce cas, on l'initialise ? 0  
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
	// 6 maroufchangement 1 par 5
   $nb_affichage_par_page = 150; 
   
 
$sql = "SELECT * FROM $tbl_utilisateur  where session='1' ORDER BY u_nom ASC LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td><table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#0000FF">
        <td width="153" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Lieu de travail</font></td>
        <td width="213" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Nom et Prenom </font></td>
        <td width="148" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Telephone</font></td>
        <td width="143" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Niveau </font></td>
        <td width="143" align="center" bgcolor="#3071AA">&nbsp;</td>
        </tr>
      <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
      <tr bgcolor=<?php gettatut2($data['u_niveau']); ?>>
        <td align="center" ><? echo $data['agence'];?></td>
        <td width="213"   ><em><? echo $data['u_nom'].' '.$data['u_prenom'];?></em></td>
        <td width="148"   ><em><? echo $data['mobile'];?></em></td>
        <td width="143"   ><em>
          <? require 'fonction_niveau_affichage.php'; ?>
        </em></td>
        <td width="143"   >&nbsp;</td>
        </tr>
      <?php

}

mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat); 



				 function gettatut2($statut){
				 $statut_couleur=md5($statut);	
				 $traitement_couleur='#'.strtolower(substr($statut_couleur,0,6));
				 $couleur=$traitement_couleur;
				 echo "$couleur";
				 }
				  
mysql_close ();  
?>
    </table>      <div align="center"></div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
  </tr>
  <tr> 
    <td height="21"> 
      <?php
include_once('pied.php');
?>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
