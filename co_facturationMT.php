<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
?>
<?
if(($_SESSION['u_niveau'] != 2)) {
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
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<p>
  <?php

$sqlu = "SELECT * FROM $tbl_saisie where blogin='$id_nom'";
$resultu = mysql_query($sqlu);
while ($rowu = mysql_fetch_assoc($resultu)) {
$bville=$rowu['bville'];
$bquartier=$rowu['bquartier'];
} 

$sql = "SELECT count(*) FROM $tbl_contact where  statut='6' and Tarif='10' and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec' and nserie='$nserie')";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 1; 
$sql = "SELECT * FROM $tbl_contact where  statut='6' and Tarif='10' and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec'  and nserie='$nserie') ORDER BY id ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

	//recherche du repport 
?>
 </p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
    <form action="paiement_apercu.php" method="post" name="form1" id="form2">
      <a href="impression_factMT.php" class="btn btn-sm btn-success" > LISTE DES FACTURATIONS MT </a> |
      <a href="co_liste_factNoclientMT.php" class="btn btn-sm btn-success" > LISTE DES  MT NON FACTURE </a>
    </form>
  </div>
</div>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="47%" align="center">&nbsp;</td>
     <td width="53%" align="center">&nbsp;</td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF">
       <table width="100%" height="201" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
         <tr>
           <td width="34%">ID_CLIENT</td>
           <td width="2%">&nbsp;</td>
           <td width="64%"><strong> <? $idcl=$data['id']; echo $data['id'];?></strong></td>
         </tr>
         <tr>
           <td>Police </td>
           <td>&nbsp;</td>
           <td><strong><? echo $data['Police'];?></strong></td>
         </tr>
         <tr>
           <td><strong><font color="#000000" size="2">Reference géographique</font></strong></td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>Coefficient TI</td>
           <td>&nbsp;</td>
           <td><? echo $data['coefTi'];?></td>
         </tr>
         <tr>
           <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
           <td>&nbsp;</td>
           <td><? echo $data['nomprenom'];?></td>
         </tr>
         <tr>
           <td><strong><font size="2">Ville</font></strong></td>
           <td>&nbsp;</td>
           <td><strong><? echo $data['ville'];?></strong></td>
         </tr>
         <tr>
           <td><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
           <td>&nbsp;</td>
           <td><strong><? echo $data['quartier'];?></strong></td>
         </tr>
       </table>
       <?
	  
	 //recherche du repport 
	 $sqlp = "SELECT * FROM $tbl_fact WHERE id='$idcl' and st='E' ORDER BY idf desc limit 0,1";  
	 $resultp=mysql_query($sqlp);
	 $datap=mysql_fetch_array($resultp);
			
	//affichage des facturations
	$sqfac="SELECT * FROM $tbl_fact  WHERE id='$idcl' and  st='E' ORDER BY idf desc limit 0,1";
	$resultfac=mysql_query($sqfac);
	$datindex=mysql_fetch_array($resultfac);
			?>
     </td>
     <td align="center" bgcolor="#FFFFFF"><form name="form2" method="post" action="co_facturationMT_save.php">
       <table width="100%" height="201" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
         <tr>
           <td width="21%">&nbsp;</td>
           <td width="2%">&nbsp;</td>
           <td width="28%">JOUR</td>
           <td width="9%">&nbsp;</td>
           <td width="29%">NUIT</td>
           <td width="11%">&nbsp;</td>
         </tr>
         <tr>
           <td>Index Actuel</td>
           <td>&nbsp;</td>
           <td><strong>
             <input name="nf" type="text" class="form-control" id="nf" size="20" />
           </strong></td>
           <td>S.I</td>
           <td><strong>
             <input class="form-control" name="nf2" type="text" id="nf2" size="20" />
           </strong></td>
           <td>S.I</td>
         </tr>
         <tr>
           <td>Nouveau Index</td>
           <td>&nbsp;</td>
           <td><strong>
             <input name="n" type="text" class="form-control" id="n" value="<?
	 	  if(!isset($datindex['nf'])|| empty($datindex['nf'])){ echo 0;} else { echo $datindex['nf'];} ?>" size="20" readonly />
           </strong></td>
           <td>S.I</td>
           <td><strong>
             <input name="n2" type="text" class="form-control" id="n2" value="<?
	 	  if(!isset($datindex['nf2'])|| empty($datindex['nf2'])){ echo 0;} else { echo $datindex['nf2'];} ?>" size="20" readonly />
           </strong></td>
           <td>S.I</td>
         </tr>
         <tr>
           <td>Ancien Index</td>
           <td>&nbsp;</td>
           <td><strong>
             <input name="a" type="text" class="form-control" id="a" value="<?
	 	  if(!isset($datindex['n'])|| empty($datindex['n'])){ echo 0;} else { echo $datindex['n'];} ?>" size="20" readonly />
           </strong></td>
           <td>S.I</td>
           <td><strong>
             <input name="a2" type="text" class="form-control" id="a2" value="<?
	 	  if(!isset($datindex['n2'])|| empty($datindex['n2'])){ echo 0;} else { echo $datindex['n2'];} ?>" size="20" readonly />
           </strong></td>
           <td>S.I</td>
         </tr>
         <tr>
           <td>Impayé</td>
           <td>&nbsp;</td>
           <td><strong>
             <input name="impayee" type="text" class="form-control" id="impayee" value="<?
	 	  if(!isset($datap['report'])|| empty($datap['report'])){ echo 0;} else { echo $datap['report'];} ?>" size="20" readonly />
           </strong></td>
           <td>KMF</td>
           <td><input type="submit" name="button" id="button" value="Enregistre le montant " /></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td><strong>
             <input class="form-control" name="coefTi" type="hidden"  id="coefTi" value="<? echo $data['coefTi'];?>" size="20" />
           </strong></td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td><font color="#FF0000">
             <input name="idf" type="hidden" id="idf" value="<? echo $datap['idf']; ?>" />
             <input name="Tarif" type="hidden" id="Tarif" value="<? echo $data['Tarif']; ?>" />
             <input name="amperage" type="hidden" id="amperage" value="<? echo $data['amperage']; ?>" />
             <input name="chtaxe" type="hidden" id="chtaxe" value="<? echo $data['chtaxe']; ?>" />
             <input name="Police" type="hidden" id="Police" value="<? echo $data['Police']; ?>" />
           </font></td>
           <td>&nbsp;</td>
           <td><input name="id" type="hidden" id="id" value="<? echo $data['id']; ?>" />
             <input name="st" type="hidden" value="E" />
             <font color="#FF0000">
             <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
             </font><font color="#FF0000">
             <input name="libelle" type="hidden" id="libelle" value="Facture" />
             </font><font color="#FF0000">
             <input name="bstatut" type="hidden" id="bstatut" value="saisie" />
             </font><font color="#FF0000">
             <input name="bnom" type="hidden" id="bnom" value="<? echo $data['nomprenom']; ?>" />
             </font><font color="#FF0000">
             <input name="bquartier" type="hidden" id="bquartier" value="<? echo $data['quartier']; ?>" />
            </font><font size="2"><strong><font size="2"><strong></strong></font></strong></font></td>
           <td><font color="#FF0000"></td>
           <td><font color="#FF0000">
             <input name="tmt" type="hidden" id="tmt" value="<? echo $data['tmt']; ?>" />
             <input name="id_user" type="hidden" id="id_user" value="<? echo $id_user; ?>" />
           </font></td>
           <td>&nbsp;</td>
         </tr>
       </table>
     </form></td>
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