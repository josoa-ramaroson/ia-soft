<?php
Require 'session.php';
require 'fonction.php';
?>
<?php
 if($_SESSION['u_niveau'] != 20) {
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
require 'compt_variable_bilanpassif.php';  
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
    <h3 align="center" class="panel-title">BILAN-PASSIF<br>
    </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="1">
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="14%">&nbsp;</td>
            <td width="45%">&nbsp;</td>
            <td width="41%">N°S DE COMPTES A INCORPORER              DANS LES POSTES</td>
            </tr>
          <tr>
            <td>Réf.</td>
            <td>POSTES</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>CAPITAUX PROPRES              ET RESSOURCES ASSIMILÉES</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>CA</td>
            <td bgcolor="#CCCCCC">CAPITAL</td>
            <td><?php echo $ps1; ?></td>
            </tr>
          <tr>
            <td>CB</td>
            <td>Actionnaires, capital souscrit non appelé</td>
            <td><?php echo $ps2; ?></td>
            </tr>
          <tr>
            <td>CC</td>
            <td bgcolor="#CCCCCC">PRIMES ET RÉSERVES</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>CD</td>
            <td>Primes d’émission, d’apport, de fusion</td>
            <td><?php echo $ps3; ?></td>
            </tr>
          <tr>
            <td>CE</td>
            <td>Ecarts de réévaluation</td>
            <td><?php echo $ps4; ?></td>
            </tr>
          <tr>
            <td>CF</td>
            <td>Réserves indisponibles</td>
            <td><?php echo $ps5; ?></td>
            </tr>
          <tr>
            <td>CG</td>
            <td>Réserves libres</td>
            <td><?php echo $ps6; ?></td>
            </tr>
          <tr>
            <td>CH</td>
            <td>Report à nouveau</td>
            <td><?php echo $ps7; ?></td>
            </tr>
          <tr>
            <td>CI</td>
            <td bgcolor="#CCCCCC">RÉSULTAT NET DE L’EXERCICE</td>
            <td><?php echo $ps8; ?></td>
            </tr>
          <tr>
            <td>CK</td>
            <td bgcolor="#CCCCCC">AUTRES CAPITAUX PROPRES</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>CL</td>
            <td>Subventions d’investissement</td>
            <td><?php echo $ps9; ?></td>
            </tr>
          <tr>
            <td>CM</td>
            <td>Provisions réglementées et fonds assimilés</td>
            <td><?php echo $ps10; ?></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td bgcolor="#CCCCCC">DETTES FINANCIÈRES<br>
              ET RESSOURCES ASSIMILÉES</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>DA</td>
            <td>Emprunts</td>
            <td><?php echo $ps11; ?></td>
            </tr>
          <tr>
            <td>DB</td>
            <td>Dettes de crédit-bail et contrats assimilés</td>
            <td><?php echo $ps12; ?></td>
            </tr>
          <tr>
            <td>DC</td>
            <td>Dettes financières diverses</td>
            <td><?php echo $ps13; ?></td>
            </tr>
          <tr>
            <td>DD</td>
            <td>Provisions financières pour risques et charges</td>
            <td><?php echo $ps14; ?></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td bgcolor="#CCCCCC">PASSIF CIRCULANT</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>DH</td>
            <td>Dettes circulantes HAO et ressources              assimilées</td>
            <td><?php echo $ps15; ?></td>
            </tr>
          <tr>
            <td>DI</td>
            <td>Clients, avances reçues</td>
            <td><?php echo $ps16; ?></td>
            </tr>
          <tr>
            <td>DJ</td>
            <td>Fournisseurs d'exploitation</td>
            <td><?php echo $ps17; ?></td>
            </tr>
          <tr>
            <td>DK</td>
            <td>Dettes fiscales</td>
            <td><?php echo $ps18; ?></td>
            </tr>
          <tr>
            <td>DL</td>
            <td>Dettes sociales</td>
            <td><?php echo $ps19; ?></td>
            </tr>
          <tr>
            <td>DM</td>
            <td>Autres dettes</td>
            <td><?php echo $ps20; ?></td>
            </tr>
          <tr>
            <td>DN</td>
            <td>Risques provisionnés</td>
            <td><?php echo $ps21; ?></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td bgcolor="#CCCCCC">TRÉSORERIE - PASSIF</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>DQ</td>
            <td>Banques, crédits d’escompte</td>
            <td><?php echo $ps22; ?></td>
            </tr>
          <tr>
            <td>DR</td>
            <td>Banques, crédits de trésorerie</td>
            <td><?php echo $ps23; ?></td>
            </tr>
          <tr>
            <td>DS</td>
            <td>Banques, découverts</td>
            <td><?php echo $ps24; ?></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td bgcolor="#CCCCCC">Écarts de conversion - Passif</td>
            <td><?php echo $ps25; ?></td>
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