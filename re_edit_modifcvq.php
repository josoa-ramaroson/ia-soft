<?
require 'session.php';
require 'fonction.php';
require 'configuration.php';
?>
<?
	if($_SESSION['u_niveau'] != 1) {
	header("location:index.php?error=false");
	exit;
 }
?>
<?php
require_once('calendar/classes/tc_calendar.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
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
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="js/validator.js"></script>
</head>
<?
require 'bienvenue.php';    // on appelle la page contenant la fonction
	$sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Identification du client  :</h3>
  </div>
  <div class="panel-body">
    <form id="recherche-societe" name="recherche-societe" method="post" action="re_edit_modifcvq.php">
      <table width="100%" border="0">
        <tr>
          <td width="9%"><strong><font size="2">ID_Client </font></strong></td>
          <td width="11%"><strong>
            <input name="id" type="text" class="form-control" id="id" size="20" />
          </strong></td>
          <td width="2%">&nbsp;</td>
         <td width="78%"><strong>
           <input type="submit" name="Valider" id="envoyer" value="Chercher " />
         </strong>           <?php
		 
		        $id = 0;
                if (isset($_REQUEST["id"]))
                $id = $_REQUEST["id"];
$sql = "SELECT * FROM $tbl_contact where id='$id' and statut='6'";
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$datam=mysql_fetch_array($req);
?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<table width="100%" border="0" align="center">
                  <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information de la personne  </font></strong></div></td>
  </tr>
  <tr>
    <td height="107"><form action="re_enregistrement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="11%">ID_CLIENT</td>
          <td width="1%">&nbsp;</td>
          <td width="35%"><strong>
            <? echo $datam['id'];?>
            </strong></td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Designation</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
           <? echo $datam['Designation'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font color="#000000" size="2">Ville</font></strong></td>
          <td><strong>
           <? echo $datam['ville'];?>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['nomprenom'];?>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Quartier</font></strong></td>
          <td><strong>
            <? echo $datam['quartier'];?>
          </strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">TRANSFERT DE COMPTEUR</h3>
  </div>
  <div class="panel-body">
    <form action="re_edit_modifcvq_save.php" method="post" name="testform" id="form2">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%"><strong>
            <input name="id" type="hidden" id="id" value="<? echo $datam['id'];?>" size="10" readonly="readonly" />
            </strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
              <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
            </font><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="nomprenom" type="hidden" id="nomprenom" value="<? echo $datam['nomprenom'];?>" />
            </font><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="Tarif" type="hidden" id="Tarif" value="<? echo $datam['Tarif'];?>" />
            </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Designation</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <select name="Designation" id="Designation">
              <option>Mr</option>
              <option>Mme</option>
              <option>Mlle</option>
              <option>Dr</option>
            </select>
          </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="nomprenomi" type="text" disabled="disabled" id="nomprenomi" value="<? echo $datam['nomprenom'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Date </td>
          <td><input name="date" type="text" id="date" value="<? echo $datecaisse['datecaisse'];?>" size="30" readonly="readonly" /></td>
        </tr>
        <tr>
          <td><strong><font size="2">Secteur</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="secteuri" type="text" disabled="disabled" id="secteur2" value="<? echo $datam['secteur'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Ville</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="villei" type="text" disabled="disabled" id="villei" value="<? echo $datam['ville'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Ville</font></strong></td>
          <td><?Php
require "fonction.php";// connection to database 

echo "<select name=refville id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez une ville</option>";

$sql="select * from ville "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[refville]>$row[ville]</option>";
}
?>
            </select>
            &nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Quartier</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="q2" type="text" disabled="disabled" id="q2" value="<? echo $datam['quartier'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
          <td><select name="quartier" id='s2'>
          </select>
            &nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer" />
          </span></strong></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
