<?
Require("session.php"); 
?>
<?
require 'session_niveau_tresorie_rapport.php';
?>
<?php
require_once('calendar/classes/tc_calendar.php');
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
Require("bienvenue.php");    // on appelle la page contenant la fonction
require 'fonction.php';
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<?php
//include_once('rapport_menu.php');
?>
<p><font size="2"><font color="#CC9933" size="5">
  <?php
$annee=$_POST['annee'];  
  
$sql1="SELECT SUM(montant) AS Paie, date , MONTH(date)  FROM $tbl_caisse_ver where  YEAR(date)=$annee  GROUP BY MONTH(date) ";
$result1=mysqli_query($linki,$sql1);

$sql2="SELECT SUM(montant) AS Paie , date  FROM $tbl_caisse_ver where YEAR(date)=$annee";
$result2=mysqli_query($linki,$sql2);
$rows2=mysqli_fetch_array($result2);

?>
</font><font size="2"></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
    <tr bgcolor="#0000FF"> 
      <td width="105" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>DATE</strong></font></td>
      <td width="112" align="center" bgcolor="#3071AA"><strong><font color="#FFFFFF" size="4">	Annuel (avec visionnement des mois)</font></strong></td>
    </tr>
  <?php
while($rows1=mysqli_fetch_array($result1)){ // Start looping table row 
?>     
    <tr bgcolor="#FFFFFF">
      <td align="center"><? 
      $n=$rows1['MONTH(date)']; 
	  if ($n==1) echo 'Janvier';
	  if ($n==2) echo 'Février'; 
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
      
      </td>
      <td align="center"><? $P=strrev(chunk_split(strrev($rows1['Paie']),3," "));   echo $P;?></td>
    </tr>
    <?php

}

?>
  </table>
<p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr bgcolor="#0000FF">
    <td width="105" align="center" bgcolor="#3071AA">&nbsp;</td>
    <td width="112" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>TOTAL </strong></font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center"></td>
    <td align="center"><? $P=strrev(chunk_split(strrev($rows2['Paie']),3," "));   echo $P;?></td>
  </tr>
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
