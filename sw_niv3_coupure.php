<?php
Require("session.php"); 
?>
<?php
 if($_SESSION['u_niveau'] != 3) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>

<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.centrevaleur {
	text-align: center;
}
.centrevaleur td {
	text-align: center;
}
.taille16 {	font-size: 16px;
}
</style>
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?php
Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
 
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
 <div class="panel-body"><a href="coupure.php" class="btn btn-sm btn-success" >Coupures </a>|
 <a href="coupure_tarif.php" class="btn btn-sm btn-success" >Coupures selon tarif </a>|
 <a href="coupurereport.php" class="btn btn-sm btn-success" >Coupure des Reports   </a> |
<a href="rapport_recouvrement.php" class="btn btn-sm btn-success" > RECAP : Montant à recouvrer </a> |
<a href="rapport_recouvrement_detail.php" class="btn btn-sm btn-success" > RECAP : Montant à recouvrer avec détail </a> |
<a href="penalite.php" class="btn btn-sm btn-success" > Penalité/Retard </a> | </div>

<p align='center'>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center"></div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
  </tr>
  <tr> 
    <td height="21"> 
    
      <?php
include_once('pied.php');
?>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
