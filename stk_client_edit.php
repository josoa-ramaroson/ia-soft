<?
require 'session.php';
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
<?php
require 'fonction.php';
$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tbl_clientgaz WHERE id='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);
?>
<body>
<table width="100%" border="0">
   <tr>
     <td width="39%"><a href="stk_user.php?id=<? echo md5(microtime()).$datam['id'];?>" class="btn btn-sm btn-success">Apperçu du client|</a></td>
     <td width="9%">&nbsp;</td>
     <td width="14%">&nbsp;</td>
     <td width="10%">&nbsp;</td>
     <td width="28%">&nbsp;</td>
   </tr>
 </table>
<table width="100%" border="0" align="center">
  <tr>
    <td height="263"><form action="stk_client_edit_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
              <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Editer les information du client </font></strong></div></td>
        </tr>
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%"><strong>
            <input name="id" type="hidden" id="id" value="<? echo $datam['id'];?>" size="10" readonly="readonly" />
            </strong></td>
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
            <option selected="selected"><? echo $datam['Designation'];?></option>
              <option>Mr</option>
              <option>Mme</option>
              <option>Mlle</option>
              <option>Dr</option>
            </select>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
          <td><strong>
            <input name="tel" type="text" id="tel" value="<? echo $datam['tel'];?>" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="nomprenom" type="text" id="nomprenom" value="<? echo $datam['nomprenom'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Fax</font></strong></td>
          <td><strong>
            <input name="fax" type="text" id="fax" value="<? echo $datam['fax'];?>" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td>Surnom</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="surnom" type="text" id="surnom" value="<? echo $datam['surnom'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Site Web</font></strong></td>
          <td><strong>
            <input name="url" type="text" id="url" value="<? echo $datam['url'];?>" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Email</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="email" type="text" id="email" value="<? echo $datam['email'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Adresse</font></strong></td>
          <td><strong>
            <input name="adresse" type="text" id="adresse" value="<? echo $datam['adresse'];?>" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td><strong>Titre </strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="titre" type="text" id="titre" value="<? echo $datam['titre'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Ville</font></strong></td>
          <td><strong>
            <select name="ville" id="select4">
              <option selected="selected"><? echo $datam['ville'];?></option>
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
            <input name="login" type="text" id="login" value="<? echo $datam['login'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
          <td><strong>
            <input name="quartier" type="text" id="quartier" value="<? echo $datam['quartier'];?>" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td>Pwd</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="pwd" type="text" id="pwd" value="<? echo $datam['pwd'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong>Iles</strong></td>
          <td><strong>
            <select name="ile" id="ile">
              <option selected="selected"><? echo $datam['ile'];?></option
              >
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
<p>&nbsp;</p>
</body>
</html>