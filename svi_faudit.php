<?php
Require 'session.php';
require 'fonction.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
$_SESSION['id_nom']=$id_nom;

	$sqfac="SELECT * FROM $tbl_fact where st='Ti' and id_nom='$id_nom' ORDER BY idf desc  limit 0,10 ";
	$resultfac=mysqli_query($linki,$sqfac);

?>
<body>


<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#0794F0">
    <td width="100%" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Historique des facturations </font></strong></div></td>
  </tr>
</table>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0794F0">
    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000">ID</font></td>
    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date</strong></font></td>
    <td width="19%" align="center" bgcolor="#FFFFFF">Utilisateur </td>
    <td width="13%" align="center" bgcolor="#FFFFFF">Matricule</td>
    <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
    <td width="12%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Libelle</strong></font></td>
    <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Montant</strong></font></td>
    <td width="17%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
  </tr>
  <?php
while($rowsfac=mysqli_fetch_array($resultfac)){ 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['idf'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['date'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['id_nom'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['stlib'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['nfacture'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['libelle'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['montant'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['report'];?></em></td>
  </tr>
  <?php
}
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
<p>&nbsp;</p>
</body>
</html>
