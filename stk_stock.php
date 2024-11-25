<?
require("session.php"); 
require 'fc-affichage.php';
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
require("bienvenue.php"); 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p><font size="2"><font size="2"><font size="2"> 
  <?php
require 'fonction.php';

$sql = "SELECT COUNT(*) as nbredeligne FROM (
SELECT e.titre , SUM(e.Quantite) AS qtenreg FROM $tbl_enreg e GROUP BY e.titre
) derive WHERE 1 " ; 



// on ex?cute cette requ?te  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
// on r?cup?re le nombre d'?l?ments ? afficher  
$nb_total = mysql_fetch_array($resultat);  
 // on teste si ce nombre de vaut pas 0  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
        // premi?re ligne on affiche les titres pr?nom et surnom dans 2 colonnes
  
    
   
// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas d?j? ?t? d?clar?e, et dans ce cas, on l'initialise ? 0  
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
	// 6 maroufchangement 1 par 5
   $nb_affichage_par_page = 50; 
  
  // à garder important
 // CREATE VIEW V_vente AS SELECT  titre, SUM(Qvente) AS qtvendu  FROM ginv_vente GROUP BY  titre;
 // CREATE VIEW V_enreg AS SELECT  titre, SUM(Quantite) AS qtenreg  FROM ginv_enreg GROUP BY  titre;
   
   // CREATE VIEW v_paiement AS SELECT  p.idp, p.idf, p.id , p.st ,p.nserie , p.id_nom , p.fannee , p.date,  p.paiement, c.refcommune , c.RefLocalite, c.RefQuartier FROM paiement p JOIN clienteda c ON p.id=c.id;

   // CREATE VIEW V_facturation AS SELECT  f.idf,  f.id , f.Police, f.st ,f.nserie , f.fannee ,  f.id_nom , f.libelle, f.cons1, f.cons2, f.cons, f.mont1, f.mont2, f.puisct, f.totalht, f.tax, f.totalttc, f.ortc, f.impayee, f.Pre, f.totalnet, f.report, c.refcommune , c.RefLocalite, c.RefQuartier , f.etat, c.Tarif FROM billing f JOIN clienteda c ON f.id=c.id;
	

   // CREATE VIEW v_paiefact AS SELECT  p.idp, p.idf, p.id , p.st ,p.nserie , p.id_nom , p.fannee , p.date,  p.paiement, f.libelle  FROM v_paiement p JOIN billing f ON p.id=f.id and p.st='A';
   
    // CREATE VIEW V_Sagm AS SELECT  a.id_c, a.nom_C, a.SAVoix , g.SGVoix , m.SMVoix , (a.SAVoix+g.SGVoix+m.SMVoix) AS SAGM  FROM v_a_voix a JOIN v_g_voix g JOIN v_m_voix m ON a.id_c=g.id_c and a.id_c=m.id_c ;
	
   
$sql = "SELECT e.titre as thetitre, SUM(e.qtenreg) AS qte , SUM(v.qtvendu) AS qtv , SUM(e.qtenreg)-SUM(v.qtvendu) as reste
FROM $tv_enreg e LEFT JOIN $tv_vente v ON e.titre=v.titre GROUP BY  e.titre ORDER BY e.titre  asc LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;

$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
  <strong> SUIVI DE STOCK</strong></font><strong></strong></strong></font></font><strong></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font> 
  </strong> produit &agrave; vendre</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF"> 
    <td width="35%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Produit 
      </strong></font><font color="#CCCCCC" size="4">&nbsp;</font></td>
    <td width="19%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite 
      Enregistre </strong></font></td>
    <td width="18%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite 
      Vendu </strong></font></td>
    <td width="16%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite 
      Restant</strong></font></td>
    <td width="12%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3">&nbsp;</font></td>
  </tr>
  <?php
  $numboucle=0;
while($data=mysql_fetch_array($req)){ // Start looping table row 
 if($numboucle %2 == 0) 
 
   $bgcolor = "#00CCFF"; 

        else 

   $bgcolor = "#FFFFFF";
?>
  <tr bgcolor=<? echo "$bgcolor" ?>>
    <td height="36" align="center"> <div align="left"><em><? echo $data['thetitre'];?></em></div>
      <div align="left"></div></td>
    <td align="center"><div align="center"><em><? $qte=$data['qte'];  echo $qte;?></em></div></td>
    <td align="center" ><div align="center"><em>
	<? if(!isset($data['qtv'])|| empty($data['qtv'])) { $qtv=0; echo $qtv; } else {$qtv=$data['qtv']; echo $qtv;}?>
    
    </em></div></td>
  <td align="center" > <div align="center"><em>
   <? $reste=$qte-$qtv; echo $reste; ?>
  </em></div></td>
    <td align="center"><div align="center"><em> </em></div></td>
	
  </tr>
  <?php
   $numboucle++;
// Exit looping and close connection 
}
// on lib?re l'espace m?moire allou? pour cette requ?te  
mysql_free_result ($req); 
 
   // on affiche enfin notre barre 20 avant de passer a l autre page
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
// on lib?re l'espace m?moire allou? pour cette requ?te  
mysql_free_result ($resultat);  
// on ferme la connexion ? la base de donn?es.  
mysql_close ();  
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
