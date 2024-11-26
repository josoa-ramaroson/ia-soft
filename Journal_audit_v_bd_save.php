 <?
 
 require 'fonction.php';
 $le_path= $_SERVER['PHP_SELF']; // $path = /home/httpd/html/index.php
 $le_file = basename ($le_path);
 $date_Audit=date("y/m/d H:i:s"); 
 $Ip_user=$_SERVER['REMOTE_ADDR']; 
 //$Ip_user=''; 
 	if(!isset($id_nom)|| empty($id_nom)) {

$sjournal_audit="INSERT INTO $tbl_journal_audit (le_file,Ip_user,date_Audit)VALUES('$le_file','$Ip_user','$date_Audit')";
$Rjournal_audit=mysqli_query($linki,$sjournal_audit)
or die(mysqli_error($linki));
mysqli_close($linki);  	
	}
	else
	{
$sjournal_audit="INSERT INTO $tbl_journal_audit (id_nom,le_file,Ip_user,date_Audit)VALUES('$id_nom','$le_file','$Ip_user','$date_Audit')";
$Rjournal_audit=mysqli_query($linki,$sjournal_audit)
or die(mysqli_error($linki));
mysqli_close($linki);
    }
  ?>