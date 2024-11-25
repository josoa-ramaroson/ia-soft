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
$sql = "SELECT count(*) FROM $tbl_paiement";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_paiement p , $tbl_fact f, $tbl_contact c where YEAR(p.date)='$anneec' and p.st='E' and p.nserie=f.nserie and f.nserie='$nserie' and bstatut!='retablie' and  bstatut!='saisie' and p.id=c.id and p.id=f.id  ORDER BY idp DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="16%" align="center"><strong><font color="#FFFFFF" size="3">Ville </font></strong></td>
     <td width="15%" align="center"><strong><font color="#FFFFFF" size="3">Quartier </font></strong></td>
     <td width="20%" align="center"><strong><font color="#FFFFFF" size="3">Nom du Client </font></strong></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Montant</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Payé</strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Reste à payer</strong></font></td>
     <td width="12%" align="center">&nbsp;</td>
   </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr bgcolor="<? gettatut($data['bstatut']); ?>">
     <td align="center" ><? echo $data['ville'];?></td>
     <td align="center" ><? echo $data['quartier'];?></td>
     <td align="center" ><em><? echo $data['Nomclient'];?></em></td>
     <td align="center" ><em><? echo $data['montant'];?></em></td>
     <td align="center" ><em><? echo $data['paiement'];?></em></td>
     <td align="center" ><? echo $data['report'];?></td>
     <td align="center" >             <? if ($data['bstatut']!='retablie' ) {?>
        
        <a href="coupure_remise_save.php?idf=<? echo md5(microtime()).$data['idf']; ?>" class="btn btn-warning"> REMISE </a>
        <? } else { echo $data['bstatut']; } ?> </td>
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
				//if ($fetat=='remise')         { echo $couleur="#fdff00";}//jaune
				  }
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>