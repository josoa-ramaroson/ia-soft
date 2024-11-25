<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
	if((($_SESSION['u_niveau'] != 50) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="calendar/calendar.js"></script>
<title><? include 'titre.php' ?></title>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
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
for(j=document.testform.subcat.options.length-1;j>=0;j--)
{
document.testform.subcat.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].service;
optn.value = myarray.data[i].idser;  // You can change this to subcategory 
document.testform.subcat.options.add(optn);

} 
      }
    } // end of function stateck
	var url="rh_fonction_direction.php";
var idrh=document.getElementById('s1').value;
url=url+"?idrh="+idrh;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>
<script type="text/javascript"> 
function toggleBox(szDivID, iState)// 1 visible, 0 hidden
 {
   if(document.getElementById)   //gecko(NN6) + IE 5+
   {
    var obj = document.getElementById(szDivID);
    obj.style.display = iState ? "block" : "none";
   }
  }
</script>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
//$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tb_rhpersonnel WHERE idrhp='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);
	
?>
<body>
<? if ($_SESSION['u_niveau']==50){?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
   
 <a href="rh_employer_edit.php?id=<? echo md5(microtime()).$datam['idrhp'];?>" class="btn btn-sm btn-success" >Edit l'employé</a>
     | 
<a href="#" onClick="toggleBox('activite',1);" class="btn btn-sm btn-success">Information Administratif </a> |

<a href="rh_employer_affichage.php" class="btn btn-sm btn-success">Afficher les employés </a> |

<a href="rh_employer_user_conge.php?id=<? echo md5(microtime()).$datam['idrhp'];?>" class="btn btn-sm btn-success">Planning des congés </a> | 
      
     </div>
</div>
<p>
  <?php } else {} ?>
</p>
<table width="100%" border="0" align="center">
  <tr>
    <td height="211"><form action="re_enregistrement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0">
        <tr>
          <td width="88%"><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr bgcolor="#0794F0">
              <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information de l'employé</font></strong></div></td>
            </tr>
            <tr>
              <td width="11%">&nbsp;</td>
              <td width="1%">&nbsp;</td>
              <td width="35%"><strong> <? echo $datam['idrhp'];?> </strong></td>
              <td width="1%">&nbsp;</td>
              <td width="12%">&nbsp;</td>
              <td width="40%">&nbsp;</td>
            </tr>
            <tr>
              <td><strong><font size="2">Designation</font></strong></td>
              <td>&nbsp;</td>
              <td><strong> <? echo $datam['Designation'];?> </strong></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Niveau d'etude</font></strong></td>
              <td><strong><? echo $datam['niveau'];?></strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
              <td>&nbsp;</td>
              <td><? echo $datam['nomprenom'];?>&nbsp;</td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Specialisation</font></strong></td>
              <td><strong><? echo $datam['specialisation'];?></strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Situation familiale</font></strong></td>
              <td>&nbsp;</td>
              <td><? echo $datam['stfamille'];?></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Matricule</font></strong></td>
              <td><strong><? echo $datam['matricule'];?></strong></td>
            </tr>
            <tr>
              <td><font size="2">Nombre d'enfant</font></td>
              <td>&nbsp;</td>
              <td><? echo $datam['nenfant'];?></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Date de naissance</font></strong></td>
              <td><strong><? echo $datam['dnaissance'];?></strong></td>
            </tr>
            <tr>
              <td><strong>Titre </strong></td>
              <td>&nbsp;</td>
              <td><strong><? echo $datam['titre'];?></strong></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Date d'embauche</font></strong></td>
              <td><strong><? echo $datam['dembauche'];?></strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Ville</font></strong></td>
              <td>&nbsp;</td>
              <td><strong><? echo $datam['ville'];?></strong></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Date d'inactivité</font></strong></td>
              <td><strong><? echo $datam['dinactivite'];?></strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
              <td>&nbsp;</td>
              <td><strong><? echo $datam['tel'];?></strong></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Categorie</font></strong></td>
              <td><strong><? echo $datam['categorie'];?></strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Email</font></strong></td>
              <td>&nbsp;</td>
              <td><? echo $datam['email'];?></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Direction</font></strong></td>
              <td><strong><? echo $datam['direction'];?></strong></td>
            </tr>
            <tr>
              <td>login</td>
              <td>&nbsp;</td>
              <td><strong><? echo $datam['login'];?></strong></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Service</font></strong></td>
              <td><strong><? echo $datam['service'];?></strong></td>
            </tr>
            <tr>
              <td>pwd</td>
              <td>&nbsp;</td>
              <td><strong><? echo $datam['pwd'];?></strong></td>
              <td>&nbsp;</td>
              <td>Statut </td>
              <td><strong><? echo $datam['statut'];?></strong></td>
            </tr>
            <tr>
              <td>Compte CPP</td>
              <td>&nbsp;</td>
              <td><strong><? echo $datam['CPP'];?></strong></td>
              <td>&nbsp;</td>
              <td>Payé à hauteur de </td>
              <td><strong><? echo $datam['Tin'];?> % de son Indice</strong></td>
            </tr>
            <tr>
              <td>NTC</td>
              <td>&nbsp;</td>
              <td><strong><? echo $datam['NTC'];?></strong></td>
              <td>&nbsp;</td>
              <td>IGR</td>
              <td><strong><? $igrchoix=$datam['igrchoix'];  if ($igrchoix==0){echo 'Non';} else {echo 'OUI';} ?></strong></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>Cde Retraite</td>
              <td><strong><? $crchoix=$datam['crchoix'];   if ($crchoix==0){echo "Non";} else {echo "OUI";} ?></strong></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>Utilsateur (lien)</td>
              <td><strong>
                <? //echo $datam['cm'];?>
                <? 
