<?php
Require 'sessionclient.php';
require 'fc-affichage.php';
require_once('calendar/classes/tc_calendar.php');
require 'fonction.php';
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<?php include 'inc/head.php'; ?>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?
$idc=substr($_REQUEST["idr"],32);
$nomclient=$_REQUEST["nc"];
require "client_lient.php";

$sql = "SELECT *FROM $tb_echangagent where id_client=$idc ORDER BY idv  DESC";  
$req = mysqli_query($linki,$sql)

?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">SUIVI DE VOS DEMANDES </h3>
            </div>
            <div class="panel-body">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="panel-body">
                <tr>
                  <td width="15%">Date </td>
                  <td width="61%">Demande</td>
                  <td width="24%">Tache realisé par </td>
                </tr>
                  <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
                <tr>
                  <td><?php echo $data['dated'];?></td>
                  <td><?php echo $data['note'];?>  
                 <?php 
				  $tr=$data['Nsend'];
				  $Banque=$data['Banque'];
				  
                  if ($data['service']==2)  {echo $data['indexc'];}
                  if ($data['service']==20) {echo $data['montant'];  echo "N°de Transaction $tr  de la banque $Banque ";}
                  if ($data['service']==44) {echo $data['Probleme'];}
                  ?>
                  
                  </td>
                  <td>
                  
                   <?php
 			   $idv=$data['idv'];
				   $sqlr="SELECT * FROM $tb_echangreponse WHERE idv='$idv'" ;
				   $resu= mysqli_query($linki,$sqlr);
				   $suivi=mysqli_fetch_array($resu);

				  if ($suivi===FALSE){ } else { echo $suivi['nom']; }
                  ?>
                  
                  </td>
                </tr>
 <?php

}

?>
              </table>
            </div>
          </div>
<p><font size="2"><font size="2"></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
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
