<?php
Require 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
$id=substr($_REQUEST["id"],32);
     $sqaut="SELECT * FROM  $tbl_plombage WHERE id='$id'";
	 $resultaut=mysqli_query($linki,$sqaut);

while($rowsaut=mysqli_fetch_array($resultaut)){ 
?>
<body>
<table width="100%" border="0" align="center">
  <tr>
    <td height="263"><form action="sv_edit_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="45%"><table width="101%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td width="36%"><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                  <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
                </font><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                <input name="id" type="hidden" id="id" value="<?php echo md5(microtime()).$id; ?>" />
                </font></strong></font></strong></font></strong></font></strong></font></td>
              <td width="64%">&nbsp;</td>
            </tr>
            <tr>
              <td><strong>
                <label for="checkbox_row_4">PlombCPT1</label>
              </strong></td>
              <td><strong>
                <input name="c1" type="text" id="c1" value="<?php echo $rowsaut['c1']; ?>" size="40" />
              </strong></td>
            </tr>
            <tr>
              <td><strong>PlombCPT2</strong></td>
              <td><strong>
                <input name="c2" type="text" id="c2" value="<?php echo $rowsaut['c2']; ?>" size="40" />
              </strong></td>
            </tr>
            <tr>
              <td><strong>PlombCPT3</strong></td>
              <td><strong>
                <input name="c3" type="text" id="c3" value="<?php echo $rowsaut['c3']; ?>" size="40" />
              </strong></td>
            </tr>
            <tr>
              <td><strong>PlombCPT4</strong></td>
              <td><strong>
                <input name="c4" type="text" id="c4" value="<?php echo $rowsaut['c4']; ?>" size="40" />
              </strong></td>
            </tr>
            <tr>
              <td><strong>PlombD1J1</strong></td>
              <td><strong>
                <input name="d1" type="text" id="d1" value="<?php echo $rowsaut['d1']; ?>" size="40" />
              </strong></td>
            </tr>
            <tr>
              <td><strong>PlombD1J2</strong></td>
              <td><strong>
                <input name="d2" type="text" id="d2" value="<?php echo $rowsaut['d2']; ?>" size="40" />
              </strong></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><strong><span style="font-size:8.5pt;font-family:Arial">
                <input type="submit" name="Submit" value="Enregistrer" />
              </span></strong></td>
            </tr>
          </table>            <p>&nbsp;</p></td>
          </tr>
      </table>
    </form></td>
  </tr>
</table>
<?php }
//} ?>
<p>&nbsp;</p>
</body>
</html>