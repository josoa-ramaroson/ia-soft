<?Php
@$nameproduit=$_GET['nameproduit'];
//$cat_id=2;
/// Preventing injection attack //// 
if(is_numeric($nameproduit)){
echo "Data Error";
exit;
 }
/// end of checking injection attack ////
require "fonction.php";

$sql="select DISTINCT(Validite) from $tbl_appproduit_entre where titre='$nameproduit'";
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data'=>$result);

echo json_encode($main);

?>