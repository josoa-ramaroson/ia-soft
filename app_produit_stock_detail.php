<?php
Require("session.php"); 
require 'fc-affichage.php';
?>
<?
if( ($_SESSION['u_niveau'] != 7)&&($_SESSION['u_niveau'] != 40)&&($_SESSION['u_niveau'] != 45)&& ($_SESSION['u_niveau'] != 90) ) {
  header("location:index.php?error=false");
  exit;
 }
?>

<html>
<head>
<title>
<?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?php
Require"bienvenue.php"; 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p><font size="2"><font size="2"><font size="2"> 
  <?php
require 'fonction.php';

$sql = "SELECT COUNT(*) as nbredeligne FROM (
SELECT e.titre , SUM(e.Quantite) AS qtenreg FROM $tbl_enreg e GROUP BY e.titre
) derive WHERE 1 " ; 




$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
 

$nb_total = mysqli_fetch_array($resultat);  
 
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 

if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    

   $nb_affichage_par_page = 50; 
  
$np=substr($_REQUEST["np"],32);
	
	
 // CREATE VIEW v_app_produit_dsdate AS SELECT  titre, SUM(Qvente)   AS qtvendu , dateValidite  FROM app_produit_sortie GROUP BY  titre , dateValidite;
 
 // CREATE VIEW v_app_produit_dedate AS SELECT  titre, SUM(Quantite) AS qtenreg , Validite FROM app_produit_entre GROUP BY  titre, Validite ;
 
 //$sql = "SELECT e.titre as thetitre, e.qtenreg AS qte , v.qtvendu AS  qtv , e.qtenreg-v.qtvendu as reste , e.Validite ,  v.dateValidite  FROM $tv_appproduit_dsdate v ,  $tv_appproduit_dedate e where  e.titre='$np' and v.dateValidite=e.Validite
 // GROUP BY  e.Validite ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;

  
   $sql = "SELECT * FROM $tbl_appproduit_sortie  where titre='$np'   order by  datev DESC LIMIT ".$_GET['debut'].",".
   
   $nb_affichage_par_page;
  
  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
  <strong> SUIVI DES SORTIE AU MAGASIN PAR PRODUIT </strong></font></font></font></p>
<p><a href="app_produit_stock_detail_validite.php?np=<?php echo md5(microtime()).$np; ?>" class="btn btn-xs btn-success">Detail du stock par date de validite ( <?php echo $np; ?>) </a></p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF"> 
    <td width="17%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Produit 
      </strong></font><font color="#CCCCCC" size="4">&nbsp;</font></td>
    
    <td width="14%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Date Sortie </strong></font></td>
    
    <td width="15%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite 
      </strong></font></td>
    <td width="13%" align="center" bgcolor="#0066FF"><strong><font color="#CCCCCC" size="3">Sortie par </font></strong></td>
    <td width="14%" align="center" bgcolor="#0066FF"><strong><font color="#CCCCCC" size="3">Receptionn&eacute; par </font></strong></td>
     
     
     <td width="13%" align="center" bgcolor="#0066FF"><strong><font color="#CCCCCC" size="3">Service </font></strong></td>
  </tr>
  <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
   <tr bgcolor="FFFFFF">
   <td> <div align="left"><em><?php echo $data['titre'];?></em></div> <div align="left"></div></td>
   <td> <div align="center"><em><?php echo $data['datev'];?></em></div></td>
   <td><div align="center"><em><?php echo $data['Qvente'];?></em></div></td>
   <td><div align="center"><em><?php echo $data['id_nom'];?></em></div></td>
   <td> <div align="center"><em><?php echo $data['nc'];?></em></div></td>
   <td> <div align="center"><em><?php echo $data['service'];?></em></div></td>
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
