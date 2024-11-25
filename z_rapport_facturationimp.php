<?
require 'session.php';
require 'fonction.php';
$nserie1=substr($_REQUEST["ns"],32);
$annee1rp=substr($_REQUEST["an"],32);
$ARCH=$annee1rp;
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
$sql = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, c.refcommune , f.nserie , f.fannee FROM $dbbk.z_"."$ARCH"."_$tbl_fact f , $db.$tbl_contact c  where f.nserie='$nserie1' and c.id=f.id GROUP BY c.refcommune ";  
$req=mysqli_query($linkibk,$sql);
?>
</p>
 <p>&nbsp; </p>
<H2> <p align="center" >  RECAPITULATIF FACTURATION PAR SECTEUR  <? echo $nserie1.'/'.$annee1rp; ?></p> </H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
    <td width="15%" align="center"><strong><font color="#FFFFFF" size="4">SECTEUR</font></strong></td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Nb client </strong></font></td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS</strong></font></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant THT</strong></font></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF">TCA</font></strong></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="9%" align="center"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="20%" align="center"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
  </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td  bgcolor="#FFFFFF"><em><? $RefCommune=$data['refcommune'];
	 
	 $sql3 = "SELECT * FROM commune where ref_com=$RefCommune";
$result3 = mysqli_query($linki,$sql3);
while ($row3 = mysqli_fetch_assoc($result3)) {
echo $secteur=$row3['commune'];
}
	 
	 ?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nbres'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['cons'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['totalht'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['tax'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['totalttc'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><? echo $data['impayee'];?></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['ortc'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['Pre'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['totalnet'];?></em></td>
   </tr>
   <?php
}  

?>
</table>
<p>&nbsp;</p>
<p>
  <?php 

