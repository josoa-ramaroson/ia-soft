<?php
require 'fonction.php';
require 'configuration.php';
$id=substr($_REQUEST["id"],32);
$statut=substr($_REQUEST["satut"],32);
$sqlp="update  $tbl_contact  set  statut='$statut' WHERE  id='$id'";
$resultp=mysql_query($sqlp);	



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = "melmarouf@hotmail.com"; 
$sujet = "Confirmation d'abonnement ID_Client : $id "; 
$texte = " l'agent : $id_nom a confirmé que le client $Designation $nomprenom dont son ID_Client est $id, ville : $ville, Quartier : $quartier  a suivi toutes les etapes exigées pour devenir un client de EDA. Ainsi, $Designation $nomprenom  peut recevoir une facture de EDA. "; 
mail($destinataires,$sujet,$texte,"From:contact@edaanjouan.com");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

if ($statut=='5')
{
header("location:re_affichage_connecte.php");
}  
if ($statut=='6')
{
header("location:re_affichage.php");
}
mysql_close($link);
?>