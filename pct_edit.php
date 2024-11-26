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
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
//$iden=$_GET['iden'];
$idpc=substr($_REQUEST["idpc"],32);

$sqlso="SELECT * FROM $tbl_pctaches WHERE idpc='$idpc'";
$resulso=mysqli_query($linki,$sqlso);
$datso=mysqli_fetch_array($resulso);
?>
<body>

<p>&nbsp;</p>
<table width="100%" border="0" align="center">
              <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Mise à jour des taches </font></strong></div></td>
  </tr>
  <tr>
    <td height="263"><form action="pct_edit_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="45%"><p>
            <?php
	 $sqact="SELECT * FROM $tbl_pctaches WHERE id='$id'";
	 $resultact=mysqli_query($linki,$sqact);
?>
            <?php
while($rowsact=mysqli_fetch_array($resultact)){ 
?>
          </p>
            <table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr bgcolor="<?php gettatut($rowsact['suivi']); ?>">
                <td width="52%"><li><?php echo $rowsact['taches']; ?> &nbsp; <?php echo $rowsact['statut']; ?> &nbsp;(<?php echo $rowsact['date']; ?>)</li></td>
                <td width="20%">&nbsp;</td>
                <td width="28%">
                <?php if (($_SESSION['u_niveau']==10)&&  ($rowsact['suivi']!= 'Traité')){?>
                <a href="pct_edit.php?id=<?php echo md5(microtime()).$datso['id'];?>&amp;idpc=<?php echo md5(microtime()).$rowsact['idpc'];?>" class="btn btn-sm btn-danger" >Mise à jours</a> <?php } else {} ?></td>
              </tr>
            </table>
            <?php } 
			
				 function gettatut($fetat){
				 if ($fetat=='En cours') { echo $couleur="#fdff00";}//jaune	
				 if ($fetat=='Traité')   { echo $couleur="#87e385";}//vert fonce
				 if ($fetat=='A faire')  { echo $couleur="#ec9b9b";}//rouge -Declined				 
				 }
			
			?></td>
          <td width="55%"><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td width="12%"><input name="id" type="hidden" value="<?php echo $datso['id']; ?>" />
                <input name="idpc" type="hidden" value="<?php echo $datso['idpc']; ?>" />
                <font size="2"><strong><font size="2"><strong><font color="#FF0000">
                <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
                </font></strong></font></strong></font></td>
              <td width="40%">&nbsp;</td>
            </tr>
            <tr>
              <td><strong><font color="#000000" size="2">Tache</font></strong></td>
              <td><strong>
                <input name="taches" type="text" id="utilisateur2" value="<?php echo $datso['taches'];?>" size="40" readonly="readonly" />
              </strong></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><strong><font size="2">Priorité</font></strong></td>
              <td><strong>
                <input name="statut" type="text" id="statut" value="<?php echo $datso['statut'];?>" size="40" readonly="readonly" />
                </strong></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><strong><font size="2">Suivi</font></strong></td>
              <td><select name="suivi" size="1" id="suivi">
               <option selected><?php echo $datso['suivi']; ?></option>
                <option>A faire </option>
                <option>En cours </option>
                <option>Traité </option>
              </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><strong><font size="2">Agent </font></strong></td>
              <td><strong><font size="2">
                <select name="realisateur" size="1" id="realisateur">
                  <option selected="selected"><?php echo $datso['realisateur'];?></option>
                  <?php
$sql9 = ("SELECT id_nom , u_niveau , u_login FROM $tbl_utilisateur where u_niveau='10' ORDER BY id_u ASC ");
$result9 = mysqli_query($linki,$sql9);

while ($row9 = mysqli_fetch_assoc($result9)) {
echo '<option> '.$row9['u_login'].' </option>';
}

?>
                </select>
              </font></strong></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
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
<p>&nbsp;</p>
  <tr bgcolor="#0794F0">
   <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
</body>
</html>