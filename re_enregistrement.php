<?
require 'session.php';
require 'fonction.php';
?>
<?
	if($_SESSION['u_niveau'] != 1) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
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
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">INFORMATION DU CLIENT </h3>
  </div>
  <div class="panel-body">
    <form action="re_enregistrement_save.php" method="post" name="testform" id="form2">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%"><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          </font><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
          </font></strong></font></strong></font></strong></font></strong></font></strong></font></td>
        </tr>
        <tr>
          <td><strong><font size="2">Designation</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <select name="Designation" id="Designation">
              <option>Mr</option>
              <option>Mme</option>
              <option>Mlle</option>
              <option>Dr</option>
              <option>ASS</option>
              <option>MOSQ</option>
            </select>
          </strong></td>
          <td>&nbsp;</td>
          <td>Type client</td>
          <td><strong>
            <select name="Tarif" id="Tarif">
              <?php
$sql8 = ("SELECT * FROM tarif ORDER BY idt ASC");
$result8 = mysql_query($sql8);

while ($row8 = mysql_fetch_assoc($result8)) {
echo '<option value='.$row8['idt'].'> '.$row8['Libelle'].' </option>';
}

?>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="nomprenom" type="text" id="nomprenom" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Etablissements </td>
          <td><strong>
            <select name="CodeTypeClts" id="CodeTypeClts">
              <?php
$sql81 = ("SELECT * FROM $tbl_client ORDER BY idtclient ASC");
$result81 = mysql_query($sql81);

while ($row81 = mysql_fetch_assoc($result81)) {
echo '<option value='.$row81['idtclient'].'> '.$row81['TypeClts'].' </option>';
}

?>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td>Surnom</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="surnom" type="text" id="surnom" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Piece d'identité </td>
          <td><strong>
            <select name="CodeTypePiece" id="CodeTypePiece">
              <?php
$sql82 = "SELECT * FROM $tbl_piece ORDER BY idtyp ASC";
$result82 = mysql_query($sql82);

while ($row82 = mysql_fetch_assoc($result82)) {
echo '<option value='.$row82['CodeTypePiece'].'> '.$row82['Pieces'].' </option>';
}

?>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Email</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="email" type="text" id="email" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Numero Piece</td>
          <td><input name="NumPieces" type="text" id="NumPieces" size="40"  /></td>
        </tr>
        <tr>
          <td><strong>Titre </strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="titre" type="text" id="titre" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong>Ile</strong></td>
          <td><strong>
            <select name="ile" id="select7">
              <?php
$sql8 = ("SELECT ile FROM ile ORDER BY ile ASC");
$result8 = mysql_query($sql8);

while ($row8 = mysql_fetch_assoc($result8)) {
echo '<option> '.$row8['ile'].' </option>';
}

?>
            </select>
          </strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="tel" type="text" id="tel" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Fax</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="fax" type="text" id="fax" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Ville</font></strong></td>
          <td>  <?Php
require "fonction.php";// connection to database 

echo "<select name=refville id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez une ville</option>";

$sql="select * from ville "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[refville]>$row[ville]</option>";
}
?>
</select>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Site Web</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="url" type="text" id="url" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
          <td><select name=quartier id='s2'>

</select>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Adresse</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="adresse" type="text" id="adresse" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Login</td>
          <td><strong>
            <input name="login" type="text" disabled="disabled" id="login" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td>BP boite Postale</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="BoitePostale" type="text" id="BoitePostale" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Mot de passe</td>
          <td><strong>
            <input name="pwd" type="text" disabled="disabled" id="pwd" size="40" />
          </strong></td>
        </tr>
        <tr>
          <td>Adresse Livraison</td>
          <td>&nbsp;</td>
          <td><strong>
            <input name="AdresseLivraison" type="text" id="AdresseLivraison" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Taxe</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            </span>
              <select name="chtaxe" id="chtaxe">
                <option value="0" selected="selected">Avec taxe</option>
                <option value="1">Sans Taxe</option>
              </select>
              <span style="font-size:8.5pt;font-family:Arial">
            Coefficient TI : </span>
              <select name="coefTi" id="coefTi">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>10</option>
                <option>15</option>
                <option>20</option>                
                <option>25</option>
                <option>30</option>
                <option>35</option>
                <option>40</option>
                <option>45</option>
                <option>50</option>
              </select>
              <span style="font-size:8.5pt;font-family:Arial">
<input type="submit" name="Submit" value="Enregistrer"/>
          </span></strong></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>