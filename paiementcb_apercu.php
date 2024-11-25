<?
require 'session.php';
require 'fonction.php';

$id=$_REQUEST['id'];
$sqlfacturation="SELECT * FROM $tbl_fact f, $tbl_contact c  WHERE c.id=f.id and f.id='$id' and (f.st='E' or f.st='P' or f.st='D')  ORDER BY idf desc limit 0,1";
$resultatfact=mysql_query($sqlfacturation);
$ident=mysql_fetch_array($resultatfact);

if ($ident) {
$idf=$ident['idf'];
}
else 
{
header("location:paiement.php");
}

 $idf; 
 $id_nom;
 $ident['nomprenom'];
 $ident['nserie']; 
 $ident['bstatut']; 
 $ident['statut']; 

 if ($ident['report']!=0)
 {
	 
 }
 else
 {

 }
 ?>

