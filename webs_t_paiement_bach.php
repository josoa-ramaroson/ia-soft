<?php
require 'session.php';
require 'fonction.php';

$userchoix = $_REQUEST["userchoix"];
$id_user = $_REQUEST["id_nom"];


$sqlRECH = "SELECT * FROM $tbl_paiement_bachtemp where miseajours!='1' and id_nom='$userchoix'";
$resultRECH = mysql_query($sqlRECH);
while ($RECH = mysql_fetch_assoc($resultRECH)) {
  $idpb=$RECH['idpb'];
  $id=$RECH['id'];
  //$id_nom=$RECH['id_nom'];
  $paiement=$RECH['paiement'];
  $miseajours=$RECH['miseajours'];
  $type='w';
    
  //------------------DEBUT VERIFICATION  

    
  //-----------------DEBUT ENREGISTREMENT -------------------

  $sql="INSERT INTO $tbl_paiement_bach ( id_nom,  id, paiement, miseajours, type ) VALUES ( '$id_user', '$id', '$paiement', '$miseajours', '$type')";
  $result=mysql_query($sql);

  
  $sqlmj1="update  $tbl_paiement_bachtemp set  miseajours=1  WHERE  idpb='$idpb'";
  $resulmj1=mysql_query($sqlmj1);

  //-----------------FIN ENREGISTREMENT-------------------
	}
  
 

header("location:webs_t_confirme.php");
?>