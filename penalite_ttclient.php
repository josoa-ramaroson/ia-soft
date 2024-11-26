<?php
	ini_set("memory_limit","1024M");
	ini_set("max_execution_time",1000);
	
	require 'fonction.php';
	require 'configuration.php';
	
 

$sql1 = "SELECT * FROM $tbl_fact f   where Pre!='1000' and (etat='facture' or etat='accompte') and st='E'  and  f.report > 1000 and nserie='$cserie' and f.fannee='$anneec'";

//$sql1 = "SELECT * FROM $tbl_fact f, $tbl_contact c  where Pre!='1000' and (etat='facture' or etat='accompte') and st='E' and c.id=f.id and  f.report > 1000 and nserie='$cserie' and f.fannee='$anneec'";

$result1 = mysqli_query($linki,$sql1);

while ($row1 = mysqli_fetch_array($result1)) {
$totalneti=$row1['totalnet'];
$reporti=$row1['report'];
$idfi=$row1['idf'];


$Pre='1000';
$totalnet=$totalneti+$Pre;
$report=$reporti+$Pre;

#---------------------------------------------------3 

$sqlp="update  $tbl_fact f  set   bstatut='retard' , Pre='$Pre' , totalnet='$totalnet' , report='$report' WHERE   Pre!='1000' and (etat='facture' or etat='accompte') and st='E' and idf='$idfi' ";

//$sqlp="update  $tbl_fact f , $tbl_contact c   set   bstatut='retard' , Pre='$Pre' , totalnet='$totalnet' , report='$report' WHERE   Pre!='1000' and (etat='facture' or etat='accompte') and st='E' and idf='$idfi' ";

$resultp=mysqli_query($linki,$sqlp);
} 

mysqli_close($linki);
header("location: penalite.php?a=1");
?>