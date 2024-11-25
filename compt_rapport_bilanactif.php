<?
require 'session.php';
require 'fonction.php';
?>
<?
	if($_SESSION['u_niveau'] != 20) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
</head>
<?
require 'bienvenue.php';    // on appelle la page contenant la fonction
require 'compt_variable_bilanactif.php';  
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">LES DOCUMENTS COMPTABLES ET FISCAUX  POUR  ANNEE <? echo $annee ?></h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0">
      <tr>
        <td width="18%"><a href="compt_rapport_bilanactif.php" class="btn btn-xs btn-success">Bilan Actif</a></td>
        <td width="25%"><a href="compt_rapport_bilanpassif.php" class="btn btn-xs btn-success">Bilan Passif </a></td>
        <td width="29%"><a href="compt_rapport_resultat_charge.php" class="btn btn-xs btn-success">Compte de résultat - charge </a></td>
        <td width="28%"><a href="compt_rapport_resultat_produits.php" class="btn btn-xs btn-success">Compte de résultat - produits </a></td>
      </tr>
    </table>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 align="center" class="panel-title">BILAN-ACTIF<br>
    </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="1">
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="7%">&nbsp;</td>
            <td width="52%">&nbsp;</td>
            <td width="19%">Brut</td>
            <td width="22%">Amortissements/        provisions</td>
          </tr>
          <tr>
            <td>Réf.</td>
            <td>POSTES</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>AA</td>
            <td bgcolor="#CCCCCC">CHARGES IMMOBILISÉES</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>AX</td>
            <td>Frais d'établissement</td>
            <td><? echo $b1; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>AY</td>
            <td>Charges à répartir</td>
            <td><? echo $b2; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>AC</td>
            <td>Primes de remboursement des obligations</td>
            <td><? echo $b3; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>AD</td>
            <td bgcolor="#CCCCCC">IMMOBILISATIONS INCORPORELLES</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>AE</td>
            <td>Frais de recherche et de développement</td>
            <td><? echo $b4; ?></td>
            <td><? echo $m4; ?></td>
          </tr>
          <tr>
            <td>AF</td>
            <td>Brevets, licences, logiciels</td>
            <td><? echo $b5; ?></td>
            <td><? echo $m5; ?></td>
          </tr>
          <tr>
            <td>AG</td>
            <td>Fonds commercial</td>
            <td><? echo $b6; ?></td>
            <td><? echo $m6; ?></td>
          </tr>
          <tr>
            <td>AH</td>
            <td>Autres immobilisations incorporelles</td>
            <td><? echo $b7; ?></td>
            <td><? echo $m7; ?></td>
          </tr>
          <tr>
            <td>AI</td>
            <td bgcolor="#CCCCCC">IMMOBILISATIONS CORPORELLES</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>AJ</td>
            <td>Terrains</td>
            <td><? echo $b8; ?></td>
            <td><? echo $m8; ?></td>
          </tr>
          <tr>
            <td>AK</td>
            <td>Bâtiments</td>
            <td><? echo $b9; ?></td>
            <td><? echo $m9; ?></td>
          </tr>
          <tr>
            <td>AL</td>
            <td>Installations et agencements</td>
            <td><? echo $b10; ?></td>
            <td><? echo $m10; ?></td>
          </tr>
          <tr>
            <td>AM</td>
            <td>Matériel</td>
            <td><? echo $b11; ?></td>
            <td><? echo $m11; ?></td>
          </tr>
          <tr>
            <td>AN</td>
            <td>Matériel de transport</td>
            <td><? echo $b12; ?></td>
            <td><? echo $m12; ?></td>
          </tr>
          <tr>
            <td>AP</td>
            <td bgcolor="#CCCCCC">AVANCES ET ACOMPTES VERSÉS        SUR IMMOBILISATIONS</td>
            <td><? echo $b13; ?></td>
            <td><? echo $m13; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>AQ</td>
            <td bgcolor="#CCCCCC">IMMOBILISATIONS FINANCIÈRES</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>AR</td>
            <td>Titres de participation</td>
            <td><? echo $b14; ?></td>
            <td><? echo $m14; ?></td>
          </tr>
          <tr>
            <td>AS</td>
            <td>Autres immobilisations financières</td>
            <td><? echo $b15; ?></td>
            <td><? echo $m15; ?></td>
          </tr>
          <tr>
            <td>BA</td>
            <td bgcolor="#CCCCCC">ACTIF CIRCULANT H.A.O.</td>
            <td><? echo $b16; ?></td>
            <td><? echo $m16; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>BB</td>
            <td bgcolor="#CCCCCC">STOCKS</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>BC</td>
            <td>Marchandises</td>
            <td><? echo $b17; ?></td>
            <td><? echo $m17; ?></td>
          </tr>
          <tr>
            <td>BD</td>
            <td>Matières premières et autres approvisionnements</td>
            <td><? echo $b18; ?></td>
            <td><? echo $m18; ?></td>
          </tr>
          <tr>
            <td>BE</td>
            <td>En-cours</td>
            <td><? echo $b19; ?></td>
            <td><? echo $m19; ?></td>
          </tr>
          <tr>
            <td>BF</td>
            <td>Produits fabriqués</td>
            <td><? echo $b20; ?></td>
            <td><? echo $m20; ?></td>
          </tr>
          <tr>
            <td>BG</td>
            <td bgcolor="#CCCCCC">CRÉANCES ET EMPLOIS ASSIMILÉS</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>BH</td>
            <td>Fournisseurs avances versées</td>
            <td><? echo $b21; ?></td>
            <td><? echo $m21; ?></td>
          </tr>
          <tr>
            <td>BI</td>
            <td>Clients</td>
            <td><? echo $b22; ?></td>
            <td><? echo $m22; ?></td>
          </tr>
          <tr>
            <td>BJ</td>
            <td>Autres créances</td>
            <td><? echo $b23; ?></td>
            <td><? echo $m23; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td bgcolor="#CCCCCC">TRÉSORERIE-ACTIF</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>BQ</td>
            <td>Titres de placement</td>
            <td><? echo $b24; ?></td>
            <td><? echo $m24; ?></td>
          </tr>
          <tr>
            <td>BR</td>
            <td>Valeurs à encaisser</td>
            <td><? echo $b25; ?></td>
            <td><? echo $m25; ?></td>
          </tr>
          <tr>
            <td>BS</td>
            <td>Banques, chèques postaux, caisse</td>
            <td><? echo $b26; ?></td>
            <td><? echo $m26; ?></td>
          </tr>
          <tr>
            <td>BU</td>
            <td bgcolor="#CCCCCC">Écarts de conversion-Actif</td>
            <td><? echo $b27; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">
      <?php
include_once('pied.php');
?>
    </div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
</table>
</body>
</html>