<?php
	require 'fonction.php';
    $link = mysql_connect ($host,$user,$pass);
    mysql_select_db($db);
	
$id=addslashes($_POST['idp']);
$id_nom=addslashes($_POST['id_nom']);
$u_nom=addslashes($_POST['mnom']);
$u_prenom=addslashes($_POST['mprenom']);
$u_email=addslashes($_POST['memail']);
$u_niveau=addslashes($_POST['mniveau']);
$datetime=date_default_timezone_set("Africa/Dar_es_Salaam");
$agence=addslashes($_POST['agence']);

$titre=addslashes($_POST['mtitre']);
$mobile=addslashes($_POST['mmobile']);
$statut=addslashes($_POST['mstatut']);

require 'fonction_niveau_save.php';

if(empty($u_nom)) 
{ 
header("location: utilisateur.php"); 
}
#---------------------------------------------------3 

$sqlp="update $tbl_utilisateur  set  id_nom='$id_nom', u_nom='$u_nom' , u_prenom='$u_prenom' ,  u_email='$u_email' , u_niveau='$u_niveau' ,type='$type' , datetime='$datetime', titre='$titre', mobile='$mobile',  statut='$statut', agence='$agence', datetime='$datetime'  WHERE  id_u='$id'";
$resultp=mysql_query($sqlp);
if($resultp){
}
else {
echo "ERROR";
}
mysql_close();
?>
<?php
header("location: utilisateur.php");
?>