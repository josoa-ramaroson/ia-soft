<?php
Require 'session.php';
require 'fonction.php';
?>
<?
if(($_SESSION['u_niveau'] != 2)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<body>
 <p>
   <?php
$id_nom=substr($_REQUEST["id@"],32);
$sqlu = "SELECT * FROM $tbl_saisie where blogin='$id_nom'";
$resultu = mysqli_query($linki,$sqlu);
while ($rowu = mysqli_fetch_assoc($resultu)) {
$bville=$rowu['bville'];
$bquartier=$rowu['bquartier'];
} 

require 'configuration.php';
$sql = "SELECT * FROM $tbl_contact where  ville='$bville'  and quartier='$bquartier' and statut='6'  and  (Tarif='1' or Tarif='5'  or Tarif='12') and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec'  and nserie='$nserie') ORDER BY id  ASC";  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>Id_Client </strong></font></td>
     <td width="18%" align="center"><font color="#FFFFFF" size="4"><strong>Police</strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF" size="4"><strong>Ville</strong></font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="3"><strong>Quartier </strong></font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="4"><strong>Nom Raison social </strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF" size="4"><strong>Index</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Total</strong></font></td>
   </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><strong>
       <?php $idcl=$data['id']; echo $data['id'];?>
     </strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><?php echo $data['Police'];?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><?php echo $data['ville'];?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><?php echo $data['quartier'];?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?php echo $data['nomprenom'];?></font></td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
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