<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="javascript" src="calendar/calendar.js"></script>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

</head>
<?
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
  <div class="panel-heading">
            <h3 class="panel-title">Modifier une facture</h3>
            </div>
  <form name="form1" method="post" action="co_modification_updatesMT.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><strong><font color="#CC9933" size="5">
          <?php
$idf=substr($_REQUEST["idf"],32);
$sql3="SELECT * FROM $tbl_fact WHERE idf='$idf'";
$result3=mysql_query($sql3);
$rows3=mysql_fetch_array($result3);

	$sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);
	
?>
        </font>Indication</strong></td>
        <td width="28%">&nbsp;</td>
        <td width="18%"><strong>Date</strong></td>
        <td width="38%"><input name="date" type="text" id="date" value="<? echo $datecaisse['datecaisse'];?>" size="30" readonly /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Nouveau Index</td>
        <td><em>
          <input name="nfi" type="text" disabled id="nfi" value="<? echo $rows3['nf']; ?>" size="30" readonly>
        jour</em></td>
        <td><strong>Index à rectifier</strong></td>
        <td><em>
          <input name="nf" type="text" id="nf" size="30">
          INDEX JOUR
        </em></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Ancien Index</td>
        <td><em>
          <input name="n" type="text" id="n" value="<? echo $rows3['n']; ?>" size="30" readonly>
        </em></td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Nouveau Index</td>
        <td><em>
          <input name="nfi2" type="text" disabled id="nfi2" value="<? echo $rows3['nf2']; ?>" size="30" readonly>
        nuit</em></td>
        <td>&nbsp;</td>
        <td><em>
          <input name="nf2" type="text" id="nf2" size="30">
          INDEX NUIT 
        </em></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Ancien Index</td>
        <td><em>
          <input name="n2" type="text" id="n2" value="<? echo $rows3['n2']; ?>" size="30" readonly>
        </em></td>
        <td>Coefficient TI</td>
        <td><? echo $rows3['coefTi'];?><strong>
        <input name="coefTi" type="hidden" class="form-control" id="coefTi" value="<? echo $rows3['coefTi'];?>" size="20" />
        </strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Impayée</strong></td>
        <td><input name="impayee" type="text" id="impayee" value="<? echo $rows3['impayee']; ?>" size="30"readonly></td>
        <td><strong>Observation</strong></td>
        <td><textarea name="obs" id="obs" cols="50" rows="2"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><font color="#FF0000">
          <? $idt=$rows3['id']; 
$sql82 ="SELECT * FROM $tbl_contact where id='$idt'";
$result82 = mysql_query($sql82);
while ($row82 = mysql_fetch_assoc($result82)) {
$Tarif=$row82['Tarif'];
$chtaxe=$row82['chtaxe'];
?>
          <input name="Tarif" type="hidden" id="Tarif" value="<? echo $row82['Tarif'];?>" />
          <input name="chtaxe" type="hidden" id="chtaxe" value="<? echo $row82['chtaxe'];?>" />
          <?  }?>
        </font></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Penalité de retard</strong></td>
        <td><input name="Pre" type="text" id="Pre" value="<? echo $rows3['Pre']; ?>" size="30"readonly></td>
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
        <td><strong>Montant Total </strong></td>
        <td><input name="totalnet" type="text" disabled id="total" value="<? echo $rows3['totalnet']; ?>" size="30"></td>
        <td><em>
          <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom;?>">
          <input name="idf" type="hidden" id="idf" value="<? echo $idf;?>">
          <input name="st" type="hidden" value="<? echo $rows3['st'];?>" />
          <input name="id" type="hidden" id="id" value="<? echo $rows3['id'];?>">
          <input name="nfi" type="hidden" id="nfi" value="<? echo $rows3['nf'];?>">
          <input name="nfi2" type="hidden" id="nfi2" value="<? echo $rows3['nf2'];?>">
          <font color="#FF0000">
          <input name="puisct" type="hidden" id="puisct" value="<? echo $rows3['puisct']; ?>" />
          </font></em></td>
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