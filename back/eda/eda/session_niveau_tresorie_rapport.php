<?
if(($_SESSION['u_niveau'] != 6)&& ($_SESSION['u_niveau'] != 7)&& ($_SESSION['u_niveau'] != 20)&& ($_SESSION['u_niveau'] != 90) ) {
  header("location:index.php?error=false");
  exit;
 }
?>