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
$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tbl_pc WHERE id='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);
?>
<body>
<table width="100%" border="0">
   <tr>
     <td width="39%"><a href="pc_affichage_user.php?id=<? echo md5(microtime()).$datam['id'];?>" class="btn btn-sm btn-success">Apperçu de l'ordinateur |</a></td>
     <td width="9%">&nbsp;</td>
     <td width="14%">&nbsp;</td>
     <td width="10%">&nbsp;</td>
     <td width="28%">&nbsp;</td>
   </tr>
 </table>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr>
    <td height="263"><form action="pc_edit_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td valign="top"><font size="2"><strong>Nom du PC </strong></font></td>
          <td width="1%">:</td>
          <td width="28%"><input name="nom" type="text" id="nom" value="<? echo $datam['nom'];?>" />
            <strong>
              <input name="id" type="hidden" id="id" value="<? echo $datam['id'];?>" size="10" readonly="readonly" />
              </strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
              </font></strong></font></strong></font></td>
          <td width="1%">&nbsp;</td>
          <td width="18%"><font size="2"><strong>Souris</strong></font></td>
          <td width="37%"><input name="souris" type="text" id="souris" value="<? echo $datam['souris'];?>" size="40" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>N de serie</strong></font></td>
          <td valign="top">:</td>
          <td><input name="nodeserie" type="text" id="nodeserie" value="<? echo $datam['nodeserie'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Clavier</strong></font></td>
          <td><input name="clavier" type="text" id="clavier" value="<? echo $datam['clavier'];?>" size="40" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Modele</strong></font></td>
          <td>:</td>
          <td><input name="modele" type="text" id="modele" value="<? echo $datam['modele'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Ecran</strong></font></td>
          <td><input name="ecran" type="text" id="ecran" value="<? echo $datam['ecran'];?>" size="40" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Carte mere</strong></font></td>
          <td>:</td>
          <td><input name="cartemere" type="text" id="cartemere" value="<? echo $datam['cartemere'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Adresse IP</strong></font></td>
          <td><input name="adresseIP" type="text" id="adresseIP" value="<? echo $datam['adresseIP'];?>" size="40" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Processeur</strong></font></td>
          <td>&nbsp;</td>
          <td><input name="processeur" type="text" id="processeur" value="<? echo $datam['processeur'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Date fin du garantie</strong></font></td>
          <td><input name="garantie" type="text" id="garantie" value="<? echo $datam['garantie'];?>" size="40" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Memoire Vive</strong></font></td>
          <td>&nbsp;</td>
          <td><input name="memoirevive" type="text" id=" memoirevive" value="<? echo $datam['memoirevive'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Ile </strong></font></td>
          <td><input name="ile" type="text" id="ile" value="<? echo $datam['ile'];?>" size="40" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Disque dur</strong></font></td>
          <td>&nbsp;</td>
          <td><input name="disquedur" type="text" id="disquedur" value="<? echo $datam['disquedur'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Ville </strong></font></td>
          <td><input name="ville" type="text" id="ville" value="<? echo $datam['ville'];?>" size="40" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Carte de son</strong></font></td>
          <td>&nbsp;</td>
          <td><input name="cartedeson" type="text" id="cartedeson" value="<? echo $datam['cartedeson'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Agence </strong></font></td>
          <td><input name="agence" type="text" id="agence" value="<? echo $datam['agence'];?>" size="40" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Carte Video</strong></font></td>
          <td>&nbsp;</td>
          <td><input name="cartevideo" type="text" id="cartevideo" value="<? echo $datam['cartevideo'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Utilisation</strong></font></td>
          <td><input name="utilisation" type="text" id="utilisation" value="<? echo $datam['utilisation'];?>" size="40" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Carte reseau </strong></font></td>
          <td>&nbsp;</td>
          <td><input name="cartereseau" type="text" id="topic11" value="<? echo $datam['cartereseau'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Email utilisateur</strong></font></td>
          <td><input name="email" type="text" id="email" value="<? echo $datam['email'];?>" size="40" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Lecteur disquette</strong></font></td>
          <td>&nbsp;</td>
          <td><input name="lecteurds" type="text" id="topic12" value="<? echo $datam['lecteurds'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Utilisateur </strong></font></td>
          <td><input name="utilisateur" type="text" id="utilisateur" value="<? echo $datam['utilisateur'];?>" size="40" readonly="readonly" /></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Lecteur disque</strong></font></td>
          <td>&nbsp;</td>
          <td><input name="lecteurcd" type="text" id="topic13" value="<? echo $datam['lecteurcd'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><font size="2"><strong>Lecteur dvd</strong></font></td>
          <td>&nbsp;</td>
          <td><input name="dvd" type="text" id="dvd" value="<? echo $datam['dvd'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><font size="2"><strong>Etat</strong></font></td>
          <td>&nbsp;</td>
          <td><input name="actif" type="text" id="actif" value="<? echo $datam['actif'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="VALIDER" />
            <input type="reset" name="Submit2" value="Reset" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title"> Transfert le PC a un autre utilisateur  </h3>
  </div>
  <div class="panel-body">
    <form action="pc_edit_transfert_save.php" method="post" name="testform" id="testform">
      <table width="100%" border="0">
        <tr>
          <td width="11%">Utilisateur</td>
          <td width="23%"><strong><? echo $datam['utilisateur'];?></strong></td>
          <td width="4%"><strong>
            <input name="id" type="hidden" id="id" value="<? echo $datam['id'];?>" size="10" readonly="readonly" />
          </strong></td>
          <td width="30%"><strong><font size="2">
            <select name="id_u" size="1" id="id_u">
              <option selected="selected"></option>
              <?php
$sql9 = ("SELECT id_u, id_nom , u_nom , u_prenom  FROM $tbl_utilisateur  ORDER BY id_u ASC ");
$result9 = mysql_query($sql9);

while ($row9 = mysql_fetch_assoc($result9)) {
echo '<option value='.$row9['id_u'].'> '.$row9['u_nom'].' '.$row9['u_prenom'].'</option>';
}
?>
            </select>
          </font></strong></td>
          <td width="32%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit3" value="Enregistrer les mises à jours " class="btn btn-info" />
          </span></strong></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>&nbsp;</p>
</body>
</html>