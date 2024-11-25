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
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<a href="co_facturation_listeFacimpT.php?id@=<? echo md5(microtime()).$id_nom;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
<p>
<?php

$sqlu = "SELECT * FROM $tbl_saisie where blogin='$id_nom'";
$resultu = mysql_query($sqlu);
while ($rowu = mysql_fetch_assoc($resultu)) {
$bville=$rowu['bville'];
$bquartier=$rowu['bquartier'];
} 

require 'configuration.php';
$sql = " SELECT * FROM $tbl_fact f , $tbl_contact c  where f.id=c.id and f.nserie=$nserie and f.fannee=$anneec and ville='$bville'  and quartier='$bquartier' and statut='6'  and  (Tarif='1' or Tarif='5'  or Tarif='12')  ORDER BY f.id ASC";  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="6%" align="center"><font color="#FFFFFF">ID Client</font></td>
     <td width="17%" align="center"><font color="#FFFFFF" size="4"><strong>Nom du client </strong></font></td>
     <td width="14%" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Ville</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF" size="3"><strong>Quartier </strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>N°F</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Impayee</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Droit Remise</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant Total</strong></font></td>
   </tr>
   <?php
while($datafact=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000">
	 <a href="
     <? if ($datafact['Tarif']!=10){echo'co_bill.php';} else { echo'co_billMT.php';}?>?idf=<? echo md5(microtime()).$datafact['idf'];?>" class="btn btn-sm btn-default" target="_blank" ><? echo $datafact['id'];?></a>
	 </font></td>
     <td  bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['nomprenom'];?></font></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['ville'];?></font></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['quartier'];?></font></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['idf'];?></font></td>
     <td align="center" bgcolor="#FFFFFF"><em><font color="#000000"><? echo $datafact['totalttc'];?></font></em></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['impayee'];?></font></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['Pre'];?></font></td>
     <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['totalnet'];?></font></td>
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