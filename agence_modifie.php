<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
	if(($_SESSION['u_niveau'] != 7) ) {
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
    <h3 class="panel-title">Modifier une agence</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="3%">&nbsp;</td>
        <td width="97%"><font color="#CC9933" size="5">
          <?php
				  
require 'fonction.php';

mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");  
// get value of id that sent from address bar 
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
$sql3="SELECT * FROM $tbl_agence WHERE id_a='$id'";
$result3=mysql_query($sql3);

$rows3=mysql_fetch_array($result3);
?>
          </font>
          <form name="form3" method="post" action="agence_updates.php">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="19%">Nom de l'agence</td>
                <td width="81%"><em>
                  <input class="form-control" name="mnom" type="text" id="mnom" value="<? echo $rows3['a_nom']; ?> " size="50" readonly>
                </em></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><span class="panel-title">Adresse</span></td>
                <td><em>
                  <input class="form-control" name="madresse" type="text" id="madresse" value="<? echo $rows3['a_adresse']; ?> " size="50">
                </em></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><span class="panel-title">Téléphone</span></td>
                <td><em>
                  <input class="form-control" name="mtel" type="text" id="mtel" value="<? echo $rows3['a_tel']; ?> " size="50">
                </em></td>
              </tr>
              <tr>
                <td><em>
                  <input class="form-control" name="idp" type="hidden" id="idp" value="<? echo $rows3['id_a'];?>">
                </em></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><span class="panel-title">Statut</span></td>
                <td><select name="mstatut" id="mstatut">
                  <option selected><? echo $rows3['a_statut']; ?></option>
                  <option>Operationnel</option>
                  <option>Fermer</option>
                </select></td>
              </tr>
              <tr>
                <td><em>
                  <input name="id_nom" type="hidden" id="id_nom" value="<? echo $rows3['id_nom'];?>">
                </em></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit3" value="Mise à jours"></td>
              </tr>
            </table>
          </form></td>
      </tr>
    </table>
  </div>
</div>
<p><font size="2"><font size="2"><font size="2">
  <?php
// Connect to server and select databse.
mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");
  
$sql = "SELECT count(*) FROM $tbl_agence ";  

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
$sql = "SELECT * FROM $tbl_agence  ORDER BY id_a DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
  </font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<form name="form2" method="post" action="produit_cancel.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#FFFFFF">
      <td width="64" align="center" bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
      <td width="266" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Nom de l'agence</font></td>
      <td width="313" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">Adresse</font></td>
      <td width="192" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">T&eacute;l&eacute;phone</font></td>
      <td width="162" align="center" bgcolor="#3071AA" >&nbsp;</td>
      <td width="163" align="center" bgcolor="#3071AA" >&nbsp;</td>
      <td width="163" align="center" bgcolor="#3071AA" >&nbsp;</td>
    </tr>
    <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><? echo $data['id_a'];?></div>
        <div align="left"></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['a_nom'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['a_adresse'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['a_tel'];?></em></div></td>
      <td width="162"   style="background-color:#FFF;"><div align="left"><em><? echo $data['a_statut'];?></em></div></td>
      <td width="163"   style="background-color:#FFF;"><a href="agence_modifie.php?id=<? echo md5(microtime()).$data['id_a']; ?>" class="btn btn-xs btn-success"> Modifier </a></td>
      <td width="163"   style="background-color:#FFF;"><a href="agence_cancel.php?ID=<? echo md5(microtime()).$data['id_a']; ?>" onClick="return confirm('Etes-vous s&ucirc;r de vouloir supprimer')" ; style="margin:5px"   class="btn btn-xs btn-danger" > Supprimer</a></td>
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
</form>
<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">Ajouter une agence </h3>
            </div>
            <div class="panel-body">
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
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form3");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("madresse","req","SVP entre un nombre");
	
	frmvalidator.addValidation("mtel","req","SVP entre un nombre");
	
	
</script>