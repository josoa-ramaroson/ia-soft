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
 <? require 'rapport_lien.php'; ?>
  <?php
$mois=$_POST['mois'];
$annee=$_POST['annee'];  
// Connect to server and select databse.
mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");
  
$sql = "SELECT count(*) FROM $tbl_paiement";  

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
   $nb_affichage_par_page = 10; 
 
$sql = "SELECT SUM(paiement) AS Paie, st, date FROM $tbl_paiement where MONTH(date)=$mois and YEAR(date)=$annee  GROUP BY  st  LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC

	$sqPT="SELECT SUM(paiement) AS Paie  FROM $tbl_paiement where MONTH(date)=$mois and YEAR(date)=$annee "; 
	$RPT = mysql_query($sqPT); 
	$AFPT = mysql_fetch_assoc($RPT);
	$tPT=$AFPT['Paie']; 

// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 

	$sqPS="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='E' and MONTH(date)=$mois and YEAR(date)=$annee "; 
	$RPS = mysql_query($sqPS); 
	$AFPS = mysql_fetch_assoc($RPS);
	$tPS=$AFPS['Paie']; 
	
	$sqPP="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='P' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPP = mysql_query($sqPP); 
	$AFPP = mysql_fetch_assoc($RPP);
	$tPPP=$AFPP['Paie'];
	
    $sqPD="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='D' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPD = mysql_query($sqPD); 
	$AFPD = mysql_fetch_assoc($RPD);
	$tPPD=$AFPD['Paie'];
	
	$sqPF="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='F' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPF = mysql_query($sqPF); 
	$AFPF = mysql_fetch_assoc($RPF);
	$tPPF=$AFPF['Paie'];
	
	
	$sqPA="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='A' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RPA = mysql_query($sqPA); 
	$AFPA = mysql_fetch_assoc($RPA);
	$tPPA=$AFPA['Paie'];
	
	
	//$sqFS="SELECT SUM(totalttc) AS fact , SUM(ortc) AS fortc, SUM(impayee) AS fimp, SUM(Pre) AS DPre , SUM(totalnet) AS ft, st FROM $tbl_fact  where st='E' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	//$RFS = mysql_query($sqFS); 
	//$AFFS = mysql_fetch_assoc($RFS);
	//$tFS=$AFFS['fact']; 
	//$tFSi=$AFFS['fimp'];
	//$tFSO=$AFFS['fortc'];
	//$tFSl=$AFFS['DPre'];
	//$tFSt=$AFFS['ft'];
	
	
	
	$sqFS="SELECT SUM(cons) AS cons, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , st FROM $tv_facturation where  st='E' and  fannee='$annee'  and nserie='$mois'  ";  
	$RFS = mysql_query($sqFS); 
	$AFFS = mysql_fetch_assoc($RFS);
	
	$tFS=$AFFS['totalttc']; 
	$tFSi=$AFFS['impayee'];
	$tFSO=$AFFS['ortc'];
	$tFSl=$AFFS['Pre'];
	$tFSt=$AFFS['totalnet'];	
		
	
	
	$sqFP="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='P' and   MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFP = mysql_query($sqFP); 
	$AFP = mysql_fetch_assoc($RFP);
	$tFP=$AFP['fact']; 
	$tFPt=$AFP['ft']; 
	
	
	$sqFD="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, SUM(impayee) AS impayee, st FROM $tbl_fact   where st='D' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFD = mysql_query($sqFD); 
	$AFD = mysql_fetch_assoc($RFD);
	$tFD=$AFD['fact']; 
	$tFDt=$AFD['ft']; 
	$tFDi=$AFD['impayee'];
 
 
 	$sqFF="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='F' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
	$RFF = mysql_query($sqFF); 
	$AFF = mysql_fetch_assoc($RFF);
	$tFF=$AFF['fact']; 
	$tFFt=$AFF['ft'];
	
	
	$sqFA="SELECT SUM(totalttc) AS fact , SUM(totalnet) AS ft, st FROM $tbl_fact   where st='A' and  MONTH(date)=$mois and YEAR(date)=$annee";  
	$RFA = mysql_query($sqFA); 
	$AFA = mysql_fetch_assoc($RFA);
	$tFA=$AFA['fact']; 
	$tFAt=$AFA['ft'];
	
 $sqlnbclient = "SELECT count( DISTINCT id) AS Nombpaye  FROM $tbl_paiement where st='E' and  MONTH(date)=$mois and YEAR(date)=$annee"; 
 $reqnbclient=mysql_query($sqlnbclient);
 $datanombreclient= mysql_fetch_assoc($reqnbclient);
 $Nombpaye=$datanombreclient['Nombpaye'];
		
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Rapport</h3>
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
                <td width="13%">Total</td>
                <td width="13%">RECOUVRE</td>
                <td width="15%">NOMBRE CLIENT</td>
              </tr>
              <tr>
                <td>Facturation</td>
                <td><? echo strrev(chunk_split(strrev($tFS),3," ")) ;?></td>
                <td><? echo strrev(chunk_split(strrev($tFSO),3," ")) ;?></td>
                <td><? echo strrev(chunk_split(strrev($tFSi),3," ")) ;?></td>
                <td><? echo strrev(chunk_split(strrev($tFSl),3," ")) ;?></td>
                <td><? $E1=$tFSt; echo strrev(chunk_split(strrev($tFSt),3," ")) ;?></td>
                <td><? $E2=$tPS;  echo strrev(chunk_split(strrev($tPS),3," ")) ;?></td>
                <td><? echo $Nombpaye;?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<tr bgcolor="#0000FF"> 
  <td width="287" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong> Activité</strong></font></td>
      <td width="411" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Les recouvrements par mois </strong></font></td>
      <td width="248" align="center" bgcolor="#3071AA">&nbsp;</td>
      <td width="189" align="center" bgcolor="#3071AA">&nbsp;</td>
</tr>

    <?php
mysql_free_result ($req); 
  // echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  


mysql_close ();  
?>  
    </div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
</tr>
<tr> 
    <td height="21"><p><font color="#000000"></p>
      <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
        <tr bgcolor="#0000FF">
          <td width="270" align="center" bgcolor="#3071AA">&nbsp;</td>
          <td width="391" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong> Nombre des clients qui ont payé</strong></font></td>
          <td width="160" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Montant</strong></font></td>
          <td width="259" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Total ORTC RECOUVRE</strong></font></td>
        </tr>

        <tr bgcolor="#FFFFFF">
          <td>&nbsp;</td>
          <td align="center"><? echo $Nombpaye;?></td>
          <td align="center">250 KMF</td>
          <td align="center"><? $ortcmontant=250*$Nombpaye; echo strrev(chunk_split(strrev($ortcmontant),3," "));?> KMF</td>
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
