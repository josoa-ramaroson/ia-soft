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
    <h3 class="panel-title">RECETTES (choisir le compte a Crediter 
      <?php
$req1="SELECT * FROM $plan  ";
$req=mysqli_query($linki,$req1);
?>
      ) </h3>
  </div>
  <div class="panel-body">
    
    <table width="100%" border="0" align="center">
      <tr> 
        <td width="84%"> <div align=""> 
            <form action="compt_plan_chercher_crediter.php" method="post" name="testform" id="form2">
                   <?php require 'compt_plan_listecompte.php'; ?>
            </form>
          </div></td>
      </tr>
      <tr> 
        <td><form name="form2" method="post" action="formationsupprime1_question.php">
          </form></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>