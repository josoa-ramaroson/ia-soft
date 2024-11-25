<?php
    session_start();
    require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);
	
	$idr=substr($_REQUEST["ID"],32);

	$sql5="DELETE FROM $tbl_paiement WHERE idp='$idr'";
    $result5=mysql_query($sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
    echo "ERROR";
    }
    ?>
<?php
header("location:paiement_doublon.php");
?>