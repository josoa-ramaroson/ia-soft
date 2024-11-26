<?php
Require 'session.php';
require 'fonction.php';
require 'configuration.php';

$nserie1=$cserie;
$annee1rp=$annee_recouvrement;

//$nserie1=addslashes($_POST['nserie']);
//$annee1rp=addslashes($_POST['annee']);
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
<body>
 <p>
   <?php

require 'configuration.php';
$sql = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.refcommune , f.nserie , f.fannee , f.id , f.st FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') GROUP BY f.refcommune ";  
$req=mysqli_query($linki,$sql);

?>
<div class="panel-body">| <a href="rapport_recouvrement_detail.php" class="btn btn-sm btn-success" > RECAP : Montant à recouvrer avec détail </a> |</div>

 <p>&nbsp;</p>
<p>
  <?php
$sql33i = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') and f.Tarif=3";
 
$req33i=mysqli_query($linki,$sql33i);
?>
</p>
<H2>
  <p align="center" >   TOTAL A RECOUVRER DES MOSQUEES  <?php echo $nserie1.'/'.$annee1rp; ?></p>
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
while($data33i=mysqli_fetch_array($req33i)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><a href="rapport_recouvrement_detail_ms.php" class="btn btn-sm btn-success">Edit </a></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33i['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33i['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data33i['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33i['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33i['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33i['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33i['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php
$sql33A = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') and (f.Tarif=6 OR f.Tarif=7 or f.Tarif=8  or f.Tarif=9 or f.Tarif=11)";   
$req33A=mysqli_query($linki,$sql33A);
?>
</p>
<H2>
  <p align="center" >   TOTAL A RECOUVRER DES AGENTS &amp; RETRAITES <?php echo $nserie1.'/'.$annee1rp; ?></p>
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
while($data33A=mysqli_fetch_array($req33A)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><a href="rapport_recouvrement_detail_a.php" class="btn btn-sm btn-success">Edit </a></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33A['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33A['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data33A['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33A['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33A['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33A['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33A['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php
$sql33T = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') and (f.Tarif=1 or f.Tarif=5 or f.Tarif=12)";   
$req33T=mysqli_query($linki,$sql33T);
?>
</p>
<H2>
  <p align="center" > TOTAL DES TRIPHASES <?php echo $nserie1.'/'.$annee1rp; ?></p>
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
while($data33T=mysqli_fetch_array($req33T)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><a href="rapport_recouvrement_detail_t.php" class="btn btn-sm btn-success">Edit </a></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33T['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33T['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data33T['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33T['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33T['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33T['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33T['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p></p>
<p>
  <?php
$sql33B = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') and ( f.Tarif=2 or f.Tarif=4)";   
$req33B=mysqli_query($linki,$sql33B);
?>
</p>
<H2>
  <p align="center" > TOTAL A RECOUVRER DES BASES TENSION  - MONOPHASE <?php echo $nserie1.'/'.$annee1rp; ?></p>
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
while($data33B=mysqli_fetch_array($req33B)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><a href="rapport_recouvrement_detail_bt.php" class="btn btn-sm btn-success">Edit </a></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33B['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33B['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data33B['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33B['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33B['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33B['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33B['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php
$sql33M = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp') and f.Tarif=10 GROUP BY f.RefLocalite";   
$req33M=mysqli_query($linki,$sql33M);
?>
</p>
<H2>
  <p align="center" > TOTAL A RECOUVRER DES MOYENS TENSION <?php echo $nserie1.'/'.$annee1rp; ?></p>
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
while($data33M=mysqli_fetch_array($req33M)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><em>
      <?php $RefLocalite=$data33M['RefLocalite'];
	 
	 $sql32 = "SELECT * FROM ville where refville=$RefLocalite";
$result32 = mysqli_query($linki,$sql32);
while ($row32 = mysqli_fetch_assoc($result32)) {
echo $ville=$row32['ville'];
}
	 
	 ?>
    </em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33M['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33M['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data33M['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33M['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33M['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33M['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33M['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>&nbsp;</p>
<p>
  <?php

$sql3 = "SELECT  COUNT(*) AS nbres, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, SUM(f.report) AS report, f.RefLocalite , f.nserie , f.fannee , f.id , f.st, f.Tarif FROM $tv_facturation f where f.fannee='$annee1rp'  and f.nserie='$nserie1' and f.st='E' and f.idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$annee1rp')";  
$req3=mysqli_query($linki,$sql3);
?>
</p>
<H2>
  <p align="center" >  MONTANT TOTAL A RECOUVRER   <?php echo $nserie1.'/'.$annee1rp; ?></p>
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
while($data3=mysqli_fetch_array($req3)){ // Start looping table row 
?>
  <tr>
    <td height="43"  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['totalttc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data3['impayee'];?></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['ortc'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['Pre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['totalnet'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data3['report'];?></em></td>
  </tr>
  <?php
}  
?>
</table>
<p>
  <?php

$sql33 = "SELECT COUNT(*) AS nbres, SUM(cons1) AS cons1, SUM(cons2) AS cons2, SUM(cons) AS cons, SUM(mont1) AS mont1,SUM(mont2) AS mont2,SUM(puisct) AS puisct, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , Tarif, st FROM $tv_facturation where  fannee='$annee1rp'  and nserie='$nserie1' ";   
$req33=mysqli_query($linki,$sql33);
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