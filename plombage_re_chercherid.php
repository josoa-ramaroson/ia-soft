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
<style type="text/css">
.centre {
	text-align: center;
	font-weight: bold;
	font-size: 36px;
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
span.surlign1{font-style:italic; background-color:#ffff00;}
span.surlign2{font-style:italic; background-color:#ff99FF;}
span.surlign3{font-style:italic; background-color:#ff9999;}
span.surlign4{font-style:italic; background-color:#9999FF;}
body {
	background-image: url(images/bg.jpg);
	background-color: #FFF;
}
body,td,th {
	color: #000;
}
</style>
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
if (isset($_REQUEST['mr2']))
{
$mr2=addslashes($_REQUEST['mr2']);

$sql = "SELECT * FROM $tbl_contact c, $tbl_plombage p where c.statut='6' and  p.id=c.id and c.id='$mr2'"; 

$sql.=" ORDER BY nomprenom ASC ";  

$req = mysql_query($sql); 

 
?>
</p>
<p class="centre">HISTORIQUE DU COMPTEUR  </p>
<table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
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
     <td width="8%" align="center">&nbsp;</td>
   </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 

	$id=$data['id'];

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
     <td align="center" bgcolor="#FFFFFF"><a href="re_affichage_user.php?id=<? echo md5(microtime()).$data['id']; ?>" 
     
      <? $n=$data['statut']; 
	  if ($n==1) $codecouleur='btn btn-sm btn-default';
	  if ($n==2) $codecouleur='btn btn-sm btn-warning'; 
	  if ($n==3) $codecouleur='btn btn-sm btn-info';
	  if ($n==4) $codecouleur='btn btn-sm btn-success';
	  if ($n==5) $codecouleur='btn btn-sm btn-success';
	  if ($n==6) $codecouleur='btn btn-sm btn-success';
	  if ($n==7) $codecouleur='btn btn-sm btn-danger';
	  ?>
        
     class="<? echo $codecouleur; ?>" >Aperçu</a></td>
   </tr>
   <?php
}
}  
else {
echo " Pas de recherche <br>";
} 
?>
</table>
<p>
  <?php
if (isset($_REQUEST['mr2']))
{
$mr2=addslashes($_REQUEST['mr2']);
	
$sql3 = "SELECT * FROM $tbl_plombcont  where idclient='$mr2' ORDER BY idpp DESC ";  //ASC

$req3 = mysql_query($sql3); 
while($data2=mysql_fetch_assoc($req3)){ // Start looping table row 
?>
</p>
  <table width="99%" border="0">
    <tr>
      <td width="8%">&nbsp;</td>
      <td width="11%"><em><? echo $data2['id_nom'];?></em></td>
      <td width="17%"><em><? echo $data2['datep'];?></em></td>
      <td width="34%"><em><? echo $data2['agents'];?></em></td>
      <td width="30%"><em><? echo $data2['obs'];?></em></td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <?php
}
}
else {
echo " ce compteur n'est pas encore verifier <br>";
} 

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
</body>
</html>