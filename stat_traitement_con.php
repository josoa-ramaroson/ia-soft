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
$sql = "SELECT * FROM  $tbl_contact c  where c.ville='$m1v' and  c.quartier='$m2q' and statut='6'   ORDER BY c.id ASC";  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  

	function stat_eda($mois,$annee,$tv_facturation, $id){
      global $linki;
	$sql = "SELECT SUM(cons) AS cons, SUM(totalht) AS totalht, SUM(tax) AS tax, SUM(totalttc) AS totalttc, SUM(ortc) AS ortc, SUM(impayee) AS impayee, SUM(Pre) AS Pre, SUM(totalnet) AS totalnet, RefLocalite , nserie , fannee , st 
	FROM $tv_facturation where  st='E' and  fannee='$annee'  and nserie='$mois' and id='$id' "; 
	$resultat = mysqli_query($linki,$sql) or exit(mysqli_error($linki)); 
	$nqt = mysqli_fetch_assoc($resultat);

	if((!isset($nqt['cons'])|| empty($nqt['cons']))) { $qt=0; return $qt;}
	else {$qt=$nqt['cons']; return $qt;}

	}	
	
?>
Base de connaissance  Ville : <em><?php echo  $m1v;?></em> Quartier : <em><?php echo $m2q;?></em></p>
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
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" ><em><?php echo $the_id=$data['id'];?></em></td>
     <td><em><?php echo $data['nomprenom'];?></em></td>
     <td align="center" ><em><?php echo $b1=stat_eda(1,$annee,$tv_facturation,$data['id']);?></em></td>
     <td align="center" ><em><?php echo $b2=stat_eda(2,$annee,$tv_facturation,$data['id']);
	  if ($b2>$b1) {$n1=1;} else {$n1=0; }?></em></td>
     <td align="center" ><em><?php echo $b3=stat_eda(3,$annee,$tv_facturation,$data['id']); 
	  if ($b3>$b2) {$n2=1;} else {$n2=0;} if ( ($n1==0 and $n2==0) and ($b3!=0) and ($b2!=0)) {$AL=1;} else {$AL=0;}?></em></td>
      
     <td align="center" ><em><?php echo $b4=stat_eda(4,$annee,$tv_facturation,$data['id']);
	 if ($b4>$b3) {$n3=1;} else {$n3=0;} if ( ($n2==0 and $n3==0) and ($b3!=0) and ($b4!=0)) {$AL1=1;} else {$AL1=0;}?></em></td>
     <td align="center" ><em><?php echo $b5=stat_eda(5,$annee,$tv_facturation,$data['id']);
	 if ($b5>$b4){$n4=1;} else {$n4=0;} if (($n3=0 and $n4==0) and ($b5!=0) and ($b4!=0)) {$AL2=1;} else {$AL2=0;}?></em></td>
     <td align="center" ><em><?php echo $b6=stat_eda(6,$annee,$tv_facturation,$data['id']);
	 if ($b6>$b5) {$n5=1;} else {$n5=0;} if (($n4=0 and $n5==0) and ($b6!=0) and ($b5!=0)) {$AL3=1;} else {$AL3=0;}?></em></td>
     <td align="center" ><em><?php echo $b7=stat_eda(7,$annee,$tv_facturation,$data['id']);
	 if ($b7>$b6){$n6=1;} else {$n6=0;} if (($n5=0 and $n6==0) and ($b7!=0) and ($b6!=0)) {$AL4=1;} else {$AL4=0;}?></em></td>
     <td align="center" ><em><?php echo $b8=stat_eda(8,$annee,$tv_facturation,$data['id']);
	 if ($b8>$b7) {$n7=1;} else {$n7=0;} if (($n6=0 and $n7==0) and ($b8!=0) and ($b7!=0)) {$AL5=1;} else {$AL5=0;}?></em></td>
     <td align="center" ><em><?php echo $b9=stat_eda(9,$annee,$tv_facturation,$data['id']);
	 if ($b9>$b8) {$n8=1;} else {$n8=0;} if (($n7=0 and $n8==0) and ($b9!=0) and ($b8!=0)) {$AL6=1;} else {$AL6=0;}?></em></td>
     <td align="center" ><em><?php echo $b10=stat_eda(10,$annee,$tv_facturation,$data['id']);
	  if ($b10>$b9)  {$n9=1;} else {$n9=0;} if (($n8==0 and $n9==0) and ($b10!=0) and ($b9!=0)) {$AL7=1;} else {$AL7=0;}?></em></td>
     <td align="center" ><em><?php echo $b11=stat_eda(11,$annee,$tv_facturation,$data['id']);
	 if ($b11>$b10) {$n10=1;} else {$n10=0;} if (($n9==0 and $n10==0) and ($b11!=0)and ($b10!=0)) {$AL8=1;} else {$AL8=0;}?></em></td>
     <td align="center" ><em><?php echo $b12=stat_eda(12,$annee,$tv_facturation,$data['id']);
	 if ($b12>$b11)  {$n11=1;} else {$n11=0;} if (($n10==0 and $n11==0) and ($b12!=0) and ($b11!=0)) {$AL9=1;} else {$AL9=0;}?></em></td>
     <td align="center" ><em><?php echo $alerte=$AL+$AL1+$AL2+$AL3+$AL4+$AL5+$AL6+$AL7+$AL8+$AL9;
	 
	 $sqlcon="update $tbl_contact set alerte=$alerte where id='$the_id'";
     $connection=mysqli_query($linki,$sqlcon);
	 
	 
	 ?></em></td>
   </tr>
   <?php
}

			 
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>