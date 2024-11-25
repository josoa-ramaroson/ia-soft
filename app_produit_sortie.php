<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');

	
	$sqldate="SELECT * FROM $tbl_app_caisse"; //DESC  ASC
	$resultldate=mysqli_query($linki,$sqldate);
	$datecaisse=mysqli_fetch_array($resultldate);
	
?>
<?
if(($_SESSION['u_niveau'] != 7)&& ($_SESSION['u_niveau'] != 40) &&($_SESSION['u_niveau']!= 45)&& ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
<? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
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
for(j=document.form1.Validite.options.length-1;j>=0;j--)
{
document.form1.Validite.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].Validite;
optn.value = myarray.data[i].Validite;  // You can change this to subcategory 
document.form1.Validite.options.add(optn);

} 
      }
    } // end of function stateck
	var url="app_produit_fonction_date.php";
var nameproduit=document.getElementById('s1').value;
url=url+"?nameproduit="+nameproduit;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>
</head>
<?
require 'bienvenue.php';    // on appelle la page contenant la fonction

 //choix d espace de memoire pour les connection.---------------------------------------------------------------- 
	$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_apppaiconn WHERE loguser='$id_nom' ";
	$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error()); 
	$nb = mysqli_fetch_assoc($sqLvaleur);
	
	if($nb['nb'] == 1)
   {

   }
   else 
   {
	   	
	$sqlcon="INSERT INTO $tbl_apppaiconn (loguser)VALUES('$id_nom')";
    $connection=mysqli_query($linki,$sqlcon);
    }
?>
<body>
<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title">SORTIE DU MAGASIN </h3>
  </div>
  <div class="panel-body">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="47%"><form action="app_produit_sortie_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="13%">&nbsp;</td>
          <td width="20%">&nbsp;</td>
          <td width="3%">&nbsp;</td>
          <td width="13%">&nbsp;</td>
          <td width="18%">&nbsp;</td>
          <td width="2%">&nbsp;</td>
          <td width="9%">&nbsp;</td>
          <td width="22%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font color="#000000">Date</font><font color="#FF0000">* </font></strong></td>
          <td><input name="datev" class="form-control" type="text" id="datev" value="<? echo $datecaisse['datecaisse'];?>" size="30" readonly />
            <?php
					 /* $myCalendar = new tc_calendar("datev", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1, $date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript(); */
					  ?>
<div align="right"></div>
            <div align="center"></div></td>
          <td>&nbsp;</td>
          <td><strong><font color="#000000">Quantit&eacute;</font></strong><font color="#FF0000">*</font><strong><font color="#FF0000"></font></strong></td>
          <td>
           <? if($_SESSION['u_niveau']==45) {$aff='';} else {$aff='readonly';} ?>
          <input name="Qvente" class="form-control" type="text" id="Qvente2" value="" size="30" <? echo $aff;?> /></td>
          <td>&nbsp;</td>
          <td>Service </td>
          <td><select name="service" id="service">
            <?php
$sql2s ="SELECT 	service FROM $tb_rhservice ORDER BY service  ASC ";
$result2s = mysqli_query($linki,$sql2s);
while ($row2s = mysqli_fetch_assoc($result2s)) {
echo '<option> '.$row2s['service'].' </option>';
}

?>
          </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font color="#000000">Produit entré</font></strong></td>
          <td><select name="nameproduit" id="nameproduit">
            <?php
$sql2B = ("SELECT DISTINCT(titre) FROM 	$tv_v_app_produit_type_menu where reste>0 ORDER BY titre  ASC ");
$result2B= mysql_query($sql2B);
while ($row2B = mysql_fetch_assoc($result2B)) {
echo '<option> '.$row2B['titre'].' </option>';
}

?>
          </select></td>
          <td>&nbsp;</td>
          <td><strong>Réceptionner par <font color="#FF0000">*</font></strong></td>
          <td><input name="nc" class="form-control"  type="text" id="Qvente" value="" size="30" <? echo $aff;?> /></td>
          <td>&nbsp;</td>
          <td><strong>Succursale</strong></td>
          <td><select name="a_nom" id="a_nom">
            <?php
