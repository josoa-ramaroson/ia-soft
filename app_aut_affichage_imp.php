<?php
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';

if((($_SESSION['u_niveau'] != 40) ) && ($_SESSION['u_niveau'] != 90)) {
    header("location:index.php?error=false");
    exit;
}
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
</head>
<?php
//require("bienvenue.php"); // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p><font size="2"><font size="2"><font size="2">
<?php
$mois = substr($_REQUEST["a"], 32);
$annee = substr($_REQUEST["b"], 32);
$service = substr($_REQUEST["c"], 32);

// Première requête
$sql = "SELECT * FROM $tbl_appaut WHERE MONTH(date)=? AND YEAR(date)=? AND service=? ORDER BY idapp_aut DESC";
$stmt = mysqli_prepare($linki, $sql);
mysqli_stmt_bind_param($stmt, "iis", $mois, $annee, $service);
mysqli_stmt_execute($stmt);
$req = mysqli_stmt_get_result($stmt);

// Deuxième requête pour le total
$sqPT = "SELECT SUM(Montant) AS montant FROM $tbl_appaut WHERE MONTH(date)=? AND YEAR(date)=? AND service=?";
$stmtPT = mysqli_prepare($linki, $sqPT);
mysqli_stmt_bind_param($stmtPT, "iis", $mois, $annee, $service);
mysqli_stmt_execute($stmtPT);
$RPT = mysqli_stmt_get_result($stmtPT);
$AFPT = mysqli_fetch_assoc($RPT);
$tPT = $AFPT['montant'];
?>
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<form name="form2" method="post" action="produit_cancel.php">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr bgcolor="#FFFFFF">
<td width="52" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
<td width="123" bgcolor="#3071AA"><font color="#FFFFFF">Date</font></td>
<td width="178" bgcolor="#3071AA"><font color="#FFFFFF">Service</font></td>
<td width="231" bgcolor="#3071AA"><font color="#FFFFFF">Nature</font></td>
<td width="281" bgcolor="#3071AA"><font color="#FFFFFF">Motif</font></td>
<td width="98" bgcolor="#3071AA"><font color="#FFFFFF">Montant</font></td>
</tr>
<?php
while($data = mysqli_fetch_array($req)){ 
?>
<tr>
<td align="center" bgcolor="#FFFFFF"><div align="left"><?php echo htmlspecialchars($data['idapp_aut']); ?></div>
<div align="left"></div></td>
<td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['date']); ?></em></div></td>
<td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['service']); ?></em></div></td>
<td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['Nature']); ?></em></div></td>
<td width="281" style="background-color:#FFF;"><em><?php echo htmlspecialchars($data['Motif']); ?></em></td>
<td width="98" style="background-color:#FFF;"><?php echo strrev(chunk_split(strrev($data['Montant']),3," ")); ?></td>
</tr>
<?php
}
// Libération des ressources
mysqli_stmt_close($stmt);
mysqli_stmt_close($stmtPT);
?>
</table>
</form>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
<tr bgcolor="#0000FF">
<td width="672" align="center" bgcolor="#FFFFFF">&nbsp;</td>
<td width="430" align="center" bgcolor="#3071AA"><font color="#FFFFFF">MONTANT TOTAL</font></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">&nbsp;</td>
<td align="center"><em><?php echo htmlspecialchars($tPT); ?></em></td>
</tr>
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
<td height="21">
<?php
include_once('pied.php');
?>
</td>
</tr>
</table>
<p>&nbsp;</p>
</body>
</html>