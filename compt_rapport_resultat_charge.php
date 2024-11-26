<?php
Require 'session.php';
require 'fonction.php';
?>
<?php
 if((($_SESSION['u_niveau'] != 20) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
require 'compt_variable_bilanactif.php';  
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">LES DOCUMENTS COMPTABLES ET FISCAUX  POUR  ANNEE <?php echo $annee ?></h3>
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
    <h3 align="center" class="panel-title">COMPTE DE RESULTAT CHARGES<br>
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
            <td>RA</td>
            <td>Achat de marchandises</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RB</td>
            <td>Variation de stocks</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RC</td>
            <td>Achat de matières premières et fournitures liées</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RD</td>
            <td>Variation de stocks</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RE</td>
            <td>Autres achats</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RH</td>
            <td>Variation de stocks</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RI</td>
            <td>Transports</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RJ</td>
            <td>Services extérieurs</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RK</td>
            <td>Impôts et taxes</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RL</td>
            <td>Autres charges</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RP</td>
            <td>Charges de personnel</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>RS</td>
            <td>Dotations aux amortissements et aux provisions</td>
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
            <td>SA</td>
            <td>Frais financiers</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>SC</td>
            <td>Pertes de change</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>SD</td>
            <td>Dotations aux amortissements et aux provisions</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td bgcolor="#CCCCCC">HORS ACTIVITÉS ORDINAIRES (HAO)</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>SK</td>
            <td>Valeurs comptables des cessions d'immobilisations</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>SL</td>
            <td>Charges HAO</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>SM</td>
            <td>Dotations HAO</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>SQ</td>
            <td>Participation des travailleurs</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>SR</td>
            <td>Impôts sur le résultat</td>
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