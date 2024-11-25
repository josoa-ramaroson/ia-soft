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
require("bienvenue.php"); 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p><font size="2"><font size="2"><font size="2"> 
  <?php
require 'fonction.php';

$sql = "SELECT COUNT(*) as nbredeligne FROM (
SELECT e.titre , SUM(e.Quantite) AS qtenreg FROM $tbl_enreg e GROUP BY e.titre
) derive WHERE 1 " ; 

$annee=$_POST['mannee']; 


$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
 

$nb_total = mysqli_fetch_array($resultat);  
 
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 

if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    

   $nb_affichage_par_page = 50; 
  
	
 // CREATE VIEW V_app_produit_dsdate AS SELECT  titre, SUM(Qvente)   AS qtvendu , dateValidite  FROM app_produit_sortie GROUP BY  titre , dateValidite;
 
 // CREATE VIEW V_app_produit_dedate AS SELECT  titre, SUM(Quantite) AS qtenreg , Validite FROM app_produit_entre GROUP BY  titre, Validite ;
 
 //$sql = "SELECT e.titre as thetitre, e.qtenreg AS qte , v.qtvendu AS  qtv , e.qtenreg-v.qtvendu as reste , e.Validite ,  v.dateValidite  FROM $tv_appproduit_dsdate v ,  $tv_appproduit_dedate e where  e.titre='$np' and v.dateValidite=e.Validite
 // GROUP BY  e.Validite ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;

  
   $sql = "SELECT e.titre as thetitre, e.qtenreg AS qte , v.qtvendu AS  qtv , e.qtenreg-v.qtvendu as reste , e.Validite ,
 v.dateValidite  FROM  $tv_appproduit_dedate e   LEFT JOIN   $tv_appproduit_dsdate v  ON ( e.titre=v.titre) and (v.dateValidite=e.Validite) where  YEAR(e.Validite)=$annee  LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;
  
  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
?>
  </font></font></font></p>
<table width="1167" border="0">
  <tr>
    <td width="414"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Validit&eacute;  par mois</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="app_produit_stock_validite_mois.php" method="post" name="form1" id="form1">
              Mois: <font color="#000000">
                <select name="mois" size="1" id="mois">
                  <option value="1">Janvier</option>
                  <option value="2">F&eacute;vrier</option>
                  <option value="3">Mars</option>
                  <option value="4">Avril</option>
                  <option value="5">Mai</option>
                  <option value="6">Juin</option>
                  <option value="7">Juillet</option>
                  <option value="8">Ao&ucirc;t</option>
                  <option value="9">Septembre</option>
                  <option value="10">Octobre</option>
                  <option value="11">Novembre</option>
                  <option value="12">D&eacute;cembre</option>
                </select>
                </font><font color="#000000">
                  <select name="annee" size="1" id="annee">
                    <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                  </select>
                  </font>
              <input type="submit" name="valider4" id="valider5" value="Valider" />
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="26">&nbsp;</td>
    <td width="389"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Validit&eacute; par annee</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="app_produit_stock_validite_annee.php" method="post" name="form2" id="form2">
              Ann&eacute;e : <font color="#000000">
                <select name="mannee" size="1" id="mannee">
                  <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                </select>
                &nbsp;&nbsp; </font>
              <input type="submit" name="valider5" id="valider7" value="Valider" />
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="20">&nbsp;</td>
    <td width="296">&nbsp;</td>
  </tr>
</table>
<p><font size="2"><font size="2"><font size="2"><strong>SUIVI DE STOCK</strong></font><strong></strong></strong></font></font><strong></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font> 
  </strong>au magasin</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF"> 
    <td width="26%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Produit 
      </strong></font><font color="#CCCCCC" size="4">&nbsp;</font></td>
    
    <td width="15%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Date Validité</strong></font></td>
    
    <td width="17%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite 
      Enregistre </strong></font></td>
    <td width="15%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite 
      Sortie</strong></font></td>
    <td width="17%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite 
      Restant Magain</strong></font></td>
     
     
    <td width="10%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3">&nbsp;</font></td>
  </tr>
  <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
  <tr> 
    <td height="31" align="center" bgcolor="#FFFFFF"> <div align="left"><em><? echo $data['thetitre'];?></em></div>
      <div align="left"></div></td>
       <td align="center" bgcolor="#FFFFFF"> <div align="center"><em><? echo $data['Validite'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="center"><em><? echo $data['qte'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="center"><em><? echo $data['qtv'];?></em></div></td>
  <td align="center" bgcolor="#FFFFFF"> <div align="center"><em><? echo $data['reste'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="center"><em> </em>
     <a href="app_produit_stock.php" class="btn btn-xs btn-success">Suivi Stock</a>
    </div></td>
	
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
