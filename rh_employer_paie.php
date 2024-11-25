<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require 'rh_configuration_fonction.php';
?>
<?
if(($_SESSION['u_niveau'] != 50)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<table width="100%" border="0">
   <tr>
     <td width="42%"><span class="panel-body">
       <?php
                $llErreur = false;
                if (isset($_GET["b"]))
                $llErreur = true;
                ?>
     </span></td>
     <td width="13%">&nbsp;</td>
     <td width="6%">&nbsp;</td>
     <td width="39%"><div class="panel panel-danger">
       <div class="panel-heading">
         <h3 class="panel-title">Modifications d'un bulletin <? echo $affichemois.' '.$anneepaie ; ?></h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="52%"><form name="form1" method="post" action="rh_employer_paie_user.php">
                   <label for="mr1"></label>
                   <input name="mr1" type="text" id="mr1" size="30">
                   <input type="submit" name="Cherchez " id="Cherchez " class="btn btn-sm btn-default"value="Chercher par Matricule">
                 </form></td>
               </tr>
             </table></td>
           </tr>
         </table>
       </div>
     </div></td>
   </tr>
 </table>
<div id="error" class="boiteorange" style="display:<?php if ($llErreur){echo "block";}else{echo "none";}?>;width:300px;">
  <p style="color:#F00" align="center">IL Y A ERREUR </p>
</div>
<p>
   <?php

$sql = "SELECT count(*) FROM $tb_rhpersonnel where statut='Operationnel' and idrhp NOT IN(SELECT idrh FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie')";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 1; 
$sql = "SELECT * FROM  $tb_rhpersonnel where statut='Operationnel' and idrhp NOT IN(SELECT idrh FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie') ORDER BY matricule ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

	//recherche du repport 
?>
 </p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <?php
while($datam=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
   
     <td width="47%" align="center" bgcolor="#FFFFFF"><form name="form1" method="post" action="rh_employer_paie_save.php">
     
     <div class="panel panel-primary">
  <div class="panel-heading"><h3 class="panel-title">Informations personnelles de l'employés
    </h3>
  </div>
  <div class="panel-body">
    
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="18%"><span class="panel-title">
            <input name="id" type="hidden" id="id" value="<? echo $datam['idrhp']; ?>" />
            <font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
            </font></strong></font></strong></font></span></td>
          <td width="2%">&nbsp;</td>
          <td width="30%">&nbsp;</td>
          <td width="3%">&nbsp;</td>
          <td width="22%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          </tr>
        <tr>
          <td><strong><font size="2">Designation</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="Designation" type="text" class="form-control" id="Designation" value="<? echo $datam['Designation'];?>" size="10" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Matricule</font></strong></td>
          <td><strong>
            <input name="matricule" type="text" class="form-control" id="matricule" value="<? echo $datam['matricule'];?>" size="10" readonly />
          </strong></td>
          </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="nomprenom" type="text" class="form-control" id="nomprenom" value="<? echo $datam['nomprenom'];?>" size="40" readonly />
          </strong>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Date d'embauche</font></strong></td>
          <td><strong>
            <input name="dembauche" type="text" class="form-control" id="dembauche" value="<? echo $datam['dembauche'];?>" size="40" readonly />
          </strong></td>
          </tr>
        <tr>
          <td><strong>Titre </strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="titre" type="text"  class="form-control" id="titre" value="<? echo $datam['titre'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Direction</font></strong></td>
          <td><strong>
            <input name="direction" type="text" class="form-control" id="direction" value="<?echo $datam['direction'];?>" size="40" readonly />
          </strong></td>
          </tr>
        <tr>
          <td><strong><font size="2">Ville</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="ville" type="text"  class="form-control" id="ville" value="<? echo $datam['ville'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Service</font></strong></td>
          <td><strong>
            <input name="service" type="text" class="form-control" id="service" value="<?echo $datam['service'];?>" size="40" readonly />
          </strong></td>
          </tr>
        <tr>
          <td>Congé</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="nconge" type="text"  class="form-control" id="nconge" value="<? echo $datam['nconge'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Taux de paiement en % </font><strong>de l'Indice</strong></strong></td>
          <td><strong>
            <input name="Tin" type="text" class="form-control" id="Tin" value="<? echo $datam['Tin'];?>" size="10" readonly />
          </strong></td>
        </tr>
      </table>
  </div>
</div>
<p>&nbsp; </p>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">SALAIRES &amp; INDEMNITES <? echo $affichemois.' '.$anneepaie ; ?></h3>
  </div>
  <div class="panel-body">

      <table width="100%" border="0">
        <tr>
          <td width="20%">SALAIRE </td>
          <td width="30%">&nbsp;</td>
          <td width="3%">&nbsp;</td>
          <td width="23%">INDEMNITES</td>
          <td width="24%">&nbsp;</td>
        </tr>
        <tr>
          <td>Indice de Base </td>
          <td><strong>
            <input class="form-control" name="indice" type="text" id="indice" value="<? echo $datam['indice']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Fonction</td>
          <td><strong>
            <input name="fonction" type="text" class="form-control" id="fonction" value="<? echo $datam['fonction']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Taux </td>
          <td><strong>
            <input name="taux" type="text" class="form-control" id="taux" value="<? echo $datam['taux']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Transport</td>
          <td><strong>
            <input name="transport" type="text" class="form-control" id="transport" value="<? echo $datam['transport']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Salaire de Base</td>
          <td><strong>
            <input name="sbase" type="text" class="form-control" id="sbase" value="<? echo $datam['sbase']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Logement</td>
          <td><strong>
            <input name="logement" type="text" class="form-control" id="logement" value="<? echo $datam['logement']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Avancement au marité</td>
          <td><strong>
            <input name="avancement" type="text" class="form-control" id="avancement" value="<? echo $datam['avancement']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Téléphone</td>
          <td><strong>
            <input name="telephone" type="text" class="form-control" id="telephone" value="<? echo $datam['telephone']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Prime d'anciennete</td>
          <td><strong>
            <input name="anciennete" type="text" class="form-control" id="anciennete" value="<? echo $datam['anciennete']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Risque / Autres Indemnite</td>
          <td><strong>
            <input name="risque" type="text" class="form-control" id="risque" value="<? echo $datam['risque']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Gratification</td>
          <td><strong>
            <input name="gratification" type="text" class="form-control" id="gratification" value="<? echo $datam['gratification']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Caisse</td>
          <td><strong>
            <input name="caisse" type="text" class="form-control" id="caisse" value="<? echo $datam['caisse']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Rappel</td>
          <td><strong>
            <input name="srappel" type="text" class="form-control" id="srappel" value="<? echo $datam['srappel']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Prime Nuit ( Astreinte)</td>
          <td><strong>
            <input name="astreinte" type="text" class="form-control" id="astreinte" value="<? echo $datam['astreinte']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Heures supplementaire</td>
          <td><strong>
            <input name="heuressup" type="text" class="form-control" id="heuressup" value="<? echo $datam['heuressup']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Prime de panier</td>
          <td><strong>
            <input name="panier" type="text" class="form-control" id="panier" value="<? echo $datam['panier']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Congé payé</td>
          <td><strong>
            <input name="conge" type="text" class="form-control" id="conge" value="<? echo $datam['conge']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Remboursement de frais</td>
          <td><strong>
            <input name="remboursement" type="text" class="form-control" id="remboursement" value="<? echo $datam['remboursement']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
  </div>
</div>
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">DEDUCTIONS &amp; RETENUES <? echo $affichemois.' '.$anneepaie ; ?></h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0">
      <tr>
        <td width="20%">DEDUCTION</td>
        <td width="30%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="23%">RETENUES</td>
        <td width="24%">&nbsp;</td>
      </tr>
      <tr>
        <td>Caisse mutuelle</td>
        <td><strong>
          <input name="cotisation" type="text" class="form-control" id="cotisation" value="<? echo $datam['cotisation']; ?>" size="20" />
        </strong></td>
        <td>&nbsp;</td>
        <td>IGR (<strong>
          <? $igrchoix=$datam['igrchoix'];  if ($igrchoix==0){echo 'Non';} else {echo 'OUI';} ?>
        </strong>) <font size="2"><strong><font size="2"><strong><font color="#FF0000">
        <input name="igrchoix" type="hidden" id="igrchoix" value="<? echo $igrchoix; ?>" />
        </font></strong></font></strong></font></td>
        <td><strong>
          <input name="igr" type="text" disabled="disabled" class="form-control" id="igr" value="<? echo $igrchoix*$datam['igr']; ?>" size="20" readonly />
        </strong></td>
      </tr>
      <tr>
        <td>Avance sur Salaire</td>
        <td><strong>
          <input name="avances" type="text" class="form-control" id="avances" value="<? echo $datam['avances']; ?>" size="20" />
        </strong></td>
        <td>&nbsp;</td>
        <td>Caisse de retraite (<strong>
          <? $crchoix=$datam['crchoix'];   if ($crchoix==0){echo "Non";} else {echo "OUI";} ?>
        </strong>) <font size="2"><strong><font size="2"><strong><font color="#FF0000">
        <input name="crchoix" type="hidden" id="crchoix" value="<? echo $crchoix; ?>" />
        </font></strong></font></strong></font></td>
        <td><strong>
          <input name="retraite" type="text" disabled="disabled" class="form-control" id="retraite" value="<? echo $crchoix*$datam['retraite']; ?>" size="20" readonly />
        </strong></td>
      </tr>
      <tr>
        <td>Pret</td>
        <td><strong>
          <input name="pret" type="text" class="form-control" id="pret" value="<? echo $datam['pret']; ?>" size="20" />
        </strong></td>
        <td>&nbsp;</td>
        <td>Caisse de prevoyances</td>
        <td><strong>
          <input name="prevoyance" type="text" class="form-control" id="prevoyance" value="<? echo $datam['prevoyance']; ?>" size="20" />
        </strong></td>
      </tr>
      <tr>
        <td>Autre deduction</td>
        <td><strong>
          <input name="adeduction" type="text" class="form-control" id="adeduction" value="<? echo $datam['adeduction']; ?>" size="20" />
        </strong></td>
        <td>&nbsp;</td>
        <td>Autres retenue</td>
        <td><strong>
          <input name="aretenue" type="text" class="form-control" id="aretenue" value="<? echo $datam['aretenue']; ?>" size="20" />
        </strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>NET A PAYER </td>
        <td><strong>
          <input name="SNET" type="text" disabled class="form-control" id="SNET" value="<? echo $datam['SNET']; ?>" size="20" readonly />
        </strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong><span style="font-size:8.5pt;font-family:Arial">
          <input type="submit" name="Submit" value="Enregistrer la Paie"  class="btn btn-primary" />
        <strong><span style="font-size:8.5pt;font-family:Arial"><a href="rh_gestionpaie.php" class="btn btn-danger">FERMER</a></span></strong></span></strong></td>
      </tr>
    </table>
  </div>
</div>


     </form>
     
     </td>
   </tr>
   <?php
}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
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