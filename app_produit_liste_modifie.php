<?
require("session.php"); 
require"fc-affichage.php";
?>
<?
if(($_SESSION['u_niveau'] != 40)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

</head>
<?
require("bienvenue.php"); 
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
<div class="panel-heading">
  <h3 class="panel-title"><em>
    <label><strong>Modification du nom du produit</strong></label>
  </em></h3>
</div>
 <div class="panel-body">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="47%"><font color="#CC9933" size="5">
      <?php
				  
require 'fonction.php';
mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");  
// get value of id that sent from address bar 
$id=$_GET['id'];

$sql3="SELECT * FROM $tbl_appproduit_liste WHERE idproduit='$id'";
$result3=mysql_query($sql3);

$rows3=mysql_fetch_array($result3);
?>
    </font>
      <form name="form3" method="post" action="app_produit_liste_updates.php">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="37%">&nbsp;</td>
            <td width="63%">&nbsp;</td>
          </tr>
          <tr>
            <td><em>
              <input name="idp" type="hidden" id="idp" value="<? echo $rows3['idproduit'];?>">
            </em></td>
            <td><em>
              <input class="form-control" name="mproduit" type="text" id="code2" value="<? echo $rows3['titre']; ?>" size="40" bgcolor="#FFFF00">
            </em></td>
                       
          </tr>
          
                             <tr>
            <td>
             <td><em>
              <input class="form-control" name="prix" type="text" id="prix" value="<? echo $rows3['prix']; ?>" size="40" bgcolor="#FFFF00" readonly>
            </em></td></td>
            <td>&nbsp;</td>
          </tr>
          
          
        <tr>
          <td>&nbsp;</td>
          <td><strong>
            <select name="type" id="type">
            
           <option value="<? echo $rows3['type'];?>" selected="selected">
                <? $type=$rows3['type']; 
		  
		  if ($type==0) echo 'ELECTRICITE';
	      if ($type==1) echo 'GAZ'; 
		  if ($type==2) echo 'MAGAZIN';
			    ?>
            
            
             <option value="2">MAGAZIN</option>
            </select>
          </strong></td>
        </tr>
         
      
          
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit3" value="Valider votre modification"></td>
          </tr>
        </table>
      </form>
    <font color="#CC9933" size="5">&nbsp;</font></td>
    <td width="53%">&nbsp;</td>
  </tr>
</table>
</div></div>
<p><font size="2"><font size="2"></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font><font size="2"><font size="2"><font size="2">
<?php
require 'fonction.php';

// Connect to server and select databse.
mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");

// on pr?pare une requ?te permettant de calculer le nombre total d'?l?ments qu'il faudra afficher sur nos diff?rentes pages  
$sql = "SELECT count(*) FROM $tbl_appproduit_liste ";  

// on ex?cute cette requ?te  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
// on r?cup?re le nombre d'?l?ments ? afficher  
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
   $nb_affichage_par_page = 40; 
   
// Pr?paration de la requ?te avec le LIMIT  
$sql = "SELECT * FROM $tbl_appproduit_liste  ORDER BY idproduit DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<form name="form2" method="post" action="app_produit_liste_cancel.php">
 <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#000000"> 
      <td width="15%" align="center" bgcolor="#0033FF"><font color="#CCCCCC" size="4"><strong>N&deg; Enregistrement</strong></font></td>
      <td width="35%" align="center" bgcolor="#0033FF"><font color="#CCCCCC" size="3"><strong> 
        Produit </strong></font></td>
      <td width="8%" align="center" bgcolor="#0033FF"><font color="#CCCCCC" size="3">&nbsp;</font></td>
      <td width="19%" align="center" bgcolor="#0033FF">&nbsp;</td>
      <td width="23%" align="center" bgcolor="#0033FF">&nbsp;</td>
    </tr>
    <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr> 
      <td height="29" align="center" bgcolor="#FFFFFF"> <div align="left"><? echo $data['idproduit'];?></div>
        <div align="left"></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['titre'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['prix'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><a href="app_produit_liste_modifie.php?id=<? echo $data['idproduit']; ?>" class="btn btn-xs btn-success"><? echo 'Modifier' ?></a></td>
      <td width="50"   style="background-color:#FFF;"> <? /* <a href="stk_produit_cancel.php?ID=<? echo $data['idproduit']; ?>" onClick="return confirm('Etes-vous sûr de vouloir supprimer')" ; style="margin:5px" class="btn btn-xs btn-danger"> 
        Supprimer <a> */ ?> </td> 
    </tr>
    <?php
// Exit looping and close connection 
}
// on lib?re l'espace m?moire allou? pour cette requ?te  
mysql_free_result ($req); 
 
   // on affiche enfin notre barre 20 avant de passer a l autre page
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
// on lib?re l'espace m?moire allou? pour cette requ?te  
mysql_free_result ($resultat);  
// on ferme la connexion ? la base de donn?es.  
mysql_close ();  
?>
  </table>
</form>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center"></div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
  </tr>
  <tr> 
    <td height="21"> 
      <?php
include_once('pied.php');
?>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve">//<![CDATA[
  var frmvalidator  = new Validator("form3");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("mproduit","req","SVP enregistre le libelle");
//]]></script>