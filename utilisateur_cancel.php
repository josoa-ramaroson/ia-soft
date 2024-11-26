<?php
    session_start();
	require 'fonction.php';

	$id=substr($_REQUEST["ID"],32);
	
	$sql5="DELETE FROM $tbl_utilisateur WHERE id_u='$id'";
    $result5=mysqli_query($linki,$sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
    echo "ERROR";
    }
    ?>
<?php
header("location: utilisateur.php");
?>