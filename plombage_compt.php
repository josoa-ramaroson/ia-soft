<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
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
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<table width="98%" border="0">
  <tr>
    <td width="67%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Plombage par Ville et Quartier</h3>
        </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="plombage_compt_vq.php" method="post" name="testform" id="testform">
                  <strong>Ville</strong> :
                  <?Php
require "fonction.php";// connection to database 

echo "<select name=refville id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez une ville</option>";

$sql="select * from ville "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[refville]>$row[ville]</option>";
}
?>
                  </select>
                  <strong>Quartier</strong> :
                  <select name=quartier id='s2'>
                    </select>
                  <input type="submit" name="Submit4" class="btn btn-sm btn-default"  value="Afficher" />
                  </form></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="32%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Chercher par ID client </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form name="form1" method="post" action="plombage_re_chercherid.php">
      <label for="mr2"></label>
      <input name="mr2" type="text" id="mr2" size="30">
      <input type="submit" name="Cherchez " id="Cherchez " value="Chercher ID">
    </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
<p>
  <?php
$sql = "SELECT count(*) FROM $tbl_contact c, $tbl_plombage p where statut='6' and  p.id=c.id";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tbl_contact c, $tbl_plombage p where c.statut='6' and  p.id=c.id ORDER BY nomprenom ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

?>
 </p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="6%" align="center"><font color="#FFFFFF" size="4"><strong>ID </strong></font></td>
     <td width="9%" align="center"><font color="#FFFFFF">Nb Contrôle</font> </td>
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
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><a href="re_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" class="btn btn-sm btn-default" ><? $idv=$data['id'];  echo $data['id'];?></a></em></div></td>
  
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
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
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