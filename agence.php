<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?php
 if(($_SESSION['u_niveau'] != 7) ) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

</head>
<?php
Require("bienvenue.php"); // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">Ajouter une agence</h3>
            </div>
            <div class="panel-body">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="panel-body">
                <tr>
                  <td width="47%"><form name="form1" method="post" action="agence_save.php">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="32%">&nbsp;</td>
                        <td width="68%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="panel-title">Nom de l'agence</span></td>
                        <td><input class="form-control" name="a_nom" type="text" id="a_nom" value="" size="50"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Adresse</td>
                        <td><input class="form-control"  name="a_adresse" type="text" id="a_adresse" value="" size="50"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="panel-title">T&eacute;l&eacute;phone</span></td>
                        <td><input class="form-control" name="a_tel" type="text" id="a_tel" value="" size="50"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="panel-title">Statut</span></td>
                        <td><select name="a_statut" id="a_statut">
                          <option selected>Operationnel</option>
                          <option>Fermer</option>
                        </select></td>
                      </tr>
                      <tr>
                        <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                          <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>">
                        </font></strong></font></strong></font></td>
                        <td><p>&nbsp;</p>
                          <p>
                            <input type="submit" name="Submit" value="Enregistrer" class="btn btn-primary" >
                        </p></td>
                      </tr>
                    </table>
                  </form></td>
                  <td width="53%">&nbsp;</td>
                </tr>
              </table>
            </div>
          </div>
<p><font size="2"><font size="2"><font size="2">
  <?php

$sql = "SELECT count(*) FROM $tbl_agence ";  

$resultat = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
 
 
$nb_total = mysqli_fetch_array($resultat);  
 // on teste si ce nombre de vaut pas 0  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
        // premi?re ligne on affiche les titres pr?nom et surnom dans 2 colonnes
  
    
   
// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas d?j? ?t? d?clar?e, et dans ce cas, on l'initialise ? 0  
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
	// 6 maroufchangement 1 par 5
   $nb_affichage_par_page = 10; 
   
// Pr?paration de la requ?te avec le LIMIT  
$sql = "SELECT * FROM $tbl_agence  ORDER BY id_a DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
  </font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<form name="form2" method="post" action="produit_cancel.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#FFFFFF"> 
        <td width="64" align="center" bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
      <td width="266" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Nom de l'agence</font></td>
      <td width="313" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">Adresse</font></td>
      <td width="192" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">T&eacute;l&eacute;phone</font></td>
      <td width="162" align="center" bgcolor="#3071AA" >&nbsp;</td>
      <td width="163" align="center" bgcolor="#3071AA" >&nbsp;</td>
      <td width="163" align="center" bgcolor="#3071AA" >&nbsp;</td>
    </tr>
    <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
    <tr> 
      <td align="center" bgcolor="#FFFFFF"> <div align="left"><?php echo $data['id_a'];?></div>
        <div align="left"></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $data['a_nom'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $data['a_adresse'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo $data['a_tel'];?></em></div></td>
      <td width="162"   style="background-color:#FFF;"><div align="left"><em><?php echo $data['a_statut'];?></em></div></td>
      <td width="163"   style="background-color:#FFF;"><a href="agence_modifie.php?id=<?php echo md5(microtime()).$data['id_a']; ?>" class="btn btn-xs btn-success">Modifier</a></td>
      <td width="163"   style="background-color:#FFF;"><a href="agence_cancel.php?ID=<?php echo md5(microtime()).$data['id_a']; ?>" onClick="return confirm('Etes-vous s�r de vouloir supprimer')" ; style="margin:5px"   class="btn btn-xs btn-danger" >Supprimer</a></td>
    </tr>
    <?php

}

mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ($linki);  
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
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("a_nom","req","SVP entre un nombre");
	
	frmvalidator.addValidation("a_adresse","req","SVP entre un nombre");
	
	frmvalidator.addValidation("a_tel","req","SVP entre un nombre");
	
	
</script>