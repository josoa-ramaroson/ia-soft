<?php
    session_start();
    require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);

	//$id=$_GET['ID'];
	$id=substr($_REQUEST["id"],32);
	$id_dem=substr($_REQUEST["ids"],32);
	$sql5="DELETE FROM $tbl_appdeproduit WHERE id_dp='$id'";
    $result5=mysql_query($sql5);
    if($result5){
    }
    else {
    echo "ERROR";
    }
    ?>
<?php
$idr=md5(microtime()).$id_dem;
header("location:app_demande_produit.php?id=$idr");
?>