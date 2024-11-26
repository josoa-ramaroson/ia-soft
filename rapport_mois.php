<?php
Require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
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
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
 <?php require 'rapport_lien.php'; ?>
  <?php
$mois=$_POST['mois'];
$annee=$_POST['annee'];  

$sql = "SELECT count(*) FROM $tbl_paiement";  

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
   $nb_affichage_par_page = 10; 
 
$sql = "SELECT SUM(paiement) AS Paie, st, date FROM $tbl_paiement where MONTH(date)=$mois and YEAR(date)=$annee  GROUP BY  st  LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC

	$sqPT="SELECT SUM(paiement) AS Paie  FROM $tbl_paiement where MONTH(date)=$mois and YEAR(date)=$annee "; 
	$RPT = mysqli_query($linki,$sqPT); 
	$AFPT = mysqli_fetch_assoc($RPT);
	$tPT=$AFPT['Paie']; 

// on ex?cute la requ?te  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki)); 

	$sqPS="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='E' and MONTH(date)=$mois and YEAR(date)=$annee "; 
	$RPS = mysqli_query($linki,$sqPS); 
	$AFPS = mysqli_fetch_assoc($RPS);
	$tPS=$AFPS['Paie']; 
	
	$sqPP="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='P' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPP = mysqli_query($linki,$sqPP); 
	$AFPP = mysqli_fetch_assoc($RPP);
	$tPPP=$AFPP['Paie'];
	
    $sqPD="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='D' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPD = mysqli_query($linki,$sqPD); 
	$AFPD = mysqli_fetch_assoc($RPD);
	$tPPD=$AFPD['Paie'];
	
	$sqPF="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='F' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPF = mysqli_query($linki,$sqPF); 
	$AFPF = mysqli_fetch_assoc($RPF);
	$tPPF=$AFPF['Paie'];
	
	
	$sqPA="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='A' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPA = mysqli_query($linki,$sqPA); 
	$AFPA = mysqli_fetch_assoc($RPA);
	$tPPA=$AFPA['Paie'];
	
	
	//$sqFS="SELECT SUM(totalttc) AS fact , SUM(ortc) AS fortc, SUM(impayee) AS fimp, SUM(Pre) AS DPre , SUM(totalnet) AS ft, st FROM $tbl_fact  where st='E' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	//$RFS = mysqli_query($linki,$sqFS); 
	//$AFFS = mysqli_fetch_assoc($RFS);
	//$tFS=$AFFS['fact']; 
	//$tFSi=$AFFS['fimp'];
	//$tFSO=$AFFS['fortc'];
	//$tFSl=$AFFS['DPre'];
	//$tFSt=$AFFS['ft'];
	
	
	
	$sqFS="SELECT SUM(cons) AS cons, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , st FROM $tv_facturation where  st='E' and  fannee='$annee'  and nserie='$mois'  ";  
	$RFS = mysqli_query($linki,$sqFS); 
	$AFFS = mysqli_fetch_assoc($RFS);
	
	$tFS=$AFFS['totalttc']; 
	$tFSi=$AFFS['impayee'];
	$tFSO=$AFFS['ortc'];
	$tFSl=$AFFS['Pre'];
	$tFSt=$AFFS['totalnet'];	
		
	
	
	$sqFP="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='P' and   MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFP = mysqli_query($linki,$sqFP); 
	$AFP = mysqli_fetch_assoc($RFP);
	$tFP=$AFP['fact']; 
	$tFPt=$AFP['ft']; 
	
	
	$sqFD="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, SUM(impayee) AS impayee, st FROM $tbl_fact   where st='D' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFD = mysqli_query($linki,$sqFD); 
	$AFD = mysqli_fetch_assoc($RFD);
	$tFD=$AFD['fact']; 
	$tFDt=$AFD['ft']; 
	$tFDi=$AFD['impayee'];
 
 
 	$sqFF="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='F' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFF = mysqli_query($linki,$sqFF); 
	$AFF = mysqli_fetch_assoc($RFF);
	$tFF=$AFF['fact']; 
	$tFFt=$AFF['ft'];
	
	
	$sqFA="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='A' and  MONTH(date)=$mois and YEAR(date)=$annee";  
	$RFA = mysqli_query($linki,$sqFA); 
	$AFA = mysqli_fetch_assoc($RFA);
	$tFA=$AFA['fact']; 
	$tFAt=$AFA['ft'];
	
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Rapport d'activité <?php echo $annee; ?>  
    
    <a href="rapport_moisimp.php?mois=<?php echo md5(microtime()).$mois;?>&annee=<?php echo md5(microtime()).$annee; ?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
    
    Representation Graphique &gt;&gt;
    <a href="stat_graph_sclient.php?&mois=<?php echo $mois;?>&annee=<?php echo $annee; ?>" target="_blank"><img src="images/graphique.jpg" width="50" height="30"></a></h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52%"><table width="100%" border="1">
              <tr>
                <td width="16%">&nbsp;</td>
                <td width="10%">FACTURE TTC</td>
                <td width="12%">ORTC</td>
                <td width="11%">IMPAYEE</td>
                <td width="10%">Droit de remise</td>
                <td width="17%">Total</td>
                <td width="11%">RECOUVRE</td>
                <td width="13%">NON RECOUVRE</td>
              </tr>
              <tr>
                <td>Facturation</td>
                <td><?php echo strrev(chunk_split(strrev($tFS),3," ")) ;?></td>
                <td><?php echo strrev(chunk_split(strrev($tFSO),3," ")) ;?></td>
                <td><?php echo strrev(chunk_split(strrev($tFSi),3," ")) ;?></td>
                <td><?php echo strrev(chunk_split(strrev($tFSl),3," ")) ;?></td>
                <td><?php $E1=$tFSt; echo strrev(chunk_split(strrev($tFSt),3," ")) ;?></td>
                <td><?php $E2=$tPS;  echo strrev(chunk_split(strrev($tPS),3," ")) ;?></td>
                <td><?php $A=$tFSt-$tPS; echo strrev(chunk_split(strrev($tFSt-$tPS),3," ")) ;?></td>
              </tr>
              <tr>
                <td>Police d'abonnement</td>
                <td><?php echo strrev(chunk_split(strrev($tFP),3," ")) ;?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?php $P1=$tFPt; echo strrev(chunk_split(strrev($tFPt),3," ")) ;?></td>
                <td><?php $P2=$tPPP; echo strrev(chunk_split(strrev($tPPP),3," ")) ;?></td>
                <td><?php $P3=$tFPt-$tPPP; echo strrev(chunk_split(strrev($P3),3," ")) ;?></td>
              </tr>
              <tr>
                <td>Branchement</td>
                <td><?php echo strrev(chunk_split(strrev($tFD),3," ")) ;?></td>
                <td>&nbsp;</td>
                <td><?php echo strrev(chunk_split(strrev($tFDi),3," ")) ;?></td>
                <td>&nbsp;</td>
                <td><?php $D1=$tFDt;   echo strrev(chunk_split(strrev($tFDt),3," ")) ;?></td>
                <td><?php $D2=$tPPD; echo strrev(chunk_split(strrev($tPPD),3," ")) ;?></td>
                <td><?php $D=$tFDt-$tPPD; echo strrev(chunk_split(strrev($D),3," ")) ;?></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF">Pénalité FRAUDE</td>
                <td bgcolor="#FFFFFF"><?php echo strrev(chunk_split(strrev($tFF),3," ")) ;?></td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF"><?php $F1=$tFFt; echo strrev(chunk_split(strrev($tFFt),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><?php $F2=$tPPF; echo strrev(chunk_split(strrev($tPPF),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><?php $F=$tFFt-$tPPF; echo strrev(chunk_split(strrev($F),3," ")) ;?></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF">Autres paiements </td>
                <td bgcolor="#FFFFFF"><?php echo strrev(chunk_split(strrev($tFA),3," ")) ;?></td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF"><?php $A1=$tFAt; echo strrev(chunk_split(strrev($tFAt),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><?php $A2=$tPPA; echo strrev(chunk_split(strrev($tPPA),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><?php $A=$tFAt-$tPPA; echo strrev(chunk_split(strrev($A),3," ")) ;?></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF">TOTAL</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF"><?php $T1=$E1+$P1+$D1+$F1+$A1; echo strrev(chunk_split(strrev($T1),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><?php $T2=$E2+$P2+$D2+$F2+$A2; echo strrev(chunk_split(strrev($T2),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><?php $T3=$T1-$T2; echo strrev(chunk_split(strrev($T3),3," ")) ;?></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF"><?php if ($T1=='0') {$t2p=0;} else { $t2p=$T2*100/$T1;} echo round($t2p, 2); ?>
                  %</td>
                <td bgcolor="#FFFFFF"><?php if($T1=='0') {$t3=0;} else {$t3=100-$t2p;} echo round($t3, 2);?>
                  %</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<p>&nbsp;</p>
