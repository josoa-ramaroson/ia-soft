<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><? include 'titre.php'; ?></title>
<? //include 'inc/head.php'; ?>
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
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
$direction=$row2['direction'];
} 
    $m1d=$direction;

$sql5="SELECT * FROM $tb_rhpaie where anneepaie='$anneepaie' and moispaie='$moispaie' and direction='$m1d' ORDER BY matricule ASC";
$req5=mysql_query($sql5);

while($datam=mysql_fetch_array($req5)){ // Start looping table row
?>
    <img src="images/eda.png" width="208" height="96" /></strong><strong> </strong></p></td>
    <td width="53%"><h1 class="centre"> BULLETIN DE PAIE <span style="width: 75%; font-size: 24px;">
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
            <td width="64%"><font color="#000000"><strong><? echo $datam['Designation'];?></strong> <? echo $datam['nomprenom'];?></font></td>
          </tr>
          <tr>
            <td>Fonction</td>
            <td><strong><? echo $datam['titre'];?></strong></td>
          </tr>
          <tr>
            <td>Matricule </td>
            <td><strong><? echo $datam['matricule'];?></strong></td>
          </tr>
          <tr>
            <td>Direction</td>
            <td><strong><? echo $datam['direction'];?></strong></td>
          </tr>
          <tr>
            <td>Service </td>
            <td><strong><? echo $datam['service'];?></strong></td>
          </tr>
          <tr>
            <td><span style="width:36%">Date d'embauche</span></td>
            <td><strong><? echo $datam['dembauche'];?></strong></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p align="center">PERIODE DE PAIEMENT :&nbsp;&nbsp;<b> <? $n1=$datam['moispaie']; 
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

<? echo $datam['anneepaie']; ?></b></p>
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
            <td><? echo $datam['indice']; ?></td>
            <td width="31%"><? if ($datam['fonction']!=0){?>
              Fonction 
              <? $fonction=$datam['fonction']; } else { $fonction='';}?></td>
            <td width="20%"><? echo $fonction; ?>
             </td>
            </tr>
          <tr>
            <td>Taux </td>
            <td><? echo $datam['taux']; ?></td>
            <td>
             <? if ($datam['transport']!=0){?> Transport <? $transportt=$datam['transport']; } else { $transport='';}?></td>
            <td><? echo $transport; ?></td>
            </tr>
          <tr>
            <td>Salaire de Base </td>
            <td><? echo $datam['sbase']; ?></td>
            <td>
      <? if ($datam['logement']!=0){?> Logement <? $logement=$datam['logement']; } else { $logement='';}?>
            </td>
            <td><? echo $logement; ?></td>
            </tr>
            
          <tr>
     <td>
	 <? if ($datam['avancement']!=0){?> Avancement au marité <? $avancement=$datam['avancement']; } else { $avancement='';}?></td>
            <td><? echo $avancement; ?></td>
            
            
            <td><? if ($datam['telephone']!=0){?> Téléphone <? $telephone=$datam['telephone']; } else { $telephone='';}?></td>
            <td>
              <? echo $telephone; ?></td>
            </tr>
          <tr>
            <td><? if ($datam['anciennete']!=0){?>
              Prime d'anciennete
              <? $anciennete=$datam['anciennete']; } else { $anciennete='';}?></td>
            <td><? echo $anciennete; ?></td>
            
            <td><? if ($datam['risque']!=0){?> 
              Risque / Autres Indemnite
              <? $risque=$datam['risque']; } else { $risque='';}?></td>
             <td><? echo $risque;?></td>
            </tr>
            
          <tr>
            <td><? if ($datam['gratification']!=0){?>
              Gratification
              <? $gratification=$datam['gratification']; } else { $gratification='';}?></td>
            <td><? echo $gratification; ?></td>
            
            
            <td><? if ($datam['caisse']!=0){?>
              Caisse
              <? $caisse=$datam['caisse']; } else { $caisse='';}?></td>
            <td><? echo $caisse;?></td>
            </tr>
            
            
          <tr>
            <td><? if ($datam['srappel']!=0){?>
              Rappel
              <? $srappel=$datam['srappel']; } else { $srappel='';}?></td>
            <td><? echo $srappel;?></td>
            
            
            <td><? if ($datam['astreinte']!=0){?>
              Prime Nuit (Astreinte)
              <? $astreinte=$datam['astreinte']; } else { $astreinte='';}?></td>
            <td><? echo $astreinte;?></td>
            </tr>
            
            
          <tr>
            <td><? if ($datam['heuressup']!=0){?>
              Heures supplementaire
              <? $heuressup=$datam['heuressup']; } else { $heuressup='';}?></td>
            <td><? echo $heuressup; ?></td>
            
            
            <td><? if ($datam['panier']!=0){?>
              Prime de panier
              <? $panier=$datam['panier']; } else { $panier='';}?></td>
            <td><? echo $panier; ?></td>
            </tr>
            
            
          <tr>
            <td><? if ($datam['conge']!=0){?>
              Congé payé
              <? $conge=$datam['conge']; } else { $conge='';}?></td>
            <td><? echo $conge; ?></td>
            
            
            <td><? if ($datam['remboursement']!=0){?>
              Remboursement de frais
              <? $remboursement=$datam['remboursement']; } else { $remboursement='';}?></td>
            <td><? echo $remboursement; ?></td>
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
              <? $SS=$datam['SS']; echo $datam['SS']; ?>
            KMF</strong></td>
            <td>TOTAL INDEMNITES </td>
            <td><strong>
              <? $SI=$datam['SI']; echo $datam['SI']; ?>
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
              <? $SB=$SS+$SI; echo $SB; ?>
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
            <td width="26%"><? if ($datam['cotisation']!=0){?>
              Cotisation maladies
              <? $cotisation=$datam['cotisation']; } else { $cotisation='';}?></td>
            <td width="29%"><? echo $cotisation; ?></td>
            
            <td width="25%"><? if ($datam['igr']!=0){?>
              IGR
              <? $igr=$datam['igr']; } else { $igr='';}?></td>
            <td width="20%"><? echo $igr; ?></td>
          </tr>
          
          <tr>
            <td><? if ($datam['avances']!=0){?>
              Avance sur Salaire
              <? $avances=$datam['avances']; } else { $avances='';}?></td>
            <td><? echo $avances;?></td>
            
            
            <td><? if ($datam['retraite']!=0){?>
              Caisse de retraite
              <? $retraite=$datam['retraite']; } else { $retraite='';}?></td>
            <td><? echo $retraite;?></td>
          </tr>
          
          
          <tr>
            <td><? if ($datam['pret']!=0){?>
              Pret
              <? $pret=$datam['pret']; } else { $pret='';}?></td>
            <td><? echo $pret;?></td>
            
            
            <td><? if ($datam['prevoyance']!=0){?>
              Caisse de prevoyances
              <? $prevoyance=$datam['prevoyance']; } else { $prevoyance='';}?></td>
            <td><? echo $prevoyance;?></td>
          </tr>
          
          <tr>
            <td><? if ($datam['adeduction']!=0){?>
              Autre deduction
              <? $adeduction=$datam['adeduction']; } else { $adeduction='';}?></td>
            <td><? echo $adeduction;?></td>
            
            
            <td><? if ($datam['aretenue']!=0){?>
              Autres retenue
              <? $aretenue=$datam['aretenue']; } else { $aretenue='';}?></td>
            <td><? echo $aretenue;?></td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>TOTAL DEDUCTIONS</td>
            <td><strong><? echo $datam['SD'];?> KMF</strong></td>
            <td>TOTAL RETENUES</td>
            <td><strong><? echo $datam['SR'];?> KMF</strong></td>
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
              <? echo $datam['SNET']; ?>
            KMF</strong></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<p>&nbsp;</p>
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
<p align="center">&nbsp;</p>
<?php
}
?>



