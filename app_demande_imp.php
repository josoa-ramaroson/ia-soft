<?
require 'session.php';
?>
<html>
<head>
<title><? include 'titre.php'; ?></title>
<? include 'inc/head.php'; ?>
<style type="text/css">
.centre {
	text-align: center;
}
</style>
</head>

<body>
<?
	if((($_SESSION['u_niveau'] != 20) ) && ($_SESSION['u_niveau'] != 40) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
      
<table width="100%" border="0">
  <tr>
    <td width="43%" height="67"><p><strong>
       
    <?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

//$date_dem=addslashes($_REQUEST['direction']);
$id_dem=substr($_REQUEST["id"],32);
$sql5="SELECT * FROM $tbl_appdeproduit where id_dem='$id_dem'";
$req5=mysqli_query($linki,$sql5);
$datam=mysqli_fetch_array($req5);

?>
    <img src="images/eda.png" width="150" height="66" /></strong><strong> </strong></p></td>
    <td width="57%"><h1 class="centre">&nbsp;</h1></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="50%" height="135"><p>Tel : 771 01 68 Fax : 771 02 09 </p>
      <p>Email: contact@sonelecanjouan.com</p>
      <p> http://www.sonelecanjouan.com</p>
    <p>&nbsp;</p></td>
    <td width="50%"><div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"> DEMANDE D'ACHAT </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="93%" border="0.5" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="36%">Nom du demandeur </td>
                <td width="64%"><font color="#000000"><strong><? echo $datam['nomprenom'];?></strong></font></td>
              </tr>
              <tr>
                <td>Direction</td>
                <td><strong><? echo $datam['direction'];?></strong></td>
              </tr>
              <tr>
                <td>Service </td>
                <td><strong><? echo $datam['service'];?></strong></td>
              </tr>
              <tr>
                <td><span style="width:36%">Date de la demande </span></td>
                <td><strong>
                  <? $date_dem=$datam['date_dem'];  echo  date("d-m-Y", strtotime($date_dem));?>
                </strong></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
<p align="left"> <font color="#000000"><strong><? $Codebare=$datam['id_dem'];?> <img src="codeBarre.php?Code=<?=$Codebare?>"></strong></font></p>
<div class="panel panel-info">
  <div class="panel-body">
  
  <?php
	 $sqact="SELECT * FROM $tbl_appdeproduit where id_dem='$id_dem'";
	 $resultact=mysqli_query($linki,$sqact);
?>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="26%" align="center">Designation des articles </td>
            <td width="23%"align="center">Quantite </td>
            <td width="31%" align="center">Fournisseur </td>
            <td width="20%">&nbsp;</td>
            </tr>
    <? while($datam5=mysqli_fetch_array($resultact)){ // Start looping table row?>
     
          <tr>
            <td align="center"><? echo $datam5['designation'];?></td>
            <td align="center"><? echo $datam5['quantite'];?></td>
            <td align="center"><? echo $datam5['fournisseur'];?></td>
            <td>&nbsp;</td>
          </tr>
        <? } ?>
        
        </table></td>
      </tr>
    </table>
  </div>
</div>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">SIGNATURE </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="49%">Signature du demandeur </td>
            <td width="51%">Visa du chef hierachique </td>
          </tr>
          <tr>
            <td height="66"><p>&nbsp;</p>
                    <p>&nbsp;</p></td>
            <td><p>&nbsp;</p></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>




