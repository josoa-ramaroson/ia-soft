<?php
    session_start();
	require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);
	
	$id=substr($_REQUEST["ID"],32);
	
	$sql5="DELETE FROM $tbl_utilisateur WHERE id_u='$id'";
    $result5=mysql_query($sql5);
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