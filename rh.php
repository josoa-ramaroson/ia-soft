<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<html>
<head>
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
for(j=document.testform.prix.options.length-1;j>=0;j--)
{
document.testform.prix.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].prix;
optn.value = myarray.data[i].idproduit;  // You can change this to subcategory 
document.testform.prix.options.add(optn);

} 
      }
    } // end of function stateck
	var url="vente_fonction_montant.php";
var idproduit=document.getElementById('s1').value;
url=url+"?idproduit="+idproduit;
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
    <form action="rh_employer_save.php" method="post" name="testform" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="1%">&nbsp;</td>
          <td width="12%"><strong><font size="2">Direction</font></strong></td>
          <td width="40%"><?Php
echo "<br><select name=idproduit id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez un produit</option>";

$sql="select * from $tbl_produit "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[idproduit]>$row[titre]</option>";
}
?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><strong><font size="2">Service</font></strong></td>
          <td><select name=prix id='s2'>
          </select>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer"/>
          </span></strong></td>
        </tr>
      </table>
    </form>
</body>
</html>
