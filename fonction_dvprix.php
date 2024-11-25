<?Php
@$idproduit=$_GET['idproduit'];
//$cat_id=2;
/// Preventing injection attack //// 
if(!is_numeric($idproduit)){
echo "Data Error";
exit;
 }
/// end of checking injection attack ////
require "fonction.php";

$sql="select prix, idproduit from ginv_produit where idproduit='$idproduit'";
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data'=>$result);
echo json_encode($main);
?>