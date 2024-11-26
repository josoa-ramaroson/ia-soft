<?php
Require 'session.php';
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
//$id=$_GET['id'];
$id=substr($_REQUEST["id"],32);
//$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tbl_client_anom WHERE idanomalie='$id'";
$resultm=mysqli_query($linki,$sqlm);
$datam=mysqli_fetch_array($resultm);


    function Nom_prenom_client($LE_idclient, $tbl_contact,$linki){
	$sqld7 = "SELECT * FROM  $tbl_contact where id='$LE_idclient'";
	$resultatd7 = mysqli_query($linki,$sqld7); 
	$nqtd7 = mysqli_fetch_assoc($resultatd7);
	if((!isset($nqtd7['nomprenom'])|| empty($nqtd7['nomprenom']))) { $qt7=''; return $qt7;}
	else {$qt7=$nqtd7['nomprenom'] ; return $qt7;}
	}
	
?>
<body>
<script type="text/javascript"> 
function toggleBox(szDivID, iState)// 1 visible, 0 hidden
 {
   if(document.getElementById)   //gecko(NN6) + IE 5+
   {
    var obj = document.getElementById(szDivID);
    obj.style.display = iState ? "block" : "none";
   }
  }
</script>

<?php require 'client_anomalies_menu.php';?>

<table width="100%" border="0" align="center">
  <tr>
    <td height="211"><form action="re_enregistrement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                   <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information du client ainsi que le type de probleme </font></strong></div></td>
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
          <td width="16%">Code Client </td>
          <td width="1%">&nbsp;</td>
          <td width="30%"><strong><?php echo $datam['idclient'];?></strong></td>
          <td width="1%">&nbsp;</td>
          <td width="12%">Date </td>
          <td width="40%"><strong><?php echo $datam['datetinfo'];?></strong></td>
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
          <td><strong><font size="2">Nom et Prenom </font></strong></td>
          <td>&nbsp;</td>
          <td><?php $idclient=$datam['idclient']; $nom_prenom=Nom_prenom_client($idclient,$tbl_contact,$linki); echo $nom_prenom;?></td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Niveau</font></strong></td>
          <td><strong><?php echo $datam['niveau'];?></strong></td>
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
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font size="2">Statut</font></strong></td>
          <td><strong><?php echo $datam['statut'];?></strong></td>
        </tr>
      </table>
      <table width="1039" border="0">
        <tr>
          <td width="172">Description </td>
          <td width="857"><strong><?php echo $datam['description'];?></strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>

 <?php if ($datam['statut']!='Traité') {?>
 
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Créer une demande de résolution</h3>
  </div>
  <div class="panel-body">
    <form name="form1" method="post" action="client_anomalies_resoudre_intervension_save.php">
      <table width="100%" border="0">
        <tr>
          <td width="19%"><strong>Realisateur </strong></td>
          <td width="37%"><input name="realisateur" type="text" class="form-control" id="realisateur" size="40" /></td>
          <td width="3%">&nbsp;</td>
          <td width="8%">&nbsp;</td>
          <td width="33%"><font color="#FF0000">
            <input name="idanomalie" type="hidden" id="idanomalie" value="<?php echo $datam['idanomalie'];?>">
          </font></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong><font size="2">Intervension</font></strong></td>
          <td><textarea name="taches" cols="60" rows="3" class="form-control" id="taches"></textarea></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><font color="#FF0000">
            <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>">
          </font></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><font color="#FF0000">
            <input name="idclient" type="hidden" id="idclient" value="<?php echo $datam['idclient'];?>">
          </font></td>
        </tr>
        <tr>
          <td><font size="2"><strong>Statut</strong></font></td>
          <td>
                   
          <select class="form-control" name="statut" id="statut">
<option>En cours</option>
            <option>Traité</option>
          </select>
           
          </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Enregistre" id="Enregistre" value="Enregistre"></td>
        </tr>
      </table>
    </form>
     </div>
</div>
 <?php } else { } ?>
<p>&nbsp;</p>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">HISTORIQUE DES INTERVENSIONS </h3>
  </div>
  <div class="panel-body">
    <div class="panel-body">
      <div class="panel panel-primary">
        <div class="panel-body">
          <?php
	 $sqord="SELECT * FROM $tbl_client_anom_suivi WHERE idanomalie='$id' ORDER BY idanomaliesuivi DESC ";
	 $resultactord=mysqli_query($linki,$sqord);
?>
          <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
            <tr bgcolor="#3071AA">
              <td width="10%"><font color="#FFFFFF" size="4"><strong>Date</strong></font></td>
              <td width="16%"><font color="#FFFFFF" size="4"><strong>Realisateur </strong></font></td>
              <td width="62%"><strong><font color="#FFFFFF" size="3">Intervension </font></strong></td>
              <td width="12%"><font color="#FFFFFF" size="4"><strong>Suivi</strong></font></td>
            </tr>
            <?php
while($ord=mysqli_fetch_array($resultactord)){ 
?>
            <tr bgcolor="#FFFFFF">
              <td height="32"><?php echo $ord['dateinfo']; ?></td>
              <td><?php echo $ord['realisateur']; ?></td>
              <td><?php echo $ord['taches']; ?></td>
              <td><?php echo $ord['statut']; ?></td>
            </tr>
            <?php }
 ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="21"><?php
include_once('pied.php');
?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("idclien","req","SVP entre un nombre");
	frmvalidator.addValidation("realisateur","req","SVP entre un nombre");
	frmvalidator.addValidation("taches","req","SVP entre un nombre");
		
</script>