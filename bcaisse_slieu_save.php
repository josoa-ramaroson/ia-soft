<?php
require 'fonction.php';

$id_nom=addslashes($_POST['id_nom']);
$organisme=addslashes($_POST['organisme']);



$sqlp="INSERT INTO $tbl_caisse_lieu ( id_nom  , organisme)
                    VALUES      ('$id_nom','$organisme')";								
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error());


header("location: bcaisse_slieu.php");


?>