<?php
$u_login=addslashes($_POST['u_login']);

$datev=addslashes($_POST['datet1']);
$heures=addslashes($_POST['heures']);

$Ndh=addslashes($_POST['Ndh']);
$Ndm=addslashes($_POST['Ndm']);
$durree=$Ndh*60+$Ndm;

$DHM="$datev $heures + $durree minute ";
$Ajoutdurre=strtotime($DHM);
$date_heure_fin=date('Y-m-d H:i:s', $Ajoutdurre);

$datef=date('Y-m-d', $Ajoutdurre);
$heuresf=date('H:i:s', $Ajoutdurre);

//$datef=addslashes($_POST['datef']);
//$heuresf=addslashes($_POST['heuresf']);

$evenement=addslashes($_POST['evenement']);
$Pris_par_user=addslashes($_POST['id_nom']);


require 'fonction.php';

$sqlp="INSERT INTO $tb_evenement ( id_nom   , datev   ,heures, datef   ,heuresf, evenement ,  Pris_par_user)
                    VALUES       ('$u_login','$datev', '$heures', '$datef', '$heuresf','$evenement' , '$Pris_par_user')";
					
													
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error());
mysqli_close($linki);

?>
<?php
$idva=md5(microtime()).md5(microtime());
header("location: evenement.php?datet2=$datev&$idva");
?>