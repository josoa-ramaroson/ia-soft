 <?php
 
require 'fonction.php';

$sRequete ="INSERT INTO plombage (id, Police) SELECT id,Police FROM clienteda";
	$sresult1=mysqli_query($linki,$sRequete);

?>

