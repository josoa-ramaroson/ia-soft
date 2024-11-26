<?php

require_once 'fonction.php';
$class='nav-link text-white';
$class2='nav-link  text-white';
$class3='nav-link  text-white';
$class4='nav-link  text-white';
$class5='nav-link  text-white';
$class6='nav-link  text-white';
// $class2='btn btn-success';
// $class3='btn btn-warning';
// $class4='btn btn-info';
// $class5='btn btn-default';
// $class6='btn btn-danger';
$id_user = $_SESSION['id_user'];

$sqlv = "SELECT COUNT(*) AS nombre 
FROM $tbl_utilisateur u, $tbl_ind n  
WHERE u.id_u='" . mysqli_real_escape_string($linki, $id_user) . "' 
AND u.id_u=n.sid2 
AND n.nbligne=1";

$rev = mysqli_query($linki, $sqlv) or die("Erreur SQL : " . mysqli_error($linki));
$nqtv = mysqli_fetch_array($rev, MYSQLI_ASSOC);
  //$nqtv['nombre'];
  if((!isset($nqtv['nombre'])|| empty($nqtv['nombre']))) {$qt=0; $classi=$class;} else {$qt=$nqtv['nombre']; $classi=$class6;}
  
if ($_SESSION['privileges'] == 7) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="utilisateursp.php">
              <span class="glyphicon glyphicon-star"></span> Privileges
          </a>
        </li>';
}

if ($_SESSION['u_niveau'] == 7 || $_SESSION['u_niveau'] == 90) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="role.php">
              Gestion des roles
          </a>
        </li>';
}

// GESTION DES CLIENTS 
if ($_SESSION['u_niveau'] == 1) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_enregistrement.php">
              Ajouter
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_affichage_branchement.php">
              Branchement
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_edit_modifnom.php">
              Chang Nom
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_edit_modifcompt.php">
              Chang Compteur
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_edit_modifcvq.php">
              Transfert
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_edit_resilier.php">
              Réactivation
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_affichage.php">
              Les clients
          </a>
        </li>';
}


// GESTION DES FACTURATION 
if ($_SESSION['u_niveau'] == 2) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="bsaisie.php">
              Quartier à Saisir
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_facturation_menu.php">
              Facturation
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_affichage.php">
              Les clients
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_liste_factNoclient.php">
              Non Facturé
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="impression.php">
              Impression
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_liste_factElectronique.php">
              Fact Electronique
          </a>
        </li>';
  
  // Liens commentés gardés en référence
  /*
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_facturation.php">
              Facturation Cyclique
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_facturationMT.php">
              Facturation MT
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="journal.php">
              Journal de vente
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="rapport.php">
              Rapport
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_liste_factclient.php">
              Facturé
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="releve.php">
              Liste des releves
          </a>
        </li>';
  */
}




// GESTION DES RECOUVREMENT
if ($_SESSION['u_niveau'] == 3) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_niv3_client.php">
              Gestion des clients
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_niv3_coupure.php">
              Gestion des coupures
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_niv3_services.php">
              Autres des services
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="journal.php">
              Journal de vente
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="rapport.php">
              Rapport
          </a>
        </li>';

  // Liens commentés gardés pour référence
  /*
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="paiement_Paye.php?st=E">
              Payé
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="paiement_NPaye.php?st=E">
              Non Payé
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="coupure_remise.php">
              Remises
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="penalite_ttclient.php" 
             onClick="return confirm(\'Etes-vous sûr de vouloir taxer les 1000FC\')">
              Pénalité pour tous les clients
          </a>
        </li>';
  */
}


// GESTION DES CAISSES
if ($_SESSION['u_niveau'] == 4) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="paiement_menu_p.php">
              Gestion des paiements
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_affichage.php">
              Liste des clients
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="rapportsimple.php">
              Rapport Journalier
          </a>
        </li>';

  // Liens commentés gardés pour référence
  /*
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="paiement.php">
              Paiement
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="paiement_tr.php">
              Paiement DEV
          </a>
        </li>';

  echo '<li class="nav-link">
          <a href="paiementcb.php">
              <img src="images/barre.png" width="100" height="34" alt="Code barre" />
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="coi_facturation_liste.php">
              Les pénalités
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_edit_modif_liste.php">
              Transfert & Changement de nom
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class3 . '" type="button" href="paiement_gaz.php">
              Paiement Gaz
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class3 . '" type="button" href="re_edit_modif_liste_gaz.php">
              Suivi GAZ
          </a>
        </li>';
  */
}


// RELEVEUR 
if ($_SESSION['u_niveau'] == 5) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="releve_sw.php">
              Situation des clients
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="coupure_releveur.php">
              Listes des coupures
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="releve.php">
              Liste des releves
          </a>
        </li>';

  // Liens commentés gardés pour référence
  /*
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="coupure_remise.php">
              Liste des remises
          </a>
        </li>';

  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="paiement_Paye.php?st=E">
              Payé
          </a>
        </li>';
  */
}

