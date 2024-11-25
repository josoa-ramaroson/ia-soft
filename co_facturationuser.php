<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
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
 <p>&nbsp;</p>
 <table width="100%" border="0">
   <tr>
     <td width="60%">&nbsp;</td>
     <td width="2%">&nbsp;</td>
     <td width="9%">&nbsp;</td>
     <td width="29%"><form name="form1" method="post" action="co_facturationuser.php">
       <label for="mr1"></label>
       <input name="mr1" type="text" id="mr1" size="30">
       <input type="submit" name="Cherchez " id="Cherchez " class="btn btn-sm btn-default"value="Chercher par ID">
     </form></td>
   </tr>
 </table>
 <p>
   <?php
$mr1=addslashes($_POST['mr1']);

$sql = "SELECT * FROM $tbl_contact where  id='$mr1' and statut='6' and  Tarif!='10' and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec'  and nserie='$nserie')";  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

	//recherche du repport 
?>
 </p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="47%" align="center">&nbsp;</td>
     <td width="53%" align="center">&nbsp;</td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><form name="form1" method="post" action="">
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
     </form></td>
     <td align="center" bgcolor="#FFFFFF"><form name="form2" method="post" action="co_facturation_save.php">
       <table width="100%" height="201" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
         <tr>
           <td width="23%"> Index Actuel</td>
           <td width="2%">&nbsp;</td>
           <td width="25%"><strong>
             <input class="form-control" name="nf" type="text" id="nf" size="20" />
           </strong></td>
           <td width="50%">S.I</td>
         </tr>
         <tr>
           <td>Nouveau Index</td>
           <td>&nbsp;</td>
           <td><strong>
             <input name="n" type="text" class="form-control" id="n" value="<?
	 	  if(!isset($datindex['nf'])|| empty($datindex['nf'])){ echo 0;} else { echo $datindex['nf'];} ?>" size="20" readonly />
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
         </tr>
         <tr>
           <td>Impayé</td>
           <td>&nbsp;</td>
           <td><strong>
             <input name="impayee" type="text" class="form-control" id="impayee" value="<?
	 	  if(!isset($datap['report'])|| empty($datap['report'])){ echo 0;} else { echo $datap['report'];} ?>" size="20" readonly />
           </strong></td>
           <td>KMF<font color="#FF0000">
             <input name="idf" type="hidden" id="idf" value="<? echo $datap['idf']; ?>" />
             <input name="Tarif" type="hidden" id="Tarif" value="<? echo $data['Tarif']; ?>" />
             <input name="amperage" type="hidden" id="amperage" value="<? echo $data['amperage']; ?>" />
             <input name="chtaxe" type="hidden" id="chtaxe" value="<? echo $data['chtaxe']; ?>" />
             <input name="Police" type="hidden" id="Police" value="<? echo $data['Police']; ?>" />
           </font></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td><input type="submit" name="button" id="button" value="Enregistre le montant "/></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td><strong>
             <input name="coefTi" type="hidden" class="form-control" id="coefTi" value="<? echo $data['coefTi'];?>" size="20" />
           </strong></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
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
             </font><font size="2"><font color="#FF0000">
             <input name="id_user" type="hidden" id="id_user" value="<? echo $id_user; ?>" />
             </font><font size="2"><strong><font color="#FF0000"></td>
         </tr>
       </table>
     </form></td>
   </tr>
   <?php
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