<?php
require 'fonction.php';
require 'configuration.php';

$CodeActivite=addslashes($_POST['CodeActivite']);
$id_nom=addslashes($_POST['id_nom']);
$nomprenom=addslashes($_POST['nomprenom']);
$id=$_POST['id'];

$quartier=addslashes($_POST['quartier']);
$date=addslashes($_POST['date']);


     $ssolde="SELECT * FROM $tbl_fact  WHERE id='$id' and st='E' ORDER BY idf DESC LIMIT 0 , 1";
 	$rsolde=mysqli_query($linki,$ssolde);
	$datamsolde=mysqli_fetch_array($rsolde);

    if ($datamsolde['report']<=0)
	{

//-----------------------------------------------------

$sql="update $tbl_contact  set id_nom='$id_nom', CodeActivite='$CodeActivite' , statut='7' , miseajours='1'  WHERE id='$id'";
$result=mysqli_query($linki,$sql);

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
ini_set('SMTP','smtp.comorestelecom.km');
$destinataires = $emailinfo; 
$sujet = "RESILIATION  ID_Client : $id "; 
$texte = " l'agent : $id_nom a realisé une resilation du client  $nomprenom son ID_Client : $id ,  Quartier : $quartier  "; 
mail($destinataires,$sujet,$texte,"From:contact@sonelecanjouan.com");
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

   mysqli_close($linki); 
   

	}
	
	else
	{
		
	}
?>
<?php
	header("location:re_edit_resilier.php?id=$id");
?>
