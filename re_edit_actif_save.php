<?php
require 'fonction.php';
require 'configuration.php';

$CodeActivite=addslashes($_POST['CodeActivite']);
$id_nom=addslashes($_POST['id_nom']);
$nomprenom=addslashes($_POST['nomprenom']);
$id=$_POST['id'];

$Indexinitial=$_POST['Indexinitial'];


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
$st1='R';

//$nfacture=$Max_idf.$ci.$st.$annee;
$nfacture=$Max_idf.$st1;
$fannee=$annee;
$libelle='Activation';
$etat='facture';
$totalttc=$Activation;
$totalnet=$Activation;

$sql="update $tbl_contact  set id_nom='$id_nom', CodeActivite='$CodeActivite' , statut='6'  , miseajours='1'  WHERE id='$id'";
$result=mysqli_query($linki,$sql);

$sql2="INSERT INTO $tbl_fact 
( id, ci , st, id_nom, bnom, bquartier, nfacture, fannee, date, libelle, totalttc, totalnet, report, etat) VALUES
( '$id','$ci', '$st', '$id_nom', '$nomprenom', '$quartier', '$nfacture', '$fannee', '$date', '$libelle','$totalttc', '$totalnet', '$totalnet', '$etat')";
$result2=mysqli_query($linki,$sql2);


$sql3 = "SELECT count(*) FROM $tbl_fact  where id='$id' and  st='E'";  
$resultat3 = mysqli_query($linki,$sql3) or die('Erreur SQL !<br />'.$sql3.'<br />'.mysqli_error());  
$nb_total = mysqli_fetch_array($resultat3);  
if (($nb_total = $nb_total[0]) == 0) {  

$st='E';
$st2='E';

$nfacture=$Max_idf.$st2;
$fannee=$annee;
$libelle='Initialisation';
$etat='facture';
$totalttc=0;
$totalnet=0;
$nf=$Indexinitial;

$sql4="INSERT INTO $tbl_fact 
( id,     ci ,    st, id_nom   , bnom        , bquartier,      nfacture, nf, fannee,      date,     libelle, totalttc,      totalnet,      report, etat) VALUES
( '$id','$ci', '$st', '$id_nom', '$nomprenom', '$quartier', '$nfacture', '$nf','$fannee', '$date', '$libelle','$totalttc', '$totalnet', '$totalnet', '$etat')";
$result4=mysqli_query($linki,$sql4);

}  
else 
{
	
}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = $emailinfo; 
$sujet = "Changement de nom  ID_Client : $id "; 
$texte = " l'agent : $id_nom a realisé une activation du client  $nomprenom son ID_Client : $id ,  Quartier : $quartier  "; 
mail($destinataires,$sujet,$texte,"From:contact@edaanjouan.com");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

   mysqli_close($linki); 
?>
<?php
	header("location:re_edit_resilier.php?id=$id");
?>
