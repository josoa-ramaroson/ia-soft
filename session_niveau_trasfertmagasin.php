<?php
 if(($_SESSION['u_niveau'] != 2)&& ($_SESSION['u_niveau'] != 4)&& ($_SESSION['u_niveau'] !=3)
	    && ($_SESSION['u_niveau'] != 40) && ($_SESSION['u_niveau'] != 45)&& ($_SESSION['u_niveau'] !=7)&& ($_SESSION['u_niveau'] != 90)){
	header("location:index.php?error=false");
	exit;
 }
?>