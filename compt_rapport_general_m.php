<?php
Require 'session.php';
require 'fonction.php';
?>
<?php
 if((($_SESSION['u_niveau'] != 20) ) && ($_SESSION['u_niveau'] != 90)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
$mois=$_POST['mois'];
$annee=$_POST['annee'];
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">JOURNAL GENERAL </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" align="center">
      <tr> 
        <td width="84%"> <div align="left">Recette</div></td>
      </tr>
      <tr> 
        <td><form name="form2" method="post" action="formationsupprime1_question.php">
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr bgcolor="#006ABE"> 
                <td width="9%"><font color="#CCCCCC" size="3"><strong>Ref</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="12%"><font color="#CCCCCC" size="3"><strong>Date </strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="16%"><font color="#CCCCCC" size="3"><strong>Compte</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="19%"><font color="#CCCCCC" size="3"><strong>Description</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="18%"><font color="#CCCCCC" size="3"><strong>Pieces</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="18%"><font color="#CCCCCC" size="3"><strong>Credit</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="12%"><font color="#CCCCCC" size=3"><strong>Debit</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="14%"> <font color="#CCCCCC" size="3"><strong>TTC</strong></font></td>
              </tr>
<?php
  //$dj1=$_POST['dj1'];
  //$dj2=$_POST['dj2'];
  $req2="select * from $tb_ecriture where MONTH(Date)=$mois and YEAR(Date)=$annee and mo='C' " ;
  $req=mysqli_query($linki,$req2);
 while ($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
              <tr> 
                <td height="27" bgcolor="#FFFFFF"> <div align=""> 
                    <?php echo $data['ide'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Date'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Compte'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Description'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Pieces'];?>
                    <BR>
                  </div></td>
				   <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Credit'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Debit'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['TTC'];?>
                    <BR>
                  </div></td>
              </tr>
              <?php
// Exit looping and close connection 
}
//mysqli_close($linki);
?>
            </table>
          </form></td>
      </tr>
    </table>
    <form name="form2" method="post" action="formationsupprime1_question.php">
      <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
<?php
  //$dj1=$_POST['dj1'];
  //$dj2=$_POST['dj2'];
  $req2="SELECT SUM(compt_ecriture.Credit)AS compte_ecripture ,SUM(compt_ecriture.Debit)AS compte_ecripture1  FROM $tb_ecriture  where MONTH(Date)=$mois and YEAR(Date)=$annee and mo='C' " ;
  $req=mysqli_query($linki,$req2);
 while ($data3=mysqli_fetch_array($req)){ ;// Start looping table row 
 $ct=$data3['compte_ecripture'];
 $dt=$data3['compte_ecripture1'];
?>
        <tr> 
          <td width="76%" height="21" bgcolor="#FFFFFF"><div align="right">LES 
              SOLDES TOTAL DE DEBIT / CREDIT <BR>
            </div></td>
          <td width="10%" bgcolor="#FFFFFF"><div align=""> 
              <?php echo $dt ;?>
              kmf <BR>
            </div></td>
          <td width="14%" bgcolor="#FFFFFF"><div align=""> 
              <?php echo $ct ;?>
              kmf 
              <?php
// Exit looping and close connection 
}
//mysqli_close($linki);
?>
              <BR>
            </div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>
    <table width="100%" border="0" align="center">
      <tr> 
        <td width="84%"> <div align="left">Depense</div></td>
      </tr>
      <tr> 
        <td><form name="form2" method="post" action="formationsupprime1_question.php">
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr bgcolor="#006ABE"> 
                <td width="9%"><font color="#CCCCCC" size="3"><strong>Ref</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="12%"><font color="#CCCCCC" size="3"><strong>Date </strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="16%"><font color="#CCCCCC" size="3"><strong>Compte</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="19%"><font color="#CCCCCC" size="3"><strong>Description</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="18%"><font color="#CCCCCC" size="3"><strong>Pieces</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                 
                <td width="18%"><font color="#CCCCCC" size="3"><strong>Credit</strong></font></td>
                <td width="12%"><font color="#CCCCCC" size=3"><strong>Debit</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="14%"> <font color="#CCCCCC" size="3"><strong>TTC</strong></font></td>
              </tr>
<?php
  //$dj1=$_POST['dj1'];
  //$dj2=$_POST['dj2'];
  $req2="select * from $tb_ecriture where MONTH(Date)=$mois and YEAR(Date)=$annee and mo='D' " ;
  $req=mysqli_query($linki,$req2);
 while ($data=mysqli_fetch_array($req)){ // Start looping table row 
?>

              <tr> 
                <td height="27" bgcolor="#FFFFFF"> <div align=""> 
                    <?php echo $data['ide'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Date'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Compte'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Description'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Pieces'];?>
                    <BR>
                  </div></td>
				    <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Credit'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Debit'];?>
                    <BR>
                  </div></td>
                <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['TTC'];?>
                    <BR>
                  </div></td>
              </tr>
              <?php
// Exit looping and close connection 
}
//mysqli_close($linki);
?>
            </table>
          </form></td>
      </tr>
    </table>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
<?php
  //$dj1=$_POST['dj1'];
  //$dj2=$_POST['dj2'];
  $req2="SELECT SUM(compt_ecriture.Credit)AS compte_ecripture ,SUM(compt_ecriture.Debit)AS compte_ecripture1  FROM $tb_ecriture  where MONTH(Date)=$mois and YEAR(Date)=$annee and mo='D' " ;
  $req=mysqli_query($linki,$req2);
 while ($data3=mysqli_fetch_array($req)){ ;// Start looping table row 
 $ct=$data3['compte_ecripture'];
 $dt=$data3['compte_ecripture1'];
?>

      <tr> 
        <td width="81%" height="21" bgcolor="#FFFFFF"><div align="right">LES SOLDES 
            TOTAL DE DEBIT / CREDIT <BR>
          </div></td>
        <td width="9%" bgcolor="#FFFFFF"><div align=""> 
            <?php echo $dt ;?>
            kmf<BR>
          </div></td>
        <td width="10%" bgcolor="#FFFFFF"><div align=""> 
            <?php echo $ct ;?>
            kmf 
            <?php
// Exit looping and close connection 
}
//mysqli_close($linki);
?>
            <BR>
          </div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>