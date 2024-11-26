<?php
Require 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
$id=substr($_REQUEST["id"],32);
$idco=substr($_REQUEST["idco"],32);
$_SESSION["idclient"]=substr($_REQUEST["id"],32);

$sqlso="SELECT * FROM $tbl_compteur WHERE idco='$idco'";
$resulso=mysqli_query($linki,$sqlso);
$datso=mysqli_fetch_array($resulso);

$sqlm="SELECT * FROM $tbl_contact WHERE id='$id'";
$resultm=mysqli_query($linki,$sqlm);
$datam=mysqli_fetch_array($resultm);
?>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
  <tr bgcolor="#0794F0">
    <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information du client </font></strong></div></td>
  </tr>
  <tr>
    <td width="11%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="31%"><strong> <?php echo $datam['id'];?> </strong></td>
    <td width="2%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td width="40%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><font size="2">Designation</font></strong></td>
    <td>&nbsp;</td>
    <td><strong> <?php echo $datam['Designation'];?> </strong></td>
    <td>&nbsp;</td>
    <td><strong><font size="2">Fax</font></strong></td>
    <td><strong><?php echo $datam['fax'];?></strong></td>
  </tr>
  <tr>
    <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
    <td>&nbsp;</td>
    <td><?php echo $datam['nomprenom'];?>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong><font size="2">Site Web</font></strong></td>
    <td><strong><?php echo $datam['url'];?></strong></td>
  </tr>
  <tr>
    <td><strong><font size="2">Surnom</font></strong></td>
    <td>&nbsp;</td>
    <td><?php echo $datam['surnom'];?></td>
    <td>&nbsp;</td>
    <td><strong><font size="2">Adresse</font></strong></td>
    <td><strong><?php echo $datam['adresse'];?></strong></td>
  </tr>
  <tr>
    <td><strong><font size="2">Email</font></strong></td>
    <td>&nbsp;</td>
    <td><?php echo $datam['email'];?></td>
    <td>&nbsp;</td>
    <td><strong><font size="2">Ville</font></strong></td>
    <td><strong><?php echo $datam['ville'];?></strong></td>
  </tr>
  <tr>
    <td><strong>Titre </strong></td>
    <td>&nbsp;</td>
    <td><strong><?php echo $datam['titre'];?></strong></td>
    <td>&nbsp;</td>
    <td><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
    <td><strong><?php echo $datam['quartier'];?></strong></td>
  </tr>
  <tr>
    <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
    <td>&nbsp;</td>
    <td><strong><?php echo $datam['tel'];?></strong></td>
    <td>&nbsp;</td>
    <td><strong>Iles</strong></td>
    <td><strong><?php echo $datam['ile'];?></strong></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
              <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Mise à jour des activites</font></strong></div></td>
  </tr>
  <tr>
    <td height="263"><form action="so_edit_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="45%"><p>
 <?php
	 $sqact="SELECT * FROM $tbl_compteur WHERE id='$id'";
	 $resultact=mysqli_query($linki,$sqact);
 ?>
      <?php
