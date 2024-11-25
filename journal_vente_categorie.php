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
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction


$RefQuartier=addslashes($_REQUEST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_REQUEST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 
    $m1v=$ville;
	$m2q=$quartier;

    //$m1v=addslashes($_REQUEST['m1v']);
	//$m2q=addslashes($_REQUEST['m2q']);
$CodeTypeClts=addslashes($_REQUEST['CodeTypeClts']);

?>
<body>
<a href="journal_vente_categorieimp.php?m1v=<? echo md5(microtime()).$m1v;?>&m2q=<? echo md5(microtime()).$m2q;?>&c=<? echo md5(microtime()).$CodeTypeClts;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
<p>
<?php
require 'configuration.php';

$sql = " SELECT * FROM $tbl_fact f , $tbl_contact c  where f.id=c.id and f.nserie=$nserie and f.fannee=$anneec  and c.ville='$m1v' and  c.quartier='$m2q' and CodeTypeClts='$CodeTypeClts' ORDER BY f.id ASC ";
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
?>
 Ville : <em><? echo  $m1v;?></em> Quartier : <em><? echo $m2q;?></em> Categorie : <em><? //$CodeTypeClts;
 
$sqltclient = "SELECT * FROM $tbl_client where idtclient='$CodeTypeClts'";
$resulttclient = mysql_query($sqltclient);
$rowtclient = mysql_fetch_assoc($resulttclient);
if ($rowtclient===FALSE) {}
else 
 {
echo $TypeClts=$rowtclient['TypeClts'];
 }


 ?></em></p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="12%" align="center"><font color="#FFFFFF">ID Client</font></td>
     <td width="25%" align="center"><font color="#FFFFFF" size="4"><strong>Nom du client </strong></font></td>
     <td width="14%" align="center"><strong><font color="#FFFFFF">Ancien Index</font></strong></td>
     <td width="16%" align="center"><strong><font color="#FFFFFF">Nouveau Index</font></strong></td>
     <td width="16%" align="center"><strong><font color="#FFFFFF">Consommation</font></strong></td>
     <td width="17%" align="center"><font color="#FFFFFF"><strong>Montant HT</strong></font></td>
   </tr>
   <?php
while($datafact=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="<? gettatut($datafact['totalht']); ?>">
     <td align="center"><font color="#000000">
	 <a href="co_bill.php?idf=<? echo md5(microtime()).$datafact['idf'];?>" class="btn btn-sm btn-default" target="_blank" ><? echo $datafact['id'];?></a>
	 </font></td>
     <td ><font color="#000000"><? echo $datafact['nomprenom'];?></font></td>
     <td align="center" ><em><font color="#000000"><? echo $datafact['n'];?></font></em></td>
     <td align="center" ><font color="#000000"><? echo $datafact['nf'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['cons'];?></font></td>
     <td align="center" ><font color="#000000"><? echo $datafact['totalht'];?></font></td>
   </tr>
   <?php
}

mysql_close ();  
				  function gettatut($fetat){
				  if ($fetat<=100000 && $fetat>=75000)         { echo $couleur="#ffc88d";}//orange 
				  if ($fetat>=100000)                          { echo $couleur="#ec9b9b";}//rouge -Declined
				  }
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>