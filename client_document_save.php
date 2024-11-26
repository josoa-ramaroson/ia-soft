<?php

$id_nom=addslashes($_POST['id_nom']);
$nom=addslashes($_POST['nom']);
$prenom=addslashes($_POST['prenom']);
$idclient=addslashes($_POST['idclient']);
$titre=addslashes($_POST['titre']);

$datetinfo=date("y/m/d H:i:s"); 
$date=date("y/m/d"); 

$description=$nom.' '.$prenom.' '.$idclient.' '.$titre.' '.$date;

require 'fonction.php';

$sqlp="INSERT INTO $tbl_client_doc  ( id_nom   , idclient  , titre,   description   , datetinfo )
                    VALUES       ('$id_nom','$idclient', '$titre', '$description' ,'$datetinfo')";
					
													
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error($linki));
mysqli_close($linki);


$id=md5(microtime()).$idclient;
header("location:client_document.php?id=$id");
?>