<?php
    require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);

$idf=substr($_REQUEST["idf"],32);

#---------------------------------------------------3 
$sqlp="update  $tbl_fact  set   bstatut='retablie' WHERE  idf='$idf'";
$resultp=mysql_query($sqlp);
if($resultp){
}
else {
}
mysql_close();
?>
<?php
header("location: coupure_remise.php");
?>