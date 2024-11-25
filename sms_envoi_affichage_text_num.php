<?
require 'session.php';
require 'fonction.php';
if(($_SESSION['u_niveau'] != 30)) {
	header("location:index.php?error=false");
	exit;
 }
 include 'inc/head.php';
?>

<?
	$id_nom=addslashes($_REQUEST['id_nom']);
?>

<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EDA</title>
</head>

<body>
<BODY BGCOLOR="#ffffff" LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
 <p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="63%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Envoi du message</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="http://www.boltosoft.com/sms/sms_envoi.php" method="post" name="testform" id="form3" >
                  <table width="100%" border="0">
                    <tr>
                      <td width="17%">Destinaire</td>
                      <td width="6%">&nbsp;</td>
                      <td width="77%"><input name="GSM" type="text" id="GSM" maxlength="10" value="269"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Le message</td>
                      <td>&nbsp;</td>
                      <td><textarea name="SMS" cols="50" rows="4" maxlength="150" id="SMS"></textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><em>
                        <input class="form-control" name="Ets" type="hidden" id="Ets" value="eda">
                      </em></td>
                      <td></td>
                      <td></a>150 <strong>caractères</strong> pour 1 message, espaces inclus</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><em><font color="#FF0000">
                        <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>" />
                      </font></em></td>
                      <td></td>
                      <td><input type="submit" name="button" id="button" class="btn btn-sm btn-success" value="CONFIRMER L'ENVOI SMS"></td>
                    </tr>
                  </table>
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>