<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
require 'rh_configuration_fonction.php';
?>
<?
	if((($_SESSION['u_niveau'] != 50) ) && ($_SESSION['u_niveau'] != 90)) {
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
    <td width="30%" height="180"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Direction &amp; Service <? echo $affichemois.' '.$anneepaie ; ?></h3>
      </div>
      <div class="panel-body">
        <form action="rh_bulletin_type_ds.php" method="post" name="testform" id="form1">
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td width="3%">&nbsp;</td>
              <td width="19%"><strong><font size="2">Direction</font></strong></td>
              <td width="78%"><?Php
echo "<br><select name=direction id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez une direction</option>";

$sql="select * from $tb_rhdirection "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[idrh]>$row[direction]</option>";
}
?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><strong><font size="2">Service</font></strong></td>
              <td><select name=subcat id='s2'>
              </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><strong><span style="font-size:8.5pt;font-family:Arial">
                <input type="submit" name="Submit" value="Afficher" />
              </span></strong></td>
            </tr>
          </table>
        </form>
      </div>
    </div></td>
    <td width="3%">&nbsp;</td>
    <td width="31%"><form name="form3" method="post" action="rh_bulletin_type_d.php">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Affichage par Direction <? echo $affichemois.' '.$anneepaie ; ?></h3>
        </div>
        <div class="panel-body">
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td width="12%"><strong><font size="2">Direction</font></strong></td>
              <td width="40%"><?Php
echo "<br><select name=direction id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez une direction</option>";

$sql="select * from $tb_rhdirection "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[idrh]>$row[direction]</option>";
}
?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><strong><span style="font-size:8.5pt;font-family:Arial">
                <input type="submit" name="Submit2" value="Afficher" />
              </span></strong></td>
            </tr>
          </table>
        </div>
      </div>
    </form></td>
    <td width="2%">&nbsp;</td>
    <td width="30%"><form name="form2" method="post" action="rh_bulletin_type_p.php">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Affichage par Matricule</h3>
        </div>
        <div class="panel-body">
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td width="23%"><strong><font size="2">Matricule </font></strong></td>
              <td width="77%"><input type="text" name="matricule" id="matricule"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><strong><span style="font-size:8.5pt;font-family:Arial">
                <input type="submit" name="Submit3" value="Afficher" />
              </span></strong></td>
            </tr>
          </table>
        </div>
      </div>
    </form></td>
    <td width="4%">&nbsp;</td>
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