<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
if(($_SESSION['u_niveau'] != 30) && ($_SESSION['u_niveau'] != 7)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><? include 'titre.php'; ?></title>
<style type="text/css">
.tah10 {	font-family: Tahoma;
	font-size: 10px;
	text-decoration: none;
	color: 6A6A6A;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<BODY BGCOLOR="#ffffff" LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
<?
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
     <div class="panel panel-primary">
   <div class="panel-heading">
     <h2 class="panel-title">ACTUALITES</h2>
   </div>
 <div class="panel-body">
   <p><font size="2"><font size="2"><font size="2">
     <?php
require 'fonction.php';

// Connect to server and select databse.
mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");
  
$sql = "SELECT count(*) FROM $tbl_com ";  

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
   $nb_affichage_par_page = 10; 
   
// Pr?paration de la requ?te avec le LIMIT  
$sql = "SELECT * FROM $tbl_com  ORDER BY idcom DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
   </font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
   <form name="form2" method="post" action="produit_cancel.php">
     <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
       <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
       <tr>
         <td width="136" bgcolor="#FFFFFF"><em><? echo $data['date'];?></em></td>
         <td width="715" bgcolor="#FFFFFF"><em><? echo $data['titre'];?></em></td>
         <td width="209" bgcolor="#FFFFFF"> <p><a href="communicationdetail.php?id=<? echo  md5(microtime()).$data['idcom']; ?>" class="btn btn-xs btn-success">lire la suite &gt;&gt;</a></p>
         </td>
        </tr>
       <?php

}

mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
?>
     </table>
   </form>
 </div>
 </div>
<?php
include_once('pied.php');
?>
 <p>&nbsp;</p>
</body>
</html>
