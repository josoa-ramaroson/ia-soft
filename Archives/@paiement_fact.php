<?
require 'functions/session.php';
?>
<?php
require 'functions/fc-affichage.php';
require 'functions/main.php';
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
require 'configuration.php';
$st=$_REQUEST["st"];
$sql = "SELECT count(*) FROM $tbl_fact";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_fact  where fannee='$anneec' and st='$st' ORDER BY stlib ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="11%" align="center"><font color="#FFFFFF" size="4"><strong>N °</strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF" size="4"><strong>Date </strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF" size="4"><strong>N facture</strong></font></td>
     <td width="18%" align="center"><font color="#FFFFFF" size="3"><strong>Raison sociale /Matricule</strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Montant</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Impayee</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Total</strong></font></td>
     <td width="8%" align="center">&nbsp;</td>
   </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['idf'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['date'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nfacture'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['stlib'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['montant'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['impayee'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['total'];?></em></td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
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
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>