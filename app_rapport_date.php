<?php
Require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
require 'rh_configuration_fonction.php';
?>
<?php
 if((($_SESSION['u_niveau'] != 40) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
<script language="javascript" src="calendar/calendar.js"></script>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Rapport des achats par date 
      <?php
$date=$_POST['date'];

$sql2="SELECT SUM(prixt) AS prixt FROM $tbl_appachat where date_dem='$date'";
$result2=mysqli_query($linki,$sql2);
$rows2=mysqli_fetch_array($result2)
?>
    </h3>
  </div>
  <div class="panel-body">
    <form action="app_rapport_date.php" method="post" name="testform" id="form2">
      <table width="100%" border="0">
        <tr>
          <td width="32%"><?php echo $date;?></td>
          <td width="23%"><?php $P=strrev(chunk_split(strrev($rows2['prixt']),3," "));   echo $P;?></td>
          <td width="45%"> 
          <a href="app_rapport_date_liste.php?id=<?php echo md5(microtime()).$date; ?>" class="btn btn-xs btn-success" target="_blank">Cliquez ici pour voir les details</a>          
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>&nbsp;</p>
</body>
</html>
