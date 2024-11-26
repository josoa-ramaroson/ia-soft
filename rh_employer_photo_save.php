<?php

$id_nom=addslashes($_POST['id_nom']);
$id=$_POST['id'];

if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir = './upload/employer/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];
	
    if( !is_uploaded_file($tmp_file) )
    {
        //exit("Le fichier est introuvable");
		header("location:rh_employer_user.php?id=".$idr);
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

  	if( !strstr($type_file, 'jpeg') )
    {
        //exit("Le fichier n'est pas une image jpeg ");
		header("location:rh_employer_user.php?id=".$idr);
    }

 // on vérifie maintenant la capacite de l image 
 
      if (filesize($_FILES['fichier']['tmp_name']) >1048576)
	  {
       //exit ("image trop grande, limitée à 1Mo");
	   header("location:rh_employer_user.php?id=".$idr);
      }

      $resultat=move_uploaded_file($tmp_file, $content_dir.$id.".jpg");
	  
  /*if(move_uploaded_file($tmp_file, $content_dir.$id.".jpg"))
       echo "Fichier déplacé et renommé avec succès";
 else echo "ERREUR: Fichier non déplacé et non renommé";*/


 } 
  	   $idr=md5(microtime()).$id;
	   header("location:rh_employer_user.php?id=".$idr);
      
	   
?> 
