<?php
  require 'fonction.php';

$idtclient=addslashes($_POST['idtclient']);
//echo "$idproduit <BR>";	
$TypeClts=addslashes($_POST['TypeClts']);
$sqlp="update  $tbl_client set TypeClts='$TypeClts' WHERE  idtclient='$idtclient'";
$resultp=mysqli_query($linki,$sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysqli_close($linki);
?>
<?php
header("location: categorie.php");
?>