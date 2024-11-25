<?Php
@$idrh=$_GET['idrh'];
//$cat_id=2;
/// Preventing injection attack //// 
if(!is_numeric($idrh)){
echo "Data Error";
exit;
 }
/// end of checking injection attack ////
require "fonction.php";

$sql="select * from $tb_rhservice where iddr='$idrh'";
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data'=>$result);
echo json_encode($main);
?>