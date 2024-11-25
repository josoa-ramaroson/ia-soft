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
<?php
require_once('calendar/classes/tc_calendar.php');
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script language="javascript" src="calendar/calendar.js"></script>
<script src="js/jquery.min.js"></script>
<style type="text/css">
.taile {
	font-size: 12px;
}
.taille16 {
	font-size: 16px;
}
.centrevaleur {	text-align: center;
}
.panel.panel-primary .panel-body table tr td form table tr td table tr td {
	text-align: center;
}
</style>
</head>
<?
Require("bienvenue.php");    // on appelle la page contenant la fonction

	    //choix d espace de memoire pour les connection.---------------------------------------------------------------- 
	$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_paiconn  WHERE idrecu='$id_nom' ";
	$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error()); 
	$nb = mysqli_fetch_assoc($sqLvaleur);
	
	if($nb['nb'] == 1)
   {

   }
   else 
   {
	   	
	$sqlcon="INSERT INTO $tbl_paiconn (idrecu)VALUES('$id_nom')";
    $connection=mysqli_query($linki,$sqlcon);
    }
    //------------------------FIn du Programme ---------------------------------------------------------
	
     $sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);
	
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="85%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">1- Rentrez le Montant , 2 Positionne la Sourie , 3- Scanner la Facture , 4 - Enregistrement Automatique)</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form name="form1" method="post" action="paiementcb_save.php">
              <table width="100%" border="0">
                <tr>
                  <td width="1%" height="119">&nbsp;</td>
                  <td width="21%"><table width="100%" border="0">
                    <tr>
                      <td>DATE DE PAIEMENT </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><input class="form-control" name="dt" type="text" id="dt" value="<? echo $datecaisse['datecaisse'];?>" size="30" readonly /></td>
                    </tr>
                  </table></td>
                  <td width="1%"><p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p></td>
                  <td width="21%"><table width="100%" border="0">
                    <tr>
                      <td>MONTANT A PAYER </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><input class="form-control" name="pt" type="text" id="ppaiement" value="" size="30" /></td>
                    </tr>
                  </table></td>
                  <td width="1%">&nbsp;</td>
                  <td width="21%"><img src="images/barre.png" width="249" height="80"></td>
                  <td width="1%">&nbsp;</td>
                  <td width="21%"><table width="100%" border="0">
                    <tr>
                      <td>Electrique , Police, Devis</td>
                    </tr>
                    <tr>
                      <td><em><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                        <input name="cl" type="hidden" id="cl" value="0" />
                      </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></em><em><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                      <input name="idn" type="hidden" id="idn" value="<? echo $id_nom; ?>" />
                      ( ID CLIENT)</font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></em></td>
                    </tr>
                    <tr>
                      <td><input class="form-control" name="id" type="text" id="code" value="" size="30"></td>
                    </tr>
                  </table></td>
                  <td width="2%">&nbsp;</td>
                  <td width="10%"><table width="100%" border="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><input type="submit" id="envoi" name="Submit" value="Paiement" class="btn btn-primary" ></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
            </form></td>
          </tr>
        </table>
        
              <script>
$(document).ready(function(){
  
});

$('#code').hover('Focus', function() {
		
    var idclient = document.getElementById("code").value; //recuperation du numero de billet 
	var idpaiement=document.getElementById("ppaiement").value; //recuperation du numero de billet 
	var vbsc= '<?  echo md5(microtime()); ?>';
	
location.href="paiementcb_save.php?<?  echo md5(microtime()); ?>&dt=<? echo $datecaisse['datecaisse']; ?>&cl=<? echo "0"; ?>&idn=<? echo $id_nom; ?>&<?  echo md5(microtime()); ?>&id="+ idclient+"&v="+ vbsc+"&pt="+ idpaiement+"&v="+ vbsc;

});
  </script>
  
      </div>
    </div></td>
    <td width="3%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
  </tr>
</table>
<p>
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
</p>
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
      <a href="paiement_billimpG.php?idp=<? echo md5(microtime()).$rowsfac['idp'];?>" target="_blank" > <? echo $rowsfac['idp'];?></a>
      <? } ?>
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
<p></p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("paiement","req","SVP entre un nombre");
	frmvalidator.addValidation("paiement","num","Allow numbers only ");
	
	frmvalidator.addValidation("code","req","SVP entre un nombre");
	frmvalidator.addValidation("code","num","Allow numbers only ");
	
</script>