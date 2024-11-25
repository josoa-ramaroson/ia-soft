<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
	if(($_SESSION['u_niveau'] != 41)) {
	header("location:index.php?error=false");
	exit;
 }
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
<body>
<table width="100%" border="0" align="center">
  <tr>
    <td height="260"><form action="stk_client_save.php" method="post" name="form1" id="form1">
    
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Ajouter un client </font></strong></div></td>
        </tr>
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%"><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          </font></strong></font></strong></font></td>
        </tr>
        <tr>
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
          <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
          <td><strong>
            <input name="tel" type="text" id="tel" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="nomprenom" type="text" id="nomprenom" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Fax</font></strong></td>
          <td><strong>
            <input name="fax" type="text" id="fax" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td>Surnom</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="surnom" type="text" id="surnom" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Site Web</font></strong></td>
          <td><strong>
            <input name="url" type="text" id="url" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Email</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="email" type="text" id="email" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Adresse</font></strong></td>
          <td><strong>
            <input name="adresse" type="text" id="adresse" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td><strong>Titre </strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="titre" type="text" id="titre" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Ville</font></strong></td>
          <td><strong>
            <select name="ville" id="select4">
              <?php
$sql5 = ("SELECT ville FROM ville ORDER BY ville ASC ");
$result5 = mysql_query($sql5);

while ($row5 = mysql_fetch_assoc($result5)) {
echo '<option> '.$row5['ville'].' </option>';
}

?>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td>Login</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="login" type="text" disabled="disabled" id="login" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
          <td><strong>
            <input name="quartier" type="text" id="quartier" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td>Mot de passe </td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="pwd" type="text" disabled="disabled" id="pwd" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong>Iles</strong></td>
          <td><strong>
            <select name="ile" id="ile">
              <?php
$sql51 = ("SELECT ile FROM ile ORDER BY ile ASC ");
$result51 = mysql_query($sql51);

while ($row51 = mysql_fetch_assoc($result51)) {
echo '<option> '.$row51['ile'].' </option>';
}

?>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer" />
          </span></strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>
  <?php
$sql = "SELECT count(*) FROM $tbl_clientgaz";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_clientgaz ORDER BY nomprenom ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="8%" align="center"><font color="#FFFFFF" size="4"><strong>ID </strong></font></td>
    <td width="18%" align="center"><font color="#FFFFFF" size="3"><strong> Nom et Prenom </strong></font></td>
    <td width="21%" align="center"><font color="#FFFFFF" size="3"><strong>Sur nom</strong></font></td>
    <td width="17%" align="center"><font color="#FFFFFF"><strong>Tel</strong></font></td>
    <td width="15%" align="center"><font color="#FFFFFF"><strong>Ville</strong></font></td>
    <td width="13%" align="center"><font color="#FFFFFF"><strong>Quartier</strong></font></td>
    <td width="8%" align="center">&nbsp;</td>
  </tr>
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><a href="stk_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-default" ><? echo $data['id'];?></a></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['nomprenom'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['surnom'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['tel'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['ville'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['quartier'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><a href="stk_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-success" >Apperçu</a></td>
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
<p>&nbsp;</p>
</body>
</html>