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
    <h3 align="center" class="panel-title">COMPTE DE RESULTAT PRODUITS<br>
    </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="1">
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="14%">&nbsp;</td>
            <td width="39%">&nbsp;</td>
            <td width="47%">&nbsp;</td>
            </tr>
          <tr>
            <td>Réf.</td>
            <td>POSTES</td>
            <td>N DE COMPTE A INCORPORER DANS LES POSTES</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td bgcolor="#CCCCCC">ACTIVITÉ D’EXPLOITATION</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TA</td>
            <td>Ventes de marchandises</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TC</td>
            <td>Ventes de produits fabriqués</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TD</td>
            <td>Travaux, services vendus</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TE</td>
            <td>Production stockée</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TF</td>
            <td>Production immobilisée</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TH</td>
            <td>Produits accessoires</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TK</td>
            <td>Subventions d’exploitation</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TL</td>
            <td>Autres produits</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TS</td>
            <td>Reprises de provisions</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TT</td>
            <td>Transferts de charges</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td bgcolor="#CCCCCC">ACTIVITÉ FINANCIÈRE</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>UA</td>
            <td>Revenus financiers</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>UC</td>
            <td>Gains de change</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>UD</td>
            <td>Reprises de provisions</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>UE</td>
            <td>Transferts de charges</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td bgcolor="#CCCCCC">HORS ACTIVITÉS ORDINAIRES (HAO)</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>UK</td>
            <td>Produits des cessions d’immobilisations</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>UL</td>
            <td>Produits HAO</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>UM</td>
            <td>Reprises HAO</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>UN</td>
            <td>Transferts de charges</td>
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