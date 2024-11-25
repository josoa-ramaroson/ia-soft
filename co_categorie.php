<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
?>
<?
	if(($_SESSION['u_niveau'] != 2) && ($_SESSION['u_niveau'] != 5) && ($_SESSION['u_niveau'] != 43) && ($_SESSION['u_niveau'] != 8) && ($_SESSION['u_niveau'] != 3)    && ($_SESSION['u_niveau'] != 90)  && ($_SESSION['u_niveau'] != 91)  && ($_SESSION['u_niveau'] != 80)&& ($_SESSION['u_niveau'] != 46)  ) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>

<<title><? include("titre.php"); ?></title>
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
<table width="100%" border="0">
  <tr>
    <td width="68%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Journal de vente par Ville &amp; Quartier et Categorie</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="journal_vente_categorie.php" method="post" name="testform" id="form3">
                  <strong>
Etablissement : 
<select name="CodeTypeClts" id="CodeTypeClts">
  <?php
$sql81 = ("SELECT * FROM $tbl_client ORDER BY idtclient ASC");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option value='.$row81['idtclient'].'> '.$row81['TypeClts'].' </option>';
}

?>
</select>
Ville</strong> :
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
                  <input type="submit" name="Submit4" class="btn btn-sm btn-default" value="Afficher" />
                  
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="30%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Recapitulatif par Categorie</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="journal_vente_categorie_detail.php" method="post" name="form3" id="form6">
                  &nbsp;
                  <strong>
                  <select name="CodeTypeClts" id="CodeTypeClts">
                    <?php
$sql81 = ("SELECT * FROM $tbl_client ORDER BY idtclient ASC");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option value='.$row81['idtclient'].'> '.$row81['TypeClts'].' </option>';
}

?>
                  </select>
                  </strong>
                  <input type="submit" name="valider6" id="valider4" value="Valider" />
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
<p></p>
<table width="100%" border="0">
  <tr>
    <td width="62%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="30%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Recapitulatif par Tarif</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="journal_vente_categorie_tarif.php" method="post" name="form3" id="form2">
                  &nbsp; <strong>
                    <select name="tarif" id="tarif">
                      <?php
$sql81 = ("SELECT * FROM tarif ORDER BY idt ASC");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option value='.$row81['idt'].'> '.$row81['Libelle'].' </option>';
}

?>
                    </select>
                    </strong>
                  <input type="submit" name="valider" id="valider" value="Valider" />
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
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
