<?
require 'session.php';
require 'fonction.php';
require 'fc-affichage.php';
require 'bienvenue.php';
?>
<div align="left">
  <center>
    <h2><img src="images/BSCSR9M1.jpg" width="644" height="410" /></h2>
  </center>
</div>
<p><font size="2"><font size="2"><font size="2">
  <?php
// Connect to server and select databse.
mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");
  
$sql = "SELECT count(*) FROM $tbl_com ";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
 
$nb_total = mysql_fetch_array($resultat);  
 // on teste si ce nombre de vaut pas 0  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune information ';  
}  
else { 
        // premi?re ligne on affiche les titres pr?nom et surnom dans 2 colonnes
  
    
   
// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas d?j? ?t? d?clar?e, et dans ce cas, on l'initialise ? 0  
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
	// 6 maroufchangement 1 par 5
   $nb_affichage_par_page = 1; 
   
// Pr?paration de la requ?te avec le LIMIT  
$sql = "SELECT * FROM $tbl_com  ORDER BY idcom DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</font></font></font></p>
<table width="100%" border="0">
        <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><strong><font color="#000000"><? echo $data['detail']; ?></font></strong></td>
    <td>&nbsp;</td>
  </tr>
</table>
        <p>
          <?php

}
}
mysql_close ();  
?>
        </p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td height="21">&nbsp;</td>
          </tr>
          <tr>
            <td height="21"><?php
include_once('pied.php');
?></td>
          </tr>
        </table>
        <p>&nbsp;</p>
