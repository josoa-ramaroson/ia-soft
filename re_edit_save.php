<?php
require 'fonction.php';
//Information de la personne
$id_nom=addslashes($_POST['id_nom']);
$Designation=addslashes($_POST['Designation']);
$nomprenom=addslashes($_POST['nomprenom']);
if(empty($nomprenom)) 
{ 
exit(); 
} 
$surnom=addslashes($_POST['surnom']);
$email=addslashes($_POST['email']);
$titre=addslashes($_POST['titre']);
$tel=addslashes($_POST['tel']);
$fax=addslashes($_POST['fax']);
$url=addslashes($_POST['url']);

$login=addslashes($_POST['login']);
$pwd=addslashes($_POST['pwd']);

//Information de la personne
$adresse=addslashes($_POST['adresse']);
$quartier=addslashes($_POST['quartier']);
$ville=addslashes($_POST['ville']);
$ile=addslashes($_POST['ile']);
$chtaxe=addslashes($_POST['chtaxe']);
$tmt=addslashes($_POST['tmt']);

$Tarif=addslashes($_POST['Tarif']);
$amperage=addslashes($_POST['amperage']);

$CodeTypeClts=addslashes($_POST['CodeTypeClts']);

$id=$_POST['id'];

$coefTi=addslashes($_POST['coefTi']);

$sql="update $tbl_contact  set id_nom='$id_nom', Designation='$Designation' , nomprenom='$nomprenom' , surnom='$surnom',
email='$email',  titre='$titre' , tel='$tel', fax='$fax' ,  url='$url',  adresse='$adresse' , quartier='$quartier' ,  ville='$ville',  ile='$ile', login='$login', pwd='$pwd' , chtaxe='$chtaxe', Tarif='$Tarif', amperage='$amperage' , tmt='$tmt', CodeTypeClts='$CodeTypeClts' , coefTi='$coefTi' WHERE id LIKE '$_POST[id]' ";
$result=mysqli_query($linki,$sql);

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