// COMPTE LABORATOIRE
if ($_SESSION['u_niveau'] == 47) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="releve_recherche.php">
              Historique Index
          </a>
        </li>';
  
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_affichage.php">
              Les clients
          </a>
        </li>';
}

// RESPONSABLE DES CAISSES 
if ($_SESSION['u_niveau'] == 6) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="bcaisse.php">
              Configuration date
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="bcaisse_ver.php">
              Les dépots
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_niv6_client.php">
              Service Client
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_niv6_rapport.php">
              Suivi des rapports
          </a>
        </li>';
}

// Administrateur du système
if ($_SESSION['u_niveau'] == 7) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_admin.php">
              Administration
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_affichage.php">
              Liste des clients
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_rectification.php">
              Modification des Index
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="exploitation.php">
              Exploitation
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="Journal_audit_v_bd_read.php">
              Journal Système
          </a>
        </li>';
}

// GESTION DES FACTURATION DES ACTIVITES
if ($_SESSION['u_niveau'] == 8) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="configuration_data.php">
              Configuration
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_affichage.php">
              Liste des clients
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="journal.php">
              Journal de vente
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="coi_facturation_liste.php">
              Les pénalités
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_rectification.php">
              Modification des Index
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="cov_rectification.php">
              Modification des pénalités
          </a>
        </li>';
}

// GESTION DES FACTURATION DES TRANSPORT
if ($_SESSION['u_niveau'] == 9) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="coi_facturation_liste.php">
              Les pénalités
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_edit_modif_liste.php">
              Transfert & Changement de nom
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class3 . '" type="button" href="re_edit_modif_liste_gaz.php">
              Suivi GAZ
          </a>
        </li>';
}

// TI
if ($_SESSION['u_niveau'] == 10) {
  echo '<li class="nav-link">
          <a class="' . $class . ' glyphicon glyphicon-tasks" type="button" href="xbackup.php">
              BACKUP
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="pc_enregistrement.php">
              Ajouter un PC
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="pct_taches_traite.php">
              Les taches réalisées
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="pct_taches.php">
              Les taches à faire
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="pct_taches_user.php">
              Taches par TI
          </a>
        </li>';
}

// GESTION comptabilite
if ($_SESSION['u_niveau'] == 20) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="compt_client.php">
              Clients
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="compt_fourniseur.php">
              Fournisseurs
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="compt_plan.php">
              Plan comptable
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="compt_depense_debiter_tva.php">
              Dépenses
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="compt_recette_crediter_tva.php">
              Recettes
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="compt_rapport.php">
              Rapport
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="#">
              Documents comptables & Fiscaux
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="compt_rapport_suivi.php">
              Suivi des services
          </a>
        </li>';
}

// GESTION COMMUNICATION
if ($_SESSION['u_niveau'] == 30) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="communication.php">
              Communication
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_affichage.php">
              Les clients
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sms_coupure.php">
              Alertes SMS
          </a>
        </li>';
}
// GESTION DES STOCK SERVICE APPROVISIONNEMENT
if ($_SESSION['u_niveau'] == 40) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="app_caisse.php">
              Configuration date
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="app_gestionstok.php">
              Gestion de stock
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="app_gestionapprov.php">
              Gestion des commandes
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="app_gestionapprov_backup.php">
              Gestion d\'archives
          </a>
        </li>';
}

// GESTION DES STOCK GAZ
if ($_SESSION['u_niveau'] == 41) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stk_client.php">
              Ajouter Client GAZ
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stk_vente_g.php">
              Vente produit
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stk_Rapport_gaz.php">
              Impression
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_edit_modif_liste_gaz.php">
              Suivi GAZ
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stk_stock.php">
              Suivi du Stock
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stk_gaz_recapitulatif.php">
              Recapitulatif Gaz
          </a>
        </li>';
}

// GESTION DES STOCK SERVICE BRANCHEMENT
if ($_SESSION['u_niveau'] == 42) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_affichage_devis.php">
              Devis à realiser
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_affichage_branch.php">
              Devis realisé
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_affichage_connecte.php">
              A Brancher
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_affichage_facture.php">
              A Facturer
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stk_vente.php">
              Vente
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stk_stock.php">
              Suivi du Stock
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_affichage.php">
              Les clients
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stk_Rapport.php">
              Les rapports
          </a>
        </li>';
}

// SERVICE Resp Commercial 
if ($_SESSION['u_niveau'] == 43) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_client.php">
              Gestion des Clients
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_recouvrement.php">
              Recouvrement
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_statistique.php">
              Statistiques
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_affichage_facture.php">
              Transfert à la Facturation
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_niv43_modif.php">
              Gestion des modifications
          </a>
        </li>';
}

