<?php
    session_start();
	require 'fonction.php';

	$id=substr($_REQUEST["ID"],32);
	
	$sql5="DELETE FROM $tb_evenement  WHERE idev='$id'";
    $result5=mysqli_query($linki,$sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
    echo "ERROR";
    }
	$idf=md5(microtime()).$id; 
    ?>
<?php
header("location:evenement_user.php");
?>