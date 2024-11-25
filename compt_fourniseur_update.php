<?
require 'session.php';
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
    <h3 class="panel-title">Modifier un fourniseur 
      <?php
$req1="SELECT * FROM $tb_comptf  ";
$req=mysql_query($req1);
?>
    </h3>
    </div>
  <div class="panel-body">
    <form action="compt_fourniseur_updatesave.php" method="post" name="testform" id="form1">
      <table width="83%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr> 
          <td width="17%"><strong><font size="2">Numero </font></strong></td>
          <td width="27%"><strong> 
            <?php
$idf=substr($_REQUEST["idf"],32);
$sql="SELECT *  FROM $tb_comptf where idf='$idf' "; 
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
   
mysql_close();
			
			?>
            <input  class="form-control" name="Numf"  readonly="readonly" type="text" id="nucl" value="<?php echo $rows['Numf'] ?>">
            <em>
            <input class="form-control" name="idf" type="hidden" id="idf" value="<? echo $rows['idf'];?>">
            </em></strong></td>
          <td width="7%">&nbsp;</td>
          <td width="17%">Email</td>
          <td width="26%"><strong>
            <input name="email" type="text" class="form-control" id="Nomcl3" value="<?php echo $rows['email'] ?>" size="40" />
          </strong></td>
          <td width="6%">&nbsp;</td>
        </tr>
        <tr> 
          <td><font size="2"><strong>Societe</strong></font></td>
          <td><strong> 
            <input  class="form-control" name="Societef" type="text" id="Numcsave" value="<?php echo $rows['Societef'] ?>" size="40">
            </strong></td>
          <td>&nbsp;</td>
          <td>Web</td>
          <td><strong>
            <input name="web" type="text" class="form-control" id="Nomcl4" value="<?php echo $rows['web'] ?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Personne à contacter</td>
          <td><strong>
            <input name="personne" type="text" class="form-control" id="Nomcl2" value="<?php echo $rows['personne'] ?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Ville</td>
          <td><strong>
            <input name="ville" type="text" class="form-control" id="Nomcl5" value="<?php echo $rows['ville'] ?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Adresse </td>
          <td><strong>
            <input  class="form-control" name="Adressef" type="text" id="Numcsave3" value="<?php echo $rows['Adressef'] ?>" size="40">
          </strong></td>
          <td>&nbsp;</td>
          <td>Pays</td>
          <td><strong>
            <input name="pays" type="text" class="form-control" id="Nomcl6" value="<?php echo $rows['pays'] ?>" size="40" />
          </strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Téléphone Fixe</td>
          <td><strong>
            <input  class="form-control" name="Telephonef" type="text" id="Numcsave4" value="<?php echo $rows['Telephonef'] ?>" size="40">
          </strong></td>
          <td>&nbsp;</td>
          <td>Domaine d'exploitation</td>
          <td><strong>
            <input  class="form-control" name="Statutf" type="text" id="Numcsave5" value="<?php echo $rows['Statutf'] ?>" size="40">
          </strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Téléphone mobile</td>
          <td><input name="Telephonem" type="text" class="form-control" id="Telephonecl2" value="<?php echo $rows['Telephonem'] ?>"></td>
          <td>&nbsp;</td>
          <td>Date</td>
          <td><strong>
            <input  class="form-control" name="Date"   type="text" id="Numcsave6" value="<?php echo $rows['Date'] ?>">
          </strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Faxe</td>
          <td><input name="faxe" type="text" class="form-control" id="Telephonecl3" value="<?php echo $rows['faxe'] ?>"></td>
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
            <input type="submit" name="Submit" value="Enregistrer" class="btn btn-primary" />
          </span></strong></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
</div>
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
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr>
    <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Numf'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Societef'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Adressef'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Telephonef'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Statutf'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"> <? echo $data['Date'];?> <BR>
    </div></td>
    <td bgcolor="#FFFFFF"><div align="left"><a href="compt_fourniseur_update.php?idf=<? echo md5(microtime()).$data['idf']; ?>" class="btn btn-sm btn-success" >Aperçu</a></div></td>
  </tr>
  <?php
// Exit looping and close connection 
}
//mysql_close();
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