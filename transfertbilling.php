 <?php
 
require 'fonction.php';

$sRequete ="INSERT INTO billing (id, Police , bnom , bquartier, nf, date ) SELECT id, Police, nomprenom, quartier , Indexinitial, '2015-08-12' FROM clienteda";
	$sresult1=mysqli_query($linki,$sRequete);

?>

