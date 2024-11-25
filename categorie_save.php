<?php
    require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);
	
$TypeClts=addslashes($_POST['TypeClts']);
#---------------------------------------------------3 
$sqlp="INSERT INTO $tbl_client (TypeClts) VALUES ('$TypeClts')";
$resultp=mysql_query($sqlp);
if($resultp){
}
else {
echo "ERROR";
}
?>
<?php
header("location: categorie.php");
?>