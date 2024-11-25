<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
	if($_SESSION['u_niveau'] != 1) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
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
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?
require 'bienvenue.php';    // on appelle la page contenant la fonction
require 'fonction.php';
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tbl_contact WHERE id='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">TRANSFERT DECOMPTEUR</h3>
  </div>
  <div class="panel-body">
    <form action="re_edit_modif_save_cvq.php" method="post" name="testform" id="form2">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%"><strong>
            <input name="id" type="hidden" id="id" value="<? echo $datam['id'];?>" size="10" readonly />
          </strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
          <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          </font></strong></font></strong></font></td>
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
            <input name="nomprenomi" type="text" disabled id="nomprenomi" value="<? echo $datam['nomprenom'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Secteur</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="secteuri" type="text" disabled id="secteur2" value="<? echo $datam['secteur'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Ville</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="villei" type="text" disabled id="villei" value="<? echo $datam['ville'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Ville</font></strong></td>
          <td>  <?Php
require "fonction.php";// connection to database 

echo "<select name=refville id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez une ville</option>";

$sql="select * from ville "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[refville]>$row[ville]</option>";
}
?>
</select>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Quartier</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="q2" type="text" disabled id="q2" value="<? echo $datam['quartier'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
          <td><select name=quartier id='s2'>

</select>&nbsp;</td>
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
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">CHANGEMENT DE NOM</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0">
      <tr>
        <td width="50%"><form action="re_edit_modif_save_nom.php" method="post" name="form2" id="form">
          <table width="100%" border="0">
            <tr>
              <td width="7%">&nbsp;</td>
              <td width="27%">&nbsp;</td>
              <td width="13%">&nbsp;</td>
              <td width="28%"><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
              </font>
                        <input name="id" type="hidden" id="id" value="<? echo $datam['id'];?>" size="10" readonly />
                  <font size="2"><strong>
                        <input name="quartier" type="hidden" id="quartier" value="<? echo $datam['quartier'];?>" size="10" readonly />
                  <font size="2"><strong><font size="2"><strong>
                        <input name="ville" type="hidden" id="ville" value="<? echo $datam['ville'];?>" size="10" readonly />
                  <font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong>
                        <input name="statut" type="hidden" id="statut" value="<? echo $datam['statut'];?>" size="10" readonly />
                </strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></td>
              <td width="25%">&nbsp;</td>
            </tr>
            <tr>
              <td><strong><font size="2">Designation</font></strong></td>
              <td><strong>
                <select name="Designation2" id="Designation2">
                  <option selected="selected"><? echo $datam['Designation'];?></option>
                  <option>Mr</option>
                  <option>Mme</option>
                  <option>Mlle</option>
                  <option>Dr</option>
                </select>
              </strong></td>
              <td><strong><font size="2">Designation</font></strong></td>
              <td><strong>
                <select name="Designation3" id="Designation3">
                  <option>Mr</option>
                  <option>Mme</option>
                  <option>Mlle</option>
                  <option>Dr</option>
                </select>
              </strong></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><strong>Nom</strong></td>
              <td><strong>
                <input name="nomprenom2" type="text" disabled id="nomprenom2" value="<? echo $datam['nomprenom'];?>" size="40" readonly />
              </strong></td>
              <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
              <td><strong>
                <input name="nomprenom" type="text" id="nomprenom" size="40" />
              </strong></td>
              <td><strong><span style="font-size:8.5pt;font-family:Arial">
                <input type="submit" name="Submit2" value="Enregistrer" />
              </span></strong></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>