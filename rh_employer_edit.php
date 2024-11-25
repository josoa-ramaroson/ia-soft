<?
require 'session.php';
?>
<?
	if($_SESSION['u_niveau'] != 50) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript">
function AjaxFunction()
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myarray = JSON.parse(httpxml.responseText);
// Remove the options from 2nd dropdown list 
for(j=document.testform.subcat.options.length-1;j>=0;j--)
{
document.testform.subcat.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].service;
optn.value = myarray.data[i].idser;  // You can change this to subcategory 
document.testform.subcat.options.add(optn);

} 
      }
    } // end of function stateck
	var url="rh_fonction_direction.php";
var idrh=document.getElementById('s1').value;
url=url+"?idrh="+idrh;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>

</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tb_rhpersonnel WHERE idrhp='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);
?>
<body>
<table width="100%" border="0">
   <tr>
     <td width="39%"><a href="rh_employer_user.php?id=<? echo md5(microtime()).$datam['idrhp'];?>" class="btn btn-danger">Fermer sans enregistre</a></td>
     
     <td width="9%">&nbsp;</td>
     <td width="14%">&nbsp;</td>
     <td width="10%">&nbsp;</td>
     <td width="28%">&nbsp;</td>
   </tr>
 </table>
 <p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr>
    <td height="263"><form action="rh_employer_edit_save.php" method="post" name="testform" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
              <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information du client </font></strong></div></td>
        </tr>
        <tr>
          <td width="11%"><strong>
            <input name="id" type="hidden" id="id" value="<? echo $datam['idrhp'];?>" size="10" readonly />
            <font size="2">Designation</font></strong></td>
          <td width="1%">&nbsp;</td>
          <td width="35%"><strong>
            <select name="Designation" id="Designation">
              <option selected="selected"><? echo $datam['Designation'];?></option>
              <option>Mr</option>
              <option>Mme</option>
              <option>Mlle</option>
              <option>Dr</option>
            </select>
          Sex 
            <select name="sex" id="sex">
              <option selected="selected"><? echo $datam['sex'];?></option>
              <option>Masculin</option>
              <option>Féminin</option>
            </select>
          </strong></td>
          <td width="1%">&nbsp;</td>
          <td width="12%"><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          </font><font size="2">Niveau d'etude</font></strong></font></strong></font></td>
          <td width="40%"><span style="font-size:8.5pt;font-family:Arial">
            <select name="niveau" id="niveau">
              <option selected="selected"><? echo $datam['niveau'];?></option>
              <option>NEANT</option>
			  <option>DEP</option>
              <option>AFP</option>
              <option>CFP</option>
              <option>BEPC</option>
              <option>Bac 
                <option>Bac +2 
                <option>Bac +3 
                <option>Bac +4 
                <option>Bac +5 
                <option>Bac +6 et plus 
              </select>
          </span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom<font size="2"><font color="#FF0000">(*)</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input class="form-control" name="nomprenom" type="text" id="nomprenom" value="<? echo $datam['nomprenom'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Specialisation</font></strong></td>
          <td><strong>
            <input class="form-control" name="specialisation" type="text" id="specialisation" value="<? echo $datam['specialisation'];?>" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Matricule <font size="2"><font color="#FF0000">(*)</font></font></font></strong></td>
          <td><strong>
            <input name="matricule" type="text" id="matricule" value="<? echo $datam['matricule'];?>" size="10" />
          Indice <font size="2"><font size="2"><font color="#FF0000">(*)</font></font></font>
          <input name="indice" type="text" id="indice" value="<? echo $datam['indice']; ?>" size="10" />
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Situation familiale</font></strong></td>
          <td>&nbsp;</td>
          <td><select  name="stfamille" id="stfamille">
            <option selected="selected"><? echo $datam['stfamille'];?></option>
            <option>Célibataire</option>
            <option>Marié(e)</option>
            <option>Divorcé(e)</option>
            <option>Veuf(ve)</option>
          </select>
            <font size="2">Nombre d'enfant
            <input name="nenfant" type="text" id="nenfant" value="<? echo $datam['nenfant'];?>" size="5" maxlength="5" />
            </font></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Date de naissance</font></strong></td>
          <td><strong>
            <input name="sdnaissance" type="text" id="sdnaissance" value="<? echo $datam['dnaissance'];?>" size="40" />
          YEAR - MOTH - DAY</strong></td>
        </tr>
        <tr>
          <td><strong>Titre </strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input  class="form-control" name="titre" type="text" id="titre" value="<? echo $datam['titre'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Date d'embauche</font></strong></td>
          <td><strong>
            <input name="sdembauche" type="text" id="sdembauche" value="<? echo $datam['dembauche'];?>" size="40" />
          YYYY- MM - DD</strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Ville</font></strong></td>
          <td>&nbsp;</td>
          <td><?Php
