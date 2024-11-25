 <?php
 
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

$sRequete ="update clienteda  SET   statut='7' WHERE CodeActivite!='Actif'";
	$sresult1=mysql_query($sRequete);

?>
