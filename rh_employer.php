<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
	if($_SESSION['u_niveau'] != 50) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
<script language="javascript" src="calendar/calendar.js"></script>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
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
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">AJOUTER UN NOUVEAU EMPLOYER
    ( Informations personnelles de vos employés
    )</h3>
  </div>
  <div class="panel-body">
    <form action="rh_employer_save.php" method="post" name="testform" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="15%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="31%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%"><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          </font><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
          </font></strong></font></strong></font></strong></font></strong></font></strong></font></td>
        </tr>
        <tr>
          <td><strong><font size="2">Designation</font></strong></td>
          <td>&nbsp;</td>
          <td>
            <select name="Designation" id="Designation">
              <option>Mr</option>
              <option>Mme</option>
              <option>Mlle</option>
              <option>Dr</option>
            </select> 
            Sex 
            <select name="sex" id="sex">
              <option>Masculin</option>
              <option>Féminin</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td><strong>Titre</strong></td>
          <td><strong>
            <input name="titre" type="text" id="titre" size="40" />
          </strong></td>
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
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> (*)</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="nomprenom" type="text" id="nomprenom" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Matricule  <font size="2"><font color="#FF0000"> (*)</font></font></font></strong></td>
          <td><strong>
            <input name="matricule" type="text" id="matricule" size="10" />
          Indice : 
          <input name="indice" type="text" id="indice" size="10" />
          <font size="2"> <font size="2"><font color="#FF0000"> (*)</font></font></font></strong></td>
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
          <td><strong><font size="2">Situation familiale</font></strong></td>
          <td>&nbsp;</td>
          <td>
            <select name="stfamille" id="stfamille">
              <option>Célibataire</option>
              <option>Marié(e)</option>
              <option>Divorcé(e)</option>
              <option>Veuf(ve)</option>
            </select>
            <font size="2">Nombre d'enfant</font>
            <input name="nenfant" type="text" id="nenfant" value="0" size="5" maxlength="5" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Date de naissance</font></strong></td>
          <td><?php
					  $myCalendar = new tc_calendar("dnaissance", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval('1950', '2030');
					  $myCalendar->dateAllow('1950-01-01','2030-12-31');
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
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
          <td><strong><font size="2">Ville</font></strong></td>
          <td>&nbsp;</td>
          <td><?Php
require "fonction.php";// connection to database 

echo "<select name=ville>
<option></option>";

$sql="select * from ville "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option>$row[ville]</option>";
}
?></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Date d'embauche</font></strong></td>
          <td><?php
					  $myCalendar = new tc_calendar("dembauche", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval('1970', '2030');
					  $myCalendar->dateAllow('1970-01-01','2037-12-31');
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
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
            <input name="tel" type="text" id="tel" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><? // <strong><font size="2">Date d'inactivité</font></strong> ?></td>
          <td><?php /*
					  $myCalendar = new tc_calendar("dinactivite", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval('2015', '2030');
					  $myCalendar->dateAllow('2015-01-01','2037-12-31');
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  */
					  ?></td>
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
            <input name="email" type="text" id="email" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Categorie</font></strong></td>
          <td><select name="categorie" id="categorie">
            <option> </option>
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
          <td><strong><font size="2">Niveau d'etude</font></strong></td>
          <td>&nbsp;</td>
          <td>
            <select name="niveau" id="niveau">
              <option selected></option>";
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
         </td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Direction <font size="2"><font color="#FF0000"> (*)</font></font></font></strong></td>
          <td><?Php
echo "<br><select name=direction id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez une direction</option>";

$sql="select * from $tb_rhdirection "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[idrh]>$row[direction]</option>";
}
?>
          <strong><font size="2"><font size="2"><font color="#FF0000">*</font></font></font></strong></td>
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
          <td><strong><font size="2">Specialisation</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="specialisation" type="text" id="specialisation" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Service</font></strong></td>
          <td><select name=subcat id='s2'>
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
          <td>Login</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="login" type="text" disabled="disabled" id="login" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Lien ( SYSTEME)</td>
          <td><select name="cm" id="cm">
            <option value='' selected>Realisez la connexion </option>
            <?php
$sql9 = ("SELECT id_u, id_nom , u_nom , u_prenom, u_login  FROM $tbl_utilisateur  ORDER BY id_u ASC ");
$result9 = mysql_query($sql9);

while ($row9 = mysql_fetch_assoc($result9)) {
echo '<option value='.$row9['id_u'].'> '.$row9['u_nom'].' '.$row9['u_prenom'].' ( '.$row9['u_login'].')</option>';
}

?>
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
          <td>Mot de passe</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="pwd" type="text" disabled="disabled" id="pwd" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Payé à </td>
          <td><select name="Tin" id="Tin">
            <option selected="selected">100</option>
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
          <td>N°Compte CCP/BanK</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="CPP" type="text" id="CPP" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>IGR</td>
          <td><select name="igrchoix" size="1" id="igrchoix">
            <option value="0">Non</option>
            <option value="1">Oui</option>
          </select>
            Caisse de retraite
            <select name="crchoix" size="1" id="crchoix">
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
          <td>NTC </td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="NTC" type="text" id="NTC" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Statut </td>
          <td><select name="statut" id="statut">
            <option selected>Operationnel</option>
            <option>Disponibilité</option>
            <option>Fermer</option>
          </select>
            <strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer"/>
          </span></strong></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>NB: (NTC) <STRONG>Numero de Travailleur Comorien :</STRONG> C'est un numero de reference aux cotisations (Retraire &amp; IGR, etc).</p>
<p>&nbsp;</p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


	frmvalidator.addValidation("nomprenom","req","nomprenom");
    frmvalidator.addValidation("indice","req","indice");
	frmvalidator.addValidation("matricule","req","indice");
    frmvalidator.addValidation("direction","req","direction");
	
	
</script>