<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
if(($_SESSION['u_niveau'] != 30) && ($_SESSION['u_niveau'] != 7)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
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
</style>
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">Modifier une communication</h3>
            </div>
            <div class="panel-body">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="47%"><form method="post" enctype="multipart/form-data" action="communication_updates.php">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="18%"><font color="#CC9933" size="5">
              <?php
				  
require 'fonction.php';
$id=substr($_REQUEST["id"],32);
$sql3="SELECT * FROM $tbl_com WHERE idcom='$id'";
$result3=mysql_query($sql3);

$rows3=mysql_fetch_array($result3);
?>
            </font></td>
            <td width="35%">&nbsp;</td>
          </tr>
          <tr> 
            <td>Date</td>
            <td><input name="date" type="text" id="date" value="<? echo $rows3['date']; ?> " size="40"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>Titre</td>
            <td><input name="titre" type="text" id="titre" value="<? echo $rows3['titre']; ?> " size="40"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>D&eacute;tail</td>
            <td><textarea name="detail" cols="70" rows="5" id="detail"><? echo $rows3['detail']; ?> </textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
              <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom;?>">
            </font><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id" type="hidden" id="id" value="<? echo $rows3['idcom']; ?>">
            </font></strong></font></strong></font></strong></font></strong></font></td>
            <td><input type="submit" name="upload" value="Enregistre"></td>
          </tr>
        </table>
    </form></td>
  </tr>
</table>
</div></div>
<p><font size="2"><font size="2"><font size="2">
<?php
require 'fonction.php';

// Connect to server and select databse.
mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");
  
$sql = "SELECT count(*) FROM $tbl_com ";  

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
   $nb_affichage_par_page = 10; 
   
// Pr?paration de la requ?te avec le LIMIT  
$sql = "SELECT * FROM $tbl_com  ORDER BY idcom DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on execute la requete  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#FFFFFF">
    <td width="70" align="center" bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
    <td width="289" align="center" bgcolor="#3071AA"><font color="#FFFFFF">DATE</font></td>
    <td width="457" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">TITRE</font></td>
    <td width="114" align="center" bgcolor="#3071AA" >&nbsp;</td>
    <td width="126" align="center" bgcolor="#3071AA" >&nbsp;</td>
  </tr>
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><? echo $data['idcom'];?></div>
      <div align="left"></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['date'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['titre'];?></em></div></td>
    <td width="114"   style="background-color:#FFF;"><a href="communication_modifie.php?id=<? echo md5(microtime()).$data['idcom']; ?>" class="btn btn-xs btn-success">Modifier</a></td>
    <td width="126"   style="background-color:#FFF;"><a href="communication_cancel.php?ID=<? echo md5(microtime()).$data['idcom']; ?>" onClick="return confirm('Etes-vous sûr de vouloir supprimer')" ; style="margin:5px"   class="btn btn-xs btn-danger" >Supprimer</a></td>
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
<p>
  </form>
</p>
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
</body>
</html>