$sql2A = ("SELECT a_nom  FROM $tbl_agence ORDER BY a_nom  ASC ");
$result2A = mysqli_query($linki,$sql2A);
while ($row2A = mysqli_fetch_assoc($result2A)) {
echo '<option> '.$row2A['a_nom'].' </option>';
}

?>
          </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><font size="2"><strong><font size="2"><strong><font color="#FF0000"> </font></strong></font></strong></font></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Date de validité </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font color="#000000">Produit</font></strong> Equivalent</td>
          <td><select name="Etitre" id="Etitre">
            <?php
$sql2 = "SELECT titre  FROM $tbl_produit  ORDER BY titre  ASC ";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
echo '<option> '.$row2['titre'].' </option>';
}

?>
          </select></td>
          <td>&nbsp;</td>
          <td><strong><font color="#000000">Numero Sortie</font></strong></td>
          <td><input name="Snumero" class="form-control" type="text" id="Qvente3" value="" size="30" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom2" value="<? echo $id_nom; ?>" />
          </font><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
          <input class="form-control" name="PUnitaire" type="hidden" id="PUnitaire" value="" size="20" readonly>
          </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Transfert </strong></td>
          <td><select name="transfert" id="transfert">
            <option value="0" selected>Non</option>
            <option value="1">Oui</option>
          </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Enregistrer" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
 </div>
</div>
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<p>
  <?php
// on pr?pare une requ?te permettant de calculer le nombre total d'?l?ments qu'il faudra afficher sur nos diff?rentes pages  
$sql = "SELECT count(*) FROM $tbl_appproduit_sortie ";  

// on ex?cute cette requ?te  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
// on r?cup?re le nombre d'?l?ments ? afficher  
$nb_total = mysql_fetch_array($resultat);  
 // on teste si ce nombre de vaut pas 0  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
        // premi?re ligne on affiche les titres pr?nom et surnom dans 2 colonnes
  
    
   
// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas d?j? ?t? d?clar?e, et dans ce cas, on l'initialise ? 0  
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    
	// 6 maroufchangement 1 par 5
   $nb_affichage_par_page =50; 
   
// Pr?paration de la requ?te avec le LIMIT  
$sql = "SELECT * FROM $tbl_appproduit_sortie  ORDER BY idvente  DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
// on ex?cute la requ?te  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

?>
</p>
<table width="99%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#FFFFFF">
    <td width="62" align="center" bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
    <td width="140" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Date sortie </font></td>
    <td width="145" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">Sortie par </font></td>
    <td width="191" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">Récéptionner par </font></td>
    <td width="180" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">libelle / Produit</font></td>
    <td width="88" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">Quantité </font></td>
    <td width="180" align="center" bgcolor="#3071AA" ><font color="#FFFFFF">Service</font></td>
  </tr>
  <?php
$numboucle=0;
while($data=mysql_fetch_array($req)){ // Start looping table row

 if($numboucle %2 == 0) 
 
   $bgcolor = "#CCDD44"; 

        else 

   $bgcolor = "#FFFFFF";  
?>
  <tr bgcolor=<? echo "$bgcolor" ?>>
    <td height="31" align="center"><div align="left"></div>
      <div align="left"></div></td>
    <td align="center"><? echo $data['datev'];?></td>
    <td align="center"><div><? echo $data['id_nom'];?></div></td>
    <td align="center"><div><? echo $data['nc'];?></div></td>
    <td align="center"><div><em><? echo $data['titre'];?></em></div></td>
    <td align="center" ><div><em><? echo $data['Qvente'];?></em></div></td>
    <td align="center"><em><? echo $data['service'];?></em></td>
  </tr>
  <?php
 $numboucle++;
}

mysql_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close ();  
?>
</table>
<p>&nbsp; </p>
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
<p></p>
<p>&nbsp;</p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve">//<![CDATA[
  var frmvalidator  = new Validator("form1");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("datev","req","SVP enregistre le libelle");
	frmvalidator.addValidation("Qvente","req"," SVP enregistre la Quantite");
	frmvalidator.addValidation("nc","req"," SVP enregistre la Quantite");
//]]></script>