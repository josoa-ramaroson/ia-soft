<?php
Require 'session.php';
require 'fonction.php';
     $nserie1=substr($_REQUEST["ns"],32);
     $annee1fl=substr($_REQUEST["an"],32);  
	 $CA=substr($_REQUEST['CA'],32);
	 $CB=substr($_REQUEST['CB'],32);
	 $ARCH=$annee1fl;
?>
<?php
Require 'fonction_niveau_stat_filtre.php';
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
//require("bienvenue.php");  // on appelle la page contenant la fonction
?>
<body>
 <p>
   <?php 

//require 'configuration.php';
//if (($ARCH==$annee)|| ($ARCH>$annee))
if (($ARCH==$annee_recouvrement)|| ($ARCH>$annee_recouvrement))
{
$sql11 = "SELECT  v.cons1,  v.cons2,  v.cons,  v.mont1, v.mont2, v.puisct,  v.totalht,  v.tax,  v.totalttc,  v.ortc,  v.impayee,  v.Pre,  v.totalnet, v.refcommune , v.nserie , v.fannee , v.Tarif , v.st , v.RefLocalite, v.id , c.nomprenom FROM $tv_facturation v JOIN $tbl_contact c ON v.id=c.id and  fannee='$annee1fl'  and nserie='$nserie1' and cons > '$CA' and  '$CB' > cons ORDER BY v.RefLocalite  ASC ";  
}
else
{
	
$sql11 = "SELECT  v.cons1,  v.cons2,  v.cons,  v.mont1, v.mont2, v.puisct,  v.totalht,  v.tax,  v.totalttc,  v.ortc,  v.impayee,  v.Pre,  v.totalnet, c.refcommune , v.nserie , v.fannee , c.Tarif , v.st , c.RefLocalite, v.id , c.nomprenom FROM 
 $dbbk.z_"."$ARCH"."_$tbl_fact v ,  $db.$tbl_contact c where  v.id=c.id and  v.fannee='$annee1fl'  and v.nserie='$nserie1' and v.cons > '$CA' and  '$CB' > v.cons ORDER BY c.RefLocalite  ASC "; 
	
}

$req11=mysqli_query($linki,$sql11);
?>
</p>
<H2>
  <p align="center" >Facturation ( <?php echo $nserie1.'/'.$annee1fl; ?>) supérieur à <?php echo $CA; ?> Kwh et inférieur à <?php echo $CB; ?> Kwh </p>
</H2>
<table width="104%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
    <td width="6%" align="center"><strong><font color="#FFFFFF" size="4">ID</font></strong></td>
    <td width="13%" align="center"><strong><font color="#FFFFFF" size="4">Ville</font></strong></td>
    <td width="19%" align="center"><strong><font color="#FFFFFF" size="3">Nom client</font></strong></td>
    <td width="6%" align="center"><font color="#FFFFFF" size="3"><strong>CONS </strong></font></td>
    <td width="6%" align="center"><font color="#FFFFFF" size="3"><strong>CONS 1</strong></font></td>
    <td width="7%" align="center"><font color="#FFFFFF" size="3"><strong>CONS 2</strong></font></td>
    <td width="7%" align="center"><font color="#FFFFFF" size="3"><strong>MT 1</strong></font></td>
    <td width="6%" align="center"><font color="#FFFFFF" size="3"><strong>MT 2</strong></font></td>
    <td width="8%" align="center"><font color="#FFFFFF" size="3"><strong>Puis Sct</strong></font></td>
    <td width="8%" align="center"><font color="#FFFFFF"><strong>THT</strong></font></td>
    <td width="7%" align="center"><strong><font color="#FFFFFF">TCA</font></strong></td>
    <td width="7%" align="center"><font color="#FFFFFF"><strong> TTC</strong></font></td>
  </tr>
  <?php
