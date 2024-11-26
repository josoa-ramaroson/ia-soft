<?php
Require 'session.php';
require 'fonction.php';
?>

<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
//Require 'bienvenue.php';    // on appelle la page contenant la fonction
require 'rh_configuration_fonction.php';

$iddirection=addslashes($_REQUEST['direction']);
$idservice=addslashes($_REQUEST['subcat']);

$sql1 = "SELECT * FROM $tb_rhservice where idser=$idservice";
$result1 = mysqli_query($linki,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
$service=$row1['service'];
}  

$sql2 = "SELECT * FROM $tb_rhdirection where idrh=$iddirection";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$direction=$row2['direction'];
} 
    $m1d=$direction;
	$m2s=$service;

    //$m1v=addslashes($_REQUEST['m1v']);
	//$m2q=addslashes($_REQUEST['m2q']);
?>
<body>
<p>
<?php
$sql = "SELECT * FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie' and direction='$m1d' and  service='$m2s' ORDER BY matricule ASC ";  //DESC
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
 <?php
$sql2="SELECT SUM(sbase) AS sbase , SUM(SS) AS SS , SUM(SI) AS SI, SUM(SD) AS SD, SUM(SR) AS SR, SUM(SNET) AS SNET, moispaie ,anneepaie , direction, service,  SUM(igr) AS igr ,  SUM(retraite) AS retraite   FROM $tb_rhpaie   where anneepaie='$anneepaie' and moispaie='$moispaie' and direction='$m1d' and  service='$m2s'"; 



$resultat2 = mysqli_query($linki,$sql2);	
$data2=mysqli_fetch_array($resultat2)
?>
</p>
  <p align="center"><em>RECAPITULATIF POUR DIRECTION  </em> - <em><?php echo  $m1d.' SERVICE '.$m2s ;?></em> - <span class="panel-title"><?php echo $affichemois.' '.$anneepaie ; ?></span></p>
  <p>&nbsp;</p>
  <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#3071AA">
      <td width="6%" align="center">&nbsp;</td>
      <td width="16%" align="center">&nbsp;</td>
      <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>Direction </strong></font></td>
      <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Service </strong></font></td>
      <td width="10%" align="center"><strong><font color="#FFFFFF" size="3">Total brut</font></strong></td>
      <td width="12%" align="center"><font color="#FFFFFF"><strong>T Indemnites</strong></font></td>
      <td width="13%" align="center"><font color="#FFFFFF"><strong>T Reductions</strong></font></td>
      <td width="11%" align="center"><font color="#FFFFFF"><strong>T. Retenues</strong></font></td>
      <td width="11%" align="center"><font color="#FFFFFF"><strong>NET A PAYER </strong></font></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF">TOTAL </td>
      <td align="center">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?php echo $data2['direction'];?></font></td>
      <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?php echo $data2['service'];?></font></td>
      <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data2['SS']),3," ")); ?></em></td>
      <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data2['SI']),3," "));?></em></td>
      <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data2['SD']),3," "));?></em></td>
      <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data2['SR']),3," "));?></em></td>
      <td align="center" bgcolor="#FFFFFF"><em><?php echo strrev(chunk_split(strrev($data2['SNET']),3," "));?><em></td>
    </tr>

  </table>
  <p align="center">&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="6%" align="center"><font color="#FFFFFF">Matricule</font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="4"><strong>Nom de l'employé</strong></font></td>
     <td width="13%" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Direction </strong></font></td>
     <td width="8%" align="center"><font color="#FFFFFF" size="3"><strong>Service </strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>T SBASE  </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>T INDEMNITES </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>T DEDUCTIONS</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>T RETENUES</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>SALAIRE NET</strong></font></td>
   </tr>
   <?php
while($datafact=mysqli_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="#FFFFFF">
     <td align="center"><font color="#000000">
     
	 <?php echo $datafact['matricule'];?>
     
	 </font></td>
     <td ><font color="#000000"><?php echo $datafact['nomprenom'];?></font></td>
     <td align="center" ><font color="#000000"><?php echo $datafact['direction'];?></font></td>
     <td align="center" ><font color="#000000"><?php echo $datafact['service'];?></font></td>
     <td align="center" ><em><font color="#000000"><?php echo $datafact['SS'];?></font></em></td>
     <td align="center" ><font color="#000000"><?php echo $datafact['SI'];?></font></td>
     <td align="center" ><font color="#000000"><?php echo $datafact['SD'];?></font></td>
     <td align="center" ><font color="#000000"><?php echo $datafact['SR'];?></font></td>
     <td align="center" ><?php echo $datafact['SNET'];?></td>
   </tr>
   <?php
}

mysqli_close ();  
				  function gettatut($fetat){
				  if ($fetat<=1000000 && $fetat>=500000)         { echo $couleur="#ffc88d";}//orange 
				  if ($fetat>=1000000)                          { echo $couleur="#ec9b9b";}//rouge -Declined
				  }
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>