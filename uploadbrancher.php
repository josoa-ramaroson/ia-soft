 <?php
$csv = new SplFileObject('br.csv', 'r');
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
  </tr>
</table>

<?php
$sRequete ="update $tbl_contact  SET statut='4' WHERE Police='$Police'";
$sresult1=mysqli_query($linki,$sRequete);
}
?>
