<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
	if($_SESSION['u_niveau'] != 20) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
<script language="javascript" src="calendar/calendar.js"></script>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />

</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">Ajouter un client 
      <?php
$req1="SELECT * FROM $tb_comptcl  ";
$req=mysql_query($req1);
?>
    </h3>
    </div>
  <div class="panel-body">
    <form action="compt_client_save.php" method="post" name="testform" id="form1">
      <table width="78%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr> 
          <td width="20%"><strong><font size="2">Numero </font></strong></td>
          <td width="37%"><strong> 
        <?php

$sql="SELECT count( compt_client.Numcsave ) AS $tb_comptcl FROM compt_client ";
// OREDER BY id DESC is order result by descending 
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){
 $nf=$rows['compt_client'];
  //echo $nf+1 ;
   }
mysql_close();
			
			?>
			 <input class="form-control" name="Numcsave"  readonly="readonly" type="text" id="nucl" value="<?php echo $nf+1 ?>"> 
            </strong></td>
          <td width="25%">&nbsp;</td>
          <td width="18%">&nbsp;</td>
        </tr>
        <tr> 
          <td><font size="2"><strong>Nom</strong></font></td>
          <td><strong> 
            <input class="form-control" name="Nomcl" type="text" id="Nomcl" size="40" />
            </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Prenom </td>
          <td> <input class="form-control" name="Prenomcl" type="text" id="Prenomcl" size="40"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Adresse </td>
          <td> <input class="form-control" name="Adressecl" type="text" id="Adressecl" size="40"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Telephone</td>
          <td> <input class="form-control" name="Telephonecl" type="text" id="Telephonecl"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Domaine d'exploitation</td>
          <td> <input class="form-control" name="Statutcl" type="text" id="Statutcl"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Date</td>
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
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer"  class="btn btn-primary"/>
          </span></strong></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<table width="100%" border="0" align="center">
  <tr>
    <td width="84%"><div align="center"></div></td>
  </tr>
  <tr>
    <td>
      <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr bgcolor="#006ABE">
          <td width="9%" align="center"><font color="#CCCCCC" size="4"><strong>Numero</strong></font><font color="#000000" size="3">&nbsp;</font></td>
          <td width="14%" align="center"><font color="#CCCCCC" size="4"><strong>Nom</strong></font><font color="#000000" size="3">&nbsp;</font></td>
          <td width="13%" align="center"><font color="#CCCCCC" size="4"><strong>Prenom</strong></font><font color="#000000" size="3">&nbsp;</font></td>
          <td width="15%" align="center"><font color="#CCCCCC" size="4"><strong>Adresse</strong></font><font color="#000000" size="3">&nbsp;</font></td>
          <td width="14%" align="center"><font color="#CCCCCC" size="4"><strong>Telephone</strong></font><font color="#000000" size="3">&nbsp;</font></td>
          <td width="16%" align="center"><font color="#CCCCCC" size="4"><strong>D. Exploitation</strong></font></td>
          <td width="10%" align="center"><font color="#CCCCCC" size="3"><strong>Date </strong></font></td>
          <td width="9%" align="center">&nbsp;</td>
        </tr>
        <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
        <tr>
          <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Numcsave'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Nomcl'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Prenomcl'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Adressecl'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Telephonecl'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Statutcl'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Date'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"><a href="compt_client_update.php?Numcsave=<? echo $data['Numcsave']; ?>" class="btn btn-sm btn-success" >Aperçu</a></div></td>
        </tr>
        <?php
// Exit looping and close connection 
}
//mysql_close();
?>
      </table>
   </td>
  </tr>
</table>
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
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("Nomcl","req","Nomcl");
	
	frmvalidator.addValidation("Telephonecl","req","Telephonecl");
	
	
</script>