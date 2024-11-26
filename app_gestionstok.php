<?php
Require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';
?>
<?php
 if(($_SESSION['u_niveau'] != 7)&& ($_SESSION['u_niveau'] != 40) && ($_SESSION['u_niveau'] != 90)) {
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
<table width="97%" border="0">
  <tr>
    <td width="49%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">GESTION DES STOCKES (VENTES)</h3>
      </div>
      <div class="panel-body"> 
      <?php if (($_SESSION['u_niveau']== 40)or($_SESSION['u_niveau']== 7)) {?>
       <a href="stk_produit.php" class="btn btn-sm btn-success" > Liste des Produits </a> |
       <?php } else { }?>
       <a href="stk_enregistrement.php" class="btn btn-sm btn-success" > Ajouter la quantité </a> |
       <a href="stk_stock.php" class="btn btn-sm btn-success" >Suivi du Stock</a> |
       <a href="stk_Rapport.php" class="btn btn-sm btn-success" >Les rapports </a> |
       <a href="app_transfert_etape1.php" class="btn btn-sm btn-success" >Transfert  </a> |
       </div>
    </div></td>
    <td width="2%">&nbsp;</td>
    <td width="49%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">GESTION DU MAGASIN INTERNE</h3>
      </div>
      <div class="panel-body"> 
      <?php if (($_SESSION['u_niveau']== 40)or($_SESSION['u_niveau']== 7)) {?>
      <a href="app_produit_liste.php" class="btn btn-sm btn-default" > Liste des Produits </a> |
      <?php } else { }?>
      <a href="app_produit_entre.php" class="btn btn-sm btn-default" > Entre au Magasin </a> | 
      <a href="app_produit_sortie.php" class="btn btn-sm btn-default" > Sortie au Magasin </a> | 
      <a href="app_produit_stock.php" class="btn btn-sm btn-default" >Suivi du Stock Magasin</a> |
      

    </div></td>
  </tr>
</table>
<p align='center'><img src="images/gestionstock.jpg" width="375" height="320"></p>
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
