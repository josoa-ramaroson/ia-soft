<?php
Require 'session.php';
?>
<?php
 if($_SESSION['u_niveau'] != 1) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
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
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tbl_contact WHERE id='$id'";
$resultm=mysqli_query($linki,$sqlm);
$datam=mysqli_fetch_array($resultm);
?>
<body>
<table width="100%" border="0">
   <tr>
     <td width="39%"><a href="re_affichage_user.php?id=<?php echo md5(microtime()).$datam['id'];?>" class="btn btn-sm btn-success">Aperçu du client</a></td>
     <td width="9%">&nbsp;</td>
     <td width="14%">&nbsp;</td>
     <td width="10%">&nbsp;</td>
     <td width="28%">&nbsp;</td>
   </tr>
 </table>
<table width="100%" border="0" align="center">
  <tr>
    <td height="263"><form action="re_edit_save.php" method="post" name="testform" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
              <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information du client </font></strong></div></td>
        </tr>
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%"><strong>
            <input name="id" type="hidden" id="id" value="<?php echo $datam['id'];?>" size="10" readonly />
            </strong></td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%"><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
          </font></strong></font></strong></font></td>
        </tr>
        <tr>
          <td><strong><font size="2">Designation</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <select name="Designation" id="Designation">
            <option selected="selected"><?php echo $datam['Designation'];?></option>
              <option>Mr</option>
              <option>Mme</option>
              <option>Mlle</option>
              <option>Dr</option>
            </select>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
          <td><strong>
            <input name="tel" type="text" id="tel" value="<?php echo $datam['tel'];?>" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#000000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="nomprenom" type="text" id="nomprenom" value="<?php echo $datam['nomprenom'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Fax</font></strong></td>
          <td><strong>
            <input name="fax" type="text" id="fax" value="<?php echo $datam['fax'];?>" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td>Surnom</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="surnom" type="text" id="surnom" value="<?php echo $datam['surnom'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Site Web</font></strong></td>
          <td><strong>
            <input name="url" type="text" id="url" value="<?php echo $datam['url'];?>" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Email</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="email" type="text" id="email" value="<?php echo $datam['email'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Adresse</font></strong></td>
          <td><strong>
            <input name="adresse" type="text" id="adresse" value="<?php echo $datam['adresse'];?>" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td><strong>Titre </strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="titre" type="text" id="titre" value="<?php echo $datam['titre'];?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong>Ile <font size="2"> <font size="2"><font color="#000000"> *</font></font></font></strong></td>
          <td><strong>
            <input name="ile" type="text" id="ile" value="<?php echo $datam['ile'];?>" size="40" readonly />
          </strong></td>
        </tr>
        <tr>
          <td>Login<strong><font size="2"> <font size="2"><font color="#000000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="login" type="text" id="login" value="<?php echo $datam['login'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td>Secteur <strong><font size="2"> <font size="2"><font color="#000000"> *</font></font></font></strong></td>
          <td><strong>
            <input name="secteur" type="text" id="secteur" value="<?php echo $datam['secteur'];?>" size="40" readonly />
          </strong></td>
        </tr>
        <tr>
          <td>Pwd</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="pwd" type="text" id="pwd" value="<?php echo $datam['pwd'];?>" size="40" readonly />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Ville  <font size="2"><font color="#000000"> *</font></font></font></strong></td>
          <td><strong>
            <input name="ville" type="text" id="ville" value="<?php echo $datam['ville'];?>" size="40" readonly />
          </strong></td>
        </tr>
        <tr>
          <td>Etablissements </td>
          <td>&nbsp;</td>
          <td><strong>
            <select name="CodeTypeClts" id="CodeTypeClts">
            <option value="<?php 
			
$CodeTypeClts=$datam['CodeTypeClts']; 
$sqltclient = "SELECT * FROM $tbl_client where idtclient='$CodeTypeClts'";
$resulttclient = mysqli_query($linki,$sqltclient);
$rowtclient = mysqli_fetch_assoc($resulttclient);
if ($rowtclient===FALSE) {}
else 
 {
echo $TypeClts=$rowtclient['idtclient'];
 }
?>" selected="selected"> <?php echo $TypeClts=$rowtclient['TypeClts']; 	  
			 ?>
              
              </option>
              <?php
$sql84 = ("SELECT * FROM $tbl_client ORDER BY idtclient ASC");
$result84 = mysqli_query($linki,$sql84);

while ($row84 = mysqli_fetch_assoc($result84)) {
echo '<option value='.$row84['idtclient'].'> '.$row84['TypeClts'].' </option>';
}

?>
            </select>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2"><font size="2">Quartier </font> <font size="2"><font color="#000000"> *</font></font></font></strong></td>
          <td><strong>
            <input name="quartier" type="text" id="quartier" value="<?php echo $datam['quartier'];?>" size="40" readonly />
          </strong></td>
        </tr>
        <tr>
          <td>CHOIX TAXE</td>
          <td>&nbsp;</td>
          <td><strong>
            <select name="chtaxe" id="chtaxe">
              <option value="<?php echo $datam['chtaxe'];?>" selected="selected">
                <?php $chtaxe=$datam['chtaxe']; 
		  
		  if ($chtaxe==0) echo 'Avec Taxe';
	      if ($chtaxe==1) echo 'Sans Taxe'; 
		  
			    ?>
                </option>
              <option value="0">Avec Taxe</option>
              <option value="1">Sans Taxe</option>
            </select>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Calibre ( Amperage)</font></strong></td>
          <td><strong>
            <select name="amperage" id="amperage">
              <option selected="selected"><?php echo $datam['amperage']; ?></option>
              <option>10</option>
              <option>15</option>
              <option>20</option>
              <option>25</option>
              <option>30</option>
              <option>35</option>
              <option>40</option>
              <option>45</option>
              <option>50</option>
              <option>55</option>
              <option>60</option>
              <option>65</option>
              <option>70</option>
              <option>75</option>
              <option>80</option>
              <option>85</option>
              <option>90</option>
              <option>95</option>
              <option>100</option>
              <option>110</option>
              <option>125</option>
              <option>200</option>
              <option>250</option>
              <option>500</option>
              <option>750</option>
              <option>1000</option>
              <option>1250</option>
              <option>1500</option>
              <option>1750</option>
              <option>2000</option>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td>Si c'est MT</td>
          <td>&nbsp;</td>
          <td><strong>
            <select name="tmt" id="tmt">
              <option value="<?php echo $datam['tmt'];?>" selected="selected">
                <?php $tmt=$datam['tmt']; 
		  
		  if ($tmt==0) echo '';
	      if ($tmt==1) echo 'SimpleMT'; 
		  if ($tmt==2) echo 'MT';
			    ?>
                </option>
              <option value="0"></option>
              <option value="1">SimpleMT</option>
              <option value="2">MT</option>
            </select>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font color="#000000" size="2">Tarif</font></strong></td>
          <td><strong>
            <select name="Tarif" id="Tarif">
            <option value="<?php echo $datam['Tarif'];?>" selected="selected"> <?php $Tarif=$datam['Tarif'];
			
		  if ($Tarif==1) echo 'Elec BT Triphasé';
	      if ($Tarif==2) echo 'Elec BT Monophasé Domestique'; 
		  if ($Tarif==3) echo 'Mosquée';
	      if ($Tarif==4) echo 'BT Mono Pomoni';
		  
		  if ($Tarif==5) echo 'BT Tri Pomoni';
	      if ($Tarif==6) echo 'BT Mono Agent'; 
		  if ($Tarif==7) echo 'BT Mono Agent P';
	      if ($Tarif==8) echo 'BT Mono Agent retraité';
		  
		  if ($Tarif==9) echo 'BT Mono Retraité P';
	      if ($Tarif==10) echo 'MT'; 
		  if ($Tarif==11) echo 'BT Mono Agent Couple';
	      if ($Tarif==12) echo 'BT Tri 500';
		  		  
			 ?>
              
              </option>
              <?php
$sql8 = ("SELECT * FROM tarif ORDER BY idt ASC");
$result8 = mysqli_query($linki,$sql8);
while ($row8 = mysqli_fetch_assoc($result8)) {
echo '<option value='.$row8['idt'].'> '.$row8['Libelle'].' </option>';
}

?>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td>Coeifficient TI</td>
          <td>&nbsp;</td>
          <td><strong>
            <select name="coefTi" id="coefTi">
              <option selected="selected"><?php echo $datam['coefTi'];?></option>
              <option>1</option>
              <option>5</option>
              <option>10</option>
              <option>20</option>
              <option>30</option>
              <option>40</option>
              <option>50</option>
              <option>60</option>
              <option>70</option>
              <option>80</option>
              <option>90</option>
              <option>100</option>
              <option>110</option>
              <option>120</option>
            </select>
          </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer" />
          </span></strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>