<?
require 'session.php';
require 'fonction.php';
?>
<? //include 'inc/head.php'; ?>
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
$sql = "SELECT * FROM  $tbl_contact c  where c.ville='$m1v' and  c.quartier='$m2q' and statut='6' and  (Tarif='1' or Tarif='5'  or Tarif='12') ORDER BY c.id ASC";  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 

$sql7 = "SELECT COUNT(*) AS bt FROM $tbl_contact c  where c.ville='$m1v' and  c.quartier='$m2q' and statut='6' and  (Tarif='1' or Tarif='5'  or Tarif='12') ";   
$req7=mysql_query($sql7);
$data7= mysql_fetch_assoc($req7);
$cbt=$data7['bt'];


?>
 <H2> <p align="center" >  CARNET DES RELEVES </p> </H2></p>
<p><em><? echo $m1v;?></em> - : <em><? echo $m2q;?> </em> -   Nombre des clients est : <? echo $cbt;?> </p>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
   <tr bgcolor="#3071AA">
     <td width="7%" align="center"><font color="#FFFFFF" size="4"><strong>RANG</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF" size="4"><strong>ID Client</strong></font></td>
     <td width="20%" align="center"><font color="#FFFFFF" size="3"><strong>Nom du client</strong></font></td>
	  <td width="11%" align="center"><font color="#FFFFFF"><strong>N° Compteur </strong></font></td>
      <td width="11%" align="center"><font color="#FFFFFF"><strong>A Index</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Index </strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Index +</strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF" size="4"><strong>Observation</strong></font></td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td height="61" align="center" >&nbsp;</td>
     <td align="center" ><em><? echo $data['id'];?></em></td>
     <td ><em><? echo $data['nomprenom'];?></em></td>
	 <td align="center" ><em><? echo $data['ncompteur'];?></em></td>
     <td align="center" ><em><? echo $data['Indexinitial'];?></em></td>
     <td align="center" >&nbsp;</td>
     <td align="center" ><p>&nbsp;</p>
     <p>&nbsp;</p></td>
     <td align="center" >&nbsp;</td>
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