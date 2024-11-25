<?
require 'session.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Information</title>
 <?php //include 'inc/head.php'; ?>
  <scrnom_calt language="javascrnom_calt" src="js/jquery.min.js"></scrnom_calt>
</head>
<?
require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body>
<?php

require 'fonction.php';

     			//$annee=2017;
				//$mois=1;
				$annee=date("Y");
				$mois=date("m");
				$jour=1;
				$nom_cal='';
			    if (isset($_REQUEST["annee"])){ $annee = $_REQUEST["annee"]; $mois = $_REQUEST["mois"];}
				
$sql2 = "SELECT DISTINCT(id_nom) FROM $tb_evenement where MONTH(datev)=$mois and YEAR(datev)=$annee and  id_nom='$id_nom'"; // DESC ASC  
$req2 = mysqli_query($linki,$sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.mysqli_error()); 
 
?>

 <table width="100%" border="0">
   <tr>
     <td width="46%"> <H1>PLANNING   <?php echo $mois.'/'.$annee; ?>  </H1></CENTER></td>
     <td width="19%">&nbsp;</td>
     <td width="30%"><div class="panel panel-primary">
       <div class="panel-heading">
         <h3 class="panel-title">AFFICHAGE PAR MOIS </h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><form action="evenement_user.php" method="post" name="form1" id="form1">
               Mois: <font color="#000000">
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
                 </font><font color="#000000">
                 <select name="annee" size="1" id="annee">
                   <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                 </select>
                 </font>
<input type="submit" name="valider4" id="valider5" value="Valider" />
             </form></td>
           </tr>
         </table>
       </div>
     </div></td>
     <td width="5%">&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
 </table>
 <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="18%" align="center"><strong><font color="#FFFFFF" size="4">Login </font></strong></td>
     <td width="2%" align="center">1</td>
     <td width="2%" align="center">2</td>
     <td width="2%" align="center">3</td>
     <td width="2%" align="center">4</td>
     <td width="2%" align="center">5</td>
     <td width="2%" align="center">6</td>
     <td width="2%" align="center">7</td>
     <td width="2%" align="center">8</td>
     <td width="2%" align="center">9</td>
     <td width="2%" align="center">10</td>
     <td width="2%" align="center">11</td>
     <td width="2%" align="center">12</td>
     <td width="2%" align="center">13</td>
     <td width="2%" align="center">14</td>
     <td width="2%" align="center">15</td>
     <td width="2%" align="center">16</td>
     <td width="2%" align="center">17</td>
     <td width="2%" align="center">18</td>
     <td width="2%" align="center">19</td>
     <td width="2%" align="center">20</td>
     <td width="2%" align="center">21</td>
     <td width="2%" align="center">22</td>
     <td width="2%" align="center">23</td>
     <td width="2%" align="center">24</td>
     <td width="2%" align="center">25</td>
     <td width="2%" align="center">26</td>
     <td width="2%" align="center">27</td>
     <td width="2%" align="center">28</td>
     <td width="2%" align="center">29</td>
     <td width="2%" align="center">30</td>
     <td width="2%" align="center">31</td>
   </tr>
<?php

