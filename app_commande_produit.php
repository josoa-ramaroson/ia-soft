<?php
Require("session.php");
require 'fonction.php'; 
?>
<?php
 if($_SESSION['u_niveau'] != 40) {
	header("location:index.php?error=false");
	exit;
 }
?>
<?php
require_once('calendar/classes/tc_calendar.php');
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
.rouge {
	color: #F00;
}
</style>
</head>
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tbl_appcommande WHERE id_dem='$id'";
$resultm=mysqli_query($linki,$sqlm);
$datam=mysqli_fetch_array($resultm);


$sqlmax="SELECT MAX(id_cnum) AS Maxa_idnum FROM app_commande_numero";
$resultmax=mysqli_query($linki,$sqlmax);
$rowsmax=mysqli_fetch_array($resultmax);
if ($rowsmax) {
$Max_idnum = $rowsmax['Maxa_idnum']+1;
}
else {
$Max_idnum = 1;
}


$num=$datam['num'];
//$num=$num.'/'.$id;
$num=$num.'/'.$Max_idnum;


  if ($datam['code']!=1){
  $sqlmj1="update  $tbl_appcommande set  num='$num', code=1  WHERE  id_dem='$id' ";
  $resulmj1=mysqli_query($linki,$sqlmj1);
  
  $sqlmj2="INSERT INTO app_commande_numero ( id_nom ) VALUES ('$id_nom')";
  $r=mysqli_query($linki,$sqlmj2) ;
   }
  
  
  
  
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0">
  <tr>
    <td width="47%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">DEMANDEUR &amp; DATE </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><strong><font size="2">Date</font></strong></td>
                <td width="48%"><strong><?php echo $datam['date_dem'];?></strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><strong><font size="2">Nom du demandeur </font></strong></td>
                <td><strong><?php echo $datam['nomprenom'];?></strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="4%">&nbsp;</td>
    <td width="46%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">DIRECTION ET SERVICE</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%">&nbsp;</td>
                <td width="51%">&nbsp;</td>
                <td width="29%">&nbsp;</td>
              </tr>
              <tr>
                <td><strong>Direction</strong></td>
                <td><strong><?php echo $datam['direction'];?></strong></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Service</td>
                <td><strong><?php echo $datam['service'];?></strong></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="3%">&nbsp;</td>
  </tr>
</table>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">BON DE COMMANDE</h3></div>
<div class="panel-body">
  <form name="form1" method="post" action="app_commande_produit_save.php">
      <table width="101%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="8%"><input name="id_dem" type="hidden" value="<?php echo $datam['id_dem']; ?>">
            <font size="2"><strong><font size="2"><strong><font color="#FF0000">
              <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
              <input name="nomprenom" type="hidden" value="<?php echo $datam['nomprenom']; ?>" />
            </font><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="direction" type="hidden" value="<?php echo $datam['direction']; ?>" />
            </font></strong></font></strong></font><font size="2"><strong><font color="#FF0000">
            <input name="service" type="hidden" id="service" value="<?php echo $datam['service']; ?>" />
            </font><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="date_dem" type="hidden" id="date_dem" value="<?php echo $datam['date_dem']; ?>" />
            </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></td>
          <td width="23%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="8%">&nbsp;</td>
          <td width="2%">&nbsp;</td>
          <td width="24%">&nbsp;</td>
          <td width="3%">&nbsp;</td>
          <td width="27%">&nbsp;</td>
        </tr>
        <tr>
          <td>Designation</td>
          <td><strong>
            <input name="designation" type="text" id="designation" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Fournisseur </td>
          <td>&nbsp;</td>
          <td><font color="#000000">
            <select name="fournisseur" size="1" id="fournisseur">
              <?php
$sqlS = ("SELECT * FROM $tb_comptf  ORDER BY Societef ASC ");
$resultS = mysqli_query($linki,$sqlS);

while ($rowS = mysqli_fetch_assoc($resultS)) {
echo '<option value='.$rowS['idf'].'> '.$rowS['Societef'].' </option>';
}
?>
            </select>
          </font></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Quantité </td>
          <td><strong>
            <input name="quantite" type="text" id="quantite" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Prix unitaire </td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="prixu" type="text" id="prixu" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer la commande" class="btn btn-sm btn-primary"/>
            - <a href="app_commande.php" class="btn btn-sm btn-danger" > Annuler </a>          </span></strong></td>
        </tr>
      </table>
    </form>
  </div>
<div class="panel-heading">
  <h3 class="panel-title">LISTE DES COMMANDES  <a href="app_commande_imp.php?<?php echo md5(microtime());?>&id=<?php echo md5(microtime()).$datam['id_dem'];?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a></h3>
</div>
<p>
  <?php
	 $sqact="SELECT * FROM $tbl_appcoproduit WHERE id_dem='$id'";
	 $resultact=mysqli_query($linki,$sqact);

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#ffffff">
    <td width="42%"><li>Designation &nbsp;&nbsp;</li></td>
    <td width="13%">Quantité </td>
    <td width="11%">Prix Unitaire</td>
    <td width="11%">Prix Total</td>
    <td width="12%">Fournisseur</td>
    <td width="11%">&nbsp;</td> 
  </tr>
</table>
  <?php
while($rowsact=mysqli_fetch_array($resultact)){
	 
?>
</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#ffffff">
    <td width="42%"><li><?php echo $rowsact['designation']; ?> &nbsp;&nbsp;</li></td>
    <td width="13%"><?php echo $rowsact['quantite']; ?></td>
    <td width="11%"><?php echo $rowsact['prixu']; ?></td>
    <td width="11%"><?php echo $rowsact['prixt']; ?></td>
    <td width="12%"><?php echo $rowsact['fournisseur']; ?></td>
    <td width="11%"><a href="app_commande_produit_cancel.php?id=<?php echo md5(microtime()).$rowsact['id_dp'];?>&ids=<?php echo md5(microtime()).$rowsact['id_dem'];?>" class="btn btn-xs btn-danger" onClick="return confirm('Etes-vous sûr de vouloir supprimer ')" ; style="margin:5px" >Supprimer</a></td> 
  </tr>
</table>
<p>
  <?php }
// } ?>
</p>
<p>&nbsp; </p>
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


