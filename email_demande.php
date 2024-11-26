<?php
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = "melmarouf@hotmail.com,melmarouf@gmail.com"; 
$sujet = "Demande d'Abonnement ID_Client : $Max_id "; 
$texte = " l'agent : $id_nom a realisé la demande d'abonnement de $Designation $nomprenom son ID_Client : $Max_id , ville : $ville, Quartier : $quartier  "; 
mail($destinataires,$sujet,$texte,"From:contact@edaanjouan.com");
?>

