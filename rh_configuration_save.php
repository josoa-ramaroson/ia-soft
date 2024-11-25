<?php
require 'fonction.php';

$blogin=addslashes($_POST['blogin']);
$taux=addslashes($_POST['taux']);
$mois=addslashes($_POST['mois']);
$annee=addslashes($_POST['annee']);

$aigr=addslashes($_POST['aigr']);
$acr=addslashes($_POST['acr']);

$valeur_existant = "SELECT COUNT(*) AS nb FROM $tb_rhconfig  WHERE rhc='1' ";
$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
$nb = mysql_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{
$sqlp="update  $tb_rhconfig  set  id_nom='$blogin', taux='$taux' , mois='$mois', annee='$annee' , aigr='$aigr', acr='$acr'  WHERE rhc='1'  ";
$resultp=mysql_query($sqlp);
header("location: rh_configuration.php");
}
else 
{

$sqlp="INSERT INTO $tb_rhconfig  ( id_nom  , taux  , mois ,  annee , aigr, acr)
                    VALUES      ('$blogin', '$taux', '$mois', '$annee', '$aigr', '$acr' )";								
$r=mysql_query($sqlp)
or die(mysql_error());
mysql_close($link);
header("location: rh_configuration.php");
}
?>