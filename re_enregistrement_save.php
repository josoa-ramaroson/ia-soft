<?php
require 'fonction.php';
require 'configuration.php';

$id_nom=addslashes($_POST['id_nom']);
//Information de la personne
$Designation=addslashes($_POST['Designation']);
$nomprenom=addslashes($_POST['nomprenom']);
if(empty($nomprenom)) 
{ 
header("location:re_enregistrement.php");
exit(); 
} 


//------------identification du maximun Client-------------
$sqlmax="SELECT MAX(id) AS Maxa_id FROM $tbl_contact";
$resultmax=mysql_query($sqlmax);
$rowsmax=mysql_fetch_array($resultmax);
if ($rowsmax) {
$Max_id = $rowsmax['Maxa_id']+1;
}
else {
$Max_id = 1;
}
//-----------------------------------------------------

$sqlmaxf="SELECT MAX(idf) AS Maxa_id FROM $tbl_fact";
$resultmaxf=mysql_query($sqlmaxf);
$rowsmaxf=mysql_fetch_array($resultmaxf);
if ($rowsmaxf) {
$Max_idf = $rowsmaxf['Maxa_id']+1;
}
else {
$Max_idf = 1;
}

//------------------------------------------------------

$surnom=addslashes($_POST['surnom']);
$surnom=str_replace(' ', '', ($surnom));
$email=addslashes($_POST['email']);
$titre=addslashes($_POST['titre']);
$tel=addslashes($_POST['tel']);
$login=strtolower(substr($nomprenom,0,4)).$Max_id;
$datetime=md5(date("y/m/d H:i:s")); 
$pwd=substr($datetime,0,8);
$date=date("y/m/d H:i:s"); 

$fax=addslashes($_POST['fax']);
$url=addslashes($_POST['url']);
//Information de la personne
$adresse=addslashes($_POST['adresse']);
$ile=addslashes($_POST['ile']);

//$Police=addslashes($_POST['Police']);
//$CodeEtat=addslashes($_POST['CodeEtat']);
//$CodeActivite=addslashes($_POST['CodeActivite']);
//$CodeService=addslashes($_POST['CodeService']);

//IDENTIFICATION CODE QUARTIER """""""""""""""""""""""""""""""""
$RefQuartier=addslashes($_POST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_POST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 

$sql3 = "SELECT * FROM commune where ref_com=$RefCommune";
$result3 = mysql_query($sql3);
while ($row3 = mysql_fetch_assoc($result3)) {
$secteur=$row3['commune'];
} 

	$sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);
	$DateCreation=$datecaisse['datecaisse'];
//$secteur=addslashes($_POST['commune']);
//"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

$AdresseLivraison=addslashes($_POST['AdresseLivraison']);
$BoitePostale=addslashes($_POST['BoitePostale']);
//$CodeProfess=addslashes($_POST['CodeProfess']);
//$Exotca=addslashes($_POST['Exotca']);
//$AncienRef=addslashes($_POST['AncienRef']);
//$DateCreation=addslashes($_POST['DateCreation']);
$CodeTypeClts=addslashes($_POST['CodeTypeClts']);
$CodeTypePiece=addslashes($_POST['CodeTypePiece']);
$NumPieces=addslashes($_POST['NumPieces']);
//$Ets=addslashes($_POST['Ets']);
$chtaxe=addslashes($_POST['chtaxe']);
$Tarif=addslashes($_POST['Tarif']);

$coefTi=addslashes($_POST['coefTi']);
$statut='1';
//---------------------------------------------------------------------
$sql="INSERT INTO $tbl_contact ( id_nom , Designation, nomprenom,surnom, email, titre, tel, login, pwd , fax , url , adresse , quartier, ville, secteur, ile, Police,  RefCommune, RefLocalite, RefQuartier, AdresseLivraison, BoitePostale,  DateCreation, CodeTypeClts, CodeTypePiece, NumPieces,  statut,chtaxe,Tarif,coefTi)
VALUES
('$id_nom' ,'$Designation', '$nomprenom', '$surnom', '$email', '$titre', '$tel', '$login', '$pwd', '$fax' , '$url' , '$adresse' , '$quartier' , '$ville', '$secteur', '$ile', '$Max_id', '$RefCommune', '$RefLocalite', '$RefQuartier' , '$AdresseLivraison', '$BoitePostale', '$DateCreation', '$CodeTypeClts', '$CodeTypePiece', '$NumPieces',  '$statut' , '$chtaxe' , '$Tarif','$coefTi')";
$result=mysql_query($sql);

//---------FACTURATION DU MONTANT POLICE D ABONNEMENT---------------------------------
$st='P';
//$nfacture=$Max_idf.$ci.$st.$annee;
$nfacture=$Max_idf.$st;
$fannee=$annee;
$libelle='Police';
$etat='facture';
$totalttc='7000';
$totalnet='7000';

$sql2="INSERT INTO $tbl_fact 
( id,  ci , st, id_nom, bnom, bquartier, nfacture, fannee, date, libelle, totalttc, totalnet, report, etat) VALUES
( '$Max_id',  '$ci', '$st', '$id_nom', '$nomprenom', '$quartier', '$nfacture', '$fannee', '$date', '$libelle','$totalttc', '$totalnet', '$totalnet' , 'facture')";
$result2=mysql_query($sql2);
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = $emailinfo; 
$sujet = "Demande d'Abonnement ID_Client : $Max_id "; 
$texte = " l'agent : $id_nom a realisé la demande d'abonnement de $Designation $nomprenom son ID_Client : $Max_id , ville : $ville, Quartier : $quartier  "; 
mail($destinataires,$sujet,$texte,"From:$emailinfo");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
   mysql_close(); 
?>
<?php
header("location:re_affichage_n.php");
?>
