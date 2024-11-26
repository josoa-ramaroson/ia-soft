<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
 <p>&nbsp;</p>
 <p>
   <?php
require 'configuration.php';
$st=$_REQUEST["st"];
$sql = "SELECT count(*) FROM $tbl_paiement";  
$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_paiement where YEAR(date)='$anneec' and st='$st' and nserie='$nserie' ORDER BY idp DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
    <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>ID Client </strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>Date </strong></font></td>
     <td width="14%" align="center"><font color="#FFFFFF" size="4"><strong>N facture</strong></font></td>
     <td width="18%" align="center"><font color="#FFFFFF" size="3"><strong>Raison sociale</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>N Reçu </strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Montant</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Payé</strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Reste à payer</strong></font></td>
   </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   
     
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['id'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['date'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['nfacture'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['Nomclient'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['nrecu'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['montant'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['paiement'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><?php echo $data['report'];?></td>
   </tr>
   <?php
}
mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  

 mysqli_close($linki);;  
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>