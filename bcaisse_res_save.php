<?

require 'fonction.php';

$valeur_existant = "SELECT * FROM $tbl_paiement order by date desc LIMIT 0,1 ";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error()); 
$data=mysqli_fetch_array($sqLvaleur);
$date=$data['date'];

 $blogin=addslashes($_POST['blogin']);

$valbsc=md5($date);
$valbsc=$valbsc.md5($CONTRATN.(date("Y", strtotime($date))).$CONSULTANT);
$valbsc=md5("y/m/d H:i:s").$valbsc.md5($valbsc);

$sqlp="update  $tbl_caisse  set  datecaisse='$date' , blogin='$blogin' , valbsc='$valbsc' ";
$resultp=mysqli_query($linki,$sqlp);

$sqlp2="update  $tbl_date  set  date='$date' ";
$resultp2=mysqli_query($linki,$sqlp2);


$sqlp3="update  $tbl_caisse_tmp set  datecaisseT='$date' , blogin='$blogin'  ";
$resultp3=mysqli_query($linki,$sqlp3);
		
header("location: bcaisse.php");

?>
