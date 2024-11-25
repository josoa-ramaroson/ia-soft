<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
//Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
 <p>
   <?php
//require 'configuration.php';
   $date=substr($_REQUEST["dateB"],32);
   $agent=substr($_REQUEST["agentv"],32);
   $ARCH=date("Y", strtotime("$date"));
 
$sql = "SELECT count(*) FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where id_nom='$agent' and date='$date'";  
$resultat = mysqli_query($linkibk,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 400; 
$sql = "SELECT * FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where id_nom='$agent' and date='$date' ORDER BY idp ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysqli_query($linkibk,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  


$sqlt = "SELECT SUM(paiement) AS Paie, id_nom , date , st , nserie FROM $dbbk.z_"."$ARCH"."_$tbl_paiement where  id_nom='$agent' and date='$date'";  //ASC  DESC
$reqt = mysqli_query($linkibk,$sqlt); 
?>
 </p>
 <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>AGENT ( VENDEUR)</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>DATE</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>TOTAL </strong></font></td>
   </tr>
   <?php
while($datat=mysqli_fetch_array($reqt)){ // Start looping table row 
?>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><? echo  $datat['id_nom']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><? echo  $datat['date']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><? $P=strrev(chunk_split(strrev($datat['Paie']),3," "));   echo $P;?></td>
   </tr>
  <?php
}
?>
 </table>
 <p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
    <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>ID Client </strong></font></td>
     <td width="14%" align="center"><font color="#FFFFFF" size="4"><strong>N facture</strong></font></td>
     <td width="18%" align="center"><font color="#FFFFFF" size="3"><strong>Raison sociale</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>N Reçu </strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Montant</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Payé</strong></font></td>
   </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   
     
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['id'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nfacture'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['Nomclient'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nrecu'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['montant'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['paiement'];?></em></td>
     </tr>
   <?php
}
mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ($linkibk);  
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>