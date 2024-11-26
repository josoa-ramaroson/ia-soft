<?php
require 'fonction.php';

$RefQuartier=addslashes($_POST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_POST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysqli_query($linki,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 

$sql3 = "SELECT * FROM commune where ref_com=$RefCommune";
$result3 = mysqli_query($linki,$sql3);
while ($row3 = mysqli_fetch_assoc($result3)) {
$secteur=$row3['commune'];
} 
//$secteur=addslashes($_POST['commune']);

$id=$_POST['id'];
$id_nom=addslashes($_POST['id_nom']);

$sql="update $tbl_contact  set id_nom='$id_nom', RefCommune='$RefCommune', RefLocalite='$RefLocalite', RefQuartier='$RefQuartier', quartier='$quartier' ,  ville='$ville',  secteur='$secteur' WHERE id='$id'";
$result=mysqli_query($linki,$sql);

  if($result){
	 //SUCCESS
	 $idr=md5(microtime()).$id;
	header("location:re_affichage_user.php?id=$idr");
   }
   else {
echo "ERROR";
   }
  mysqli_close($linki); 
?>
