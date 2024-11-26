 <?php
$csv = new SplFileObject('quartier.csv', 'r');
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
    <td width="20%"><?php $id_ville=addslashes($ligne[0]);   echo $ligne[0];?></td>
    <td width="20%"><?php $id_quartier=addslashes($ligne[1]);      echo $ligne[1];?></td>
    <td width="20%"><?php $quartier=addslashes($ligne[2]);      echo $ligne[2];?></td>
  </tr>
</table>

<?php
$valeur_existant = "SELECT COUNT(*) AS nb FROM quartier  WHERE id_quartier='$id_quartier' ";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{

}

else 

{
$sql="INSERT INTO quartier (id_ville,id_quartier,quartier)

VALUES
( '$id_ville','$id_quartier', '$quartier')";
$result=mysqli_query($linki,$sql); 

}
}
?>
