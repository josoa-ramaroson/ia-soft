<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
	if(($_SESSION['u_niveau'] != 1)&& ($_SESSION['u_niveau'] != 90)&& ($_SESSION['u_niveau'] != 43) && ($_SESSION['u_niveau'] != 46)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
</head>
<?
require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?
$sql = "SELECT COUNT(*) AS actif FROM $tbl_contact  WHERE statut='6'";   
$req=mysql_query($sql);
$data= mysql_fetch_assoc($req);
$Actif=$data['actif'];

$sql2 = "SELECT COUNT(*) AS resilier FROM $tbl_contact  WHERE statut='7'";   
$req2=mysql_query($sql2);
$data2= mysql_fetch_assoc($req2);
$Resilier=$data2['resilier'];

$sql3 = "SELECT COUNT(*) AS police FROM $tbl_contact  WHERE statut='1'";   
$req3=mysql_query($sql3);
$data3= mysql_fetch_assoc($req3);
$ppolice=$data3['police'];

$sql4 = "SELECT COUNT(*) AS devis1 FROM $tbl_contact  WHERE statut='2'";   
$req4=mysql_query($sql4);
$data4= mysql_fetch_assoc($req4);
$pdevis1=$data4['devis1'];

$sql5 = "SELECT COUNT(*) AS devis2 FROM $tbl_contact  WHERE statut='3'";   
$req5=mysql_query($sql5);
$data5= mysql_fetch_assoc($req5);
$pdevis2=$data5['devis2'];

$sql6 = "SELECT COUNT(*) AS brancher FROM $tbl_contact  WHERE statut='4'";   
$req6=mysql_query($sql6);
$data6= mysql_fetch_assoc($req6);
$pbrancher=$data6['brancher'];

$sql9 = "SELECT COUNT(*) AS ffacture FROM $tbl_contact  WHERE statut='5'";   
$req9=mysql_query($sql9);
$data9= mysql_fetch_assoc($req9);
$ffacture=$data9['ffacture'];

$sql7 = "SELECT COUNT(*) AS bt FROM $tbl_contact  WHERE statut='6' and Tarif!='10'";   
$req7=mysql_query($sql7);
$data7= mysql_fetch_assoc($req7);
$cbt=$data7['bt'];

$sql8 = "SELECT COUNT(*) AS mt FROM $tbl_contact  WHERE statut='6' and Tarif='10'";   
$req8=mysql_query($sql8);
$data8= mysql_fetch_assoc($req8);
$cmt=$data8['mt'];

$sql9 = "SELECT COUNT(*) AS mono FROM $tbl_contact  WHERE statut='6' and (Tarif='2' or Tarif='3' or Tarif='4' or Tarif='6' or Tarif='7' or Tarif='8' or Tarif='9' or Tarif='11') ";   
$req9=mysql_query($sql9);
$data9= mysql_fetch_assoc($req9);
$mono=$data9['mono'];

$sql10 = "SELECT COUNT(*) AS tri FROM $tbl_contact  WHERE statut='6' and (Tarif='1' or Tarif='5'  or Tarif='12')";   
$req10=mysql_query($sql10);
$data10= mysql_fetch_assoc($req10);
$tri=$data10['tri'];


$sql11 = "SELECT COUNT(*) AS v1 FROM $tbl_contact  WHERE statut='6' and Tarif='1'";   
$req11=mysql_query($sql11);
$data11= mysql_fetch_assoc($req11);
$V1=$data11['v1'];

$sql12 = "SELECT COUNT(*) AS v2 FROM $tbl_contact  WHERE statut='6' and Tarif='2'";   
$req12=mysql_query($sql12);
$data12= mysql_fetch_assoc($req12);
$V2=$data12['v2'];

$sql13 = "SELECT COUNT(*) AS v3 FROM $tbl_contact  WHERE statut='6' and Tarif='3'";   
$req13=mysql_query($sql13);
$data13= mysql_fetch_assoc($req13);
$V3=$data13['v3'];

$sql14 = "SELECT COUNT(*) AS v4 FROM $tbl_contact  WHERE statut='6' and Tarif='4'";   
$req14=mysql_query($sql14);
$data14= mysql_fetch_assoc($req14);
$V4=$data14['v4'];


$sql15 = "SELECT COUNT(*) AS v5 FROM $tbl_contact  WHERE statut='6' and Tarif='5'";   
$req15=mysql_query($sql15);
$data15= mysql_fetch_assoc($req15);
$V5=$data15['v5'];


$sql16 = "SELECT COUNT(*) AS v6 FROM $tbl_contact  WHERE statut='6' and Tarif='6'";   
$req16=mysql_query($sql16);
$data16= mysql_fetch_assoc($req16);
$V6=$data16['v6'];


$sql17 = "SELECT COUNT(*) AS v7 FROM $tbl_contact  WHERE statut='6' and Tarif='7'";   
$req17=mysql_query($sql17);
$data17= mysql_fetch_assoc($req17);
$V7=$data17['v7'];

$sql18 = "SELECT COUNT(*) AS v8 FROM $tbl_contact  WHERE statut='6' and Tarif='8'";   
$req18=mysql_query($sql18);
$data18= mysql_fetch_assoc($req18);
$V8=$data18['v8'];

$sql19 = "SELECT COUNT(*) AS v9 FROM $tbl_contact  WHERE statut='6' and Tarif='9'";   
$req19=mysql_query($sql19);
$data19= mysql_fetch_assoc($req19);
$V9=$data19['v9'];

$sql110 = "SELECT COUNT(*) AS v10 FROM $tbl_contact  WHERE statut='6' and Tarif='10'";   
$req110=mysql_query($sql110);
$data110= mysql_fetch_assoc($req110);
$V10=$data110['v10'];

$sql111 = "SELECT COUNT(*) AS v11 FROM $tbl_contact  WHERE statut='6' and Tarif='11'";   
$req111=mysql_query($sql111);
$data111= mysql_fetch_assoc($req111);
$V11=$data111['v11'];

$sql112 = "SELECT COUNT(*) AS v12 FROM $tbl_contact  WHERE statut='6' and Tarif='12'";   
$req112=mysql_query($sql112);
$data112= mysql_fetch_assoc($req112);
$V12=$data112['v12'];
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
      <a href="re_affichage_n.php" class="btn btn-sm btn-success" >Police à Payer</a> |
      <a href="re_affichage_devis.php" class="btn btn-sm btn-success" >Devis à realiser  </a> |
      <a href="re_affichage_branch.php" class="btn btn-sm btn-success"> Devis realisé </a> |
      <a href="re_affichage_connecte.php" class="btn btn-sm btn-success" > Client à Brancher</a> |
      <a href="re_affichage_facture.php" class="btn btn-sm btn-success" >  Clientt à Facturer </a> |
      <a href="re_affichage.php" class="btn btn-sm btn-success" > Client actifs </a> |
      <a href="re_affichage_resilier.php" class="btn btn-sm btn-success" >  Clientt résilié </a> |</div>
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
                <td width="9%">Triphasé(BT)</td>
                <td width="9%">Client BT </td>
                <td width="9%">Client MT </td>
                <td width="7%"> Resilié</td>
              </tr>
              <tr>
                <td><? echo $ppolice;?></td>
                <td><? echo $pdevis1;?></td>
                <td><? echo $pdevis2;?></td>
                <td><? echo $pbrancher;?></td>
                <td><? echo $ffacture;?></td>
                <td><? echo $Actif;?></td>
                <td><? echo $mono;?></td>
                <td><? echo $tri;?></td>
                <td><? echo $cbt;?></td>
                <td><? echo $cmt;?></td>
                <td><? echo $Resilier;?></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="96%" height="114"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">DETAIL DES CLIENTS PAR TARIFICATION  </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0">
              <tr>
                <td width="8%" height="34">Elec BT Triphasé</td>
                <td width="10%"><? echo $V1;?></td>
                <td width="9%">&nbsp;</td>
                </tr>
              <tr>
                <td height="32" bgcolor="#CCCCCC">Elec BT Monophasé Domestique</td>
                <td bgcolor="#CCCCCC"><? echo $V2;?></td>
                <td bgcolor="#CCCCCC">&nbsp;</td>
                </tr>
              <tr>
                <td height="32">Mosquée</td>
                <td><? echo $V3;?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="34" bgcolor="#CCCCCC">BT Mono Pomoni</td>
                <td bgcolor="#CCCCCC"><? echo $V4;?></td>
                <td bgcolor="#CCCCCC">&nbsp;</td>
              </tr>
              <tr>
                <td height="33">BT Tri Pomoni</td>
                <td><? echo $V5;?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="37" bgcolor="#CCCCCC">BT Mono Agent</td>
                <td bgcolor="#CCCCCC"><? echo $V6;?></td>
                <td bgcolor="#CCCCCC">&nbsp;</td>
              </tr>
              <tr>
                <td height="40">BT Mono Agent P</td>
                <td><? echo $V7;?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="36" bgcolor="#CCCCCC">BT Mono Agent retraité</td>
                <td bgcolor="#CCCCCC"><? echo $V8;?></td>
                <td bgcolor="#CCCCCC">&nbsp;</td>
              </tr>
              <tr>
                <td height="34">BT Mono Retraité P</td>
                <td><? echo $V9;?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="35" bgcolor="#CCCCCC">MT</td>
                <td bgcolor="#CCCCCC"><? echo $V10;?></td>
                <td bgcolor="#CCCCCC">&nbsp;</td>
              </tr>
              <tr>
                <td height="47">BT Mono Agent Couple</td>
                <td><? echo $V11;?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="37" bgcolor="#CCCCCC">BT Tri 500</td>
                <td bgcolor="#CCCCCC"><? echo $V12;?></td>
                <td bgcolor="#CCCCCC">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
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