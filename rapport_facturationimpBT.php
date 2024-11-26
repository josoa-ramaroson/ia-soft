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
<body>
 <?php

require 'configuration.php';
$sql = "SELECT SUM(cons) AS cons, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, refcommune , nserie , fannee , Tarif , st FROM $tv_facturation where fannee='$annee'  and nserie='$nserie' and Tarif!=10 and st='E' GROUP BY refcommune ";  
$req=mysqli_query($linki,$sql);
?>
<H2> <p align="center" >  RECAPITULATIF FACTURATION BT PAR SECTEUR  <?php echo $nserie.'/'.$anneec; ?></p> </H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="15%" align="center"><strong><font color="#FFFFFF" size="4">SECTEUR</font></strong></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant THT</strong></font></td>
     <td width="11%" align="center"><strong><font color="#FFFFFF">TCA</font></strong></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
     <td width="10%" align="center"><strong><font color="#FFFFFF">ORTC</font></strong></td>
     <td width="11%" align="center"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
  </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td  bgcolor="#FFFFFF"><em><?php $RefCommune=$data['refcommune'];
	 
	 $sql3 = "SELECT * FROM commune where ref_com=$RefCommune";
$result3 = mysqli_query($linki,$sql3);
while ($row3 = mysqli_fetch_assoc($result3)) {
echo $secteur=$row3['commune'];
}
	 
	 ?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['cons'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['totalht'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['tax'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['totalttc'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><?php echo $data['impayee'];?></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['ortc'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['Pre'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['totalnet'];?></em></td>
   </tr>
   <?php
}  

?>
</table>
<p>&nbsp;</p>
<p>
  <?php

$sql2 = "SELECT SUM(cons) AS cons, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , Tarif , st FROM $tv_facturation where fannee='$annee'  and nserie='$nserie' and Tarif!=10 and st='E' GROUP BY RefLocalite ";  
$req2=mysqli_query($linki,$sql2);
?>
</p>
<H2>
  <p align="center" > RECAPITULATIF FACTURATION BT PAR VILLE  <?php echo $nserie.'/'.$anneec; ?> </p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="15%" align="center"><strong><font color="#FFFFFF" size="4">SECTEUR</font></strong></td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant THT</strong></font></td>
    <td width="11%" align="center"><strong><font color="#FFFFFF">TCA</font></strong></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="12%" align="center"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="11%" align="center"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
  </tr>
  <?php
while($data2=mysqli_fetch_array($req2)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><em>
      <?php $RefLocalite=$data2['RefLocalite'];
	 
	 $sql32 = "SELECT * FROM ville where refville=$RefLocalite";
$result32 = mysqli_query($linki,$sql32);
while ($row32 = mysqli_fetch_assoc($result32)) {
echo $ville=$row32['ville'];
}
	 
	 ?>
    </em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data2['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data2['totalnet'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>
  <?php

$sql3 = "SELECT SUM(cons) AS cons, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , Tarif, st FROM $tv_facturation where fannee='$anneec'  and nserie='$nserie'  and Tarif!=10 and st='E'";  
$req3=mysqli_query($linki,$sql3);
?>
</p>
<H2>
  <p align="center" > FACTURATION BT TOTAL <?php echo $nserie.'/'.$anneec; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="15%" align="center">&nbsp;</td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant THT</strong></font></td>
    <td width="11%" align="center"><strong><font color="#FFFFFF">TCA</font></strong></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="12%" align="center"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="11%" align="center"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
  </tr>
  <?php
while($data3=mysqli_fetch_array($req3)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data3['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['totalnet'];?></em></td>
  </tr>
  <?php
}  

 mysqli_close($linki);;  
?>
</table>
</body>
</html>