require "fonction.php";// connection to database 
$ville=$datam['ville'];
echo "<select name=ville>
<option>$ville</option>";

$sql="select * from ville "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option>$row[ville]</option>";
}
?></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Date d'inactivité</font></strong></td>
          <td><strong>
            <input  name="dinactivite" type="text" id="dinactivite" value="<? echo $datam['dinactivite'];?>" size="40" />
            2015 - 12 - 14 </strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input class="form-control" name="tel" type="text" id="tel" value="<? echo $datam['tel'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Categorie</font></strong></td>
          <td><select name="categorie" id="categorie">
            <option selected="selected"><? echo $datam['categorie'];?></option>
            <option>Cadre A5 </option>
            <option>Cadre A4 </option>
            <option>Cadre A3 </option>
            <option>Cadre A2 </option>
            <option>Cadre A1 </option>
            <option>Cadre B5 </option>
            <option>Cadre B4 </option>
            <option>Cadre B3 </option>
            <option>Cadre B2 </option>
            <option>Cadre B1 </option>
            <option>Cadre C5 </option>
            <option>Cadre C4 </option>
            <option>Cadre C3 </option>
            <option>Cadre C2 </option>
            <option>Cadre C1 </option>
            <option>Maitrise A5 </option>
            <option>Maitrise A4 </option>
            <option>Maitrise A3 </option>
            <option>Maitrise A2 </option>
            <option>Maitrise A1 </option>
            <option>Maitrise B5 </option>
            <option>Maitrise B4 </option>
            <option>Maitrise B3 </option>
            <option>Maitrise B2 </option>
            <option>Maitrise B1 </option>
            <option>Maitrise C5 </option>
            <option>Maitrise C4 </option>
            <option>Maitrise C3 </option>
            <option>Maitrise C2 </option>
            <option>Maitrise C1 </option>
            <option>Execution A5 </option>
            <option>Execution A4 </option>
            <option>Execution A3 </option>
            <option>Execution A2 </option>
            <option>Execution A1 </option>
            <option>Execution B5 </option>
            <option>Execution B4 </option>
            <option>Execution B3 </option>
            <option>Execution B2 </option>
            <option>Execution B1 </option>
            <option>Execution C5 </option>
            <option>Execution C4 </option>
            <option>Execution C3 </option>
            <option>Execution C2 </option>
            <option>Execution C1 </option>
          </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Email</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input class="form-control" name="email" type="text" id="email" value="<? echo $datam['email'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Direction <font size="2"><font color="#FF0000">(*)</font></font></font></strong></td>
          <td><strong><? echo $datam['direction'];?></strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>login</td>
          <td>&nbsp;</td>
          <td><strong>
            <input class="form-control" name="login" type="text" id="login" value="<? echo $datam['login'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Service</font></strong></td>
          <td><strong><? echo $datam['service'];?></strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>pwd</td>
          <td>&nbsp;</td>
          <td><strong>
            <input class="form-control" name="pwd" type="text" id="pwd" value="<? echo $datam['pwd'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td>Lien ( SYSTEME)</td>
          <td><select name="cm" id="cm">
          
