<?php
$mois=$_REQUEST['mois'];
$annee=$_REQUEST['annee'];

//$mois=9;
//$annee=2015;

require 'fonction.php';

$sqFP="SELECT  COUNT(*) AS nbres, SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='P' and   MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFP = mysql_query($sqFP); 
	$AFP = mysql_fetch_assoc($RFP);
	$tFP=$AFP['fact']; 
	$tFPt=$AFP['ft']; 
	$tFPn=$AFP['nbres'];


	$sqFD="SELECT  COUNT(*) AS nbres, SUM(totalttc) AS fact , SUM(totalnet) AS ft, SUM(impayee) AS impayee, st FROM $tbl_fact   where st='D' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFD = mysql_query($sqFD); 
	$AFD = mysql_fetch_assoc($RFD);
	$tFD=$AFD['fact']; 
	$tFDt=$AFD['ft']; 
	$tFDi=$AFD['impayee'];
	$tFDn=$AFD['nbres'];
	
	$sqFAN="SELECT  COUNT(*) AS nbres, SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='A' and nfacture LIKE '%N' and  MONTH(date)=$mois and YEAR(date)=$annee";  
	$RFAN = mysql_query($sqFAN); 
	$AFAN = mysql_fetch_assoc($RFAN);
	$tFAN=$AFAN['fact']; 
	$tFAtN=$AFAN['ft'];
	$tFAtNn=$AFAN['nbres'];
	
	
	$sqFAC="SELECT  COUNT(*) AS nbres, SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='A' and nfacture LIKE '%C' and  MONTH(date)=$mois and YEAR(date)=$annee";  
	$RFAC = mysql_query($sqFAC); 
	$AFAC = mysql_fetch_assoc($RFAC);
	$tFAC=$AFAC['fact']; 
	$tFAtC=$AFAC['ft'];
	$tFAtCn=$AFAC['nbres'];
	
	
	$sqFAT="SELECT  COUNT(*) AS nbres, SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='A' and nfacture LIKE '%T' and  MONTH(date)=$mois and YEAR(date)=$annee";  
	$RFAT = mysql_query($sqFAT); 
	$AFAT = mysql_fetch_assoc($RFAT);
	$tFAT=$AFAT['fact']; 
	$tFAtT=$AFAT['ft'];
	$tFAtTn=$AFAT['nbres'];
	
	
	$sqFAR="SELECT  COUNT(*) AS nbres, SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='A' and nfacture LIKE '%R' and  MONTH(date)=$mois and YEAR(date)=$annee";  
	$RFAR = mysql_query($sqFAR); 
	$AFAR = mysql_fetch_assoc($RFAR);
	$tFAR=$AFAR['fact']; 
	$tFAtR=$AFAR['ft'];
	$tFAtRn=$AFAR['nbres'];
	
	$sqFF="SELECT  COUNT(*) AS nbres, SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='F' and   MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFF = mysql_query($sqFF); 
	$AFF = mysql_fetch_assoc($RFF);
	$tFF=$AFF['fact']; 
	$tFFt=$AFF['ft']; 
	$tFFn=$AFF['nbres'];

$tt=$tFPn+$tFDn+$tFAtNn+$tFAtCn+$tFAtTn+$tFAtRn+$tFFn;
if($tt==0){
$qt1=0;
$qt2=0;
$qt3=0;
$qt4=0;
$qt5=0;
$qt6=0;
$qt7=0;
}
else {
$qt1=$tFPn*100/$tt;
$qt2=$tFDn*100/$tt;
$qt3=$tFAtNn*100/$tt;
$qt4=$tFAtCn*100/$tt;
$qt5=$tFAtTn*100/$tt;
$qt6=$tFAtRn*100/$tt;
$qt7=$tFFn*100/$tt;
}
?>
