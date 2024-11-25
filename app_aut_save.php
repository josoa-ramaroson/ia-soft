<?php
$date=addslashes($_POST['date']);
$service=addslashes($_POST['service']);
$Nature=addslashes($_POST['Nature']);
$Motif=addslashes($_POST['Motif']);
$Montant=addslashes($_POST['Montant']);
$id_nom=addslashes($_POST['id_nom']);

require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

$sqlp="INSERT INTO $tbl_appaut   ( id_nom   , service    ,  Nature   , Motif  , Montant ,date )
                    VALUES       ('$id_nom','$service',  '$Nature' ,'$Motif' ,'$Montant','$date')";
					
													
$r=mysql_query($sqlp)
or die(mysql_error());
mysql_close($link);

?>
<?php
header("location: app_aut.php");
?>