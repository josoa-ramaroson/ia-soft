<?
require 'session.php';
require 'fonction.php';
?>
<?
	if((($_SESSION['u_niveau'] != 20) ) && ($_SESSION['u_niveau'] != 90)) {
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
$annee=$_POST['annee'];
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 align="center" class="panel-title">BILAN ACTIF <br>
    </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" align="center">
      <tr> 
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr> 
        <td width="84%" bgcolor="#FFFFFF"> <div align="left">
          <p>&nbsp;</p>
          <p>Caisse </p>
        </div></td>
      </tr>
      <tr> 
        <td><form name="form2" method="post" action="formationsupprime1_question.php">
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr bgcolor="#006ABE"> 
                <td width="26%"><font color="#CCCCCC" size="3"><strong>Compte</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="36%"><font color="#CCCCCC" size="3"><strong>Description</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="19%"><font color="#CCCCCC" size=3"><strong>Solde </strong></font><font color="#000000" size="3">&nbsp;</font></td>
              </tr>
<?php
  //$db1=$_POST['db1'];
  //$db2=$_POST['db2'];
  $req2="SELECT Compte , Description , SUM(compt_ecriture.Credit)AS compte_ecripture ,SUM(compt_ecriture.Debit)AS compte_ecripture1  FROM $tb_ecriture where Description='CAISSE' and  YEAR(Date)=$annee " ;
  $req=mysql_query($req2);
 while ($data3=mysql_fetch_array($req)){ // Start looping table row 
$ct=$data3['compte_ecripture'];
$dt=$data3['compte_ecripture1'];
$tt=$dt-$ct;
?>
   

              <tr> 
                <td bgcolor="#FFFFFF"><div align=""> 
                    <? echo $data3['Compte'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <? echo $data3['Description'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <? echo $tt;?>
                    kmf<BR>
                  </div></td>
              </tr>
              <?php
// Exit looping and close connection 
}
//mysql_close();
?>
            </table>
          </form></td>
      </tr>
    </table>  <p>&nbsp;</p>
    <p>Banque</p>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
      <tr bgcolor="#006ABE">
        <td width="26%"><font color="#CCCCCC" size="3"><strong>Compte</strong></font><font color="#000000" size="3">&nbsp;</font></td>
        <td width="36%"><font color="#CCCCCC" size="3"><strong>Description</strong></font><font color="#000000" size="3">&nbsp;</font></td>
        <td width="19%"><font color="#CCCCCC" size=3"><strong>Solde </strong></font><font color="#000000" size="3">&nbsp;</font></td>
      </tr>
      <?php
  //$db1=$_POST['db1'];
  //$db2=$_POST['db2'];
  $req2="SELECT Compte , Description , SUM(compt_ecriture.Credit)AS compte_ecripture ,SUM(compt_ecriture.Debit)AS compte_ecripture1  FROM $tb_ecriture where Description='BANQUES' and  YEAR(Date)=$annee" ;
  $req=mysql_query($req2);
 while ($data3=mysql_fetch_array($req)){ // Start looping table row 
$ct=$data3['compte_ecripture'];
$dt=$data3['compte_ecripture1'];
$tt=$dt-$ct;
?>
      <tr>
        <td bgcolor="#FFFFFF"><div align=""> <? echo $data3['Compte'];?> <br>
        </div></td>
        <td bgcolor="#FFFFFF"><div align=""> <? echo $data3['Description'];?> <br>
        </div></td>
        <td bgcolor="#FFFFFF"><div align=""> <? echo $tt;?> kmf<br>
        </div></td>
      </tr>
      <?php
// Exit looping and close connection 
}
//mysql_close();
?>
    </table>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>