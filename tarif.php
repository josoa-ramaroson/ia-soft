<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
if(($_SESSION['u_niveau'] != 7)) {
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
Require("bienvenue.php");  
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
<div class="panel-heading">
            <h3 class="panel-title">TARIFICATION <font size="2"><font size="2"><font size="2">
              <?php
  
$sql = "SELECT count(*) FROM $tbl_tarif ";  

$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
 
 
$nb_total = mysqli_fetch_array($resultat);  

if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    

   $nb_affichage_par_page = 20; 
   
 
$sql = "SELECT * FROM $tbl_tarif   ORDER BY idt asc LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC

$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
            </font></font></font></h3>
  </div>
            <div class="panel-body">
              <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                <tr bgcolor="#0000FF">
                  <td width="83" align="center" bgcolor="#3071AA">&nbsp;</td>
                  <td width="273" align="center" bgcolor="#3071AA"><font color="#FFFFFF"> Libelle</font></td>
                  <td width="170" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Tarif 1 </font></td>
                  <td width="179" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Tarif 2</font></td>
                  <td width="173" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Tranche N1 </font></td>
                  <td width="90" align="center" bgcolor="#3071AA">&nbsp;</td>
                  <td width="90" align="center" bgcolor="#3071AA">&nbsp;</td>
                </tr>
                <?php
while($data=mysqli_fetch_array($req)){ 
?>
                <tr>
                  <td height="40" align="center" bgcolor="#FFFFFF"><div align="left"></div></td>
                  <td  bgcolor="#FFFFFF"><?php echo $data['Libelle'];?></td>
                  <td width="170" align="center"  style="background-color:#FFF;"><em><?php echo $data['t1'];?></em></td>
                  <td width="179" align="center"  style="background-color:#FFF;"><em><?php echo $data['t2'];?></em></td>
                  <td width="173" align="center"  style="background-color:#FFF;"><em><?php echo $data['q'];?></em></td>
                  <td width="173" align="center"  style="background-color:#FFF;"><em><?php echo $data['typecom'];?></em></td>
                  <td width="90"   style="background-color:#FFF;"><a href="tarif_modifie.php?id=<?php echo  md5(microtime()).$data['idt']; ?>"  class="btn btn-xs btn-success"><?php echo 'Modifier' ?></a></td>
                </tr>
                <?php

}

mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ($linki);  
?>
              </table>
            </div>
</div>
<p><font size="2"><font size="2"></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
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
<p>&nbsp; </p>
</body>
</html>
