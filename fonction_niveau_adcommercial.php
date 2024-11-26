	  <?php
 if(($_SESSION['u_niveau'] != 90)&& ($_SESSION['u_niveau'] != 91)&& ($_SESSION['u_niveau'] != 43)&&  ($_SESSION['u_niveau'] != 46)) {
	header("location:index.php?error=false");
	exit;
 }
      ?>