<p><font size="2"><font size="2"><font size="2">
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
    <tr bgcolor="#0000FF"> 
      <td width="287" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong> Activité</strong></font></td>
      <td width="411" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Les recouvrements par mois </strong></font></td>
      <td width="248" align="center" bgcolor="#3071AA">&nbsp;</td>
      <td width="189" align="center" bgcolor="#3071AA">&nbsp;</td>
    </tr>
    <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="#FFFFFF">
      <td>        <?php $n=$data['st']; 
                  if ($n=='E') echo 'FACTURATION CYCLIQUE';
                  if ($n=='P') echo 'POLICE D ABONNEMENT'; 
                  if ($n=='D') echo 'BRANCHEMENT';
                  if ($n=='F') echo 'FRAUDE'; 
                  ?></td>
      <td align="center"><?php $P=strrev(chunk_split(strrev($data['Paie']),3," "));   echo $P;?></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <?php

}

mysqli_free_result ($req); 
  // echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  


mysqli_close ();  
?>
  </table>
  
    </div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
</tr>
<tr> 
    <td height="21"> 
      <table width="100%" border="1">
        <tr>
          <td width="25%">Total </td>
          <td align="center" width="37%"><?php echo strrev(chunk_split(strrev($tPT),3," ")) ;?></td>
          <td width="38%">&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center">
      <p>
        <?php
include_once('pied.php');
?>
    </p>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
