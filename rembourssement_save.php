<?php
require 'fonction.php';
require 'configuration.php';


$idp=$_POST['idp'];

$sqlreservation="SELECT * FROM $tbl_paiement WHERE idp='$idp'";
$resultatreserv=mysql_query($sqlreservation);
$ident=mysql_fetch_array($resultatreserv);

if ($ident) {
$idp=$ident['idp'];
$idf=$ident['idf'];
$id=$ident['id'];
$montant=$ident['montant'];
$paiement=$ident['paiement'];
$report=$ident['report'];
}
$id_nom=addslashes($_POST['id_nom']);
$report1=0;
$paiement1=0;
$ortc_dp1=0;
$tax_dp1=0;
$totalht_dp1=0;

$sqplace="update $tbl_paiement set id_nom='$id_nom', montant='$montant', report='$montant', paiement='$paiement1', rembourser='$paiement',type='R', ortc_dp='$ortc_dp1',tax_dp='$tax_dp1', totalht_dp='totalht_dp1' WHERE idp='$idp'";
$resultplace=mysql_query($sqplace);


$sqplace2="update $tbl_fact set report='$montant' WHERE idf='$idf'";
$resultplace2=mysql_query($sqplace2);

mysql_close($link);
?>
<?php
header("location:rembourssement.php");
?>