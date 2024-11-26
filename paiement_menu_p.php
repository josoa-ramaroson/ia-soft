<?php
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require_once 'fonction.php';
require 'rh_configuration_fonction.php';
?>
<?php
	if($_SESSION['u_niveau'] != 4) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>

<style type="text/css">
.centrevaleur {
	text-align: center;
}
.centrevaleur td {
	text-align: center;
}
.taille16 {	font-size: 16px;
}
.nav-gap li {
    margin-right: 14px; /* 8px */
}
.nav-gap li:last-child {
    margin-right: 0;
}
</style>
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?php
Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
 
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">

<nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
          <!-- <a class="navbar-brand" href="/dashboard">
              <i class="fas fa-laptop-code"></i> IaSoft
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
              <span class="navbar-toggler-icon"></span>
          </button> -->
          <div class="" id="navbarNav">
            <ul class="navbar-nav nav-gap">
                <li class="nav-item"><a href="paiement.php" class="btn btn-sm btn-success">Paiement</a></li>
                <li class="nav-item"><a href="paiementcb.php"><img src="images/barre.png" width="100" height="34"/></a></li>
                <li class="nav-item"><a href="#" class="btn btn-sm btn-success">Paiement par Importation</a></li>
                <li class="nav-item"><a href="paiement_gaz.php" class="btn btn-sm btn-warning">Paiement par Gaz</a></li>
                <li class="nav-item"><a href="re_edit_modif_liste_gaz.php" class="btn btn-sm btn-warning">Suivi GAZ</a></li>
                <li class="nav-item"><a href="coi_facturation_liste.php" class="btn btn-sm btn-success">Les pénalités</a></li>
                <li class="nav-item"><a href="re_edit_modif_liste.php" class="btn btn-sm btn-success">Transfert & Changement de nom</a></li>
            </ul>
          </div>
      </div>
  </nav>
<p align='center'><img src="images/cfa.jpg" width="657" height="411"></p>
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