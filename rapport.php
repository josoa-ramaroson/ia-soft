<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
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
<?
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
 <?php
  
$sql = "SELECT count(*) FROM $tbl_paiement GROUP BY date";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
 
$nb_total = mysql_fetch_array($resultat);  
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
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 

	
	$sqPS="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='E' and fannee='$annee'"; 
	$RPS = mysql_query($sqPS); 
	$AFPS = mysql_fetch_assoc($RPS);
	$tPS=$AFPS['Paie']; 
		
	$sqPP="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='P' and  fannee='$annee'"; 
	$RPP = mysql_query($sqPP); 
	$AFPP = mysql_fetch_assoc($RPP);
	$tPPP=$AFPP['Paie'];
	
    $sqPD="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='D' and  fannee='$annee'"; 
	$RPD = mysql_query($sqPD); 
	$AFPD = mysql_fetch_assoc($RPD);
	$tPPD=$AFPD['Paie'];
	
	$sqPF="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='F' and  fannee='$annee'"; 
	$RPF = mysql_query($sqPF); 
	$AFPF = mysql_fetch_assoc($RPF);
	$tPPF=$AFPF['Paie'];
	
	
	$sqPA="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='A' and  fannee='$annee'"; 
	$RPA = mysql_query($sqPA); 
	$AFPA = mysql_fetch_assoc($RPA);
	$tPPA=$AFPA['Paie'];
	
	
	$sqFS="SELECT SUM(totalttc) AS fact , SUM(ortc) AS fortc, SUM(impayee) AS fimp, SUM(Pre) AS DPre , SUM(totalnet) AS ft, st FROM $tbl_fact  where st='E' and  fannee='$annee'"; 
	$RFS = mysql_query($sqFS); 
	$AFFS = mysql_fetch_assoc($RFS);
	$tFS=$AFFS['fact']; 
	$tFSi=$AFFS['fimp'];
	$tFSO=$AFFS['fortc'];
	$tFSl=$AFFS['DPre'];
	$tFSt=$AFFS['ft'];
	
	
    $sqFP="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='P' and  fannee='$annee'"; 
	$RFP = mysql_query($sqFP); 
	$AFP = mysql_fetch_assoc($RFP);
	$tFP=$AFP['fact']; 
	$tFPt=$AFP['ft']; 
	
	
	$sqFD="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='D' and  fannee='$annee'"; 
	$RFD = mysql_query($sqFD); 
	$AFD = mysql_fetch_assoc($RFD);
	$tFD=$AFD['fact']; 
	$tFDt=$AFD['ft']; 
 
 
 	$sqFF="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='F' and  fannee='$annee'"; 
	$RFF = mysql_query($sqFF); 
	$AFF = mysql_fetch_assoc($RFF);
	$tFF=$AFF['fact']; 
	$tFFt=$AFF['ft']; 
	
	$sqFA="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='A' and  fannee='$annee'"; 
	$RFA = mysql_query($sqFA); 
	$AFA = mysql_fetch_assoc($RFA);
	$tFA=$AFA['fact']; 
	$tFAt=$AFA['ft']; 
	
	
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
 <? require 'rapport_lien.php'; ?>
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
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="#FFFFFF">
      <td align="center"><? echo  $data['date']; ?></td>
      <td align="center">&nbsp;</td>
      <td align="center"><? $P=strrev(chunk_split(strrev($data['Paie']),3," "));   echo $P;?></td>
      <td align="center">&nbsp;</td>
    </tr>
    <?php

}

mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  


mysql_close ();  
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
