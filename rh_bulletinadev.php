<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php include 'titre.php'; ?></title>
<?php //include 'inc/head.php'; ?>
<style type="text/css">
.centre {
	text-align: center;
}
</style>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td width="47%" height="67"><p><strong><img src="images/eda.png" width="208" height="96" /></strong><strong> </strong></p></td>
    <td width="53%"><h1 class="centre"> BULLETIN DE PAIE <span style="width: 75%; font-size: 24px;">
      <?php
require 'fonction.php';
require 'rh_configuration_fonction.php';

$sql5="SELECT * FROM  $tb_rhpaie where  idrh=1  and anneepaie='$anneepaie' and moispaie='$moispaie'";
$req5=mysqli_query($linki,$sql5);

while($datam=mysqli_fetch_array($req5)){ // Start looping table row
?>
    </span></h1>
    <p align="center">&nbsp;</p></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="43%" height="128"><p>Tel : 771 01 68 Fax : 771 02 09 </p>
      <p>Email: eda@comorestelecom.km</p>
      <p> http://www.edaanjouan.com</p>
    <p>Horaire : Lun-Jeu : 7h30-14h30 /</p>
    <p> Ven : 7h30-11h / Sam : 7h30-12h30</p></td>
    <td width="57%"><table width="100%" border="1">
      <tr>
        <td><table width="93%" border="0.5" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="36%">Nom et prenom</td>
            <td width="64%"><font color="#000000"><strong><?php echo $datam['Designation'];?></strong> <?php echo $datam['nomprenom'];?></font></td>
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
            <td><strong><?php echo $datam['dembauche'];?></strong></td>
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
            <td width="31%"><?php if ($datam['fonction']!=0){?>
              Fonction 
              <?php $fonction=$datam['fonction']; } else { $fonction='';}?></td>
            <td width="20%"><?php echo $fonction; ?>
             </td>
            </tr>
          <tr>
            <td>Taux </td>
            <td><?php echo $datam['taux']; ?></td>
            <td>
             <?php if ($datam['transport']!=0){?> Transport <?php $transportt=$datam['transport']; } else { $transport='';}?></td>
            <td><?php echo $transport; ?></td>
            </tr>
          <tr>
            <td>Salaire de Base </td>
            <td><?php echo $datam['sbase']; ?></td>
            <td>
      <?php if ($datam['logement']!=0){?> Logement <?php $logement=$datam['logement']; } else { $logement='';}?>
            </td>
            <td><?php echo $logement; ?></td>
            </tr>
            
          <tr>
     <td>
	 <?php if ($datam['avancement']!=0){?> Avancement au marité <?php $avancement=$datam['avancement']; } else { $avancement='';}?></td>
            <td><?php echo $avancement; ?></td>
            
            
            <td><?php if ($datam['telephone']!=0){?> Téléphone <?php $telephone=$datam['telephone']; } else { $telephone='';}?></td>
            <td>
              <?php echo $telephone; ?></td>
            </tr>
          <tr>
            <td><?php if ($datam['anciennete']!=0){?>
              Prime d'anciennete
              <?php $anciennete=$datam['anciennete']; } else { $anciennete='';}?></td>
            <td><?php echo $anciennete; ?></td>
            
            <td><?php if ($datam['risque']!=0){?> 
              Risque / Autres Indemnite
              <?php $risque=$datam['risque']; } else { $risque='';}?></td>
             <td><?php echo $risque;?></td>
            </tr>
            
          <tr>
            <td><?php if ($datam['gratification']!=0){?>
              Gratification
              <?php $gratification=$datam['gratification']; } else { $gratification='';}?></td>
            <td><?php echo $gratification; ?></td>
            
            
            <td><?php if ($datam['caisse']!=0){?>
              Caisse
              <?php $caisse=$datam['caisse']; } else { $caisse='';}?></td>
            <td><?php echo $caisse;?></td>
            </tr>
            
            
          <tr>
            <td><?php if ($datam['srappel']!=0){?>
              Rappel
              <?php $srappel=$datam['srappel']; } else { $srappel='';}?></td>
            <td><?php echo $srappel;?></td>
            
            
            <td><?php if ($datam['astreinte']!=0){?>
              Prime Nuit (Astreinte)
              <?php $astreinte=$datam['astreinte']; } else { $astreinte='';}?></td>
            <td><?php echo $astreinte;?></td>
            </tr>
            
            
          <tr>
            <td><?php if ($datam['heuressup']!=0){?>
              Heures supplementaire
              <?php $heuressup=$datam['heuressup']; } else { $heuressup='';}?></td>
            <td><?php echo $heuressup; ?></td>
            
            
            <td><?php if ($datam['panier']!=0){?>
              Prime de panier
              <?php $panier=$datam['panier']; } else { $panier='';}?></td>
            <td><?php echo $panier; ?></td>
            </tr>
            
            
          <tr>
            <td><?php if ($datam['conge']!=0){?>
              Congé payé
              <?php $conge=$datam['conge']; } else { $conge='';}?></td>
            <td><?php echo $conge; ?></td>
            
            
            <td><?php if ($datam['remboursement']!=0){?>
              Remboursement de frais
              <?php $remboursement=$datam['remboursement']; } else { $remboursement='';}?></td>
            <td><?php echo $remboursement; ?></td>
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
            <td width="26%"><?php if ($datam['cotisation']!=0){?>
              Cotisation maladies
              <?php $cotisation=$datam['cotisation']; } else { $cotisation='';}?></td>
            <td width="29%"><?php echo $cotisation; ?></td>
            
            <td width="25%"><?php if ($datam['igr']!=0){?>
              IGR
              <?php $igr=$datam['igr']; } else { $igr='';}?></td>
            <td width="20%"><?php echo $igr; ?></td>
          </tr>
          
          <tr>
            <td><?php if ($datam['avances']!=0){?>
              Avance sur Salaire
              <?php $avances=$datam['avances']; } else { $avances='';}?></td>
            <td><?php echo $avances;?></td>
            
            
            <td><?php if ($datam['retraite']!=0){?>
              Caisse de retraite
              <?php $retraite=$datam['retraite']; } else { $retraite='';}?></td>
            <td><?php echo $retraite;?></td>
          </tr>
          
          
          <tr>
            <td><?php if ($datam['pret']!=0){?>
              Pret
              <?php $pret=$datam['pret']; } else { $pret='';}?></td>
            <td><?php echo $pret;?></td>
            
            
            <td><?php if ($datam['prevoyance']!=0){?>
              Caisse de prevoyances
              <?php $prevoyance=$datam['prevoyance']; } else { $prevoyance='';}?></td>
            <td><?php echo $prevoyance;?></td>
          </tr>
          
          <tr>
            <td><?php if ($datam['adeduction']!=0){?>
              Autre deduction
              <?php $adeduction=$datam['adeduction']; } else { $adeduction='';}?></td>
            <td><?php echo $adeduction;?></td>
            
            
            <td><?php if ($datam['aretenue']!=0){?>
              Autres retenue
              <?php $aretenue=$datam['aretenue']; } else { $aretenue='';}?></td>
            <td><?php echo $aretenue;?></td>
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
<p>&nbsp;</p>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Congés  &amp; Autres Informations  </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="16%">Congés restant </td>
            <td width="29%">L'employé </td>
            <td width="28%">Ressource humaine ( Signature)</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><p>&nbsp;</p>
              <p>&nbsp;</p></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<p align="center">&nbsp;</p>
<?php
}
?>



