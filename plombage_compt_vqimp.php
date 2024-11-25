<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fonction.php';
require 'configuration.php';
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
//Require 'bienvenue.php';  

	
	$m1v=substr($_REQUEST["m1v"],32);
	$m2q=substr($_REQUEST["m2q"],32);
	
?>
<body>
<p>
  <?php
$sql = "SELECT * FROM $tbl_contact c, $tbl_plombage p where c.statut='6' and  p.id=c.id and  c.ville='$m1v' and  c.quartier='$m2q' ORDER BY nomprenom ASC ";  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

$sqFP="SELECT  COUNT(*) AS nbres FROM $tbl_contact c, $tbl_plombage p where c.statut='6' and  p.id=c.id and  c.ville='$m1v' and  c.quartier='$m2q'"; 
	$RFP = mysql_query($sqFP); 
	$AFP = mysql_fetch_assoc($RFP);
	$tFPn=$AFP['nbres'];

?>
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
<p>&nbsp;</p>
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
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?  $idv=$data['id']; echo $data['id'];?></em></div></td>
                 <td align="center" bgcolor="<? gettatut(stat_eda2($tbl_plombcont,$tbl_plombage,$idv)); ?>"><em><? echo stat_eda2($tbl_plombcont,$tbl_plombage,$idv);?></em></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['nomprenom'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['ncompteur'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['c1'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['c2'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['c3'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['c4'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['d1'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['d2'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"></td>
   </tr>
   <?php
}
		function stat_eda2($tbl_plombcont,$tbl_plombage,$idv){ 
		$sqlv="SELECT COUNT(*) AS nombre FROM $tbl_plombcont ct, $tbl_plombage p  WHERE ct.idclient=p.id and ct.idclient='$idv'" ;
        $rev = mysql_query($sqlv); 
	    $nqtv = mysql_fetch_array($rev);
        if((!isset($nqtv['nombre'])|| empty($nqtv['nombre']))) { $qt=''; return $qt; } else {$qt=$nqtv['nombre']; return $qt;}
		} 
		
		function gettatut($fetat){
		if ($fetat>0) { echo $couleur="#87e385";} else { echo $couleur="#ffffff";}//vert
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