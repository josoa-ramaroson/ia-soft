<?
require("session.php"); 
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
<? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?
require "bienvenue.php"; 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p><font size="2"><font size="2"><font size="2"> 
  <?php
require 'fonction.php';

$sql = "SELECT COUNT(*) as nbredeligne FROM (
SELECT e.titre , SUM(e.Quantite) AS qtenreg FROM $tbl_appproduit_entre e GROUP BY e.titre
) derive WHERE 1 " ; 




$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
 

$nb_total = mysqli_fetch_array($resultat);  
 
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 

if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    

   $nb_affichage_par_page = 50; 
  
  // à garder important
 // CREATE VIEW V_vente AS SELECT  titre, SUM(Qvente) AS qtvendu  FROM ginv_vente GROUP BY  titre;
 // CREATE VIEW V_enreg AS SELECT  titre, SUM(Quantite) AS qtenreg  FROM ginv_enreg GROUP BY  titre;
   
 // CREATE VIEW V_app_produit_sortie AS SELECT  titre, SUM(Qvente) AS qtvendu  FROM app_produit_sortie GROUP BY  titre;
 // CREATE VIEW V_app_produit_entre AS SELECT  titre, SUM(Quantite) AS qtenreg  FROM app_produit_entre GROUP BY  titre;
 
   
   // CREATE VIEW v_paiement AS SELECT  p.idp, p.idf, p.id , p.st ,p.nserie , p.id_nom , p.fannee , p.date,  p.paiement, c.refcommune , c.RefLocalite, c.RefQuartier FROM paiement p JOIN clienteda c ON p.id=c.id;

   // CREATE VIEW V_facturation AS SELECT  f.idf,  f.id , f.Police, f.st ,f.nserie , f.fannee ,  f.id_nom , f.libelle, f.cons1, f.cons2, f.cons, f.mont1, f.mont2, f.puisct, f.totalht, f.tax, f.totalttc, f.ortc, f.impayee, f.Pre, f.totalnet, f.report, c.refcommune , c.RefLocalite, c.RefQuartier , f.etat, c.Tarif FROM billing f JOIN clienteda c ON f.id=c.id;
	

   // CREATE VIEW v_paiefact AS SELECT  p.idp, p.idf, p.id , p.st ,p.nserie , p.id_nom , p.fannee , p.date,  p.paiement, f.libelle  FROM v_paiement p JOIN billing f ON p.id=f.id and p.st='A';
   
    // CREATE VIEW V_Sagm AS SELECT  a.id_c, a.nom_C, a.SAVoix , g.SGVoix , m.SMVoix , (a.SAVoix+g.SGVoix+m.SMVoix) AS SAGM  FROM v_a_voix a JOIN v_g_voix g JOIN v_m_voix m ON a.id_c=g.id_c and a.id_c=m.id_c ;
	
 $sql = "SELECT e.titre as thetitre, SUM(e.qtenreg) AS qte , SUM(v.qtvendu) AS  qtv , SUM(e.qtenreg)-SUM(v.qtvendu) as reste
FROM $tv_appproduit_entre e LEFT JOIN $tv_appproduit_sortie v ON e.titre=v.titre GROUP BY  e.titre ORDER BY e.titre  ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;



$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
?>
</font></font></font></p>
<p><font size="2"><font size="2"><font size="2"><strong>SUIVI DE STOCK AU MAGASIN </strong></font></font></font></p>
<table width="97%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF"> 
    <td width="35%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Produit 
      </strong></font><font color="#CCCCCC" size="4">&nbsp;</font></td>
    <td width="19%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite 
      Enregistre </strong></font></td>
    <td width="18%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite 
      Sortie</strong></font></td>
    <td width="18%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite 
      Restant Magain</strong></font></td>
    <td width="10%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3">&nbsp;</font></td>
  </tr>
  <?php
  $numboucle=0;
while($data=mysqli_fetch_array($req)){ // Start looping table row 

 if($numboucle %2 == 0) 
 
   $bgcolor = "#CCDD44"; 

        else 

   $bgcolor = "#FFFFFF";  
   
   
?>
   <tr bgcolor=<? echo "$bgcolor" ?>>
    <td height="31" align="center"> <div align="left"><em><? echo $data['thetitre'];?></em></div>
      <div align="left"></div></td>
    <td align="center" ><div align="center"><em><? $qte=$data['qte'];  echo $qte;?></em></div></td>
    <td align="center"><div align="center"><em>
		<? if(!isset($data['qtv'])|| empty($data['qtv'])) { $qtv=0; echo $qtv; } else {$qtv=$data['qtv']; echo $qtv;}?>
    
    </em></div></td>
  <td align="center" > <div align="center"><em>
  <? $reste=$qte-$qtv; echo $reste; ?>
  </em></div></td>
    <td align="center"><div align="center"><em> </em></div></td>
	
  </tr>
  <?php
 $numboucle++;
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
