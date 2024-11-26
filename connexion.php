<html>
<head>
<title><?php include 'titre.php'; ?></title>
<?php 
include 'inc/head.php'; ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#CCCCCC">
<table width="66%" height="592" border="0" align="center">
  <tr> 
    <td height="526" bgcolor="#FFFFFF">
<p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="75%" border="0" align="center">
              <tr> 
                <td><div align="center"></div></td>
              </tr>
              <tr> 
                <td><div align="center"> 
                    <p><img src="images/eda.png" width="189" height="95"></p>
                    <p><strong><font color="#000000" size="4"><strong>Identification 
                      de l'utilisateur</strong></font></strong></p>
                  </div></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <table width="34%" border="0" align="center">
              <tr> 
                <td width="98%"> <FORM name="form1" action="identification.php" METHOD=POST>
                    <p align="center"><font color="#336666"> </font></p>
                    <p align="center"><font color="#000000">Nom d'utilisateur 
                      :</font> 
                      <INPUT  class="form-control" name="m1" type="VARCHAR">
                    </p>
                    <p align="center"><font color="#000000">Mot de passe <font color="#FFFFFF">....</font>:</font>
                      <input class="form-control" name="m2" type="PASSWORD">
                    </p>
                    <p align="center">
                      <font color="#FFFFFF">. 
                      </font> 
                      <INPUT  name="submit" TYPE=submit value=" Se connecter " class="btn btn-primary">
                    </p>
                  </form>
                  &nbsp;
                    </td>
                <td width="2%">&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table>
      <p>&nbsp;</p>
            <p>&nbsp;</p></tr>
  <tr> 
    <td height="60"> 
      <p align="center"> 
        <?php
include_once('pied.php');
?>
    </td>
  </tr>
</table>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve">//<![CDATA[
  var frmvalidator  = new Validator("form1");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("m1","req","SVP enregistre le libelle");
	frmvalidator.addValidation("m2","req"," SVP enregistre la validite");
//]]></script>
