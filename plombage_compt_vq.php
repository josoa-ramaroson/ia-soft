<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fonction.php';
require 'configuration.php';
function barre_navigation ($nb_total,$nb_affichage_par_page,$debut, $refville , $RefQuartier, $nb_liens_dans_la_barre) { 
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
            $barre .= "&refville=$refville&quartier=$RefQuartier'>".$cpt."</A>"; 
         } 
         else { 
            
            $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
            $barre .= "&refville=$refville&quartier=$RefQuartier'>".$cpt."</A>&nbsp;-&nbsp;"; 
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
<?
if(($_SESSION['u_niveau'] != 44)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
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
<?
Require 'bienvenue.php';  

$RefQuartier=addslashes($_REQUEST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_REQUEST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 
    $m1v=$ville;
	$m2q=$quartier;
	
?>
<body>
<p>
  <?php
$sql = "SELECT count(*) FROM $tbl_contact c, $tbl_plombage p where statut='6' and  p.id=c.id and  c.ville='$m1v' and  c.quartier='$m2q'";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_contact c, $tbl_plombage p where c.statut='6' and  p.id=c.id and  c.ville='$m1v' and  c.quartier='$m2q' ORDER BY nomprenom ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

$sqFP="SELECT  COUNT(*) AS nbres FROM $tbl_contact c, $tbl_plombage p where c.statut='6' and  p.id=c.id and  c.ville='$m1v' and  c.quartier='$m2q'"; 
	$RFP = mysql_query($sqFP); 
	$AFP = mysql_fetch_assoc($RFP);
	$tFPn=$AFP['nbres'];


?>
 <a href="plombage_compt_vqimp.php?m1v=<? echo md5(microtime()).$m1v;?>&m2q=<? echo md5(microtime()).$m2q;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
 </p>
<table width="100%" border="0">
  <tr>
    <td width="18%">VILLE</td>
    <td width="19%">Quartier</td>
    <td width="20%">Nombre des clients</td>
  </tr>
  <tr>
    <td><em><? echo  $m1v;?></em></td>
    <td><em><? echo $m2q;?></em></td>
    <td><em><? echo strrev(chunk_split(strrev($tFPn),3," "));?></em></td>
  </tr>
</table>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="6%" align="center"><font color="#FFFFFF" size="4"><strong>ID </strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF">Nb Contrôle</font></td>
     <td width="18%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF"><strong>N°Compteur</strong> </font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>CPT1</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>CPT2</strong></font></td>
     <td width="6%" align="center"><font color="#FFFFFF"><strong>CPT3</strong></font></td>
     <td width="6%" align="center"><font color="#FFFFFF"><strong>CPT4</strong></font></td>
     <td width="6%" align="center"><font color="#FFFFFF"><strong>DJ1</strong></font></td>
     <td width="6%" align="center"><font color="#FFFFFF"><strong>DJ2</strong></font></td>
     <td width="10%" align="center">&nbsp;</td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><a href="re_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-default" ><? $idv=$data['id']; echo $data['id'];?></a></em></div></td>
            <td align="center" bgcolor="<? gettatut(stat_eda2($tbl_plombcont,$tbl_plombage,$idv)); ?>"><em><? echo stat_eda2($tbl_plombcont,$tbl_plombage,$idv);?></em></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['nomprenom'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['ncompteur'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['c1'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['c2'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['c3'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['c4'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['d1'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['d2'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><a href="re_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-success" >Aperçu</a></td>
   </tr>
   <?php
}
mysql_free_result ($req); 
 echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], $refville , $RefQuartier,  10).'</span>'; 
}  
mysql_free_result ($resultat); 

		function stat_eda2($tbl_plombcont,$tbl_plombage,$idv){ 
		$sqlv="SELECT COUNT(*) AS nombre FROM $tbl_plombcont ct, $tbl_plombage p  WHERE ct.idclient=p.id and ct.idclient='$idv'" ;
        $rev = mysql_query($sqlv); 
	    $nqtv = mysql_fetch_array($rev);
        if((!isset($nqtv['nombre'])|| empty($nqtv['nombre']))) { $qt=''; return $qt; } else {$qt=$nqtv['nombre']; return $qt;}
		} 
		
		function gettatut($fetat){
		if ($fetat>0) { echo $couleur="#87e385";} else { echo $couleur="#ffc88d";}//vert
		}
		 
mysql_close ();  
?>
</table>
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