<?php

    session_start();
	require 'fonction.php';
	
	$iddocument=substr($_REQUEST["ID"],32);
	$idclient=substr($_REQUEST["idc"],32);
	
	$v1= md5(microtime());
	
	$sql5="DELETE FROM $tbl_client_doc  WHERE  iddocument='$iddocument' ";
    $result5=mysqli_query($linki,$sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
    echo "ERROR";
    }

header("location:client_document.php?id=$v1$idclient&i=$v1");
?>