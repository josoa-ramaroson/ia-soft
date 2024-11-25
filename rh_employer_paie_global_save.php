<?php
require 'session.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';

$id_nom=addslashes($_POST['id_nom']);
$LEmois=addslashes($_POST['mois']);
$Lannee=addslashes($_POST['annee']);

  
$sqlRECH = "SELECT * FROM $tb_rhpaie where moispaie=$LEmois and anneepaie=$Lannee";
$resultRECH = mysqli_query($linki,$sqlRECH);
while ($RECH = mysqli_fetch_assoc($resultRECH)) {
  $idrh=$RECH['idrh'];
  $Designation=$RECH['Designation'];
  $nomprenom=$RECH['nomprenom'];
  $ville=$RECH['ville'];
  $matricule=$RECH['matricule'];
  $dembauche=$RECH['dembauche'];
  $titre=$RECH['titre'];
  $direction=$RECH['direction'];
  $service=$RECH['service'];
  $Tin=$RECH['Tin'];
  $igrchoix=$RECH['igrchoix'];
  $crchoix=$RECH['crchoix'];
  $nconge=$RECH['nconge'];
  $cm=$RECH['cm'];
  $indice=$RECH['indice'];
  $taux=$RECH['taux'];
  $sbase=$RECH['sbase'];
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
  $igr=$RECH['igr'];
  $retraite=$RECH['retraite'];
  $prevoyance=$RECH['prevoyance'];
  $aretenue=$RECH['aretenue'];
  $SS=$RECH['SS'];
  $SI=$RECH['SI'];
  $SD=$RECH['SD'];
  $SR=$RECH['SR'];
  $SNET=$RECH['SNET'];
  
//------------------DEBUT VERIFICATION  

    $sqlVER="SELECT * FROM $tb_rhpaie  WHERE  idrh='$idrh'  and moispaie=$moispaie and anneepaie=$anneepaie" ;
	$resultatVER= mysqli_query($linki,$sqlVER);
	$VERIFICATION=mysqli_fetch_array($resultatVER);

	if ($VERIFICATION===FALSE)
	{
    
 //-----------------DEBUT ENREGISTREMENT -------------------
$sql="update $tb_rhpersonnel  set   id_nom='$id_nom', Tin='$Tin', igrchoix='$igrchoix' , crchoix='$crchoix', indice='$indice', taux='$taux', sbase='$sbase', avancement='$avancement', anciennete='$anciennete',  gratification='$gratification', srappel='$srappel', heuressup='$heuressup', conge='$conge', fonction='$fonction', transport='$transport', logement='$logement', telephone='$telephone', risque='$risque', caisse='$caisse', astreinte='$astreinte', panier='$panier', remboursement='$remboursement', cotisation='$cotisation', avances='$avances', pret='$pret', adeduction='$adeduction',igr='$igr', retraite='$retraite', prevoyance='$prevoyance', aretenue='$aretenue',

SS='$SS', SI='$SI', SD='$SD',SR='$SR',SNET='$SNET'  WHERE idrhp='$idrh'";
$result=mysqli_query($linki,$sql);

  if($result){
	  
$sql2="INSERT INTO $tb_rhpaie ( idrh, id_nom , moispaie , anneepaie, Designation, nomprenom,  ville, matricule,  dembauche,  titre, direction, service, nconge, Tin,  igrchoix, crchoix, indice,taux,sbase, avancement,anciennete,gratification,srappel,heuressup,conge, fonction,transport,logement,telephone,risque,
 caisse,astreinte,panier,remboursement,cotisation,avances,pret,adeduction,igr,retraite,prevoyance,aretenue,SS,SI,SD,SR,SNET)

VALUES
('$idrh','$id_nom' , '$moispaie',  '$anneepaie', '$Designation', '$nomprenom', '$ville', '$matricule', '$dembauche','$titre', '$direction', '$service', '$nconge', '$Tin',  '$igrchoix', '$crchoix', '$indice', '$taux', '$sbase', '$avancement', '$anciennete',  '$gratification', '$srappel', '$heuressup', '$conge','$fonction', '$transport', '$logement', '$telephone', '$risque','$caisse', '$astreinte', '$panier', '$remboursement', '$cotisation', '$avances', '$pret', '$adeduction','$igr', '$retraite', '$prevoyance', '$aretenue','$SS', '$SI','$SD','$SR','$SNET')";
$result2=mysqli_query($linki,$sql2);
	header("location:rh_employer_paie.php");
   }

   else {
   echo "ERROR";
   }
   //-----------------FIN ENREGISTREMENT-------------------
	}
    else {
		
    header("location:rh_employer_paie.php");
 }
  
    
   
} 
?>
