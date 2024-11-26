<?php
    session_start();
    require 'fonction.php';

	//$id=$_GET['ID'];
	$id=substr($_REQUEST["ID"],32);
	$sql5="DELETE FROM $tbl_com  WHERE idcom='$id'";
    $result5=mysqli_query($linki,$sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
    echo "ERROR";
    }
    ?>
<?php
header("location: communication.php");
?>