<?
$class='btn btn-primary';
$class2='btn btn-success';
$class3='btn btn-warning';
$class4='btn btn-info';
$class5='btn btn-default';

if (($_SESSION['u_niveau'] == 5) ){
echo "<a class=\"$class\" type=\"button\" href=\"utilisateur.php\"> Ajouter un employe </a> ";
}
// GESTION DES PAIEMENTS 
if ( ($_SESSION['u_niveau'] == 4) ){
echo "<a class=\"$class\" type=\"button\" href=\"paiement.php\"> Paiment </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"so_liste_factclient.php\"> Facturé </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"so_liste_factNoclient.php\"> Non facturée </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"paiement_Paye.php?st=S\"> Payé  </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"paiement_NPaye.php?st=S\"> Non payé </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sv_liste_factclient.php\"> Facturé  (Transport)</a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sv_liste_factNoclient.php\"> Non facturée (Transport) </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"paiement_Paye.php?st=T\"> Payé (Transport) </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"paiement_NPaye.php?st=T\"> Non payé (Transport) </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"rapport.php\"> Rapport d'activité </a> ";
}

// GESTION DES FACTURATION DES TRANSPORT 
if ( ($_SESSION['u_niveau'] == 3) ){
echo "<a class=\"$class\" type=\"button\" href=\"sv_facturation.php\"> Facturation Transport </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sv_affichage.php\"> Liste des client </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sv_liste_factclient.php\">  Facturé </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sv_liste_factNoclient.php\"> Non Facturé </a> " ;
}

// GESTION DES FACTURATION DES ACTIVITES 
if ( ($_SESSION['u_niveau'] == 2) ){
echo "<a class=\"$class\" type=\"button\" href=\"so_facturation.php\"> Facturation Activité </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"so_affichage.php\"> Liste des client </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"so_liste_factclient.php\">  Facturé </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"so_liste_factNoclient.php\">  Non Facturé </a> " ;
}


// GESTION DES CLIENTS 
if ( ($_SESSION['u_niveau'] == 1) ){
echo "<a class=\"$class\" type=\"button\" href=\"re_enregistrement.php\"> Ajouter un client </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"re_affichage.php\"> Afficher les clients </a> " ;

}
if ( ($_SESSION['u_niveau'] != 0) ){
echo "<a class=\"$class\" type=\"button\" href=\"utilisateurs.php\"> Utilisateurs</a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"deconnexion.php\"> Deconnexion </a>";
}

if ( ($_SESSION['u_niveau'] == 0) ){
echo "<a class=\"$class\" type=\"button\" href=\"so_affichage_user.php?id=$idc\"> societe </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"sv_affichage_user.php?id=$idc\"> Transport </a> " ;
echo "<a class=\"$class\" type=\"button\" href=\"deconnexion.php\"> Deconnexion </a>";

}

?>
<?
echo "<nav class=\"navbar navbar-inverse\">";
echo "<ul class=\"nav navbar-nav\">";
echo "<li><a href=\"paiement.php\"> Paiment </a></li>";
echo "<li class=\"dropdown\"> <a href=\"#\">Activité</a>";
echo "<ul>";
echo "<li><a class=\"$class\" type=\"button\" href=\"so_liste_factclient.php\"> Facturé </a> </li>" ;
echo "<li><a class=\"$class\" type=\"button\" href=\"so_liste_factNoclient.php\"> Non facturée </a> </li>" ;
echo "<li><a class=\"$class\" type=\"button\" href=\"paiement_Paye.php?st=S\"> Payé  </a> </li>" ;
echo "<li><a class=\"$class\" type=\"button\" href=\"paiement_NPaye.php?st=S\"> Non payé </a> </li>" ;
echo "</ul>";
echo "</li>";
echo "<li class=\"dropdown\"> <a href=\"#\">Transport</a>";
echo "<ul>";
echo "<li><a class=\"$class\" type=\"button\" href=\"sv_liste_factclient.php\"> Facturé </a>  </li>" ;
echo "<li><a class=\"$class\" type=\"button\" href=\"sv_liste_factNoclient.php\"> Non facturée </a> </li>" ;
echo "<li><a class=\"$class\" type=\"button\" href=\"paiement_Paye.php?st=T\"> Payé  </a></li>" ;
echo "<li><a class=\"$class\" type=\"button\" href=\"paiement_NPaye.php?st=T\"> Non payé </a> </li>" ;
echo "</ul>";
echo "</li>";
echo "<li><a  href=\"rapport.php\"> Rapport d'activité </a></li>";
echo "<li><a  href=\"deconnexion.php\"> Deconnexion </a></li>";
echo "</ul>";
echo "</nav>";
?>