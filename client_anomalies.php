<?php
Require("session.php"); 
require 'fonction.php';
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script language="javascript" src="calendar/calendar.js"></script>
<style type="text/css">
.taile {
	font-size: 12px;
}
.taille16 {
	font-size: 16px;
}
.centrevaleur {	text-align: center;
}
.rouge {
	color: #F00;
}
</style>
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
// Remove the options from 2nd dropdown list 
for(j=document.form1b.prix.options.length-1;j>=0;j--)
{
document.form1b.prix.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].prix;
optn.value = myarray.data[i].prix;  // You can change this to subcategory 
document.form1b.prix.options.add(optn);

} 
      }
    } // end of function stateck
	var url="vente_fonction_montant.php";
var idproduit=document.getElementById('s1').value;
url=url+"?idproduit="+idproduit;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>
</head>
<?=
require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p>&nbsp;</p>

<?php require 'client_anomalies_menu.php';?>

<div class="panel panel-primary">
  <div class="panel-body">
  
   <form id="recherche-client" name="recherche-client" method="post" action="client_anomalies.php">
      <table width="100%" border="0">
        <tr>
          <td width="9%">N°du Client</td>
          <td width="11%"><strong>
            <input name="idclient" type="text" class="form-control" id="idclient" size="20" />
          </strong></td>
          <td width="6%"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
          <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>"></td>
          <td width="74%"><strong>
            <input type="submit" name="Valider" id="envoyer" value="Chercher le client" />
            </strong>
            <?php
		 
		        $idclient= 0;
			    if (isset($_REQUEST["idclient"]))
                $idclient = $_REQUEST["idclient"];
				
$sqlrech = "SELECT * FROM $tbl_contact where id='$idclient'";
$reqrech = mysqli_query($linki,$sqlrech) or die('Erreur SQL !<br />'.$sqlrech.'<br />'.mysqli_error($linki));  
$datarech=mysqli_fetch_array($reqrech);


    function Nom_prenom_client($LE_idclient, $tbl_contact,$linki){
	$sqld7 = "SELECT * FROM  $tbl_contact where id='$LE_idclient'";
	$resultatd7 = mysqli_query($linki,$sqld7); 
	$nqtd7 = mysqli_fetch_assoc($resultatd7);
	if((!isset($nqtd7['nomprenom'])|| empty($nqtd7['nomprenom']))) { $qt7=''; return $qt7;}
	else {$qt7=$nqtd7['nomprenom']; return $qt7;}
	}
?> </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Créer une demande de résolution</h3>
  </div>
  <div class="panel-body">
    <form name="form1" method="post" action="client_anomalies_save.php">
      <table width="100%" border="0">
        <tr>
          <td width="19%"><font size="2"><strong>ID DU CLIENT </strong></font></td>
          <td width="37%"><font color="#FF0000"><?php echo $datarech['id'];?></font></td>
          <td width="3%">&nbsp;</td>
          <td width="8%">&nbsp;</td>
          <td width="33%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Nom et prenom</strong></td>
          <td><input name="nompassager" type="text" class="form-control" id="nompassager" value="<?php $idclient=$datarech['id']; $nom_prenom=Nom_prenom_client($idclient, $tbl_contact,$linki); echo $nom_prenom;?>" size="40" readonly /></td>
          <td>&nbsp;</td>
          <td>Service</td>
          <td><input name="service" type="text" class="form-control" id="service" size="40" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Description du probleme</font></strong></td>
          <td><textarea name="description" cols="60" rows="3" class="form-control" id="description"></textarea></td>
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
        </tr>
        <tr>
          <td>Niveau du probleme</td>
          <td><strong><font size="2">
            <select class="form-control" name="niveau" size="1" id="niveau">
              <option>Basse</option>
              <option>Moyen</option>
              <option>Urgent</option>
            </select>
          </font></strong></td>
          <td>&nbsp;</td>
          <td><font size="2"><strong>Statut</strong></font></td>
          <td><select class="form-control" name="statut" id="statut">
            <option>A faire</option>
            <option>En cours</option>
</select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>">
            <input name="idclient" type="hidden" id="idclient" value="<?php echo $datarech['id'];?>">
          </font></td>
          <td><input type="submit" name="Enregistre" id="Enregistre" value="Enregistre"></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>&nbsp;</p>
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
<p>&nbsp;</p>
</body>
</html>

<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("idclient","req","SVP entre un nombre");
	frmvalidator.addValidation("description","req","SVP entre un nombre");
	frmvalidator.addValidation("nompassager","req","SVP entre un nombre");
		
</script>