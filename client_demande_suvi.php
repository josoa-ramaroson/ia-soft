<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<?
$service=$_SESSION['u_niveau'];

$sql = "SELECT *FROM $tb_echangagent where service='$service' ORDER BY idv  DESC";  
$req = mysqli_query($linki,$sql)

?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">SUIVI DES DEMANDES DES CLIENTS </h3>
            </div>
            <div class="panel-body">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="panel-body">
                <tr>
                  <td width="8%">Date </td>
                  <td width="10%">ID CLIENT</td>
                  <td width="19%">NOM DU CLIENT </td>
                  <td width="37%">Demande</td>
                  <td width="11%">N° Tache</td>
                  <td width="15%">Valider par </td>
                </tr>
                  <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
                <tr>
                <td><p><?php echo $data['dated'];?></p></td>
                  <td><?php echo $data['id_client'];?></td>
                  <td><?php echo $data['nom_client'];?></td>
                  <td><?php echo $data['note'];?>
                  <?php 
				  $tr=$data['Nsend'];
				  $Banque=$data['Banque'];
				  
				  
                  if ($data['service']==2)  {echo $data['indexc'];}
                  if ($data['service']==20) {echo $data['montant'];  echo "N°de Transaction $tr de la banque $Banque ";}
                  if ($data['service']==44) {echo $data['Probleme'];}
                  ?></td>
                  <td><?php $idv=$data['idv']; echo $data['idv'];?></td>
                                    
                  <td>
                   <?php
 			   
				   $sqlr="SELECT * FROM $tb_echangreponse WHERE idv='$idv'" ;
				   $resu= mysqli_query($linki,$sqlr);
				   $suivi=mysqli_fetch_array($resu);

				  if ($suivi===FALSE){?>
                  <a href="client_reponse.php?idv=<?php echo md5(microtime()).$data['idv']; ?>" class="btn btn-xs btn-success">Realiser la tache</a>
                  <?php } else { 
				  
				  echo $suivi['nom'];
				  
				  }
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
