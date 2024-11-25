<?php
require 'fonction.php';
$id_nom=addslashes($_POST['id_nom']);
$id=addslashes($_POST['id']);
$nom=addslashes($_POST['nom']);
$email=addslashes($_POST['email']);
$utilisation=addslashes($_POST['utilisation']);
$nodeserie=addslashes($_POST['nodeserie']);
$modele=addslashes($_POST['modele']);
$garantie=addslashes($_POST['garantie']);
$cartemere=addslashes($_POST['cartemere']);
$processeur=addslashes($_POST['processeur']);
$memoirevive=addslashes($_POST['memoirevive']);
$disquedur=addslashes($_POST['disquedur']);
$cartedeson=addslashes($_POST['cartedeson']);
$cartevideo=addslashes($_POST['cartevideo']);
$cartereseau=addslashes($_POST['cartereseau']);
$lecteurds=addslashes($_POST['lecteurds']);
$lecteurcd=addslashes($_POST['lecteurcd']);
$dvd=addslashes($_POST['dvd']);
$souris=addslashes($_POST['souris']);
$clavier=addslashes($_POST['clavier']);
$ecran=addslashes($_POST['ecran']);
$adresseIP=addslashes($_POST['adresseIP']);

$ile=addslashes($_POST['ile']);
$ville=addslashes($_POST['ville']);
$agence=addslashes($_POST['agence']);

$actif=addslashes($_POST['actif']);
$utilisateur=addslashes($_POST['utilisateur']);

$sql="update $tbl_pc  set  

nom='$nom',
email='$email',
utilisation='$utilisation',
nodeserie='$nodeserie',
modele='$modele',
garantie='$garantie',
cartemere='$cartemere',
processeur='$processeur',
memoirevive='$memoirevive',
disquedur='$disquedur',
cartedeson='$cartedeson',
cartevideo='$cartevideo',
cartereseau='$cartereseau',
lecteurds='$lecteurds',
lecteurcd='$lecteurcd',
dvd='$dvd',
souris='$souris',
clavier='$clavier',
ecran='$ecran',
adresseIP='$adresseIP',

ile='$ile',
ville='$ville',
agence='$agence',

actif='$actif',
utilisateur='$utilisateur', id_nom='$id_nom'  WHERE id='$id' ";


$result=mysql_query($sql);
   if($result){
	   //SUCCESS
	   $idr=md5(microtime()).$id;
	   header("location:pc_affichage_user.php?id=$idr");
   }
   else {
   echo "ERROR";
   }
  mysql_close(); 
?>
