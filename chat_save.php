<?
// Enregistrer des informations
$SID1=addslashes($_POST['SID1']);
$SID2=addslashes($_POST['SID2']);
$SID3=addslashes($_POST['SID3']);
$message=addslashes($_POST['message']);
require 'chat_smileys.php';
$nbligne=addslashes($_POST['nbligne']);
$datetime=date("y/m/d h:i:s"); 
	require 'fonction.php';

$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);
$sql="INSERT INTO $tbl_message (SID1,SID2,message,datetime) VALUES('$SID1','$SID2','$message','$datetime')";
$result=mysql_query($sql);

$sqlnb = "SELECT count(*) FROM $tbl_ind where sid1=$SID1 and   sid2=$SID2 ";
$reqnb = mysql_query($sqlnb);
$datanb = mysql_fetch_array($reqnb);  
mysql_free_result($reqnb);  
 
if ($datanb[0]) { 
   $sqlnb="UPDATE  $tbl_ind SET nbligne= $nbligne WHERE sid1=$SID1 and sid2=$SID2";
    $reqnb = mysql_query($sqlnb);  
}  
else {  
   $sqlnb="INSERT INTO $tbl_ind (SID1,SID2,nbligne) VALUES('$SID1','$SID2','$nbligne')";
   $reqnb = mysql_query($sqlnb); 
}  


mysql_close();
header("location:chat.php?sid1=$SID1&sid2=$SID2");
?>
