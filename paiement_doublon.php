<?php
require 'session.php';
require 'fonction.php';
?>
<?php
if(($_SESSION['u_niveau'] != 4) && ($_SESSION['u_niveau'] != 6)  && ($_SESSION['u_niveau'] != 7) ) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script language="javascript" src="calendar/calendar.js"></script>
<style type="text/css">
.taile {
	font-size: 12px;
}
.taille16 {
	font-size: 16px;
}
.centrevaleur {	text-align: center;
}
</style>
</head>
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p><font size="2"><font size="2"><font size="2">
  <?php
 
 if ($_SESSION['u_niveau']==7){
 
$Sdoubl= " SELECT COUNT(*) AS nbr_doublon, idp, `idf`, `id`, `st` ,`nserie`,`fannee`,`nrecu`,`date`,`id_nom`,`nfacture`,`Nomclient`,`montant`,`paiement`,`report` FROM $tbl_paiement GROUP BY `idf`, `id`, `st` ,`nserie`,`fannee`,`nrecu`,`date`,`id_nom`,`nfacture`,`Nomclient`,`montant`,`paiement`,`report` HAVING COUNT(*) > 1  ";  //ASC
 
 }
 else 
{

$Sdoubl= " SELECT COUNT(*) AS nbr_doublon, idp, `idf`, `id`, `st` ,`nserie`,`fannee`,`nrecu`,`date`,`id_nom`,`nfacture`,`Nomclient`,`montant`,`paiement`,`report` FROM $tbl_paiement where id_nom='$id_nom' GROUP BY `idf`, `id`, `st` ,`nserie`,`fannee`,`nrecu`,`date`,`id_nom`,`nfacture`,`Nomclient`,`montant`,`paiement`,`report` HAVING COUNT(*) > 1  ";  //ASC	
}

  
/* $Sdoubl= " SELECT COUNT(*) AS nbr_doublon, idp, `idf`, `id`, `st` ,`nserie`,`fannee`,`nrecu`,`date`,`id_nom`,`nfacture`,`Nomclient`,`montant`,`paiement`,`report` 
 FROM $tbl_paiement GROUP BY idf, `date`,`montant`,`report`
 HAVING COUNT(*) > 1  ";  //ASC*/
  
$reqdoub = mysqli_query($linki,$Sdoubl) or die('Erreur SQL !<br />'.$Sdoubl.'<br />'.mysqli_error($linki));  
?>
</font></font></font></p>
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title"> SCAN &amp; ANALYSE</h3>
  </div>
  <div class="panel-body"></div>
</div>
<p><span class="panel-body"> </span></p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#FFFFFF">
    <td width="33" align="center" bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
    <td width="136" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Nbre DOUBLON </font></td>
    <td width="109" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">ID FACTURE </font></td>
    <td width="92" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">ID CLIENT </font></td>
    <td width="114" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">DATE</font></td>
        <td width="191" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">CLIENT</font></td>
    <td width="123" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">MONTANT</font></td>
    <td width="91" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">PAIEMENT </font></td>
    <td width="94" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">REPORT</font></td>
    <td width="94" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">AGENT</font></td>
    <td width="136" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">SUPPRIMER</font></td>
  </tr>
  <?php
while($LesDoublons=mysqli_fetch_array($reqdoub)){ // Start looping table row 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><div align="left"></div></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $LesDoublons['nbr_doublon'];?></td>
    <td  bgcolor="#FFFFFF"><?php echo $LesDoublons['idf'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $LesDoublons['id'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $LesDoublons['date'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $LesDoublons['Nomclient'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $LesDoublons['montant'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $LesDoublons['paiement'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $LesDoublons['report'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $LesDoublons['id_nom'];?></td>
    <td align="center" bgcolor="#FFFFFF"><a href="paiement_doublon_sup.php?ID=<?php echo md5(microtime()).$LesDoublons['idp']; ?>" onClick="return confirm('Etes-vous sur de vouloir supprimer ce doublon')" ; style="margin:5px"  class="btn btn btn-danger"> Supprimer doublon</a></td>
  </tr>
  <?php

}
?>
</table>
</span>
</p>
<p>&nbsp;</p>
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
<p>&nbsp;</p>
</body>
</html>
