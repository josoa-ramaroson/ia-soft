<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.centrevaleur {
	text-align: center;
}
.centrevaleur td {
	text-align: center;
}
.taille16 {	font-size: 16px;
}
</style>
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?
Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
<?
$sql = "SELECT count(id) FROM $tbl_contact  WHERE statut='6' ";  

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
   $nb_affichage_par_page = 100; 
   
 
$sql = "SELECT c.quartier, c.ville,  COUNT(id) AS nbch  FROM  $tbl_contact c WHERE statut='6' GROUP BY  quartier  order by ville LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC
  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
?>
 
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
        <td width="295" align="center" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="4">Ville</font></strong></td>
        <td width="466" align="center" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="4">Quartier</font></strong></td>
        <td width="342" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Suivi des impressions</strong></font></td>
      </tr>
      <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
       <tr>
        <td><? echo  $data['ville']; ?></td>
        <td><? echo  $data['quartier']; ?></td>
        <td align="center"> (<? echo  $data['nbch']; ?>)</td>
      </tr>
      <?php


}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  


mysql_close ();  

	                 function gettatut($fetat){
				   if ($fetat=='imprimé')         { echo $couleur="#fdff00";}//jaune		 
				 //if ($fetat=='enregistre')    { echo $couleur="#87e385";}//jaune	
				 //if ($fetat=='confirme')      { echo $couleur="#87e385";}//vert fonce
				 //if ($fetat=='transfert')     { echo $couleur="#fdff00";}//jaune
				// if ($fetat=='réservation')   { echo $couleur="#ffc88d";}//orange
				// if ($fetat=='Rembourser')    { echo $couleur="#ec9b9b";}//rouge -Declined				 
				// if ($fetat=='Annuler')       { echo $couleur="#ec9b9b";}//orange
				 }
?>
    </table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center"></div></td>
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
