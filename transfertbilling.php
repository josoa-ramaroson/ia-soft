 <?php
 
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

$sRequete ="INSERT INTO billing (id, Police , bnom , bquartier, nf, date ) SELECT id, Police, nomprenom, quartier , Indexinitial, '2015-08-12' FROM clienteda";
	$sresult1=mysql_query($sRequete);

?>

