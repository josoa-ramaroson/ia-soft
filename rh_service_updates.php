<?php
  require 'fonction.php';

$idser=addslashes($_POST['idser']);
$iddr=addslashes($_POST['iddr']);
$service=addslashes($_POST['service']);

$sqlp="update  $tb_rhservice set service='$service', iddr='$iddr'  WHERE  idser='$idser'";
$resultp=mysql_query($sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysql_close();
?>
<?php
header("location: rh_service.php");
?>