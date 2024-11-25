<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
	if($_SESSION['u_niveau'] != 6) {
	header("location:index.php?error=false");
	exit;
 }
?>
<?php
require_once('calendar/classes/tc_calendar.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="js/validator.js"></script>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">N° ID du Client :</h3>
  </div>
  <div class="panel-body">
    <form id="recherche-societe" name="recherche-societe" method="post" action="rembourssement_apercu.php">
      <table width="100%" border="0">
        <tr>
          <td width="9%"><strong><font size="2">ID_client</font></strong></td>
          <td width="11%"><strong>
            <input name="idr" type="text" class="form-control" id="idr" size="20" />
          </strong></td>
          <td width="2%">&nbsp;</td>
         <td width="78%"><strong>
           <input type="submit" name="Valider" id="envoyer" value="Chercher " />
         </strong>           

</td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>
  <?php

$sql = "SELECT count(*) FROM $tbl_paiement where type='R'";  

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
   $nb_affichage_par_page = 30; 
   
 
$sqfac = "SELECT * FROM $tbl_paiement where type='R' GROUP BY  idp desc LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC
 
// on ex?cute la requ?te  
$resultfac = mysql_query($sqfac) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 



	//$sqfac="SELECT * FROM $tbl_paiement ORDER BY idp DESC";
	//$resultfac=mysql_query($sqfac);

?>
</p>
<p>&nbsp; </p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#0794F0">
    <td width="100%" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Historique des rembourssements</font></strong></div></td>
  </tr>
</table>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0794F0">
    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000">ID Client</font></td>
    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Vendeur</strong></font></td>
    <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date</strong></font></td>
    <td width="17%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Nom du client</strong></font></td>
    <td width="12%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
    <td width="12%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>N Reçu </strong></font></td>
    <td width="11%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Ancien Report</strong></font></td>
    <td width="11%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Rembourser</strong></font></td>
    <td width="16%" align="center" bgcolor="#FFFFFF">Reste à payer actuel</td>
  </tr>
  <?php
while($rowsfac=mysql_fetch_array($resultfac)){ 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['id'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfac['id_nom'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfac['date'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $rowsfac['Nomclient'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['nfacture'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em> <a href="rembourssement_billimp.php?idp=<? echo md5(microtime()).$rowsfac['idp'];?>" target="_blank" > <? echo $rowsfac['nrecu'];?></a> </em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo ($rowsfac['montant']-$rowsfac['rembourser']);?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['rembourser'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfac['montant'];?></em></td>
  </tr>
  <?php
}

mysql_free_result ($resultfac); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  


mysql_close ();  
?>
</table>
<p>&nbsp;</p>
</body>
</html>
