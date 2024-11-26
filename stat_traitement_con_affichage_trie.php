<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?php
Require 'fonction_niveau_statistique.php';
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction

$nbr=addslashes($_POST['nbr']);

$RefQuartier=addslashes($_POST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_POST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysqli_query($linki,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 
    $m1v=$ville;
	$m2q=$quartier;

?>
<body>
<p>
  <?php
require 'configuration.php';


	function stat_eda($mois,$annee,$tv_facturation, $id){
    global $linki;
	$sql = "SELECT SUM(cons) AS cons, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , st 
	FROM $tv_facturation where  st='E' and  fannee='$annee'  and nserie='$mois' and id='$id' "; 
	$resultat = mysqli_query($linki,$sql) or exit(mysqli_error($linki)); 
	$nqt = mysqli_fetch_assoc($resultat);

	if((!isset($nqt['cons'])|| empty($nqt['cons']))) { $qt=0; return $qt;}
	else {$qt=$nqt['cons']; return $qt;}

	}	
	
$sqlA = "SELECT * FROM  $tbl_contact c  where c.ville='$m1v' and  c.quartier='$m2q' and statut='6' and alerte='$nbr'   ORDER BY c.id ASC";  
$reqA = mysqli_query($linki,$sqlA) or die('Erreur SQL !<br />'.$sqlA.'<br />'.mysqli_error($linki)); 

?>
Base de connaissance  Ville : <em><?php echo  $m1v;?></em> Quartier : <em><?php echo $m2q;?></em></p>
<p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="9%" align="center"><font color="#FFFFFF" size="4"><strong>ID Client</strong></font></td>
    <td width="11%" align="center"><font color="#FFFFFF" size="3"><strong>Nom du client</strong></font></td>
    <td width="6%" align="center"><font color="#FFFFFF"><strong>C. Jan</strong></font></td>
    <td width="5%" align="center"><font color="#FFFFFF"><strong>C.Fev</strong></font></td>
    <td width="5%" align="center"><font color="#FFFFFF"><strong>C.Mas</strong></font></td>
    <td width="5%" align="center"><font color="#FFFFFF"><strong>C.Avr</strong></font></td>
    <td width="6%" align="center"><font color="#FFFFFF"><strong>C. Mai</strong></font></td>
    <td width="5%" align="center"><font color="#FFFFFF"><strong>C.Juin</strong></font></td>
    <td width="6%" align="center"><font color="#FFFFFF"><strong>C.Juiel</strong></font></td>
    <td width="5%" align="center"><font color="#FFFFFF"><strong>C.Au</strong></font></td>
    <td width="5%" align="center"><font color="#FFFFFF"><strong>C.Sep</strong></font></td>
    <td width="7%" align="center"><font color="#FFFFFF"><strong>C.Oct</strong></font></td>
    <td width="9%" align="center"><font color="#FFFFFF"><strong>C.Nov</strong></font></td>
    <td width="8%" align="center"><font color="#FFFFFF"><strong>C.Dec</strong></font></td>
    <td width="8%" align="center">&nbsp;</td>
  </tr>
  <?php
while($dataA=mysqli_fetch_array($reqA)){ // Start looping table row 
?>
  <tr>
    <td align="center" ><em><a href="stat_graph_fac_rec_client.php?id=<?php echo $dataA['id'];?>&annee=<?php echo $annee;?>" target=_blank><?php echo $dataA['id'];?> </a></em></td>
    <td><em><?php echo $dataA['nomprenom'];?></em></td>
    <td align="center" ><em><?php echo stat_eda(1,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(2,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(3,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(4,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(5,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(6,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(7,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(8,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(9,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(10,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(11,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo stat_eda(12,$annee,$tv_facturation,$dataA['id']);?></em></td>
    <td align="center" ><em><?php echo $dataA['alerte'];?></em></td>
  </tr>
  <?php
}
mysqli_close ($linki);  
			 
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>