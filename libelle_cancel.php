<?php
    session_start();
    require 'fonction.php';
    
	$id=substr($_REQUEST["ID"],32);
	$sql5="DELETE FROM $tbl_libelle WHERE idL='$id'";
    $result5=mysqli_query($linki,$sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
    echo "ERROR";
    }
    ?>
<?php
header("location: libelle.php");
?>