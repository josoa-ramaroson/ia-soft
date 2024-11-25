<?php
    session_start();
    require 'fonction.php';

	$ipaie=substr($_REQUEST["ipaie"],32);
	$sql5="DELETE FROM $tb_rhpaie WHERE ipaie='$ipaie'";
    $result5=mysql_query($sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
    echo "ERROR";
    }
    ?>
<?php
header("location: rh_employer_paie.php");
?>