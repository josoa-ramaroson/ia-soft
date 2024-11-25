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
    <form id="recherche-societe" name="recherche-societe" method="post" action="re_edit_modifcompt.php">
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
    <h3 class="panel-title">CHANGEMENT DE COMPTEUR </h3>
  </div>
  <div class="panel-body">
    <form action="re_edit_modifcompt_save.php" method="post" name="testform" id="form2">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%"><strong>
            <input name="id" type="hidden" id="id" value="<? echo $datam['id'];?>" size="10" readonly="readonly" />
            </strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
              <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
            </font><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="nomprenom" type="hidden" id="nomprenom" value="<? echo $datam['nomprenom'];?>" />
            </font><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="quartier" type="hidden" id="quartier" value="<? echo $datam['quartier'];?>" />
            </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></td>
          <td width="1%">&nbsp;</td>
          <td width="16%">&nbsp;</td>
          <td width="36%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">N° Phase</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="phase" type="text" disabled="disabled" id="phase" value="<? echo $datam['phase'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">N° Phase</font></strong></td>
          <td><strong>
            <select name="phase" id="phase">
              <option selected="selected"><? echo $datam['phase']; ?></option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td><strong>Puissance</strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="nomprenomi" type="text" disabled="disabled" id="nomprenomi" value="<? echo $datam['puissance'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong>Puissance</strong></td>
          <td><strong>
            <select name="puissance" id="puissance">
              <option selected="selected"><? echo $datam['puissance']; ?></option>
              <option>1</option>
              <option>2</option>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font color="#000000" size="2">Tarif</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="Tarif" type="text" disabled="disabled" id="secteur2" value="<?php
$T=$datam['Tarif'];
$sql82 = ("SELECT * FROM tarif where idt='$T'");
$result82 = mysql_query($sql82);
while ($row82 = mysql_fetch_assoc($result82)) {
echo $row82['Libelle'];
}

?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font color="#000000" size="2">Tarif</font></strong></td>
          <td><strong>
            <select name="Tarif" id="Tarif">
      
            
              <?php
			  $sql8 = ("SELECT * FROM tarif ORDER BY idt ASC");
$result8 = mysql_query($sql8);
while ($row8 = mysql_fetch_assoc($result8)) {
echo '<option value='.$row8['idt'].'> '.$row8['Libelle'].' </option>';
}

?>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Calibre ( Amperage)</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="amperage" type="text" disabled="disabled" id="amperage" value="<? echo $datam['amperage'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Calibre ( Amperage)</font></strong></td>
          <td></select><strong>
            <input name="amperage" type="text" id="amperage" value="10" size="20" />
            </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Numero Compteur</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="ncompteur" type="text" disabled="disabled" id="ncompteur" value="<? echo $datam['ncompteur'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Numero Compteur</font></strong></td>
          <td><strong>
            <input name="ncompteur" type="text" id="ncompteur" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Index de depart J</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="Indexinitial" type="text" disabled="disabled" id="Indexinitial" value="<? echo $datam['Indexinitial'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Index de depart Jour </font></strong></td>
          <td><strong>
            <input name="Indexinitial" type="text" id="Indexinitial" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Index de depart N</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="index2" type="text" disabled="disabled" id="index2" value="<? echo $datam['index2'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Index de depart</font></strong> Nuit </td>
          <td><strong>
            <input name="index2" type="text" id="index2" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Date de pose</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="datepose" type="text" disabled="disabled" id="datepose" value="<? echo $datam['datepose'];?>" size="40" readonly="readonly" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Date de pose</font></strong></td>
          <td><input name="date" type="text" id="date" value="<? echo $datecaisse['datecaisse'];?>" size="30" readonly="readonly" /></td>
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
