<?php

require 'fonction.php';
require 'configuration.php';
$date=addslashes($_POST['date']);
$idf=addslashes($_POST['idf']);
$id=addslashes($_POST['id']);
$id_nom=addslashes($_POST['id_nom']);
$st=$_POST['st'];


$nfi=addslashes($_POST['nfi']);
$nf=addslashes($_POST['nf']);
$n=addslashes($_POST['n']);

$nfi2=addslashes($_POST['nfi2']);
$nf2=addslashes($_POST['nf2']);
$n2=addslashes($_POST['n2']);



$obs=addslashes($_POST['obs']);

if (($nf<=$n)or($nf2<=$n2)) {
$idr=md5(microtime()).$idf;
header("location:co_modificationMT.php?idf=$idr");
exit;
}

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

$c1=$nf-$n;
$c2=$nf2-$n2;
$c=$c1+$c2;
//$q = 20;

$coefTi=addslashes($_POST['coefTi']);

$mtt1 = $t1 * $c1*$coefTi ;
$mtt2 = $t2 * $c2*$coefTi ;
$mtotal= $mtt1 + $mtt2 ;


/*
$amperage=addslashes($_POST['amperage']);
if ($type=='MONO') { 
if ($amperage==10){ $ps=500;}
if ($amperage==15){ $ps=1000;}
if ($amperage==20){ $ps=1500;}
if ($amperage==25){ $ps=2000;}
if ($amperage==30){ $ps=2500;}
if ($amperage==35){ $ps=3000;}
if ($amperage==40){ $ps=3500;}
if ($amperage==45){ $ps=4000;}
if ($amperage==50){ $ps=4500;}
if ($amperage==55){ $ps=5000;}
if ($amperage==60){ $ps=5500;}
}
if ($type=='TRI')  {
	
if ($amperage==10){ $ps=2500;}
if ($amperage==15){ $ps=5000;}
if ($amperage==20){ $ps=7500;}
if ($amperage==25){ $ps=10000;}
if ($amperage==30){ $ps=12500;}
if ($amperage==35){ $ps=15000;}
if ($amperage==40){ $ps=17500;}
if ($amperage==45){ $ps=20000;}
if ($amperage==50){ $ps=22500;}
if ($amperage==55){ $ps=25000;}
if ($amperage==60){ $ps=27500;}
if ($amperage==65){ $ps=30000;}
if ($amperage==70){ $ps=32500;}
if ($amperage==75){ $ps=35000;}
if ($amperage==80){ $ps=37500;}
}*/

$ps=addslashes($_POST['puisct']);
//$ps=500;
//$ps=$ps*$alpha;
$totalht= $mtotal+$ps ;


$chtaxe=addslashes($_POST['chtaxe']);
if ($chtaxe==0){ $tax = (3 * $totalht) / 100 ;} else {$tax=0;}


$totalttc=$tax + $totalht ;
$imp=addslashes($_POST['impayee']);
$Pre=addslashes($_POST['Pre']);
$ortc=250;

$totalnet = $totalttc +$imp+$ortc+$Pre;
$etat='facture';


#-----------------------------------------------------------3 

echo $sqlp="update $tbl_fact  set  id_nom='$id_nom', date='$date', nf='$nf', nf2='$nf2', cons='$c', cons1='$c1', cons2='$c2', t1='$t1', t2='$t2',mont1='$mtt1', mont2='$mtt2',  totalht='$totalht' , tax='$tax' , totalttc='$totalttc', totalnet='$totalnet', report='$totalnet' ,  coefTi='$coefTi',  miseajours=1 WHERE  idf='$idf'";
$resultp=mysqli_query($linki,$sqlp);

$sqlindex="update $tbl_contact  set Indexinitial='$nf' , index2='$nf2'  WHERE id='$id'";
$resultindex=mysqli_query($linki,$sqlindex);

if($resultp){
//----------------------------------------------------------3
if($st=='E'){
$sqlbs="INSERT INTO $tbl_recact (idf, id, st, id_nom , stlib, ni, nf, ni2, nf2, impayee, total, obs, date , controle) VALUES ('$idf', '$id', '$st', '$id_nom','', '$nfi', '$nf','$nfi2', '$nf2', '$imp', '$totalnet', '$obs', '$date', 1)";
$resultbs=mysqli_query($linki,$sqlbs);
}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = $emailinfo; 
$sujet = "Modification de Facture  ID_Client : $id "; 
$texte = " l'agent : $id_nom a realisé la modification de  la facture du Client ID_Client : $id, Index Initial : $nfi , Index Actuel $nf , Montant actuel : $totalnet "; 
mail($destinataires,$sujet,$texte,"From:contact@edaanjouan.com");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

$idr=md5(microtime()).$id;
header("location:co_affichage_user.php?id=$idr");

//------------------------------------------------------
}
else {
echo "ERROR";
}

?>