// SERVICE CONTROLE 
if ($_SESSION['u_niveau'] == 44) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_affichage_connecte.php">
              Mise à jours Brancher
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="plombage_compt.php">
              Plombage
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="plombage_controle.php">
              Contrôle
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="coi_facturation.php">
              Penalités (fraude)
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="client_demande_suvi.php">
              Demande de soutient
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="co_rectification.php">
              Modifications des Index
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="re_affichage.php">
              Chercher un client
          </a>
        </li>';
}

// GESTION DES STOCK SERVICE MAGASIN
if ($_SESSION['u_niveau'] == 45) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="app_produit_entre.php">
              Entre au Magasin
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="app_produit_sortie.php">
              Sortie au Magasin
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="app_produit_stock.php">
              Suivi du Stock Magasin
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="app_transfert_etape1.php">
              Transfert des Stocks
          </a>
        </li>';
}

// COMPTE ADMINISTRATION COMMERCAIL
if ($_SESSION['u_niveau'] == 46) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_client.php">
              Gestion des Clients
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_recouvrement.php">
              Recouvrement
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_statistique.php">
              Statistiques
          </a>
        </li>';
}

// SERVICE PERSONNEL
if ($_SESSION['u_niveau'] == 50) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="rh_direction.php">
              Directions
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="rh_service.php">
              Services
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="rh_gestionrh.php">
              Ressources humaines
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="rh_gestionpaie.php">
              Gestion de paie
          </a>
        </li>';
}

// SERVICE PRODUCTION
if ($_SESSION['u_niveau'] == 70) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="production.php">
              Production
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stat_tableau.php">
              Graphiques
          </a>
        </li>';
}

// SERVICE STATISTIQUE
if ($_SESSION['u_niveau'] == 80) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="journal.php">
              Journal de vente
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stat_filtre.php">
              Tableaux
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stat_tableau.php">
              Graphiques
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stat_traitement.php">
              Base des connaissances
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="stat_traitement_con_affichage.php">
              Gestion des Alertes
          </a>
        </li>';
}

// SERVICE CONTROLE
if ($_SESSION['u_niveau'] == 90) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_client.php">
              Gestion des Clients
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_recouvrement.php">
              Recouvrement
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_approvisionnement.php">
              Approvisionnement
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_comptable.php">
              Comptabilité
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_personnel.php">
              Ressources Humaines
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_statistique.php">
              Statistiques
          </a>
        </li>';
}

// GESTION DES MT
if ($_SESSION['u_niveau'] == 91) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="sw_clientR.php">
              Gestion des clients
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="journal.php">
              Journal de vente
          </a>
        </li>';
}

// Liens communs pour tous les utilisateurs sauf niveau 0 et 104
if ($_SESSION['u_niveau'] != 0 && $_SESSION['u_niveau'] != 104) {
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="client_anomalies.php">
              Déclarer un problème
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="pc_affichage.php">
              Votre PC
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $classi . '" type="button" href="chat_utilisateur.php">
              Messagerie :)
          </a>
        </li>';
        
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="utilisateurs.php">
              Profil
          </a>
        </li>';
        
  $idss = md5(microtime()).$id_user;
  echo '<li class="nav-link">
          <a class="' . $class . '" type="button" href="deconnexion.php?id=' . $idss . '">
              Déconnexion
          </a>
        </li>';
}

// Menu spécial pour niveau 104
if ($_SESSION['u_niveau'] == 104) {
  echo '<nav class="navbar navbar-inverse">
          <ul class="nav navbar-nav">';
          
  echo '<li><a href="paiement.php">Paiement</a></li>';
  
  echo '<li class="dropdown">
          <a href="#">Facturé</a>
          <ul>
              <li><a class="' . $class . '" type="button" href="co_liste_factclient.php">Facturé</a></li>
              <li><a class="' . $class . '" type="button" href="co_liste_factNoclient.php">Non facturé</a></li>
          </ul>
        </li>';
        
  echo '<li class="dropdown">
          <a href="#">Paiements</a>
          <ul>
              <li><a class="' . $class . '" type="button" href="paiement_Paye.php?st=E">Payé</a></li>
              <li><a class="' . $class . '" type="button" href="paiement_NPaye.php?st=E">Non payé</a></li>
          </ul>
        </li>';
        
  echo '<li class="dropdown">
          <a href="#">Autres Facturation</a>
          <ul>
              <li><a class="' . $class . '" type="button" href="coi_facturation_liste.php">Les pénalités</a></li>
              <li><a class="' . $class . '" type="button" href="re_edit_modif_liste.php">TSF & Nom</a></li>
          </ul>
        </li>';
        
  echo '<li><a href="rapport.php">Rapport</a></li>
        <li><a href="pc_affichage.php">Votre PC</a></li>
        <li><a href="utilisateurs.php">Profil</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>';
        
  echo '</ul>
      </nav>';
}
?>