while($data11=mysqli_fetch_array($req11)){ // Start looping table row 
?>
  <tr>
    <td  bgcolor="#FFFFFF"><em><?php echo $data11['id'];?></em></td>
    <td  bgcolor="#FFFFFF"><em>
      <?php $RefLocalite=$data11['RefLocalite'];
	 
	 $sql322 = "SELECT * FROM ville where refville=$RefLocalite";
$result322 = mysqli_query($linki,$sql322);
while ($row322 = mysqli_fetch_assoc($result322)) {
echo $ville=$row322['ville'];
}
	 
	 ?>
    </em></td>
    <td  bgcolor="#FFFFFF"><em><?php echo $data11['nomprenom'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data11['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data11['cons1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data11['cons2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data11['mont1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data11['mont2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data11['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data11['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data11['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data11['totalttc'];?></em></td>
  </tr>
  <?php
}  

?>
</table>
<p>&nbsp;</p>
<p>
  <?php
//if (($ARCH==$annee)|| ($ARCH>$annee))
if (($ARCH==$annee_recouvrement)|| ($ARCH>$annee_recouvrement))
{
$sql33 = "SELECT COUNT(*) AS nbres, SUM(cons1) AS cons1, SUM(cons2) AS cons2, SUM(cons) AS cons, SUM(mont1) AS mont1,SUM(mont2) AS mont2,SUM(puisct) AS puisct, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , Tarif, st FROM $tv_facturation where  fannee='$annee1fl'  and nserie='$nserie1' and cons > '$CA' and  '$CB' > cons ";   

$sql4 = "SELECT COUNT(*) AS nbtotal FROM $tv_facturation where  fannee='$annee1fl'  and nserie='$nserie1'";   
}
else
{
$sql33 = "SELECT  COUNT(*) AS nbres, SUM(f.cons1) AS cons1, SUM(f.cons2) AS cons2, SUM(f.cons) AS cons, SUM(f.mont1) AS mont1,SUM(f.mont2) AS mont2, SUM(f.puisct) AS puisct, SUM(f.totalht) AS totalht, SUM(f.tax) AS tax, SUM(f.totalttc) AS totalttc, SUM(f.ortc) AS ortc, SUM(f.impayee) AS impayee, SUM(f.Pre) AS Pre, SUM(f.totalnet) AS totalnet, c.RefLocalite , f.nserie , f.fannee , c.Tarif , f.st FROM $dbbk.z_"."$ARCH"."_$tbl_fact f ,  $db.$tbl_contact c  where  c.id=f.id and f.fannee='$annee1fl'  and f.nserie='$nserie1' and f.cons > '$CA' and  '$CB' > f.cons "; 

$sql4 = "SELECT COUNT(*) AS nbtotal FROM $dbbk.z_"."$ARCH"."_$tbl_fact f ,  $db.$tbl_contact c  where  c.id=f.id and f.fannee='$annee1fl'  and f.nserie='$nserie1'";

}
$req33=mysqli_query($linki,$sql33);
$req4=mysqli_query($linki,$sql4);
while($data4=mysqli_fetch_array($req4)){$nbt=$data4['nbtotal'];}

?>
</p>
<H2>
  <p align="center" >Facturation ( <?php echo $nserie1.'/'.$annee1fl; ?>) supérieur à <?php echo $CA; ?> Kwh et inférieur à <?php echo $CB; ?> Kwh </p>
</H2>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#96d947">
    <td width="10%" align="center">&nbsp;</td>
    <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong>Nbre client</strong></font></td>
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
$nb= $data33['nbres'];
?>
  <tr>
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33['nbres'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33['cons'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33['cons1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33['cons2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33['mont1'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33['mont2'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33['puisct'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33['totalht'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33['tax'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $data33['totalttc'];?></em></td>
  </tr>
  <?php
}  

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
	mysqli_close ($linki);
include_once('pied.php');
?></td>
  </tr>
</table>
<p></p>
</body>
</html>