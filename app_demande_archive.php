<?php
    session_start();
    require 'fonction.php';
  
	//$id=$_GET['ID'];
	$id=substr($_REQUEST["ID"],32);
	$sql5="update $tbl_appdemande set statut='Finaliser' WHERE id_dem='$id'";
    $result5=mysqli_query($linki, $sql5);
    if($result5){
    }
    else {
    echo "ERROR";
    }
    ?>
<?php
header("location: app_demande.php");
?>