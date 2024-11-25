<?
require 'session.php';
require 'fonction.php';
require 'fc-affichage.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
	if($_SESSION['u_niveau'] != 40) {
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
require 'bienvenue.php';    // on appelle la page contenant la fonction
	$sqldate="SELECT * FROM $tbl_app_caisse"; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Ordre de service ( Bon de commande)</h3>
  </div>
  <div class="panel-body">
    <form action="app_bonachat_save.php" method="post" name="testform" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%"><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          </font><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
          </font></strong></font></strong></font></strong></font></strong></font></strong></font></td>
        </tr>
        <tr>
          <td><strong><font size="2">Date</font></strong></td>
          <td>&nbsp;</td>
          <td><input name="date_dem" type="text" id="date_dem" value="<? echo $datecaisse['datecaisse'];?>" size="30" readonly /></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Direction</font></strong></td>
          <td><?Php
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
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Fournisseur </strong></td>
          <td>&nbsp;</td>
          <td><font color="#000000">
            <select name="fournisseur" size="1" id="fournisseur">
              <?php
$sqlS = ("SELECT * FROM $tb_comptf  ORDER BY Societef ASC ");
$resultS = mysql_query($sqlS);

while ($rowS = mysql_fetch_assoc($resultS)) {
echo '<option> '.$rowS['Societef'].' </option>';
}
?>
            </select>
          </font></td>
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
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer" class="btn btn-sm btn-primary"/>
          </span></strong></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p><font size="2"><font size="2"><font size="2">
<?php

mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");
  
$sql = "SELECT count(*) FROM $tbl_appbonachat where statut='Traitement'";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
 
$nb_total = mysql_fetch_array($resultat);  

if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    

   $nb_affichage_par_page = 10; 
   

$sql = "SELECT * FROM $tbl_appbonachat  where statut='Traitement' ORDER BY id_dem DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 

$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<form name="form2" method="post" action="produit_cancel.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#FFFFFF">
      <td width="64" align="center" bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
      <td width="266" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Date </font></td>
      <td width="313" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">Fournisseur</font></td>
      <td width="192" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">Direction </font></td>
      <td width="162" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">Service </font></td>
      <td width="163" align="center" bgcolor="#3071AA" >&nbsp;</td>
      <td width="163" align="center" bgcolor="#3071AA" >&nbsp;</td>
    </tr>
    <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><? echo $data['id_dem'];?></div>
        <div align="left"></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['date_dem'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['fournisseur'];?></em></div></td>
      <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['direction'];?></em></div></td>
      <td width="162"   style="background-color:#FFF;"><div align="left"><em><? echo $data['service'];?></em></div></td>
      <td width="163"   style="background-color:#FFF;"><a href="app_bonachat_produit.php?id=<? echo md5(microtime()).$data['id_dem']; ?>" class="btn btn-xs btn-success">Ajouter des produits</a></td>
      <td width="163"   style="background-color:#FFF;"><a href="app_bonachat_archive.php?ID=<? echo md5(microtime()).$data['id_dem']; ?>" onClick="return confirm('Etes-vous sûr de vouloir Archiver ')" ; style="margin:5px"   class="btn btn-xs btn-danger" >Archiver</a></td>
    </tr>
    <?php

}

mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
?>
  </table>
</form>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="21"><?php
include_once('pied.php');
?></td>
  </tr>
</table>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


	frmvalidator.addValidation("nomprenom","req","nomprenom");
    frmvalidator.addValidation("direction","req","direction");
	
</script>