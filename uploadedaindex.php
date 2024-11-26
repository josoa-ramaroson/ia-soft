 <?php
$csv = new SplFileObject('index.csv', 'r');
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
    <td width="20%"><?php $nom=addslashes($ligne[1]);   //echo $ligne[1];?></td>
    <td width="26%"><?php $index=addslashes($ligne[2]);      //echo $ligne[2];?></td>
    <td width="18%"><?php $date=addslashes($ligne[3]);       //echo $ligne[3];?></td>
  </tr>
</table>

<?php

$valeur_existant = "SELECT COUNT(*) AS nb FROM billing  WHERE Police='$Police'";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{ 	
$sRequete ="update billing  SET   nf='$index' WHERE Police='$Police'";
	$sresult1=mysqli_query($linki,$sRequete);
}
else 
{
echo "$Police  $nom  $index   " ;
}
}
?>
