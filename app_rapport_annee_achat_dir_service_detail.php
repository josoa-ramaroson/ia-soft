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
<?
//Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Rapport des bons d achat par Année regrouper par direction et service
      <?php

 $annee=substr($_REQUEST["id"],32);
 $direction=$_REQUEST['dr'];
 $service=$_REQUEST['sr'];

$sql2="SELECT date_dem,direction,service,designation,quantite,prixu,prixt , id_dem FROM $tbl_appbonachatp where  YEAR(date_dem)='$annee' and direction='$direction' and  service='$service' order by direction ,service ";
$result2=mysqli_query($linki,$sql2);
?>
    </h3>
  </div>
  <div class="panel-body">
    
      <table width="100%" border="0">
	    <?php
 $numboucle=0;
 
while($rows2=mysqli_fetch_array($result2)){ 

 if($numboucle %2 == 0) 
 
   $bgcolor = "#CCDD44"; 

        else 

   $bgcolor = "#FFFFFF";  
?>
        <tr bgcolor=<?php echo "$bgcolor" ?>>
          <td width="9%" height="33"> Annee <?php echo $annee;?> </td>
          <td width="13%"><?php echo $rows2['direction'];?></td>
          <td width="11%"><?php echo $rows2['service'];?> 
                    
          </td>
          <td width="24%"><?php echo $rows2['designation'];?></td>
          <td width="10%"><?php $P=strrev(chunk_split(strrev($rows2['prixu']),3," "));   echo $P;?></td>
          <td width="7%"><?php echo $rows2['quantite'];?></td>
          <td width="11%"><?php $P=strrev(chunk_split(strrev($rows2['prixt']),3," "));   echo $P;?></td>
          <td width="15%"><?php $id_dem2=$rows2['id_dem']; $numero=le_bondeachat($id_dem2,$tbl_appbonachat,$linki); echo $numero; ?></td>
        </tr>
		  <?php
$numboucle++;
}

	function le_bondeachat($id_dem2,$tbl_appbonachat,$linki){
	$sqld3b = "SELECT * FROM $tbl_appbonachat where id_dem='$id_dem2'";
	$resultatd3b = mysqli_query($linki,$sqld3b); 
	$nqtd3b = mysqli_fetch_assoc($resultatd3b);
	if((!isset($nqtd3b['num'])|| empty($nqtd3b['num']))) { $qt3b=''; return $qt3b;}
	else {$qt3b=$nqtd3b['num'];   return $qt3b; }
	}
	
mysqli_free_result ($result2);  
mysqli_close ($linki);  
?>
      </table>

  </div>
</div>
<p>&nbsp;</p>
</body>
</html>
