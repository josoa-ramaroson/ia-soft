<?php 
if ($_SESSION['u_langage']=='Français')
{
//menu_________________________________
$l_agence='Agences';
$l_employes='Employes';
$l_tarifs='Tarifs';
$l_depart='Creer un depart';
$l_rapport='Rapport d activité';
$l_reservation='Reservations';
$l_paiement='Paiments';
$l_archives='Archives Vols';
$l_enregistrement='Enregistrement';
$l_utilisateurs='Utilisateurs';
$l_messagerie='Messagerie :)';
$l_deconnexion='Deconnexion';
//Agence_________________________________

$l_libelle_agence='Ajouter une agence';
$l_libelle_agencemodifie='Modifier une agence';
$l_nom_agence='Nom de l agence';
$l_Adresse='Adresse';
$l_telephone='Telephone';
$l_Statut='Statut';
$l_Enregistrer='Enregistrer';
$l_Modifier='Modifier';
$l_Supprimer='Supprimer';
$l_miseajours='Valider votre modification';

//Employee_________________________________

$l_libelle_employee='Ajouter un utilisateur ';
$l_libelle_employeem='Modifier  un utilisateur ';
$l_Nom='Nom';
$l_Prenom='Prénom';
$l_Email='Email';
$l_Titre='Titre';
$l_Mobile='Mobile';
$l_Langage='Langage';
$l_Login='identification';
$l_pwd='Mot de passe';
$l_Niveau='Niveau';


//Tarification_________________________________
$l_libelle_tarif='Tarification';
$l_libelle_tarifm='Modification des Tarifications';
$l_Départ='Départ';
$l_Destination='Destination';
$l_Adulte='Adulte';
$l_Enfant='Enfant ';
$l_Bébé='Bébé';
$l_Allez_simple='Prix Allez - simple';
$l_Allez_retour='Prix Allez - retour';

//Depart _________________________________
$l_libelle_depart='Ajouter un départ ';
$l_libelle_departm='Modification un départ';
$l_vDépart='Ville de départ';
$l_vDestination='Ville de destination';
$l_Nplace='Nombre de place';
$l_Nbloque='Nb  bloque';
$l_Nvendu='Nb vendus';
$l_Nreservé='Nb reservés';
$l_Ndisponible='Disponibles';
$l_ddepart='Date de départ ';
$l_hdepart='Heure de départ';
$l_nvols='N° Vols';
$l_nstate="Etat d'evolution";

$l_Date='Date';
$l_heures='Heures';
$l_heure='heures';
$l_minutes='minutes';
$l_changer_ev1="Changez l'état d'évolution des départs";
$l_changer="Change";
//Rapport _________________________________
$l_Activitedate="Activité par date";
$l_Activitemois="Activité par mois";
$l_Activiteannee="Activité par annee";
$l_Activiteagent="Activité par agent";
$l_Paiements='Paiements';
$l_Rembourssement='Rembourssement';
$l_total='Total';
$l_valider='valider';
$l_date='Date';
$l_mois='Mois';
$l_annee='Année';
//Reseravation _________________________________
$l_libelle_reserv='Optimiser vos choix de recherche ';
$l_passager='passager';
$l_recherche='Chercher';



//Vente __________________________________________

$l_lib_vol='Information du vol';
$l_lib_inf='Information des enregistrements';
$l_lib_tarif='Information complementaire (Tarif)';
$l_lib_passager='Enregistre un passager';
$l_lib_liste='liste des passagers';
$l_lib_annuller='Annuler une reservation';
$l_lib_transfertg='Transfert un client dans un autre date gratuitement';
$l_lib_transfert50='Transfert un client dans un autre date avec penalité de 50% du trajet';
$l_lib_transaeroport="Transfert la liste des passagers à l'aéroport pour prépare l'embarquement";
$l_reserver='Reserver';
$l_transfertclient='Transfert le client';
$l_transfertaeroport='Transfert vers aeroport';
$l_carte='N° carte/NPasseport';
$l_Typepassager='Type passager';
$l_choixbillet='Choix du billet';
$l_id='Id';
$l_Typebillet='Type billet';
$l_Suivi='Suivi';
$l_ArchiverVol='Archiver le Vol';
$l_validerenregistrement='Valider Enregistrement';
$l_afficherdetail='Afficher les detail';
$l_detailenregist='Detail enregistrement';



//Paiement _________________________________
$l_libelle_paiement1='Etape 1 Paiement';
$l_libelle_paiement2='Etape 2 Paiement';
$l_libelle_rembours1='Etape 1 Rembourssement';
$l_libelle_rembours2='Etape 2 Rembourssement';
$l_idreservation='Id reservation';
$l_Lespaiements='Les paiements'; 
$l_NPaiement='N°Paiement';
$l_Type='Type';
$l_NFacture='N°Facture';
$l_Vendeur='Vendeur';
$l_Montant='Montant';
$l_Modalité='Modalité';
$l_Reference='Reference';
$l_Agence='Agence';
$l_Nomdupassager='Nom du passager';
$l_Nbillet='N° billet';
$l_Dateretour='Date retour';  
$l_Datedepaiement='Date de paiement';
$l_Paiement='Paiement';
$l_Rembourser='Rembourser';
$l_allez='Allez';
$l_retour='Retour';
$l_allezretour='Allez - Retour';

//Archive vols _________________________________

//Enregistrement 
$l_libelle_aeroport="Enregistrement des passagers à l'aeroport";

//___utilisateur parametre ainsi que chant 
$l_libelle_utili='Les utilisateurs';
$l_libelle_changer='Changement du mot de passe';
$l_libelle_changerlangage='Choisir votre langue';
$l_apwd='Ancien Mot de passe';
$l_Npwd='Nouveau Mot de passe';
$l_libelle_formation="Formation (Cliquez sur le PDF pour prendre connaissance du fonctionnement de l'application)";

//___Chat

$l_envoiemessage='Envoyer un message';
$l_dialogue='Vous dialoguez à ';
$l_envoie='Envoyer';
$l_effacer='Effacer';

}
else
{
//menu_________________________________
$l_agence='Agencies';
$l_employes='Employees';
$l_tarifs='Price';
$l_depart='Create a departure';
$l_rapport='Activity report';
$l_reservation='Reservations';
$l_paiement='Payment';
$l_archives='Flights archives';
$l_enregistrement='Check In';
$l_utilisateurs='Users';
$l_messagerie='Messaging:)';
$l_deconnexion='Log out';
//Agence_________________________________

$l_libelle_agence='Add an agency';
$l_libelle_agencemodifie='Edit agency';
$l_nom_agence='Name of agency';
$l_Adresse='Address';
$l_telephone='Phone';
$l_Statut='Status';
$l_Enregistrer='Save';
$l_Modifier='Change';
$l_Supprimer='Remove';
$l_miseajours='Confirm your change';

//Employee_________________________________

$l_libelle_employee='Add User';
$l_libelle_employeem='Edit User';
$l_Nom='Last Name';
$l_Prenom='First Name';
$l_Email='Email';
$l_Titre='Title';
$l_Mobile='Mobile';
$l_Langage='language';
$l_Login='Login';
$l_pwd='Password';
$l_Niveau='level';




//Tarification_________________________________
$l_libelle_tarif='Price';
$l_libelle_tarifm=' Edit price';
$l_Départ='Departure';
$l_Destination='Destination';
$l_Adulte='Adult';
$l_Enfant='child';
$l_Bébé='Baby';
$l_Allez_simple='Price One-way';
$l_Allez_retour='Price Round-trip';

//Depart _________________________________
$l_libelle_depart='Add a departure ';
$l_libelle_departm='Edit a departure';
$l_vDépart='Departure city';
$l_vDestination='City of destination';
$l_Nplace='Nb of seats';
$l_Nbloque='Nb blocks';
$l_Nvendu='Nb Sold';
$l_Nreservé=' Nb reserved';
$l_Ndisponible='Nb available';

$l_ddepart='Check-out ';
$l_hdepart='Departure time';
$l_nvols='N° flights';
$l_nstate='State of evolution';

$l_Date='Date';
$l_heures='Time';
$l_heure='hours';
$l_minutes='minutes';
$l_changer_ev1="Change the evolution of departures";
$l_changer="Change";


//Rapport _________________________________
$l_Activitedate="Activity by date";
$l_Activitemois="Activity by Month";
$l_Activiteannee="Activity year";
$l_Activiteagent="Activity by agent";
$l_Paiements='Payments';
$l_Rembourssement='Rembourssement';
$l_total='Total';
$l_valider='validate';
$l_date='Date';
$l_mois='Month';
$l_annee='Year';


//Reseravation _________________________________
$l_libelle_reserv='Optimize your search';
$l_passager='Passenger';
$l_recherche='Search';



//Vente __________________________________________

$l_lib_vol='Flight Information';
$l_lib_inf='Record information';
$l_lib_tarif='Supplementary Information (Tariff)';
$l_lib_passager='Saves a passenger';
$l_lib_liste='Passenger List';
$l_lib_annuller='Cancel reservation';
$l_lib_transfertg='Transfer a customer in another day (free) ';
$l_lib_transfert50='Transfer a customer in a another date with penalty fee of 50% ';
$l_lib_transaeroport="Transfer the list of passengers at the airport prepares for boarding";
$l_reserver='Booking';
$l_transfertclient='Transfer customer';
$l_transfertaeroport='Transfer to airport';
$l_carte='ID card / NPasseport';
$l_Typepassager='Type passenger';
$l_choixbillet='Choice of ticket';
$l_id='Id';
$l_Typebillet='Type ticket';
$l_Suivi='Follow up';
$l_ArchiverVol='Archive Flight';
$l_validerenregistrement='Confirm Registration';
$l_afficherdetail='Show detail';
$l_detailenregist='Detail recording';







//Paiement _________________________________
$l_libelle_paiement1='Step 1 Payment';
$l_libelle_paiement2='Step 2 Payment';
$l_libelle_rembours1='Step 1 Rembourssement';
$l_libelle_rembours2='Step 2 Rembourssement';
$l_idreservation='Id booking';
$l_Lespaiements='Payments'; 
$l_NPaiement='No Payment';
$l_Type='Type';
$l_NFacture='No. Invoice';
$l_Vendeur='seller';
$l_Montant='Amount';
$l_Modalité='Modality';
$l_Reference='Reference';
$l_Agence='Agency';
$l_Nomdupassager='Passenger name';
$l_Nbillet='No tickets';
$l_Dateretour='Return Date';  
$l_Datedepaiement='Date of payment'; 
$l_Paiement='Payment';
$l_Rembourser='Repay';
$l_allez='way';
$l_retour='Return';
$l_allezretour='Round-trip';

//Archive vols _________________________________

//Enregistrement 
$l_libelle_aeroport="Passenger check at airport";

//___utilisateur parametre ainsi que chant 
$l_libelle_utili='Users';
$l_libelle_changer='Change password';
$l_libelle_changerlangage='Choose your language';
$l_apwd='Old Password';
$l_Npwd='New Password';
$l_libelle_formation="Formation (Click on the PDF to learn about the implementation of the Web Application)";


$l_envoiemessage='Send a message';
$l_dialogue='You interact with';
$l_envoie='Send';
$l_effacer='Clear';


}

?>
