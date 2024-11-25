<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
require 'rh_configuration_fonction.php';
?>
<?
	if((($_SESSION['u_niveau'] != 40) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
<script language="javascript" src="calendar/calendar.js"></script>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />

</head>
<?
//Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Rapport des achats par mois
      <?php
$mois=substr($_REQUEST["id"],32);
$annee=substr($_REQUEST["m"],32);



$sql2="SELECT SUM(prixt) AS prixt FROM $tbl_appachat where MONTH(date_dem)=$mois and YEAR(date_dem)=$annee";
$result2=mysql_query($sql2);
$rows2=mysql_fetch_array($result2);

$sql = "SELECT * FROM $tbl_appachat where  MONTH(date_dem)=$mois and YEAR(date_dem)=$annee ORDER BY id_da ASC";  
$req = mysql_query($sql); 

?>
    </h3>
  </div>
  <div class="panel-body">
   
      <table width="100%" border="0">
        <tr>
          <td width="49%">Mois <? echo $mois.' / '.$annee;?></td>
          <td width="51%">MONTANT TOTAL : 
          <? $P=strrev(chunk_split(strrev($rows2['prixt']),3," "));   echo $P;?></td>
          <td width="51%">&nbsp;</td>
        </tr>
      </table>

  </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>N°Comptable </strong></font></td>
    <td width="10%" align="center"><strong><font color="#FFFFFF" size="4">Date</font></strong></td>
    <td width="15%" align="center"><font color="#FFFFFF"><strong>Direction</strong></font></td>
    <td width="14%" align="center"><font color="#FFFFFF" size="4"><strong>Designation</strong></font></td>
    <td width="12%" align="center"><strong><font color="#FFFFFF" size="4">Quantite</font></strong></td>
    <td width="11%" align="center"><font color="#FFFFFF">Prix Unitaire </font> </td>
    <td width="11%" align="center"><font color="#FFFFFF">Prix Total </font> </td>
    <td width="11%" align="center"><font color="#FFFFFF">Fournisseur </font> </td>
    
  </tr>
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><em><? echo $data['codecompte'];?></em></td>
      <td align="center" bgcolor="#FFFFFF"><em><? echo $data['date_dem'];?></em></td>
      <td align="center" bgcolor="#FFFFFF"><em><? echo $data['direction'];?></em></td>
      <td align="center" bgcolor="#FFFFFF"><em><? echo $data['designation'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data['quantite'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data['prixu'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data['prixt'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data['fournisseur'];?></em></td>
    </tr>
  <?php
}
 
mysql_close ();  
?>
</table>
</body>
</html>
