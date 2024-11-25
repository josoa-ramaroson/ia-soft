 <?php
$csv = new SplFileObject('clients.csv', 'r');
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(';', '"', '"');
 
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

?>
<?php
//foreach($csv as $ligne)
foreach(new LimitIterator($csv, 1) as $ligne)
{
?>  
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="20%"><?php $Police=addslashes($ligne[0]);      //echo $ligne[0];?></td>
     <td width="20%"><?php $CodeEtat=addslashes($ligne[1]);   //echo $ligne[1];?></td>
  </tr>
</table>

<?php

//------------identification du maximun -----------
$sqlmax="SELECT MAX(id) AS Maxa_id FROM $tbl_contact";
$resultmax=mysql_query($sqlmax);
$rowsmax=mysql_fetch_array($resultmax);
if ($rowsmax) {
$Max_id = $rowsmax['Maxa_id']+1;
}
else {
$Max_id = 1;
}

//$ville=addslashes($ligne[]);
$statut='6';

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
$commune=addslashes($ligne[21]);
$ville=addslashes($ligne[22]);
$quartier=addslashes($ligne[23]);

$typecompteur=addslashes($ligne[24]);
$phase=addslashes($ligne[25]); 
$Tarif=addslashes($ligne[26]);  
$amperage=addslashes($ligne[27]); 

$ncompteur=addslashes($ligne[28]);
$Indexinitial=addslashes($ligne[29]);
$datepose=addslashes($ligne[30]);
$index=addslashes($ligne[31]);


//$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_contact WHERE Email='$Email'";
$valeur_existant = "SELECT COUNT(*) AS nb FROM clienteda  WHERE Police='$Police' ";
$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
$nb = mysql_fetch_assoc($sqLvaleur);

if($nb['nb'] == 1)
{

}

else 

{
$sql="INSERT INTO clienteda (Designation, nomprenom,  login, pwd , tel, adresse , Police, CodeEtat, CodeActivite, CodeService, RefCommune, RefLocalite, RefQuartier, AdresseLivraison, BoitePostale, CodeProfess, Exotca, AncienRef, DateCreation, CodeTypeClts, CodeTypePiece, NumPieces, Ets , ile , secteur, ville, quartier, typecompteur, phase ,puissance, Tarif , amperage , ncompteur , Indexinitial , datepose,  statut)

VALUES
( '$Designation', '$nomprenom',  '$login', '$pwd',  '$tel',  '$adresse' ,  '$Police', '$CodeEtat', '$CodeActivite', '$CodeService', '$RefCommune', '$RefLocalite', '$RefQuartier', '$AdresseLivraison', '$BoitePostale', '$CodeProfess', '$Exotca', '$AncienRef', '$DateCreation', '$CodeTypeClts', '$CodeTypePiece', '$NumPieces', '$Ets' , '$ile', '$secteur', '$ville', '$quartier', 'typecompteur','$phase','$puissance','$Tarif','$amperage','$ncompteur','$Indexinitial', '$datepose', '$statut')";
$result=mysql_query($sql); 

}
}
?>
