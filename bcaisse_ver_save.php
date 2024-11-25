<?php
require 'fonction.php';

$id_nom=addslashes($_POST['id_nom']);
$date=addslashes($_POST['date']);
$Montant=addslashes($_POST['Montant']);
$organisme=addslashes($_POST['Institution']);
$nversement=addslashes($_POST['nversement']);

if ($date=='0000-00-00')
{
header("location:  bcaisse_ver.php");
}
else
{

$sqlp="INSERT INTO $tbl_caisse_ver  ( id_nom  ,  date,Montant , organisme, nversement )
                    VALUES      ('$id_nom','$date','$Montant', '$organisme', '$nversement')";								
$r=mysqli_query($linki,$sqlp)
or die(mysqli_error());
}

header("location: bcaisse_ver.php");


?>