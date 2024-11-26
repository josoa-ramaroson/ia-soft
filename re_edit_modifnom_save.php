<?php
require 'fonction.php';
require 'configuration.php';

$id_nom=addslashes($_POST['id_nom']);
$Designation=addslashes($_POST['Designation']);
$nomprenom=addslashes($_POST['nomprenom']);
$id=$_POST['id'];

$quartier=addslashes($_POST['quartier']);
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
$st='A';
$st1='N';
//$nfacture=$Max_idf.$ci.$st.$annee;
$nfacture=$Max_idf.$st1;
$fannee=$annee;
$libelle='Chan Nom';
$etat='facture';
$totalttc=$changementdenom;
$totalnet=$changementdenom;

echo $sql="update $tbl_contact  set id_nom='$id_nom', Designation='$Designation' , nomprenom='$nomprenom', miseajours='1'  WHERE id='$id'";
$result=mysqli_query($linki,$sql);

$sql2="INSERT INTO $tbl_fact 
( id, ci , st, id_nom, bnom, bquartier, nfacture, fannee, date, libelle, totalttc, totalnet, report, etat) VALUES
( '$id','$ci', '$st', '$id_nom', '$nomprenom', '$quartier', '$nfacture', '$fannee', '$date', '$libelle','$totalttc', '$totalnet', '$totalnet', '$etat')";
$result2=mysqli_query($linki,$sql2);
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = $emailinfo; 
$sujet = "Changement de nom  ID_Client : $id "; 
$texte = " l'agent : $id_nom a realisé une changement de nom  de $Designation $nomprenom son ID_Client : $id ,  Quartier : $quartier  "; 
mail($destinataires,$sujet,$texte,"From:contact@edaanjouan.com");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

   mysqli_close($linki); 
?>
<?php
	header("location:re_edit_modifnom.php?id=$id");
?>
