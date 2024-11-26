<?php
	require 'fonction.php';

$mr1=addslashes($_REQUEST['mr1']);
$bstatut=addslashes($_REQUEST['bstatut']);
$idf=substr($_REQUEST["idf"],32);

$sql1 = "SELECT * FROM $tbl_fact where idf=$idf";
$result1 = mysqli_query($linki,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
$totalneti=$row1['totalnet'];
$reporti=$row1['report'];
$bstatuti= $row1['bstatut'];
}  

if ($bstatuti!='retard') {
$Pre='1000';
$totalnet=$totalneti+$Pre;
$report=$reporti+$Pre;
} else 
{
$Pre='1000';
$totalnet=$totalneti;
$report=$reporti;	
}


#---------------------------------------------------3 
$sqlp="update  $tbl_fact  set   bstatut='$bstatut' , Pre='$Pre' , totalnet='$totalnet' , report='$report' WHERE  idf='$idf'";
$resultp=mysqli_query($linki,$sqlp);
if($resultp){
}
else {
}
mysqli_close($linki);
header("location: coupure_releveur.php?mr1=$mr1");
?>