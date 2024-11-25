<?
require 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
//$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tbl_clientgaz WHERE id='$id'";
$resultm=mysql_query($sqlm);
$datam=mysql_fetch_array($resultm);
?>
<body>
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
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
    <form action="paiement_apercu.php" method="post" name="form1" id="form2">
    
    <? if ($_SESSION['niveau']==41) {?>
      <a href="stk_client_edit.php?id=<? echo md5(microtime()).$datam['id'];?>" class="btn btn-sm btn-success" >Edit le client</a>
   <? } else {  } ?>
      
     | <? /*
     <a href="#" onclick="toggleBox('activite',1);" class="btn btn-sm btn-success">Ajouter une activité </a>|
     <a href="#" onclick="toggleBox('automobile',1);" class="btn btn-sm btn-success" >Ajouter un transport </a> */?>
    </form>
  </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr>
    <td height="211"><form action="re_enregistrement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                   <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information du client </font></strong></div></td>
        </tr>
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%"><strong>
          <? echo $datam['id'];?>
          </strong></td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Designation</font></strong></td>
          <td>&nbsp;</td>
          <td><strong>
           <? echo $datam['Designation'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">T&eacute;l&eacute;phone</font></strong></td>
          <td><strong><? echo $datam['tel'];?></strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Nom et Prénom <font size="2"><font color="#FF0000"> *</font></font></font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['nomprenom'];?>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Fax</font></strong></td>
          <td><strong><? echo $datam['fax'];?></strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Surnom</font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['surnom'];?></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Site Web</font></strong></td>
          <td><strong><? echo $datam['url'];?></strong></td>
        </tr>
        <tr>
          <td><strong><font size="2">Email</font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['email'];?></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Adresse</font></strong></td>
          <td><strong><? echo $datam['adresse'];?></strong></td>
        </tr>
        <tr>
          <td><strong>Titre </strong></td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['titre'];?></strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Ville</font></strong></td>
          <td><strong><? echo $datam['ville'];?></strong></td>
        </tr>
        <tr>
          <td>login</td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['login'];?></strong></td>
          <td>&nbsp;</td>
          <td><strong><font size="2"><font size="2">Quartier</font></font></strong></td>
          <td><strong><? echo $datam['quartier'];?></strong></td>
        </tr>
        <tr>
          <td>pwd</td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['pwd'];?></strong></td>
          <td>&nbsp;</td>
          <td><strong>Iles</strong></td>
          <td><strong><? echo $datam['ile'];?></strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
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