<?php
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.centrevaleur {
	text-align: center;
}
.centrevaleur td {
	text-align: center;
}
.taille16 {	font-size: 16px;
}
</style>
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
 <?php
  
$sql = "SELECT count(*) FROM $tbl_paiement GROUP BY date";  

$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
 
 
$nb_total = mysqli_fetch_array($resultat);  
 // on teste si ce nombre de vaut pas 0  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
        // premi?re ligne on affiche les titres pr?nom et surnom dans 2 colonnes
  
    
   
// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas d?j? ?t? d?clar?e, et dans ce cas, on l'initialise ? 0  
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
	// 6 maroufchangement 1 par 5
   $nb_affichage_par_page = 30; 
   
 
$sql = "SELECT SUM(paiement) AS Paie, date  FROM $tbl_paiement GROUP BY  date  DESC LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC
 
// on ex?cute la requ?te  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki)); 

	
	$sqPS="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='E' and fannee='$annee'"; 
	$RPS = mysqli_query($linki,$sqPS); 
	$AFPS = mysqli_fetch_assoc($RPS);
	$tPS=$AFPS['Paie']; 
		
	$sqPP="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='P' and  fannee='$annee'"; 
	$RPP = mysqli_query($linki,$sqPP); 
	$AFPP = mysqli_fetch_assoc($RPP);
	$tPPP=$AFPP['Paie'];
	
    $sqPD="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='D' and  fannee='$annee'"; 
	$RPD = mysqli_query($linki,$sqPD); 
	$AFPD = mysqli_fetch_assoc($RPD);
	$tPPD=$AFPD['Paie'];
	
	$sqPF="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='F' and  fannee='$annee'"; 
	$RPF = mysqli_query($linki,$sqPF); 
	$AFPF = mysqli_fetch_assoc($RPF);
	$tPPF=$AFPF['Paie'];
	
	
	$sqPA="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='A' and  fannee='$annee'"; 
	$RPA = mysqli_query($linki,$sqPA); 
	$AFPA = mysqli_fetch_assoc($RPA);
	$tPPA=$AFPA['Paie'];
	
	
	$sqFS="SELECT SUM(totalttc) AS fact , SUM(ortc) AS fortc, SUM(impayee) AS fimp, SUM(Pre) AS DPre , SUM(totalnet) AS ft, st FROM $tbl_fact  where st='E' and  fannee='$annee'"; 
	$RFS = mysqli_query($linki,$sqFS); 
	$AFFS = mysqli_fetch_assoc($RFS);
	$tFS=$AFFS['fact']; 
	$tFSi=$AFFS['fimp'];
	$tFSO=$AFFS['fortc'];
	$tFSl=$AFFS['DPre'];
	$tFSt=$AFFS['ft'];
	
	
    $sqFP="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='P' and  fannee='$annee'"; 
	$RFP = mysqli_query($linki,$sqFP); 
	$AFP = mysqli_fetch_assoc($RFP);
	$tFP=$AFP['fact']; 
	$tFPt=$AFP['ft']; 
	
	
	$sqFD="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='D' and  fannee='$annee'"; 
	$RFD = mysqli_query($linki,$sqFD); 
	$AFD = mysqli_fetch_assoc($RFD);
	$tFD=$AFD['fact']; 
	$tFDt=$AFD['ft']; 
 
 
 	$sqFF="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='F' and  fannee='$annee'"; 
	$RFF = mysqli_query($linki,$sqFF); 
	$AFF = mysqli_fetch_assoc($RFF);
	$tFF=$AFF['fact']; 
	$tFFt=$AFF['ft']; 
	
	$sqFA="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='A' and  fannee='$annee'"; 
	$RFA = mysqli_query($linki,$sqFA); 
	$AFA = mysqli_fetch_assoc($RFA);
	$tFA=$AFA['fact']; 
	$tFAt=$AFA['ft']; 
	
	
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
 <?php require 'rapport_lien.php'; ?>
<p><font size="2"><font size="2"><font size="2">
  
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF"> 
      <td width="105" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Date</strong></font></td>
      <td width="112" align="center" bgcolor="#3071AA">&nbsp;</td>
      <td width="95" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Les recouvrements par date </strong></font></td>
      <td width="97" align="center" bgcolor="#3071AA">&nbsp;</td>
  </tr>
    <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="#FFFFFF">
      <td align="center"><?php echo  $data['date']; ?></td>
      <td align="center">&nbsp;</td>
      <td align="center"><?php $P=strrev(chunk_split(strrev($data['Paie']),3," "));   echo $P;?></td>
      <td align="center">&nbsp;</td>
    </tr>
    <?php

}

mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  


mysqli_close ($linki);  
?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center"></div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
  </tr>
  <tr> 
    <td height="21"> 
      <?php
include_once('pied.php');
?>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
