<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
if(($_SESSION['u_niveau'] != 7)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

</head>
<?
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
<div class="panel-heading">
            <h3 class="panel-title">Ajouter un utilisateur </h3>
  </div>
            <div class="panel-body">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="100%"><form name="form1" method="post" action="utilisateur_save.php">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="14%">&nbsp;</td>
            <td width="33%">&nbsp;</td>
            <td width="18%">&nbsp;</td>
            <td width="35%">&nbsp;</td>
          </tr>
          <tr> 
            <td><strong>Nom </strong></td>
            <td><input name="u_nom" type="text" id="u_nom" value="" size="30"></td>
            <td><strong>Login </strong></td>
            <td><input name="u_login" type="text" id="u_login" value="" size="30"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td><strong>Prenom</strong></td>
            <td><input name="u_prenom" type="text" id="u_prenom" value="" size="30"></td>
            <td><strong>Mot de passe</strong></td>
            <td><input name="u_pwd" type="text" id="u_pwd" value="" size="30"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><strong>Email</strong></td>
            <td><input name="u_email" type="text" id="u_email" value="" size="30"></td>
            <td><strong>Niveau</strong></td>
            <td><select name="u_niveau" id="u_niveau">
            <? require 'fonction_niveau_choix.php'; ?>               
              </select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><strong>Titre</strong></td>
            <td><input name="titre" type="text" id="titre" value="" size="30"></td>
            <td><strong>Statut</strong></td>
            <td><select name="statut" id="statut">
              <option selected>Operationnel</option>
              <option>Fermer</option>
            </select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><strong>Mobile</strong></td>
            <td><input name="mobile" type="text" id="mobile" value="" size="30"></td>
            <td><strong>Agence (lieu de travail)</strong></td>
            <td><select name="agence" id="agence">
              <?php
$sql2 = ("SELECT a_nom  FROM $tbl_agence ORDER BY a_nom  ASC ");
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
echo '<option> '.$row2['a_nom'].' </option>';
}

?>
            </select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
              <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>">
            </font></strong></font></strong></font></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="Enregistrer"></td>
          </tr>
        </table>
    </form></td>
    <td width="0%">&nbsp;</td>
  </tr>
</table>
          </div>
          </div>
<p><font size="2"><font size="2"><font size="2">
  <?php
  
$sql = "SELECT count(*) FROM $tbl_utilisateur";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
 
$nb_total = mysql_fetch_array($resultat);  
 // on teste si ce nombre de vaut pas 0  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
        // premi?re ligne on affiche les titres pr?nom et surnom dans 2 colonnes
  
    
   
// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas d?j? ?t? d?clar?e, et dans ce cas, on l'initialise ? 0  
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
	// 6 maroufchangement 1 par 5
   $nb_affichage_par_page = 20; 
   
 
$sql = "SELECT * FROM $tbl_utilisateur  ORDER BY id_u DESC LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
  </font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="68" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font><font color="#FFFFFF">SID</font></td>
    <td width="129" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Statut</font></td>
    <td width="153" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Lieu de travail</font></td>
    <td width="213" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Nom et Prenom </font></td>
    <td width="148" align="center" bgcolor="#3071AA"><font color="#FFFFFF">login</font></td>
    <td width="143" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Niveau </font></td>
    <td width="74" align="center" bgcolor="#3071AA">&nbsp;</td>
    <td width="68" align="center" bgcolor="#3071AA">&nbsp;</td>
  </tr>
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><? echo $data['id_u'];?>      <div align="left"></div></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data['statut'];?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data['agence'];?></td>
    <td width="213"   style="background-color:#FFF;"><em><? echo $data['u_nom'].' '.$data['u_prenom'];?></em></td>
    <td width="148"   style="background-color:#FFF;"><em><? echo $data['u_login'];?></em></td>
    <td width="143"   style="background-color:#FFF;"><em>
   <? require 'fonction_niveau_affichage.php'; ?>  
    </em></td>
    <td width="74"   style="background-color:#FFF;"><a href="utilisateur_modifie.php?id=<? echo  md5(microtime()).$data['id_u']; ?>"  class="btn btn-xs btn-success"><? echo 'Modifier' ?></a></td>
    <td width="68"   style="background-color:#FFF;"><a href="utilisateur_cancel.php?ID=<? echo  md5(microtime()).$data['id_u']; ?>" onClick="return confirm('Etes-vous s&ucirc;r de vouloir supprimer')" ; style="margin:5px"  class="btn btn-xs btn-danger">Supprimer</a></td>
  </tr>
  <?php

}

mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
?>
</table>
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
