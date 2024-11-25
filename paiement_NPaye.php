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
 <p>&nbsp;</p>
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
$sql = "SELECT * FROM $tbl_fact f, $tbl_contact c  where f.fannee='$anneec' and f.st='$st' and nserie='$nserie' and c.id=f.id and  idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$anneec') ORDER BY f.id ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="6%" align="center"><font color="#FFFFFF">ID_Client</font> </td>
     <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>N facture</strong></font></td>
     <td width="20%" align="center"><font color="#FFFFFF" size="3"><strong>Nom du client</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF"><strong>ORTC</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Impayee</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF"><strong>D remise</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Total net</strong></font></td>
     <td width="12%" align="center"><strong><font color="#FFFFFF">Suivi</font></strong></td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr bgcolor="<? gettatut($data['bstatut']); ?>">
     <td align="center" ><em><? echo $data['id'];?></em></td>
     <td align="center" ><em><? echo $data['nfacture'];?></em></td>
     <td align="center" ><em><? echo $data['nomprenom'];?></em></td>
     <td align="center" ><em><? echo $data['totalttc'];?></em></td>
     <td align="center" ><em><? echo $data['ortc'];?></em></td>
     <td align="center" ><em><? echo $data['impayee'];?></em></td>
     <td align="center" ><em><? echo $data['Pre'];?></em></td>
     <td align="center" ><em><? echo $data['totalnet'];?></em></td>
     <td align="center" ><em><? echo $data['bstatut'];?></em></td>
   </tr>
   <?php
}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
				  function gettatut($fetat){
				  if ($fetat=='retablie')       { echo $couleur="#87e385";}//vert fonce
				  if ($fetat=='remise')         { echo $couleur="#ffc88d";}//jaune	
				  if ($fetat=='couper')         { echo $couleur="#ec9b9b";}//rouge -Declined	 
				 //if ($fetat=='enregistre')    { echo $couleur="#87e385";}//jaune	
				 //if ($fetat=='confirme')      { echo $couleur="#87e385";}//vert fonce
				 //if ($fetat=='transfert')     { echo $couleur="#fdff00";}//jaune
				// if ($fetat=='réservation')   { echo $couleur="#ffc88d";}//orange 
				// if ($fetat=='Annuler')       { echo $couleur="#ec9b9b";}//orange
				  }
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>