while($data2=mysqli_fetch_array($req2)){ 
?>
  <tr bgcolor="#FFFFFF">
     <td height="39" align="center" ><div align="left"><em><? $nom_cal=$data2['id_nom']; 
	 echo personne($nom_cal, $tbl_utilisateur , $linki); ?></em></div></td>
    <td align="center" >
      <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=1" >
      <? echo $a1=scan_date($nom_cal, $annee, $mois,1, $tb_evenement , $linki);?>
    </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=2" >
	 <? echo $a2=scan_date($nom_cal, $annee, $mois,2, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=3" >
	 <? echo $a3=scan_date($nom_cal, $annee, $mois,3, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=4" >
	 <? echo $a4=scan_date($nom_cal, $annee, $mois,4, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=5" >
	 <? echo $a5=scan_date($nom_cal, $annee, $mois,5, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=6" >
	 <? echo $a6=scan_date($nom_cal, $annee, $mois,6, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=7" >
	 <? echo $a7=scan_date($nom_cal, $annee, $mois,7, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=8" >
	 <? echo $a8=scan_date($nom_cal, $annee, $mois,8, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=9" >
	 <? echo $a9=scan_date($nom_cal, $annee, $mois,9, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=10" >
	 <? echo $a10=scan_date($nom_cal, $annee, $mois,10, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=11" >
	 <? echo $a11=scan_date($nom_cal, $annee, $mois,11, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=12" >
	 <? echo $a12=scan_date($nom_cal, $annee, $mois,12, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=13" >
	 <? echo $a13=scan_date($nom_cal, $annee, $mois,13, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=14" >
	 <? echo $a14=scan_date($nom_cal, $annee, $mois,14, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=15" >
	 <? echo $a15=scan_date($nom_cal, $annee, $mois,15, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=16" >
	 <? echo $a16=scan_date($nom_cal, $annee, $mois,16, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=17" >
	 <? echo $a17=scan_date($nom_cal, $annee, $mois,17, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=18" >
	 <? echo $a18=scan_date($nom_cal, $annee, $mois,18, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=19" >
	 <? echo $a19=scan_date($nom_cal, $annee, $mois,19, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=20" >
	 <? echo $a20=scan_date($nom_cal, $annee, $mois,20, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=21" >
	 <? echo $a21=scan_date($nom_cal, $annee, $mois,21, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=22" >
	 <? echo $a22=scan_date($nom_cal, $annee, $mois,22, $tb_evenement , $linki);?>
	 </td>
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=23" >
	 <? echo $a23=scan_date($nom_cal, $annee, $mois,23, $tb_evenement , $linki);?>
	 </td>
     
	 
	 <td align="center" >
     <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=24" >
	  <? echo $a24=scan_date($nom_cal, $annee, $mois,24, $tb_evenement , $linki);?></a>
     </td>
	 
	 
     <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=25" >
	 <? echo $a25=scan_date($nom_cal, $annee, $mois,25, $tb_evenement , $linki);?>
	 </td>
     
	 
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=26" >
	 <? echo $a26=scan_date($nom_cal, $annee, $mois,26, $tb_evenement , $linki);?>
	 </td>
	 
     
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=27" >
	 <? echo $a27=scan_date($nom_cal, $annee, $mois,27, $tb_evenement , $linki);?>
	 </td>
     
	 
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=28" >
	 <? echo $a28=scan_date($nom_cal, $annee, $mois,28, $tb_evenement , $linki);?>
	 </td>
     
	 
	 <td align="center" > 
     <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=29" >
     <? echo $a29=scan_date($nom_cal, $annee, $mois,29, $tb_evenement , $linki);?></a>
     </td>
     
	 
	 <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=30" >
	 <? echo $a30=scan_date($nom_cal, $annee, $mois,30, $tb_evenement , $linki);?>
	 </td>
	 
     <td align="center" >
	 <a href="evenement_user.php?nom_cal=<? echo $nom_cal;?>&annee=<? echo $annee;?>&mois=<? echo $mois;?>&jour=31" >
	 <? echo $a31=scan_date($nom_cal, $annee, $mois,31, $tb_evenement , $linki);?>
	 </td>
   </tr>
 <?php
}

	function scan_date($nom_cal,$annee, $mois, $jour, $tb_evenement , $linki){
	$sqlfonct = "SELECT COUNT(*) AS nb  FROM $tb_evenement where  id_nom='$nom_cal' and DAY(datev)=$jour and  MONTH(datev)=$mois and YEAR(datev)=$annee ";
	$resultatfonct = mysqli_query($linki,$sqlfonct) or exit(mysqli_error()); 
	$nqtfonct = mysqli_fetch_assoc($resultatfonct);
    $nombre=$nqtfonct['nb'] ;
	if((!isset($nombre)|| empty($nombre))) { $nombre=0; return '';}
	else { $nombre=$nqtfonct['nb'] ; return $nombre;}
	}	
		
		
    function personne($login, $tbl_utilisateur , $linki){
	$sqlper = "SELECT * FROM $tbl_utilisateur WHERE u_login LIKE '$login' ";
	$resultatper=mysqli_query($linki,$sqlper) or die("Invalid query");
    while($Moinadamou=mysqli_fetch_array($resultatper))
	{
	$nom=$Moinadamou['u_nom'];
    $prenom=$Moinadamou['u_prenom'];
	return $nom.' '.$prenom ;
	}		
	}
?>
</table>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
<?php
include 'evenement_user_detail.php'; 
?>
<p>&nbsp;</p>
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
<p>&nbsp;</p>
</body>
</html>
