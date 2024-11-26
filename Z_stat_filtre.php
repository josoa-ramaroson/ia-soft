<?php
Require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
?>
<?php
Require 'fonction_niveau_statistique.php';
?>
<html>
<head>

<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<?php
Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
<?
$sql = "SELECT COUNT(*) AS actif FROM $tbl_contact  WHERE statut='6'";   
$req=mysqli_query($linki,$sql);
$data= mysqli_fetch_assoc($req);
$Actif=$data['actif'];

$sql2 = "SELECT COUNT(*) AS resilier FROM $tbl_contact  WHERE statut='7'";   
$req2=mysqli_query($linki,$sql2);
$data2= mysqli_fetch_assoc($req2);
$Resilier=$data2['resilier'];

$sql3 = "SELECT COUNT(*) AS police FROM $tbl_contact  WHERE statut='1'";   
$req3=mysqli_query($linki,$sql3);
$data3= mysqli_fetch_assoc($req3);
$ppolice=$data3['police'];

$sql4 = "SELECT COUNT(*) AS devis1 FROM $tbl_contact  WHERE statut='2'";   
$req4=mysqli_query($linki,$sql4);
$data4= mysqli_fetch_assoc($req4);
$pdevis1=$data4['devis1'];

$sql5 = "SELECT COUNT(*) AS devis2 FROM $tbl_contact  WHERE statut='3'";   
$req5=mysqli_query($linki,$sql5);
$data5= mysqli_fetch_assoc($req5);
$pdevis2=$data5['devis2'];

$sql6 = "SELECT COUNT(*) AS brancher FROM $tbl_contact  WHERE statut='4'";   
$req6=mysqli_query($linki,$sql6);
$data6= mysqli_fetch_assoc($req6);
$pbrancher=$data6['brancher'];

$sql9 = "SELECT COUNT(*) AS ffacture FROM $tbl_contact  WHERE statut='5'";   
$req9=mysqli_query($linki,$sql9);
$data9= mysqli_fetch_assoc($req9);
$ffacture=$data9['ffacture'];

$sql7 = "SELECT COUNT(*) AS bt FROM $tbl_contact  WHERE statut='6' and Tarif!='10'";   
$req7=mysqli_query($linki,$sql7);
$data7= mysqli_fetch_assoc($req7);
$cbt=$data7['bt'];

$sql8 = "SELECT COUNT(*) AS mt FROM $tbl_contact  WHERE statut='6' and Tarif='10'";   
$req8=mysqli_query($linki,$sql8);
$data8= mysqli_fetch_assoc($req8);
$cmt=$data8['mt'];

?>


<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0">
  <tr>
    <td width="96%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">INFO SUR LES CLIENTS </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0">
              <tr>
                <td width="10%">Police à payer </td>
                <td width="11%">Devis à realiser </td>
                <td width="10%">Devis realisé</td>
                <td width="12%">Client à Brancher </td>
                <td width="11%">Client à Fact</td>
                <td width="12%">Client Actif </td>
                <td width="10%">Client BT </td>
                <td width="11%">Client MT </td>
                <td width="13%">Client Resilié</td>
              </tr>
              <tr>
                <td><?php echo $ppolice;?></td>
                <td><?php echo $pdevis1;?></td>
                <td><?php echo $pdevis2;?></td>
                <td><?php echo $pbrancher;?></td>
                <td><?php echo $ffacture;?></td>
                <td><?php echo $Actif;?></td>
                <td><?php echo $cbt;?></td>
                <td><?php echo $cmt;?></td>
                <td><?php echo $Resilier;?></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="96%"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Nombres des clients selon la consommation  Kwh</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="stat_filtre_cons.php" method="post" name="form2" id="form">
              <font color="#000000">
                SUPERIEUR  A 
                
                <input type="text" name="CA" id="CA">
                Kwh ET INFERIEUR A
                 <input type="text" name="CB" id="CB"> 
                Kwh pour le Mois de 
                <select name="nserie" size="1" id="nserie">
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
                </font>Année : <font color="#000000">
                  <select name="annee" size="1" id="annee">
                    <?php
$sql82 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result82 = mysqli_query($linki,$sql82);

while ($row82 = mysqli_fetch_assoc($result82)) {
echo '<option> '.$row82['annee'].' </option>';
}
?>
                  </select>
                  &nbsp;&nbsp; </font>
              <input type="submit" name="valider5" id="valider9" value="Valider" class="btn btn-warning"/>
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="96%"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Nombres des clients selon le montant    KMF</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="stat_filtre_kmf.php" method="post" name="form2" id="form2">
              <font color="#000000"> SUPERIEUR  A
                <input type="text" name="CA" id="CA">
                KMF ET INFERIEUR A
                 <input type="text" name="CB" id="CB">
                KMF pour le Mois de
                 <select name="nserie" size="1" id="nserie">
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
                </font>Année : <font color="#000000">
                  <select name="annee" size="1" id="annee">
                    <?php
$sql82 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result82 = mysqli_query($linki,$sql82);

while ($row82 = mysqli_fetch_assoc($result82)) {
echo '<option> '.$row82['annee'].' </option>';
}
?>
                  </select>
                  &nbsp;&nbsp; </font>
              <input type="submit" name="valider" id="valider" value="Valider" class="btn btn-warning" />
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
	  mysqli_close ($linki); 
include_once('pied.php');
?>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
