 <?php
$csv = new SplFileObject('avoir.csv', 'r');
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(';', '"', '"');
 
require 'fonction.php';

?>
<?php
//foreach($csv as $ligne)
foreach(new LimitIterator($csv, 1) as $ligne)
{
?>  
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="14%"><?php $Police=addslashes($ligne[0]);  //echo $ligne[0];?> </td>
    <td width="20%"><?php $report=addslashes($ligne[1]);   //echo $ligne[1];?></td>
  </tr>
</table>

<?php

$valeur_existant = "SELECT COUNT(*) AS nb FROM billing  WHERE Police='$Police'";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{ 	
$sRequete ="update billing  SET report='$report',  ci='ci' , st='E' , fannee='2015',nserie='7' , nfacture='impN1', etat='facture',bstatut='saisie',impression='saisie'  WHERE Police='$Police'";
	$sresult1=mysqli_query($linki,$sRequete);
	
	
}
else 
{
echo "$Police" ;
}
}
?>
