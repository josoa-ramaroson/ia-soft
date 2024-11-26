<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php include 'titre.php'; ?></title>
<?php include 'inc/head.php'; ?>
<style type="text/css">
.centre {
	text-align: center;
}
</style>
</head>

<body>
      
<table width="100%" border="0">
  <tr>
    <td width="47%" height="67"><p><strong>
       
    <?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

$iddirection=addslashes($_REQUEST['direction']);

$sql2 = "SELECT * FROM $tb_rhdirection where idrh=$iddirection";
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
$direction=$row2['direction'];
} 
    $m1d=$direction;

$sql5="SELECT * FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie' and direction='$m1d' ORDER BY matricule ASC";
$req5=mysqli_query($linki,$sql5);

while($datam=mysqli_fetch_array($req5)){ // Start looping table row
$idrh=$datam['idrh'];
$sqlconnect="SELECT * FROM $tb_rhpersonnel  WHERE idrhp=$idrh";
$resultconnect=mysqli_query($linki,$sqlconnect);
$rmat=mysqli_fetch_array($resultconnect);
//$nconge= $rmat['nconge'];
$nCPP= $rmat['CPP'];
?>
    <img src="images/eda.png" width="208" height="96" /></strong><strong> </strong></p></td>
    <td width="53%"><h1 class="centre"> BULLETIN DE PAIE <span style="width: 75%; font-size: 24px;">
    </span></h1>
    </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="43%" height="128"><p>Tel : 771 01 68 Fax : 771 02 09 </p>
      <p>Email: eda@comorestelecom.km</p>
      <p> http://www.edaanjouan.com</p>
    <p>Horaire : Lun-Jeu : 7h30-14h30 /</p>
    <p> Ven : 7h30-11h / Sam : 7h30-12h30</p></td>
    <td width="57%"><table width="100%" border="0">
      <tr>
        <td><table width="93%" border="0.5" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="36%">Nom et prenom</td>
            <td width="64%"><font color="#000000"><strong><?php echo $datam['Designation'];?></strong> 
			<?php $nomprenom=substr($datam['nomprenom'],0,22); echo $nomprenom;?> </font></td>
          </tr>
          <tr>
            <td>Fonction</td>
            <td><strong><?php echo $datam['titre'];?></strong></td>
          </tr>
          <tr>
            <td>Matricule </td>
            <td><strong><?php echo $datam['matricule'];?></strong></td>
          </tr>
          <tr>
            <td>Direction</td>
            <td><strong><?php echo $datam['direction'];?></strong></td>
          </tr>
          <tr>
            <td>Service </td>
            <td><strong><?php echo $datam['service'];?></strong></td>
          </tr>
          <tr>
            <td><span style="width:36%">Date d'embauche</span></td>
            <td><strong>
            <?php $dembauche=$datam['dembauche'];  echo  date("d-m-Y", strtotime($dembauche));?></strong></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p align="center">PERIODE DE PAIEMENT :&nbsp;&nbsp;<b> <?php $n1=$datam['moispaie']; 
	  if ($n1==1) echo 'janvier';
	  if ($n1==2) echo 'février'; 
	  if ($n1==3) echo 'Mars';
	  if ($n1==4) echo 'Avril'; 
	  if ($n1==5) echo 'Mai'; 
	  if ($n1==6) echo 'Juin'; 
	  if ($n1==7) echo 'Juillet'; 
	  if ($n1==8) echo 'Août'; 
	  if ($n1==9) echo 'Septembre'; 
	  if ($n1==10) echo 'Octobre';
	  if ($n1==11) echo 'Novembre'; 
	  if ($n1==12) echo 'Decembre';  
	  ?>

<?php echo $datam['anneepaie']; ?></b></p>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Salaire base &amp; Indemnités</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="26%">&nbsp;</td>
            <td width="23%">&nbsp;</td>
            <td width="31%">&nbsp;</td>
            <td width="20%">&nbsp;</td>
            </tr>
          <tr>
            <td>Indice de Base </td>
            <td><?php echo $datam['indice']; ?></td>
            <td width="31%">
              Fonction              </td>
            <td width="20%"><?php echo $datam['fonction']; ?>
             </td>
            </tr>
          <tr>
            <td>Taux </td>
            <td><?php echo $datam['taux']; ?></td>
            <td>
              Transport</td>
            <td><?php echo $datam['transport']; ?></td>
            </tr>
          <tr>
            <td>Salaire de Base (<?php echo $datam['Tin']; ?>)%</td>
            <td><?php echo $datam['sbase']; ?></td>
            <td>
       Logement</td>
            <td><?php echo $datam['logement']; ?></td>
            </tr>
            
          <tr>
     <td>
	  Avancement au marité</td>
            <td><?php echo $datam['avancement']; ?></td>
            
            
            <td> Téléphone </td>
            <td>
              <?php echo $datam['telephone']; ?></td>
            </tr>
          <tr>
            <td>
              Prime d'anciennete              </td>
            <td><?php echo $datam['anciennete']; ?></td>
            
            <td> 
              Risque / Autres Indemnite              </td>
             <td><?php echo $datam['risque'];?></td>
            </tr>
            
          <tr>
            <td>
              Gratification              </td>
            <td><?php echo $datam['gratification']; ?></td>
            
            
            <td>
              Caisse              </td>
            <td><?php echo $datam['caisse'];?></td>
            </tr>
            
            
          <tr>
            <td>
              Rappel              </td>
            <td><?php echo $datam['srappel'];?></td>
            
            
            <td>
              Prime Nuit (Astreinte)              </td>
            <td><?php echo $datam['astreinte'];?></td>
            </tr>
            
            
          <tr>
            <td>
              Heures supplementaire              </td>
            <td><?php echo $datam['heuressup']; ?></td>
            
            
            <td>
              Prime de panier              </td>
            <td><?php echo $datam['panier']; ?></td>
            </tr>
            
            
          <tr>
            <td>
              Congé payé              </td>
            <td><?php echo $datam['conge']; ?></td>
            
            
            <td>
              Remboursement de frais              </td>
            <td><?php echo $datam['remboursement']; ?></td>
            </tr>
            
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TOTAL DE BASE </td>
            <td><strong>
              <?php $SS=$datam['SS']; echo $datam['SS']; ?>
            KMF</strong></td>
            <td>TOTAL INDEMNITES </td>
            <td><strong>
              <?php $SI=$datam['SI']; echo $datam['SI']; ?>
            KMF</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>SALAIRE BRUT</td>
            <td><strong>
              <?php $SB=$SS+$SI; echo $SB; ?>
            KMF</strong></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Deductions &amp; Rétenues </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="26%">Caisse mutuelle</td>
            <td width="29%"><?php echo $datam['cotisation']; ?></td>
            
            <td width="25%">
              IGR              </td>
            <td width="20%"><?php echo $datam['igr']; ?></td>
          </tr>
          
          <tr>
            <td>              Avance sur Salaire              </td>
            <td><?php echo $datam['avances'];?></td>
            
            
            <td>
              Caisse de retraite              </td>
            <td><?php echo $datam['retraite'];?></td>
          </tr>
          
          
          <tr>
            <td>
              Pret              </td>
            <td><?php echo $datam['pret'];?></td>
            
            
            <td>
              Caisse de prevoyances              </td>
            <td><?php echo $datam['prevoyance'];?></td>
          </tr>
          
          <tr>
            <td>              Autre deduction              </td>
            <td><?php echo $datam['adeduction'];?></td>
            
            
            <td>
              Autres retenue              </td>
            <td><?php echo $datam['aretenue'];?></td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TOTAL DEDUCTIONS</td>
            <td><strong><?php echo $datam['SD'];?> KMF</strong></td>
            <td>TOTAL RETENUES</td>
            <td><strong><?php echo $datam['SR'];?> KMF</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>SALAIRE NET </td>
            <td><strong>
              <?php echo $datam['SNET']; ?>
            KMF</strong></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Congés  &amp; Autres Informations </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="32%">Congés restant </td>
            <td width="39%">L'employé </td>
            <td width="29%">Ressource humaine </td>
          </tr>
          <tr>
            <td><?php
echo $datam['nconge'];
?>
Jours              
  <p>Compte de virement <?php
echo $nCPP;
?></p></td>
            <td><p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p></td>
            <td><p>&nbsp;</p>
              <p>&nbsp;</p></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<?php
}
?>



