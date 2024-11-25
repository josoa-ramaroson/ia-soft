<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?
if(($_SESSION['u_niveau'] != 4)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction

    //choix d espace de memoire pour les connection.---------------------------------------------------------------- 
	$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_paiconn  WHERE idrecu='$id_nom' ";
	$sqLvaleur = mysql_query($valeur_existant)or exit(mysql_error()); 
	$nb = mysql_fetch_assoc($sqLvaleur);
	
	if($nb['nb'] == 1)
   {

   }
   else 
   {
	   	
	$sqlcon="INSERT INTO $tbl_paiconn (idrecu)VALUES('$id_nom')";
    $connection=mysql_query($sqlcon);
    }
    //------------------------FIn du Programme ---------------------------------------------------------
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">ETAPE 1 PAIEMENT : </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0">
      <tr>
        <td width="53%"><form action="paiement_apercu.php" method="post" name="form2" id="form2">
          <table width="100%" border="0">
            <tr>
              <td width="21%">&nbsp;</td>
              <td width="45%"> Electrique , Police, Devis</td>
              <td width="1%">&nbsp;</td>
              <td width="33%">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="panel-title">ID CLIENT</span></td>
              <td><input class="form-control" name="id" type="text" id="id" size="30" /></td>
              <td>&nbsp;</td>
              <td><input type="submit" name="Paiement2" id="Paiement2" value="Etape 2 : Paiement" class="btn btn-sm btn-success" /></td>
            </tr>
          </table>
        </form></td>
        <td width="46%"><form action="paiement_apercuAutre.php" method="post" name="form22" id="form22">
          <table width="100%" border="0">
            <tr>
              <td width="22%">&nbsp;</td>
              <td width="41%">Autres Paiement </td>
              <td width="3%">&nbsp;</td>
              <td width="34%">&nbsp;</td>
            </tr>
            <tr>
              <td>N°Facture</td>
              <td><input class="form-control" name="idf" type="text" id="idf" size="30" /></td>
              <td>&nbsp;</td>
              <td><input type="submit" name="Paiement" id="Paiement" value="Etape 2 : Paiement" class="btn btn-sm btn-success" /></td>
            </tr>
          </table>
        </form></td>
        <td width="1%">&nbsp;</td>
      </tr>
    </table>
  </div>
</div>
<?php

$sql = "SELECT count(*) FROM $tbl_paiement where id<500000";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
 
$nb_total = mysql_fetch_array($resultat);  
 // on teste si ce nombre de vaut pas 0  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
        // premi?re ligne on affiche les titres pr?nom et surnom dans 2 colonnes
  
    
   
// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas d?j? ?t? d?clar?e, et dans ce cas, on l'initialise ? 0  
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
	// 6 maroufchangement 1 par 5
   $nb_affichage_par_page = 50; 
   
 
$sqfac = "SELECT * FROM $tbl_paiement where id<500000 GROUP BY  idp desc LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC
 
// on ex?cute la requ?te  
$resultfac = mysql_query($sqfac) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 



	//$sqfac="SELECT * FROM $tbl_paiement ORDER BY idp DESC";
	//$resultfac=mysql_query($sqfac);

?>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#0794F0">
    <td width="100%" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Historique des paiements</font></strong></div></td>
  </tr>
</table>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0794F0">
    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000">ID Client</font></td>
    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Vendeur</strong></font></td>
    <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date</strong></font></td>
    <td width="19%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Nom du client</strong></font></td>
    <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
    <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>N Reçu </strong></font></td>
    <td width="12%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Montant</strong></font></td>
    <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Payé</strong></font></td>
    <td width="17%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
  </tr>
  <?php
while($rowsfac=mysql_fetch_array($resultfac)){ 
?>
  <tr bgcolor="<? gettatut($rowsfac['type']); ?>">
    <td align="center" ><em><? echo $rowsfac['id'];?></em></td>
    <td align="center" ><div align="left"><em><? echo $rowsfac['id_nom'];?></em></div></td>
    <td align="center" ><div align="left"><em><? echo $rowsfac['date'];?></em></div></td>
    <td align="center" ><div align="left"><em><? echo $rowsfac['Nomclient'];?></em></div></td>
    <td align="center" ><em><? echo $rowsfac['nfacture'];?></em></td>
    <td align="center" ><em>
    
<? if ($rowsfac['id']<500000) { ?>
<a href="paiement_billimp.php?idp=<? echo md5(microtime()).$rowsfac['idp'];?>" target="_blank" > <? echo $rowsfac['idp'];?></a>
<? } else {?>
<a href="paiement_billimpG.php?idp=<? echo md5(microtime()).$rowsfac['idp'];?>" target="_blank" > <? echo $rowsfac['idp'];?></a><? } ?> 
    
    </em></td>
    <td align="center" ><em><? echo $rowsfac['montant'];?></em></td>
    <td align="center" ><em><? echo $rowsfac['paiement'];?></em></td>
    <td align="center" ><em><? echo $rowsfac['report'];?></em></td>
  </tr>
  <?php
}

mysql_free_result ($resultfac); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  

	                 function gettatut($fetat){
			    // if ($fetat=='P')    { echo $couleur="#ffc88d";}//vert fonce
				 if ($fetat=='R')    { echo $couleur="#ec9b9b";}//rouge -Declined	
				 }
				 
mysql_close ();  
?>
</table>
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
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form2");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("id","req","SVP entre un nombre");
	frmvalidator.addValidation("id","num","Allow numbers only ");
</script>

<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form22");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("idf","req","SVP entre un nombre");
	frmvalidator.addValidation("idf","num","Allow numbers only ");
</script>

