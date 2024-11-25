<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');

	$sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);
	
?>
<?
	if($_SESSION['u_niveau'] != 42) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
<? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
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
// Remove the options from 2nd dropdown list 
for(j=document.form1.prix.options.length-1;j>=0;j--)
{
document.form1.prix.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].prix;
optn.value = myarray.data[i].prix;  // You can change this to subcategory 
document.form1.prix.options.add(optn);

} 
      }
    } // end of function stateck
	var url="stk_vente_fonction_montant.php";
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
require 'bienvenue.php';   
?>
<body>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="47%" bgcolor="#0066FF"><font color="#CCCCCC" size="4"><strong>Vendre 
      un produit</strong></font></td>
  </tr>
  <tr>
    <td><form action="stk_ventesave.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="16%">&nbsp;</td>
          <td width="26%">&nbsp;</td>
          <td width="19%">&nbsp;</td>
          <td width="39%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font color="#000000">Date</font><font color="#FF0000">* </font></strong></td>
          <td><input name="datev" type="text" id="datev" value="<? echo $datecaisse['datecaisse'];?>" size="30" readonly />
<div align="right"></div>
            <div align="center"></div></td>
          <td><strong><font color="#000000">Quantit&eacute;</font></strong><font color="#FF0000">*</font><strong><font color="#FF0000"> </font></strong></td>
          <td><input name="Qvente" type="text" id="Qvente2" value="" size="30" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font color="#000000">Produit</font><font color="#FF0000">*</font></strong></td>
          <td>           
            <?Php
echo "<br><select name=idproduit id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez un produit</option>";

$sql="select * from $tbl_produit where type=0 ORDER BY titre  ASC "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
	
echo "<option value=$row[idproduit]>$row[titre]</option>";
}
?></td>
          <td><strong>Prix Unitaire <font color="#FF0000">*</font></strong></td>
          <td><select name=prix id='s2'>
          </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><font size="2"><strong><font size="2"><strong><font color="#FF0000"> </font></strong></font></strong></font></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Nom du client<font color="#FF0000">*</font><font color="#FF0000"> </font></strong></td>
          <td><select name="nc" id="select3">
            <?php

$sql4 = "SELECT *  FROM $tbl_contact where statut='2' ORDER BY nomprenom   ASC ";
$result4 = mysql_query($sql4);
while ($row4 = mysql_fetch_assoc($result4)) {
echo '<option value='.$row4['id'].'>'.$row4['nomprenom'].'</option>';
}

?>
          </select></td>
          <td><strong>Succursale <font color="#FF0000">*</font></strong></td>
          <td><select name="a_nom" id="a_nom">
            <option selected="selected">Mutsamudu</option>
          </select>
            <input type="submit" name="Submit" value="Enregistrer" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom2" value="<? echo $id_nom; ?>" />
          </font></strong></font></strong></font></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<p><font size="2"><font size="2"><font size="2">
  <?php

$sql = "SELECT count(*) FROM $tbl_vente where '500000'>=nc ";  


$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 

$nb_total = mysql_fetch_array($resultat);  

if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 

if (!isset($_GET['debut'])) $_GET['debut'] = 0; 

   $nb_affichage_par_page =50; 
   

$sql = "SELECT * FROM $tbl_vente  where '500000'>=nc ORDER BY idvente  DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;   
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="20%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="4">Vendeur 
      - Nclient</font></td>
    <td width="13%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="4"><strong>Date</strong></font><font color="#CCCCCC" size="3"><strong> </strong></font></td>
    <td width="32%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Produit </strong></font></td>
    <td width="10%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Quantite</strong></font></td>
    <td width="11%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Prix 
      Unitaire </strong></font></td>
    <td width="14%" align="center" bgcolor="#0066FF"><font color="#CCCCCC" size="3"><strong>Prix 
      Total </strong></font></td>
  </tr>
  <?php
while($data=mysql_fetch_array($req)){
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><? echo $data['id_nom'];?>/<? echo $data['nc'];?></div>
      <div align="left"></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><? echo $data['datev'];?></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['titre'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="center"><em><? echo $data['Qvente'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="center"><em><? echo strrev(chunk_split(strrev($data['PUnitaire']),3," ")) ?> </em></div></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo strrev(chunk_split(strrev($data['PTotal']),3," ")) ?></em></td>
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
<p></p>
<p>&nbsp;</p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve">//<![CDATA[
  var frmvalidator  = new Validator("form1");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("date","req","SVP enregistre le libelle");
	frmvalidator.addValidation("date","req"," SVP enregistre la date");
	frmvalidator.addValidation("Quantite","req"," SVP enregistre la Quantite");
	frmvalidator.addValidation("PrixUnitaire","req","SVP enregistre PrixUnitaire");
//]]></script>