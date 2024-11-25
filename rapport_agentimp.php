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
    $date=substr($_REQUEST["datec"],32);
	$agent=substr($_REQUEST["agent"],32);
// Connect to server and select databse.
mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");
  
$sql = "SELECT count(*) FROM $tbl_paiement";  

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
   

$sql = "SELECT SUM(paiement) AS Paie, st, date , id_nom FROM $tbl_paiement where id_nom='$agent' and date='$date' GROUP BY st  LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC

// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 

$sqlt = "SELECT SUM(paiement) AS Paie, id_nom , date , st , nserie FROM $tbl_paiement where  id_nom='$agent' and date='$date'";  //ASC  DESC
$reqt = mysql_query($sqlt); 

?>
</p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF"> 
      <td width="489" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>ACTIVITES</strong></font></td>
      <td width="336" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>MONTANT PAR ACTIVITE</strong></font></td>
      <td width="257" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Par date</strong></font></td>
    </tr>
    <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="#FFFFFF">
      <td> <? $n=$data['st']; 
                  if ($n=='E') echo 'FACTURATION';
                  if ($n=='P') echo 'POLICE D ABONNEMENT'; 
                  if ($n=='D') echo 'BRANCHEMENT';
                  if ($n=='F') echo 'FRAUDE'; 
				  if ($n=='A') echo 'Autre (Chang Nom/compteur/Activation/Transfert)';
                  ?></td>
      <td align="center"><? $P=strrev(chunk_split(strrev($data['Paie']),3," "));   echo $P;?></td>
      <td align="center"><? echo $data['date'];?></td>
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="19%" align="center"><font color="#FFFFFF" size="4"><strong>AGENT ( VENDEUR)</strong></font></td>
    <td width="29%" align="center"><font color="#FFFFFF"><strong>SIGNATURE </strong></font></td>
    <td width="34%" align="center"><font color="#FFFFFF"><strong>MONTANT TOTAL </strong></font></td>
    <td width="18%" align="center"><font color="#FFFFFF" size="4"><strong>DATE</strong></font></td>
  </tr>
  <?php
while($datat=mysql_fetch_array($reqt)){ // Start looping table row 
?>
  <tr>
    <td height="102" align="center" bgcolor="#FFFFFF"><? echo  $datat['id_nom']; ?></td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><? $P=strrev(chunk_split(strrev($datat['Paie']),3," "));   echo $P;?></td>
    <td align="center" bgcolor="#FFFFFF"><p>&nbsp;</p>
      <p><? echo  $datat['date']; ?></p>
    <p>&nbsp;</p></td>
  </tr>
  <?php
}
?>
</table>
<p>&nbsp;</p>
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
