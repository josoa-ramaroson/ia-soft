<?php
session_start();
/*if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir = 'upload/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
		header("location: communication.php");
        exit;
    }
    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

  	if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'gif') && !strstr($type_file, 'png') )
    {
		header("location: communication.php");
       exit;
    }
 // on vérifie maintenant la capacite de l image 
 
      if (filesize($_FILES['fichier']['tmp_name']) >3145728)
	  {
	   header("location: communication.php");
     exit;
      }
    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];
    
    if( ! move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
		header("location: communication.php");
       exit;
    }
  // echo "Le fichier a bien été uploadé";
 } 
   //$siteweb_dir = 'http://localhost/xampp/webcc/';
   $siteweb_dir = 'http://www.cciaanjouan.com/';
   $lefichier="$siteweb_dir$content_dir$name_file";	*/

$lefichier='';
$titre=addslashes($_POST['titre']);
$detail=addslashes($_POST['detail']);
$date=addslashes($_POST['date']);
$id_nom=addslashes($_POST['id_nom']);
   
  require 'fonction.php';

  $sql="INSERT INTO $tbl_com  (id_nom, date,titre,detail,fichier)
                      VALUES  ('$id_nom','$date','$titre','$detail','$lefichier')";
   $result=mysqli_query($linki,$sql);
   if($result){
   }
   else {
   //echo "ERROR";
   }header("location: communication.php");?>