<?php
Require("session.php"); 
?>
<?php
 if($_SESSION['u_niveau'] != 7) {
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
  <div class="panel-body"><a href="agence.php" class="btn btn-sm btn-success" >Service </a>|
 <a href="utilisateur.php" class="btn btn-sm btn-success" >Utilisateur  </a> |
  <a href="tarif.php" class="btn btn-sm btn-success" >Tarif  </a> |
 <a href="categorie.php" class="btn btn-sm btn-success" > Categorie </a> | 
 <a href="communication.php" class="btn btn-sm btn-success" >Communication </a> |
 <a href="utilisateursq_connecter.php" class="btn btn-sm btn-success" > <span class="glyphicon glyphicon-qrcode"></span> Les utilisateurs connectés</a> | 
 <a href="co_facturation_doublon.php" class="btn btn-sm btn-success" >SCAN FACT </a>|   
 <a href="paiement_doublon.php" class="btn btn-sm btn-success" >SCAN  PAIEMENT</a>|  
   <a href="xbackup.php" class="btn btn-sm btn-success" > <span class="glyphicon glyphicon-tasks"></span> BACKUP </a> |
    <a href="sw_parametre.php" class="btn btn-sm btn-success" > Parametrage </a> |
  <a href="gesoftcle.php" class="btn btn-sm btn-success" > Gesoft licence </a> |
  
</div>

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
