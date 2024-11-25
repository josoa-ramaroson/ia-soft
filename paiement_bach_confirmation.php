<?php

$clique=$_REQUEST['clique'];
	
require 'fonction.php';
require 'configuration.php';

$id=$_REQUEST['id'];
$id_nom=addslashes($_REQUEST['idn']);
$paiement=addslashes($_REQUEST['pt']);
$date=addslashes($_REQUEST['dt']);
$sqlfacturationAP="SELECT * FROM $tbl_fact f, $tbl_contact c  WHERE c.id=f.id and f.id='$id' and (f.st='E' or f.st='P' or f.st='D')  ORDER BY idf desc limit 0,1";
$resultatfactAP=mysql_query($sqlfacturationAP);
$identAP=mysql_fetch_array($resultatfactAP);

if ($identAP) {
$idf=$identAP['idf'];
}
else 
{
header("location:paiement_bach_transfert.php");
}


$Nomclient=$identAP['nomprenom'];
$nserief= $identAP['nserie']; 
$bstatut= $identAP['bstatut'];
$statut= $identAP['statut']; 
$fanneefacture=$identAP['fannee'];


 if ($identAP['report']!=0)
 {

// """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""
if ($clique!=1){
$sqlfacturation="SELECT * FROM $tbl_fact WHERE idf='$idf'";
$resultatfact=mysql_query($sqlfacturation);
$ident=mysql_fetch_array($resultatfact);

if ($ident){
//$idf=$ident['idf'];
//$id=$ident['id'];
$nfacture=$ident['nfacture'];
$montant=$ident['report'];
$st=$ident['st'];
$fanneefacture=$ident['fannee'];
}


$report=$montant-$paiement;
$modalité='';
$reference='';
$type='P'; 
$rembourser='';

$sqlconnect="SELECT * FROM $tbl_paiconn  WHERE idrecu='$id_nom' ";
$resultconnect=mysql_query($sqlconnect);
$rowsc=mysql_fetch_array($resultconnect);
$Maxa_id = $rowsc['idc'];

	if(!isset($Maxa_id)|| empty($Maxa_id)) {
	header("location:paiement_bach_transfert.php");
	exit;
 }
 

$ci='N°';
$nrecu=$Maxa_id;


$etat='paye';

if ($report==0) {$etat='paye';} else {$etat='accompte';}

if ($clique!=1) {
	
//-------------------detecter les doublons --------- Une personne peut faire passer un paiement d'une facture---
$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_paiement  WHERE  idf='$idf' and date='$date' and nrecu='$nrecu' and  id_nom='$id_nom'";
$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
$nb = mysql_fetch_assoc($sqLvaleur);

if($nb['nb']==1)
{ 	
header("location:paiement_bach_transfert.php");
exit;
}
//-----------------------------------------------------
else
{

$sqplace="update $tbl_fact set etat='$etat', report='$report' WHERE idf='$idf'";
$resultplace=mysql_query($sqplace);

//$ortc_d=$_REQUEST['ortc_d'];
$ortc_d=1;

if ($st=='E' and $ortc_d==1) {$ortc_dp=250;  $totalttc_dp=$paiement-$ortc_dp;    $tax_dp=(round(0.03 *($totalttc_dp),0)); $totalht_dp=$totalttc_dp-$tax_dp;} 
if ($st=='E' and $ortc_d==0) {$ortc_dp=0;    $totalttc_dp=$paiement-$ortc_dp;    $tax_dp=(round(0.03 *($totalttc_dp),0)); $totalht_dp=$totalttc_dp-$tax_dp;} 
if ($st!='E') {$ortc_d=0; $tax_dp=0;$totalht_dp=$paiement;} 

$sqlp="INSERT INTO $tbl_paiement 
( idf, id, st, nserie, fanneefacture, fannee, nrecu , date,  id_nom,  nfacture, Nomclient,  montant , paiement , report,  rembourser, modalité, reference, type, ortc_dp, tax_dp ,totalht_dp)
 VALUES
('$idf', '$id', '$st', '$nserief', '$fanneefacture','$annee','$nrecu',  '$date', '$id_nom', '$nfacture', '$Nomclient','$montant', '$paiement','$report','$rembourser',  '$modalité', '$reference', '$type',  '$ortc_dp', '$tax_dp' ,'$totalht_dp')";
					 
$r=mysql_query($sqlp) ;

$sqlmj="update  $tbl_fact  set  miseajours=1  WHERE  idf='$idf'";
$resulmj=mysql_query($sqlmj);


$sqlvalidation="update $tbl_paiement_bach  set  miseajours='1' WHERE  id='$id' and id_nom='$id_nom'";
$resultvalidation=mysql_query($sqlvalidation);

$sqlcon="DELETE FROM $tbl_paiconn WHERE   idc='$Maxa_id'";
$connection=mysql_query($sqlcon);

$clique=1;
}
//---------------------------------------------------

if ($bstatut=='couper')
{
$sqlp="update  $tbl_fact  set  bstatut='remise' WHERE  idf='$idf'";
$resultp=mysql_query($sqlp);	
}


if ($statut=='1' and $report=='0')
{
$sqlp="update  $tbl_contact  set  statut='2' WHERE  id='$id' ";
$resultp=mysql_query($sqlp);	
}

if ($statut=='3' and $report=='0')
{
$sqlp="update  $tbl_contact  set  statut='4' WHERE  id='$id'";
$resultp=mysql_query($sqlp);	
}



$valeur = "SELECT COUNT(*) AS nbrecu FROM $tbl_paiement  WHERE  nrecu='$Maxa_id'";   
$sqLv = mysql_query($valeur); 
$nbdata = mysql_fetch_assoc($sqLv);
if($nbdata['nbrecu']==1)
{


$sqlcon="DELETE FROM $tbl_paiconn WHERE   idc='$Maxa_id'";
$connection=mysql_query($sqlcon);

header("location:paiement_bach_transfert.php");
exit;
}

header("location:paiement_bach_transfert.php");
}
mysql_close($link);

}
header("location:paiement_bach_transfert.php");
// """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""


 }
 else
 {

header("location:paiement_bach_transfert.php");
 }

?>