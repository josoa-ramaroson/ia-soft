<?php
Require 'session.php';
?>
<html>
<head>
<title><?php include 'titre.php'; ?></title>
<?php include 'inc/head.php'; ?>
<style type="text/css">
.centre {
	text-align: center;
}
</style>
</head>

<body>
<?php
 if((($_SESSION['u_niveau'] != 20) ) && ($_SESSION['u_niveau'] != 40) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<table width="100%" border="0">
  <tr>
    <td width="43%" height="71"><p><strong>
       
    <?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

//$date_dem=addslashes($_REQUEST['direction']);
$id_dem=substr($_REQUEST['id'],32);
$sql5="SELECT * FROM $tbl_appbonachatp where id_dem='$id_dem'";
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
        <h3 class="panel-title"> ORDRE DE SERVICE </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="93%" border="0.5" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="36%">Direction</td>
                <td width="64%"><strong><?php echo $datam['direction'];?></strong></td>
              </tr>
              <tr>
                <td>Service </td>
                <td><strong><?php echo $datam['service'];?></strong></td>
              </tr>
              <tr>
                <td><span style="width:36%">Date de la demande </span></td>
                <td><strong>
                  <?php $date_dem=$datam['date_dem'];  echo  date("d-m-Y", strtotime($date_dem));?>
                </strong></td>
              </tr>
              <tr>
                <td>Nom du fournisseur </td>
                <td><font color="#000000"><strong><?php echo $datam['fournisseur'];?></strong></font></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
<?php
	 $sqact="SELECT * FROM $tbl_appbonachatp WHERE id_dem='$id_dem'";
	 $resultact=mysqli_query($linki,$sqact);

	 $sqsomme="SELECT SUM(prixt) AS prixtt FROM $tbl_appbonachatp WHERE id_dem='$id_dem'";
	 $resomme=mysqli_query($linki,$sqsomme);

?>
<p align="left"> <font color="#000000"><strong><?php $Codebare=$datam['id_dem'];?> <img src="codeBarre.php?Code=<?=$Codebare?>"></strong></font></p>
<p align="center">&nbsp;</p>
<div class="panel panel-info">
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="26%">Designation des articles </td>
            <td width="23%" align="center">Quantite </td>
            <td width="28%" align="center">Prix unitaire </td>
            <td width="23%" align="center">Prix total</td>
            </tr>
  <?php
while($rowsact=mysqli_fetch_array($resultact)){
	 
?>
     
          <tr>
            <td><?php echo $rowsact['designation'];?></td>
		   <td align="center"><?php echo strrev(chunk_split(strrev($rowsact['quantite']),3," "));?></td>
    		<td align="center"><?php echo strrev(chunk_split(strrev($rowsact['prixu']),3," "));?></td>
           <td align="center"><?php echo strrev(chunk_split(strrev($rowsact['prixt']),3," "));?></td>
			
			
          </tr>
        <?php } ?>
        
            <tr>
            <td></td>
            <td></td>
            <td align="center">Montant Total </td>
           <?php while($datasomme=mysqli_fetch_array($resomme)){?>
            <td align="center"><?php echo $datasomme['prixtt'];?></td>
           <?php } ?>
          </tr>
          
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
            <td width="30%">Visa du Chef Logistique</td>
            <td width="29%">Visa du RAF </td>
            <td width="41%">Visa du Directeur Regional</td>
          </tr>
          <tr>
            <td height="66"><p>&nbsp;</p></td>
            <td><p>&nbsp;</p></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>




