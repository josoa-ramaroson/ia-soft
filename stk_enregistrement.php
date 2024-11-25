<?php
require_once('calendar/classes/tc_calendar.php');
require("session.php"); 
require 'fonction.php';
require"fc-affichage.php";
?>
<?
if(($_SESSION['u_niveau'] != 7)&& ($_SESSION['u_niveau'] != 40) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title>
<? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?
require("bienvenue.php"); 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr bgcolor="#000000"> 
    <td width="47%" bgcolor="#006ABE"><font color="#CCCCCC" size="4"><strong>Enregistre 
      Un produit</strong></font></td>
  </tr>
  <tr> 
    <td><form name="form1" method="post" action="stk_enregistrementsave.php">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="9%">&nbsp;</td>
            <td width="35%">&nbsp;</td>
            <td width="14%">&nbsp;</td>
            <td width="28%"><? if($_SESSION['u_niveau']==40) {$aff='';} else {$aff='readonly';} ?></td>
            <td width="14%">&nbsp;</td>
          </tr>
          <tr> 
            <td><strong><font color="#000000">Date</font><font color="#FF0000">* 
              </font></strong></td>
            <td> 
              <?php
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
              <div align="right"></div>
              <div align="center"></div></td>
			
            <td><strong><font color="#000000">Quantit&eacute;</font></strong><font color="#FF0000">*</font></td>
            <td><input name="Quantite"  class="form-control" type="text" id="Quantite" value="" size="30" <? echo $aff;?>></td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td><strong><font color="#000000">Produit</font><font color="#FF0000">*</font></strong></td>
            <td><select name="titre" id="titre">
                <?php
$sql2 = ("SELECT titre  FROM $tbl_produit ORDER BY titre  ASC ");
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
echo '<option> '.$row2['titre'].' </option>';
}

?>
              </select></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td><strong><font color="#000000">Validite</font><font color="#FF0000">* 
              </font></strong></td>
            <td>
              <?php
		  			  $myCalendar = new tc_calendar("Validite", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  
					  
					  ?>
            </td>
            <td><strong>Succursale <font color="#FF0000">*</font></strong></td>
            <td><select name="a_nom" id="a_nom">
              <option selected="selected">Mutsamudu</option>
            </select>
            <input type="submit" name="Submit" value="Enregistrer"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
              <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>">
            </font></strong></font></strong></font></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
    </form></td>
  </tr>
</table>
<p><font size="2"><font size="2"><font size="2">
  <?php
// on pr?pare une requ?te permettant de calculer le nombre total d'?l?ments qu'il faudra afficher sur nos diff?rentes pages  
$sql = "SELECT count(*) FROM $tbl_enreg ";  

// on ex?cute cette requ?te  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
// on r?cup?re le nombre d'?l?ments ? afficher  
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
   $nb_affichage_par_page = 50; 
   
// Pr?paration de la requ?te avec le LIMIT  
$sql = "SELECT * FROM $tbl_enreg  ORDER BY date  DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
  </font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#000000"> 
    <td width="11%" align="center" bgcolor="#006ABE"><font color="#CCCCCC" size="4"><strong>Date</strong></font></td>
    <td width="43%" align="center" bgcolor="#006ABE"><font color="#CCCCCC" size="3"><strong> 
      Produit </strong></font></td>
    <td width="16%" align="center" bgcolor="#006ABE"><font color="#CCCCCC" size="3"><strong>Succursale </strong></font></td>
    <td width="15%" align="center" bgcolor="#006ABE"><font color="#CCCCCC" size="3"><strong>Validite </strong></font></td>
    <td width="15%" align="center" bgcolor="#006ABE"><font color="#CCCCCC" size="3"><strong>Quantite</strong></font></td>
    <td width="15%" align="center" bgcolor="#006ABE">&nbsp;</td>
  </tr>
  <?php
    $numboucle=0;
while($data=mysql_fetch_array($req)){ // Start looping table row 
 if($numboucle %2 == 0) 
 
   $bgcolor = "#00CCFF"; 

        else 

   $bgcolor = "#FFFFFF";
?>
    <tr bgcolor=<? echo "$bgcolor" ?>>
   <td height="36" align="center"> <div align="left"><? echo $data['date'];?></div>
      <div align="left"></div></td>
    <td align="center"><div align="left"><em><? echo $data['titre'];?></em></div></td>
    <td align="center"><div align="left"><em><? echo $data['a_nom'];?></em></div></td>
    <td align="center"><div align="center"><em><? echo $data['Validite'];?></em></div></td>
    <td align="center"><div align="center"><em><? echo $data['Quantite'];?></em></div></td>
    <td align="center"><div align="center"></div></td>
  </tr>
  <?php
  $numboucle++;
// Exit looping and close connection 
}
// on lib?re l'espace m?moire allou? pour cette requ?te  
mysql_free_result ($req); 
 
   // on affiche enfin notre barre 20 avant de passer a l autre page
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
// on lib?re l'espace m?moire allou? pour cette requ?te  
mysql_free_result ($resultat);  
// on ferme la connexion ? la base de donn?es.  
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
<script language="JavaScript" type="text/javascript" xml:space="preserve">//<![CDATA[
  var frmvalidator  = new Validator("form1");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("date","req","SVP enregistre le libelle");
	frmvalidator.addValidation("Validite","req"," SVP enregistre la validite");
	frmvalidator.addValidation("Quantite","req"," SVP enregistre la Quantite");
	frmvalidator.addValidation("date","dontselect=0000-00-00","SVP enregistre la date");
//]]></script>