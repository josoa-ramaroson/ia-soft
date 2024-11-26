<?php
	require 'fonction.php';
	
$id=addslashes($_POST['idp']);
$id_nom=addslashes($_POST['id_nom']);
$t1=addslashes($_POST['t1']);
$t2=addslashes($_POST['t2']);
$q=addslashes($_POST['q']);
$datetime=date("y/m/d H:i:s"); 

if(empty($t1) or empty($t2) or empty($q)) 
{ 
header("location: tarif.php"); 
}
#---------------------------------------------------3 

$sqlp="update $tbl_tarif set  id_nom='$id_nom', t1='$t1' , t2='$t2' ,  q='$q' ,datetime='$datetime' WHERE  idt='$id'";
$resultp=mysqli_query($linki,$sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysqli_close($linki);
?>
<?php
header("location: tarif.php");
?>