<?
require 'session.php';
require 'fonction.php';
$nserie1=substr($_REQUEST["ns"],32);
$annee1rp=substr($_REQUEST["an"],32);
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
//Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
<body>
 <p>
   <?php

require 'configuration.php';
$sql = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.refcommune , f.nserie , f.fannee , f.id , f.st FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') GROUP BY f.refcommune ";  
$req=mysql_query($sql);

?>
 </p>
 <p>&nbsp; </p>
<H2> <p align="center" >  RECAPITULATIF RECOUVREMENT PAR SECTEUR  <? echo $nserie1.'/'.$annee1rp;?></p> </H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
    <td width="15%" align="center"><strong><font color="#FFFFFF" size="4">SECTEUR</font></strong></td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Nb client </strong></font></td>
    <td width="9%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>TT NET</strong></font></td>
    <td width="9%" align="center"><font color="#FFFFFF"><strong>A RECOUVRER</strong></font></td>
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
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['totalttc'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['ortc'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['impayee'];?></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['Pre'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['totalnet'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['report'];?></em></td>
   </tr>
   <?php
}  

?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  <?php

$sql2 = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') GROUP BY f.RefLocalite";
 
$req2=mysql_query($sql2);
?>
</p>
<H2>
  <p align="center" > RECAPITULATIF RECOUVREMENT PAR VILLE  <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="15%" align="center" bgcolor="#FF00FF"><strong><font color="#FFFFFF" size="4">Ville</font></strong></td>
    <td width="9%" align="center" bgcolor="#FF00FF"><font color="#FFFFFF" size="3"><strong>Nb client </strong></font></td>
    <td width="9%" align="center" bgcolor="#FF00FF"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="10%" align="center" bgcolor="#FF00FF"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="10%" align="center" bgcolor="#FF00FF"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="10%" align="center" bgcolor="#FF00FF"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="10%" align="center" bgcolor="#FF00FF"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
    <td width="9%" align="center" bgcolor="#FF00FF"><font color="#FFFFFF"><strong>A RECOUVRER</strong></font></td>
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
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  <?php
$sql33i = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') and f.Tarif=3";
 
$req33i=mysql_query($sql33i);
?>
</p>
<H2>
  <p align="center" >   TOTAL A RECOUVRER DES MOSQUEES  <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
    <td width="10%" align="center" bgcolor="#CC0000">&nbsp;</td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF" size="3"><strong>Nbre </strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="9%" align="center" bgcolor="#CC0000"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>A RECOUVRER</strong></font></td>
  </tr>
  <?php
while($data33i=mysql_fetch_array($req33i)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data33i['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php
$sql33A = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') and (f.Tarif=6 OR f.Tarif=7 or f.Tarif=8  or f.Tarif=9 or f.Tarif=11)";   
$req33A=mysql_query($sql33A);
?>
</p>
<H2>
  <p align="center" >   TOTAL A RECOUVRER DES AGENTS &amp; RETRAITES <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
    <td width="10%" align="center" bgcolor="#CC0000">&nbsp;</td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF" size="3"><strong>Nbre </strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="9%" align="center" bgcolor="#CC0000"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>A RECOUVRER</strong></font></td>
  </tr>
  <?php
while($data33A=mysql_fetch_array($req33A)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data33A['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php
$sql33T = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') and (f.Tarif=1 or f.Tarif=5 or f.Tarif=12)";   
$req33T=mysql_query($sql33T);
?>
</p>
<H2>
  <p align="center" > TOTAL DES TRIPHASES <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
    <td width="10%" align="center" bgcolor="#CC0000">&nbsp;</td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF" size="3"><strong>Nbre </strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="9%" align="center" bgcolor="#CC0000"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>A RECOUVRER</strong></font></td>
  </tr>
  <?php
while($data33T=mysql_fetch_array($req33T)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data33T['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p></p>
<p>
  <?php
$sql33B = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') and ( f.Tarif=2 or f.Tarif=4)";   
$req33B=mysql_query($sql33B);
?>
</p>
<H2>
  <p align="center" > TOTAL A RECOUVRER DES BASES TENSION - MONOPHASE <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
    <td width="10%" align="center" bgcolor="#CC0000">&nbsp;</td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF" size="3"><strong>Nbre </strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="9%" align="center" bgcolor="#CC0000"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>A RECOUVRER</strong></font></td>
  </tr>
  <?php
while($data33B=mysql_fetch_array($req33B)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data33B['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php
$sql33M = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') and f.Tarif=10";   
$req33M=mysql_query($sql33M);
?>
</p>
<H2>
  <p align="center" > TOTAL A RECOUVRER DES MOYENS TENSION <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
    <td width="10%" align="center" bgcolor="#CC0000">&nbsp;</td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF" size="3"><strong>Nbre </strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="9%" align="center" bgcolor="#CC0000"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
    <td width="9%" align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>A RECOUVRER</strong></font></td>
  </tr>
  <?php
while($data33M=mysql_fetch_array($req33M)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data33M['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php

$sql3 = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp')";  
$req3=mysql_query($sql3);
?>
</p>
<H2>
  <p align="center" >  MONTANT TOTAL A RECOUVRER   <? echo $nserie1.'/'.$annee1rp; ?></p>
  <p align="center" >&nbsp;</p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="9%" align="center">&nbsp;</td>
    <td width="8%" align="center"><font color="#FFFFFF" size="3"><strong>Nb client </strong></font></td>
    <td width="15%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="13%" align="center"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="12%" align="center"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="13%" align="center"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="16%" align="center"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
    <td width="14%" align="center"><font color="#FFFFFF"><strong>A RECOUVRER</strong></font></td>
  </tr>
  <?php
while($data3=mysql_fetch_array($req3)){ // Start looping table row 
?>
  <tr>
    <td height="43"  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data3['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>
  <?php

$sql33 = "SELECT COUNT(*) AS nbres, SUM(cons1) AS cons1, SUM(cons2) AS cons2, SUM(cons) AS cons, SUM(mont1) AS mont1,SUM(mont2) AS mont2,SUM(puisct) AS puisct, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , Tarif, st FROM $tv_facturation where  fannee='$annee1rp'  and nserie='$nserie1' ";   
$req33=mysql_query($sql33);
?>
</p>
<H2>
  <p align="center" >&nbsp;</p>
</H2>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="21"><?php
include_once('pied.php');
?></td>
  </tr>
</table>
<p></p>
</body>
</html>