require 'configuration.php';
$sql11 = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, c.refcommune , f.nserie , f.fannee , c.Tarif , f.st FROM $dbbk.z_"."$ARCH"."_$tbl_fact f, $db.$tbl_contact c where  f.nserie='$nserie1'  and c.id=f.id GROUP BY c.refcommune ";  
$req11=mysqli_query($linkibk,$sql11);
?>
</p>
<H2>
  <p align="center" >  DETAILLE  DES CONSOMMATIONS PAR SECTEUR <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
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
while($data11=mysqli_fetch_array($req11)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><em>
      <? $RefCommune=$data11['refcommune'];
	 
	 $sql3 = "SELECT * FROM commune where ref_com=$RefCommune";
$result3 = mysqli_query($linki,$sql3);
while ($row3 = mysqli_fetch_assoc($result3)) {
echo $secteur=$row3['commune'];
}
	 
	 ?>
    </em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data11['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data11['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data11['cons1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data11['cons2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data11['mont1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data11['mont2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data11['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data11['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data11['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data11['totalttc'];?></em></td>
  </tr>
  <?php
}  

?>
</table>
<p>&nbsp;</p>
<p>
  <?php

$sql2 = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, c.RefLocalite , f.nserie , f.fannee FROM $dbbk.z_"."$ARCH"."_$tbl_fact f, $db.$tbl_contact c where f.nserie='$nserie1' and c.id=f.id GROUP BY c.RefLocalite ";  
$req2=mysqli_query($linkibk,$sql2);
?>
</p>
<H2>
  <p align="center" > RECAPITULATIF FACTURATION PAR VILLE  <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="15%" align="center"><strong><font color="#FFFFFF" size="4">SECTEUR</font></strong></td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Nb client </strong></font></td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS</strong></font></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant THT</strong></font></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF">TCA</font></strong></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="10%" align="center"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="9%" align="center"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="20%" align="center"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
  </tr>
  <?php
while($data2=mysqli_fetch_array($req2)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><em>
      <? $RefLocalite=$data2['RefLocalite'];
	 
	 $sql32 = "SELECT * FROM ville where refville=$RefLocalite";
$result32 = mysqli_query($linki,$sql32);
while ($row32 = mysqli_fetch_assoc($result32)) {
echo $ville=$row32['ville'];
}
	 
	 ?>
    </em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data2['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data2['totalnet'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php

$sql22 = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, c.RefLocalite , f.nserie , f.fannee , c.Tarif , f.st FROM $dbbk.z_"."$ARCH"."_$tbl_fact f ,  $db.$tbl_contact c where   f.nserie='$nserie1' and c.id=f.id  GROUP BY c.RefLocalite ";  
$req22=mysqli_query($linkibk,$sql22);
?>
</p>
<H2>
  <p align="center" >DETAILLE  DES CONSOMMATIONS PAR VILLE <? echo $nserie1.'/'.$annee1rp; ?></p>
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
while($data22=mysqli_fetch_array($req22)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><em>
      <? $RefLocalite=$data22['RefLocalite'];
	 
	 $sql322 = "SELECT * FROM ville where refville=$RefLocalite";
$result322 = mysqli_query($linki,$sql322);
while ($row322 = mysqli_fetch_assoc($result322)) {
echo $ville=$row322['ville'];
}
	 
	 ?>
    </em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data22['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data22['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data22['cons1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data22['cons2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data22['mont1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data22['mont2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data22['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data22['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data22['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data22['totalttc'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php
$sql33i = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, c.RefLocalite , f.nserie , f.fannee , c.Tarif, f.st FROM $dbbk.z_"."$ARCH"."_$tbl_fact f,  $db.$tbl_contact c where f.nserie='$nserie1' and c.id=f.id and c.Tarif=3";   
$req33i=mysqli_query($linkibk,$sql33i);
?>
</p>
<H2>
  <p align="center" >   TOTAL DES MOSQUEES  <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
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
while($data33i=mysqli_fetch_array($req33i)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['cons1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['cons2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['mont1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['mont2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33i['totalttc'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php
$sql33A = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, c.RefLocalite , f.nserie , f.fannee , c.Tarif, f.st FROM $dbbk.z_"."$ARCH"."_$tbl_fact f, $db.$tbl_contact c  where   f.nserie='$nserie1' and c.id=f.id and (c.Tarif=6 OR c.Tarif=7 or c.Tarif=8  or c.Tarif=9 or c.Tarif=11)";   
$req33A=mysqli_query($linkibk,$sql33A);
?>
</p>
<H2>
  <p align="center" >   TOTAL DES AGENTS &amp; RETRAITES <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
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
while($data33A=mysqli_fetch_array($req33A)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['cons1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['cons2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['mont1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['mont2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33A['totalttc'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php
$sql33T = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, c.RefLocalite , f.nserie , f.fannee , c.Tarif, f.st FROM $dbbk.z_"."$ARCH"."_$tbl_fact f, $db.$tbl_contact c  where f.nserie='$nserie1' and c.id=f.id and (c.Tarif=1 OR c.Tarif=5 or c.Tarif=12)";   
$req33T=mysqli_query($linkibk,$sql33T);
?>
</p>
<H2>
  <p align="center" > TOTAL DES TRIPHASES <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
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
while($data33T=mysqli_fetch_array($req33T)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['cons1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['cons2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['mont1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['mont2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33T['totalttc'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p></p>
<p>
  <?php
$sql33B = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, c.RefLocalite , f.nserie , f.fannee , c.Tarif, f.st FROM $dbbk.z_"."$ARCH"."_$tbl_fact f, $db.$tbl_contact c  where   f.nserie='$nserie1' and c.id=f.id and (c.Tarif=2 OR c.Tarif=4)";   
$req33B=mysqli_query($linkibk,$sql33B);
?>
</p>
<H2>
  <p align="center" > TOTAL DES BASES TENSION <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
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
while($data33B=mysqli_fetch_array($req33B)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['cons1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['cons2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['mont1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['mont2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33B['totalttc'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php
$sql33M = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, c.RefLocalite , f.nserie , f.fannee , c.Tarif, f.st FROM $dbbk.z_"."$ARCH"."_$tbl_fact f, $db.$tbl_contact c  where   f.nserie='$nserie1' and c.id=f.id and c.Tarif=10";   
$req33M=mysqli_query($linkibk,$sql33M);
?>
</p>
<H2>
  <p align="center" > TOTAL DES MOYENS TENSION <? echo $nserie1.'/'.$annee1rp; ?></p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
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
while($data33M=mysqli_fetch_array($req33M)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['cons1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['cons2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['mont1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['mont2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33M['totalttc'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php

$sql3 = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet,  f.nserie , f.fannee FROM $dbbk.z_"."$ARCH"."_$tbl_fact f where  f.nserie='$nserie1' ";  
$req3=mysqli_query($linkibk,$sql3);
?>
</p>
<H2>
  <p align="center" >  FACTURATION TOTAL <? echo $nserie1.'/'.$annee1rp; ?></p>
  <p align="center" >&nbsp;</p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="10%" align="center">&nbsp;</td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Nb client </strong></font></td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>CONS</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant THT</strong></font></td>
    <td width="11%" align="center"><strong><font color="#FFFFFF">TCA</font></strong></td>
    <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
    <td width="12%" align="center"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF">ORTC</font></strong></td>
    <td width="9%" align="center"><strong><font color="#FFFFFF">D_Remise</font></strong></td>
    <td width="20%" align="center"><font color="#FFFFFF"><strong>Montant NET </strong></font></td>
  </tr>
  <?php
while($data3=mysqli_fetch_array($req3)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data3['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data3['totalnet'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>
  <?php

$sql33 = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2,SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet,  f.nserie , f.fannee , f.st FROM $dbbk.z_"."$ARCH"."_$tbl_fact f  where   f.nserie='$nserie1' ";   
$req33=mysqli_query($linkibk,$sql33);
?>
</p>
<H2>
  <p align="center" > DETAILLE DES CONSOMMATIONS TOTAL <? echo $nserie1.'/'.$annee1rp; ?></p>
  <p align="center" >&nbsp;</p>
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
while($data33=mysqli_fetch_array($req33)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33['cons1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33['cons2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33['mont1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33['mont2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data33['totalttc'];?></em></td>
  </tr>
  <?php
}  
mysqli_close ($linkibk);  
?>
</table>
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