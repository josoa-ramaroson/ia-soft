<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
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
require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
 <? require 'z_rapport_lien.php'; ?>
  <?php
$mois=$_POST['mois'];
$annee=$_POST['annee'];  
$ARCH=$_POST['annee'];  
  
$sql = "SELECT count(*) FROM $dbbk.z_"."$ARCH"."_$tbl_paiement";  

$resultat = mysqli_query($linkibk,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
 
 
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
 
$sql = "SELECT SUM(paiement) AS Paie, st, date FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where MONTH(date)=$mois and YEAR(date)=$annee  GROUP BY  st  LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC

	$sqPT="SELECT SUM(paiement) AS Paie  FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where MONTH(date)=$mois and YEAR(date)=$annee "; 
	$RPT = mysqli_query($linkibk,$sqPT); 
	$AFPT = mysqli_fetch_assoc($RPT);
	$tPT=$AFPT['Paie']; 

// on ex?cute la requ?te  
$req = mysqli_query($linkibk,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error()); 

	$sqPS="SELECT SUM(paiement) AS Paie , st FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where st='E' and MONTH(date)=$mois and YEAR(date)=$annee "; 
	$RPS = mysqli_query($linkibk,$sqPS); 
	$AFPS = mysqli_fetch_assoc($RPS);
	$tPS=$AFPS['Paie']; 
	
	$sqPP="SELECT SUM(paiement) AS Paie , st FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where st='P' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPP = mysqli_query($linkibk,$sqPP); 
	$AFPP = mysqli_fetch_assoc($RPP);
	$tPPP=$AFPP['Paie'];
	
    $sqPD="SELECT SUM(paiement) AS Paie , st FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where st='D' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPD = mysqli_query($linkibk,$sqPD); 
	$AFPD = mysqli_fetch_assoc($RPD);
	$tPPD=$AFPD['Paie'];
	
	$sqPF="SELECT SUM(paiement) AS Paie , st FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where st='F' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPF = mysqli_query($linkibk,$sqPF); 
	$AFPF = mysqli_fetch_assoc($RPF);
	$tPPF=$AFPF['Paie'];
	
	
	$sqPA="SELECT SUM(paiement) AS Paie , st FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where st='A' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPA = mysqli_query($linkibk,$sqPA); 
	$AFPA = mysqli_fetch_assoc($RPA);
	$tPPA=$AFPA['Paie'];
	

	
	$sqFS="SELECT SUM(cons) AS cons, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, nserie , fannee , st FROM $dbbk.z_"."$ARCH"."_$tbl_fact where  st='E' and  fannee='$annee'  and nserie='$mois'  ";  
	$RFS = mysqli_query($linkibk,$sqFS); 
	$AFFS = mysqli_fetch_assoc($RFS);
	
	$tFS=$AFFS['totalttc']; 
	$tFSi=$AFFS['impayee'];
	$tFSO=$AFFS['ortc'];
	$tFSl=$AFFS['Pre'];
	$tFSt=$AFFS['totalnet'];	
		
	
	
	$sqFP="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $dbbk.z_"."$ARCH"."_$tbl_fact   where st='P' and   MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFP = mysqli_query($linkibk,$sqFP); 
	$AFP = mysqli_fetch_assoc($RFP);
	$tFP=$AFP['fact']; 
	$tFPt=$AFP['ft']; 
	
	
	$sqFD="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, SUM(impayee) AS impayee, st FROM $dbbk.z_"."$ARCH"."_$tbl_fact   where st='D' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFD = mysqli_query($linkibk,$sqFD); 
	$AFD = mysqli_fetch_assoc($RFD);
	$tFD=$AFD['fact']; 
	$tFDt=$AFD['ft']; 
	$tFDi=$AFD['impayee'];
 
 
 	$sqFF="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $dbbk.z_"."$ARCH"."_$tbl_fact   where st='F' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFF = mysqli_query($linkibk,$sqFF); 
	$AFF = mysqli_fetch_assoc($RFF);
	$tFF=$AFF['fact']; 
	$tFFt=$AFF['ft'];
	
	
	$sqFA="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $dbbk.z_"."$ARCH"."_$tbl_fact   where st='A' and  MONTH(date)=$mois and YEAR(date)=$annee";  
	$RFA = mysqli_query($linkibk,$sqFA); 
	$AFA = mysqli_fetch_assoc($RFA);
	$tFA=$AFA['fact']; 
	$tFAt=$AFA['ft'];
	
 $sqlnbclient = "SELECT count( DISTINCT id) AS Nombpaye  FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where st='E' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
 $reqnbclient=mysqli_query($linkibk,$sqlnbclient);
 $datanombreclient= mysqli_fetch_assoc($reqnbclient);
 $Nombpaye=$datanombreclient['Nombpaye'];
		
?>
<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Rapport d'activité <? echo $annee; ?>  
    
    <a href="z_rapport_moisimp.php?mois=<? echo md5(microtime()).$mois;?>&annee=<? echo md5(microtime()).$annee; ?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
    
    Representation Graphique &gt;&gt;
    <a href="#" target="_blank"><img src="images/graphique.jpg" width="50" height="30"></a></h3>
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
                <td><? echo strrev(chunk_split(strrev($tFS),3," ")) ;?></td>
                <td><? echo strrev(chunk_split(strrev($tFSO),3," ")) ;?></td>
                <td><? echo strrev(chunk_split(strrev($tFSi),3," ")) ;?></td>
                <td><? echo strrev(chunk_split(strrev($tFSl),3," ")) ;?></td>
                <td><? $E1=$tFSt; echo strrev(chunk_split(strrev($tFSt),3," ")) ;?></td>
                <td><? $E2=$tPS;  echo strrev(chunk_split(strrev($tPS),3," ")) ;?></td>
                <td><? $A=$tFSt-$tPS; echo strrev(chunk_split(strrev($tFSt-$tPS),3," ")) ;?></td>
              </tr>
              <tr>
                <td>Police d'abonnement</td>
                <td><? echo strrev(chunk_split(strrev($tFP),3," ")) ;?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><? $P1=$tFPt; echo strrev(chunk_split(strrev($tFPt),3," ")) ;?></td>
                <td><? $P2=$tPPP; echo strrev(chunk_split(strrev($tPPP),3," ")) ;?></td>
                <td><? $P3=$tFPt-$tPPP; echo strrev(chunk_split(strrev($P3),3," ")) ;?></td>
              </tr>
              <tr>
                <td>Branchement</td>
                <td><? echo strrev(chunk_split(strrev($tFD),3," ")) ;?></td>
                <td>&nbsp;</td>
                <td><? echo strrev(chunk_split(strrev($tFDi),3," ")) ;?></td>
                <td>&nbsp;</td>
                <td><? $D1=$tFDt;   echo strrev(chunk_split(strrev($tFDt),3," ")) ;?></td>
                <td><? $D2=$tPPD; echo strrev(chunk_split(strrev($tPPD),3," ")) ;?></td>
                <td><? $D=$tFDt-$tPPD; echo strrev(chunk_split(strrev($D),3," ")) ;?></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF">Pénalité FRAUDE</td>
                <td bgcolor="#FFFFFF"><? echo strrev(chunk_split(strrev($tFF),3," ")) ;?></td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF"><? $F1=$tFFt; echo strrev(chunk_split(strrev($tFFt),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><? $F2=$tPPF; echo strrev(chunk_split(strrev($tPPF),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><? $F=$tFFt-$tPPF; echo strrev(chunk_split(strrev($F),3," ")) ;?></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF">Autres paiements </td>
                <td bgcolor="#FFFFFF"><? echo strrev(chunk_split(strrev($tFA),3," ")) ;?></td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF"><? $A1=$tFAt; echo strrev(chunk_split(strrev($tFAt),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><? $A2=$tPPA; echo strrev(chunk_split(strrev($tPPA),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><? $A=$tFAt-$tPPA; echo strrev(chunk_split(strrev($A),3," ")) ;?></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF">TOTAL</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF"><? $T1=$E1+$P1+$D1+$F1+$A1; echo strrev(chunk_split(strrev($T1),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><? $T2=$E2+$P2+$D2+$F2+$A2; echo strrev(chunk_split(strrev($T2),3," ")) ;?></td>
                <td bgcolor="#FFFFFF"><? $T3=$T1-$T2; echo strrev(chunk_split(strrev($T3),3," ")) ;?></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF"><? if ($T1=='0') {$t2p=0;} else { $t2p=$T2*100/$T1;} echo round($t2p, 2); ?>
                  %</td>
                <td bgcolor="#FFFFFF"><? if($T1=='0') {$t3=0;} else {$t3=100-$t2p;} echo round($t3, 2);?>
                  %</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
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
      <td>        <? $n=$data['st']; 
                  if ($n=='E') echo 'FACTURATION CYCLIQUE';
                  if ($n=='P') echo 'POLICE D ABONNEMENT'; 
                  if ($n=='D') echo 'BRANCHEMENT';
                  if ($n=='F') echo 'FRAUDE'; 
                  ?></td>
      <td align="center"><? $P=strrev(chunk_split(strrev($data['Paie']),3," "));   echo $P;?></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <?php

}

mysqli_free_result ($req); 
  // echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  


mysqli_close ($linkibk);  
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
          <td align="center" width="37%"><? echo strrev(chunk_split(strrev($tPT),3," ")) ;?></td>
          <td width="38%">&nbsp;</td>
        </tr>
      </table>
      <p><font color="#000000"></p>
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
