<?php
require 'fonction.php';
require 'configuration.php';

$RefQuartier=addslashes($_REQUEST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_REQUEST['refville']);

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

$id_nom=addslashes($_REQUEST['id_nom']);
$nomprenom=addslashes($_REQUEST['nomprenom']);
$id=$_REQUEST['id'];
$date=addslashes($_REQUEST['date']);


$sql="update $tbl_contact  set id_nom='$id_nom', RefCommune='$RefCommune', RefLocalite='$RefLocalite', RefQuartier='$RefQuartier', quartier='$quartier' ,  ville='$ville',  secteur='$secteur' WHERE id='$id'";
$result=mysqli_query($linki,$sql);


   mysqli_close($linki); 
?>
<?php
	header("location:co_affichage_user_repartion.php");
?>
