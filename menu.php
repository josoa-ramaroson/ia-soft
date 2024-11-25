<?php
$class='btn btn-primary';
$class2='btn btn-success';
$class3='btn btn-warning';
$class4='btn btn-info';
$class5='btn btn-default';
$class6='btn btn-danger';


$sqlv = "SELECT COUNT(*) AS nombre 
FROM $tbl_utilisateur u, $tbl_ind n  
WHERE u.id_u='" . mysqli_real_escape_string($linki, $id_user) . "' 
AND u.id_u=n.sid2 
AND n.nbligne=1";

$rev = mysqli_query($linki, $sqlv) or die("Erreur SQL : " . mysqli_error($linki));
$nqtv = mysqli_fetch_array($rev, MYSQLI_ASSOC);
  //$nqtv['nombre'];
  if((!isset($nqtv['nombre'])|| empty($nqtv['nombre']))) {$qt=0; $classi=$class;} else {$qt=$nqtv['nombre']; $classi=$class6;}
  
if ( ($_SESSION['privileges']==7)){
echo "<a class=\"$class\" type=\"button\" href=\"utilisateursp.php\">  <span class=\"glyphicon glyphicon-star\"></span> Privileges</a> " ;
}

if (($_SESSION['u_niveau'] == 7) or ($_SESSION['u_niveau'] == 90) ){
echo "<a class=\"$class\" type=\"button\" href=\"role.php\"> Gestion des roles </a> " ;
}


// GESTION DES CLIENTS 
if ( ($_SESSION['u_niveau'] == 1) ){
echo "<a class=\"$class\" type=\"button\" href=\"re_enregistrement.php\"> Ajouter </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_branchement.php\">  Branchement </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_n.php\"> Police à Payer </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_devis.php\"> D à realiser  </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_branch.php\"> Devis realisé </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_connecte.php\">  A Brancher </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_facture.php\">  A Facturer </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_affichage.php\"> Clt actifs </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_resilier.php\"> Clt résilié </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_edit_modifnom.php\"> Chang Nom </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_edit_modifcompt.php\"> Chang Compteur </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_edit_modifcvq.php\"> Transfert </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_edit_resilier.php\"> Réactivation </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_affichage.php\"> Les clients </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_sondage.php\"> SONDAGES </a> " ;
}

// GESTION DES FACTURATION 
if ( ($_SESSION['u_niveau'] == 2) ){
echo "<a class=\"$class\" type=\"button\" href=\"bsaisie.php\"> Quartier à Saisir </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_facturation_menu.php\"> Facturation </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"co_facturation.php\"> Facturation Cyclique </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"co_facturationMT.php\"> Facturation MT </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"journal.php\"> Jounal de vente  </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"rapport.php\"> Rapport</a> ";
echo "<a class=\"$class\" type=\"button\" href=\"co_affichage.php\"> Les clients </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"co_liste_factclient.php\">  Facturé </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_liste_factNoclient.php\">  Non Facturé </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"impression.php\"> Impression </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_liste_factElectronique.php\"> Fact Electronique </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"releve.php\"> Liste des releves </a> " ;
}






// GESTION DES RECOUVREMENT
if ( ($_SESSION['u_niveau'] == 3) ){
echo "<a class=\"$class\" type=\"button\" href=\"sw_niv3_client.php\"> Gestion des clients  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_niv3_coupure.php\">  Gestion des coupures </a> ";
echo "<a class=\"$class\" type=\"button\" href=\"sw_niv3_services.php\">  Autres  des services </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"journal.php\"> Jounal de vente  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"rapport.php\"> Rapport</a> ";
//@echo "<a class=\"$class\" type=\"button\" href=\"paiement_Paye.php?st=E\">  Payé </a> " ;
//@echo "<a class=\"$class\" type=\"button\" href=\"paiement_NPaye.php?st=E\">  Non Payé </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"coupure_remise.php\"> Remises </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"penalite_ttclient.php\" onClick=\"return confirm('Etes-vous sûr de vouloir taxer les 1000FC ')\"> Penalité pour tous les clients </a> ";
}



