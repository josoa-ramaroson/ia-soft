<?php
    session_start();
	require 'fonction.php';
	$sid1=$_GET['sid1'];
    $sid2=$_GET['sid2'];

	$id=substr($_REQUEST["ID"],32);
	
	$sql5="DELETE FROM $tbl_message  WHERE id_chat='$id'";
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
header("location:chat.php?sid1=$sid1&sid2=$sid2&$idf");
?>