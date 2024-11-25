<?php
require 'session.php';
require 'fonction.php';

$userchoix = $_REQUEST["userchoix"];
$id_user = $_REQUEST["id_nom"];


$sqlRECH = "SELECT * FROM $tbl_releve_bachtemp where miseajours!='1' and id_nom='$userchoix'";
$resultRECH = mysql_query($sqlRECH);
while ($RECH = mysql_fetch_assoc($resultRECH)) {
  $idpb=$RECH['idpb'];
  $id=$RECH['id'];
  //$id_nom=$RECH['id_nom'];
  $valeur=$RECH['valeur'];
  $miseajours=$RECH['miseajours'];
     $type=$RECH['type'];
  	 $st=$RECH['st'];
     $libelle=$RECH['libelle'];
     $bnom=$RECH['bnom'];
     $bquartier=$RECH['bquartier'];
     $bstatut=$RECH['bstatut'];
     $n=$RECH['n'];
	 $Tarif=$RECH['Tarif'];
	 $coefTi=$RECH['coefTi'];
	 $amperage=$RECH['amperage'];
	 $chtaxe=$RECH['chtaxe'];
    
  //------------------DEBUT VERIFICATION  

    
  //-----------------DEBUT ENREGISTREMENT -------------------

  $sql="INSERT INTO $tbl_releve_bach( id_nom,  id, valeur, miseajours, type , st , libelle, bnom, bquartier , bstatut , n, Tarif , coefTi , amperage , chtaxe  ) VALUES 
  ( '$id_user', '$id', '$valeur', '$miseajours', '$type' , '$st' , '$libelle', '$bnom', '$bquartier', '$bstatut', '$n' , '$Tarif',  '$coefTi','$amperage','$chtaxe' )";
  $result=mysql_query($sql);

  
  $sqlmj1="update  $tbl_releve_bachtemp set  miseajours=1  WHERE  idpb='$idpb'";
  $resulmj1=mysql_query($sqlmj1);

  //-----------------FIN ENREGISTREMENT-------------------
	}
  
 

header("location:webs_t_confirme.php");
?>
