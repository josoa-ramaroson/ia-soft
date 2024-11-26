<?php
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
$dnaissance=addslashes($_POST['sdnaissance']);
$dembauche=addslashes($_POST['sdembauche']);
$dinactivite=addslashes($_POST['dinactivite']);

$categorie=addslashes($_POST['categorie']);

//IDENTIFICATION CODE QUARTIER """""""""""""""""""""""""""""""""
/* $iddirection=addslashes($_POST['direction']);
$idservice=addslashes($_POST['subcat']);


	if(!isset($iddirection)|| empty($iddirection)) {
	header("location:rh_employer_user.php?id=$idr");
	exit;
 }
  
 	if(!isset($idservice)|| empty($idservice)) {
	header("location:rh_employer_user.php?id=$idr");
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
} */

$igrchoix=addslashes($_POST['igrchoix']);
$crchoix=addslashes($_POST['crchoix']);

$Tin=addslashes($_POST['Tin']);
$coef=$Tin/100;
$indice=addslashes($_POST['indice']);
$sbase=$indice*$tauxsalaire*$coef;


$CPP=addslashes($_POST['CPP']);
$cm=addslashes($_POST['cm']);
$statut=addslashes($_POST['statut']);


$id=$_POST['id'];
$NTC=addslashes($_POST['NTC']);


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
  //$igr=addslashes($_POST['igr']);
  
  $b8 = 0.03 * $G1;
   $retraite=$b8*$acr*$crchoix;




$sqlRECH = "SELECT * FROM $tb_rhpersonnel where idrhp=$id";
$resultRECH = mysqli_query($linki,$sqlRECH);
while ($RECH = mysqli_fetch_assoc($resultRECH)) {

  $avancement=$RECH['avancement'];
  $anciennete=$RECH['anciennete'];
  $gratification=$RECH['gratification'];
  $srappel=$RECH['srappel'];
  $heuressup=$RECH['heuressup'];
  $conge=$RECH['conge'];

  $fonction=$RECH['fonction'];
  $transport=$RECH['transport'];
  $logement=$RECH['logement'];
  $telephone=$RECH['telephone'];
  $risque=$RECH['risque'];
  $caisse=$RECH['caisse'];
  $astreinte=$RECH['astreinte'];
  $panier=$RECH['panier'];
  $remboursement=$RECH['remboursement'];
  
  $cotisation=$RECH['cotisation'];
  $avances=$RECH['avances'];
  $pret=$RECH['pret'];
  $adeduction=$RECH['adeduction'];
  
  $prevoyance=$RECH['prevoyance'];
  $aretenue=$RECH['aretenue'];

} 


//---------------------FIN ----------------------
 
  $SS=$sbase+$avancement+$anciennete+$gratification+$srappel+$heuressup+$conge;
 
  $SI=$fonction+$transport+$logement+$telephone+$risque+$caisse+$astreinte+$panier+$remboursement;

  $SD=$cotisation+$avances+$pret+$adeduction;
  
  $SR=$igr+$retraite+$prevoyance+$aretenue;

  $SNET=$SS+$SI-$SD-$SR;
  

$sql="update $tb_rhpersonnel  set 

 id_nom='$id_nom' , Designation='$Designation', nomprenom='$nomprenom', sex='$sex', stfamille='$stfamille', nenfant='$nenfant', ville='$ville', tel='$tel', email='$email', matricule='$matricule', niveau='$niveau', specialisation='$specialisation', login='$login', pwd='$pwd', dnaissance='$dnaissance',  dembauche='$dembauche', dinactivite='$dinactivite', titre='$titre', categorie='$categorie',  cm='$cm', statut='$statut', indice='$indice', taux='$tauxsalaire', sbase='$sbase', igr='$igr', retraite='$retraite', SS='$SS', SI='$SI', SD='$SD',SR='$SR',SNET='$SNET' , NTC='$NTC', CPP='$CPP', Tin='$Tin',  igrchoix='$igrchoix' , crchoix='$crchoix'  WHERE idrhp LIKE '$_POST[id]' ";
$result=mysqli_query($linki,$sql);

  if($result){
	   //SUCCESS
	   $idr=md5(microtime()).$id;
	   header("location:rh_employer_user.php?id=$idr");
   }
   else {
   echo "ERROR";
   }
  mysqli_close($linki); 
?>
