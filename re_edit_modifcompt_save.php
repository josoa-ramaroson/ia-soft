<?php
require 'fonction.php';
$id_nom=addslashes($_POST['id_nom']);
$id=addslashes($_POST['id']);
$Police=addslashes($_POST['Police']);
$typecompteur=addslashes($_POST['typecompteur']);
$phase=addslashes($_POST['phase']);
$puissance=addslashes($_POST['puissance']);
$Tarif=addslashes($_POST['Tarif']);
$amperage=strtolower(addslashes($_POST['amperage']));
$ncompteur=addslashes($_POST['ncompteur']);
$Indexinitial=addslashes($_POST['Indexinitial']);
$index2=addslashes($_POST['index2']);
$datepose=addslashes($_POST['date']);
$nomprenom=addslashes($_POST['nomprenom']);
$quartier=addslashes($_POST['quartier']);

//$statut=addslashes($_POST['statut']);

$T=$Tarif;
$sql82 = ("SELECT * FROM tarif where idt='$T'");
$result82 = mysqli_query($linki,$sql82);
while ($row82 = mysqli_fetch_assoc($result82)) {
$typecompteur=$row82['typecom'];
}

//-----------------------------------------------------

$sqlmaxf="SELECT MAX(idf) AS Maxa_id FROM $tbl_fact";
$resultmaxf=mysqli_query($linki,$sqlmaxf);
$rowsmaxf=mysqli_fetch_array($resultmaxf);
if ($rowsmaxf) {
$Max     = $rowsmaxf['Maxa_id'];	
$Max_idf = $rowsmaxf['Maxa_id']+1;
}
else {
$Max=1;
$Max_idf = 1;
}
//---------FACTURATION DES FRAUDES---------------------------------
$st='A';
$st1='C';
//$nfacture=$Max_idf.$ci.$st.$annee;
$nfacture=$Max_idf.$st1;
$fannee=$annee;
$libelle='Chang Compteur';
$etat='facture';

$sql82 ="SELECT * FROM tarif where idt='$Tarif'";
$result82 = mysqli_query($linki,$sql82);
while ($row82 = mysqli_fetch_assoc($result82)) {
$t1=$row82['t1'];
$t2=$row82['t2'];
$q=$row82['q'];
$type=$row82['typecom'];
$alpha=$row82['alpha'];
}
if ($type=='TRI') { $totalttc=$changementcompteurT; $totalnet=$changementcompteurT;}
if ($type=='MONO'){ $totalttc=$changementcompteur; $totalnet=$changementcompteur;}

$sql="update $tbl_contact  set id_nom='$id_nom' , Police='$Police',  typecompteur='$typecompteur', phase='$phase', puissance='$puissance', Tarif='$Tarif', amperage='$amperage' , ncompteur='$ncompteur' , Indexinitial='$Indexinitial', index2='$index2', datepose='$datepose'  , miseajours='1' WHERE id LIKE '$_POST[id]' ";
$result=mysqli_query($linki,$sql);

$sql2="INSERT INTO $tbl_fact 
( id, ci , st, id_nom, bnom, bquartier, nfacture, fannee, date, libelle, totalttc, totalnet, report, etat) VALUES
( '$id','$ci', '$st', '$id_nom', '$nomprenom', '$quartier', '$nfacture', '$fannee', '$datepose', '$libelle','$totalttc', '$totalnet', '$totalnet', '$etat')";
$result2=mysqli_query($linki,$sql2);


	$sqfac="SELECT * FROM $tbl_fact  WHERE id LIKE '$_POST[id]' and st='E' ORDER BY idf desc limit 0,1";
	$resultfac=mysqli_query($linki,$sqfac);
	$datindex=mysqli_fetch_array($resultfac);
    $changindex=$datindex['idf'];

//--------------------------------------------INITIALISATION INDEX --------------
$sqlp="update  $tbl_fact  set   nf='$Indexinitial'  , nf2='$index2'  WHERE id LIKE '$_POST[id]' and st='E' and idf='$changindex' ";
$resultp=mysqli_query($linki,$sqlp);


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = $emailinfo; 
$sujet = "CHANGEMENT DE COMPTEUR DU Client id : $id "; 
$texte = " l'agent : $id_nom a realisé un changement de compteur du CLIENT  ID_Client : $id "; 
mail($destinataires,$sujet,$texte,"From:facturation@sonelecanjouan.com");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

	   $idr=md5(microtime()).$id;
       header("location:re_edit_modifcompt.php?id=$idr");

  mysqli_close($linki); 
?>
