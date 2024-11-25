<?php

$id_nom=addslashes($_POST['id_nom']);
$idclient=addslashes($_POST['idclient']);
$datetinfo=date("y/m/d h:i:s"); //create date time
$description=addslashes($_POST['description']);
$niveau=addslashes($_POST['niveau']);
$statut=addslashes($_POST['statut']);
$service=addslashes($_POST['service']);

require 'fonction.php';

$sqlp="INSERT INTO $tbl_client_anom  ( id_nom   , idclient  ,   description   , service,    datetinfo ,    niveau  , statut)
                    VALUES           ('$id_nom' , '$idclient',  '$description' , '$service' , '$datetinfo' , '$niveau' , '$statut' )";
					
													
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error());
mysqli_close($linki);

header("location:client_anomalies.php");
?>