$cmr=$datam['cm'];
$sql8="SELECT * FROM $tbl_utilisateur WHERE id_u='$cmr'";
$result8=mysql_query($sql8);
$data8=mysql_fetch_array($result8);
echo $data8['u_login'];
?>
              </strong></td>
            </tr>
          </table></td>
          <td width="2%">&nbsp;</td>
          <td width="10%">
          
         <? $filename = 'upload/employer/'.$datam['idrhp'].'.jpg'; ?>
									<div class="row">
										<? if (file_exists($filename) == true) { ?>
	<img class="pix" width="100" src="<? echo $filename; ?>" alt="<? echo $datam['nomprenom']; ?>" />
										<? } else { ?>
                             <? if ($datam['sex'] == 'Masculin') { $picture='homme.jpg';} else {$picture='femme.jpg';} ?>
                                    
	<img class="pix" height="100" width="100" src="upload/employer/<? echo $picture; ?>" alt="<? echo $datam['nomprenom']; ?> 
	" />
										<? } ?>
          
          
          </td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>NB: (NTC) <strong>Numero de Travailleur Comorien :</strong> C'est un numero de reference aux cotisations (Retraire &amp; IGR, etc).</p>
<? if ($_SESSION['u_niveau']==50){?>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">RETENUES ( On doit preciser si il doit tenir compte de calcul de IGR ou de la caisse de retraite )</h3>
  </div>
  <div class="panel-body">
    <form name="form3" method="post" action="rh_employer_retenues_save.php">
      <table width="100%" border="0">
        <tr>
          <td width="6%">IGR</td>
          <td width="7%"><select name="igrchoix" size="1" id="igrchoix">
            <option value="0">Non</option>
            <option value="1">Oui</option>
          </select></td>
          <td width="13%">Caisse de retraite</td>
          <td width="7%"><select name="crchoix" size="1" id="crchoix">
            <option value="0">Non</option>
            <option value="1">Oui</option>
          </select></td>
          <td width="5%"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          </font><font size="2"><strong><font size="2"><strong>
          <input name="id" type="hidden" id="id" value="<? echo $datam['idrhp'];?>" size="10" readonly />
          </strong></font></strong></font></strong></font></strong></font></strong></td>
          <td width="23%"><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit4" value="Enregistrer les mises des retenues" class="btn btn-info" />
          </span></strong></td>
          <td width="39%">&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>&nbsp;</p>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Congé restant</h3>
  </div>
  <div class="panel-body">
    <form name="form3" method="post" action="rh_employer_conge_save.php">
      <table width="100%" border="0">
        <tr>
          <td width="11%">Nombre des jours</td>
          <td width="23%"><strong>
            <input class="form-control" name="nconge" type="text" id="nconge" value="<? echo $datam['nconge'];?>" size="40" />
          </strong></td>
          <td width="4%"><strong>
            <input name="id" type="hidden" id="id" value="<? echo $datam['idrhp'];?>" size="10" readonly />
            <font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          </font></strong></font></strong></font></strong></td>
          <td width="40%"><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit2" value="Enregistrer les mises à jours des congés" class="btn btn-info" />
          </span></strong></td>
          <td width="22%">&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>&nbsp;</p>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title"> Affectation dans une autre direction &amp;  service </h3></div>
  <div class="panel-body">
    <form name="testform" method="post" action="rh_employer_affectation_save.php">
      <table width="100%" border="0">
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="23%">&nbsp;</td>
          <td width="4%">&nbsp;</td>
          <td width="30%">&nbsp;</td>
          <td width="32%">&nbsp;</td>
        </tr>
        <tr>
          <td>Direction</td>
          <td><strong><? echo $datam['direction'];?></strong></td>
          <td>&nbsp;</td>
          <td><?Php
echo "<br><select name=direction id='s1' onchange=AjaxFunction();>
<option value=''>Choisissez une direction</option>";

$sql="select * from $tb_rhdirection "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[idrh]>$row[direction]</option>";
}
?></td>
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
          <td>Service</td>
          <td><strong><? echo $datam['service'];?></strong></td>
          <td><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          </font>
                      <input name="id" type="hidden" id="id" value="<? echo $datam['idrhp'];?>" size="10" readonly />
          </strong></font></strong></font></strong></td>
          <td><select name=subcat id='s2'>
          </select></td>
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
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit3" value="Enregistrer les mises à jours des affectations" class="btn btn-info" />
          </span></strong></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
</div>
<div id="activite" style="display:none"> <?php include ("rh_employer_salaire.php"); ?> </div>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("testform");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("direction","req","direction");

	
</script>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Ajouter une photo de profil de l'employé</h3>
  </div>
  <div class="panel-body">
    
      <form method="post" enctype="multipart/form-data" action="rh_employer_photo_save.php">
      <table width="100%" border="0">
        <tr>
          <td width="11%"><strong>Profile Image
            
          </strong></td>
          <td width="23%"><p>
            <input type="file" name="fichier"  size="25">
          </p>
          <p><strong>1Mo max</strong> en formats<strong> .jpg </strong> <strong><font size="2"><strong><font size="2"><strong>
            <input name="id" type="hidden" id="id" value="<? echo $datam['idrhp'];?>" size="10" readonly />
          </strong></font></strong></font></strong><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
          <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
          </font></strong></font></strong></font></strong></font></strong></font></strong></p></td>
          <td width="3%">&nbsp;</td>
          <td width="31%"><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="upload" value="Enregistrer la photo" class="btn btn-info">
          </span><font size="2"><strong><font size="2"><strong><font color="#FF0000">
          </font></strong></font></strong></font></strong></td>
          <td width="32%">&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php } else {} ?>
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
