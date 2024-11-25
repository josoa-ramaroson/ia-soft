<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
	if($_SESSION['u_niveau'] != 70) {
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
            <h3 class="panel-title">Modifier la production</h3>
            </div>
  <form name="form1" method="post" action="production_updates.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><strong><font color="#CC9933" size="5">
          <?php

//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
$sql3="SELECT * FROM $tbl_production WHERE id='$id'";
$result3=mysql_query($sql3);

$rows3=mysql_fetch_array($result3);
?>
        </font>Mois </strong></td>
        <td width="30%"><em>
          <font color="#000000">
          <select name="mois" size="1" id="mois">
            <option value="<? echo $rows3['mois']; ?>" selected><? 
			
			$n=$rows3['mois']; 
	  if ($n==1) echo 'janvier';
	  if ($n==2) echo 'Février'; 
	  if ($n==3) echo 'Mars';
	  if ($n==4) echo 'Avril'; 
	  if ($n==5) echo 'Mai'; 
	  if ($n==6) echo 'Juin'; 
	  if ($n==7) echo 'Juillet'; 
	  if ($n==8) echo 'Août'; 
	  if ($n==9) echo 'Septemebre'; 
	  if ($n==10) echo 'Octobre';
	  if ($n==11) echo 'Novembre';  
	  if ($n==12) echo 'Decembre'; 
	       
		    ?></option>
            <option value="1">Janvier</option>
            <option value="2">Février</option>
            <option value="3">Mars</option>
            <option value="4">Avril</option>
            <option value="5">Mai</option>
            <option value="6">Juin</option>
            <option value="7">Juillet</option>
            <option value="8">Août</option>
            <option value="9">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
          </select>
        </font></em></td>
        <td width="21%"><strong>Gazoi</strong></td>
        <td width="33%"><input name="gazoil" type="text" id="gazoil" value="<? echo $rows3['gazoil']; ?> " size="30"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Annee</strong></td>
        <td><em>
           <font color="#000000">
          <select name="annee" size="1" id="annee">
          <option  selected><? echo $rows3['annee']; ?></option>
            <?php
$sql82 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result82 = mysql_query($sql82);

while ($row82 = mysql_fetch_assoc($result82)) {
echo '<option> '.$row82['annee'].' </option>';
}
?>
          </select>
        </font></em></td>
        <td><strong>Huile</strong></td>
        <td><input name="Huile" type="text" id="Huile" value="<? echo $rows3['Huile']; ?>" size="30"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Production (Kwh)</strong></td>
        <td><em>
          <input name="prod" type="text" id="prod" value="<? echo $rows3['prod']; ?>" size="30">
        </em></td>
        <td><strong>Centrale</strong></td>
        <td><select name="centrale" id="centrale">
          <option value="1" selected>Trenani</option>
        </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Distribution (Kwh)</strong></td>
        <td><input name="dist" type="text" id="dist" value="<? echo $rows3['dist']; ?>" size="30"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Perte Aux (Kwh)</strong></td>
        <td><input name="auxi" type="text" disabled id="auxi" value="<? echo $rows3['auxi']; ?>" size="30"></td>
        <td><em>
          <input name="idp" type="hidden" id="idp" value="<? echo $rows3['id'];?>">
          <input name="id_nom" type="hidden" id="id_nom" value="<? echo $rows3['id_nom'];?>">
        </em></td>
        <td><input type="submit" name="Submit3" value="Valider votre modification"></td>
      </tr>
    </table>
  </form>

  <body link="#0000FF" vlink="#0000FF" alink="#0000FF">

            </div>
</div>
<p><font size="2"><font size="2"><font size="2">
<?php
  
$sql = "SELECT count(*) FROM $tbl_production";  

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
   $nb_affichage_par_page = 24; 
   
 
$sql = "SELECT * FROM $tbl_production  ORDER BY id DESC LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="68" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
    <td width="129" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Mois</font></td>
    <td width="153" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Annee</font></td>
    <td width="213" align="center" bgcolor="#3071AA"><font color="#FFFFFF"> Production</font></td>
    <td width="148" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Distribution</font></td>
    <td width="74" align="center" bgcolor="#3071AA">&nbsp;</td>
  </tr>
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><? echo $data['id'];?>
      <div align="left"></div></td>
    <td align="center" bgcolor="#FFFFFF"><? $n=$data['mois']; 
	  if ($n==1) echo 'janvier';
	  if ($n==2) echo 'Février'; 
	  if ($n==3) echo 'Mars';
	  if ($n==4) echo 'Avril'; 
	  if ($n==5) echo 'Mai'; 
	  if ($n==6) echo 'Juin'; 
	  if ($n==7) echo 'Juillet'; 
	  if ($n==8) echo 'Août'; 
	  if ($n==9) echo 'Septemebre'; 
	  if ($n==10) echo 'Octobre';
	  if ($n==11) echo 'Novembre';  
	  if ($n==12) echo 'Decembre'; 
	  ?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo $data['annee'];?></td>
    <td width="213"   style="background-color:#FFF;"><em><? echo $data['prod'];?></em></td>
    <td width="148"   style="background-color:#FFF;"><em><? echo $data['dist'];?></em></td>
    <td width="74"   style="background-color:#FFF;"><a href="production_modifie.php?id=<? echo  md5(microtime()).$data['id']; ?>"  class="btn btn-xs btn-success"><? echo 'Modifier' ?></a></td>
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
<p></p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("mois","req","nom");
	
	frmvalidator.addValidation("annee","req","adresse");
	
	frmvalidator.addValidation("prod","req","SVP entre un nombre");
	
	frmvalidator.addValidation("dist","req","SVP entre un nombre");
	
	frmvalidator.addValidation("gazoil","req","SVP entre un nombre");
	
	frmvalidator.addValidation("huil","req","SVP entre un nombre");
	
</script>