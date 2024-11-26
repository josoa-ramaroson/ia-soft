<?php
Require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
require 'rh_configuration_fonction.php';
?>
<?php
 if((($_SESSION['u_niveau'] != 50) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
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
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<table width="100%" border="0">
  <tr>
    <td width="39%" height="65">
        <form action="rh_employer_paie_global_save.php" method="post" name="testform" id="form1">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Choisir la periode que le systeme doit tenir compte</h3>
            </div>
            <div class="panel-body">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
                <tr>
                  <td width="47%"> Mois : <font color="#000000">
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
                    </font> <font color="#000000">
                      <select name="annee" size="1" id="annee">
                        <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                      </select>
                      </font>
                    <input type="submit" name="valider4" id="valider5" value="Valider" />
                    <em><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                    <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
                    </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></em></td>
                </tr>
              </table>
            </div>
          </div>
        </form>
</td>
    <td width="1%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="53%">Apres, on peut proceder aux modifications pour ceux qui doivent subir des mises à jours </td>
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
   frmvalidator.addValidation("mois","req","mois");
   frmvalidator.addValidation("annee","req","annee");
</script>
