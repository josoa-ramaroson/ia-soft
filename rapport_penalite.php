<?php
Require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
?>
<?php
 if(($_SESSION['u_niveau'] != 2) && ($_SESSION['u_niveau'] != 43) && ($_SESSION['u_niveau'] != 8) && ($_SESSION['u_niveau'] != 3)    && ($_SESSION['u_niveau'] != 90) && ($_SESSION['u_niveau'] != 91) && ($_SESSION['u_niveau'] != 80) && ($_SESSION['u_niveau'] != 46)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.centrevaleur {
	text-align: center;
}
.centrevaleur td {
	text-align: center;
}
.taille16 {	font-size: 16px;
}
</style>
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
 <table width="100%" border="0">
   <tr>
     <td width="34%"><div class="panel panel-primary">
       <div class="panel-heading">
         <h3 class="panel-title">Recouvrement des penalités par mois </h3>
        </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><form action="rapport_penalite.php" method="post" name="form1" id="form1">
               Mois : <font color="#000000">
                 <select name="mois" size="1" id="mois">
                   <option value="1">Janvier</option>
                   <option value="2">Février</option>
                   <option value="3">Mars</option>
                   <option value="4">Avril</option>
                   <option value="5">Mai</option>
                   <option value="6">Juin</option>
                   <option value="7">Juillet</option>
                   <option value="8">Août</option>
                   <option value="9">Septembre</option>
                   <option value="10">Octobre</option>
                   <option value="11">Novembre</option>
                   <option value="12">Décembre</option>
                  </select>
                 </font> <font color="#000000">
                   <select name="annee" size="1" id="annee">
                     <?php
$sql81 = ("SELECT * FROM annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                   </select>
                   </font>
               <input type="submit" name="valider4" id="valider5" value="Valider" />
              </form></td>
            </tr>
          </table>
        </div>
     </div></td>
     <td width="5%">&nbsp;</td>
     <td width="24%">&nbsp;</td>
     <td width="4%">&nbsp;</td>
     <td width="30%">&nbsp;</td>
   </tr>
 </table>
<?php
if ((isset($_POST['mois']))&& (isset($_POST['annee'])))
{
$mois=$_POST['mois'];
$annee=$_POST['annee'];  

$sqFS="SELECT  SUM(Pre) AS Pre, RefLocalite , nserie , fannee FROM $tv_facturation where fannee='$annee'  and nserie='$mois' ";  
	$RFS = mysqli_query($linki,$sqFS); 
	$AFFS = mysqli_fetch_assoc($RFS);
	$tFSl=$AFFS['Pre'];
	$A=$tFSl;

$sqFSN="SELECT  SUM(Pre) AS Pre, totalnet, report, RefLocalite , nserie , fannee FROM $tv_facturation where fannee='$annee'  and nserie='$mois' and totalnet=report";  
	$RFSN = mysqli_query($linki,$sqFSN); 
	$AFFSN = mysqli_fetch_assoc($RFSN);
	$tFSlN=$AFFSN['Pre'];
	$B=$tFSlN;
	
	$C=$A-$B;
	
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Rapport d'activité <?php echo $annee; ?></h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52%"><table width="100%" border="1">
              <tr>
                <td width="16%">&nbsp;</td>
                <td width="10%">Droit de remise</td>
                <td width="11%">RECOUVRE</td>
                <td width="13%">NON RECOUVRE</td>
              </tr>
              <tr>
                <td>Facturation</td>
                <td><?php echo strrev(chunk_split(strrev($tFSl),3," ")) ;?></td>
                <td><?php echo strrev(chunk_split(strrev($C),3," ")) ;?></td>
                <td><?php echo strrev(chunk_split(strrev($tFSlN),3," ")) ;?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<p>&nbsp;</p>
<p><font size="2"><font size="2"><font size="2">
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
</div>
</td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
</tr>
<tr> 
    <td height="21"><p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center">
      <p>
        <?php
		}
else {
echo " Pas de recherche <br>";
} 
include_once('pied.php');
?>
    </p>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
