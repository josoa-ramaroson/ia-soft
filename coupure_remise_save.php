<?php
    require 'fonction.php';

$idf=substr($_REQUEST["idf"],32);

#---------------------------------------------------3 
$sqlp="update  $tbl_fact  set   bstatut='retablie' WHERE  idf='$idf'";
$resultp=mysqli_query($linki,$sqlp);
if($resultp){
}
else {
}
mysqli_close($linki);
?>
<?php
header("location: coupure_remise.php");
?>