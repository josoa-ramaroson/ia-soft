<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>

<html>
<head>
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
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
//Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
 <? //require 'rapport_lien.php'; ?>
<p><font size="2"><font size="2"><font size="2">
  <?php
 
  $date=substr($_REQUEST["dated"],32);
  
// Connect to server and select databse.
mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");
  
$sql = "SELECT count(*) FROM $tv_paiement where date='$date' GROUP BY refcommune ";  

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
   $nb_affichage_par_page = 200; 
   

$sql = "SELECT SUM(paiement) AS Paie, id_nom , refcommune,  date FROM $tv_paiement where date='$date' GROUP BY refcommune  LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC

// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 

?>
  </font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
  

    
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
    <tr bgcolor="#0000FF"> 
      <td width="217" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Par date</strong></font></td>
      <td width="322" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>SECTEUR</strong></font></td>
      <td width="379" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Les recouvrements par secteur sans GAZ</strong></font></td>
      <td width="217" align="center" bgcolor="#3071AA">&nbsp;</td>
    </tr>
    <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="#FFFFFF">
      <td align="center"><? echo $data['date'];?></td>
      <td> <?  $RefCommune=$data['refcommune']; 
	  
$sql3 = "SELECT * FROM commune where ref_com=$RefCommune";
$result3 = mysql_query($sql3);
while ($row3 = mysql_fetch_assoc($result3)) {
echo $secteur=$row3['commune'];
} 	 ?>
      </td>
      <td align="center"><? $P=strrev(chunk_split(strrev($data['Paie']),3," "));   echo $P;?></td>
      <td align="center">&nbsp;</td>
    </tr>
    <?php

}

mysql_free_result ($req); 
   //echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  


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
