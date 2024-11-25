<?php
    session_start();
    require 'fonction.php';

	
	$id=substr($_REQUEST["ID"],32);
	$id_role=$_REQUEST["Idrole"];
	$sql5="DELETE FROM $tb_role_user  where id_role_user='$id'";
    $result5=mysqli_query($linki,$sql5);
    if($result5){
    
    }
    else {
    echo "ERROR";
    }
    ?>
<?php
header("location: role_detail.php?id_role=$id_role");
?>
