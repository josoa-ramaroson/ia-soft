<?php
require 'fonction.php';
require 'rh_configuration_fonction.php';


  	$id=$_POST['id'];
	$nconge=addslashes($_POST['nconge']);
	$Tin=addslashes($_POST['Tin']);
	$coef=$Tin/100;
		
  	$indice=addslashes($_POST['indice']);
  	$taux=addslashes($_POST['taux']);
  	$sbase=$indice*$taux*$coef;
  
  	if(!isset($indice)|| empty($indice)) {
	header("location:rh_employer_paie.php");
	exit;
 }
  
 	if(!isset($taux)|| empty($taux)) {
	header("location:rh_employer_paie.php");
	exit;
 }
 
  	if(!isset($id)|| empty($id)) {
	header("location:rh_employer_paie.php");
	exit;
 }
  

$Designation=addslashes($_POST['Designation']);
$nomprenom=addslashes($_POST['nomprenom']);
$titre=addslashes($_POST['titre']);
$ville=addslashes($_POST['ville']);

$matricule=addslashes($_POST['matricule']);
$dembauche=addslashes($_POST['dembauche']);
$direction=addslashes($_POST['direction']);
$service=addslashes($_POST['service']);
  
 
  $id_nom=addslashes($_POST['id_nom']);
  
  $avancement=addslashes($_POST['avancement']);
  $avancement=(round($avancement, 0));
  
  $anciennete=addslashes($_POST['anciennete']);
  $anciennete=(round($anciennete, 0));
  
  $gratification=addslashes($_POST['gratification']);
  $gratification=(round($gratification, 0));
  
  $srappel=addslashes($_POST['srappel']);
  $srappel=(round($srappel, 0));
  
  $heuressup=addslashes($_POST['heuressup']);
  $heuressup=(round($heuressup, 0));
   
  $conge=addslashes($_POST['conge']);
  $conge=(round($conge, 0));
  
  $SS=$sbase+$avancement+$anciennete+$gratification+$srappel+$heuressup+$conge;
  
  
  
  $fonction=addslashes($_POST['fonction']);
  $fonction=(round($fonction, 0));
  
  $transport=addslashes($_POST['transport']);
  $transport=(round($transport, 0));
  
  $logement=addslashes($_POST['logement']);
  $logement=(round($logement, 0));
  
  $telephone=addslashes($_POST['telephone']);
  $telephone=(round($telephone, 0));
  
  $risque=addslashes($_POST['risque']);
  $risque=(round($risque, 0));
  
  $caisse=addslashes($_POST['caisse']);
  $caisse=(round($caisse, 0));
  
  $astreinte=addslashes($_POST['astreinte']);
  $astreinte=(round($astreinte, 0));
  
  $panier=addslashes($_POST['panier']);
  $panier=(round($panier, 0));
  
  $remboursement=addslashes($_POST['remboursement']);
  $remboursement=(round($remboursement, 0));
  
  
  $SI=$fonction+$transport+$logement+$telephone+$risque+$caisse+$astreinte+$panier+$remboursement;
  
  
  $cotisation=addslashes($_POST['cotisation']);
  $cotisation=(round($cotisation, 0));
  
  $avances=addslashes($_POST['avances']);
  $avances=(round($avances, 0));
  
  $pret=addslashes($_POST['pret']);
  $pret=(round($pret, 0));
  
  $adeduction=addslashes($_POST['adeduction']);
  $adeduction=(round($adeduction, 0));
  
  
  $SD=$cotisation+$avances+$pret+$adeduction;
  
  $igrchoix=addslashes($_POST['igrchoix']);
  $crchoix=addslashes($_POST['crchoix']);
  
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
  
  //$retraite=addslashes($_POST['retraite']);
  $prevoyance=addslashes($_POST['prevoyance']);
  $prevoyance=(round($prevoyance, 0));
  
  $aretenue=addslashes($_POST['aretenue']);
  $aretenue=(round($aretenue, 0));

  $SR=$igr+$retraite+$prevoyance+$aretenue;

  $SNET=$SS+$SI-$SD-$SR;
  
  //$moispaie=1;
  //$anneepaie=2015;

$sql="update $tb_rhpersonnel  set   id_nom='$id_nom', Tin='$Tin', igrchoix='$igrchoix' , crchoix='$crchoix', indice='$indice', taux='$taux', sbase='$sbase', avancement='$avancement', anciennete='$anciennete',  gratification='$gratification', srappel='$srappel', heuressup='$heuressup', conge='$conge', fonction='$fonction', transport='$transport', logement='$logement', telephone='$telephone', risque='$risque', caisse='$caisse', astreinte='$astreinte', panier='$panier', remboursement='$remboursement', cotisation='$cotisation', avances='$avances', pret='$pret', adeduction='$adeduction',igr='$igr', retraite='$retraite', prevoyance='$prevoyance', aretenue='$aretenue',

SS='$SS', SI='$SI', SD='$SD',SR='$SR',SNET='$SNET'  WHERE idrhp='$id'";
$result=mysqli_query($linki,$sql);

  if($result){
	  
	  
$sql2="INSERT INTO $tb_rhpaie ( idrh, id_nom , moispaie , anneepaie, Designation, nomprenom,  ville, matricule,  dembauche,  titre, direction, service, nconge, Tin, igrchoix,crchoix, indice,taux,sbase, avancement,anciennete,gratification,srappel,heuressup,conge, fonction,transport,logement,telephone,risque,
 caisse,astreinte,panier,remboursement,cotisation,avances,pret,adeduction,igr,retraite,prevoyance,aretenue,SS,SI,SD,SR,SNET)

VALUES
('$id','$id_nom' , '$moispaie',  '$anneepaie', '$Designation', '$nomprenom', '$ville', '$matricule', '$dembauche','$titre', '$direction', '$service', '$nconge', '$Tin',  '$igrchoix', '$crchoix', '$indice', '$taux', '$sbase', '$avancement', '$anciennete',  '$gratification', '$srappel', '$heuressup', '$conge','$fonction', '$transport', '$logement', '$telephone', '$risque','$caisse', '$astreinte', '$panier', '$remboursement', '$cotisation', '$avances', '$pret', '$adeduction','$igr', '$retraite', '$prevoyance', '$aretenue','$SS', '$SI','$SD','$SR','$SNET')";
$result2=mysqli_query($linki,$sql2);
	  
	  
	  
	  
	   //SUCCESS
	  //$idr=md5(microtime()).$id;
	header("location:rh_employer_paie.php");
   }
   else {
   echo "ERROR";
   }
  mysqli_close($linki); 
?>
