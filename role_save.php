<?php

$id_u=addslashes($_POST['id_u']);
$id_role=addslashes($_POST['id_role']);
$datetime=date("y/m/d H:i:s");  
$id_nom=addslashes($_POST['id_nom']);

require 'fonction.php';


$sqlcomp = "SELECT count(*) FROM $tb_role_user  WHERE  id_role='$id_role' and id_u='$id_u' ";  
$resultatcomp = mysqli_query($linki,$sqlcomp) or die('Erreur SQL !<br />'.$sqlcomp.'<br />'.mysqli_error());  
$nb_total = mysqli_fetch_array($resultatcomp);  

if (($nb_total = $nb_total[0]) == 0) {   


$sqlp="INSERT INTO $tb_role_user ( id_nom   , id_role , id_u,  datetime )
                    VALUES       ('$id_nom','$id_role' ,'$id_u', '$datetime')";
					
													
$r=mysqli_query($linki,$sqlp)or die(mysqli_error($linki));
mysqli_close($linki);



} 
  else 

{  
header("location: role.php");

}  



?>
<?php
header("location: role.php");
?>