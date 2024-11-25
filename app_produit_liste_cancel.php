<?php
    session_start();
    require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);
	
	$idproduit=$_GET['ID'];
	
	$sql5="DELETE FROM $tbl_produit WHERE idproduit='$idproduit'";
    $result5=mysql_query($sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
    echo "ERROR";
    }
header("location: stk_produit.php");
?>