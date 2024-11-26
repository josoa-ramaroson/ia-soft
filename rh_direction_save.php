<?php
require 'fonction.php';
	
$id_nom=addslashes($_POST['id_nom']);
$direction=addslashes($_POST['direction']);

#---------------------------------------------------3 
$sqlp="INSERT INTO $tb_rhdirection (id_nom, direction) VALUES ('$id_nom', '$direction' )";
$resultp=mysqli_query($linki,$sqlp);
if($resultp){
}
else {
echo "ERROR";
}
?>
<?php
header("location: rh_direction.php");
?>