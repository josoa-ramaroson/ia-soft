 <?php
 
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

$sRequete ="INSERT INTO billingsave (id, ci, st , nserie, annee , nfacture) SELECT id, ci, st, nserie, fannee, nfacture FROM billing";
	$sresult1=mysql_query($sRequete);


?>

