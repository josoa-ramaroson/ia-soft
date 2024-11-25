    <?
	require 'fonction.php';
	function compt_bilactif($Compte,$annee,$tb_ecriture){
	$sql = "SELECT SUM(TTC) AS TTC FROM $tb_ecriture where  Compte=$Compte and  YEAR(Date)=$annee and  mo='C' ";
	$resultat = mysql_query($sql) or exit(mysql_error()); 
	$nqt = mysql_fetch_assoc($resultat);

	if((!isset($nqt['TTC'])|| empty($nqt['TTC']))) { $qt=0; return $qt;}
	else {$qt=$nqt['TTC']; return $qt;}

	}	
	?>
    
    
    <?
	//$annee=$_REQUEST['annee'];
	//$anneecomptable='2015';

//CHARGES IMMOBILISÉES
//Frais d'établissement
$a201=compt_bilactif(201,$annee,$tb_ecriture);  $b1=$a201;
//Charges à répartir
$a202=compt_bilactif(202,$annee,$tb_ecriture);  $b2=$a202;
//Primes de remboursement des obligations
$a206=compt_bilactif(206,$annee,$tb_ecriture);  $b3=$a206;
//____________________________________________

//IMMOBILISATIONS INCORPORELLES
//Frais de recherche et de développement
$a211=compt_bilactif(211,$annee,$tb_ecriture);
$a2191=compt_bilactif(2191,$annee,$tb_ecriture); $b4=$a211+$a2191;
//--------------------
$a2811=compt_bilactif(2811,$annee,$tb_ecriture);
$a2919=compt_bilactif(2919,$annee,$tb_ecriture); $m4=$a2811+$a2919;


//Brevets, licences, logiciels
$a212=compt_bilactif(212,$annee,$tb_ecriture);
$a213=compt_bilactif(213,$annee,$tb_ecriture);
$a214=compt_bilactif(214,$annee,$tb_ecriture);
$a2913=compt_bilactif(2193,$annee,$tb_ecriture); $b5=$a212+$a213+$a214+$a2913;
//-------------------
$a2812=compt_bilactif(2812,$annee,$tb_ecriture);
$a2813=compt_bilactif(2813,$annee,$tb_ecriture);
$a2814=compt_bilactif(2814,$annee,$tb_ecriture);
$a2912=compt_bilactif(2912,$annee,$tb_ecriture);
$a2913=compt_bilactif(2913,$annee,$tb_ecriture);
$a2914=compt_bilactif(2914,$annee,$tb_ecriture);
$a2919=compt_bilactif(2919,$annee,$tb_ecriture); $m5=$a2812+$a2813+$a2814+$a2912+$a2913+$a2914+$a2919;


//Fonds commercial
$a215=compt_bilactif(215,$annee,$tb_ecriture);
$a216=compt_bilactif(216,$annee,$tb_ecriture);   $b6=$a215+$a216;
//-----------------------
$a2815=compt_bilactif(2815,$annee,$tb_ecriture);
$a2816=compt_bilactif(2816,$annee,$tb_ecriture);
$a2915=compt_bilactif(2915,$annee,$tb_ecriture);
$a2916=compt_bilactif(2916,$annee,$tb_ecriture); $m6=$a2815+$a2816+$a2915+$a2916;


//Autres immobilisations incorporelles
$a217=compt_bilactif(217,$annee,$tb_ecriture);
$a218=compt_bilactif(218,$annee,$tb_ecriture);
$a2198=compt_bilactif(2198,$annee,$tb_ecriture); $b7=$a217+$a218+$a2198;
//---- -------------
$a2817=compt_bilactif(2817,$annee,$tb_ecriture);
$a2818=compt_bilactif(2818,$annee,$tb_ecriture);
$a2917=compt_bilactif(2917,$annee,$tb_ecriture);
$a2918=compt_bilactif(2918,$annee,$tb_ecriture);
$a2919=compt_bilactif(2919,$annee,$tb_ecriture); $m7=$a2817+$a2818+$a2917+$a2918+$a2919;

//__________________________________________________
//IMMOBILISATIONS CORPORELLES
//Terrains
$a22=compt_bilactif(22,$annee,$tb_ecriture);  $b8=$a22;
//-----------
$a282=compt_bilactif(282,$annee,$tb_ecriture);
$a292=compt_bilactif(292,$annee,$tb_ecriture); $m8=$a282+$a292;



