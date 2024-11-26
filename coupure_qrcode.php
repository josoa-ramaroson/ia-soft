<?php
Require 'session.php';
require 'fonction.php';
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
<title><?php include 'titre.php'; ?></title>
<?php include 'inc/head.php'; ?>
<style type="text/css">
.centre {
	text-align: center;
}
</style>
<?
//require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
</head>

<?
    $m1v=substr($_REQUEST["m1v"],32);
	$m2q=substr($_REQUEST["m2q"],32); 
	require 'configuration.php';
	
$sql="SELECT * FROM $tbl_fact f, $tbl_contact c  where f.fannee='$anneec' and f.st='E' and nserie='$cserie' and c.id=f.id and c.ville='$m1v' and  c.quartier='$m2q' and  f.totalnet > 1000 and idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$anneec') ORDER BY f.id ASC ";
$req=mysqli_query($linki,$sql);


$sqFP= "SELECT  COUNT(*) AS nbres, SUM(f.totalnet) AS totalnet , SUM(f.totalttc) AS totalttc, SUM(f.impayee) AS impayee, f.fannee ,SUM(f.ortc) AS ortc, f.st , f.nserie, c.ville, c.quartier FROM $tbl_fact f, $tbl_contact c  where f.fannee='$anneec' and f.st='E' and nserie='$cserie' and c.id=f.id and c.ville='$m1v' and  c.quartier='$m2q' and  f.totalnet > 1000 and idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$anneec')";
	$RFP = mysqli_query($linki,$sqFP); 
	$AFP = mysqli_fetch_assoc($RFP);
	$tFP=$AFP['totalttc'];
	$tFPt=$AFP['totalnet']; 
	$tFPn=$AFP['nbres'];
	$tFPi=$AFP['impayee'];
	$tFPo=$AFP['ortc'];

?>
<body>
<table width="99%" border="0">
   <tr>
     <td width="5%" height="93">&nbsp;</td>
     <td width="45%"><h2>Nombre des clients : <?php echo strrev(chunk_split(strrev($tFPn),3," "));?> résultat(s) </h2></td>
     <td width="3%"></td>
     <td width="16%">&nbsp;</td>
     <td width="1%" with="10%">&nbsp;</td>
     <td width="30%">&nbsp;</td>
   </tr>
 </table>
<table width="934" border="0">
    <tr>

<?php
$i = 0;
while($data=mysqli_fetch_array($req)){

{
 $i++;
 if($i%4 == 0){
 print "</tr><tr>";
 }

	echo '<td width="200">';
?>

<table width="90%" height="150" border="1">
  <tr>
    <td width="53%" height="150">
    <table width="90%" border="0">
      <tr>
        <td width="602">        
        <table width="78%" border="0.5" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><h5> N° Client:
              <?php $idf=$data['idf']; $Codebare=$data['id']; echo $Codebare;?>
            </h5>
			<img src="codeqrfonction_fact_paie.php?qr=<?=$Codebare?>&idf=<?=$idf?>" width="150" height="150"/>
			</td>
          </tr>
          <tr>
			</h4></td>
          </tr>
          <tr>
            <td><h5><?php echo $data['nomprenom'];?></h5></td>
          </tr>
          <tr>
            <td><?php echo $data['totalnet'];?> KMF </td>
          </tr>
        </table>
        
        </td>
      </tr>
  </table>
    </td>
  </tr>
</table>
  <?php
  echo '</td>';
}

}
 print '</tr>';
?>

    </tr>
</table>



</p>
</body>
</html>