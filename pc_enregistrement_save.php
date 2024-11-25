<?php
$id_nom=addslashes($_POST['id_nom']);
$id_u=addslashes($_POST['id_u']);

$nom=$_POST['nom'];
$email=$_POST['email'];
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
$datetime=date("d/m/y h:i:s"); //create date time


require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

$sql9 ="SELECT id_u, u_nom , u_prenom  FROM $tbl_utilisateur  where id_u='$id_u'";
$result9 = mysql_query($sql9);
while ($row9 = mysql_fetch_assoc($result9)) {
$utilisateur=$row9['u_nom'].' '.$row9['u_prenom'];
}

//echo  $sql9;

$sql="INSERT INTO $tbl_pc(id_nom,nom,utilisation,nodeserie,modele,garantie,cartemere,processeur,memoirevive,disquedur,cartevideo,cartedeson,cartereseau,lecteurds,lecteurcd,dvd,souris,clavier,ecran,adresseIP,ile, ville, agence ,actif,email,utilisateur,id_u, datetime)VALUES('$id_nom','$nom', '$utilisation', '$nodeserie',  '$modele', '$garantie', '$cartemere', '$processeur','$memoirevive', '$disquedur','$cartevideo','$cartedeson','$cartereseau','$lecteurds','$lecteurcd', '$dvd','$souris','$clavier','$ecran','$adresseIP', '$ile', '$ville', '$agence' , '$actif','$email','$utilisateur', '$id_u','$datetime')";
$result=mysql_query($sql);

if($result){

}
else {
echo "ERROR";
}
mysql_close();
?>
<?php
header("location: pc_enregistrement.php");
?>