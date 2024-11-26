<?php
    session_start();
    require 'fonction.php';
  
	
	$idr=substr($_REQUEST["ID"],32);

	$sql5="DELETE FROM $tbl_paiement WHERE idp='$idr'";
    $result5=mysqli_query($linki,$sql5);
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