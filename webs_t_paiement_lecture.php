<?
  
    require 'fonction.php';
	$sqlVER="SELECT * FROM $tbl_seq_transf  WHERE  n_transfert='1' " ;
	$resultatVER= mysqli_query($linki,$sqlVER);
	while ($VERIFICATION = mysqli_fetch_assoc($resultatVER)) {
	$sequence=$VERIFICATION['n_sequence'];
	}
	
   
    //$lefichier="http://localhost/xampp/eda/webs/webs_p_data.php?sequence=$sequence";
    $lefichier="https://client.sonelecanjouan.com/webs/webs_p_data.php?sequence=$sequence";
       

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
	  $paiement = $reader->getAttribute('paiement');
      $miseajours = $reader->getAttribute('miseajours');
      $type='w';
	  
	  require 'fonction.php';
	  $sql="INSERT INTO paiement_bach_tempo( id_nom,  id, paiement, miseajours, type ) VALUES ( '$id_nom', '$id', '$paiement', '$miseajours', '$type')";
      $result=mysqli_query($linki,$sql);
  
      $periode=date("y/m/d H:i:s"); 
      $sqlmj2="update  $tbl_seq_transf  set  n_sequence='$idpb'  , periode='$periode'  WHERE  n_transfert=1";
      $resulmj2=mysqli_query($linki,$sqlmj2);	
  
  
	}

}
$reader->close();


header("location:webs_t_confirme.php");
 ?>