 <?php
 
require 'fonction.php';

$sRequete ="INSERT INTO billingsave (id, ci, st , nserie, annee , nfacture) SELECT id, ci, st, nserie, fannee, nfacture FROM billing";
	$sresult1=mysqli_query($linki,$sRequete);


?>

