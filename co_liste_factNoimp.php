<?php include 'inc/head.php'; ?>
    <span style="width: 25%; color: #444444;"><img src="images/eda.png" width="143" height="63" /></span>
    <p>Liste des clients qui n'ont pas été facturé <br>
      <br>
    <font size="2"><font size="2"><font size="2">
    <?php
require 'fonction.php';
require 'configuration.php';

$sqfact="SELECT * FROM $tbl_contact where statut='6' and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec'  and nserie='$nserie') ORDER BY id  ASC";
$reqfact=mysqli_query($linki,$sqfact);

$sqlT = "SELECT COUNT(*) AS Nomimprime FROM $tbl_contact where statut='6' and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec'  and nserie='$nserie')";   
$reqT=mysqli_query($linki,$sqlT);
$datanombre= mysqli_fetch_assoc($reqT);
$Nomimprime=$datanombre['Nomimprime'];

$sql7 = "SELECT COUNT(*) AS bt FROM $tbl_contact  WHERE statut='6' and Tarif!='10'";   
$req7=mysqli_query($linki,$sql7);
$data7= mysqli_fetch_assoc($req7);
$cbt=$data7['bt'];

?>
    </font></font></font>   Le nombre des clients qui n'ont pas été facturé est  de : <font color="#000000"><?php echo $Nomimprime;?> sur  un total BT de : <?php echo $cbt;?> soit environ : <?php echo  round($Nomimprime*100/$cbt, 2);?> % Restant </font><br>
    </p>

    <nobreak>
      <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr bgcolor="#3071AA">
          <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>Id_Client </strong></font></td>
          <td width="26%" align="center"><font color="#FFFFFF" size="4"><strong>Nom Raison social </strong></font></td>
          <td width="20%" align="center"><font color="#FFFFFF" size="4"><strong>Ville</strong></font></td>
          <td width="18%" align="center"><font color="#FFFFFF" size="3"><strong>Quartier </strong></font></td>
          <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>INDEX</strong></font></td>
          <td width="12%" align="center"><font color="#FFFFFF"><strong>INDEX</strong></font></td>
        </tr>
        <?php
while($data=mysqli_fetch_array($reqfact)){ // Start looping table row 
?>
        <tr>
          <td align="center" bgcolor="#FFFFFF"><strong>
            <?php echo $data['id'];?>
          </strong></td>
          <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?php echo $data['nomprenom'];?></font></td>
          <td align="center" bgcolor="#FFFFFF"><strong><?php echo $data['ville'];?></strong></td>
          <td align="center" bgcolor="#FFFFFF"><strong><?php echo $data['quartier'];?></strong></td>
          <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <?php
}
 
mysqli_close ();  
?>
      </table>
      <p>&nbsp;</p>
      <p><br>
      </p>
    </nobreak>
</page>