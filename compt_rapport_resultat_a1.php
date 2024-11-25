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
  //$req2="select Compte , Description , Debit , SUM(compt_ecriture.Credit) AS compt_ecriture from $tb_ecriture where  YEAR(Date)=$annee and Type='C' and  mo='C' GROUP BY Compte " ;
  //  $req2="select Compte , Description , Debit , SUM(compt_ecriture.Credit) AS compt_ecriture from $tb_ecriture where  YEAR(Date)=$annee  GROUP BY Compte " ;
     $req2="select Compte , Description , Debit , SUM(compt_ecriture.Credit) AS compt_ecriture,Credit ,SUM(compt_ecriture.Debit) AS compt_ecriture1
	  from $tb_ecriture where  YEAR(Date)=$annee  GROUP BY Compte " ;


  $req=mysql_query($req2);
 while ($data=mysql_fetch_array($req)){ // Start looping table row 
 $de=$data['compt_ecriture'];
 $dee=$data['compt_ecriture1'];
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
                    <? //echo $data['Debit'];?>
                    <? echo $dee ;?>
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
  $req2="SELECT  SUM(compt_ecriture.Credit) AS compt_ecriture FROM $tb_ecriture where YEAR(Date)=$annee   " ;
 
 
  $req=mysql_query($req2);
 while ($data5=mysql_fetch_array($req)){ // Start looping table row 
 $nb=$data5['compt_ecriture'];
?>
                <td height="27" colspan="7"><div align="center">Total Credit : 
                    <?php echo $nb ?>
                    </div></td>
					
                <?php
// Exit looping and close connection 
}
//mysql_close();
?>
              </tr>
			  
	  
			<tr> 
                <?php
  //$dc1=$_POST['dc1'];
  //$dc2=$_POST['dc2'];
  $req2="SELECT  SUM(compt_ecriture.Debit) AS compt_ecriture FROM $tb_ecriture where YEAR(Date)=$annee   " ;
 
 
  $req=mysql_query($req2);
 while ($data5=mysql_fetch_array($req)){ // Start looping table row 
 $nb1=$data5['compt_ecriture'];
?>
                <td height="27" colspan="7"><div align="center">Total Debit : 
                    <?php echo $nb1 ?>
                  </div></td>
					
                <?php
// Exit looping and close connection 
}
//mysql_close();
?>
              </tr>  
			  
              <?php
  //$dc1=$_POST['dc1'];
  //$dc2=$_POST['dc2'];
  $req2="select Compte , Description , Credit ,SUM(compt_ecriture.Debit) AS compt_ecriture from $tb_ecriture where  YEAR(Date)=$annee and Type='D' and mo='D' GROUP BY Compte  " ;
  $req=mysql_query($req2);
 while ($data3=mysql_fetch_array($req)){ // Start looping table row 
 $cr=$data3['compt_ecriture']; 
?>
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