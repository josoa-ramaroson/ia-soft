<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<table width="100%" border="0">
  <tr>
    <td width="47%" height="67"><p><strong><img src="images/eda.png" width="173" height="65" /></strong></p>
    <p><strong> </strong></p></td>
    <td width="53%"><h1 class="centre"> AUTORISATION DE DEPENSES<span style="width: 75%; font-size: 24px;">
      <?php
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass); 
mysql_select_db($db);
$id=substr($_REQUEST["id"],32);
$sql5="SELECT * FROM $tbl_appaut WHERE idapp_aut='$id'";
$req5=mysql_query($sql5);

while($data5=mysql_fetch_array($req5)){
?>
    </span></h1></td>
  </tr>
</table>
<p>&nbsp;</p>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">DETAIL DE DEPENSES</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="76%">DATE :<em> <? echo $data5['date'];?> </em></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>SERVICE DEMANDEUR : <em><? echo $data5['service'];?> </em></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>NATURE DE LA DEPENSE :<em> <b><? echo $data5['Nature'];?></em></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>MOTIF : <strong> <em><? echo $data5['Motif'];?></em></strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>MONTANT : <em><? echo  strrev(chunk_split(strrev($data5['Montant']),3," "));?></em></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<p>
  <?php
}
?>
</p>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="25%" align="center"><b><u> LE DEMANDEUR </u></b></td>
    <td width="37%" align="center"><b><u>LE CHEF SEV APPROVISIONNEMENT</u></b></td>
    <td width="38%" align="center"><b><u>LE DIRECTEUR </u></b></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>