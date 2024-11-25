 <?php
 
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

$sRequete ="INSERT INTO plombage (id, Police) SELECT id,Police FROM clienteda";
	$sresult1=mysql_query($sRequete);

?>

