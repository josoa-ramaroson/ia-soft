<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
	if((($_SESSION['u_niveau'] != 20) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="javascript" src="calendar/calendar.js"></script>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.centrevaleur {
	text-align: center;
}
.centrevaleur td {
	text-align: center;
}
.taille16 {	font-size: 16px;
}
</style>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">RAPPORTS PAR DATE </h3>
    </div>
  <div class="panel-body">
    <table width="100%" border="0">
      <tr>
        <td width="29%"><div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><strong><em>TVA </em></strong></h3>
          </div>
          <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%"><form name="form1" method="post" action="compt_rapport_tva.php">
                      <table width="269" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td bgcolor="#FFFF00"></td>
                        </tr>
                        <tr>
                          <td width="269"><div align="left">
                            <?php
					  $myCalendar = new tc_calendar("dt1", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="left">
                            <?php
					  $myCalendar = new tc_calendar("dt2", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td height="71"><div align="center">
                            <input type="submit" name="valider3" id="valider3" value="Valider" />
                          </div></td>
                        </tr>
                      </table>
                    </form></td>
                  </tr>
                </table></td>
              </tr>
            </table>
          </div>
        </div></td>
        <td width="4%">&nbsp;</td>
        <td width="33%"><div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><em><strong>Journal General</strong></em></h3>
          </div>
          <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%"><form name="form1" method="post" action="compt_rapport_general.php">
                      <table width="269" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td bgcolor="#FFFF00"></td>
                        </tr>
                        <tr>
                          <td width="269"><div align="left">
                            <?php
					  $myCalendar = new tc_calendar("dj1", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="left">
                            <?php
					  $myCalendar = new tc_calendar("dj2", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td height="71"><div align="center">
                            <input type="submit" name="valider" id="valider" value="Valider" />
                          </div></td>
                        </tr>
                      </table>
                    </form></td>
                  </tr>
                </table></td>
              </tr>
            </table>
          </div>
        </div></td>
        <td width="4%">&nbsp;</td>
        <td width="30%"><div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><em><strong>Grand Livre</strong></em></h3>
          </div>
          <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%"><form name="form1" method="post" action="compt_rapport_livred.php">
                      <table width="269" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td bgcolor="#FFFF00"></td>
                        </tr>
                        <tr>
                          <td width="269"><div align="left">
                            <?php
					  $myCalendar = new tc_calendar("dg1", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="left">
                            <?php
					  $myCalendar = new tc_calendar("dg2", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td height="71"><div align="center">
                            <input type="submit" name="valider2" id="valider2" value="Valider" />
                          </div></td>
                        </tr>
                      </table>
                    </form></td>
                  </tr>
                </table></td>
              </tr>
            </table>
          </div>
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><strong><em>Compte de resultat</em></strong></h3>
          </div>
          <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%"><form name="form1" method="post" action="compt_rapport_resultat.php">
                      <table width="269" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td bgcolor="#FFFF00"></td>
                        </tr>
                        <tr>
                          <td width="269"><div align="left">
                            <?php
					  $myCalendar = new tc_calendar("dc1", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="left">
                            <?php
					  $myCalendar = new tc_calendar("dc2", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td height="71"><div align="center">
                            <input type="submit" name="valider4" id="valider4" value="Valider" />
                          </div></td>
                        </tr>
                      </table>
                    </form></td>
                  </tr>
                </table></td>
              </tr>
            </table>
          </div>
        </div></td>
        <td>&nbsp;</td>
        <td><div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><strong><em>Bilan </em></strong></h3>
          </div>
          <div class="panel-body">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="52%"><form name="form1" method="post" action="compt_rapport_livrer.php">
                      <table width="269" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td bgcolor="#FFFF00"></td>
                        </tr>
                        <tr>
                          <td width="269"><div align="left">
                            <?php
					  $myCalendar = new tc_calendar("db1", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="left">
                            <?php
					  $myCalendar = new tc_calendar("db2", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td height="71"><div align="center">
                            <input type="submit" name="valider5" id="valider5" value="Valider" />
                          </div></td>
                        </tr>
                      </table>
                    </form></td>
                  </tr>
                </table></td>
              </tr>
            </table>
          </div>
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>