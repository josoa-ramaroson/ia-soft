<?
require 'session.php';
require 'fonction.php';
if(($_SESSION['u_niveau'] != 2)) {
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
        <h3 class="panel-title"> Choisir les données à Transfert dans ta session</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="webs_t_releve_choix_save.php" method="post" name="testform" id="form3" >
                  <table width="100%" border="0">
                    <tr>
                      <td width="32%">Choix de l'utilisateur</td>
                      <td width="3%">&nbsp;</td>
                      <td width="65%"><select name="userchoix" id="select">
                        <?php
$sql2 = ("SELECT id_nom FROM $tbl_releve_bachtemp where miseajours!=1 GROUP BY id_nom ORDER BY id_nom  ASC ");
$result2 = mysql_query($sql2);
echo '<option>  </option>';
while ($row2 = mysql_fetch_assoc($result2)) {
echo '<option> '.$row2['id_nom'].' </option>';
}
?>
                      </select></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
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
                      <td><input type="submit" name="button" id="button" class="btn btn-sm btn-success" value="LANCER LE TRANSFERT"></td>
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