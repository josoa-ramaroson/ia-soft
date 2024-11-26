
<?php
if (!isset($_REQUEST['nom_cal'])or (!isset($_REQUEST['annee'])) or (!isset($_REQUEST['mois']) or (!isset($_REQUEST['jour'])) ) )
{

} 
else
{
$nom_cal=$_REQUEST["nom_cal"];
$anneeuser=$_REQUEST["annee"];
$moisuser=$_REQUEST["mois"];
$jouruser=$_REQUEST["jour"];
?>
<H1>LES RENDEZ-VOUS DE <?php echo personne($nom_cal, $tbl_utilisateur , $linki); ?></H1>
  <?php
require 'fonction.php';	
$sql = "SELECT * FROM $tb_evenement where  id_nom='$nom_cal' and DAY(datev)=$jouruser and  MONTH(datev)=$moisuser and YEAR(datev)=$anneeuser ORDER BY heures "; // DESC ASC  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  

?>
</CENTER>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="18%" align="center"><strong><font color="#FFFFFF" size="4">DEBUT</font></strong></td>
    <td width="17%" align="center"><strong><font color="#FFFFFF" size="4">FIN</font></strong></td>
    <td width="53%" align="center">&nbsp;</td>
    <td width="12%" align="center">&nbsp;</td>
  </tr>
  <?php

$numboucle=0; 

while($data=mysqli_fetch_array($req)){ // Start looping table row 

 if($numboucle %2 == 0) 
 
   $bgcolor = "#CCDD44"; 

        else 

   $bgcolor = "#FFFFFF"; 
?>
  <tr bgcolor=<?php echo "$bgcolor" ?>>
    <td height="35" align="center" ><div align="left"><em><?php echo $data['datev'].' '.$data['heures'];?></em></div></td>
    <td align="center" ><div align="left"><em><?php echo $data['datef'].' '.$data['heuresf'];?></em></div></td>
    <td align="center" ><em>
      <?php $SID1=$data['Pris_par_user']; $SID2=$data['id_nom']; echo $SID1;?>
    </em></td>
    <td align="center" >
        
    <?php $sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysqli_query($linki,$sqldate);
	$datecaisse=mysqli_fetch_array($resultldate);
	$dateJour=$datecaisse['datecaisse'];
	$dareRDV=$data['datev'];
    ?>
    
    <?php if ((($SID1==$_SESSION['u_login']) or ($SID2==$_SESSION['u_login'])) and ($dateJour <=$dareRDV)) { ?>
	<a href="evenement_user_cancel.php?&ID=<?php echo  md5(microtime()).$data['idev']; ?>" class="btn-xs btn-danger">X</a>
	<?php } ?>
    
    
    </td>
  </tr>
  <?php
   
   $numboucle++;
}	
mysqli_close ($linki);  

?>
</table>
<?php
}
?>
