 <?php
$csv = new SplFileObject('plomb.csv', 'r');
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
    <td width="14%"><?php $Police=addslashes($ligne[0]);  //echo $ligne[0];?> </td>
    <td width="20%"><?php $ncompteur=addslashes($ligne[1]);   //echo $ligne[1];?></td>
    <td width="26%"><?php $c1=addslashes($ligne[2]);      //echo $ligne[2];?></td>
    <td width="18%"><?php $c2=addslashes($ligne[3]);       //echo $ligne[3];?></td>
    <td width="22%"><?php $c3=addslashes($ligne[4]);      //echo $ligne[4];?></td>
    <td width="22%"><?php $c4=addslashes($ligne[5]);      //echo $ligne[4];?></td>
  </tr>
</table>

<?php

$valeur_existant = "SELECT COUNT(*) AS nb FROM plombage  WHERE Police='$Police'";
$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
$nb = mysql_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{ 	
$sRequete ="update plombage  SET   c1='$c1', c2='$c2' ,  c3='$c3',  c4='$c4' WHERE Police='$Police'";
	$sresult1=mysql_query($sRequete);
}
else 
{
echo "$Police  $c1  $c2  $c3  $c4 " ;
}
}
?>
