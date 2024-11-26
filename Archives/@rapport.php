<?php
Require 'functions/session.php';
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
<title><?php include("titre.php"); ?></title>
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
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
 <?php
require 'functions/main.php';

$sql = "SELECT count(*) FROM $tbl_paiement";  

$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
 
 
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
   
 
$sql = "SELECT SUM(paiement) AS Paie, date  FROM $tbl_paiement GROUP BY  date  LIMIT ".$_GET['debut'].','.$nb_affichage_par_page;  //ASC  DESC
 
// on ex?cute la requ?te  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki)); 

	$sqPT="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='T'"; 
	$RPT = mysqli_query($linki,$sqPT); 
	$AFPT = mysqli_fetch_assoc($RPT);
	$tPT=$AFPT['Paie'];  
	
	
	$sqPS="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='S'"; 
	$RPS = mysqli_query($linki,$sqPS); 
	$AFPS = mysqli_fetch_assoc($RPS);
	$tPS=$AFPS['Paie']; 
	
	
	/*$sqPT="SELECT SUM(paiement) AS Paie , st FROM $tbl_paiement where st='T'"; 
	$RPT = mysqli_query($linki,$sqPT); 
	$AFPT = mysqli_fetch_assoc($RPT);
	$tPT=$AFPT['Paie']; */ 
	
	$sqFS="SELECT SUM(montant) AS fact , st FROM $tbl_fact where st='S'"; 
	$RFS = mysqli_query($linki,$sqFS); 
	$AFFS = mysqli_fetch_assoc($RFS);
	$tFS=$AFFS['fact']; 
	
	$sqFT="SELECT SUM(montant) AS fact , st FROM $tbl_fact where st='T'"; 
	$RFT = mysqli_query($linki,$sqFT); 
	$AFFT = mysqli_fetch_assoc($RFT);
	$tFT=$AFFT['fact']; 
	
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="33%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Activité par date</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form name="form3" method="post" action="rapport_date.php">
                  <?php
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                  &nbsp;
                  <input type="submit" name="valider3" id="valider3" value="Valider">
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="3%">&nbsp;</td>
    <td width="31%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Activité par mois </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form name="form1" method="post" action="rapport_mois.php">
              Mois : <font color="#000000">
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
                    <option>2015</option>
                    <option>2016</option>
                    <option>2017</option>
                  </select>
                  </font>
              <input type="submit" name="valider4" id="valider5" value="Valider">
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="2%">&nbsp;</td>
    <td width="31%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Activité par annee </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form name="form2" method="post" action="rapport_annee.php">
              Année : <font color="#000000">
                <select name="mannee" size="1" id="mannee">
                  <option>2015</option>
                  <option>2016</option>
                  <option>2017</option>
                </select>
                &nbsp;&nbsp; </font>
              <input type="submit" name="valider5" id="valider9" value="Valider">
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"> Rapport d'activité </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52%"><table width="100%" border="1">
              <tr>
                <td width="23%">&nbsp;</td>
                <td width="22%">FACTURE</td>
                <td width="26%">RECOUVRE</td>
                <td width="29%">NON RECOUVRE</td>
              </tr>
              <tr>
                <td>Activité - Societe - etc ..</td>
                <td><?php echo strrev(chunk_split(strrev($tFS),3," ")) ;?></td> 
                <td><?php echo strrev(chunk_split(strrev($tPS),3," ")) ;?></td>
                <td><?php echo strrev(chunk_split(strrev($tFS-$tPS),3," ")) ;?></td>
              </tr>
              <tr>
                <td>Transport </td>
                <td><?php echo  strrev(chunk_split(strrev($tFT),3," ")); ?></td>
                <td><?php echo  strrev(chunk_split(strrev($tPT),3," "));?></td>
                <td><?php echo  strrev(chunk_split(strrev($tFT-$tPT),3," "));?></td>
              </tr>
              <tr>
                <td>TOTAL</td>
                <td><?php echo  strrev(chunk_split(strrev($tFT +  $tFS),3," ")); ?></td>
                <td><?php echo strrev(chunk_split(strrev($tPT +  $tPS ),3," "));?></td>
                <td><?php echo strrev(chunk_split(strrev(($tFT-$tPT)+($tFS-$tPS) ),3," "));?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<p><font size="2"><font size="2"><font size="2">
 
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
    <tr bgcolor="#0000FF"> 
      <td width="105" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Date</strong></font></td>
      <td width="112" align="center" bgcolor="#3071AA">&nbsp;</td>
      <td width="95" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Les recouvrements par date </strong></font></td>
      <td width="97" align="center" bgcolor="#3071AA">&nbsp;</td>
    </tr>
    <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
    <tr bgcolor="#FFFFFF">
      <td align="center"><?php echo  $data['date']; ?></td>
      <td align="center">&nbsp;</td>
      <td align="center"><?php $P=strrev(chunk_split(strrev($data['Paie']),3," "));   echo $P;?></td>
      <td align="center">&nbsp;</td>
    </tr>
    <?php

}

mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  


mysqli_close ();  
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
