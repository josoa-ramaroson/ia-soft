	  <?
if(($_SESSION['u_niveau'] != 2) && ($_SESSION['u_niveau'] != 43) && ($_SESSION['u_niveau'] != 8)&& ($_SESSION['u_niveau'] != 3) &&  ($_SESSION['u_niveau'] != 90) && ($_SESSION['u_niveau'] != 80)&& ($_SESSION['u_niveau'] != 60) && ($_SESSION['u_niveau'] != 70)&& ($_SESSION['u_niveau'] != 46) ) {
	header("location:index.php?error=false");
	exit;
 }
      ?>