while($rowsact=mysqli_fetch_array($resultact)){ 
?>
          </p>
            <table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="52%"><li><?php echo $rowsact['raisonsociale']; ?> &nbsp;  <?php echo $rowsact['quartier']; ?> &nbsp;  <?php echo $rowsact['ville']; ?></li></td>
                <td width="20%"><a href="so_edit.php?id=<?php echo md5(microtime()).$datam['id'];?>&amp;iden=<?php echo md5(microtime()).$rowsact['iden'];?>" class="btn btn-sm btn-success">Modifier</a><a href="sv_edit.php?id=<?php echo $_SESSION["idclient"];?>&amp;idau=<?php echo $rowsaut['idau'];?>"> </a></td>
                <td width="28%"><a href="so_affichage_user.php?id=<?php echo md5(microtime()).$datam['id'];?>&iden=<?php echo md5(microtime()).$rowsact['iden'];?>" class="btn btn-sm btn-success" >Aperçu</a></td>
              </tr>
            </table>
            <?php } ?></td>
          <td width="55%"><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td><input name="id" type="hidden" value="<?php echo $datam['id']; ?>" />
                <input name="idco" type="hidden" value="<?php echo $datso['idco']; ?>" />
                <font size="2"><strong><font size="2"><strong><font color="#FF0000">
                <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
                </font></strong></font></strong></font></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><strong><font size="2">Type compteur</font></strong></td>
              <td><strong>
                <select name="typecompteur" id="select4">
                <option> <?php echo $datso['typecompteur'];?></option>
                  <option>Monophase</option>
                  <option>Triphase</option>
                </select>
              </strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">N° Phase</font></strong></td>
              <td><strong>
                <input name="raisonsociale" type="text" id="nom2" value="<?php echo $datso['raisonsociale'];?>" size="40" />
              </strong></td>
            </tr>
            <tr>
              <td><strong>Puissance</strong></td>
              <td><strong>
                <select name="puissance" id="puissance">
                <option> <?php echo $datso['puissance'];?></option>
                  <option>1</option>
                  <option>2</option>
                </select>
              </strong></td>
            </tr>
            <tr>
              <td><strong><font color="#000000" size="2">Tarif</font></strong></td>
              <td><strong>
                <input name="Tarif" type="text" id="utilisateur2" value="<?php echo $datso['Tarif'];?>" size="10" />
              </strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Calibre ( Amperage)</font></strong></td>
              <td><strong>
                <input name="amperage" type="text" id="nom" value="<?php echo $datso['amperage'];?>" size="20" />
              </strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Numero Compteur </font></strong></td>
              <td><strong>
                <input name="ncompteur" type="text" id="ncompteur" value="<?php echo $datso['ncompteur'];?>" size="20" />
              </strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Index de depart</font></strong></td>
              <td><strong>
                <input name="Indexinitial" type="text" id="Indexinitial" value="<?php echo $datso['Indexinitial'];?>" size="20" />
              </strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Date de pose </font></strong></td>
              <td><strong>
                <input name="datepose" type="text" id="datepose" value="<?php echo $datso['datepose'];?>" size="20" />
              </strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Secteur</font></strong></td>
              <td><strong>
                <select name="secteur2" id="secteur">
                  <?php
$sql8 = ("SELECT soussecteur FROM soussecteur ORDER BY soussecteur ASC");
$result8 = mysqli_query($linki,$sql8);

while ($row8 = mysqli_fetch_assoc($result8)) {
echo '<option> '.$row8['soussecteur'].' </option>';
}

?>
                </select>
              </strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Localité </font></strong></td>
              <td><strong>
                <select name="localite" id="localite">
                  <?php
$sql2 = ("SELECT annee FROM annee ORDER BY annee ASC ");
$result2 = mysqli_query($linki,$sql2);

while ($row2 = mysqli_fetch_assoc($result2)) {
echo '<option> '.$row2['annee'].' </option>';
}

?>
                </select>
              </strong></td>
            </tr>
            <tr>
              <td width="12%" bordercolor="#006600" bgcolor="#FFFFFF"><strong><font size="2">Quartier</font></strong></td>
              <td width="40%" bordercolor="#006600" bgcolor="#FFFFFF"><strong><font size="2">
                <select name="quartier" id="select2">
                  <?php
$sql9 = ("SELECT nombre FROM nombre ORDER BY id ASC ");
$result9 = mysqli_query($linki,$sql9);

while ($row9 = mysqli_fetch_assoc($result9)) {
echo '<option> '.$row9['nombre'].' </option>';
}

?>
                </select>
              </font></strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Bloc</font></strong></td>
              <td><strong>
                <input name="bloc" type="text" id="bloc" value="<?php echo $datso['bloc'];?>" size="20" />
              </strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Position</font></strong></td>
              <td><strong>
                <input name="position" type="text" id="position" value="<?php echo $datso['position'];?>" size="15" />
              </strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Rang</font></strong></td>
              <td><strong><span style="font-size:8.5pt;font-family:Arial">
                <input name="rang" type="text" id="rang" value="<?php echo $datso['rang'];?>" size="15" />
              </span></strong></td>
            </tr>
            <tr>
              <td>Statut</td>
              <td><select name="statut2" id="statut2">
                <option selected="selected">Actif</option>
                <option></option>
              </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><strong><span style="font-size:8.5pt;font-family:Arial">
                <input type="submit" name="Submit" value="Enregistrer" />
              </span></strong></td>
            </tr>
          </table>            <p>&nbsp;</p></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<table width="100%" border="1">
  <tr>
    <td bgcolor="#3071AA"><strong><font color="#FFFFFF">Historiques des paiements </font></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
  <tr bgcolor="#0794F0">
   <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
</body>
</html>