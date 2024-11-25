<?php
session_start();

	if(!isset($_SESSION['u_login'])|| empty($_SESSION['u_login'])) {
	header("location:index.php?error=false");
	exit;
 }
 
 	if(!isset($_SESSION['SID'])|| empty($_SESSION['SID'])) {
	header("location:index.php?error=false");
	exit;
 }
 
  	if($_SESSION['APP']!='111fc469d902d74a481bae7b217f4e58') {
	header("location:index.php?error=false");
	exit;
 }
 
    require 'session_start.php';
 
 
$jt=md5(md5($_SESSION['u_login']));
$sid1=$_SESSION['SID'];
?>