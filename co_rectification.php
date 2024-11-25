<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
 <?
if(($_SESSION['u_niveau'] != 7) && ($_SESSION['u_niveau'] != 8) && ($_SESSION['u_niveau'] != 43)&& ($_SESSION['u_niveau'] != 44) &&  ($_SESSION['u_niveau'] != 46) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>

<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
 <p>
<?php
$sql = "SELECT count(*) FROM $tbl_recact";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_recact where st='E' ORDER BY idr desc LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
 <table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="7%" align="center"><font color="#FFFFFF" size="4"><strong>ID Client</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF" size="3"><strong> Modificateur </strong></font></td>
     <td width="6%" align="center"><font color="#FFFFFF"><strong>I i Jour</strong></font></td>
     <td width="8%" align="center" bgcolor="#3071AA"><font color="#FFFFFF"><strong>I AJour</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF"><strong>I i Nuit</strong></font></td>
     <td width="11%" align="center" bgcolor="#3071AA"><font color="#FFFFFF"><strong>I A Nuit</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF"><strong>Total Net</strong></font></td>
     <td width="20%" align="center"><strong><font color="#FFFFFF">Observation</font></strong></td>
     <td width="10%" align="center"><strong><font color="#FFFFFF">Verifier par </font></strong></td>
     <td width="11%" align="center"><strong><font color="#FFFFFF">Valider par </font></strong></td>
   </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><em><a href="co_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-default" ><? echo $data['id'];?></a></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['id_nom'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['ni'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nf'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['ni2'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nf2'];?></em></td>
     
     <td align="center" bgcolor="#FFFFFF"><em> <a href="co_bill.php?idf=<? echo md5(microtime()).$data['idf'];?>" target="_blank" ><? echo $data['total'];?></a> </em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['date'].' '.$data['obs'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"> <? if (($_SESSION['niveau']==44) and ($data['controle']==1)) {?>
 <a href="co_rectification_upload.php?idr=<? echo md5(microtime()).$data['idr']; ?>&controle=<? $a='2';echo md5(microtime()).$a; ?>&ix=<? echo md5(microtime()).$id_nom; ?>" onClick="return confirm('Etes-vous sûr')" ; style="margin:5px"   class="btn btn-sm btn-danger" >Certifier</a><? } else { echo $data['certifier']; } ?></td>
     <td align="center" bgcolor="#FFFFFF">
      <? if (($_SESSION['niveau']==43) and ($data['controle']==2)) {?>
 <a href="co_rectification_upload.php?idr=<? echo md5(microtime()).$data['idr']; ?>&controle=<? $a='3';echo md5(microtime()).$a; ?>&ix=<? echo md5(microtime()).$id_nom; ?>" onClick="return confirm('Etes-vous sûr')" ; style="margin:5px"   class="btn btn-sm btn-danger" >Valider</a> <? } else { echo $data['valider']; } ?></td>
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
<p>&nbsp;</p>
</body>
</html>