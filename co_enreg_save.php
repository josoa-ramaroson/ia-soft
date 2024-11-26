<?php
require 'fonction.php';
require 'configuration.php';
$id_nom=addslashes($_POST['id_nom']);
$id=addslashes($_POST['id']);
$Police=addslashes($_POST['Police']);
//$typecompteur=addslashes($_POST['typecompteur']);
$phase=addslashes($_POST['phase']);
$puissance=addslashes($_POST['puissance']);
$Tarif=addslashes($_POST['Tarif']);
$amperage=strtolower(addslashes($_POST['amperage']));
$ncompteur=addslashes($_POST['ncompteur']);
$Indexinitial=addslashes($_POST['Indexinitial']);
$index2=addslashes($_POST['index2']);

$datepose=addslashes($_POST['datepose']);
//$statut=addslashes($_POST['statut']);

$T=$Tarif;
$sql82 = ("SELECT * FROM tarif where idt='$T'");
$result82 = mysqli_query($linki,$sql82);
while ($row82 = mysqli_fetch_assoc($result82)) {
$typecompteur=$row82['typecom'];
}


$sql="update $tbl_contact  set id_nom='$id_nom' , Police='$Police',  phase='$phase', puissance='$puissance', Tarif='$Tarif', amperage='$amperage' , ncompteur='$ncompteur' , Indexinitial='$Indexinitial', index2='$index2', datepose='$datepose' , miseajours='1' WHERE id LIKE '$_POST[id]' ";
$result=mysqli_query($linki,$sql);

//--------------------------------------------INITIALISATION INDEX --------------

$st='E';
$libelle='Index initial';
$nfacture='Index';

$sqlmaxf="SELECT MAX(idf) AS Maxa_id FROM $tbl_fact";
$resultmaxf=mysqli_query($linki,$sqlmaxf);
$rowsmaxf=mysqli_fetch_array($resultmaxf);
$Max_idf = $rowsmaxf['Maxa_id'];



$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_fact  WHERE id='$id' and st='E' and idf='$Max_idf'";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{
$sqlp="update  $tbl_fact  set   nf='$Indexinitial' , nf2='$index2' WHERE id LIKE '$_POST[id]' and st='E' and idf='$Max_idf' ";
$resultp=mysqli_query($linki,$sqlp);
}
else 
{
$sql2="INSERT INTO $tbl_fact ( id, ci , st, id_nom, fannee, nfacture,  nf, libelle) VALUES
( '$id','$ci', '$st', '$id_nom', '$anneec',  '$nfacture', '$Indexinitial', '$libelle')";
$r=mysqli_query($linki,$sql2) or die(mysqli_error($linki));
}
//--------------------------------------------------------------------------------------------------


  if($result){
	   //SUCCESS
	   $idr=md5(microtime()).$id;
	   header("location:re_affichage_user.php?id=$idr");
   }
   else {
   echo "ERROR";
   }
  mysqli_close($linki); 
?>
