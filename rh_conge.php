<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';
?>
<?
	if((($_SESSION['u_niveau'] != 50) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>

<html>
<head>
<style type="text/css">
.centre {
	font-weight: bold;
	font-size: 36px;
}
.centre {
	text-align: center;
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<p>
 <?php
$sql = "SELECT count(*) FROM $tb_rhpersonnel where statut='Operationnel'";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM  $tb_rhpersonnel where statut='Operationnel' ORDER BY matricule ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

	//recherche du repport  
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Affichez les congés  par mois</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><form action="rh_conge_mois.php" method="post" name="form1" id="form1">
          Mois: <font color="#000000">
            <select name="mois" size="1" id="mois">
              <option value="1">Janvier</option>
              <option value="2">Février</option>
              <option value="3">Mars</option>
              <option value="4">Avril</option>
              <option value="5">Mai</option>
              <option value="6">Juin</option>
              <option value="7">Juillet</option>
              <option value="8">Août</option>
              <option value="9">Septembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>
            </select>
            </font><font color="#000000">
              <select name="annee" size="1" id="annee">
                <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
              </select>
              </font>
          <input type="submit" name="valider4" id="valider5" value="Valider" />
        </form></td>
      </tr>
    </table>
  </div>
</div>
<p class="centre">Suivi des planifications  pour l'année  <? echo $anneepaie;?> . Cliquez ici pour filtrer la liste  <a href="rh_conge_restant.php">&gt;&gt;</a></p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="8%" align="center"><font color="#FFFFFF" size="4"><strong>Matricule </strong></font></td>
      <td width="16%" align="center"><font color="#FFFFFF" size="3"><strong>Direction </strong></font></td>
      <td width="16%" align="center"><font color="#FFFFFF" size="3"><strong>Service </strong></font></td>
     <td width="32%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
     <td width="15%" align="center"><strong><font color="#FFFFFF">Annee</font></strong></td>
     <td width="13%" align="center">&nbsp;</td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
$idrh=$data['idrhp'];
?>
   <tr bgcolor="<? gettatut(stat_eda3($tb_rhconge, $anneepaie, $idrh)); ?>">
     <td height="33" align="center"><em><? echo $data['matricule'];?></em></td>
     <td height="33" ><em><? echo $data['direction'];?></em></td>
     <td height="33" ><em><? echo $data['service'];?></em></td>
     <td align="center"><div align="left"><em><? echo $data['nomprenom'];?></em></div></td>
     <td align="center" ><em><? echo $anneepaie;?></em></td>
     <td align="center" bgcolor="#FFFFFF">
     <? if ($_SESSION['u_niveau']==50){?>
     <a href="rh_conge_save.php?id=<? echo md5(microtime()).$data['idrhp']; ?>&@i=<? echo md5(microtime()).$id_nom; ?>" class="btn btn-sm btn-success" >Enregistre </a>
     <?php } else {} ?>
     </td>
   </tr>
   <?php
}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat); 


		function stat_eda3($tb_rhconge, $anneepaie, $idrh){ 
		$sqlv="SELECT COUNT(*) AS nombre FROM $tb_rhconge  WHERE idrh='$idrh'  and anneeconge='$anneepaie'" ;
        $rev = mysql_query($sqlv); 
	    $nqtv = mysql_fetch_array($rev);
        if((!isset($nqtv['nombre'])|| empty($nqtv['nombre']))) { $qt=''; return $qt; } else {$qt=$nqtv['nombre']; return $qt;}
		} 
		
		function gettatut($fetat){
		if ($fetat>0) { echo $couleur="#87e385";} else { echo $couleur="#FFFFFF";}//vert
		}
		 
mysql_close ();  
?>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="21"><?php
include_once('pied.php');
?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>