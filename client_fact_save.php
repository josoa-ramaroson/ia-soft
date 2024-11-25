<?php
$id_client=addslashes($_POST['id_client']);
$nom_client=addslashes($_POST['nom_client']);
$service='2';
$indexc=addslashes($_POST['indexc']);
$dated=addslashes($_POST['date']);

$note='Envoie de l index ';

require 'fonction.php';
$sqlp="INSERT INTO $tb_echangagent  (id_client   , nom_client   ,service,  indexc   , dated , note )
                    VALUES       ('$id_client','$nom_client',  '2' ,'$indexc', '$dated' , '$note')";
					
													
$r=mysql_query($sqlp);

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = $emailinfo; 
$sujet = "INDEX : $id_client $nom_client "; 
$texte = " le client :  $nom_client ayant comme N° ID : $id_client a envoyé comme index : $indexc  "; 
mail($destinataires,$sujet,$texte,"From:$emailinfo");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

mysql_close($link);

?>
<?php
$idg=md5(microtime());
header("location: co_user.php?id=$idg$id_client");
?>