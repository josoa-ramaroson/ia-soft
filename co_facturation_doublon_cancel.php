<?php
    session_start();
    require 'fonction.php';
	
	$idr=substr($_REQUEST["ID"],32);
	$id=$_REQUEST["i"];
    $s=$_REQUEST["s"];
	$a=$_REQUEST["a"];
	
	$sql5="DELETE FROM $tbl_fact WHERE idf='$idr' ";
	
    $result5=mysqli_query($linki,$sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
    echo "ERROR";
    }

header("location:co_facturation_doublon_detail.php?ID=$id&s=$s&a=$a");
?>