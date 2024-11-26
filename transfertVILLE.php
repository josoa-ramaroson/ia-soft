 <?php
$csv = new SplFileObject('VILLE.csv', 'r');
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
    <td width="20%"><?php $refville=addslashes($ligne[0]);   echo $ligne[0];?></td>
    <td width="20%"><?php $ville=addslashes($ligne[1]);      echo $ligne[1];?></td>
  </tr>
</table>

<?php
$valeur_existant = "SELECT COUNT(*) AS nb FROM ville  WHERE ville='$ville' ";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{

}

else 

{
$sql="INSERT INTO ville (refville,ville)

VALUES
( '$refville' ,'$ville')";
$result=mysqli_query($linki,$sql); 

}
}
?>
