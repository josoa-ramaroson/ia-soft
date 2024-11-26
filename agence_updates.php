<?php
require 'fonction.php';

$id=addslashes($_POST['idp']);

$id_nom=addslashes($_POST['id_nom']);
	
$a_nom=addslashes($_POST['mnom']);

$a_adresse=addslashes($_POST['madresse']);

$a_tel=addslashes($_POST['mtel']);

$a_statut=addslashes($_POST['mstatut']);

$datetime=date("y/m/d H:i:s");  


if(empty($a_nom)) 
{ 
exit(); 
}
#---------------------------------------------------3 
$sqlp="update  $tbl_agence  set  id_nom='$id_nom', a_nom='$a_nom' , a_adresse='$a_adresse' ,  a_tel='$a_tel' , id_a='$id' ,  a_statut='$a_statut' , datetime='$datetime'  WHERE  id_a='$id'";
$resultp=mysqli_query($linki, $sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysqli_close($linki);
?>
<?php
header("location: agence.php");
?>