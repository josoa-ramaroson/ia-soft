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
    <h3 class="panel-title">DEPENSES ( Veuillez choisir le compte à Debiter 
      <?php
$req1="SELECT * FROM $plan  ";
$req=mysql_query($req1);
?>
      )</h3>
  </div>
  <div class="panel-body">
    
    <table width="100%" border="0" align="center">
      <tr> 
        <td width="84%"> <div align=""> 
            <form action="compt_plan_chercher_debiter.php" method="post" name="testform" id="form2">
<? require 'compt_plan_listecompte.php'; ?>
            </form>
          </div></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>