<?
require 'session.php';
?>

<?

if(($_SESSION['u_niveau']!= 7) &&($_SESSION['u_niveau']!= 10)) {
	header("location:index.php?error=false");
	exit;
 }
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
$sqlm="SELECT * FROM  fonction_systeme";
$resultm=mysqli_query($linki, $sqlm);
$datam=mysqli_fetch_array($resultm);
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
  <? if ($_SESSION['u_niveau']==7){?>
      <a href="fon_para_edit.php?idfon_sys=<? echo md5(microtime()).$datam['idfon_sys'];?>" class="btn btn-sm btn-warning" >Edit le client</a>
     |<? } else {} ?>
     
    <a href="sw_parametre.php" class="btn btn-sm btn-success" > Précédent  </a> |   
     </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr>
    <td height="211">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                   <tr bgcolor="#0794F0">
          <td height="41" colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information de l'ordinateur</font></strong></div></td>
        </tr>
        <tr>
          <td width="11%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="35%"><strong>
          <? echo $datam['idfon_sys'];?>
          </strong></td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
        </tr>
        <tr>
          <td height="36">annee1</td>
          <td>&nbsp;</td>
          <td><strong>
           <? echo $datam['annee1'];?>
          </strong></td>
          <td>&nbsp;</td>
          <td>annee</td>
          <td><strong><? echo $datam['annee'];?></strong></td>
        </tr>
        <tr>
          <td height="36">annee2</td>
          <td>&nbsp;</td>
          <td><? echo $datam['annee2'];?>&nbsp;</td>
          <td>&nbsp;</td>
          <td>annee_facturation</td>
          <td><strong><? echo $datam['annee_facturation'];?></strong></td>
        </tr>
        <tr>
          <td height="40">date1</td>
          <td>&nbsp;</td>
          <td><? echo $datam['date1'];?></td>
          <td>&nbsp;</td>
          <td>annee_recouvrement</td>
          <td><strong><? echo $datam['annee_recouvrement'];?></strong></td>
        </tr>
        <tr>
          <td height="41">date2</td>
          <td>&nbsp;</td>
          <td><? echo $datam['date2'];?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="32">date3</td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['date3'];?></strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="40">annee1A</td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['annee1A'];?></strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>annee2A</td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['annee2A'];?></strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="40">date1A</td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['date1A'];?></strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="33">date2A</td>
          <td>&nbsp;</td>
          <td><strong><? echo $datam['date2A'];?></strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
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