//Bâtiments
$a231=compt_bilactif(231,$annee,$tb_ecriture);
$a232=compt_bilactif(232,$annee,$tb_ecriture);
$a233=compt_bilactif(233,$annee,$tb_ecriture);
$a237=compt_bilactif(237,$annee,$tb_ecriture);
$a239=compt_bilactif(239,$annee,$tb_ecriture); $b9=$a231+$a232+$a233+$a237+$a239;
//------------------
$a2831=compt_bilactif(2831,$annee,$tb_ecriture);
$a2832=compt_bilactif(2832,$annee,$tb_ecriture);
$a2833=compt_bilactif(2833,$annee,$tb_ecriture);
$a2837=compt_bilactif(2837,$annee,$tb_ecriture);
$a2931=compt_bilactif(2931,$annee,$tb_ecriture);
$a2932=compt_bilactif(2932,$annee,$tb_ecriture);
$a2933=compt_bilactif(2933,$annee,$tb_ecriture);
$a2937=compt_bilactif(2937,$annee,$tb_ecriture);
$a2939=compt_bilactif(2939,$annee,$tb_ecriture); $m9=$a2831+$a2832+$a2833+$a2837+$a2931+$a2932+$a2933+$a2937+$a2939;


//Installations et agencements
$a234=compt_bilactif(234,$annee,$tb_ecriture);
$a235=compt_bilactif(235,$annee,$tb_ecriture);
$a238=compt_bilactif(238,$annee,$tb_ecriture);
$a239=compt_bilactif(239,$annee,$tb_ecriture); $b10=$a234+$a235+$a238+$a239;
//-----------
$a283=compt_bilactif(283,$annee,$tb_ecriture);
$a2939=compt_bilactif(2939,$annee,$tb_ecriture); $m10=$a283+$a2939;


//Matériel
$a24=compt_bilactif(24,$annee,$tb_ecriture);    $b11=$a24;
//--------------------
$a284=compt_bilactif(284,$annee,$tb_ecriture);
$a294=compt_bilactif(294,$annee,$tb_ecriture);  $m11=$a284+$a294;

//Matériel de transport
$a249=compt_bilactif(249,$annee,$tb_ecriture);
$a245=compt_bilactif(245,$annee,$tb_ecriture);
$a2495=compt_bilactif(2495,$annee,$tb_ecriture); $b12=$a249+$a245+$a2495;
//---------------------
$a294=compt_bilactif(294,$annee,$tb_ecriture);
$a2949=compt_bilactif(2949,$annee,$tb_ecriture);
$a2845=compt_bilactif(2845,$annee,$tb_ecriture);
$a2945=compt_bilactif(2945,$annee,$tb_ecriture);
$a2949=compt_bilactif(2949,$annee,$tb_ecriture); $m12=$a294+$a2949+$a2845+

//__________________________________________________
//AVANCES ET ACOMPTES VERSÉS SUR IMMOBILISATIONS
$a25=compt_bilactif(25,$annee,$tb_ecriture);   $b13=$a25;
$a295=compt_bilactif(295,$annee,$tb_ecriture); $m13=$a295;



//IMMOBILISATIONS FINANCIÈRES
//Titres de participation
$a26=compt_bilactif(26,$annee,$tb_ecriture);   $b14=$a26;
//-----------------
$a296=compt_bilactif(296,$annee,$tb_ecriture); $m14=$a296;

//Autres immobilisations financières
$a27=compt_bilactif(27,$annee,$tb_ecriture);   $b15=$a27;
//-----------------
$a297=compt_bilactif(297,$annee,$tb_ecriture); $m15=$a297;

//ACTIF CIRCULANT H.A.O.
$a85=compt_bilactif(285,$annee,$tb_ecriture);
$a86=compt_bilactif(286,$annee,$tb_ecriture);
$a88=compt_bilactif(288,$annee,$tb_ecriture); $b16=$a85+$a86+$a88;
//-----------------
$a498=compt_bilactif(498,$annee,$tb_ecriture); $m16=$a498;
//__________________________________________________
//STOCKS
//Marchandises
$a31=compt_bilactif(31,$annee,$tb_ecriture);
$a381=compt_bilactif(381,$annee,$tb_ecriture);
$a387=compt_bilactif(387,$annee,$tb_ecriture);   $b17=$a31+$a381+$a387;
//------------
$a391=compt_bilactif(391,$annee,$tb_ecriture);
$a3981=compt_bilactif(3981,$annee,$tb_ecriture); $m17=$a391+$a3981;

//Matières premières et autres approvisionnements

$a32=compt_bilactif(32,$annee,$tb_ecriture);
$a33=compt_bilactif(33,$annee,$tb_ecriture);
$a382=compt_bilactif(382,$annee,$tb_ecriture);
$a383=compt_bilactif(383,$annee,$tb_ecriture);
$a388=compt_bilactif(388,$annee,$tb_ecriture);   $b18=$a32+$a33+$a382+$a383+$a388;
//------------
$a392=compt_bilactif(392,$annee,$tb_ecriture);
$a393=compt_bilactif(393,$annee,$tb_ecriture);
$a398=compt_bilactif(398,$annee,$tb_ecriture);    $m18=$a392+$a393+$a398;


