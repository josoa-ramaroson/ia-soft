<?	
		
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'eda';
		$dbbk='edabk';
		
	
		$link = mysql_connect ($host,$user,$pass);
		mysql_set_charset('utf8',$link);
		mysql_select_db($db);
		
		$linkibk = mysqli_connect($host,$user,$pass,$dbbk ) or die(mysqli_error($linkibk));
		mysqli_set_charset($linkibk, 'utf8');
		global $linkibk;
		
		
		//immigration vers Mysqli
		$linki=mysqli_connect($host,$user,$pass,$db) or die(mysqli_error($linki));
		mysqli_set_charset($linki, 'utf8');
		global $linki;
		
		
		//MENU_DEROULANTE_VILLE ET QUARTIER____
		try {
		$dbo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);
		} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
		}
		//°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°	
		
		/*
		
	    $sqfonc_para="SELECT * FROM  fonction_systeme ";
		$resultfonc_para=mysqli_query($linki,$sqfonc_para);
		$R_fonc_parametre=mysqli_fetch_array($resultfonc_para);
		
		$annee1_fon_para=$R_fonc_parametre['annee1'];
		$annee2_fon_para=$R_fonc_parametre['annee2'];  
		$date1_fon_para=$R_fonc_parametre['date1'];
		$date2_fon_para=$R_fonc_parametre['date2'];    
		$date3_fon_para=$R_fonc_parametre['date3'];
	
		$annee1A_fon_para=$R_fonc_parametre['annee1A'];
		$annee2A_fon_para=$R_fonc_parametre['annee2A'];
		$date1A_fon_para=$R_fonc_parametre['date1A'];
		$date2A_fon_para=$R_fonc_parametre['date2A'];
				
		$annee_fon_para=$R_fonc_parametre['annee'];             
		$annee_facturation_fon_para=$R_fonc_parametre['annee_facturation'];    
		$annee_recouvrement_fon_para=$R_fonc_parametre['annee_recouvrement'];   
		

		$annee1=$annee1_fon_para;
		$annee2=$annee2_fon_para;
		$date1=$date1_fon_para;
		$date2=$date2_fon_para;
		$date3=$date3_fon_para;
		
		$annee1A=$annee1A_fon_para;
		$annee2A=$annee2A_fon_para;
		$date1A=$date1A_fon_para;
		$date2A=$date2A_fon_para;
				
		$annee=$annee_fon_para;
		$annee_facturation=$annee_facturation_fon_para;
		$annee_recouvrement=$annee_recouvrement_fon_para;
		
		 //*/
		
		//°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°	
		
		//*
		
		$annee1="2018";
		$annee2="2024";             // changer en debut d annee ****------- 1
		
		$date1="2018-01-01";
		$date2="2024-12-31";        // changer en debut d annee ****------- 2
		
		$date3="2015-07-01"; // DATE CAISSE - SECURITE 
		
		$annee='2024';               // changer en debut d annee ****------- 3
		$annee_facturation='2024';   // changer en debut FACTURATION JANVIER 4
		$annee_recouvrement='2024';  // changer A PARTIR DE 15 FEVRIER       5
			
		
	    // gestion des dates pour les archives
		$annee1A="2015";
		$annee2A="2022";            // changer en MI- MARS  APRES ARCHIVAGE_ 6 
		$date1A="2015-07-01";
		$date2A="2022-12-31";       // changer en MI- MARS  APRES ARCHIVAGE  7
	
	    //*/
	
	    //°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°	
		
		$tbl_tarif="tarif";
		
		$tbl_client_doc="Client_document";
		$tbl_client_anom="client_anomalie";
		$tbl_client_anom_suivi="client_anomalie_suivi";
		
		$tbl_agence="a_agence"; 
		$tbl_utilisateur="utilisateur";
		$tbl_libelle="typelibelle";
		$tbl_contact="clienteda"; 
		//$tbl_contact1="contact"; // Table name
		//$tbl_compteur="compteur"; // Table name
		//$tbl_activite="activite"; // Table name
		$tbl_config="configuration"; // Table name
		$tbl_fact="billing"; // Table name
		$tbl_factsave="billingsave"; // Table name
		$tbl_saisie="billingsaisie"; // Table name
		$tbl_caisse="billcaisse"; // Table name
		$tbl_date="billdate"; // Table name
		$tbl_paiement="paiement"; // Table name
		$tbl_paiconn="pa_connection";
		$tbl_recact="recactivite";// RECTIVATION
		$tbl_plombage="plombage"; // Table name
		$tbl_recplomb="recaplomb";// RECTIVATION
		$tbl_plombcont="plombage_compt";// RECTIVATION
		$tbl_piece="type_piece";
		$tbl_client="type_client";

		$tbl_caisse_ver="bcaisse_ver";
		$tbl_caisse_lieu="bcaisse_lieu";
		
		$tbl_caisse_tmp='billcaisse_tmp';
		
		$tbl_app_caisse="app_caisse";   //-------Approvisionnement 
		$tbl_appaut="app_autorisation";
		$tbl_appdemande="app_demande";
		$tbl_appdeproduit="app_demandeproduit";
		$tbl_appbonachat="app_bonachat";
		$tbl_appbonachatp="app_bonachatproduit";
		$tbl_appachat="app_achat";
		$tbl_appcommande="app_commande";
		$tbl_appcoproduit="app_commandeproduit";

		$tbl_apppaiconn="app_connection";
		$tbl_apptransfert="app_transfert_vente";
		$tv_v_app_produit_type_menu="v_app_produit_type_menu"; // NOUVEAU
		$tv_v_menu_type_deroulant="v_menu_type_deroulant"; // NOUVEAU
		
		
		$tbl_appproduit_liste="app_produit_liste"; // NOUVEAU 
		$tbl_appproduit_entre="app_produit_entre"; // NOUVEAU
		$tbl_appproduit_sortie="app_produit_sortie"; // NOUVEAU
		$tv_appproduit_entre="V_app_produit_entre"; // NOUVEAU
		$tv_appproduit_sortie="V_app_produit_sortie"; // NOUVEAU
		$tv_appproduit_dedate="v_app_produit_dedate"; // NOUVEAU
		$tv_appproduit_dsdate="v_app_produit_dsdate"; // NOUVEAU
		$CONTRATN='RE_001_GC0032015';	

		$tbl_ville="ville";
		$tbl_ile="ile";
		

       //----------------------GESTION DE STOCK 
	   	$tbl_produit="ginv_produit"; // Table name
		$tbl_enreg="ginv_enreg"; // Table name
		$tbl_vente="ginv_vente"; // Table name
		$tbl_clientgaz="ginv_client";
		$CONSULTANT='BSC';
		
		//------------------VUE
		$tv_enreg="V_enreg"; // Table name
		$tv_vente="V_vente"; // Table name
		$tv_paiement="v_paiement"; // Table name
	    $tv_facturation="v_facturation"; // Table name
	
		$tbl_journal_audit="journal_audit";
		
		//production
		$tbl_production="prod_kwh";
		
		//client
		$tb_echangagent='vir_message';
		$tb_echangreponse='vir_reponse';
		
		//paiement bach
		$tbl_paiement_bach="paiement_bach";
		$tbl_paiement_bachtemp="paiement_bach_tempo";
		$tbl_paiement_bachserv="paiement_bach_serveur";
		$tbl_seq_transf="sequence_transfert";
  
		//relever bach
		$tbl_releve_bachserv="releve_bach_serveur";
		$tbl_releve_bachtemp="releve_bach_tempo";
		$tbl_releve_bach="releve_bach";
  
		
		//Role
		$tb_role_type='role_type';
		$tb_role_user='role_user';
		$tb_role_statut='role_statut';
		
		//-----------------------------------------------------------------------------------------
		
		//-----------parc informatique --------------
		$tbl_pc="pc_informatique";
		$tbl_pctaches="pc_taches"; // Table name
		
		//chat 
		$tbl_nombre="chat_nb";
		$tbl_message="chat_message";
	    $tbl_ind="chat_ind";
		
		
		//Communication
		$tbl_com="communication";
		
		
		//TABLE COMPTABILITER 
		$compte='compt_compte';
		$plan='compt_plan';
		$tb_comptcl='compt_client';
		$tb_comptf='compt_fourniseur';
		$tb_ecriture='compt_ecriture';
		$tb_comptconf='compt_config';
		
		
	
		//RESSOURCE HUMAINE
		$tb_rhdirection='rh_direction';
		$tb_rhservice='rh_service';
		$tb_rhpersonnel='rh_spersonnel';
		$tb_rhpaie='rh_spaie';
		$tb_rhconfig='rh_config';
		$tb_rhconge='rh_conge';
		$tb_rhconge_date='rh_conge_date';
		//$tauxsalaire='143';
		
		//-----------------------------------------------------------------------------------------
		
		//EMAIL - INFORMATION 
		 $emailinfo="edaanjouan@gmail.com";
		 
		//CALENDRIER
		$tb_evenement='evenement'; 
		
		//AUTRES TARIF
		$Police='7000';
		$changementdenom='15000';
		$transfert='7500';
		$transfertT='15000';
		$transfertMT='15000';
		$changementcompteur='30000';
		$changementcompteurT='122500';
		$changementcompteurMT='122500';
		$Activation='15000';
		
		date_default_timezone_set("Africa/Dar_es_Salaam");
		
		$securite='eda';
?>
