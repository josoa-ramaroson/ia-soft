<?php
    session_start();
    require 'fonction.php';
	
if(($_SESSION['u_niveau']!= 7) &&($_SESSION['u_niveau']!= 10)) {
	header("location:index.php?error=false");
	exit;
 }
 
	$sql5="UPDATE  $tbl_fact SET syn=1 where miseajours=1";
    $result5=mysqli_query($linki,$sql5);
    if($result5){
    //echo " cancel ";
    }
    else {
   // echo "ERROR";
    }
	mysqli_close($linki);
    ?>
<?php
header("location: xbackup.php");
?>