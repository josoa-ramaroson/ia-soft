<?php
  require 'fonction.php';

$idtclient=addslashes($_POST['idtclient']);
//echo "$idproduit <BR>";	
$TypeClts=addslashes($_POST['TypeClts']);
$sqlp="update  $tbl_client set TypeClts='$TypeClts' WHERE  idtclient='$idtclient'";
$resultp=mysql_query($sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysql_close();
?>
<?php
header("location: categorie.php");
?>