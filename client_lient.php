<img src="images/eda.png" width="249" height="97" />
<p>
<?
$class='btn btn-primary';
$class2='btn btn-success';
$class3='btn btn-warning';
$class4='btn btn-info';
$class5='btn btn-default';
$cr=md5(microtime());
echo " <a class=\"$class\" type=\"button\" href=\"co_user.php?id=$cr$idc\"> Espace client </a> " ;
echo " <a class=\"$class\" type=\"button\" href=\"client_fact.php?idr=$cr$idc&nc=$nomclient\"> Envoyer votre Index </a> ";
echo " <a class=\"$class\" type=\"button\" href=\"client_compt.php?idr=$cr$idc&nc=$nomclient\"> Specifier un virement  </a> ";
echo " <a class=\"$class\" type=\"button\" href=\"client_controle.php?idr=$cr$idc&nc=$nomclient\"> Signaler une panne  </a> ";
echo " <a class=\"$class\" type=\"button\" href=\"client_demande.php?idr=$cr$idc&nc=$nomclient\"> Suivi de vos demandes  </a> ";
echo " <a class=\"$class\" type=\"button\" href=\"deconnexion.php\"> Deconnexion </a> " ;
?>
</p>