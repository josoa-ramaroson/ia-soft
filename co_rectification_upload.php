<?php
require 'fonction.php';
require 'configuration.php';
$idr=substr($_REQUEST["idr"],32);
$controle=substr($_REQUEST["controle"],32);
$id_nom=substr($_REQUEST["ix"],32);

if ($controle==2) {
$sqlp="update $tbl_recact  set  controle='$controle' , certifier='$id_nom' WHERE  idr='$idr'";
} else

{
$sqlp="update $tbl_recact  set  controle='$controle' , valider='$id_nom' WHERE  idr='$idr'";
} 
$resultp=mysql_query($sqlp);
header("location:co_rectification.php");
mysql_close($link);
?>