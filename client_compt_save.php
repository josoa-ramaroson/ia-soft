<?php
$id_client=addslashes($_POST['id_client']);
$nom_client=addslashes($_POST['nom_client']);
$service='20';
$Nomcompt=addslashes($_POST['Nomcompt']);
$Nsend=addslashes($_POST['Nsend']);
$montant=addslashes($_POST['montant']);
$Banque=addslashes($_POST['Banque']);
$dated=addslashes($_POST['date']);
$note='Il y a eu une virement de ';

require 'fonction.php';
$sqlp="INSERT INTO $tb_echangagent  (id_client   , nom_client   ,service,  Nomcompt   , Nsend, montant, Banque , dated , note)
                    VALUES       ('$id_client','$nom_client',  '$service' ,'$Nomcompt', '$Nsend' , '$montant', '$Banque', '$dated', '$note' )";
					
													
$r=mysql_query($sqlp);
mysql_close($link);

?>
<?php
$idg=md5(microtime());
header("location: co_user.php?id=$idg$id_client");
?>