// GESTION DES CAISSES
if ( ($_SESSION['u_niveau'] == 4) ){
echo "<a class=\"$class\" type=\"button\" href=\"paiement_menu_p.php\"> Gestion des paiements </a> " ;	

//echo "<a class=\"$class\" type=\"button\" href=\"paiement.php\"> Paiment </a> ";
//echo "<a class=\"$class\" type=\"button\" href=\"paiement_tr.php\"> Paiment DEV </a> ";
//echo "<a href=\"paiementcb.php\"><img src=\"images/barre.png\" width=\"100\" height=\"34\" /></a> ";
echo "<a class=\"$class\" type=\"button\" href=\"co_affichage.php\"> Liste des clients </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"coi_facturation_liste.php\">  Les penalités </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_edit_modif_liste.php\">  Tansfert & Changement de nom </a> " ;
//echo "<a class=\"$class3\" type=\"button\" href=\"paiement_gaz.php\"> Paiment Gaz </a> ";
//echo "<a class=\"$class3\" type=\"button\" href=\"re_edit_modif_liste_gaz.php\">  Suivi GAZ </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"rapportsimple.php\"> Rapport Journalier</a> ";
}



// RELEVEUR 
if ( ($_SESSION['u_niveau'] == 5) ){
echo "<a class=\"$class\" type=\"button\" href=\"releve_sw.php\"> Situation des clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"coupure_releveur.php\"> Listes des coupures </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"coupure_remise.php\"> Liste des remises </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"releve.php\"> Liste des releves </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"paiement_Paye.php?st=E\"> Payé  </a>" ;
}



// COMPTE LABORATOIRE
if ( ($_SESSION['u_niveau'] == 47) ){
echo "<a class=\"$class\" type=\"button\" href=\"releve_recherche.php\"> Historique Index </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_affichage.php\"> Les clients </a> " ;
}


// RESPONSABLE DES CAISSES 
if ( ($_SESSION['u_niveau'] == 6) ){
echo "<a class=\"$class\" type=\"button\" href=\"bcaisse.php\"> Configuration date </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"bcaisse_ver.php\"> Les depots </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_niv6_client.php\"> Service Client </a> ";
echo "<a class=\"$class\" type=\"button\" href=\"sw_niv6_rapport.php\"> Suivi des  rapports </a> ";
}

// Administrateur du systeme
if (($_SESSION['u_niveau'] == 7) ){
echo "<a class=\"$class\" type=\"button\" href=\"sw_admin.php\"> Administration </a> ";
echo "<a class=\"$class\" type=\"button\" href=\"co_affichage.php\"> Liste des clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_rectification.php\"> Modification des Index </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"exploitation.php\"> Exploitation </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"Journal_audit_v_bd_read.php\"> Journal Systeme</a> " ;
}

// GESTION DES FACTURATION DES ACTIVITES - rectification
if ( ($_SESSION['u_niveau'] == 8) ){
echo "<a class=\"$class\" type=\"button\" href=\"configuration_data.php\"> Configuration </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_affichage.php\"> Liste des clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"journal.php\"> Jounal de vente  </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_nombrekwh.php\" target=\"_blank\" > Kwh </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"re_nombreclient.php\"> Nombre des clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"coi_facturation_liste.php\"> Les penalités </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_rectification.php\"> Modification des Index </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"cov_rectification.php\"> Modification des penalités </a> " ;


}

// GESTION DES FACTURATION DES TRANSPORT  - rectification
if ( ($_SESSION['u_niveau'] == 9) ){
echo "<a class=\"$class\" type=\"button\" href=\"coi_facturation_liste.php\">  Les penalités </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_edit_modif_liste.php\">  Tansfert & Changement de nom </a> " ;
echo "<a class=\"$class3\" type=\"button\" href=\"re_edit_modif_liste_gaz.php\">  Suivi GAZ </a> " ;
}


// TI
if ($_SESSION['u_niveau'] == 10 ) {
echo "<a class=\"$class\" type=\"button\" class=\"glyphicon glyphicon-tasks\" href=\"xbackup.php\">  BACKUP </a>  ";
echo "<a class=\"$class\" type=\"button\" href=\"pc_enregistrement.php\"> Ajouter un PC </a>  ";
echo "<a class=\"$class\" type=\"button\" href=\"pct_taches_traite.php\"> Les taches realisées</a>  ";
echo "<a class=\"$class\" type=\"button\" href=\"pct_taches.php\"> Les taches  à faire </a>  ";
echo "<a class=\"$class\" type=\"button\" href=\"pct_taches_user.php\"> Taches par TI </a>  ";
}


