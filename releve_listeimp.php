<?php
Require 'session.php';
require 'fonction.php';
?>
<?php //include 'inc/head.php'; ?>
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
$sql = "SELECT * FROM  $tbl_contact c  where c.ville='$m1v' and  c.quartier='$m2q' and statut='6' and  (Tarif='2' or Tarif='3' or Tarif='4' or Tarif='6' or Tarif='7' or Tarif='8' or Tarif='9' or Tarif='11') ORDER BY c.id ASC";  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki)); 

$sql7 = "SELECT COUNT(*) AS bt FROM $tbl_contact c  where c.ville='$m1v' and  c.quartier='$m2q' and statut='6' and  (Tarif='2' or Tarif='3' or Tarif='4' or Tarif='6' or Tarif='7' or Tarif='8' or Tarif='9' or Tarif='11') ";   
$req7=mysqli_query($linki,$sql7);
$data7= mysqli_fetch_assoc($req7);
$cbt=$data7['bt'];


?>
 <H2> <p align="center" >  CARNET DES RELEVES </p> </H2></p>
<p><em><?php echo $m1v;?></em> - : <em><?php echo $m2q;?> </em> -   Nombre des clients est : <?php echo $cbt;?> </p>
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
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td height="61" align="center" >&nbsp;</td>
     <td align="center" ><em><?php echo $data['id'];?></em></td>
     <td ><em><?php echo $data['nomprenom'];?></em></td>
	 <td align="center" ><em><?php echo $data['ncompteur'];?></em></td>
     <td align="center" ><em><?php echo $data['Indexinitial'];?></em></td>
     <td align="center" >&nbsp;</td>
     <td align="center" ><p>&nbsp;</p>
     <p>&nbsp;</p></td>
     <td align="center" >&nbsp;</td>
   </tr>
   <?php
}

 mysqli_close($linki);;  
			 
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>