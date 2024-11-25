<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fonction.php';
?>
<?php
require"fc-affichage.php";
?>
<html>
<head>
<title>
<? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?
require("bienvenue.php"); 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="47%" height="21">
          <?php
include_once('stk_Rapport_lien.php');
?>
    </td>
  </tr>
</table>
<p><font size="2"><font size="2"><font size="2"> 
  <?php


// on pr?pare une requ?te permettant de calculer le nombre total d'?l?ments qu'il faudra afficher sur nos diff?rentes pages  
//$sql = 'SELECT count(*) FROM ginv_enreg GROUP BY titre'; 
$sql = "SELECT COUNT(*) as nbredeligne FROM (
SELECT e.titre , SUM(e.Quantite) AS qtenreg FROM $tbl_enreg e GROUP BY e.titre
) derive WHERE 1" ; 



// on ex?cute cette requ?te  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
// on r?cup?re le nombre d'?l?ments ? afficher  
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
   $nb_affichage_par_page = 10; 
   
// Pr?paration de la requ?te avec le LIMIT  
//$sql = 'SELECT * FROM ginv_enreg  ORDER BY idenreg  DESC LIMIT '.$_GET['debut'].','.$nb_affichage_par_page;  //ASC

$sql = "SELECT e.titre as thetitre, SUM(e.qtenreg) AS qte , SUM(v.qtvendu) AS qtv , SUM(e.qtenreg)-SUM(v.qtvendu) as reste
FROM $tv_enreg e LEFT JOIN $tv_vente v ON e.titre=v.titre GROUP BY  e.titre ORDER BY e.titre  DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;

// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
  <strong> <a href="pdf.php">SUIVI DE STOCK</a></strong></font><a href="pdf.php"></strong></a></font></font><a href="pdf.php"><strong></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></a> </strong> 
</p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#993300"> 
    <td width="35%" align="center" bgcolor="#006ABE"><font color="#CCCCCC" size="3"><strong>Produit 
      </strong></font><font color="#CCCCCC" size="4">&nbsp;</font></td>
    <td width="19%" align="center" bgcolor="#006ABE"><font color="#CCCCCC" size="3"><strong>Quantite 
      Enregistre </strong></font></td>
    <td width="18%" align="center" bgcolor="#006ABE"><font color="#CCCCCC" size="3"><strong>Quantite 
      Vendu </strong></font></td>
    <td width="16%" align="center" bgcolor="#006ABE"><font color="#CCCCCC" size="3"><strong>Quantite 
      Restant</strong></font></td>
    <td width="12%" align="center" bgcolor="#006ABE"><font color="#CCCCCC" size="3">&nbsp;</font></td>
  </tr>
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr> 
    <td align="center" bgcolor="#FFFFFF"> <div align="left"></div>
      <div align="left"><em><? echo $data['thetitre'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="center"><em><? echo $data['qte'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="center"><em><? echo $data['qtv'];?></em></div></td>
  <td align="center" bgcolor="#FFFFFF"> <div align="center"><em><? echo $data['reste'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="center"><em> </em></div></td>
	
  </tr>
  <?php
// Exit looping and close connection 
}
// on lib?re l'espace m?moire allou? pour cette requ?te  
mysql_free_result ($req); 
 
   // on affiche enfin notre barre 20 avant de passer a l autre page
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
// on lib?re l'espace m?moire allou? pour cette requ?te  
mysql_free_result ($resultat);  
// on ferme la connexion ? la base de donn?es.  
mysql_close ();  
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
