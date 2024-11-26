<?php
Require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?
 
 if(($_SESSION['u_niveau'] != 20) && ($_SESSION['u_niveau'] != 40) ) {
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
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">Ajouter un fourniseur 
      <?php
$req1="SELECT * FROM $tb_comptf  ";
$req=mysqli_query($linki,$req1);
?>
    </h3>
  </div>
  <div class="panel-body">
    <form action="compt_fourniseur_save.php" method="post" name="testform" id="form1">
      <table width="89%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr> 
          <td width="16%"><strong><font size="2">Numero </font></strong></td>
          <td width="25%"><strong> 
        <?php

$sql="SELECT count( compt_fourniseur.Numf ) AS  compt_fourniseur FROM $tb_comptf ";
// OREDER BY id DESC is order result by descending 
$result=mysqli_query($linki,$sql);
while($rows=mysqli_fetch_array($result)){
 $nf=$rows['compt_fourniseur'];
  //echo $nf+1 ;
   }
mysqli_close($linki);
			
			?>
			 <input class="form-control" name="Numf"  readonly="readonly" type="text" id="nucl" value="<?php echo $nf+1 ?>"> 
            </strong></td>
          <td width="6%">&nbsp;</td>
          <td width="17%">Email</td>
          <td width="27%"><strong>
            <input class="form-control" name="email" type="text" id="Nomcl3" size="40" />
          </strong></td>
          <td width="9%">&nbsp;</td>
        </tr>
        <tr> 
          <td><font size="2"><strong>Nom de la société</strong></font></td>
          <td><strong> 
            <input class="form-control" name="Societef" type="text" id="Nomcl" size="40" />
            </strong></td>
          <td>&nbsp;</td>
          <td>Web</td>
          <td><strong>
            <input class="form-control" name="web" type="text" id="Nomcl4" size="40" />
          </strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Personne à contacter</td>
          <td><strong>
            <input class="form-control" name="personne" type="text" id="Nomcl2" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Ville</td>
          <td><strong>
            <input class="form-control" name="ville" type="text" id="Nomcl5" size="40" />
          </strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Adresse </td>
          <td><input class="form-control" name="Adressef" type="text" id="Adressecl" size="40"></td>
          <td>&nbsp;</td>
          <td>Pays</td>
          <td><strong>
            <input class="form-control" name="pays" type="text" id="Nomcl6" size="40" />
          </strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Téléphone Fixe</td>
          <td><input class="form-control" name="Telephonef" type="text" id="Telephonecl"></td>
          <td>&nbsp;</td>
          <td>Domaine d'exploitation</td>
          <td><input class="form-control" name="Statutf" type="text" id="Statutcl"></td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Téléphone mobile</td>
          <td><input class="form-control" name="Telephonem" type="text" id="Telephonecl2"></td>
          <td>&nbsp;</td>
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
        </tr>
        <tr>
          <td>Fax</td>
          <td><input class="form-control" name="faxe" type="text" id="Telephonecl3"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer" class="btn btn-primary"/>
          </span></strong></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#006ABE">
    <td width="" align="center"><font color="#CCCCCC" size="4"><strong>Numero</strong></font><font color="#000000" size="3">&nbsp;</font></td>
    <td width="" align="center"><font color="#CCCCCC" size="4"><strong>Societe</strong></font><font color="#000000" size="3">&nbsp;</font></td>
    <td width="" align="center"><font color="#CCCCCC" size="4"><strong>Adresse</strong></font><font color="#000000" size="3">&nbsp;</font></td>
    <td width="" align="center"><font color="#CCCCCC" size="4"><strong>Telephone</strong></font><font color="#000000" size="3">&nbsp;</font></td>
    <td width="" align="center"><font color="#CCCCCC" size="4"><strong>Statut</strong></font><font color="#000000" size="3">&nbsp;</font></td>
    <td width="" align="center"><font color="#CCCCCC" size="3"><strong>Date </strong></font></td>
    <td width="" align="center">&nbsp;</td>
  </tr>
  <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Numf'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Societef'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Adressef'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Telephonef'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Statutf'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Date'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"><a href="compt_fourniseur_update.php?idf=<?php echo md5(microtime()).$data['idf']; ?>" class="btn btn-sm btn-success" >Aperçu</a></div></td>
  </tr>
  <?php
// Exit looping and close connection 
}
//mysqli_close($linki);
?>
</table>
<p>&nbsp;</p>
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


    frmvalidator.addValidation("Societef","req","Societef");
	
	frmvalidator.addValidation("personne","req","personne");
	
	
</script>