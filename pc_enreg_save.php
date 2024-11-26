<?php
require 'fonction.php';
//Information de la personne
$id_nom=addslashes($_POST['id_nom']);
$id=addslashes($_POST['id']);

$nom=$_POST['nom'];
$ile=addslashes($_POST['ile']);
$ville=addslashes($_POST['ville']);
$agence=addslashes($_POST['agence']);
$utilisateur=addslashes($_POST['utilisateur']);

$taches=addslashes($_POST['taches']);
$statut=addslashes($_POST['statut']);
$realisateur='';
$suivi='A faire';
$date=date("y/m/d H:i:s"); 

$sql="INSERT INTO $tbl_pctaches ( id, id_nom , taches, statut , suivi, realisateur, nom, ile, ville, agence, utilisateur, date)
VALUES
( '$id', '$id_nom' , '$taches','$statut', '$suivi','$realisateur','$nom','$ile', '$ville', '$agence' ,'$utilisateur','$date')";

$result=mysqli_query($linki,$sql);
   if($result){
   }
   else {
   echo "ERROR";
   }
  mysqli_close($linki); 
?>
<?php
$idr=md5(microtime()).$id;
header("location:pc_affichage_user.php?id=$idr");
?>
