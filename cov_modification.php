<?php
Require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="javascript" src="calendar/calendar.js"></script>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

</head>
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
  <div class="panel-heading">
            <h3 class="panel-title">Modifier la facture</h3>
            </div>
  <form name="form1" method="post" action="cov_modification_updates.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><strong><font color="#CC9933" size="5">
          <?php
				  

$idf=substr($_REQUEST["idf"],32);
$sql3="SELECT * FROM $tbl_fact WHERE idf='$idf'";
$result3=mysqli_query($linki,$sql3);

$rows3=mysqli_fetch_array($result3);
?>
        </font>Indication</strong></td>
        <td width="30%"><em>
          <input name="stlib" type="text" id="stlib" value="<?php echo $rows3['bnom']; ?> " size="30" readonly>
        </em></td>
        <td width="13%"><strong>Date</strong></td>
        <td width="41%"><?php
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(2014, 2016);
					  $myCalendar->dateAllow('2014-11-28', '2016-12-31');
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Date</strong></td>
        <td><em>
          <input name="date1" type="text" disabled id="date1" value="<?php echo $rows3['date']; ?> " size="30">
        </em></td>
        <td><strong>Montant à rectifier</strong></td>
        <td><em>
          <input name="montantf" type="text" id="montantf" size="30">
        </em></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Montant Total</strong></td>
        <td><input name="montanti" type="text" id="montanti" value="<?php echo $rows3['totalnet']; ?> " size="30" readonly></td>
        <td><strong>Observation</strong></td>
        <td><textarea name="obs" id="obs" cols="50" rows="2"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><em>
          <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom;?>">
          <input name="idf" type="hidden" id="idf" value="<?php echo $idf;?>">
          <input name="st" type="hidden" value="<?php echo $rows3['st'];?>" />
          <input name="id" type="hidden" id="id" value="<?php echo $rows3['id'];?>">
        </em></td>
        <td><input type="submit" name="Submit3" value="Valider votre modification"></td>
      </tr>
    </table>
  </form>

  <body link="#0000FF" vlink="#0000FF" alink="#0000FF">

            </div>
</div>
<p><font size="2"><font size="2"></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
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
<p>&nbsp; </p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("montantf","req","SVP entre un nombre");
	
</script>