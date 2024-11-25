<?
require 'sessionclient.php';
require 'fc-affichage.php';
require_once('calendar/classes/tc_calendar.php');
require 'fonction.php';
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
<? include 'inc/head.php'; ?>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?
$idc=substr($_REQUEST["idr"],32);
$nomclient=$_REQUEST["nc"];
require "client_lient.php";
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">Service comptabilite</h3>
            </div>
            <div class="panel-body">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="panel-body">
                <tr>
                  <td width="47%"><form name="form1" method="post" action="client_compt_save.php">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="32%">&nbsp;</td>
                        <td width="68%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Date</td>
                        <td><?php
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                          <input name="id_client" type="hidden" id="id_client" value="<? echo $idc; ?>">
                        </font><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                        <input name="nom_client" type="hidden" id="nom_client" value="<? echo $nomclient; ?>">
                        </font></strong></font></strong></font></strong></font></strong></font></td>
                      </tr>
                      <tr>
                        <td><span class="panel-title">Service</span></td>
                        <td><input name="Facturation" type="text" disabled class="form-control" id="Facturation" value="COMPTABILITE" size="50" readonly></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Nom_compte</td>
                        <td><input name="Nomcompt" type="text" class="form-control" id="Nomcompt" size="50"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>N°de Transfert/</td>
                        <td><input name="Nsend" type="text" class="form-control" id="Nsend" size="50"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Montant </td>
                        <td><input name="montant" type="text" class="form-control" id="montant" size="30"> 
                          KMF</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td> Banque </td>
                        <td><input name="Banque" type="text" class="form-control" id="Banque" size="50"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Enregistrer" class="btn btn-primary" ></td>
                      </tr>
                    </table>
                  </form></td>
                  <td width="53%">&nbsp;</td>
                </tr>
              </table>
            </div>
          </div>
<p><font size="2"><font size="2"></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<form name="form2" method="post" action="produit_cancel.php">
</form>
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


    frmvalidator.addValidation("indexc","req","SVP entre un nombre");
	
	
</script>