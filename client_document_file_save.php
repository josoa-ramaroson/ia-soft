<?php

require 'fonction.php';

$iddocument=$_REQUEST["iddocument"];

$idclient = $_REQUEST["idclient"];

$statut=1;

$v1= md5(microtime());

if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir = './upload/document_client/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];
	
    if( !is_uploaded_file($tmp_file) )
    {
        //exit("Le fichier est introuvable");
		header("location:client_document.php?id=$v1$idclient&i=$v1");
    }


	
    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

  	if( !strstr($type_file, 'jpeg') )
    {
        //exit("Le fichier n'est pas une image jpeg ");
		header("location:client_document.php?id=$v1$idclient&i=$v1");
    }

	
	
 // on vérifie maintenant la capacite de l image 
 
      if (filesize($_FILES['fichier']['tmp_name']) >3145728)
	  {
	    //exit ("image trop grande, limitée à 3Mo");
       //exit ("image trop grande, limitée à 1Mo");
	   header("location:client_document.php?id=$v1$idclient&i=$v1");
      }
      
	  $name_file = $iddocument.".jpg";

      $resultat=move_uploaded_file($tmp_file, $content_dir.$iddocument.".jpg");


 } 
    $siteweb_dir = $URL_IMAGES;
    $document_images="$siteweb_dir$iddocument.jpg";

$sqlcon="update $tbl_client_doc set resultat='$document_images' , statut='$statut' where iddocument='$iddocument'";
$connection=mysqli_query($linki,$sqlcon);


header("location:client_document.php?id=$v1$idclient&i=$v1");
?>