// GESTION comptabilite
if ( ($_SESSION['u_niveau'] == 20) ){
echo "<a class=\"$class\" type=\"button\" href=\"compt_client.php\"> Clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"compt_fourniseur.php\"> Fourniseurs </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"compt_plan.php\"> Plan comptable </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"compt_depense_debiter_tva.php\"> Depenses </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"compt_recette_crediter_tva.php\"> Recettes </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"compt_rapport.php\"> Rapport </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"#\"> Documents comptables & Fiscaux </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"compt_rapport_suivi.php\"> Suivi des services </a> " ;
}


// GESTION COMMUNICATION
if ($_SESSION['u_niveau'] == 30) {
echo "<a class=\"$class\" type=\"button\" href=\"communication.php\"> Communication </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_affichage.php\"> Les clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sms_coupure.php\"> Alertes SMS  </a> " ;
}


// GESTION DES STOCK SERVICE APPROVISIONNEMENT
if ( ($_SESSION['u_niveau'] == 40) ){
echo "<a class=\"$class\" type=\"button\" href=\"app_caisse.php\"> Configuration date </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"app_gestionstok.php\"> Gestion de stock </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"app_gestionapprov.php\"> Gestion des commandes </a> ";
echo "<a class=\"$class\" type=\"button\" href=\"app_gestionapprov_backup.php\"> Gestion d'archives  </a> ";
}

// GESTION DES STOCK GAZ
if ( ($_SESSION['u_niveau'] == 41) ){
echo "<a class=\"$class\" type=\"button\" href=\"stk_client.php\"> Ajouter Client GAZ  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stk_vente_g.php\"> Vente produit </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stk_Rapport_gaz.php\"> Impression </a> ";
echo "<a class=\"$class\" type=\"button\" href=\"re_edit_modif_liste_gaz.php\">  Suivi GAZ </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stk_stock.php\"> Suivi du Stock </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stk_gaz_recapitulatif.php\"> Recapitulatif Gaz </a> " ;
}

// GESTION DES STOCK SERVICE BRANCHEMENT
if ( ($_SESSION['u_niveau'] == 42) ){
echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_devis.php\"> Devis à realiser </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_branch.php\"> Devis realisé </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_connecte.php\">  A Brancher </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_facture.php\">  A Facturer </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stk_vente.php\"> Vente  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stk_stock.php\"> Suivi du Stock </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_affichage.php\"> Les clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stk_Rapport.php\"> Les rapports </a> ";
}

// SERVICE Resp Commercial 
if ( ($_SESSION['u_niveau'] == 43) ){
echo "<a class=\"$class\" type=\"button\" href=\"sw_client.php\"> Gestion des Clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_recouvrement.php\"> Recouvrement </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_statistique.php\"> Statistiques </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_facture.php\">  Transfert à la  Facturation </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_niv43_modif.php\"> Gestion des modifications </a> " ;
}

// SERVICE CONTROLE 
if ( ($_SESSION['u_niveau'] == 44) ){
echo "<a class=\"$class\" type=\"button\" href=\"re_affichage_connecte.php\"> Mise à jours Brancher </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"plombage_compt.php\"> Plombage </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"plombage_controle.php\"> Contrôle </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"coi_facturation.php\"> Penalités (fraude) </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"client_demande_suvi.php\"> Demande de soutient</a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"coi_facturation_liste.php\"> Apercu des penalités </a> " ;
//echo "<a class=\"$class\" type=\"button\" href=\"cov_rectification.php\"> Modifications des Penalités </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"co_rectification.php\"> Modifications des Index </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_affichage.php\"> Chercher un client  </a> ";
}

// GESTION DES STOCK SERVICE MAGASIN
if ( ($_SESSION['u_niveau'] == 45) ){
echo "<a class=\"$class\" type=\"button\" href=\"app_produit_entre.php\"> Entre au Magain </a> ";
echo "<a class=\"$class\" type=\"button\" href=\"app_produit_sortie.php\"> Sortie au Magain </a> ";
echo "<a class=\"$class\" type=\"button\" href=\"app_produit_stock.php\"> Suivi du Stock Magasin  </a> ";
echo "<a class=\"$class\" type=\"button\" href=\"app_transfert_etape1.php\"> Transfert des Stocks   </a> ";
}


// COMPTE ADMINISTRATION COMMERCAIL
if ( ($_SESSION['u_niveau'] == 46) ){
echo "<a class=\"$class\" type=\"button\" href=\"sw_client.php\"> Gestion des Clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_recouvrement.php\"> Recouvrement </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_statistique.php\"> Statistiques </a> " ;
}


