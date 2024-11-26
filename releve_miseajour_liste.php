<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?php
 if(($_SESSION['u_niveau'] != 5) ) {
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
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction

$RefQuartier=addslashes($_REQUEST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_REQUEST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysqli_query($linki,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 
    $m1v=$ville;
	$m2q=$quartier;
?>
<body>
<p>
  <?php
require 'configuration.php';
$sql = "SELECT * FROM  $tbl_contact c  where c.ville='$m1v' and  c.quartier='$m2q' and statut='6'   ORDER BY c.id ASC";  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  


?></p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="11%" align="center"><strong><font color="#FFFFFF">Erreur</font></strong></td>
     <td width="9%"><font color="#FFFFFF" size="4"><strong>ID Client</strong></font></td>
     <td width="29%"><font color="#FFFFFF" size="3"><strong>Nom du client</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF"><strong>N° Compteur </strong></font></td>
     <td width="42%" align="center"><strong><font color="#FFFFFF">Mise à jour de l'information </font></strong></td>
  </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" >&nbsp;</td>
     <td align="center" ><em><?php echo $data['id'];?></em></td>
     <td><em><?php echo $data['nomprenom'];?></em></td>
     <td align="center" ><em><?php echo $data['ncompteur'];?></em></td>
     <td align="center" >
     
 
     
     <?php // if (empty($data['ncompteur'])) {?>
     
       <form name="form1" method="post" action="releve_miseajour_liste_updates.php">
       <table width="100%" border="0">
         <tr>
           <td width="51%"><input type="text" name="miseajour" id="miseajour">
             <font color="#FF0000">
             <input name="id" type="hidden" id="id" value="<?php echo $data['id'];?>" size="30" readonly/>
             <input name="rv" type="hidden" id="rv" value="<?php echo $refville;?>" size="30" readonly/>
             <input name="rq" type="hidden" id="rq" value="<?php echo $RefQuartier;?>" size="30" readonly/>
            </font></td>
           <td width="49%"><input type="submit" name="Submit4" class="btn btn-sm btn-default" value="Mise à jour " /></td>
          </tr>
        </table>
     </form>
     <?php // }  else { } ?>
   
     
     </td>
   </tr>
   <?php
}
mysqli_close ($linki);  
			 
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>