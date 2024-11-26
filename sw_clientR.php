<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?php
 if(($_SESSION['u_niveau'] != 1)&& ($_SESSION['u_niveau'] != 90)&& ($_SESSION['u_niveau'] != 91)&& ($_SESSION['u_niveau'] != 43) && ($_SESSION['u_niveau'] != 46)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?
$sql = "SELECT COUNT(*) AS actif FROM $tbl_contact  WHERE statut='6'";   
$req=mysqli_query($linki,$sql);
$data= mysqli_fetch_assoc($req);
$Actif=$data['actif'];

$sql2 = "SELECT COUNT(*) AS resilier FROM $tbl_contact  WHERE statut='7'";   
$req2=mysqli_query($linki,$sql2);
$data2= mysqli_fetch_assoc($req2);
$Resilier=$data2['resilier'];

$sql3 = "SELECT COUNT(*) AS police FROM $tbl_contact  WHERE statut='1'";   
$req3=mysqli_query($linki,$sql3);
$data3= mysqli_fetch_assoc($req3);
$ppolice=$data3['police'];

$sql4 = "SELECT COUNT(*) AS devis1 FROM $tbl_contact  WHERE statut='2'";   
$req4=mysqli_query($linki,$sql4);
$data4= mysqli_fetch_assoc($req4);
$pdevis1=$data4['devis1'];

$sql5 = "SELECT COUNT(*) AS devis2 FROM $tbl_contact  WHERE statut='3'";   
$req5=mysqli_query($linki,$sql5);
$data5= mysqli_fetch_assoc($req5);
$pdevis2=$data5['devis2'];

$sql6 = "SELECT COUNT(*) AS brancher FROM $tbl_contact  WHERE statut='4'";   
$req6=mysqli_query($linki,$sql6);
$data6= mysqli_fetch_assoc($req6);
$pbrancher=$data6['brancher'];

$sql9 = "SELECT COUNT(*) AS ffacture FROM $tbl_contact  WHERE statut='5'";   
$req9=mysqli_query($linki,$sql9);
$data9= mysqli_fetch_assoc($req9);
$ffacture=$data9['ffacture'];

$sql7 = "SELECT COUNT(*) AS bt FROM $tbl_contact  WHERE statut='6' and Tarif!='10'";   
$req7=mysqli_query($linki,$sql7);
$data7= mysqli_fetch_assoc($req7);
$cbt=$data7['bt'];

$sql8 = "SELECT COUNT(*) AS mt FROM $tbl_contact  WHERE statut='6' and Tarif='10'";   
$req8=mysqli_query($linki,$sql8);
$data8= mysqli_fetch_assoc($req8);
$cmt=$data8['mt'];

$sql9 = "SELECT COUNT(*) AS mono FROM $tbl_contact  WHERE statut='6' and (Tarif='2' or Tarif='3' or Tarif='4' or Tarif='6' or Tarif='7' or Tarif='8' or Tarif='9' or Tarif='11') ";   
$req9=mysqli_query($linki,$sql9);
$data9= mysqli_fetch_assoc($req9);
$mono=$data9['mono'];

$sql10 = "SELECT COUNT(*) AS tri FROM $tbl_contact  WHERE statut='6' and (Tarif='1' or Tarif='5' or Tarif='10' or Tarif='12')";   
$req10=mysqli_query($linki,$sql10);
$data10= mysqli_fetch_assoc($req10);
$tri=$data10['tri'];


$sql11 = "SELECT COUNT(*) AS v1 FROM $tbl_contact  WHERE statut='6' and Tarif='1'";   
$req11=mysqli_query($linki,$sql11);
$data11= mysqli_fetch_assoc($req11);
$V1=$data11['v1'];

$sql12 = "SELECT COUNT(*) AS v2 FROM $tbl_contact  WHERE statut='6' and Tarif='2'";   
$req12=mysqli_query($linki,$sql12);
$data12= mysqli_fetch_assoc($req12);
$V2=$data12['v2'];

$sql13 = "SELECT COUNT(*) AS v3 FROM $tbl_contact  WHERE statut='6' and Tarif='3'";   
$req13=mysqli_query($linki,$sql13);
$data13= mysqli_fetch_assoc($req13);
$V3=$data13['v3'];

$sql14 = "SELECT COUNT(*) AS v4 FROM $tbl_contact  WHERE statut='6' and Tarif='4'";   
$req14=mysqli_query($linki,$sql14);
$data14= mysqli_fetch_assoc($req14);
$V4=$data14['v4'];


$sql15 = "SELECT COUNT(*) AS v5 FROM $tbl_contact  WHERE statut='6' and Tarif='5'";   
$req15=mysqli_query($linki,$sql15);
$data15= mysqli_fetch_assoc($req15);
$V5=$data15['v5'];


$sql16 = "SELECT COUNT(*) AS v6 FROM $tbl_contact  WHERE statut='6' and Tarif='6'";   
$req16=mysqli_query($linki,$sql16);
$data16= mysqli_fetch_assoc($req16);
$V6=$data16['v6'];


$sql17 = "SELECT COUNT(*) AS v7 FROM $tbl_contact  WHERE statut='6' and Tarif='7'";   
$req17=mysqli_query($linki,$sql17);
$data17= mysqli_fetch_assoc($req17);
$V7=$data17['v7'];

$sql18 = "SELECT COUNT(*) AS v8 FROM $tbl_contact  WHERE statut='6' and Tarif='8'";   
$req18=mysqli_query($linki,$sql18);
$data18= mysqli_fetch_assoc($req18);
$V8=$data18['v8'];



?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
<a href="co_affichage.php" class="btn btn-sm btn-success" > Les clients  </a> |
<a href="re_affichage.php" class="btn btn-sm btn-success" > Informations des Compteurs </a> |
<a href="stat_filtre.php" class="btn btn-sm btn-success">Tableaux de bord   </a> |
<a href="stat_tableau.php" class="btn btn-sm btn-success"> Graphiques </a>  |
<a href="stat_traitement.php" class="btn btn-sm btn-success">Traitement  des alertes  </a> |
<a href="stat_traitement_con_affichage.php" class="btn btn-sm btn-success"> Affichage des alertes </a> |
<a href="#" class="btn btn-sm btn-success"> Gestion des SMS </a> |
</div>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="96%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">INFO SUR LES CLIENTS </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0">
              <tr>
                <td width="8%" height="43">Police à payer </td>
                <td width="10%">Devis à realiser </td>
                <td width="9%">Devis realisé</td>
                <td width="10%">A Brancher </td>
                <td width="10%">Client à Fact</td>
                <td width="9%">Client Actif </td>
                <td width="10%">Monophasé </td>
                <td width="9%">Triphasé</td>
                <td width="9%">Client BT </td>
                <td width="9%">Client MT </td>
                <td width="7%"> Resilié</td>
              </tr>
              <tr>
                <td><?php echo $ppolice;?></td>
                <td><?php echo $pdevis1;?></td>
                <td><?php echo $pdevis2;?></td>
                <td><?php echo $pbrancher;?></td>
                <td><?php echo $ffacture;?></td>
                <td><?php echo $Actif;?></td>
                <td><?php echo $mono;?></td>
                <td><?php echo $tri;?></td>
                <td><?php echo $cbt;?></td>
                <td><?php echo $cmt;?></td>
                <td><?php echo $Resilier;?></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="21"><?php
include_once('pied.php');
?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>