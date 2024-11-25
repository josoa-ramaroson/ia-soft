<?php
    require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);

$idf=substr($_REQUEST["idf"],32);
$m1v=substr($_REQUEST["m1v"],32);
$m2q=substr($_REQUEST["m2q"],32);

#---------------------------------------------------3 
$sqlp="update  $tbl_fact  set   bstatut='couper' WHERE  idf='$idf'";
$resultp=mysql_query($sqlp);
if($resultp){
}
else {
}
mysql_close();
?>
<?php
$m1vd=md5(microtime()).$m1v;
$m2qd=md5(microtime()).$m2q;
header("location: coupure_NPaye.php?m1v=$m1vd&m2q=$m2qd");
?>