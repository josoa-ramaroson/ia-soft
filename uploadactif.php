 <?php
 
require 'fonction.php';

$sRequete ="update clienteda  SET   statut='7' WHERE CodeActivite!='Actif'";
	$sresult1=mysqli_query($linki,$sRequete);

?>
