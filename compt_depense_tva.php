<?php
Require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?php
 if($_SESSION['u_niveau'] != 20) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
<script language="javascript" src="calendar/calendar.js"></script>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction


    //choix d espace de memoire pour les connection.---------------------------------------------------------------- 
	$valeur_existant = "SELECT COUNT(*) AS nb FROM $tb_comptconf  WHERE idcomp='$id_nom' ";
	$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
	$nb = mysqli_fetch_assoc($sqLvaleur);
	
	if($nb['nb'] == 1)
   {

   }
   else 
   {
	   	
	$sqlcon="INSERT INTO $tb_comptconf (idcomp)VALUES('$id_nom')";
    $connection=mysqli_query($linki,$sqlcon);
    }
    //------------------------FIn du Programme ---------------------------------------------------------
	
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">Passer à l'ecriture des dépenses 
      <?php
$req1="SELECT * FROM compt_ecriture ";
$req=mysqli_query($linki,$req1);
?>

<?php
$Code=$_GET['Code'];
$res="select * From $plan where Code='$Code'";
$resu=mysqli_query($linki,$res);
$row22=mysqli_fetch_array($resu);



?>
    </h3>
    </div>
  <div class="panel-body">
    <form action="compt_depense_tva_save.php" method="post" name="testform" id="form2">
      <table width="97%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr> 
          <td width="21%">Compte à debiter</td>
          <td width="34%"> <strong> 
            <input name="Compte" type="text" id="Compte" value="<?php echo $row22['Code'] ?>" readonly>
            </strong></td>
          <td width="4%">&nbsp;</td>
          <td width="41%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td><p>Description </p>
            </td>
          <td><input name="Description" type="text" id="Description" value="<?php echo $row22['Description'] ?>" size="50" readonly></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td><p>Date</p>
            </td>
          <td><?php
					  $myCalendar = new tc_calendar("Date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td><p>Mode de Paiment</p>
            </td>
          <td><strong>
            <select name="Modep" id="Modep">
              <?php
$req="select Code ,Description from $plan WHERE Code='52' or Code='57' ";
$resultat4=mysqli_query($linki,$req);
while ($row3 = mysqli_fetch_assoc($resultat4)) {
//echo '<option> '.$row3['Code'].' </option>' ;
echo '<option value='.$row3['Code'].'> '.$row3['Code'].' '.$row3['Description'].' </option>';
}

?>
            </select>
          </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Montant TTC</td>
          <td> 
            <input class="form-control"  name="Ht" type="text" id="Ht">
          
            <strong><span style="font-size:8.5pt;font-family:Arial"> </span> <span style="font-size:8.5pt;font-family:Arial"> 
            </span></strong></td>
          <td>&nbsp;</td>
          <td>KMF</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>TVA </td>
          <td><input class="form-control"  name="Tva" type="text" id="Tva"></td>
          <td>&nbsp;</td>
          <td>%</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Fourniseur</td>
          <td><font color="#000000">
            <select name="Fourniseur" size="1" id="Fourniseur">
              <?php
$sqlS = ("SELECT * FROM $tb_comptf  ORDER BY Societef ASC ");
$resultS = mysqli_query($linki,$sqlS);

while ($rowS = mysqli_fetch_assoc($resultS)) {
echo '<option> '.$rowS['Societef'].' </option>';
}
?>
            </select>
          </font></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><em><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
          </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></em></td>
        </tr>
        <tr>
          <td>Pieces</td>
          <td><input name="Pieces" type="text" class="form-control" id="Pieces" size="40"></td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer"  class="btn btn-primary"/>
          </span></strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
	
	
	<p>&nbsp;</p>
  </div>
</div>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form2");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("Ht","req","Ht");
	
	
</script>