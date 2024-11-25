<?
require 'session.php';
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
$resultu = mysql_query($sqlu);
while ($rowu = mysql_fetch_assoc($resultu)) {
$bville=$rowu['bville'];
$bquartier=$rowu['bquartier'];
} 

require 'configuration.php';
$sql = "SELECT * FROM $tbl_contact where  ville='$bville'  and quartier='$bquartier' and statut='6'  and  (Tarif='2' or Tarif='3' or Tarif='4' or Tarif='6' or Tarif='7' or Tarif='8' or Tarif='9' or Tarif='11') and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec'  and nserie='$nserie') ORDER BY id  ASC";  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
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
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><strong>
       <? $idcl=$data['id']; echo $data['id'];?>
     </strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><? echo $data['Police'];?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><? echo $data['ville'];?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><? echo $data['quartier'];?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $data['nomprenom'];?></font></td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
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