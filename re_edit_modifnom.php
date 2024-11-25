<?
require 'session.php';
require 'fonction.php';
require 'configuration.php';
?>
<?
	if($_SESSION['u_niveau'] != 1) {
	header("location:index.php?error=false");
	exit;
 }
?>
<?php
require_once('calendar/classes/tc_calendar.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="js/validator.js"></script>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Identification du client  :</h3>
  </div>
  <div class="panel-body">
    <form id="recherche-societe" name="recherche-societe" method="post" action="re_edit_modifnom.php">
      <table width="100%" border="0">
        <tr>
          <td width="9%"><strong><font size="2">ID_Client </font></strong></td>
          <td width="11%"><strong>
            <input name="id" type="text" class="form-control" id="id" size="20" />
          </strong></td>
          <td width="2%">&nbsp;</td>
         <td width="78%"><strong>
           <input type="submit" name="Valider" id="envoyer" value="Chercher " />
         </strong>           <?php
		 
		        $id = 0;
                if (isset($_REQUEST["id"]))
                $id = $_REQUEST["id"];
$sql = "SELECT * FROM $tbl_contact where id='$id' and statut='6'";
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$datam=mysql_fetch_array($req);

	$sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);

?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<table width="100%" border="0" align="center">
                  <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information de la personne  </font></strong></div></td>
  </tr>
  <tr>
    <td height="107"><form action="re_enregistrement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="11%">ID_CLIENT</td>
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
          <td><strong><font color="#000000" size="2">Ville</font></strong></td>
          <td><strong>
           <? echo $datam['ville'];?>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['nomprenom'];?>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Quartier</font></strong></td>
          <td><strong>
            <? echo $datam['quartier'];?>
          </strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">CHANGEMENT DE NOM</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0">
      <tr>
        <td width="50%"><form id="formfacture" name="formfacture" method="post" action="re_edit_modifnom_save.php">
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="6%">&nbsp;</td>
              <td width="17%">&nbsp;</td>
              <td>&nbsp;</td>
              <td width="6%">&nbsp;</td>
              <td width="3%">&nbsp;</td>
              <td width="15%">&nbsp;</td>
              <td>&nbsp;</td>
              <td width="12%">&nbsp;</td>
              <td width="16%">&nbsp;</td>
              <td width="3%">&nbsp;</td>
              <td width="23%">&nbsp;</td>
            </tr>
            <tr>
              <td>Date :</td>
              <td><input name="date" type="text" id="date" value="<? echo $datecaisse['datecaisse'];?>" size="30" readonly="readonly" /></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Designation</font></strong></td>
              <td>&nbsp;</td>
              <td><strong>
                <select name="Designation" id="Designation">
                  <option>Mr</option>
                  <option>Mme</option>
                  <option>Mlle</option>
                  <option>Dr</option>
                </select>
              </strong></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
              <td><strong>
                <input name="nomprenom" type="text" id="nomprenom" size="40" />
              </strong></td>
              <td>&nbsp;</td>
              <td><input type="submit" name="button" id="button" value="Enregistre " />
                <font size="2"><strong><font size="2"><strong><font color="#FF0000">
                  <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
                  </font><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                    <input name="id" type="hidden" id="id" value="<? echo $datam['id']; ?>" />
                    </font><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                        <input name="quartier" type="hidden" id="quartier" value="<? echo $datam['quartier']; ?>" />
                      </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></td>
            </tr>
          </table>
          <p>&nbsp;</p>
        </form></td>
      </tr>
    </table>
  </div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
