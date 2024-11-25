<?php
require 'fonction.php';
require 'configuration.php';
//----------------parametre de configuration--------
//------------identification du maximun -----------
$sqlmax="SELECT MAX(idf) AS Maxa_id FROM $tbl_fact";
$resultmax=mysql_query($sqlmax);
$rowsmax=mysql_fetch_array($resultmax);
if ($rowsmax) {
$Max_id = $rowsmax['Maxa_id']+1;
}
else {
$Max_id = 1;
}
//--------------------------------------
 $id_user=addslashes($_POST['id_user']);
$id_nom=addslashes($_POST['id_nom']);
$id=addslashes($_POST['id']);
$st=$_POST['st'];
//$nfacture=$Max_id.$ci.$st.$annee;
//$nfacture=$Max_id.$st;
$nfacture=$Max_id.'I'.$id_user.$st;

$fannee=$annee_facturation;
//$fannee=$annee;
//$iannee=$annee-1;

$date=$datec;
$datelimite=$datcoupure;
$libelle=addslashes($_POST['libelle']);
$bnom=addslashes($_POST['bnom']);
$bquartier=addslashes($_POST['bquartier']);
$bstatut=addslashes($_POST['bstatut']);
//$Police=addslashes($_POST['Police']);

$nf=addslashes($_POST['nf']);
$n=addslashes($_POST['n']);

$nf2=addslashes($_POST['nf2']);
$n2=addslashes($_POST['n2']);


if (($nf<$n)or($nf2<$n2)) {
header("location:co_facturationMT.php");
exit;
}

$Tarif=addslashes($_POST['Tarif']);
$sql82 ="SELECT * FROM tarif where idt='$Tarif'";
$result82 = mysql_query($sql82);
while ($row82 = mysql_fetch_assoc($result82)) {
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

$amperage=addslashes($_POST['amperage']);
/*
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

$tmt=addslashes($_POST['tmt']);
if ($tmt==1){ $ps=33000 ;} else {$ps=103000;}

//$ps=103000;
//$ps=$ps*$alpha;
$totalht= $mtotal+$ps ;


$chtaxe=addslashes($_POST['chtaxe']);
if ($chtaxe==0){ $tax = (3 * $totalht) / 100 ;} else {$tax=0;}


$totalttc=$tax + $totalht ;
$imp=addslashes($_POST['impayee']);
$ortc=250;
$totalnet = $totalttc +$imp+$ortc;
$etat='facture';

$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_fact  WHERE st='E' and id='$id'  and fannee='$fannee' and nserie='$nserie'";
$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
$nb = mysql_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{ 	

header("location:co_facturationMT.php");
exit;
}



$sql="INSERT INTO $tbl_fact ( id,  ci , st, id_nom, bnom, bquartier, nfacture, fannee, nserie, date,datelimite, libelle , nf , n , nf2, n2, cons, cons1, cons2, t1, t2, mont1, mont2, puisct, totalht, tax , totalttc, ortc, impayee , totalnet , report, etat, bstatut, impression, coefTi)
VALUES
( '$id', '$ci', '$st', '$id_nom', '$bnom', '$bquartier', '$nfacture', '$fannee','$nserie', '$date', '$datelimite' , '$libelle', '$nf', '$n', '$nf2', '$n2', '$c', '$c1', '$c2', '$t1', '$t2', '$mtt1','$mtt2', '$ps',  '$totalht', '$tax',  '$totalttc', $ortc, '$imp' , '$totalnet', '$totalnet', '$etat', '$bstatut','saisie', '$coefTi')";
$result=mysql_query($sql);


$sqlindex="update $tbl_contact  set Indexinitial='$nf' , index2='$nf2'  WHERE id='$id'";
$resultindex=mysql_query($sqlindex);

   if($result){
   }
   else {
   echo "ERROR";
   }


if ($st=='E'){
$sqlbs="INSERT INTO $tbl_factsave ( id, ci , st, nserie, annee, nfacture ) VALUES ( '$id', '$ci','$st', '$nserie', '$fannee', '$nfacture')";
$resultbs=mysql_query($sqlbs);






header("location:co_facturationMT.php");
}

if ($imp>'0'){
	$idf=addslashes($_POST['idf']);
	$sqlp="update  $tbl_fact  set etat='impayee' WHERE idf='$idf' and st='E'";
    $resultp=mysql_query($sqlp);
	}

mysql_close(); 
?>

