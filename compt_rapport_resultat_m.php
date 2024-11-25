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
$mois=$_POST['mois'];
$annee=$_POST['annee'];
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">COMPTE DE RESULTAT   </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" align="center">
      <tr> 
        <td><form name="form2" method="post" action="formationsupprime1_question.php">
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr> 
                <td colspan="6">Profit </td>
              </tr>
              <tr> 
                <td width="17%" bgcolor="#006ABE"><font color="#CCCCCC" size="3"><strong>Compte</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="17%" bgcolor="#006ABE"><font color="#CCCCCC" size="3"><strong>Description</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="15%" bgcolor="#006ABE"><font color="#CCCCCC" size=3"><strong>Debit</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="18%" bgcolor="#006ABE"> <font color="#CCCCCC" size="3"><strong>Credit</strong></font><font color="#000000" size="3">&nbsp;</font></td>
              </tr>
<?php
 // $dc1=$_POST['dc1'];
 // $dc2=$_POST['dc2'];
  $req2="select Compte , Description , Debit , SUM(compt_ecriture.Credit) AS compt_ecriture from $tb_ecriture where MONTH(Date)=$mois and YEAR(Date)=$annee and Type='C' and  mo='C' GROUP BY Compte " ;
  $req=mysql_query($req2);
 while ($data=mysql_fetch_array($req)){ // Start looping table row 
 $de=$data['compt_ecriture'];
?>



              <tr> 
                <td bgcolor="#FFFFFF"><div align=""> 
                    <? echo $data['Compte'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <? echo $data['Description'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <? echo $data['Debit'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <? echo $de ;?>
                    kmf<BR>
                    <?php
// Exit looping and close connection 
}
//mysql_close();
?>
                  </div></td>
                <td width="11%" bgcolor="#FFFFFF"><div align=""></div></td>
              </tr>
              <tr> 
<?php
  //$dc1=$_POST['dc1'];
  //$dc2=$_POST['dc2'];
  $req2="SELECT  SUM(compt_ecriture.Credit) AS compt_ecriture FROM $tb_ecriture where MONTH(Date)=$mois and YEAR(Date)=$annee and Type='C' and mo='C'  " ;
  $req=mysql_query($req2);
 while ($data5=mysql_fetch_array($req)){ // Start looping table row 
 $nb=$data5['compt_ecriture'];
?>


                <td height="27" colspan="7"><div align="center">Resultat Brut 
                    : 
                    <?php echo $nb ?>
                    Kmf </div></td>
                <?php
// Exit looping and close connection 
}
//mysql_close();
?>
              </tr>
              <tr> 
                <td height="27" colspan="7">Depense </td>
              </tr>
<?php
  //$dc1=$_POST['dc1'];
  //$dc2=$_POST['dc2'];
  $req2="select Compte , Description , Credit ,SUM(compt_ecriture.Debit) AS compt_ecriture from $tb_ecriture where MONTH(Date)=$mois and YEAR(Date)=$annee and Type='D' and mo='D' GROUP BY Compte  " ;
  $req=mysql_query($req2);
 while ($data3=mysql_fetch_array($req)){ // Start looping table row 
 $cr=$data3['compt_ecriture']; 
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
                    <? echo $cr ;?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <? echo $data3['Credit'];?>
                    kmf<BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""></div></td>
              </tr>
              <?php
// Exit looping and close connection 
}
//mysql_close();
?>
              <tr> 
<?php
  //$dc1=$_POST['dc1'];
  //$dc2=$_POST['dc2'];
  $req2="SELECT  SUM(compt_ecriture.Debit) AS compt_ecriture FROM $tb_ecriture where MONTH(Date)=$mois and YEAR(Date)=$annee and Type='D' and mo='D'   " ;
  $req=mysql_query($req2);
 while ($data6=mysql_fetch_array($req)){ // Start looping table row 
 $nb1=$data6['compt_ecriture'];
?>

                <td height="27" colspan="7"><div align="center">Total Depense 
                    : 
                    <?php echo $nb1 ?>
                    Kmf </div></td>
                <?php
// Exit looping and close connection 
}
//mysql_close();
?>
              </tr>
              <tr> 
                <?php

 $net=$nb-$nb1;
 
?>
                <td height="27" colspan="7"><div align="center"></div></td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF"><div align=""> <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"> <div align="right">Resultat Net :<BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $net ?>
                    Kmf <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""></div></td>
              </tr>
              <tr> 
            </table>
          </form></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>