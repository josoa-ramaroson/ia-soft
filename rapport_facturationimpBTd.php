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
 <?php 

require 'configuration.php';
$sql = "SELECT  COUNT(*) AS nbres, SUM(cons1) AS cons1, SUM(cons2) AS cons2, SUM(cons) AS cons, SUM(mont1) AS mont1,SUM(mont2) AS mont2,SUM(puisct) AS puisct, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, refcommune , nserie , fannee , Tarif , st FROM $tv_facturation where fannee='$annee'  and nserie='$nserie' and Tarif!=10 and st='E' GROUP BY refcommune ";  
$req=mysql_query($sql);
?>
<H2> <p align="center" >  RECAPITULATIF FACTURATION DETAILLE BT PAR SECTEUR  <? echo $nserie.'/'.$anneec; ?></p> </H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="10%" align="center"><strong><font color="#FFFFFF" size="4">SECTEUR</font></strong></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Nbre </strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS </strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS 1</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS 2</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>MT 1</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>MT 2</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Puis Sct</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant THT</strong></font></td>
     <td width="9%" align="center"><strong><font color="#FFFFFF">TCA</font></strong></td>
     <td width="15%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td  bgcolor="#FFFFFF"><em><? $RefCommune=$data['refcommune'];
	 
	 $sql3 = "SELECT * FROM commune where ref_com=$RefCommune";
$result3 = mysql_query($sql3);
while ($row3 = mysql_fetch_assoc($result3)) {
echo $secteur=$row3['commune'];
}
	 
	 ?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nbres'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['cons'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['cons1'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['cons2'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['mont1'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['mont2'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['puisct'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['totalht'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['tax'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['totalttc'];?></em></td>
   </tr>
   <?php
}  

?>
</table>
<p>&nbsp;</p>
<p>
  <?php

$sql2 = "SELECT  COUNT(*) AS nbres, SUM(cons1) AS cons1, SUM(cons2) AS cons2, SUM(cons) AS cons, SUM(mont1) AS mont1,SUM(mont2) AS mont2,SUM(puisct) AS puisct, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , Tarif , st FROM $tv_facturation where fannee='$annee'  and nserie='$nserie' and Tarif!=10 and st='E' GROUP BY RefLocalite ";  
$req2=mysql_query($sql2);
?>
</p>
<H2>
  <p align="center" > RECAPITULATIF FACTURATION DETAILLEBT PAR VILLE  <? echo $nserie.'/'.$anneec; ?> </p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
     <td width="10%" align="center"><strong><font color="#FFFFFF" size="4">VILLE</font></strong></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Nbre </strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS </strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS 1</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS 2</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>MT 1</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>MT 2</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Puis Sct</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant THT</strong></font></td>
     <td width="9%" align="center"><strong><font color="#FFFFFF">TCA</font></strong></td>
    <td width="15%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
  </tr>
  <?php
while($data2=mysql_fetch_array($req2)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><em>
      <? $RefLocalite=$data2['RefLocalite'];
	 
	 $sql32 = "SELECT * FROM ville where refville=$RefLocalite";
$result32 = mysql_query($sql32);
while ($row32 = mysql_fetch_assoc($result32)) {
echo $ville=$row32['ville'];
}
	 
	 ?>
    </em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['cons'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['cons1'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['cons2'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['mont1'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['mont2'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['totalttc'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>
  <?php

$sql3 = "SELECT COUNT(*) AS nbres, SUM(cons1) AS cons1, SUM(cons2) AS cons2, SUM(cons) AS cons, SUM(mont1) AS mont1,SUM(mont2) AS mont2,SUM(puisct) AS puisct, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , Tarif, st FROM $tv_facturation where fannee='$anneec'  and nserie='$nserie'  and Tarif!=10 and st='E'";  
$req3=mysql_query($sql3);
?>
</p>
<H2>
  <p align="center" > FACTURATION DETAILLE BT TOTAL <? echo $nserie.'/'.$anneec; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="10%" align="center">&nbsp;</td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Nbre </strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS </strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS 1</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS 2</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>MT 1</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>MT 2</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Puis Sct</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant THT</strong></font></td>
     <td width="9%" align="center"><strong><font color="#FFFFFF">TCA</font></strong></td>
    <td width="20%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
  </tr>
  <?php
while($data3=mysql_fetch_array($req3)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
<td align="center" bgcolor="#FFFFFF"><em><? echo $data3['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['cons'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['cons1'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['cons2'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['mont1'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['mont2'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['totalttc'];?></em></td>
  </tr>
  <?php
}  
mysql_close ();  
?>
</table>
</body>
</html>