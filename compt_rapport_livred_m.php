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
    <h3 class="panel-title"> GRAND LIVRE PAR MOIS </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" align="center">
      <tr> 
        <td><form name="form2" method="post" action="formationsupprime1_question.php">
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr bgcolor="#006ABE"> 
			    <td><font color="#CCCCCC" size="3"><strong>Ref </strong></font><font color="#000000" size="3">&nbsp;  </font></td>
                <td><font color="#CCCCCC" size="3"><strong>Date </strong></font><font color="#000000" size="3">&nbsp;  </font></td>
                <td><font color="#CCCCCC" size="3"><strong>Compte</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td><font color="#CCCCCC" size="3"><strong>Description</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td><font color="#CCCCCC" size=3"><strong>Debit</strong></font><font color="#000000" size="3">&nbsp;</font></td>
				<td><font color="#CCCCCC" size=3"><strong>Credit</strong></font><font color="#000000" size="3">&nbsp;</font></td>
              </tr>
<?php
  $req2="select * from $tb_ecriture where MONTH(Date)=$mois and YEAR(Date)=$annee ORDER BY Compte DESC " ;
  $req=mysqli_query($linki,$req2);
 while ($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
              <tr> 
			  <td bgcolor="#FFFFFF"><div align=""> 
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
                    <?php echo $data['Debit'];?>
                    <BR>
                  </div></td>
				  <td bgcolor="#FFFFFF"><div align=""> 
                    <?php echo $data['Credit'];?>
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
  </div>
</div>
</body>
</html>