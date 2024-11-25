<?php
    include "qrcode/qrlib.php";
 // create a QR Code with this text and display it
    $id=addslashes($_REQUEST['qr']);
    $idf=addslashes($_REQUEST['idf']);
	 
    //$id='18971';
	//$idf='1163139';
    require 'fonction.php';
	
	$sqfacd="SELECT * FROM $tbl_contact c , $tbl_fact f WHERE c.id=f.id and f.idf='$idf' and st='E'";
    $resultfacd=mysqli_query($linki,$sqfacd);
    while($data5=mysqli_fetch_array($resultfacd)){
	
	$leclientid=$data5['id'];
	$nom=$data5['nomprenom'];
	$ville=$data5['ville'];
	$quartier=$data5['quartier'];
	$ncompteur=$data5['ncompteur'];
	$typecompteur=$data5['typecompteur'];
	$nfacture=$data5['nfacture'];
	$datelimite=$data5['datelimite'];
    $refFact=$data5['nserie'].'/'.$data5['fannee']; 
	$tnet= $data5['totalnet'];
	
	$information=" Mr $nom ,  Adresse : $ville , $quartier ,  Id_client : $leclientid, N°compteur : $ncompteur  type: $typecompteur , N°Fact $nfacture , ($refFact), Date limite : $datelimite,  Montant :$tnet kmf ";
	}
	
	function affichage_texte($id,$tbl_paiement,$linki){
	$sqpaied="SELECT * FROM $tbl_paiement  WHERE id='$id' and st='E' ORDER BY idp DESC LIMIT 0 , 5";
	$resultpaied=mysqli_query($linki,$sqpaied);
	$text='';
	while($rowspd=mysqli_fetch_array($resultpaied)){ 
	$nsq=$rowspd['nserie'];
    $fan=$rowspd['fannee'];
	$date = $rowspd['date'] ;
	$montant=$rowspd['montant'];
	$paiement=$rowspd['paiement'];
	$report=$rowspd['report'];
    $lemessage="$date _ $paiement kmf";
	//$lemessage=" Transaction de $date, N° serie ($nsq/$fan)  Total net: $montant,  Payé: $paiement";
    //$lemessage="M.Paye: $paiement le  $date  pour  N Facture ($nsq/$fan)";
	$text  .= ' ' . $lemessage;	
	}
	
     return $text;
	
	}
	$bscPqr=affichage_texte($id,$tbl_paiement,$linki);
	QRcode::png("$information, Ci joint un historique des paiements selon les dates : $bscPqr");
	
