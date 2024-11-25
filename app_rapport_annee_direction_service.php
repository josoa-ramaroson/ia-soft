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
    <h3 class="panel-title">Rapport des achats par Année regrouper par direction et service
      <?php

$annee=$_POST['annee'];

$sql2="SELECT SUM(prixt) AS prixt, direction ,service FROM $tbl_appbonachatp where  YEAR(date_dem)=$annee GROUP by direction, service order by direction ,service  ";
$result2=mysql_query($sql2);
?>
    </h3>
  </div>
  <div class="panel-body">
    
      <table width="100%" border="0">
	    <?php
 $numboucle=0;
 
while($rows2=mysql_fetch_array($result2)){ 

 if($numboucle %2 == 0) 
 
   $bgcolor = "#CCDD44"; 

        else 

   $bgcolor = "#FFFFFF";  
?>
        <tr bgcolor=<? echo "$bgcolor" ?>>
          <td width="20%" height="33"> Annee <? echo $annee;?> </td>
          <td width="21%"><? echo $rows2['direction'];?></td>
          <td width="19%"><? echo $rows2['service'];?> 
                    
          </td>
          <td width="14%"><? $P=strrev(chunk_split(strrev($rows2['prixt']),3," "));   echo $P;?></td>
          <td width="26%">
          <a href="app_rapport_annee_direction_service_export.php?id=<? echo md5(microtime()).$annee; ?>&dr=<? echo $rows2['direction'];?>&sr=<? echo $rows2['service']; ?>" class="btn btn-xs btn-success" target="_blank"> Exporter </a>
          </td>
        </tr>
		  <?php
$numboucle++;
}
mysql_free_result ($result2);  
mysql_close ();  
?>
      </table>

  </div>
</div>
<p>&nbsp;</p>
</body>
</html>