// SERVICE PERSONNEL
if ( ($_SESSION['u_niveau'] == 50) ){
echo "<a class=\"$class\" type=\"button\" href=\"rh_direction.php\"> Directions  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"rh_service.php\"> Services  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"rh_gestionrh.php\"> Ressources humaines  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"rh_gestionpaie.php\"> Gestion de paie  </a> " ;
}



// SERVICE PRODUCTION
if ( ($_SESSION['u_niveau'] == 70) ){
echo "<a class=\"$class\" type=\"button\" href=\"production.php\"> Production  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stat_tableau.php\"> Graphiques  </a> " ;
}

// SERVICE STATIQUE
if ( ($_SESSION['u_niveau'] == 80) ){
echo "<a class=\"$class\" type=\"button\" href=\"journal.php\"> Jounal de vente  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stat_filtre.php\">  Tableaux  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stat_tableau.php\"> Graphiques  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stat_traitement.php\"> Base des connaissances </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"stat_traitement_con_affichage.php\"> Gestion des Alertes </a> " ;
}



// SERVICE CONTROLE 
if ( ($_SESSION['u_niveau'] == 90) ){
echo "<a class=\"$class\" type=\"button\" href=\"sw_client.php\"> Gestion des Clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_recouvrement.php\"> Recouvrement </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_approvisionnement.php\">  Approvisionnement </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_comptable.php\"> Comptabilite </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_personnel.php\"> Ressources Humaines </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sw_statistique.php\"> Statistiques </a> " ;
}


// GESTION DES MT
if ( ($_SESSION['u_niveau'] == 91) ){
echo "<a class=\"$class\" type=\"button\" href=\"sw_clientR.php\"> Gestion des clients </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"journal.php\"> Jounal de vente  </a> " ;
}



if ( ($_SESSION['u_niveau'] != 0) and ($_SESSION['u_niveau'] != 104)){
echo "<a class=\"$class\" type=\"button\" href=\"client_anomalies.php\"> Déclarer un probleme </a>  ";
echo "<a class=\"$class\" type=\"button\" href=\"pc_affichage.php\"> Votre PC  </a>  ";
echo "<a class=\"$classi\" type=\"button\" href=\"chat_utilisateur.php\"> Messagerie:) </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"utilisateurs.php\"> Profil </a> " ;
}

if ( ($_SESSION['u_niveau'] != 0) and ($_SESSION['u_niveau'] != 104)){
$idss=md5(microtime()).$id_user;
echo "<a class=\"$class\" type=\"button\" href=\"deconnexion.php?id=$idss\"> Deconnexion </a>";
}

?>

<?
if ( ($_SESSION['u_niveau'] == 104) ){
echo "<nav class=\"navbar navbar-inverse\">";
echo "<ul class=\"nav navbar-nav\">";
echo "<li><a href=\"paiement.php\"> Paiment </a></li>";
echo "<li class=\"dropdown\"> <a href=\"#\">Facturé</a>";
echo "<ul>";
echo "<li><a class=\"$class\" type=\"button\" href=\"co_liste_factclient.php\"> Facturé </a> </li>" ;
echo "<li><a class=\"$class\" type=\"button\" href=\"co_liste_factNoclient.php\"> Non facturée </a> </li>" ;
echo "</ul>";
echo "</li>";

echo "<li class=\"dropdown\"> <a href=\"#\">Paiements</a>";
echo "<ul>";
echo "<li><a class=\"$class\" type=\"button\" href=\"paiement_Paye.php?st=E\"> Payé  </a></li>" ;
echo "<li><a class=\"$class\" type=\"button\" href=\"paiement_NPaye.php?st=E\"> Non payé </a> </li>" ;
echo "</ul>";
echo "</li>";

echo "<li class=\"dropdown\"> <a href=\"#\">Autres Facturation </a>";
echo "<ul>";
echo "<li><a class=\"$class\" type=\"button\" href=\"coi_facturation_liste.php\"> Les penalités </a></li> " ;
echo "<li><a class=\"$class\" type=\"button\" href=\"re_edit_modif_liste.php\"> TSF & NOm </a></li> " ;
echo "</ul>";
echo "</li>";

echo "<li><a  href=\"rapport.php\"> Rapport</a></li>";
echo "<li><a  href=\"pc_affichage.php\"> Votre PC </a></li>";
echo "<li><a  href=\"utilisateurs.php\"> Profil </a></li>";
echo "<li><a  href=\"deconnexion.php\"> Deconnexion </a></li>";
echo "</ul>";
echo "</nav>";
}
?>

