<?
	$login=addslashes($_POST['m1']);
	$motdepasse=addslashes(md5($_POST['m2']));
	require 'fonction.php';
	$sql="SELECT * FROM usersys WHERE u_login='$_POST[m1]' and u_pwd='$motdepasse' and statut='Operationnel'" ;
	$resultat= mysql_query($sql);
	$u_utilisateur=mysql_fetch_array($resultat);

	if ($u_utilisateur===FALSE)
	{
		

		header("location:gesoft.php?a=false");
		exit;
	} else 
	
	{
	
$valeur_existant = "SELECT * FROM $tbl_paiement order by date desc LIMIT 0,1 ";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error()); 
$data=mysqli_fetch_array($sqLvaleur);
$date=$data['date'];

$blogin='GESOFT';

$valbsc=md5($date);
$valbsc=$valbsc.md5($CONTRATN.(date("Y", strtotime($date))).$CONSULTANT);
$valbsc=md5("y/m/d H:i:s").$valbsc.md5($valbsc);

$sqlp="update  $tbl_caisse  set  datecaisse='$date' , blogin='$blogin' , valbsc='$valbsc' ";
$resultp=mysqli_query($linki,$sqlp);

$sqlp2="update  $tbl_date  set  date='$date' ";
$resultp2=mysqli_query($linki,$sqlp2);
	
		
		header("location:index.php");
	
	}
?>
