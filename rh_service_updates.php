<?php
  require 'fonction.php';

$idser=addslashes($_POST['idser']);
$iddr=addslashes($_POST['iddr']);
$service=addslashes($_POST['service']);

$sqlp="update  $tb_rhservice set service='$service', iddr='$iddr'  WHERE  idser='$idser'";
$resultp=mysqli_query($linki,$sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysqli_close($linki);
?>
<?php
header("location: rh_service.php");
?>