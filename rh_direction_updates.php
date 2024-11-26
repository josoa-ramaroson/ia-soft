<?php
  require 'fonction.php';

$idrh=addslashes($_POST['idrh']);
//echo "$idproduit <BR>";	
$id_nom=addslashes($_POST['id_nom']);
$direction=addslashes($_POST['direction']);

$sqlp="update  $tb_rhdirection set direction='$direction', id_nom='$id_nom'  WHERE  idrh='$idrh'";
$resultp=mysqli_query($linki,$sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysqli_close($linki);
?>
<?php
header("location: rh_direction.php");
?>