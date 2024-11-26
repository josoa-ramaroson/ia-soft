<?php
Require 'session.php';
require 'fonction.php';
?>
<?php
 if($_SESSION['u_niveau'] != 20) {
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
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">DEPENSES ( Veuillez choisir le sous compte à Debiter)</h3>
  </div>
  <div class="panel-body">
    
    <table width="100%" border="0" align="center">
      <tr> 
        <td width="84%"> <div align=""> 
            <form action="compt_plan_chercher_debiter.php" method="post" name="testform" id="form2">
<?php require 'compt_plan_listecompte.php'; ?>
              <p>&nbsp;</p>
            </form>
          </div></td>
      </tr>
      <tr> 
        <td><form name="form2" method="post" action="../webscolaire/formationsupprime1_question.php">
            <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
              <tr bgcolor="#006ABE"> 
                <td width="24%" align="center"><font color="#CCCCCC" size="4"><strong>Compte</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="76%" align="center"><font color="#CCCCCC" size="3"><strong>Descritpion 
                  </strong></font></td>
              </tr>
                  <?php

$Numc=$_POST['Numc'];
$req="SELECT Code , Description FROM $plan where  Code like '$Numc%' ";
$resultat=mysqli_query($linki,$req);
while($row=mysqli_fetch_array($resultat)){ // Start looping table row 
$c=$row['Code'];
?>
<?php
              print"<tr>";
			        echo"<td><a href=\"compt_depense.php?Code=$row[Code]\">$c</td>";
					print"<td>$row[Description]</td>";
					//print"<td>$nb</td>";
				print"</tr>";
				?>
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