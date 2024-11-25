<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
 <p>
   <?php
require 'configuration.php';
//$st=$_REQUEST["st"];
 $date=$_POST['dateB'];
 $agent=$_POST['agentv'];
 
$sql = "SELECT count(*) FROM $tbl_paiement where id_nom='$agent' and date='$date'";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 400; 
$sql = "SELECT * FROM $tbl_paiement where id_nom='$agent' and date='$date' ORDER BY idp ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  


$sqlt = "SELECT SUM(paiement) AS Paie, SUM(ortc_dp) AS ortc_dp, SUM(tax_dp) AS tax_dp, SUM(totalht_dp) AS totalht_dp, id_nom , date , st , nserie FROM $tbl_paiement where  id_nom='$agent' and date='$date'";  //ASC  DESC
$reqt = mysql_query($sqlt); 

$sqltE = "SELECT SUM(paiement) AS PaieE, id_nom , date , st , nserie FROM $tbl_paiement where  st='E'  and id_nom='$agent' and date='$date'";  //ASC  DESC
$reqtE = mysql_query($sqltE); 
$datatE=mysql_fetch_array($reqtE);


?>
 <a href="rapport_listedateagentimp.php?dateB=<? echo md5(microtime()).$date;?>&agentv=<? echo md5(microtime()).$agent;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a></p>
 <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>AGENT ( VENDEUR)</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>DATE</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>TOTAL </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>MONTANT ELEC </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>TOTAL ortc</strong></font></td>
	 <td width="12%" align="center"><font color="#FFFFFF"><strong>TOTAL tax </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>TOTAL ELC S ortc/tax</strong></font></td> 
	 
	 
   </tr>
   <?php
while($datat=mysql_fetch_array($reqt)){ // Start looping table row 
?>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><? echo  $datat['id_nom']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo  $datat['date']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><? $P=strrev(chunk_split(strrev($datat['Paie']),3," "));   echo $P;?></td>
         <td align="center" bgcolor="#FFFFFF"><? $PE=strrev(chunk_split(strrev($datatE['PaieE']),3," "));   echo $PE;?></td>
    <td align="center" bgcolor="#FFFFFF"><?  $P1=strrev(chunk_split(strrev($datat['ortc_dp']),3," "));   echo $P1;?></td>
   <td align="center" bgcolor="#FFFFFF">
     <?  $P2=$datatE['PaieE']-$datat['ortc_dp']; $tax_dp=(round(0.03 *($P2),0)); echo $tax_dp; ?></td>
	<td align="center" bgcolor="#FFFFFF"><? $P3=$datatE['PaieE']-$datat['ortc_dp']-$tax_dp;   echo $P3;?></td>
   </tr>
  <?php
}
?>
 </table>
 <p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
    <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>ID Client </strong></font></td>
     <td width="14%" align="center"><font color="#FFFFFF" size="4"><strong>N facture</strong></font></td>
     <td width="18%" align="center"><font color="#FFFFFF" size="3"><strong>Raison sociale</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>N Reçu </strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Montant</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Payé</strong></font></td>
	 <td width="7%" align="center"><font color="#FFFFFF"><strong>ORTC </strong></font></td>
     <td width="7%" align="center"><font color="#FFFFFF"><strong>TAX</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>M.Fact</strong></font></td>
   </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   
     
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['id'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nfacture'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['Nomclient'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em>
     
  <a href="paiement_billimp.php?idp=<? echo md5(microtime()).$data['idp'];?>" target="_blank" > <? echo $data['nrecu'];?></a>
     
     </em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['montant'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['paiement'];?></em></td>
	      <td align="center" bgcolor="#FFFFFF"><em><? echo $data['ortc_dp'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['tax_dp'];?></em></td>
	 <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data['totalht_dp']),3," "));?></em></td>
     </tr>
   <?php
}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>