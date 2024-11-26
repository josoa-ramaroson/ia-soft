<?php
    require 'fonction.php';
 
$TypeClts=addslashes($_POST['TypeClts']);
#---------------------------------------------------3 
$sqlp="INSERT INTO $tbl_client (TypeClts) VALUES ('$TypeClts')";
$resultp=mysqli_query($linki,$sqlp);
if($resultp){
}
else {
echo "ERROR";
}
?>
<?php
header("location: categorie.php");
?>