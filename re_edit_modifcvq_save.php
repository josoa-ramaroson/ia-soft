<?php
require 'fonction.php';
require 'configuration.php';

$RefQuartier=addslashes($_POST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_POST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysqli_query($linki,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 

$sql3 = "SELECT * FROM commune where ref_com=$RefCommune";
$result3 = mysqli_query($linki,$sql3);
while ($row3 = mysqli_fetch_assoc($result3)) {
$secteur=$row3['commune'];
} 

//$secteur=addslashes($_POST['commune']);

$id_nom=addslashes($_POST['id_nom']);
$nomprenom=addslashes($_POST['nomprenom']);
$id=$_POST['id'];

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
$st1='T';
//$nfacture=$Max_idf.$ci.$st.$annee;
$nfacture=$Max_idf.$st1;
$fannee=$annee;
$libelle='Transfert';
$etat='facture';

$Tarif=addslashes($_POST['Tarif']);
$sql82 ="SELECT * FROM tarif where idt='$Tarif'";
$result82 = mysqli_query($linki,$sql82);
while ($row82 = mysqli_fetch_assoc($result82)) {
$t1=$row82['t1'];
$t2=$row82['t2'];
$q=$row82['q'];
$type=$row82['typecom'];
$alpha=$row82['alpha'];
}
if ($type=='TRI') { $totalttc=$transfertT; $totalnet=$transfertT; }
if ($type=='MONO'){ $totalttc=$transfert; $totalnet=$transfert; }

$sql="update $tbl_contact  set id_nom='$id_nom', RefCommune='$RefCommune', RefLocalite='$RefLocalite', RefQuartier='$RefQuartier', quartier='$quartier' ,  ville='$ville',  secteur='$secteur'  , miseajours='1' WHERE id='$id'";
$result=mysqli_query($linki,$sql);



$sql2="INSERT INTO $tbl_fact 
( id, ci , st, id_nom, bnom, bquartier, nfacture, fannee, date, libelle, totalttc, totalnet, report, etat) VALUES
( '$id','$ci', '$st', '$id_nom', '$nomprenom', '$quartier', '$nfacture', '$fannee', '$date', '$libelle','$totalttc', '$totalnet', '$totalnet', '$etat')";
$result2=mysqli_query($linki,$sql2);
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = $emailinfo; 
$sujet = "TRANSFERT DU CLIENT  ID_Client : $id "; 
$texte = " l'agent : $id_nom a realisé une transfert  du CLIENT  ID_Client : $id , ville : $ville  -  Quartier : $quartier  "; 
mail($destinataires,$sujet,$texte,"From:contact@edaanjouan.com");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@



   mysqli_close($linki); 
?>
<?php
	header("location:re_edit_modifcvq.php?id=$id");
?>
