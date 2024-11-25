<?
require 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tbl_pc WHERE id='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);
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
  <? if ($_SESSION['u_niveau']==10){?>
      <a href="pc_edit.php?id=<? echo md5(microtime()).$datam['id'];?>" class="btn btn-sm btn-warning" >Edit le client</a>
     |<? } else {} ?>
     <a href="#" onclick="toggleBox('activite',1);" class="btn btn-sm btn-success">Ajouter une tache </a>|
  </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr>
    <td height="211">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                   <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information de l'ordinateur</font></strong></div></td>
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
          <td><font size="2"><strong>Nom du PC </strong></font></td>
          <td>&nbsp;</td>
          <td><strong>
           <? echo $datam['nom'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Souris</strong></font></td>
          <td><strong><? echo $datam['souris'];?></strong></td>
        </tr>
        <tr>
          <td><font size="2"><strong>N de serie</strong></font></td>
          <td>&nbsp;</td>
          <td><? echo $datam['nodeserie'];?>&nbsp;</td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Clavier</strong></font></td>
          <td><strong><? echo $datam['clavier'];?></strong></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Modele</strong></font></td>
          <td>&nbsp;</td>
          <td><? echo $datam['modele'];?></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Ecran</strong></font></td>
          <td><strong><? echo $datam['ecran'];?></strong></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Carte mere</strong></font></td>
          <td>&nbsp;</td>
          <td><? echo $datam['cartemere'];?></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Adresse IP</strong></font></td>
          <td><strong><? echo $datam['adresseIP'];?></strong></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Processeur</strong></font></td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['processeur'];?></strong></td>
          <td>&nbsp;</td>
          <td><strong>Iles</strong></td>
          <td><strong><? echo $datam['ile'];?></strong></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Memoire Vive</strong></font></td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['memoirevive'];?></strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Ville</font></strong></td>
          <td><strong><? echo $datam['ville'];?></strong></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Disque dur</strong></font></td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['disquedur'];?></strong></td>
          <td>&nbsp;</td>
          <td>Agence</td>
          <td><strong><? echo $datam['agence'];?></strong></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Carte de son</strong></font></td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['cartedeson'];?></strong></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Utilisation</strong></font></td>
          <td><strong><? echo $datam['utilisateur'];?></strong></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Carte Video</strong></font></td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['cartevideo'];?></strong></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Email utilisateur</strong></font></td>
          <td><strong><? echo $datam['email'];?></strong></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Carte reseau </strong></font></td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['cartereseau'];?></strong></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Utilisateur </strong></font></td>
          <td><strong><? echo $datam['utilisation'];?></strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="47%" bgcolor="#3071AA"><strong><font color="#FFFFFF">Suivi des  taches </font></strong></td>
  </tr>
  <tr>
    <td height="50" bgcolor="#FFFFFF">  <p>
      <?php
	 $sqact="SELECT * FROM $tbl_pctaches WHERE id='$id'";
	 $resultact=mysql_query($sqact);

?>
      <?php
while($rowsact=mysql_fetch_array($resultact)){
	 
?>
      </p>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="<? gettatut($rowsact['suivi']); ?>">
  <td width="42%"><li><? echo $rowsact['taches']; ?> &nbsp;&nbsp;</li></td>
  <td width="13%"><? echo $rowsact['statut']; ?></td>
  <td width="11%"><? echo $rowsact['suivi']; ?></td>
  <td width="11%"><? echo $rowsact['realisateur']; ?></td>
  <td width="12%"><? echo $rowsact['date']; ?></td>
  <td width="11%">
  <? if (($_SESSION['u_niveau']==10)&&  ($rowsact['suivi']!= 'Traité')){?>
  <a href="pct_edit.php?id=<? echo md5(microtime()).$datam['id'];?>&amp;idpc=<? echo md5(microtime()).$rowsact['idpc'];?>" class="btn btn-sm btn-danger" >Mise à jours</a> <? } else {} ?>
  
  </td>
  </tr>
  </table>

  <?php }
   				function gettatut($fetat){
				 if ($fetat=='En cours') { echo $couleur="#fdff00";}//jaune	
				 if ($fetat=='Traité')   { echo $couleur="#87e385";}//vert fonce
				 if ($fetat=='A faire')  { echo $couleur="#ec9b9b";}//rouge -Declined				 
				 }
// } ?>
  <p></td>
  </tr>
  <tr>
    <td height="70" bgcolor="#FFFFFF"><div id="activite" style="display:none"> <?php include ("pc_enreg.php"); ?> </div> </td>
  </tr>
</table>
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