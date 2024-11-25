<?php
require 'fonction.php';

$id=addslashes($_POST['id']);

$id_nom=addslashes($_POST['id_nom']);
$nomprenom=addslashes($_POST['nomprenom']);
$matricule=addslashes($_POST['matricule']);

$date_entre=addslashes($_POST['date_entre']);
$date_sortie=addslashes($_POST['date_sortie']);


$date1 = $date_entre;
$date2 = $date_sortie;
$date1 = str_replace("/","-",$date1);
$date2 = str_replace("/","-",$date2);

if ( $date2<$date1)
{
$v1= md5(microtime());
header("location:rh_employer_user_conge.php?id=$v1$id&d=$v1");
}
else
{
// On transforme les 2 dates en timestamp
$date3 = strtotime($date1);
$date4 = strtotime($date2);


// On récupère la différence de timestamp entre les 2 précédents
$nbJoursTimestamp = $date4 - $date3;
// ** Pour convertir le timestamp (exprimé en secondes) en jours **
// On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
$nbJours = $nbJoursTimestamp/86400; // 86 400 = 60*60*24

$type =addslashes($_POST['type']); 

echo $sqlpf="INSERT INTO $tb_rhconge_date
(  nomprenom, matricule, date_entre, date_sortie, nbJours, type )
 VALUES
('$nomprenom', '$matricule','$date_entre','$date_sortie', '$nbJours', '$type')";
	 
$rf=mysql_query($sqlpf);
}

?>
<?php
$v1= md5(microtime());
header("location:rh_employer_user_conge.php?id=$v1$id&d=$v1");

?>