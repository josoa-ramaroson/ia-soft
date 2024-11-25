<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
	if(($_SESSION['u_niveau'] != 50)) {
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
Require("bienvenue.php"); 
//$_SESSION['niveau'];
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
<div class="panel-heading">
  <h3 class="panel-title">Ajouter les services dans chaque direction </h3>
</div>
 <div class="panel-body">
 
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="47%"><form name="form1" method="post" action="rh_service_save.php">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32%">&nbsp;</td>
          <td width="68%">&nbsp;</td>
          </tr>
        <tr> 
          <td><strong>DIRECTION</strong></td>
          <td><select name="iddr" id="iddr">
            <?php
$sql2 = ("SELECT *  FROM $tb_rhdirection ORDER BY direction  ASC ");
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
echo '<option  value= '.$row2['idrh'].'> '.$row2['direction'].' </option>';
}

?>
          </select></td>
          </tr>
        <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
        <tr> 
          <td><strong>SERVICE</strong></td>
          <td><input class="form-control" name="service" type="text" id="service" value="" size="40"></td>
          </tr>
        <tr> 
          <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>">
          </font></strong></font></strong></font></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Enregistrer"></td>
        </tr>
        </table>
      </form></td>
    <td width="53%">&nbsp;</td>
  </tr>
</table>
</div>
</div>
<p><font size="2"><font size="2"><font size="2">
  <?php
require 'fonction.php';

// on pr?pare une requ?te permettant de calculer le nombre total d'?l?ments qu'il faudra afficher sur nos diff?rentes pages  
$sql = "SELECT count(*) FROM $tb_rhservice ";  

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
   $nb_affichage_par_page = 20; 
   
// Pr?paration de la requ?te avec le LIMIT  
$sql = "SELECT * FROM $tb_rhservice  ORDER BY idser DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
  </font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#000000"> 
      <td width="15%" align="center" bgcolor="#0033FF"><font color="#CCCCCC" size="4"><strong>N&deg; Enregistrement</strong></font></td>
      <td width="35%" align="center" bgcolor="#0033FF"><font color="#CCCCCC">Direction</font> </td>
      <td width="35%" align="center" bgcolor="#0033FF"><font color="#CCCCCC">Service</font> </td>
      <td width="19%" align="center" bgcolor="#0033FF">&nbsp;</td>
    </tr>
    <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>

    <tr> 
      <td align="center" bgcolor="#FFFFFF"> <div align="left"><? echo $data['idser'];?></div>
        <div align="left"></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em>
	  <? $bb1=$data['iddr'];  $dd=direction_eda($bb1,$tb_rhdirection); echo $dd; ?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['service'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><p><a href="rh_service_modifie.php?id=<? echo $data['idser']; ?>" class="btn btn-xs btn-success"><? echo 'Modifier' ?></a></p></td>
    </tr>
    
   
    <?php
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
              <?
	function direction_eda($iddr,$tb_rhdirection){
	
	$sql = "SELECT * FROM $tb_rhdirection where  idrh=$iddr ";

	$resultat = mysql_query($sql) or exit(mysql_error()); 
	$nqt = mysql_fetch_assoc($resultat);

	if((!isset($nqt['direction'])|| empty($nqt['direction']))) { $qt=''; return $qt;}
	else {$qt=$nqt['direction']; return $qt;}

	}	
	?>
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

    frmvalidator.addValidation("service","req","SVP enregistre le libelle");
//]]></script>