<?php

require 'session.php';
require 'fonction.php';


$id_user = $_REQUEST["id_user"];

$date1=date("y/m/d H:i:s");
$date1 = str_replace("/","-",$date1);
$date1 = strtotime($date1);

$iddocument=$id_user.'_'.$date1;

	
	 if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir ='./upload/paiement_bach/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];
	
    if( !is_uploaded_file($tmp_file) )
    {
        //exit("Le fichier est introuvable");
		header("location:paiement_bach_transfert.php");
    }

     
	  $name_file = $iddocument.".csv";

      $resultat=move_uploaded_file($tmp_file, $content_dir.$iddocument.".csv");


 } 

$lefichier="$content_dir$name_file";

$csv = new SplFileObject($lefichier, 'r');
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(',', '"', '"');
 
require 'fonction.php';

foreach(new LimitIterator($csv,1) as $ligne)
{
$id=addslashes($ligne[0]);
$paiement=addslashes($ligne[1]);
$type='f';

$sql="INSERT INTO $tbl_paiement_bach ( id_nom,  id, paiement, type) VALUES ( '$id_user', '$id', '$paiement', '$type')";
$result=mysql_query($sql);  
 

header("location:paiement_bach_transfert.php");
 
} 
?>
