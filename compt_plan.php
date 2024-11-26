<?php
Require 'session.php';
require 'fonction.php';
?>
<?php
 if($_SESSION['u_niveau'] != 20) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
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
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
    <form action="paiement_apercu.php" method="post" name="form1" id="form">
      <a href="compt_compte.php" class="btn btn-sm btn-success" >Compte </a> | 
      <a href="compt_plan.php" class="btn btn-sm btn-success" >Plan Comptable </a> |
	   <a href="compt_depense_debiter_tva.php" class="btn btn-sm btn-success"> Depenses </a>| 
	     <a href="compt_recette_crediter_tva.php" class="btn btn-sm btn-success"> Recettes</a> | 
      <a href="compt_rapport.php" class="btn btn-sm btn-success"> Situation/date</a> | 
      <a href="compt_rapport_mois.php" class="btn btn-sm btn-success"> Situation/Mois</a> | 
      <a href="compt_rapport_annee.php" class="btn btn-sm btn-success"> Situation/Annee</a> | 
      <a href="#" class="btn btn-sm btn-success"> Documents comptables & Fiscaux </a> | 
    </form>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">Le Plan Comptable 
      <?php
$req1="SELECT * FROM $plan  ";
$req=mysqli_query($linki,$req1);
?>
    </h3>
  </div>
  <div class="panel-body">
    
    <table width="100%" border="0" align="center">
      <tr> 
        <td width="84%"> <div align=""> 
            <form action="compt_plan_chercher.php" method="post" name="testform" id="form2">
<?php require 'compt_plan_listecompte.php'; ?>
            </form>
          </div></td>
      </tr>
      <tr> 
        <td><form name="form2" method="post" action="formationsupprime1_question.php">
          </form></td>
      </tr>
    </table>
  </div>
</div>
<h1 align="center"><img src="images/gestioncompte.png" width="630" height="189"></h1>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">
      <?php
include_once('pied.php');
?>
    </div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
</table>
<p align="center">&nbsp;</p>
</body>
</html>