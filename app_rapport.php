<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
require 'rh_configuration_fonction.php';
?>
<?
	if((($_SESSION['u_niveau'] != 40) ) && ($_SESSION['u_niveau'] != 90)) {
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
<table width="100%" border="0">
  <tr>
    <td width="8%" height="65">&nbsp;</td>
    <td width="37%"><form name="form3" method="post" action="app_rapport_mois.php">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Rapport des achats par mois </h3>
        </div>
        <div class="panel-body"><font color="#000000">
          <select name="mois" size="1" id="mois">
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
        </font><font color="#000000">
        <select name="annee" size="1" id="annee">
          <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
        </select>
        </font>
<input name="valider4" type="submit" id="valider5" value="Valider" />
        </div>
      </div>
    </form></td>
    <td width="5%">&nbsp;</td>
    <td width="42%"><form name="form2" method="post" action="app_rapport_annee.php">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Rapport des Achats par année </h3>
        </div>
        <div class="panel-body"><font color="#000000">
          <select name="annee" size="1" id="annee">
            <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
          </select>
          &nbsp;&nbsp; </font>
          <input type="submit" name="valider5" id="valider9" value="Valider" />
        </div>
      </div>
    </form></td>
    <td width="8%">&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="72">&nbsp;</td>
    <td><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Rapport des achats par date</h3>
      </div>
      <div class="panel-body">
        <form action="app_rapport_date.php" method="post" name="testform" id="form1">
          <?php
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
          <input name="valider" type="submit" id="valider" value="Valider" />
        </form>
      </div>
    </div></td>
    <td>&nbsp;</td>
    <td><form name="form2" method="post" action="app_aut_affichage.php">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Rapport des autorisations des depenses</h3>
        </div>
        <div class="panel-body">
          <select name="service" id="service">
            <option selected>Administratif</option>
            <option>Commercial</option>
            <option>Distribution</option>
            <option>Production</option>
          </select>
          <font color="#000000">
          <select name="mois" size="1" id="mois">
            <option value="1">Janvier</option>
            <option value="2">F&eacute;vrier</option>
            <option value="3">Mars</option>
            <option value="4">Avril</option>
            <option value="5">Mai</option>
            <option value="6">Juin</option>
            <option value="7">Juillet</option>
            <option value="8">Ao&ucirc;t</option>
            <option value="9">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">D&eacute;cembre</option>
          </select>
          </font> <font color="#000000">
          <select name="annee" size="1" id="annee">
            <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
          </select>
          </font>
          <input type="submit" name="valider2" id="valider2" value="Valider" />
        </div>
      </div>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="65">&nbsp;</td>
    <td><form name="form2" method="post" action="app_rapport_annee_commande_dir_service.php">
      <div class="panel panel-primary">
        <div class="panel-heading"><span class="panel-title">Detail demande de commande (ANNEE - DIR - SERVICE)</span></div>
        <div class="panel-body"><font color="#000000">
          <select name="annee" size="1" id="annee">
            <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
          </select>
          &nbsp;&nbsp; </font>
          <input type="submit" name="valider3" id="valider3" value="Valider" />
        </div>
      </div>
    </form></td>
    <td>&nbsp;</td>
    <td><form name="form2" method="post" action="app_rapport_annee_achat_dir_service.php">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Detail demande d' Achats (ANNEE - DIR - SERVICE)</h3>
        </div>
        <div class="panel-body"><font color="#000000">
          <select name="annee" size="1" id="annee">
            <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
          </select>
          &nbsp;&nbsp; </font>
          <input type="submit" name="valider5" id="valider9" value="Valider" />
        </div>
      </div>
    </form></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
   frmvalidator.addValidation("direction","req","direction");
	
	
</script><script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form3");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
   frmvalidator.addValidation("direction","req","direction");
	
	
</script>

</script><script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form2");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
   frmvalidator.addValidation("matricule","req","direction");
	
	
</script>