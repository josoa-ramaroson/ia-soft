<?
require 'session.php';
require 'fonction.php';
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<body>
 <p>
   <?php
    
	$m1v=substr($_REQUEST["m1v"],32);
	$m2q=substr($_REQUEST["m2q"],32);
	
require 'configuration.php';

$anneec=$annee_recouvrement;

$sql = "SELECT * FROM $tbl_fact f, $tbl_contact c  where f.fannee='$anneec' and f.st='E' and nserie='$cserie' and c.id=f.id and c.ville='$m1v' and  c.quartier='$m2q' and  f.report > 1000 ORDER BY f.id ASC  ";  
$req=mysql_query($sql);


$sqFP="SELECT  COUNT(*) AS nbres, SUM(f.totalnet) AS totalnet , SUM(f.totalttc) AS totalttc, SUM(f.impayee) AS impayee, SUM(f.report) AS report, f.fannee , f.st , f.nserie, c.ville, c.quartier   FROM $tbl_fact f, $tbl_contact c  where f.fannee='$anneec' and f.st='E' and nserie='$cserie' and c.id=f.id and c.ville='$m1v' and  c.quartier='$m2q' and  f.report > 1000 ORDER BY f.id ASC"; 
	$RFP = mysql_query($sqFP); 
	$AFP = mysql_fetch_assoc($RFP);
	$tFPn=$AFP['nbres'];
	$tFPr=$AFP['report'];
	
?>
LISTE DES COUPURES AVEC REPORT : </p>
 <table width="100%" border="0">
   <tr>
     <td width="18%">VILLE</td>
     <td width="19%">Quartier</td>
     <td width="20%">Nombre des clients</td>
     <td width="16%">Somme Report </td>
   </tr>
   <tr>
     <td><em><? echo  $m1v;?></em></td>
     <td><em><? echo $m2q;?></em></td>
     <td><em><? echo strrev(chunk_split(strrev($tFPn),3," "));?></em></td>
     <td><em><? echo strrev(chunk_split(strrev($tFPr),3," "));?></em></td>
   </tr>
 </table>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="11%" align="center"><font color="#FFFFFF" size="4"><strong>ID_Client</strong></font></td>
     <td width="37%" align="center"><font color="#FFFFFF" size="3"><strong>Nom du client</strong></font></td>
     <td width="14%" align="center"><font color="#FFFFFF"><strong>Total net</strong></font></td>
     <td width="14%" align="center"><font color="#FFFFFF"><strong>Report</strong></font></td>
     <td width="24%" align="center"><font color="#FFFFFF"><strong>Observation</strong></font></td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['id'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?  $client=substr($data['nomprenom'],0,20); echo $client;?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['totalnet'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['report'];?></em></td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
   </tr>
   <?php
}  
mysql_close ();  
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>