//En-cours Produits fabriqués
$a34=compt_bilactif(34,$annee,$tb_ecriture);
$a35=compt_bilactif(35,$annee,$tb_ecriture);    $b19=$a34+$a35;
//-----------------
$a394=compt_bilactif(394,$annee,$tb_ecriture);
$a395=compt_bilactif(395,$annee,$tb_ecriture);   $m19=$a394+$a395;


//Produits fabriqués
$a36=compt_bilactif(36,$annee,$tb_ecriture);
$a37=compt_bilactif(37,$annee,$tb_ecriture);
$a386=compt_bilactif(386,$annee,$tb_ecriture);
$a387=compt_bilactif(387,$annee,$tb_ecriture);  $b20=$a36+$a37+$a386+$a387;
//---------------
$a396=compt_bilactif(396,$annee,$tb_ecriture);
$a397=compt_bilactif(397,$annee,$tb_ecriture);
$a398=compt_bilactif(398,$annee,$tb_ecriture);  $m20=$a396+$a397+$a398;


//__________________________________________________
//CRÉANCES ET EMPLOIS ASSIMILÉS

//Fournisseurs avances versées
$a409=compt_bilactif(409,$annee,$tb_ecriture);   $b21=$a409;
//----------
$a490=compt_bilactif(490,$annee,$tb_ecriture);   $m21=$a490;

//Clients
$a41=compt_bilactif(41,$annee,$tb_ecriture);     $b22=$a41;
//-----
$a491=compt_bilactif(491,$annee,$tb_ecriture);   $m22=$a491;

//Autres créances
$a421=compt_bilactif(421,$annee,$tb_ecriture);
$a4287=compt_bilactif(4287,$annee,$tb_ecriture);
$a4387=compt_bilactif(4387,$annee,$tb_ecriture);
$a4449=compt_bilactif(4449,$annee,$tb_ecriture);
$a445=compt_bilactif(445,$annee,$tb_ecriture);
$a4487=compt_bilactif(4487,$annee,$tb_ecriture);
$a449=compt_bilactif(449,$annee,$tb_ecriture);
$a45=compt_bilactif(45,$annee,$tb_ecriture);
$a46=compt_bilactif(46,$annee,$tb_ecriture);
$a4711=compt_bilactif(4711,$annee,$tb_ecriture);
$a475=compt_bilactif(475,$annee,$tb_ecriture);
$a476=compt_bilactif(476,$annee,$tb_ecriture);   $b23=$a421+$a4287+$a4387+$a4449+$a445+$a4487+$a449+$a45+$a46+$a4711+$a475+$a476;
//-----------------
$a492=compt_bilactif(492,$annee,$tb_ecriture);
$a493=compt_bilactif(493,$annee,$tb_ecriture);
$a495=compt_bilactif(495,$annee,$tb_ecriture);
$a496=compt_bilactif(496,$annee,$tb_ecriture);
$a497=compt_bilactif(497,$annee,$tb_ecriture);  $m23=$a492+$a493+$a495+$a496+$a497;
//__________________________________________________
//TRÉSORERIE-ACTIF

//Titres de placement
$a50=compt_bilactif(50,$annee,$tb_ecriture);   $b24=$a50;
//----------------
$a590=compt_bilactif(590,$annee,$tb_ecriture); $m24=$a590;

//Valeurs à encaisser

$a51=compt_bilactif(51,$annee,$tb_ecriture);   $b25=$a51;
//----------------
$a591=compt_bilactif(591,$annee,$tb_ecriture); $m25=$a591;


//Banques, chèques postaux, caisse

$a52=compt_bilactif(52,$annee,$tb_ecriture);
$a53=compt_bilactif(53,$annee,$tb_ecriture);
$a54=compt_bilactif(54,$annee,$tb_ecriture);
$a57=compt_bilactif(57,$annee,$tb_ecriture);
$a581=compt_bilactif(581,$annee,$tb_ecriture);
$a582=compt_bilactif(582,$annee,$tb_ecriture);  $b26=$a52+$a53+$a54+$a57+$a581+$a582;
//----------------
$a592=compt_bilactif(592,$annee,$tb_ecriture);
$a593=compt_bilactif(593,$annee,$tb_ecriture);
$a594=compt_bilactif(594,$annee,$tb_ecriture); $m26=$a592+$a593+$a594;

//__________________________________________________
//Écarts de conversion-Actif
$a478=compt_bilactif(478,$annee,$tb_ecriture); $b27=$a478;



?>
