<?php
session_start();

	if(!isset($_SESSION['pwd'])|| empty($_SESSION['pwd'])) {
	header("location:index.php?error=false");
	exit;
 }
 
 	if(!isset($_SESSION['id'])|| empty($_SESSION['id'])) {
	header("location:index.php?error=false");
	exit;
 }
 
  	if($_SESSION['s']!='8969b6b78258738cd6edb200a1f0ebaf') {
	header("location:index.php?error=false");
	exit;
 }
 
?>