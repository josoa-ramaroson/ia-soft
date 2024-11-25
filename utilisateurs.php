<?
require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<html>
<head>
<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script language="javascript" src="calendar/calendar.js"></script>
<style type="text/css">
.taile {
	font-size: 12px;
}
.taille16 {
	font-size: 16px;
}
.centrevaleur {	text-align: center;
}
</style>
</head>
<?
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
 <p>
 <a href="evenement.php" class="btn btn-xs btn-success" > <span class="glyphicon glyphicon-calendar"></span> Gestion des RDV  </a> |
   <a href="evenement_mesrdv.php" class="btn btn-xs btn-success" > Prise des RDV  </a> |
   <a href="evenement_user.php" class="btn btn-xs btn-success" > <span class="glyphicon glyphicon-calendar"></span> Mon Agendat  </a> 
   <a href="evenement_cal_s.php" class="btn btn-xs btn-success" > <span class="glyphicon glyphicon-calendar"></span> Calendrier Global simplifier  </a>
      |
 <? if (($_SESSION['u_niveau']==7) or ($_SESSION['u_niveau']==8) or ($_SESSION['u_niveau']==9) or ($_SESSION['u_niveau']==43) or  ($_SESSION['u_niveau']==46) or  ($_SESSION['u_niveau']==90)){?> 
<a href="evenement_cal.php" class="btn btn-xs btn-success" > <span class="glyphicon glyphicon-calendar"></span> Calendrier Global </a> |
<? }?> 

 </p>



<? if ($_SESSION['u_niveau']==7){?>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Les  utilisateurs du systeme<font size="2"><font color="#FFFFFF"><font size="3"><font color="#000000"><strong><font size="5">
     
      <?php
$sql="SELECT * FROM $tbl_utilisateur ";
$result=mysql_query($sql);
?>
    </font></strong></font></font></font></font></h3>
  </div>
  <div class="panel-body">
    <table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#E6E6E6">
      <tr bgcolor="#3071AA">
        <td width="12%" align="center" ><strong><font color="#CCCCCC" size="4">Nom</font></strong></td>
        <td width="21%" align="center" ><strong><font color="#CCCCCC" size="4">Prenom </font></strong></td>
        <td width="24%" align="center" ><strong><font color="#CCCCCC" size="4">Email </font></strong></td>
        <td width="22%" align="center" ><strong><font color="#CCCCCC" size="4">login </font></strong></td>
        <td width="21%" align="center" ><strong><font color="#CCCCCC" size="4">Categorie </font></strong></td>
      </tr>
      <?php
while($rows=mysql_fetch_array($result)){ // Start looping table row 
?>
      <tr>
        <td bgcolor="#FFFFFF"><? echo $rows['u_nom']; ?></td>
        <td bgcolor="#FFFFFF"><? echo $rows['u_prenom']; ?><br></td>
        <td bgcolor="#FFFFFF"><? echo $rows['u_email']; ?></td>
        <td bgcolor="#FFFFFF"><? echo $rows['u_login']; ?></td>
        <td bgcolor="#FFFFFF"><? echo $rows['type']; ?></td>
      </tr>
      <?php
// Exit looping and close connection 
}
?>
    </table>
   </div>
</div>

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Initialisation du mot de passe </h3>
  </div>
  <div class="panel-body">
    <form name="form1" method="post" action="utilisateurs_initialisationsave.php">
      <table width="100%" border="0">
        <tr>
          <td width="16%">Login :</td>
          <td width="18%"><font color="#000000"><strong>
            <select name="u_login" id="u_login">
              <?php
$sql8 = ("SELECT * FROM $tbl_utilisateur ORDER BY id_nom ASC ");
$result8 = mysql_query($sql8);

while ($row8 = mysql_fetch_assoc($result8)) {
echo '<option> '.$row8['u_login'].' </option>';
}

?>
            </select>
          </strong></font></td>
          <td width="2%">&nbsp;</td>
          <td width="64%"><input type="submit" name="Valider2" id="Valider2" value="initialiser le mot de passe"></td>
        </tr>
      </table>
    </form>
  </div>
</div>

<p>
  <?php } else {} ?>
</p>
<p>&nbsp; </p>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Changement du mot de passe </h3>
  </div>
  <div class="panel-body">
    <form name="form1" method="post" action="utilisateurs_save.php">
      <table width="100%" border="0">
        <tr>
          <td width="16%">Login :</td>
          <td width="18%"><input name="u_login" type="text" class="form-control" id="u_login" value="<? echo $id_nom; ?>" size="30"></td>
          <td width="2%">&nbsp;</td>
          <td width="64%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Ancien Mot de passe :</td>
          <td><input class="form-control" name="u_pwd" type="password" id="u_pwd" size="30"></td>
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
          <td>Nouveau  Mot de passe :</td>
          <td><input class="form-control" name="u_pwd1" type="password" id="u_pwd1" size="30"></td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Valider" id="Valider" value="Envoyer"></td>
        </tr>
      </table>
    </form>
                     <?php
                $llErreur = false;
                if (isset($_GET["a"]))
                $llErreur = true;
                ?>
                <div id="error" class="boiteorange" style="display:<?php if ($llErreur){echo "block";}else{echo "none";}?>;width:300px;">
                <p style="color:#F00" align="center">Votre mot de passe a été bien changé avec succes </p>
                </div></div>
</div>

<p>&nbsp;</p>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Changer du role </h3>
  </div>
  <div class="panel-body">
    <form name="form_role" method="post" action="role_utilisateur_save.php">
      <table width="100%" border="0">
        <tr>
          <td width="16%">Role :</td>
          <td width="18%"><font color="#000000"><strong>
            <select name="id_role" id="id_role">
              <?php
$sqlrole = "SELECT u.id_u, t.id_role, t.nom_role FROM $tb_role_user u  INNER JOIN  $tb_role_type t  ON u.id_role=t.id_role  and  u.id_u=$id_user ORDER BY id_role  ASC ";
$resultrole = mysqli_query($linki,$sqlrole);

while ($rowrole = mysqli_fetch_assoc($resultrole)) {
echo '<option value='.$rowrole['id_role'].'> '.$rowrole['nom_role'].' </option>';
}

?>
            </select>
          </strong></font></td>
          <td width="2%"><font size="2"><strong><font size="2"><strong><font color="#FF0000">
            <input name="id_user" type="hidden" id="id_user" value="<? echo $id_user; ?>">
          </font></strong></font></strong></font></td>
          <td width="64%"><input type="submit" name="Valider3" id="Valider3" value="Changer de role "></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<p>&nbsp;</p>
                 <?php
                $llErreur2 = false;
                if (isset($_GET["b"]))
                $llErreur2 = true;
                ?>
                
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">  <div id="error2" class="boiteorange" style="display:<?php if ($llErreur2){echo "block";}else{echo "none";}?>;width:1000px;">
  <p style="color: #FFF" align="center">Veuillez faire la demande d'activation aux  ressources humaines pour visualiser vos bulletins de paie</p>
</div></h3>
  </div>
  <div class="panel-body"> <a href="rh_bulletin_profil.php" class="btn btn-sm btn-success" > Visualiser vos bulletins de salaire </a> |</div>
</div>
<p>&nbsp;</p>
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

<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form_role");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("id_role","req","role");
	
</script>

<p>&nbsp;</p>
</body>
</html>
