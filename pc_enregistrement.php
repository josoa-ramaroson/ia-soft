<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
	if($_SESSION['u_niveau'] != 10) {
	header("location:index.php?error=false");
	exit;
 }
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include("titre.php"); ?></title>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Ajouter d'un Nouveau ordinateur </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="100%"><form action="pc_enregistrement_save.php" method="post" name="form1" id="form1">
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td valign="top"><font size="2"><strong>Nom du PC </strong></font></td>
              <td width="1%">:</td>
              <td width="28%"><input name="nom" type="text" id="nom2" />
                <font size="2"><strong><font size="2"><strong><font color="#FF0000">
                <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
                </font></strong></font></strong></font></td>
              <td width="1%">&nbsp;</td>
              <td width="18%"><font size="2"><strong>Souris</strong></font></td>
              <td width="37%"><input name="souris" type="text" id="souris" size="40" /></td>
            </tr>
                        <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><font size="2"><strong>N de serie</strong></font></td>
              <td valign="top">:</td>
              <td><input class="form-control" name="nodeserie" type="text" id="nodeserie" size="40" /></td>
              <td>&nbsp;</td>
              <td><font size="2"><strong>Clavier</strong></font></td>
              <td><input class="form-control" name="clavier" type="text" id="clavier" size="40" /></td>
            </tr>
                        <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><font size="2"><strong>Modele</strong></font></td>
              <td>:</td>
              <td><input class="form-control"name="modele" type="text" id="modele" size="40" /></td>
              <td>&nbsp;</td>
              <td><font size="2"><strong>Ecran</strong></font></td>
              <td><input class="form-control" name="ecran" type="text" id="ecran" size="40" /></td>
            </tr>
                        <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><font size="2"><strong>Carte mere</strong></font></td>
              <td>:</td>
              <td><input class="form-control" name="cartemere" type="text" id="cartemere" size="40" /></td>
              <td>&nbsp;</td>
              <td><font size="2"><strong>Adresse IP</strong></font></td>
              <td><input class="form-control" name="adresseIP" type="text" id="adresseIP" size="40" /></td>
            </tr>
               <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><font size="2"><strong>Processeur</strong></font></td>
              <td>&nbsp;</td>
              <td><input  class="form-control" name="processeur" type="text" id="processeur" size="40" /></td>
              <td>&nbsp;</td>
              <td><font size="2"><strong>Date fin du garantie</strong></font></td>
              <td><input class="form-control" name="garantie" type="text" id="garantie" size="40" /></td>
            </tr>
                           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            <tr>
              <td><font size="2"><strong>Memoire Vive</strong></font></td>
              <td>&nbsp;</td>
              <td><input class="form-control" name=" memoirevive" type="text" id=" memoirevive" size="40" /></td>
              <td>&nbsp;</td>
              <td><font size="2"><strong>Ile </strong></font></td>
              <td><input class="form-control" name="ile" type="text" id="ile" size="40" /></td>
            </tr>
                           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            <tr>
              <td><font size="2"><strong>Disque dur</strong></font></td>
              <td>&nbsp;</td>
              <td><input class="form-control" name="disquedur" type="text" id="disquedur" size="40" /></td>
              <td>&nbsp;</td>
              <td><font size="2"><strong>Ville </strong></font></td>
              <td><input class="form-control" name="ville" type="text" id="ville" size="40" /></td>
            </tr>
                           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            <tr>
              <td><font size="2"><strong>Carte de son</strong></font></td>
              <td>&nbsp;</td>
              <td><input class="form-control" name="cartedeson" type="text" id="cartedeson" size="40" /></td>
              <td>&nbsp;</td>
              <td><font size="2"><strong>Agence </strong></font></td>
              <td><select class="form-control" name="agence" id="agence">
              <option selected="selected"></option>
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
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            <tr>
              <td><font size="2"><strong>Carte Video</strong></font></td>
              <td>&nbsp;</td>
              <td><input class="form-control" name="cartevideo" type="text" id="cartevideo" size="40" /></td>
              <td>&nbsp;</td>
              <td><font size="2"><strong>Utilisation</strong></font></td>
              <td><input class="form-control" name="utilisation" type="text" id="utilisation" size="40" /></td>
            </tr>
                           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            <tr>
              <td><font size="2"><strong>Carte reseau </strong></font></td>
              <td>&nbsp;</td>
              <td><input class="form-control" name="cartereseau" type="text" id="topic11" size="40" /></td>
              <td>&nbsp;</td>
              <td><font size="2"><strong>Email utilisateur</strong></font></td>
              <td><input class="form-control" name="email" type="text" id="email" size="40" /></td>
            </tr>
                           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            <tr>
              <td><font size="2"><strong>Lecteur disquette</strong></font></td>
              <td>&nbsp;</td>
              <td><input class="form-control" name="lecteurds" type="text" id="topic12" size="40" /></td>
              <td>&nbsp;</td>
              <td><font size="2"><strong>Utilisateur </strong></font></td>
              <td><strong><font size="2">
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
            </tr>
                           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            <tr>
              <td><font size="2"><strong>Lecteur disque</strong></font></td>
              <td>&nbsp;</td>
              <td><input class="form-control" name="lecteurcd" type="text" id="topic13" size="40" /></td>
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
              <td>&nbsp;</td>
            <tr>
              <td><font size="2"><strong>Lecteur dvd</strong></font></td>
              <td>&nbsp;</td>
              <td><input class="form-control" name="dvd" type="text" id="dvd" size="40" /></td>
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
              <td>&nbsp;</td>
            <tr>
              <td><font size="2"><strong>Etat</strong></font></td>
              <td>&nbsp;</td>
              <td><input class="form-control" name="actif" type="text" id="actif" size="40" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="VALIDER" />
                <input type="reset" name="Submit2" value="Reset" /></td>
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
        <td width="0%">&nbsp;</td>
      </tr>
    </table>
  </div>
