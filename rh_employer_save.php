"<?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

$id_nom=addslashes($_POST['id_nom']);
$Designation=addslashes($_POST['Designation']);
$sex=addslashes($_POST['sex']);
$nomprenom=addslashes($_POST['nomprenom']);
$nomprenom=str_replace("'", '', ($nomprenom));

$stfamille=addslashes($_POST['stfamille']);
$nenfant=addslashes($_POST['nenfant']);

$ville=addslashes($_POST['ville']);
$tel=addslashes($_POST['tel']);
$email=addslashes($_POST['email']);

$niveau=addslashes($_POST['niveau']);
$specialisation=addslashes($_POST['specialisation']);


$login=strtolower(substr($nomprenom,0,4)).strtolower(substr(md5(microtime()),0,3));
$pwd=substr(md5(microtime().$securite),0,8);

$titre=addslashes($_POST['titre']);

$matricule=addslashes($_POST['matricule']);
$dnaissance=addslashes($_POST['dnaissance']);
$dembauche=addslashes($_POST['dembauche']);
//$dinactivite=addslashes($_POST['dinactivite']);

$categorie=addslashes($_POST['categorie']);


//IDENTIFICATION CODE QUARTIER """""""""""""""""""""""""""""""""
$iddirection=addslashes($_POST['direction']);
$idservice=addslashes($_POST['subcat']);


	if(!isset($iddirection)|| empty($iddirection)) {
	header("location:rh_employer.php");
	exit;
 }
  
 	if(!isset($idservice)|| empty($idservice)) {
	header("location:rh_employer.php");
	exit;
 }
 
$sql1 = "SELECT * FROM $tb_rhservice where idser=$idservice";
$result1 = mysqli_query($linki,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
$service=$row1['service'];
}  

$sql2 = "SELECT * FROM $tb_rhdirection where idrh=$iddirection";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$direction=$row2['direction'];
} 

$igrchoix=addslashes($_POST['igrchoix']);
$crchoix=addslashes($_POST['crchoix']);
$Tin=addslashes($_POST['Tin']);
$coef=$Tin/100;
$indice=addslashes($_POST['indice']);
$sbase=$indice*$tauxsalaire*$coef;



$CPP=addslashes($_POST['CPP']);
$cm=addslashes($_POST['cm']);
$statut=addslashes($_POST['statut']);
$NTC=addslashes($_POST['NTC']);

//---------Programme du IGR & Caisse de retraite

 //--------Programme de calcul de IR Automatiquement -------------------
  
  $G1=$sbase;
  
  $sba = 12 * $G1;
  $ab = 0.3 * $sba;
  $eq = $sba - $ab;
  
  //zone 0%*************************
 if ( $eq < 150000) { $m = 0 ; $y = 0 ; $aj = 0; } 

  //zone 5%*************************
 if (($eq > 150000) &&($eq < 500000)) { $m = 150000 ; $y = 0.05 ; $aj = 0; }

 //zone 10%*************************
 if (($eq > 500000) &&($eq < 1000000)) {$m = 500000 ; $y = 0.1 ; $aj = 1458;}

 //zone 15%*************************
 if (($eq >  1000000) &&($eq < 1500000)) {  $m = 1000000; $y = 0.15 ; $aj = 5625;}

 //zone 20%*************************
 if (($eq > 1500000) &&($eq < 2500000)) { $m = 1500000 ; $y = 0.2 ; $aj = 11875;}

 //zone 25%*************************
  if (($eq > 2500000) &&($eq < 3500000)) {  $m = 2500000 ; $y = 0.25 ; $aj = 28542;}

 //zone 30%*************************
 if ($eq > 3500000) {  $m = 3500000 ; $y= 0.3 ; $aj= 49375;}
 
  $r1 = $eq - $m;
  $r2 = $r1 * $y / 12;
  $b10 = $r2 + $aj;
  
  $igr=$b10*$aigr*$igrchoix;
  $igr=(round($igr, 0));
  //$igr=addslashes($_POST['igr']);
  
  $b8 = 0.03 * $G1;
  $retraite=$b8*$acr*$crchoix;
  $retraite=(round($retraite, 0));
  
//---------------------FIN ----------------------

  $SS=$sbase+$avancement+$anciennete+$gratification+$srappel+$heuressup+$conge;
  $SI=$fonction+$transport+$logement+$telephone+$risque+$caisse+$astreinte+$panier+$remboursement;
  $SD=$cotisation+$avances+$pret+$adeduction;
  $SR=$igr+$retraite+$prevoyance+$aretenue;
  $SNET=$SS+$SI-$SD-$SR;

//---------------------------------------------------------------------
$sql="INSERT INTO $tb_rhpersonnel ( id_nom , Designation, nomprenom, sex , stfamille, nenfant, ville, tel, email, matricule,  niveau, specialisation, login, pwd, dnaissance,  dembauche,  titre, categorie, direction, service, cm, statut, NTC, CPP, Tin,igrchoix,crchoix,indice,taux,sbase,igr,retraite,SS,SI,SD,SR,SNET)

VALUES
('$id_nom' ,'$Designation', '$nomprenom', '$sex', '$stfamille', '$nenfant', '$ville', '$tel', '$email', '$matricule', '$niveau', '$specialisation', '$login', '$pwd', '$dnaissance',  '$dembauche', '$titre', '$categorie', '$direction', '$service', '$cm','$statut', '$NTC', '$CPP', '$Tin', '$igrchoix', '$crchoix', '$indice', '$tauxsalaire', '$sbase', '$igr', '$retraite' , '$SS', '$SI','$SD','$SR','$SNET')";
$result=mysqli_query($linki,$sql);

mysqli_close($linki); 
?>
<?php
header("location:rh_employer_affichage.php");
?>
