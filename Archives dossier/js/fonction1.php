<?	
		
		$host = 'localhost';
		$user = 'websit77_boltoso';
		$pass = 'arivaldo';
		$db = 'websit77_boltorevn';
		
	
		$link = mysql_connect ($host,$user,$pass);
		mysql_set_charset('utf8',$link);
		mysql_select_db($db);
		
		//MENU_DEROULANTE_VILLE ET QUARTIER____
		try {
		$dbo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);
		} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
		}
		//°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°	
		
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
		$tbl_paiement="paiement"; // Table name
		$tbl_recact="recactivite";// RECTIVATION
		$tbl_plombage="plombage"; // Table name
		$tbl_recplomb="recaplomb";// RECTIVATION
		

		$tbl_ville="ville";
		$tbl_ile="ile";
		$annee1="2015";
		$annee2="2017";
		$date1="2014-07-13";
		$date2="2017-12-31";
		
		
		//-------------- paiement_save page
		$annee='2015';


       //----------------------GESTION DE STOCK 
	   	$tbl_produit="ginv_produit"; // Table name
		$tbl_enreg="ginv_enreg"; // Table name
		$tbl_vente="ginv_vente"; // Table name
		$tv_enreg="V_enreg"; // Table name
		$tv_vente="V_vente"; // Table name

	
	   	//-----------parc informatique --------------
		$tbl_pc="pc_informatique";
		$tbl_pctaches="pc_taches"; // Table name
		
		//chat 
		$tbl_nombre="chat_nb";
		$tbl_message="chat_message";
	    $tbl_ind="chat_ind";
		
		//EMAIL - INFORMATION 
		 $emailinfo="melmarouf@hotmail.com";
		 
		//AUTRES TARIF
		$changementdenom='5000';
		$transfert='15000';
		
?>
