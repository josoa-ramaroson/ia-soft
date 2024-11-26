 <?php
$csv = new SplFileObject('clients.csv', 'r');
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(';', '"', '"');
 
require 'fonction.php';

?>
<?php
//foreach($csv as $ligne)
foreach(new LimitIterator($csv, 1) as $ligne)
{
?>  
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="20%"><?php $Police=addslashes($ligne[0]);   //echo $ligne[0];?></td>
     <td width="20%"><?php $CodeEtat=addslashes($ligne[1]); //  echo $ligne[1];?></td>
  </tr>
</table>

<?php

//------------identification du maximun -----------
$sqlmax="SELECT MAX(id) AS Maxa_id FROM $tbl_contact";
$resultmax=mysqli_query($linki,$sqlmax);
$rowsmax=mysqli_fetch_array($resultmax);
if ($rowsmax) {
$Max_id = $rowsmax['Maxa_id']+1;
}
else {
$Max_id = 1;
}

//$id_nom=addslashes($ligne[]);
$id_nom='';
//$surnom=addslashes($ligne[]);
$surnom='';
//$email=addslashes($ligne[]);
$email='';
//$titre=addslashes($ligne[]);
$titre='';
//$fax=addslashes($ligne[]);
$fax='';

//$url=addslashes($ligne[]);
$url='';

//$quartier=addslashes($ligne[]);
$quartier='';

//$ville=addslashes($ligne[]);
$ville='';

//$ile=addslashes($ligne[]);
$ile='Anjouan';

$Police=addslashes($ligne[0]);
$CodeEtat=addslashes($ligne[1]);
$CodeActivite=addslashes($ligne[2]);
$CodeService=addslashes($ligne[3]);
$Designation=addslashes($ligne[4]);
$nomprenom=addslashes($ligne[5]);

$login=strtolower(substr($nomprenom,0,4)).$Max_id;
$p1=md5($login); 
$pwd=substr($p1,0,8);

$RefCommune=addslashes($ligne[6]);
$RefLocalite=addslashes($ligne[7]);
$RefQuartier=addslashes($ligne[8]);
$adresse=addslashes($ligne[9]);
$AdresseLivraison=addslashes($ligne[10]);
$tel=addslashes($ligne[11]);
$BoitePostale=addslashes($ligne[12]);
$CodeProfess=addslashes($ligne[13]);
$Exotca=addslashes($ligne[14]);
$AncienRef=addslashes($ligne[15]);
$DateCreation=addslashes($ligne[16]);
$CodeTypeClts=addslashes($ligne[17]);
$CodeTypePiece=addslashes($ligne[18]);
$NumPieces=addslashes($ligne[19]);
$Ets=addslashes($ligne[20]);

//$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_contact WHERE Email='$Email'";
$valeur_existant = "SELECT COUNT(*) AS nb FROM clienteda  WHERE Police='$Police' ";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
$nb = mysqli_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{

}

else 

{
$sql="INSERT INTO clienteda ( id_nom , Designation, nomprenom,surnom, email, titre, login, pwd , tel, fax , url , adresse , Police, CodeEtat, CodeActivite, CodeService, RefCommune, RefLocalite, RefQuartier, AdresseLivraison, BoitePostale, CodeProfess, Exotca, AncienRef, DateCreation, CodeTypeClts, CodeTypePiece, NumPieces, Ets , ile , secteur, ville, quartier, bloc , position, rang , typecompteur, phase ,puissance, Tarif , amperage , ncompteur , Indexinitial , datepose ,statut)

VALUES
( '$id_nom' ,'$Designation', '$nomprenom', '$surnom', '$email', '$titre', '$login', '$pwd',  '$tel', '$fax' , '$url' , '$adresse' ,  '$Police', '$CodeEtat', '$CodeActivite', '$CodeService', '$RefCommune', '$RefLocalite', '$RefQuartier', '$AdresseLivraison', '$BoitePostale', '$CodeProfess', '$Exotca', '$AncienRef', '$DateCreation', '$CodeTypeClts', '$CodeTypePiece', '$NumPieces', '$Ets' , '$ile', '$secteur', '$ville', '$quartier', '$bloc', '$position', '$rang','typecompteur','$phase','$puissance','$Tarif','$amperage','$ncompteur','$Indexinitial', '$datepose','$statut')";
$result=mysqli_query($linki,$sql); 

}
}
?>
