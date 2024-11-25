<?php

$idclient=addslashes($_POST['idclient']);
$id_nom=addslashes($_POST['id_nom']);
$idanomalie=addslashes($_POST['idanomalie']);
$realisateur=addslashes($_POST['realisateur']);
$taches=addslashes($_POST['taches']);
$statut=addslashes($_POST['statut']);
$dateinfo=date("y/m/d h:i:s"); //create date time

require 'fonction.php';

$sqlp="INSERT INTO $tbl_client_anom_suivi    ( id_nom   , idanomalie     ,realisateur,   taches   , statut   , dateinfo )
                    VALUES                  ('$id_nom' ,'$idanomalie', '$realisateur', '$taches' ,'$statut' ,'$dateinfo')";
					
													
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error());


	$sqlcon="update $tbl_client_anom set statut='$statut' where idanomalie='$idanomalie'";
    $connection=mysqli_query($linki,$sqlcon);
	



mysqli_close($linki);

?>
<?php
$id=md5(microtime()).$idanomalie;
$v1= md5(microtime());
header("location:client_anomalies_resoudre_intervension.php?id=$id&i=$v1");
?>