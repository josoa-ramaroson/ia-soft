<?php
    session_start();
    require 'fonction.php';
	$id=substr($_REQUEST["ID"],32);
	$sql5="DELETE FROM $tbl_paiement_bach WHERE idpb='$id'";
    $result5=mysqli_query($linki,$sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
    echo "ERROR";
    }
	mysqli_close($linki);
    ?>
<?php
header("location: paiement_bach_transfert.php");
?>