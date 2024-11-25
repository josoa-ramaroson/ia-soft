<?
  
    require 'fonction.php';
	$sqlVER="SELECT * FROM $tbl_seq_transf  WHERE  n_transfert='2' " ;
	$resultatVER= mysqli_query($linki,$sqlVER);
	while ($VERIFICATION = mysqli_fetch_assoc($resultatVER)) {
	$sequence=$VERIFICATION['n_sequence'];
	}
	
   
    //$lefichier="http://localhost/xampp/eda/webs/webs_r_data.php?sequence=$sequence";
    $lefichier="https://client.sonelecanjouan.com/webs/webs_r_data.php?sequence=$sequence";
       

$reader = new XMLReader();

if (!$reader->open("$lefichier"))
 {
    die("Failed to open 'data.xml'");
}

while($reader->read()) {
	
 if($reader->nodeType == XMLReader::ELEMENT && $reader->name == 'client') {
      $idpb = $reader->getAttribute('idpb');
      $id = $reader->getAttribute('id');
	  $id_nom = $reader->getAttribute('user');
	  $valeur = $reader->getAttribute('valeur');
      $miseajours = $reader->getAttribute('miseajours');
      $type='w';
	  
	  require 'fonction.php';
	  
	  $sqlfacturation = "SELECT * FROM $tbl_contact where  id='$id' and statut='6' ";  
      $resultatfact=mysql_query($sqlfacturation);
      $ident=mysql_fetch_array($resultatfact);
	  if ($ident){
	 $st='E'; 
     $libelle='facture';
     $bnom=$ident['nomprenom'];
     $bquartier=$ident['quartier'];
     $bstatut='saisie';
     $n=$ident['Indexinitial'];
	 $Tarif=$ident['Tarif'];
	 $coefTi=$ident['coefTi'];
	 $amperage=$ident['amperage'];
	 $chtaxe=$ident['chtaxe'];
     }
	  	  
	  $sql="INSERT INTO releve_bach_tempo( id_nom,  id, valeur, miseajours, type, st , libelle, bnom, bquartier , bstatut , n, Tarif , coefTi , amperage , chtaxe ) VALUES 
	  ( '$id_nom', '$id', '$valeur', '$miseajours', '$type', '$st' , '$libelle', '$bnom', '$bquartier', '$bstatut', '$n' , '$Tarif',  '$coefTi','$amperage','$chtaxe'  )";
      $result=mysqli_query($linki,$sql);
  
      $periode=date("y/m/d H:i:s"); 
      $sqlmj2="update  $tbl_seq_transf  set  n_sequence='$idpb' , periode='$periode' WHERE  n_transfert=2";
      $resulmj2=mysqli_query($linki,$sqlmj2);	
  
  
	}

}
$reader->close();


header("location:webs_t_confirme.php");
 ?>