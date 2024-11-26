<?php
require 'fonction.php';
require 'configuration.php';

$id_nom=addslashes($_POST['id_nom']);
$id=addslashes($_POST['id']);
$quartier=addslashes($_POST['quartier']);
$nomprenom=addslashes($_POST['nomprenom']);
$montant=addslashes($_POST['montant']);
$date=addslashes($_POST['date']);
//-----------------------------------------------------

$sqlmaxf="SELECT MAX(idf) AS Maxa_id FROM $tbl_fact";
$resultmaxf=mysqli_query($linki,$sqlmaxf);
$rowsmaxf=mysqli_fetch_array($resultmaxf);
if ($rowsmaxf) {
$Max_idf = $rowsmaxf['Maxa_id']+1;
}
else {
$Max_idf = 1;
}
//---------FACTURATION DES FRAUDES---------------------------------
$st='F';
$nfacture=$Max_idf.$st;
$fannee=$annee;
$libelle='Penalite';
$etat='facture';
$totalttc=$montant;
$totalnet=$montant;


$sql2="INSERT INTO $tbl_fact 
( id, ci , st, id_nom, bnom, bquartier, nfacture, fannee, date, libelle, totalttc, totalnet, report, etat) VALUES
( '$id','$ci', '$st', '$id_nom', '$nomprenom', '$quartier', '$nfacture', '$fannee', '$date', '$libelle','$totalttc', '$totalnet', '$totalnet', '$etat')";
$result2=mysqli_query($linki,$sql2);
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = $emailinfo; 
$sujet = " AMANDE du ID_Client : $Max_id "; 
$texte = " l'agent : $id_nom a facturé une amande à $nomprenom de $montant au client ID_Client : $Max_id , Quartier : $quartier  "; 
mail($destinataires,$sujet,$texte,"From:contact@edaanjouan.com");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
   mysqli_close($linki); 
?>
<?php
header("location:coi_facturation_liste.php");
?>
