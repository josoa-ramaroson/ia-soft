    <?
	require 'fonction.php';
	function compt_bilpassif($Compte,$annee,$tb_ecriture){
	$sql = "SELECT SUM(TTC) AS TTC FROM $tb_ecriture where  Compte=$Compte and  YEAR(Date)=$annee and   mo='D' ";
    //$sql = "SELECT SUM(TTC) AS TTC FROM $tb_ecriture where  Compte=$Compte and  YEAR(Date)=$annee and Type='D' and  mo='D' ";
	$resultat = mysql_query($sql) or exit(mysql_error()); 
	$nqt = mysql_fetch_assoc($resultat);

	if((!isset($nqt['TTC'])|| empty($nqt['TTC']))) { $qt=0; return $qt;}
	else {$qt=$nqt['TTC']; return $qt;}

	}	
	?>
    
    
    <?
	//$annee=$_REQUEST['annee'];
	//$anneecomptable='2015';

//CAPITAUX PROPRES ET RESSOURCES ASSIMILÉES

//CAPITAL
$p101=compt_bilpassif(101,$annee,$tb_ecriture);  
$p102=compt_bilpassif(102,$annee,$tb_ecriture);
$p103=compt_bilpassif(103,$annee,$tb_ecriture);
$p104=compt_bilpassif(104,$annee,$tb_ecriture); $ps1=$p101+$p102+$p103+$p104;

//Actionnaires, capital souscrit non appelé
$p109=compt_bilpassif(109,$annee,$tb_ecriture);  $ps2=$p109;

//PRIMES ET RÉSERVES

//Primes d’émission, d’apport, de fusion
$p105=compt_bilpassif(105,$annee,$tb_ecriture);  $ps3=$p105;
//Ecarts de réévaluation
$p106=compt_bilpassif(106,$annee,$tb_ecriture);  $ps4=$p106;

//Réserves indisponibles
$p111=compt_bilpassif(111,$annee,$tb_ecriture);
$p112=compt_bilpassif(112,$annee,$tb_ecriture);
$p113=compt_bilpassif(113,$annee,$tb_ecriture);  $ps5=$p111+$p112+$p113;

//Réserves libres
$p118=compt_bilpassif(118,$annee,$tb_ecriture);  $ps6=$p118;
//Report à nouveau
$p12=compt_bilpassif(12,$annee,$tb_ecriture);    $ps7=$p12;
//RÉSULTAT NET DE L’EXERCICE
$p13=compt_bilpassif(13,$annee,$tb_ecriture);    $ps8=$p13;
//AUTRES CAPITAUX PROPRES

//Subventions d’investissement
$p14=compt_bilpassif(14,$annee,$tb_ecriture);   $ps9=$p14;
//Provisions réglementées et fonds assimilés
$p15=compt_bilpassif(15,$annee,$tb_ecriture);   $ps10=$p15;

//DETTES FINANCIÈRES ET RESSOURCES ASSIMILÉES

//Emprunts
$p161=compt_bilpassif(161,$annee,$tb_ecriture);
$p162=compt_bilpassif(162,$annee,$tb_ecriture);
$p1661=compt_bilpassif(1661,$annee,$tb_ecriture);
$p1662=compt_bilpassif(1662,$annee,$tb_ecriture);   $ps11=$p161+$p162+$p1661+$p1662;

//Dettes de crédit-bail et contrats assimilés
$p17=compt_bilpassif(17,$annee,$tb_ecriture);       $ps12=$p17;
//Dettes financières diverses
$p163=compt_bilpassif(163,$annee,$tb_ecriture);
$p164=compt_bilpassif(164,$annee,$tb_ecriture);
$p165=compt_bilpassif(165,$annee,$tb_ecriture);
$p166=compt_bilpassif(166,$annee,$tb_ecriture);
$p167=compt_bilpassif(167,$annee,$tb_ecriture);
$p168=compt_bilpassif(168,$annee,$tb_ecriture);
$p181=compt_bilpassif(181,$annee,$tb_ecriture);
$p182=compt_bilpassif(182,$annee,$tb_ecriture);
$p183=compt_bilpassif(183,$annee,$tb_ecriture);
$p184=compt_bilpassif(184,$annee,$tb_ecriture);    $ps13=$p163+$p164+$p165+$p166+$p167+$p168+$p181+$p182+$p183+$p184;

//Provisions financières pour risques et charges
$p19=compt_bilpassif(19,$annee,$tb_ecriture);      $ps14=$p19;

//PASSIF CIRCULANT

//Dettes circulantes HAO et ressources assimilées

$p481=compt_bilpassif(481,$annee,$tb_ecriture);
$p482=compt_bilpassif(482,$annee,$tb_ecriture);
$p483=compt_bilpassif(483,$annee,$tb_ecriture);
$p484=compt_bilpassif(484,$annee,$tb_ecriture);
$p4998=compt_bilpassif(4998,$annee,$tb_ecriture);  $ps15=$p481+$p482+$p483+$p484+$p4998;

//Clients, avances reçues
$p419=compt_bilpassif(419,$annee,$tb_ecriture);    $ps16=$p419;

//Fournisseurs d'exploitation
$p401=compt_bilpassif(401,$annee,$tb_ecriture);
$p402=compt_bilpassif(402,$annee,$tb_ecriture);
$p408=compt_bilpassif(408,$annee,$tb_ecriture);   $ps17=$p401+$p402+$p408;

//Dettes fiscales

$p441=compt_bilpassif(441,$annee,$tb_ecriture);
$p442=compt_bilpassif(442,$annee,$tb_ecriture);
$p443=compt_bilpassif(443,$annee,$tb_ecriture);
$p4441=compt_bilpassif(4441,$annee,$tb_ecriture);
$p446=compt_bilpassif(446,$annee,$tb_ecriture);
$p447=compt_bilpassif(447,$annee,$tb_ecriture);
$p4486=compt_bilpassif(4486,$annee,$tb_ecriture);
$p4499=compt_bilpassif(4499,$annee,$tb_ecriture);  $ps18=$p441+$p442+$p443+$p4441+$p446+$p447+$p4486+$p4499;


//Dettes sociales
$p42=compt_bilpassif(42,$annee,$tb_ecriture);
$p43=compt_bilpassif(43,$annee,$tb_ecriture);    $ps19=$p42+$p43;

//Autres dettes

$p185=compt_bilpassif(185,$annee,$tb_ecriture);
$p4712=compt_bilpassif(4712,$annee,$tb_ecriture);
$p472=compt_bilpassif(472,$annee,$tb_ecriture);
$p477=compt_bilpassif(477,$annee,$tb_ecriture);    $ps20=$p185+$p4712+$p472+$p477;

//Risques provisionnés

$p499=compt_bilpassif(499,$annee,$tb_ecriture);
$p599=compt_bilpassif(599,$annee,$tb_ecriture);   $ps21=$p499+$p599;

//TRÉSORERIE - PASSIF

//Banques, crédits d’escompte
$p564=compt_bilpassif(564,$annee,$tb_ecriture);
$p565=compt_bilpassif(565,$annee,$tb_ecriture);   $ps22=$p564+$p565;

//Banques, crédits de trésorerie

$p561=compt_bilpassif(561,$annee,$tb_ecriture);
$p566=compt_bilpassif(566,$annee,$tb_ecriture);  $ps23=$p561+$p566;

//Banques, découverts
$p52=compt_bilpassif(52,$annee,$tb_ecriture);    $ps24=$p52;
//Écarts de conversion - Passif
$p479=compt_bilpassif(479,$annee,$tb_ecriture);   $ps25=$p479;



?>
