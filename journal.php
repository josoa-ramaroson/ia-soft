<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
?>
<?
if(($_SESSION['u_niveau'] != 2) && ($_SESSION['u_niveau'] != 5) && ($_SESSION['u_niveau'] != 43) && ($_SESSION['u_niveau'] != 8)&& ($_SESSION['u_niveau'] != 3) && ($_SESSION['u_niveau'] != 90) && ($_SESSION['u_niveau'] != 91) && ($_SESSION['u_niveau'] != 80)&& ($_SESSION['u_niveau'] != 46) ) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>

<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.centrevaleur {
	text-align: center;
}
.centrevaleur td {
	text-align: center;
}
.taille16 {	font-size: 16px;
}
</style>
<script language="javascript" src="calendar/calendar.js"></script>
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

//--------- Pour le champs il y a 3 document.testform.quartier.options
for(j=document.testform.quartier.options.length-1;j>=0;j--)
{
//--------- Pour le champs il y a document.testform.quartier.options
document.testform.quartier.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");

//le champs quartier qui est dans la table quartier
optn.text = myarray.data[i].quartier;
optn.value = myarray.data[i].id_quartier;  // You can change this to subcategory 

//--------- Pour le champs il y a 3 document.testform.quartier.options 
document.testform.quartier.options.add(optn);

} 
      }
    } // end of function stateck
	var url="fonction_dvq.php";

//le champs ville qui se trouve dans la table Ville
var refville=document.getElementById('s1').value;
url=url+"?refville="+refville;
//-------------------------------------
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>

</head>
<?
Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
 
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
    <form action="paiement_apercu.php" method="post" name="form1" id="form2">
      <a href="re_nombreclientville.php" class="btn btn-sm btn-success" >Nombre des clients / Ville</a> |
      <a href="re_nombreclient.php" class="btn btn-sm btn-success" >Nombre des clients / Quartier </a> |
      <a href="re_nombrekwhsoft.php" class="btn btn-sm btn-success" target="_blank" > K W H </a> |
      <a href="rapport_facturationimpBT.php" class="btn btn-sm btn-success" target="_blank" > KWh BT</a> |
      <a href="rapport_facturationimpMT.php" class="btn btn-sm btn-success" target="_blank" > KWh MT </a> |
      <a href="rapport_facturationimpBTd.php" class="btn btn-sm btn-success" target="_blank" > KWh BT Détail</a> |
      <a href="rapport_facturationimpMTd.php" class="btn btn-sm btn-success" target="_blank" > KWh MT Détail</a> |
      <a href="co_categorie.php" class="btn btn-sm btn-success" > Facturation / Etablissement</a> |
	  
	  <? if ($_SESSION['u_niveau']== 3){?>
      <a href="rapport_penalite.php" class="btn btn-sm btn-success" > Recouvrement Penalité 1000 </a> |
	   <? } else { }?>
	  
      <? if ($_SESSION['u_niveau']== 2){?>
      <a href="client_demande_suvi.php" class="btn btn-sm btn-success" > Demande des clients </a> |
      <? } else { }?>
    </form>
  </div>
</div>
<table width="100%" border="0">
  <tr>
    <td width="52%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Journal de vente par Ville et Quartier</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="journal_vente.php" method="post" name="testform" id="form3">
                  <strong>Ville</strong> :
                  <?Php
require "fonction.php";// connection to database 

echo "<select name=refville id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez une ville</option>";

$sql="select * from ville "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[refville]>$row[ville]</option>";
}
?></select>
<strong>Quartier</strong>
                  : 
                  <select name=quartier id='s2'>
                  </select>
                  <input type="submit" name="Submit4" class="btn btn-sm btn-default" value="Chercher" />
                  
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="2%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="44%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Recapitulatif des Facturations </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="rapport_facturation.php" method="post" name="form2" id="form">
              <font color="#000000">
                <select name="nserie" size="1" id="nserie">
                  <option value="1" selected>Janvier</option>
                  <option value="2">Février</option>
                  <option value="3">Mars</option>
                  <option value="4">Avril</option>
                  <option value="5">Mai</option>
                  <option value="6">Juin</option>
                  <option value="7">Juillet</option>
                  <option value="8">Août</option>
                  <option value="9">Septembre</option>
                  <option value="10">Octobre</option>
                  <option value="11">Novembre</option>
                  <option value="12">Décembre</option>
                </select>
                </font>Année : <font color="#000000">
                  <select name="annee" size="1" id="annee">
                    <?php
$sql82 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result82 = mysql_query($sql82);

while ($row82 = mysql_fetch_assoc($result82)) {
echo '<option> '.$row82['annee'].' </option>';
}
?>
                  </select>
                  &nbsp;&nbsp; </font>
              <input type="submit" name="valider5" id="valider9" value="Valider" />
            </form></td>
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
    <td><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Journal de vente par mois      </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="journal_vente_mois.php" method="post" name="form2" id="form4">
              <font color="#000000">
                <select name="nseriechoix" size="1" id="nseriechoix">
                  <option value="1" selected>Janvier</option>
                  <option value="2">Février</option>
                  <option value="3">Mars</option>
                  <option value="4">Avril</option>
                  <option value="5">Mai</option>
                  <option value="6">Juin</option>
                  <option value="7">Juillet</option>
                  <option value="8">Août</option>
                  <option value="9">Septembre</option>
                  <option value="10">Octobre</option>
                  <option value="11">Novembre</option>
                  <option value="12">Décembre</option>
                </select>
              </font><font color="#000000">&nbsp;Secteur 
              <select name="ref_com" size="1" id="ref_com">
                <?php
$sql83 = ("SELECT * FROM commune  ORDER BY commune ASC ");
$result83 = mysql_query($sql83);

while ($row83 = mysql_fetch_assoc($result83)) {
echo '<option value= '.$row83['ref_com'].'> '.$row83['commune'].' </option>';
}
?>
              </select>
              </font>
                <input type="submit" name="valider" id="valider" value="Valider" />
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">ARCHIVES DES RECAPITULATIF DES FACTURATIONS</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="z_rapport_facturation.php" method="post" name="form2" id="form">
              <font color="#000000">
                <select name="nserie" size="1" id="nserie">
                  <option value="1">Janvier</option>
                  <option value="2">Février</option>
                  <option value="3">Mars</option>
                  <option value="4">Avril</option>
                  <option value="5">Mai</option>
                  <option value="6">Juin</option>
                  <option value="7">Juillet</option>
                  <option value="8">Août</option>
                  <option value="9">Septembre</option>
                  <option value="10">Octobre</option>
                  <option value="11">Novembre</option>
                  <option value="12">Décembre</option>
                </select>
                </font>Année : <font color="#000000">
                  <select name="annee" size="1" id="annee">
                    <?php
$sql82 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result82 = mysql_query($sql82);

while ($row82 = mysql_fetch_assoc($result82)) {
echo '<option> '.$row82['annee'].' </option>';
}
?>
                  </select>
                  &nbsp;&nbsp; </font>
              <input type="submit" name="valider5" id="valider9" value="Valider" />
            </form></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p></p>
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
