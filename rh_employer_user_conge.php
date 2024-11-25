<?
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
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
    <h3 class="panel-title">GESTION DES CONGES</h3>
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
              <td><strong><? echo $matricule=$datam['matricule'];?></strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">Ville</font></strong></td>
              <td>&nbsp;</td>
              <td><strong><? echo $datam['ville'];?></strong></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Direction</font></strong></td>
              <td><strong><? echo $datam['direction'];?></strong></td>
            </tr>
            <tr>
              <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
              <td>&nbsp;</td>
              <td><strong><? echo $datam['tel'];?></strong></td>
              <td>&nbsp;</td>
              <td><strong><font size="2">Service</font></strong></td>
              <td><strong><? echo $datam['service'];?></strong></td>
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
<p>
  <? if ($_SESSION['u_niveau']==50){?>
</p>
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
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Période de l'absence</h3>
  </div>
  <div class="panel-body">
    <div class="panel-body">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form name="form_conge" method="post" action="rh_employer_user_conge_save.php">
            <table width="100%" border="0">
              <tr>
                <td width="12%">&nbsp;</td>
                <td width="12%">&nbsp;</td>
                <td width="6%">&nbsp;</td>
                <td width="14%">&nbsp;</td>
                <td width="13%">&nbsp;</td>
                <td width="13%">&nbsp;</td>
                <td width="12%"><input name="nomprenom" type="hidden" id="dentre" value="<? echo $datam['nomprenom']; ?>">
                <input name="matricule" type="hidden" id="iddossier" value="<? echo $datam['matricule']; ?>">
                <font color="#FF0000">
                <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>">
                <input name="id" type="hidden" id="id" value="<? echo $datam['idrhp']; ?>">
                </font></td>
                <td width="6%">&nbsp;</td>
                <td width="12%">&nbsp;</td>
              </tr>
              <tr>
                <td>Du (jj/mm/aaaa)</td>
                <td><?php
					  $myCalendar = new tc_calendar("date_entre", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript(); 
					  ?></td>
                <td>&nbsp;</td>
                <td>Au (jj/mm/aaaa)</td>
                <td><?php
					  $myCalendar = new tc_calendar("date_sortie", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
                <td><p><font color="#FF0000">Type d'absence </td>
                <td><select name="type" size="1" id="type">
                  <option>Maladie</option>
                  <option>Vacances</option>
                  <option>Autres</option>
                </select></td>
                <td>&nbsp;</td>
                <td><input type="submit" name="button" id="button" value="Enregistre"></td>
              </tr>

            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<p>
  <?php
$sql = "SELECT count(*) FROM $tb_rhconge_date where matricule=$matricule";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 50; 
$sql = "SELECT * FROM $tb_rhconge_date where  matricule=$matricule  ORDER BY matricule ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#3071AA">
    <td width="10%" align="center"><font color="#FFFFFF" size="4"><strong>Matricule </strong></font></td>
    <td width="27%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
    <td width="15%" align="center"><font color="#FFFFFF"><strong>Du</strong></font></td>
    <td width="16%" align="center"><font color="#FFFFFF"><strong>Au </strong></font></td>
    <td width="16%" align="center"><font color="#FFFFFF"><strong>Nombre de jour</strong></font></td>
    <td width="16%" align="center"><font color="#FFFFFF"><strong>Type d'absence</strong></font></td>
  </tr>
  <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data['matricule'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['nomprenom'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data['date_entre'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data['date_sortie'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nbJours'];?></em></td>
    <td align="center" bgcolor="#FFFFFF"><em><? echo $data['type'];?></em></td>
  </tr>
  <?php
}
mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
?>
</table>
<p></p>
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
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form_conge");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
	
	frmvalidator.addValidation("date_entre","dontselect=0000-00-00","date_entre");
    frmvalidator.addValidation("date_sortie","dontselect=0000-00-00","date_sortie");
</script>