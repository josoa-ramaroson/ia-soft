<?php
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

//IDENTIFICATION CODE QUARTIER """""""""""""""""""""""""""""""""
$RefQuartier=addslashes($_POST['quartier']);
$refville=addslashes($_POST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($result1)) {
$bquartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
$bville=$row2['ville'];
} 

$blogin=addslashes($_POST['blogin']);

$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_saisie  WHERE blogin='$blogin' ";
$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
$nb = mysql_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{
$sqlp="update  $tbl_saisie  set  bquartier='$bquartier' , bville='$bville'  WHERE blogin='$blogin' ";
$resultp=mysql_query($sqlp);
header("location: bsaisie.php");
}
else 
{

$sqlp="INSERT INTO $tbl_saisie  ( blogin  , bville , bquartier)
                    VALUES      ('$blogin','$bville', '$bquartier')";								
$r=mysql_query($sqlp)
or die(mysql_error());
mysql_close($link);
header("location: bsaisie.php");
}
?>