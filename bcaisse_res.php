<?
Require("session.php"); 
require_once('calendar/classes/tc_calendar.php');
?>
<?
	if(($_SESSION['u_niveau'] != 6)&&($_SESSION['u_niveau'] != 7)) {
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
</head>
<?
Require("bienvenue.php"); // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<table width="96%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="panel-body">
                <tr>
                  <td width="43%">&nbsp;</td>
                  <td width="9%">&nbsp;</td>
                  <td width="48%"><div class="panel panel-danger">
                    <div class="panel-heading">
                      <h3 class="panel-title"> <em> <h1> Retour en arrière</h1> 
                    </div>
                   
                    <? 
$valeur_existant = "SELECT * FROM $tbl_paiement order by date desc LIMIT 0,1 ";
$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error()); 
$data=mysqli_fetch_array($sqLvaleur);
$dateretour=$data['date'];
	   ?>
                      <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
                        <tr>
                          <td width="47%"><form name="form2" method="post" action="bcaisse_res_save.php">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="32%">&nbsp;</td>
                        <td width="68%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Login
                        <input name="blogin" type="hidden" class="form-control" id="blogin" value="<? echo $id_nom; ?>" size="50" readonly></td>
                        <td><? echo $id_nom; ?></td>
                      </tr>
                                            <tr>
                        <td>&nbsp;</td>
                        <td><em></em></td>
                      </tr>
                      <tr>
                        <td>Date de retour</td>
                        <td><em> <h1>
                          <input name="date" type="hidden" class="form-control" id="date" value="<? echo $dateretour; ?>" size="50" readonly>
                          <? echo $dateretour; ?></h1>
                        </em></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><font color="#FF0000">
                          <input name="verification" type="hidden" id="verification" value="<? 
						  
	$sqfac="SELECT * FROM $tbl_date";
	$resultfac=mysqli_query($linki,$sqfac);
	$verification=mysqli_fetch_array($resultfac);
    $datesurv=$verification['date'];
						  
						  
						  echo $datesurv=$verification['date']; ?>" />
                        </font></td>
                        <td><input type="submit" name="Submit" value="Retour en arrière" class="btn btn-danger" ></td>
                      </tr>
                    </table>
                  </form></td>
                        </tr>
                      </table>
                    </div>
                  </div></td>
                </tr>
              </table>
<p>
  <?php
require 'fonction.php';

 
$sql = "SELECT count(*) FROM $tbl_caisse ";  

$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
 
 
$nb_total = mysqli_fetch_array($resultat);  
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
$sql = "SELECT * FROM $tbl_caisse  ORDER BY idcaisse DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
?>
<form name="form2" method="post" action="produit_cancel.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#FFFFFF"> 
        <td width="64" align="center" bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
      <td width="266" align="center" bgcolor="#3071AA"><font color="#FFFFFF">LOGIN</font></td>
      <td width="313" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">DATE FACTURATION</font></td>
      <td width="192" align="center" bgcolor="#3071AA" >&nbsp;</td>
    </tr>
    <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
    <tr> 
      <td align="center" bgcolor="#FFFFFF"><? echo $data['idcaisse'];?>        <div align="left"></div></td>
      <td align="center" bgcolor="#FFFFFF"><em><h1><? echo $data['blogin'];?> </h1></em></td>
      <td align="center" bgcolor="#FFFFFF"><em> <h1><? echo $data['datecaisse'];?> </h1></em></td>
      <td align="center" bgcolor="#FFFFFF">
      

      
       </td>
    </tr>
    <?php

}

mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ($linki);  
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