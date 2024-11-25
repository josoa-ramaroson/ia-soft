<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
?>
<?
if(($_SESSION['u_niveau'] != 2)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>

<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
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

</head>
<?
Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
<?
$sql = "SELECT count(*) FROM $tbl_fact  WHERE fannee='$anneec' and nserie='$nserie' and st='E' ";  

$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
 
$nb_total = mysql_fetch_array($resultat);  
 // on teste si ce nombre de vaut pas 0  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
        // premi?re ligne on affiche les titres pr?nom et surnom dans 2 colonnes
  
    
   
// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas d?j? ?t? d?clar?e, et dans ce cas, on l'initialise ? 0  
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
	// 6 maroufchangement 1 par 5
   $nb_affichage_par_page = 50; 
   
 
$sql = "SELECT  f.bstatut, c.quartier, c.ville, f.impression , COUNT(*) AS nbch  FROM  $tbl_contact c , $tbl_fact f WHERE c.id=f.id  and fannee='$anneec' and f.nserie='$nserie' and st='E' and c.statut='6' GROUP BY  c.quartier  LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC


   /*//Nombre FACTURE_ par Quartier
    $rqfact = "SELECT COUNT(quartier) AS nbfc FROM $tbl_contact c , $tbl_fact f WHERE c.id=f.id  and  nserie='$nserie' and st='E' GROUP BY  quartier"; 
	$sqnbf = mysql_query($rqfact);
	$nbfc= mysql_fetch_assoc($sqnbf);
	$nfact=$nbfc['nbfc']; 

 
    //Nombre total des clients par quartier
    $rqtfact = "SELECT COUNT(quartier) AS nbtfc FROM $tbl_contact GROUP BY  quartier"; 
	$sqtnbf = mysql_query($rqtfact);
	$nbtfc= mysql_fetch_assoc($sqtnbf);
	$ntclient=$nbtfc['nbtfc']; */
	
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
?>
 
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0">
  <tr>
    <td width="60%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Impression par Ville et Quartier</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="impression_fact.php" method="post" name="testform" id="testform">
                  <strong>Ville</strong> :
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
                  <input type="submit" name="Submit4" class="btn btn-sm btn-default"  value="Imprimer" />
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="2%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="36%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Id_Client,Ville, Quartier, Nom , Tel , Adresse, Plc</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form name="form1" method="post" action="imp_chercher.php">
       <label for="mr1"></label>
       <input name="mr1" type="text" id="mr1" size="30">
       <input type="submit" name="Cherchez " id="Cherchez " class="btn btn-sm btn-default"value="Chercher">
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
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
      <tr bgcolor="#0000FF">
        <td width="293" align="center" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="4">Ville</font></strong></td>
        <td width="379" align="center" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="4">Quartier</font></strong></td>
        <td width="427" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Suivi des impressions ( MT &amp; AUTRES)</strong></font></td>
      </tr>
      <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
       <tr bgcolor="<? gettatut($data['bstatut']); ?>">
        <td align="center"><? echo  $data['ville']; ?></td>
        <td align="center"><? echo  $data['quartier']; ?></td>
        <td align="center"><? echo  $data['impression']; ?> (<? echo  $data['nbch']; ?>)</td>
      </tr>
      <?php


}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  


mysql_close ();  

	                 function gettatut($fetat){
				   if ($fetat=='imprimé')         { echo $couleur="#fdff00";}//jaune		 
				 //if ($fetat=='enregistre')    { echo $couleur="#87e385";}//jaune	
				 //if ($fetat=='confirme')      { echo $couleur="#87e385";}//vert fonce
				 //if ($fetat=='transfert')     { echo $couleur="#fdff00";}//jaune
				// if ($fetat=='réservation')   { echo $couleur="#ffc88d";}//orange
				// if ($fetat=='Rembourser')    { echo $couleur="#ec9b9b";}//rouge -Declined				 
				// if ($fetat=='Annuler')       { echo $couleur="#ec9b9b";}//orange
				 }
?>
    </table>

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
