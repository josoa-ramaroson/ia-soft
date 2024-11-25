<?php
    session_start();
    require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);

	//$id=$_GET['ID'];
	$id=substr($_REQUEST["ID"],32);
	$sql5="update $tbl_appbonachat set statut='Finaliser' WHERE id_dem='$id'";
    $result5=mysql_query($sql5);
    if($result5){
    }
    else {
    echo "ERROR";
    }
    ?>
<?php
header("location: app_bonachat.php");
?>