<?php
$vide='';
$cmr=$datam['cm'];

if($datam['cm']!=0){
$sql8="SELECT * FROM $tbl_utilisateur WHERE id_u='$cmr'";
$result8=mysql_query($sql8);
$data8=mysql_fetch_array($result8);
echo '<option value='.$data8['id_u'].'> '.$data8['u_nom'].' '.$data8['u_prenom'].' ( '.$data8['u_login'].')</option>';
} else 
{
echo '<option value='.$vide.' selected> Realisez la connexion </option>';
}
?> 
            <?php
$sql9 = ("SELECT id_u, id_nom , u_nom , u_prenom, u_login  FROM $tbl_utilisateur  ORDER BY id_u ASC ");
$result9 = mysql_query($sql9);

while ($row9 = mysql_fetch_assoc($result9)) {
echo '<option value='.$row9['id_u'].'> '.$row9['u_nom'].' '.$row9['u_prenom'].' ( '.$row9['u_login'].')</option>';
}

?>
          </select>
Statut
<select name="statut" id="statut">
  <option selected><? echo $datam['statut'];?></option>
  <option>Operationnel</option>
  <option>Disponibilité</option>
  <option>Fermer</option>
</select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>COMPTE CPP</td>
          <td>&nbsp;</td>
          <td><strong>
            <input class="form-control" name="CPP" type="text" id="CPP" value="<? echo $datam['CPP'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>PAYE  A </td>
          <td><select name="Tin" id="Tin">
            <option selected="selected"><? echo $datam['Tin'];?></option>
            <option>100</option>
            <option>90</option>
            <option>80</option>
            <option>70</option>
            <option>60</option>
            <option>50</option>
            <option>40</option>
            <option>30</option>
            <option>20</option>
            <option>10</option>
          </select> 
%  de son Indice ou Salaire</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>NTC</td>
          <td>&nbsp;</td>
          <td><strong>
            <input class="form-control" name="NTC" type="text" id="NTC" value="<? echo $datam['NTC'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>IGR</td>
          <td><select name="igrchoix" size="1" id="igrchoix">
<option selected="selected" value="<? $igrchoix=$datam['igrchoix'];?>"><? if ($igrchoix==0){echo 'Non';} else {echo 'OUI';}?></option>
            <option value="0">Non</option>
            <option value="1">Oui</option>
          </select>            
             Caisse de retraite <select name="crchoix" size="1" id="crchoix">
<option selected="selected" value="<? $crchoix=$datam['crchoix'];?>"><? if ($crchoix==0){echo 'Non';} else {echo 'OUI';}?></option>
               <option value="0">Non</option>
               <option value="1">Oui</option>
            </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
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
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer les mises à jours" class="btn btn-primary" />
            <a href="rh_employer_user.php?id=<? echo md5(microtime()).$datam['idrhp'];?>" class="btn btn-danger">Fermer sans enregistre</a></span></strong></td>
        </tr>
        </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
	              <?
	function direction_eda($iddr,$tb_rhdirection){
	
	$sql = "SELECT * FROM $tb_rhdirection where  idrh=$iddr ";

	$resultat = mysql_query($sql) or exit(mysql_error()); 
	$nqt = mysql_fetch_assoc($resultat);

	if((!isset($nqt['direction'])|| empty($nqt['direction']))) { $qt=''; return $qt;}
	else {$qt=$nqt['direction']; return $qt;}

	}	
	?>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


	frmvalidator.addValidation("nomprenom","req","nomprenom");
    frmvalidator.addValidation("indice","req","indice");
	frmvalidator.addValidation("matricule","req","indice");
    frmvalidator.addValidation("direction","req","direction");
	
	
</script>