</div>
<p><font size="2"><font size="2"></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font><font size="2"><font size="2"><span style="margin-left: 30">
  <?php
require 'fonction.php';
$sql = "SELECT count(*) FROM $tbl_pc";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
$nb_total = mysql_fetch_array($resultat);  

if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
   $nb_affichage_par_page = 10; 

$sql = "SELECT * FROM $tbl_pc ORDER BY id ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</span></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="73"  bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
    <td width="105" bgcolor="#3071AA"><font color="#FFFFFF" size="3"><strong>Ile </strong></font></td>
    <td width="127" bgcolor="#3071AA"><font color="#FFFFFF" size="3"><strong>Ville </strong></font></td>
    <td width="307" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="3">Agence/service</font></strong></td>
    <td width="150" bgcolor="#3071AA"><strong><font color="#FFFFFF">Utilisation </font></strong></td>
    <td width="159" bgcolor="#3071AA"><strong><font color="#FFFFFF">Utilisateur</font></strong></td>
    <td width="161" bgcolor="#3071AA">&nbsp;</td>
  </tr>
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td height="25"  bgcolor="#FFFFFF"><? echo $data['id']; ?>
      <div align="left"></div></td>
    <td  bgcolor="#FFFFFF"><? echo $data['ile']; ?></td>
    <td  bgcolor="#FFFFFF"><? echo $data['ville']; ?></td>
    <td width="307"   style="background-color:#FFF;"><? echo $data['agence']; ?></td>
    <td width="150"   style="background-color:#FFF;"><? echo $data['utilisation'];?></td>
    <td width="159"   style="background-color:#FFF;"><? echo $data['utilisateur'];?></td>
    <td width="161"   style="background-color:#FFF;"><a href="pc_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-success" >Apperçu</a></td>
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
<p></p>
</body>
</html><script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("nom","req","SVP entre un nombre");
	
</script>