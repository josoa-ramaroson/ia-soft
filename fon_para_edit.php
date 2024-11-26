<?php
Require 'session.php';
?>

<?

if(($_SESSION['u_niveau']!= 7) &&($_SESSION['u_niveau']!= 10)) {
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
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
$id=substr($_REQUEST["idfon_sys"],32);
$sqlm="SELECT * FROM fonction_systeme WHERE idfon_sys='$id'";
$resultm=mysqli_query($linki,$sqlm);
$datam=mysqli_fetch_array($resultm);
?>
<body>
<table width="100%" border="0">
   <tr>
     <td width="39%" height="40"><a href="fon_para_affichage.php" class="btn btn-sm btn-success">Précédent  |</a></td>
     <td width="9%">&nbsp;</td>
     <td width="14%">&nbsp;</td>
     <td width="10%">&nbsp;</td>
     <td width="28%">&nbsp;</td>
   </tr>
 </table>
<table width="100%" border="0" align="center">
  <tr>
    <td height="263"><form action="fon_para_edit_save.php" method="post" name="form1" id="form1">
      <table width="91%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="21%" height="35">Annee1 ( initial)</td>
          <td width="24%"><input name="annee1" type="text" class="form-control" id="annee1" value="<?php echo $datam['annee1'];?>" readonly="readonly" />
            <strong>
              <input name="id" type="hidden" id="id" value="<?php echo $datam['idfon_sys'];?>" size="10" readonly="readonly" />
              </strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
              </font></strong></font></strong></font></td>
          <td width="1%">&nbsp;</td>
          <td width="22%">&nbsp;</td>
          <td width="32%">&nbsp;</td>
        </tr>
        <tr>
          <td height="44" bgcolor="#00FFFF">Annee2  (1 janvier)</td>
          <td><input name="annee2" type="text" class="form-control" id="annee2" value="<?php echo $datam['annee2'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td bgcolor="#00FFFF">Annee (1 janvier)</td>
          <td><input name="annee" type="text" class="form-control" id="annee" value="<?php echo $datam['annee'];?>" size="40" /></td>
        </tr>
        <tr>
          <td height="45">Date1 initial </td>
          <td><input name="date1" type="text" class="form-control" id="date1" value="<?php echo $datam['date1'];?>" size="40" readonly="readonly" /></td>
          <td>&nbsp;</td>
          <td bgcolor="#00FF66">Annee_facturation (Facturation Janv)</td>
          <td><input name="annee_facturation" type="text" class="form-control" id="annee_facturation" value="<?php echo $datam['annee_facturation'];?>" size="40" /></td>
        </tr>
        <tr>
          <td height="49" bgcolor="#00FFFF">Date2 finale  (1 janvier)</td>
          <td><input name="date2" type="text" class="form-control" id="date2" value="<?php echo $datam['date2'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td bgcolor="#FFFF00">Annee_recouvrement  (15 FEVRIER</td>
          <td><input name="annee_recouvrement" type="text" class="form-control" id="annee_recouvrement" value="<?php echo $datam['annee_recouvrement'];?>" size="40" /></td>
        </tr>
        <tr>
          <td height="52" bgcolor="#FFFFFF">Date 3 securite caisse</td>
          <td><input name="date3" type="text"  class="form-control" id="date3" value="<?php echo $datam['date3'];?>" size="40" readonly="readonly" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="56">Annee initial 1A</td>
          <td><input name="annee1A" type="text"  class="form-control" id="annee1A" value="<?php echo $datam['annee1A'];?>" size="40" readonly="readonly" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="49" bgcolor="#CCFF00">Annee finale 2A  (Mi- Mars) HST</td>
          <td><input name="annee2A" type="text" class="form-control" id="annee2A" value="<?php echo $datam['annee2A'];?>" size="40" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="60">Date1A initiale</td>
          <td><input name="date1A" type="text"  class="form-control" id="date1A" value="<?php echo $datam['date1A'];?>" size="40" readonly="readonly" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#CCFF00">Date2A finale (Mi- Mars) HIST</td>
          <td><input name="date2A" type="text" class="form-control" id="date2A" value="<?php echo $datam['date2A'];?>" size="40" /></td>
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
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="VALIDER" />
            <input type="reset" name="Submit2" value="Reset" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>