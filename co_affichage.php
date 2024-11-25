<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
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
 <table width="99%" border="0">
   <tr>
     <td width="3%">&nbsp;</td>
     <td width="39%"><div class="panel panel-primary">
       <div class="panel-heading">
         <h3 class="panel-title">RECHERCHE PAR ID_CLIENT</h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="52%"><form name="form1" method="post" action="re_chercherid.php">
       <label for="mr2"></label>
       <input name="mr2" type="text" id="mr2" size="30">
       <input type="submit" name="Cherchez " id="Cherchez " value="Chercher ID">
     </form>
     
     </td>
               </tr>
             </table></td>
           </tr>
         </table>
       </div>
     </div></td>
     <td width="9%">&nbsp;</td>
     <td width="49%"><div class="panel panel-primary">
       <div class="panel-heading">
         <h3 class="panel-title">Id_Client,Ville, Quartier, Nom , Tel , Adresse </h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="52%"><form name="form1" method="post" action="imp_chercher.php">
                   <label for="mr1"></label>
                   <input name="mr1" type="text" id="mr1" size="30">
                   <input type="submit" name="Cherchez " id="Cherchez " class="btn btn-sm btn-default"value="Chercher détail">
                 </form></td>
               </tr>
             </table></td>
           </tr>
         </table>
       </div>
     </div></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><div class="panel panel-primary">
       <div class="panel-heading">
         <h3 class="panel-title">HISTORIQUE CLIENT PAR ID_CLIENT</h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="52%"><form name="form1" method="post" action="co_facture_user.php">
                   <label for="mr2"></label>
                   <input name="id" type="text" id="id" size="30">
                   <input type="submit" name="Cher" id="Cher" class="btn btn-sm btn-default"value="Les factures electriques">
                 </form></td>
               </tr>
             </table></td>
           </tr>
         </table>
       </div>
     </div></td>
     <td>&nbsp;</td>
     <td><div class="panel panel-warning">
       <div class="panel-heading">
         <h3 class="panel-title">ARCHIVES   PAR ID_CLIENT</h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="52%"><form name="form1" method="post" action="z_co_facture_user.php">
                   <label for="mr2"></label>
                   <font color="#000000">
                   <select name="annee" size="1" id="annee">
                     <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                   </select>
                   </font>
                   <input name="id" type="text" id="id" size="30">
                   <input type="submit" name="Cher" id="Cher" class="btn btn-sm btn-default"value="Les factures electriques">
                   
                  
                 </form></td>
               </tr>
             </table></td>
           </tr>
         </table>
       </div>
     </div></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>  <a class="btn btn-sm btn-default" type="button" href="client_document_chercher.php"> Cherchez un document  </a>
    </div>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
 </table>
 <p>
   <?php
$sql = "SELECT count(*) FROM $tbl_contact  where statut='6'";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_contact  where statut='6' ORDER BY nomprenom ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
 </p>
<table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="8%" align="center"><font color="#FFFFFF" size="4"><strong>ID </strong></font></td>
     <td width="16%" align="center"><font color="#FFFFFF" size="3"><strong> Police</strong></font></td>
     <td width="28%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Tel</strong> </font></td>
     <td width="15%" align="center"><font color="#FFFFFF"><strong>Ville</strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>Quartier</strong></font></td>
     <td width="8%" align="center">&nbsp;</td>
   </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><a href="co_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-default" ><? echo $data['id'];?></a></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['Police'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['nomprenom'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['tel'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['ville'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['quartier'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><a href="co_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-success" >Aperçu</a></td>
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
</body>
</html>