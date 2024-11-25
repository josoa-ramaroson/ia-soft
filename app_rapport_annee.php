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
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Rapport des achats par Année 
      <?php

$annee=$_POST['annee'];

$sql2="SELECT SUM(prixt) AS prixt FROM $tbl_appachat where  YEAR(date_dem)=$annee";
$result2=mysql_query($sql2);
$rows2=mysql_fetch_array($result2)
?>
    </h3>
  </div>
  <div class="panel-body">
    
      <table width="100%" border="0">
        <tr>
          <td width="32%"> Annee <? echo $annee;?> </td>
          <td width="23%"><? $P=strrev(chunk_split(strrev($rows2['prixt']),3," "));   echo $P;?></td>
          <td width="45%"> 
          <a href="app_rapport_annee_liste.php?id=<? echo md5(microtime()).$annee; ?>" class="btn btn-xs btn-success" target="_blank">Cliquez ici pour voir les details</a>          
          </td>
        </tr>
      </table>

  </div>
</div>
<p>&nbsp;</p>
</body>
</html>
