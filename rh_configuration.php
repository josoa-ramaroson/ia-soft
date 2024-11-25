<?
Require("session.php"); 
require_once('calendar/classes/tc_calendar.php');
?>
<?
if(($_SESSION['u_niveau'] != 50)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<?php

function barre_navigation ($nb_total,$nb_affichage_par_page,$debut,$nb_liens_dans_la_barre) { 
    $barre = ''; 

   if ($_SERVER['QUERY_STRING'] == "") { 
      $query = $_SERVER['PHP_SELF'].'?debut='; 
   } 
   else { 
      $tableau = explode ("debut=", $_SERVER['QUERY_STRING']); 
      $nb_element = count ($tableau); 

      if ($nb_element == 1) { 
         $query = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&debut='; 
      } 
      else { 
         if ($tableau[0] == "") { 
            $query = $_SERVER['PHP_SELF'].'?debut='; 
         } 
         else { 
            $query = $_SERVER['PHP_SELF'].'?'.$tableau[0].'debut='; 
         } 
      } 
   } 
   

   $page_active = floor(($debut/$nb_affichage_par_page)+1); 

   $nb_pages_total = ceil($nb_total/$nb_affichage_par_page); 

   if ($nb_liens_dans_la_barre%2==0) { 
      $cpt_deb1 = $page_active - ($nb_liens_dans_la_barre/2)+1; 
      $cpt_fin1 = $page_active + ($nb_liens_dans_la_barre/2); 
   } 
   else { 
      $cpt_deb1 = $page_active - floor(($nb_liens_dans_la_barre/2)); 
      $cpt_fin1 = $page_active + floor(($nb_liens_dans_la_barre/2)); 
   } 

   if ($cpt_deb1 <= 1) { 
      $cpt_deb = 1; 
      $cpt_fin = $nb_liens_dans_la_barre; 
   } 

   elseif ($cpt_deb1>1 && $cpt_fin1<$nb_pages_total) { 
      $cpt_deb = $cpt_deb1; 
      $cpt_fin = $cpt_fin1; 
   } 
   else { 
       $cpt_deb = ($nb_pages_total-$nb_liens_dans_la_barre)+1; 
      $cpt_fin = $nb_pages_total; 
   } 
 
  if ($nb_pages_total <= $nb_liens_dans_la_barre) { 
  	// 4 maroufchangement 1 par 4
      $cpt_deb=1; 
      $cpt_fin=$nb_pages_total; 
   } 
   

   if ($cpt_deb != 1) { 
      $cible = $query.(0); 
      $lien = '<A HREF="'.$cible.'">&lt;&lt;</A>&nbsp;&nbsp;'; 
   } 
   else { 
      $lien=''; 
   } 
   $barre .= $lien; 

   for ($cpt = $cpt_deb; $cpt <= $cpt_fin; $cpt++) { 
      if ($cpt == $page_active) { 
         if ($cpt == $nb_pages_total) { 
            $barre .= $cpt; 
         } 
         else { 
            $barre .= $cpt.'&nbsp;-&nbsp;'; 
         } 
      } 
      else { 
         if ($cpt == $cpt_fin) { 
            $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
            $barre .= "'>".$cpt."</A>"; 
         } 
         else { 
            
            $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
            $barre .= "'>".$cpt."</A>&nbsp;-&nbsp;"; 
         } 
      } 
   } 
   
   $fin = ($nb_total - ($nb_total % $nb_affichage_par_page)); 
   if (($nb_total % $nb_affichage_par_page) == 0) { 
      $fin = $fin - $nb_affichage_par_page; 
   } 

   if ($cpt_fin != $nb_pages_total) { 
      $cible = $query.$fin; 
      $lien = '&nbsp;&nbsp;<A HREF="'.$cible.'">&gt;&gt;</A>'; 
   } 
   else { 
      $lien=''; 
   } 
   $barre .= $lien; 
 
   return $barre;   
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
<script language="javascript" src="calendar/calendar.js"></script>
<style type="text/css">
.panel.panel-primary .panel-body .panel-body tr td form table tr td {
	text-align: left;
}
</style>
</head>
<?
Require("bienvenue.php"); // on appelle la page contenant la fonction

	$sqfac="SELECT * FROM $tb_rhconfig WHERE rhc='1' ORDER BY rhc desc limit 0,1";
	$resultfac=mysql_query($sqfac);
	$dattaux=mysql_fetch_array($resultfac);
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">CONFIGURATION DE LA PAIE </h3>
            </div>
            <div class="panel-body">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="panel-body">
                <tr>
                  <td width="99%"><form name="testform" method="post" action="rh_configuration_save.php">
                    <table width="85%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="11%">&nbsp;</td>
                        <td width="19%">&nbsp;</td>
                        <td width="2%">&nbsp;</td>
                        <td width="8%">&nbsp;</td>
                        <td width="17%">&nbsp;</td>
                        <td width="3%">&nbsp;</td>
                        <td width="12%">&nbsp;</td>
                        <td width="12%">&nbsp;</td>
                        <td width="16%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Login</td>
                        <td><input name="blogin" type="text" class="form-control" id="blogin" value="<? echo $id_nom; ?>" size="20" readonly></td>
                        <td>&nbsp;</td>
                        <td>Taux </td>
                        <td><input name="taux" type="text" class="form-control" id="taux" value="<?
	 	  if(!isset($dattaux['taux'])|| empty($dattaux['taux'])){ echo 0;} else { echo $dattaux['taux'];} ?>" size="20"></td>
                        <td>&nbsp;</td>
                        <td>IGR </td>
                        <td><font color="#000000">
                          <select name="aigr" size="1" id="aigr">
                            <option value="<? echo $dattaux['aigr'];?>" selected>
       <? $igr1=$dattaux['aigr']; 
	  if ($igr1==0) echo 'Desactiver';
	  if ($igr1==1) echo 'Activer'; 
	  ?></option>
                            <option value="0">Desactiver</option>
                            <option value="1">Activer</option>
                          </select>
                        </font></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td></select>
                        <label for="mois"></label></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Mois paie</td>
                        <td><font color="#000000">
                          <select name="mois" size="1" id="mois">
                            <option value="<? echo $dattaux['mois'] ?>"> 
        <? $n1=$dattaux['mois']; 
	  if ($n1==1) echo 'janvier';
	  if ($n1==2) echo 'février'; 
	  if ($n1==3) echo 'Mars';
	  if ($n1==4) echo 'Avril'; 
	  if ($n1==5) echo 'Mai'; 
	  if ($n1==6) echo 'Juin'; 
	  if ($n1==7) echo 'Juillet'; 
	  if ($n1==8) echo 'Août'; 
	  if ($n1==9) echo 'Septembre'; 
	  if ($n1==10) echo 'Octobre';
	  if ($n1==11) echo 'Novembre'; 
	  if ($n1==12) echo 'Decembre';  
	  ?> </option>
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
                        </font></td>
                        <td>&nbsp;</td>
                        <td>Année</td>
                        <td><font color="#000000">
                          <select name="annee" size="1" id="annee">
                          <option> <? echo $dattaux['annee']; ?>
                            <?php
$sql82 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result82 = mysql_query($sql82);

while ($row82 = mysql_fetch_assoc($result82)) {
echo '<option> '.$row82['annee'].' </option>';
}
?>
                          </select>
                        </font></td>
                        <td>&nbsp;</td>
                        <td>C.Retraite</td>
                        <td><font color="#000000">
                          <select name="acr" size="1" id="acr">
                          <option value="<? echo $dattaux['acr'];?>" selected>
       <? $c1=$dattaux['acr']; 
	  if ($c1==0) echo 'Desactiver';
	  if ($c1==1) echo 'Activer'; 
	  ?>
                          
                          </option>
                            <option value="0">Desactiver</option>
                            <option value="1">Activer</option>
                          </select>
                        </font></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
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
                        <td><input type="submit" name="Submit" value="Mise à jours" class="btn btn-primary" ></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  </form></td>
                  <td width="1%">&nbsp;</td>
                </tr>
              </table>
            </div>
          </div>
<p><font size="2"><font size="2"><font size="2">
  <?php
require 'fonction.php';

// Connect to server and select databse.
mysql_connect ($host,$user,$pass)or die("cannot connect"); 
mysql_select_db($db)or die("cannot select DB");
  
$sql = "SELECT count(*) FROM $tb_rhconfig ";  

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
   $nb_affichage_par_page = 10; 
   
// Pr?paration de la requ?te avec le LIMIT  
$sql = "SELECT * FROM $tb_rhconfig  ORDER BY rhc DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  


	
?>
  </font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<form name="form2" method="post" action="produit_cancel.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#FFFFFF"> 
        <td width="65" align="center" bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
      <td width="272" align="center" bgcolor="#3071AA"><font color="#FFFFFF">MOIS</font></td>
      <td width="291" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">ANNEE</font></td>
      <td width="291" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">TAUX </font></td>
      <td width="291" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">ETAT IGR</font></td>
      <td width="291" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">ETAT C RETRAITE</font></td>
    </tr>
    <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
    <tr> 
      <td align="center" bgcolor="#FFFFFF"><? echo $data['rhc'];?>        <div align="left"></div></td>
      <td align="center" bgcolor="#FFFFFF"><em>
      
      <? $n=$data['mois']; 
	  if ($n==1) echo 'janvier';
	  if ($n==2) echo 'février'; 
	  if ($n==3) echo 'Mars';
	  if ($n==4) echo 'Avril'; 
	  if ($n==5) echo 'Mai'; 
	  if ($n==6) echo 'Juin'; 
	  if ($n==7) echo 'Juillet'; 
	  if ($n==8) echo 'Août'; 
	  if ($n==9) echo 'Septembre'; 
	  if ($n==10) echo 'Octobre';
	  if ($n==11) echo 'Novembre'; 
	  if ($n==12) echo 'Decembre';  
	  ?>
      
      
      </em></td>
      <td align="center" bgcolor="#FFFFFF"><em><? echo $data['annee'];?></em></td>
      <td align="center" bgcolor="#FFFFFF"><em><? echo $data['taux'];?></em></td>
      <td align="center" bgcolor="#FFFFFF"><em>
      <? $igr=$data['aigr']; 
	  if ($igr==0) echo 'Desactiver';
	  if ($igr==1) echo 'Activer';
	  ?>
      </em></td>
      <td align="center" bgcolor="#FFFFFF"><em>      
      <? $c=$data['acr']; 
	  if ($c==0) echo 'Desactiver';
	  if ($c==1) echo 'Activer'; 
	  ?>
      </em></td>
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
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("testform");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


     frmvalidator.addValidation("taux","req","SVP entre un nombre");
	
	//frmvalidator.addValidation("a_adresse","req","SVP entre un nombre");
	
	//frmvalidator.addValidation("a_tel","req","SVP entre un nombre");
	
	
</script>