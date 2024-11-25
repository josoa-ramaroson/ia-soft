<?php
require 'fonction.php';
$id=substr($_REQUEST["id"],32);
$statut=substr($_REQUEST["satut"],32);

$date=substr($_REQUEST["d"],32);
$titre=substr($_REQUEST["ti"],32);
$Quantite=addslashes($_REQUEST['q']); 
$id_nom=addslashes($_REQUEST['id_nom']);

$agence=substr($_REQUEST["agence"],32);



if ($statut=='2')
{
	
$sqlp="update  $tbl_apptransfert set  statut='$statut', Eid_nom='$id_nom',Edate='$date' WHERE  idtansft='$id'";
$resultp=mysqli_query($linki,$sqlp);	

$sqlp="INSERT INTO $tbl_enreg ( date  , titre  , Quantite  ,   id_nom , a_nom )
                    VALUES    ('$date','$titre','$Quantite', '$id_nom', '$agence')";
					
$r=mysqli_query($linki,$sqlp) or die(mysqli_error());

header("location:app_transfert_etape2.php");
}  
if ($statut=='3')
{

$sqlp="update  $tbl_apptransfert set  statut='$statut', Cid_nom='$id_nom' WHERE  idtansft='$id'";
$resultp=mysqli_query($linki,$sqlp);	

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/*ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = "contact@boltosoft.com"; 
$sujet = "Confirmation d'abonnement ID_Client : $id "; 
$texte = " l'agent : $id_nom a confirmé que le client $Designation $nomprenom dont son ID_Client est $id, ville : $ville, Quartier : $quartier  a suivi toutes les etapes exigées pour devenir un client de EDA. Ainsi, $Designation $nomprenom  peut recevoir une facture de EDA. "; 
mail($destinataires,$sujet,$texte,"From:contact@boltosoft.com");*/
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

header("location:app_transfert_etape3.php");
}
mysql_close($link);
?>