<?php
	require 'fonction.php';
	require 'configuration.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);

$RefQuartier=addslashes($_POST['quartier']);
$refville=addslashes($_POST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 

    $m1v=$ville;
	$m2q=$quartier;
	
$sql1 = "SELECT * FROM $tbl_fact f, $tbl_contact c  where Pre!='1000' and (etat='facture' or etat='accompte') and st='E' and c.id=f.id and c.ville='$m1v' and  c.quartier='$m2q' and f.report > 1000 and nserie='$cserie' and f.fannee='$anneec'";
$result1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($result1)) {
$totalneti=$row1['totalnet'];
$reporti=$row1['report'];
$idfi=$row1['idf'];
 

$Pre='1000';
$totalnet=$totalneti+$Pre;
$report=$reporti+$Pre;

#---------------------------------------------------3 
$sqlp="update  $tbl_fact f , $tbl_contact c   set   bstatut='retard' , Pre='$Pre' , totalnet='$totalnet' , report='$report' WHERE   Pre!='1000' and (etat='facture' or etat='accompte') and st='E' and c.ville='$m1v' and  c.quartier='$m2q' and idf='$idfi' ";
$resultp=mysql_query($sqlp);

}
mysql_close();
header("location: penalite.php?a=1");
?>