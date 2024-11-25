<?
require 'session.php';
require 'fonction.php';
?>
<?
	if($_SESSION['u_niveau'] != 20) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? include 'titre.php' ?></title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">Les Comptes 
      <?php
$req1="SELECT * FROM $compte  ";
$req=mysql_query($req1);
?>
    </h3>
  </div>
  <div class="panel-body">
    <form action="compt_compte_save.php" method="post" name="testform" id="form2">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr> 
          <td width="20%"><strong><font size="2">Compte</font></strong></td>
          <td>&nbsp;</td>
          <td width="36%"><strong> 
            <input class="form-control"  name="Numc" type="text" disabled="disabled" id="Numc" size="10" />
            </strong></td>
          <td width="3%">&nbsp;</td>
          <td>&nbsp;</td>
          <td width="41%">&nbsp;</td>
        </tr>
        <tr> 
          <td><font size="2"><strong>Description</strong></font></td>
          <td>&nbsp;</td>
          <td><strong> 
            <input class="form-control"  name="Description" type="text" disabled="disabled" id="Description" size="40" />
            </strong></td>
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
        <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center"><strong><span style="font-size:8.5pt;font-family:Arial"> 
              <input type="submit" name="Submit" value="Enregistrer" />
              </span></strong></div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial"> </span> 
            <span style="font-size:8.5pt;font-family:Arial"> </span></strong></td>
        </tr>
      </table>
    </form>
    <table width="100%" border="0" align="center">
      <tr> 
        <td width="84%"> <div align="center"></div></td>
      </tr>
      <tr> 
        <td><form name="form2" method="post" action="formationsupprime1_question.php">
            <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
              <tr bgcolor="#006ABE"> 
                <td width="24%" align="center"><font color="#CCCCCC" size="4"><strong>Compte</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="76%" align="center"><font color="#CCCCCC" size="3"><strong>Descritpion 
                  </strong></font></td>
              </tr>
              <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
              <tr> 
                <td bgcolor="#FFFFFF"><div align="left"> 
                    <? echo $data['Numc'];?>
                    <BR>
                  </div></td>
                <td align="" bgcolor="#FFFFFF"><em> 
                  <? echo $data['Description'];?>
                  </em></td>
              </tr>
              <?php
// Exit looping and close connection 
}
//mysql_close();
?>
            </table>
          </form></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>