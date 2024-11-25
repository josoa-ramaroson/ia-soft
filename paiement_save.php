<?php

$clique=$_POST['clique'];

if ($clique!=1){

require 'fonction.php';
require 'configuration.php';

$idf=$_POST['idf'];
$sqlfacturation="SELECT * FROM $tbl_fact WHERE idf='$idf'";
$resultatfact=mysql_query($sqlfacturation);
$ident=mysql_fetch_array($resultatfact);

if ($ident){
$idf=$ident['idf'];
$id=$ident['id'];
$nfacture=$ident['nfacture'];
$montant=$ident['report'];
$st=$ident['st'];
$fanneefacture=$ident['fannee'];
}

$id_nom=addslashes($_POST['id_nom']);
$paiement=addslashes($_POST['paiement']);
$Nomclient=addslashes($_POST['Nomclient']);
$nserief=addslashes($_POST['nserie']);
$bstatut=addslashes($_POST['bstatut']);

$report=$montant-$paiement;

$date=addslashes($_POST['date']);
//$id_nom=''; //paiement
$modalité=addslashes($_POST['modalité']);
$reference=addslashes($_POST['reference']);
$type='P'; //paiement
$rembourser='';

$sqlconnect="SELECT * FROM $tbl_paiconn  WHERE idrecu='$id_nom' ";
$resultconnect=mysql_query($sqlconnect);
$rowsc=mysql_fetch_array($resultconnect);
$Maxa_id = $rowsc['idc'];
//$Maxa_id =42872;

	if(!isset($Maxa_id)|| empty($Maxa_id)) {
	header("location:paiement.php");
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
header("location:paiement.php");
exit;
}
//-----------------------------------------------------
else
{

$sqplace="update $tbl_fact set etat='$etat', report='$report' WHERE idf='$idf'";
$resultplace=mysql_query($sqplace);

$retraite=(round($retraite, 0));

$ortc_d=$_REQUEST['ortc_d'];
if ($st=='E' and $ortc_d>=1) {$ortc_dp=250*$ortc_d;  $totalttc_dp=$paiement-$ortc_dp;    $tax_dp=(round(0.03 *($totalttc_dp),0)); $totalht_dp=$totalttc_dp-$tax_dp;} 
if ($st=='E' and $ortc_d==0) {$ortc_dp=0;    $totalttc_dp=$paiement-$ortc_dp;    $tax_dp=(round(0.03 *($totalttc_dp),0)); $totalht_dp=$totalttc_dp-$tax_dp;} 
if ($st!='E') {$ortc_d=0; $tax_dp=0;$totalht_dp=$paiement;} 

$sqlp="INSERT INTO $tbl_paiement 
( idf, id, st, nserie, fanneefacture, fannee, nrecu , date,  id_nom,  nfacture, Nomclient,  montant , paiement , report,  rembourser, modalité, reference, type, ortc_dp, tax_dp ,totalht_dp )
 VALUES
('$idf', '$id', '$st', '$nserief', '$fanneefacture','$annee','$nrecu',  '$date', '$id_nom', '$nfacture', '$Nomclient','$montant', '$paiement','$report','$rembourser',  '$modalité', '$reference', '$type', '$ortc_dp', '$tax_dp' ,'$totalht_dp')";
					 
$r=mysql_query($sqlp) ;


$sqlmj="update  $tbl_fact  set  miseajours=1  WHERE  idf='$idf'";
$resulmj=mysql_query($sqlmj);

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

$statut=addslashes($_POST['statut']);
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

//$sqlcon="update $tbl_paiconn set idrecu='$id' where idc='$Maxa_id'";
//$connection=mysql_query($sqlcon);

$sqlcon="DELETE FROM $tbl_paiconn WHERE   idc='$Maxa_id'";
$connection=mysql_query($sqlcon);

header("location:paiement.php");
exit;
}



header("location:paiement.php");
}
mysql_close($link);
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}



?>
<?php
header("location:paiement.php");
?>