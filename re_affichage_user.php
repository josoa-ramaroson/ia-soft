<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="calendar/calendar.js"></script>
<title><? include 'titre.php' ?></title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
//$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tbl_contact WHERE id='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);


	$sqfacd="SELECT * FROM $tbl_fact WHERE id='$id' and st!='E' ORDER BY idf desc";
	$resultfacd=mysql_query($sqfacd);
	
	$sqpaied="SELECT * FROM $tbl_paiement  WHERE id='$id' and st!='E' ORDER BY idp DESC";
	$resultpaied=mysql_query($sqpaied);
	
?>
<body>
<script type="text/javascript"> 
function toggleBox(szDivID, iState)// 1 visible, 0 hidden
 {
   if(document.getElementById)   //gecko(NN6) + IE 5+
   {
    var obj = document.getElementById(szDivID);
    obj.style.display = iState ? "block" : "none";
   }
  }
</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
    <form action="paiement_apercu.php" method="post" name="form1" id="form2">
    <? if ($_SESSION['niveau']==1) {?>
      <a href="re_edit.php?id=<? echo md5(microtime()).$datam['id'];?>" class="btn btn-sm btn-success" >Edit le client</a>
     |
     
     <a href="client_document.php?id=<? echo md5(microtime()).$datam['id'];?>" class="btn btn-sm btn-success" > Ajouter des documents </a>
     | 
    <? } else { } ?> 
    <? if ($_SESSION['niveau']==1 and $datam['statut']!=6 and $datam['statut']!=7){?> 
	 <a href="re_edit_modif.php?id=<? echo md5(microtime()).$datam['id'];?>" class="btn btn-sm btn-success" >Modifications</a>
	 |	 
	<? } else { } ?>
    <? if ($_SESSION['niveau']==42 and $datam['statut']==4) {?> 
     <a href="#" onClick="toggleBox('activite',1);" class="btn btn-sm btn-success">Information de compteur </a>|
      <? } else { } ?>
      <? if ($_SESSION['niveau']==44 and $datam['statut']==4) {?>  
     <a href="#" onClick="toggleBox('plombage',1);" class="btn btn-sm btn-success" >Ajouter des Plombs </a>
     |  <? } else { } ?>
     
     <? if ($_SESSION['niveau']==44 and $datam['statut']==6){?> 
    <a href="sv_edit.php?id=<? echo md5(microtime()).$datam['id'];?>" class="btn btn-sm btn-success" > Mise à Jours des Blombs</a>
    <? } else { } ?>
    </form>
  </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr>
    <td height="211"><form action="re_enregistrement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                   <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information du client </font></strong></div></td>
        </tr>
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%"><strong>
          <? echo $datam['id'];?>
          </strong></td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Designation</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
           <? echo $datam['Designation'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
          <td><strong><? echo $datam['tel'];?></strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['nomprenom'];?>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Fax</font></strong></td>
          <td><strong><? echo $datam['fax'];?></strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Surnom</font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['surnom'];?></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Site Web</font></strong></td>
          <td><strong><? echo $datam['url'];?></strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Email</font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['email'];?></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Adresse</font></strong></td>
          <td><strong><? echo $datam['adresse'];?></strong></td>
        </tr>
        <tr>
          <td><strong>Titre </strong></td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['titre'];?></strong></td>
          <td>&nbsp;</td>
          <td><strong>Ile</strong></td>
          <td><strong><? echo $datam['ile'];?></strong></td>
        </tr>
        <tr>
          <td>login</td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['login'];?></strong></td>
          <td>&nbsp;</td>
          <td>Secteur</td>
          <td><strong><? echo $datam['secteur'];?></strong></td>
        </tr>
        <tr>
          <td>pwd</td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['pwd'];?></strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Ville</font></strong></td>
          <td><strong><? echo $datam['ville'];?></strong></td>
        </tr>
        <tr>
          <td>Etablissements </td>
          <td>&nbsp;</td>
          <td><strong>
            <? 
$CodeTypeClts=$datam['CodeTypeClts']; 
$sqltclient = "SELECT * FROM $tbl_client where idtclient='$CodeTypeClts'";
$resulttclient = mysql_query($sqltclient);
$rowtclient = mysql_fetch_assoc($resulttclient);
if ($rowtclient===FALSE) {}
else 
 {
echo $TypeClts=$rowtclient['TypeClts'];
 }
 
 ?>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
          <td><strong><? echo $datam['quartier'];?></strong></td>
        </tr>
        <tr>
          <td>Taxe</td>
          <td>&nbsp;</td>
          <td><strong>
            <? $chtaxe=$datam['chtaxe']; 
		  
		  if ($chtaxe==0) echo 'AVEC TAXE';
	      if ($chtaxe==1) echo 'SANS TAXE'; 
		  
		  ?>
          </strong></td>
          <td>&nbsp;</td>
          <td>Piece d'identité </td>
          <td><strong><? 
$CodeTypePiece=$datam['CodeTypePiece']; 
$sqltpiece = "SELECT * FROM $tbl_piece where CodeTypePiece='$CodeTypePiece'";
$resulttpiece = mysql_query($sqltpiece);
$rowtpiece = mysql_fetch_assoc($resulttpiece);

if ($rowtpiece===FALSE) {}
else {
echo $Pieces=$rowtpiece['Pieces'];
}?> N°<? echo $datam['NumPieces']; ?></strong></td>
        </tr>
        <tr>
          <td>TYPE MT</td>
          <td>&nbsp;</td>
          <td><strong>
            <? $tmt=$datam['tmt']; 
		  
		  if ($tmt==0) echo '';
	      if ($tmt==1) echo 'SimpleMT'; 
		  if ($tmt==2) echo 'MT';
		  
		  ?>
          </strong></td>
          <td>&nbsp;</td>
          <td>coefficient TI </td>
          <td><strong><? echo $datam['coefTi'];?></strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="47%" bgcolor="#3071AA"><strong><font color="#FFFFFF">Information du compteur</font></strong></td>
    <td width="53%" bgcolor="#3071AA"><strong><font color="#FFFFFF">Information sur le plombage</font></strong></td>
  </tr>
  <tr>
    <td height="50" bgcolor="#FFFFFF">  <p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td width="59%"><li> Type : <? echo $datam['typecompteur']; ?> &nbsp;</li></td>
</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="59%"><li>Tarif: 
<?php
$T=$datam['Tarif'];
$sql82 = ("SELECT * FROM tarif where idt='$T'");
$result82 = mysql_query($sql82);
while ($row82 = mysql_fetch_assoc($result82)) {
echo $row82['Libelle'];
}

?></li></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="59%"><li>Amperage : <? echo $datam['amperage']; ?></li></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="59%"><li>Numero Compteur : <? echo $datam['ncompteur'];?></li></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="59%"><li> Index actuel Jour : <? echo $datam['Indexinitial'];?></li></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="59%"><li> Index actuel  Nuit : <? echo $datam['index2'];?></li></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="59%"><li> Date de realisation: <? echo $datam['datepose']; ?></li></td>
  </tr>
</table>
<p></td>
    <td height="50" bgcolor="#FFFFFF">  <p>&nbsp;</p>
      <p>
        <?php
	 $sqaut="SELECT * FROM  $tbl_plombage WHERE id='$id'";
	 $resultaut=mysql_query($sqaut);
?>
        <?php
while($rowsaut=mysql_fetch_array($resultaut)){ 
?>
      </p>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="35%">CPT1  : <? echo $rowsaut['c1']; ?></td>
          <td width="35%">CPT2&nbsp;&nbsp;: <? echo $rowsaut['c2']; ?></td>
          <td width="30%">CPT3 : <? echo $rowsaut['c3']; ?></td>
        </tr>
        <tr>
          <td>CPT4 : <? echo $rowsaut['c4']; ?></td>
          <td>DJ1 <? echo $rowsaut['d1']; ?></td>
          <td> DJ2 <? echo $rowsaut['d2']; ?></td>
        </tr>
      </table>
      <?php }
//} ?>
      <p>      
    <p></td>
  </tr>
  <tr>
    <td height="50" bgcolor="#FFFFFF"><div id="activite" style="display:none"> <?php include ("co_enreg.php"); ?> </div></td>
    <td height="50" bgcolor="#FFFFFF"><div id="plombage" style="display:none"> <?php include ("sv_enreg.php"); ?> </div>
    </td>
  </tr>
</table>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Service Clientel &amp; Branchement &amp; Controle &amp; Penalité de Fraude</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52%"><table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
              <tr bgcolor="#0794F0">
                <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
                <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date facturé</strong></font></td>
                <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>ID_client</strong></font></td>
                <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Montant TTC</strong></font></td>
                <td width="11%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Total net</strong></font></td>
                <td width="11%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
              </tr>
              <?php
while($rowsfacd=mysql_fetch_array($resultfacd)){ 
?>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><em>

				<? echo $rowsfacd['nfacture'];?> 
                </em></td>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['date'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['id'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['totalttc'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['totalnet'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><? echo $rowsfacd['report'];?></em></td>
              </tr>
              <?php
}

?>
            </table>
              <p>&nbsp;</p>
              <p>Paiement du Branchement et Devis</p>
              <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                <tr bgcolor="#0794F0">
                  <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>N Reçu </strong></font></td>
                  <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
                  <td width="11%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date Paiement</strong></font></td>
                  <td width="25%" align="center" bgcolor="#FFFFFF"><strong><font color="#000000" size="3">Nom du client</font></strong></td>
                  <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Total net</strong></font></td>
                  <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Payé</strong></font></td>
                  <td width="11%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
                </tr>
                <?php
while($rowspd=mysql_fetch_array($resultpaied)){ 
?>
                <tr>
                  <td align="center" bgcolor="#FFFFFF"><em> <a href="paiement_billimp.php?idp=<? echo md5(microtime()).$rowspd['idp'];?>" target="_blank" > <? echo $rowspd['idp'];?></a></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['nfacture'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['date'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['Nomclient'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['montant'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['paiement'];?></em></td>
                  <td align="center" bgcolor="#FFFFFF"><em><? echo $rowspd['report'];?></em></td>
                </tr>
                <?php
}
?>
              </table>
              <p>&nbsp;</p></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
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