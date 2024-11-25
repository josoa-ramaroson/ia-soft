<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
span.surlign1{font-style:italic; background-color:#ffff00;}
span.surlign2{font-style:italic; background-color:#ff99FF;}
span.surlign3{font-style:italic; background-color:#ff9999;}
span.surlign4{font-style:italic; background-color:#9999FF;}
body {
	background-image: url(images/bg.jpg);
	background-color: #FFF;
}
body,td,th {
	color: #000;
}
</style>
<title>Document sans titre</title>
</head>
<?
require 'bienvenue.php';    // on appelle la page contenant la fonction
require 'configuration.php';
$anneec=$annee_recouvrement;

?>
<body>
<table width="98%" border="0">
  <tr>
    <td width="55%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Rechercher par : Id_Client,Ville, Quartier, Nom , Tel , Adresse, Police</h3>
        </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form name="form1" method="post" action="coupure_releveur.php">
                  <label for="mr1"></label>
                  <input name="mr1" type="text" id="mr1" size="30">
                  <input type="submit" name="Cherchez " id="Cherchez " class="btn btn-sm btn-default"value="Chercher">
                  </form></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>
    </div></td>
    <td width="45%">&nbsp;</td>
  </tr>
</table>
<p>
  <?php
if (isset($_REQUEST['mr1']))
{
$mr1=addslashes($_REQUEST['mr1']);
$s=explode(" ",$mr1);

$sql = "SELECT count(*) FROM $tbl_contact";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 2; 


$sql = "SELECT * FROM $tbl_fact f, $tbl_contact c where  f.fannee='$anneec' and f.st='E' and nserie='$nserie' and c.id=f.id and idf NOT IN(SELECT idf FROM $tbl_paiement where YEAR(date)='$anneec') and ( "; 

foreach($s as $mot) {
        			 if (strlen($mot)>0)

	$sql.="nomprenom like '%".$mot."%' OR tel like '%".$mot."%' OR adresse like '%".$mot."%' OR ville like '%".$mot."%' OR quartier like '%".$mot."%' OR c.id  like '%".$mot."%' OR c.Police  like '%".$mot."%' OR "; 
					
					}
//$sql.=" 0 ORDER BY raisonsociale ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  

$sql.=" 0 )  ORDER BY nomprenom ASC ";  

$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="9%" align="center"><font color="#FFFFFF" size="4"><strong>ID_client</strong></font></td>
     <td width="12%" align="center"><strong><font color="#FFFFFF" size="4">Ville</font></strong></td>
     <td width="13%" align="center"><font color="#FFFFFF" size="4"><strong>Quartier</strong></font></td>
     <td width="18%" align="center"><font color="#FFFFFF" size="3"><strong>Nom du client</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Montant TTC</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>ORTC</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Impayee</strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF"><strong>Droit remise</strong></font></td>
     <td width="8%" align="center"><font color="#FFFFFF"><strong>Total net</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Suivi </strong></font></td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 

$nomprenom=$data['nomprenom'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $nomprenom = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$nomprenom);
	 }
	 }
	 
	 
	$tel=$data['tel'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $tel = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$tel);
	 }
	 }
	 
	$ville=$data['ville'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $ville = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$ville);
	 }
	 }
	 
	$quartier=$data['quartier'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $quartier = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$quartier);
	 }
	 }
	 
	$id=$data['id'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $id = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$id);
	 }
	 }
	 
	$adresse=$data['adresse'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $adresse = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$adresse);
	 }
	 }
	 
?>
   <tr bgcolor="<? gettatut($data['bstatut']); ?>">
     <td align="center" ><em><? echo $data['id'];?></em></td>
     <td align="center" ><em><? echo $data['ville'];?></em></td>
     <td align="center" ><em><? echo $data['quartier'];?></em></td>
     <td align="center" ><em><? echo $data['nomprenom'];?></em></td>
     <td align="center" ><em><? echo $data['totalttc'];?></em></td>
     <td align="center" ><em><? echo $data['ortc'];?></em></td>
     <td align="center" ><em><? echo $data['impayee'];?></em></td>
     <td align="center" ><em><? echo $data['Pre'];?></em></td>
     <td align="center" ><em><? echo $data['totalnet'];?></em></td>
     <td align="center" ><em>
     
             <? if ($data['bstatut']!='couper' ) {?>
        
        <a href="coupure_releveur_save.php?idf=<? echo md5(microtime()).$data['idf']; ?>&mr1=<? echo $mr1; ?>&bstatut=couper" class="btn btn-danger"> COUPER </a>
        <? } else { echo $data['bstatut']; } ?> 
     
     
     </em></td>
   </tr>
   <?php
}
mysql_free_result ($req); 
   //echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close (); 
}
else {
echo " Pas de recherche <br>";
} 
				  function gettatut($fetat){
				  if ($fetat=='remise')         { echo $couleur="#fdff00";}//jaune	
				  if ($fetat=='couper')         { echo $couleur="#ec9b9b";}//rouge -Declined
				  if ($fetat=='retard')         { echo $couleur="#ffc88d";}//orange 		 
				 //if ($fetat=='enregistre')    { echo $couleur="#87e385";}//jaune	
				 //if ($fetat=='confirme')      { echo $couleur="#87e385";}//vert fonce
				 //if ($fetat=='transfert')     { echo $couleur="#fdff00";}//jaune
				// if ($fetat=='réservation')   { echo $couleur="#ffc88d";}//orange 
				// if ($fetat=='Annuler')       { echo $couleur="#ec9b9b";}//orange
				  }
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>