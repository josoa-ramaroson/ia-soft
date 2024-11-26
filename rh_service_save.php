<?php
    require 'fonction.php';
 
	
$iddr=addslashes($_POST['iddr']);
$service=addslashes($_POST['service']);

#---------------------------------------------------3 
$sqlp="INSERT INTO $tb_rhservice (iddr, service) VALUES ('$iddr', '$service' )";
$resultp=mysqli_query($linki,$sqlp);
if($resultp){
}
else {
echo "ERROR";
}
?>
<?php
header("location: rh_service.php");
?>