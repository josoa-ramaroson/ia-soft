 <?php
$csv = new SplFileObject('impaye.csv', 'r');
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(';', '"', '"');
 
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

?>
<?php
//foreach($csv as $ligne)
foreach(new LimitIterator($csv, 1) as $ligne)
{
?>  
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="20%"><?php $Police=addslashes($ligne[0]);      //echo $ligne[0];?></td>
    <td width="20%"><?php $solde=addslashes($ligne[1]);      //echo $ligne[1];?></td>
  </tr>
</table>

<?php

$sql="INSERT INTO impayee (police, solde) VALUES ( '$Police', '$solde')";
$result=mysql_query($sql); 

}

?>
