<?php
    require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);
	
$iddr=addslashes($_POST['iddr']);
$service=addslashes($_POST['service']);

#---------------------------------------------------3 
$sqlp="INSERT INTO $tb_rhservice (iddr, service) VALUES ('$iddr', '$service' )";
$resultp=mysql_query($sqlp);
if($resultp){
}
else {
echo "ERROR";
}
?>
<?php
header("location: rh_service.php");
?>