<?php
$id_client=addslashes($_POST['id_client']);
$nom_client=addslashes($_POST['nom_client']);
$service='44';
$Probleme=addslashes($_POST['Probleme']);
$dated=addslashes($_POST['date']);
$note='Il y a un probleme de ';
require 'fonction.php';
$sqlp="INSERT INTO $tb_echangagent  (id_client   , nom_client   ,service,  Probleme   , dated , note )
                    VALUES       ('$id_client','$nom_client',  '$service' ,'$Probleme', '$dated' , '$note')";
					
													
$r=mysql_query($sqlp);


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = $emailinfo; 
$sujet = "Probleme technique : $id_client $nom_client "; 
$texte = " le client :  $nom_client ayant comme N° ID : $id_client a un probleme de $Probleme "; 
mail($destinataires,$sujet,$texte,"From:$emailinfo");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

mysql_close($link);

?>
<?php
$idg=md5(microtime());
header("location: co_user.php?id=$idg$id_client");
?>