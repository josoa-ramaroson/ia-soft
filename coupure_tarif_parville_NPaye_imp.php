<?php
Require 'session.php';
require 'fonction.php';
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EDA</title>
</head>
<body>
   <?php
     $m1v=substr($_REQUEST["m1v"],32);
	$tarif=substr($_REQUEST["tr"],32); 
	
	function la_tarification($tarif,$linki){
	$sqld2 = "SELECT * FROM tarif  where idt='$tarif'";
	$resultatd2 = mysqli_query($linki,$sqld2); 
	$nqtd2 = mysqli_fetch_assoc($resultatd2);
	if((!isset($nqtd2['Libelle'])|| empty($nqtd2['Libelle']))) { $qt2=''; return $qt2;}
	else {$qt2=$nqtd2['Libelle']; return $qt2;}
	}
	
require 'configuration.php';

$anneec=$annee_recouvrement;

$sql = "SELECT * FROM $tbl_fact f, $tbl_contact c  where f.fannee='$anneec' and f.st='E' and nserie='$cserie' and c.id=f.id and c.ville='$m1v' and  f.totalnet > 1000 and  Tarif='$tarif' and idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$anneec') ORDER BY  c.quartier ASC  ";  
$req=mysqli_query($linki,$sql);


$sqFP="SELECT  COUNT(*) AS nbres, SUM(f.totalnet) AS totalnet , SUM(f.totalttc) AS totalttc, SUM(f.impayee) AS impayee, f.fannee ,SUM(f.ortc) AS ortc, f.st , f.nserie, c.ville, c.quartier FROM $tbl_fact f, $tbl_contact c  where f.fannee='$anneec' and f.st='E' and nserie='$cserie' and c.id=f.id and c.ville='$m1v' and  f.totalnet > 1000 and  Tarif='$tarif'  and idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$anneec')"; 
	$RFP = mysqli_query($linki,$sqFP); 
	$AFP = mysqli_fetch_assoc($RFP);
	$tFP=$AFP['totalttc'];
	$tFPt=$AFP['totalnet']; 
	$tFPn=$AFP['nbres'];
	$tFPi=$AFP['impayee'];
	$tFPo=$AFP['ortc'];
	
?>
 <H2> <p align="center" >  LISTE DES COUPURES </p>  <?php echo la_tarification($tarif,$linki)?> </H2>
<table width="100%" border="0">
   <tr>
     <td width="15%">VILLE</td>
     <td width="14%">&nbsp;</td>
     <td width="14%">Nombre des clients</td>
     <td width="12%">Somme TTC</td>
     <td width="12%">ORTC</td>
     <td width="14%">Somme Impayée</td>
     <td width="19%">Somme Total Net</td>
   </tr>
   <tr>
     <td><em><?php echo  $m1v;?></em></td>
     <td>&nbsp;</td>
     <td><em><?php echo strrev(chunk_split(strrev($tFPn),3," "));?></em></td>
     <td><em><?php echo strrev(chunk_split(strrev($tFP),3," "));?></em></td>
     <td><em><?php echo strrev(chunk_split(strrev($tFPo),3," "));?></em></td>
     <td><em><?php echo strrev(chunk_split(strrev($tFPi),3," "));?></em></td>
     <td><em><?php echo strrev(chunk_split(strrev($tFPt),3," "));?></em></td>
   </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="9%" align="center"><font color="#FFFFFF" size="4"><strong>ID</strong></font></td>
     <td width="19%" align="center"><font color="#FFFFFF" size="3"><strong>Nom du client</strong></font></td>
     <td width="14%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>ORTC</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Impayee</strong></font></td>
     <td width="14%" align="center"><font color="#FFFFFF"><strong>Total net</strong></font></td>
     <td width="21%" align="center"><font color="#FFFFFF"><strong>Observation</strong></font></td>
  </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="<?php gettatut($data['bstatut']); ?>">
     <td  bgcolor="#FFFFFF"><em><?php echo $data['id'];?></em></td>
     <td  bgcolor="#FFFFFF"><em><?php echo $data['nomprenom'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['totalttc'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['ortc'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['impayee'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['totalnet'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><?php echo $data['quartier'];?></td>
   </tr>
   <?php
}  

		  function gettatut($fetat){
				  if ($fetat=='remise')         { echo $couleur="#fdff00";}//jaune	
				  if ($fetat=='couper')         { echo $couleur="#ec9b9b";}//rouge -Declined
				  if ($fetat=='retard')         { echo $couleur="#ffc88d";}//orange 			 
				 //if ($fetat=='enregistre')    { echo $couleur="#87e385";}//jaune	
				 //if ($fetat=='confirme')      { echo $couleur="#87e385";}//vert fonce
				 //if ($fetat=='transfert')     { echo $couleur="#fdff00";}//jaune
				// if ($fetat=='réservation')   { echo $couleur="#ffc88d";}//orange 
				// if ($fetat=='Annuler')       { echo $couleur="#ec9b9b";}//orange
				  }
				 
mysqli_close ($linki);  
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
