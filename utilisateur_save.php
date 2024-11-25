<?php
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass);
mysql_select_db($db);

//------------identification du maximun -----------
$u_nom=addslashes($_POST['u_nom']);
$u_prenom=addslashes($_POST['u_prenom']);
$u_email=addslashes($_POST['u_email']);
$u_login=strtolower(addslashes($_POST['u_login']));
$u_login=str_replace(' ', '', ($u_login));
$u_pwd=md5(addslashes($_POST['u_pwd']));
$u_niveau=addslashes($_POST['u_niveau']);
$titre=addslashes($_POST['titre']);
$mobile=addslashes($_POST['mobile']);
$statut=addslashes($_POST['statut']);
$agence=addslashes($_POST['agence']);
$datetime=date("y/m/d H:i:s");  
$id_nom=addslashes($_POST['id_nom']);

require 'fonction_niveau_save.php';

$sqlp="INSERT INTO $tbl_utilisateur ( id_nom   , u_nom   ,u_prenom,  u_email, u_login, u_pwd, u_niveau , type, titre, mobile, statut, agence,  datetime )

 VALUES ('$id_nom' ,'$u_nom','$u_prenom',  '$u_email', '$u_login', '$u_pwd', '$u_niveau' ,'$type' , '$titre','$mobile' ,'$statut', '$agence', '$datetime')";
				 
$r=mysql_query($sqlp);
mysql_close($link);
?>
<?php
header("location: utilisateur.php");
?>