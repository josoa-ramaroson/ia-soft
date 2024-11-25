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
    <td width="43%" height="71"><p><strong>
       
    <?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

//$date_dem=addslashes($_REQUEST['direction']);
$id_dem=substr($_REQUEST['id'],32);
$sql5="SELECT * FROM $tbl_appcoproduit where id_dem='$id_dem'";
$req5=mysqli_query($linki,$sql5);
$datam=mysqli_fetch_array($req5);
$idf=$datam['idfournisseur'];


$sqlmum="SELECT * FROM $tbl_appcommande WHERE id_dem='$id_dem'";
$resultmum=mysqli_query($linki,$sqlmum);
$datamum=mysqli_fetch_array($resultmum);
$numero=$datamum['num'];


$sqlT="SELECT *  FROM $tb_comptf  where idf=$idf";
$reqT=mysqli_query($linki,$sqlT);
$datamT=mysqli_fetch_array($reqT);

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
    <p>
      <?php
	 $sqact="SELECT * FROM $tbl_appcoproduit WHERE id_dem='$id_dem'";
	 $resultact=mysqli_query($linki,$sqact);

	 $sqsomme="SELECT SUM(prixt) AS prixtt FROM $tbl_appcoproduit WHERE id_dem='$id_dem'";
	 $resomme=mysqli_query($linki,$sqsomme);

?>
    </p></td>
    
      
   
    
    <td width="50%"><div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"> BON DE COMMANDE  </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="93%" border="0.5" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="36%">Nom du fournisseur </td>
                <td width="64%"><font color="#000000"><strong><? echo $datam['fournisseur'];?></strong></font></td>
              </tr>
              <tr>
                <td>Adresse</td>
                <td><font color="#000000"><strong><? echo $datamT['Adressef'];?></strong></font></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><font color="#000000"><strong><? echo $datamT['ville'];?> - <? echo $datamT['pays'];?></strong></font></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><font color="#000000"><strong><? echo $datamT['Telephonef'];?></strong></font> -<font color="#000000"><strong><? echo $datamT['Telephonem'];?></strong></font></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
<table width="100%" border="0">
<p align="left"> <font color="#000000"><strong><? $Codebare=$numero;?> <img src="codeBarre.php?Code=<?=$Codebare?>"></strong></font></p>
  <tr>
    <td width="5%">&nbsp;</td>
    
    <td width="25%"><strong> N° de commande : <? echo $numero;?></strong></td>
    <td width="35%"><strong><? echo $datam['direction'];?> - <? echo $datam['service'];?></strong></td>
    <td width="35%">Date de la demande :<strong>
      <? $date_dem=$datam['date_dem'];  echo  date("d-m-Y", strtotime($date_dem));?>
    </strong></td>
  </tr>
</table>

<div class="panel panel-info">
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="26%">Designation des articles </td>
            <td width="23%"align="center">Quantité </td>
            <td width="28%"align="center">Prix unitaire </td>
            <td width="23%"align="center" >Prix total</td>
            </tr>
  <?php
while($rowsact=mysqli_fetch_array($resultact)){
	 
?>
     
          <tr>
            <td><? echo $rowsact['designation'];?></td>
			<td align="center"><? echo strrev(chunk_split(strrev($rowsact['quantite']),3," "));?></td>
    		 <td align="center"><? echo strrev(chunk_split(strrev($rowsact['prixu']),3," "));?></td>
            <td align="center"><? echo strrev(chunk_split(strrev($rowsact['prixt']),3," "));?></td>
          </tr>
        <? } ?>
        
            <tr>
            <td></td>
            <td></td>
            <td align="center">Montant Total </td>
           <? while($datasomme=mysqli_fetch_array($resomme)){?>
            <td align="center"><? echo strrev(chunk_split(strrev($datasomme['prixtt']),3," ")) ;?></td>
           <? } ?>
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




