<?php
require 'fonction.php';
$datev=addslashes($_POST['datev']);
$titre=addslashes($_POST['nameproduit']); 
$Qvente=addslashes($_POST['Qvente']); 
$PUnitaire=addslashes($_POST['PUnitaire']);
$id_nom=addslashes($_POST['id_nom']);
$nc=addslashes($_POST['nc']);
$a_nom=addslashes($_POST['a_nom']);
//$Validite=addslashes($_POST['Validite']);
$Validite='0000-00-00';
$service=addslashes($_POST['service']);
$Snumero=addslashes($_POST['Snumero']);
$Etitre=addslashes($_POST['Etitre']);

$transfert=addslashes($_POST['transfert']);



$sqlconnect="SELECT * FROM $tbl_apppaiconn  WHERE loguser='$id_nom' ";
$resultconnect=mysqli_query($linki,$sqlconnect);
$rowsc=mysqli_fetch_array($resultconnect);
$Maxa_id = $rowsc['idc'];
$idcsortie=$Maxa_id;

	if(!isset($Maxa_id)|| empty($Maxa_id)) {
	header("location:app_produit_sortie.php");
	exit;
 }


//$PTotal=addslashes($_POST['PTotal']); 
$PTotal=$Qvente*$PUnitaire;

 $sqlp="INSERT INTO $tbl_appproduit_sortie  ( idcsortie, datev  , dateValidite,  titre  , Qvente  ,  PUnitaire   , PTotal ,nc, a_nom, id_nom,  service , Snumero )
                    VALUES    ('$idcsortie','$datev','$Validite', '$titre', '$Qvente', '$PUnitaire', '$PTotal','$nc', '$a_nom', '$id_nom','$service' , '$Snumero' )";
					
$r=mysqli_query($linki,$sqlp) 
or die(mysqli_error($linki));

if ($transfert==1)
{
	$statut=1;
	$sqlpt="INSERT INTO $tbl_apptransfert  ( idcsortie,  Sdate  , Stitre , Qvente  ,  Snumero  ,  Sid_nom  , Etitre , statut , agence)
                    VALUES    ('$idcsortie','$datev', '$titre', '$Qvente', '$Snumero','$id_nom' , '$Etitre' , '$statut', '$a_nom')";
					
$rt=mysqli_query($linki,$sqlpt) 
or die(mysqli_error($linki));
}
else 
{

}

$sqlcon="DELETE FROM $tbl_apppaiconn  WHERE   idc='$Maxa_id'";
$connection=mysqli_query($linki,$sqlcon);

mysqli_close($linki);
header("location: app_produit_sortie.php");
?>