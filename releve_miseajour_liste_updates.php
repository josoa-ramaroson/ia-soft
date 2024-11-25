<?php
require 'fonction.php';
require 'configuration.php';

$quartier=addslashes($_REQUEST['rq']);
$refville=addslashes($_REQUEST['rv']);

$id=addslashes($_REQUEST['id']);
$miseajour=addslashes($_REQUEST['miseajour']);

$sql="update $tbl_contact  set ncompteur='$miseajour' WHERE id='$id'";
$result=mysqli_query($linki,$sql);

$ch=md5(microtime());

 mysqli_close($linki); 
?>
<?php
	header("location:releve_miseajour_liste.php?$ch&quartier=$quartier&$ch&refville=$refville&$ch");
?>
