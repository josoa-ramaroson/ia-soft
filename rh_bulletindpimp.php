<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><? include 'titre.php'; ?></title>
<? include 'inc/head.php'; ?>
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


$matricule=addslashes($_REQUEST['matricule']);
$m1p=$matricule;

$sql5="SELECT * FROM $tb_rhpaie where matricule='$m1p' ORDER BY ipaie ASC";
$req5=mysql_query($sql5);

while($datam=mysql_fetch_array($req5)){ // Start looping table row

$idrh=$datam['idrh'];
$sqlconnect="SELECT * FROM $tb_rhpersonnel  WHERE idrhp=$idrh";
$resultconnect=mysql_query($sqlconnect);
$rmat=mysql_fetch_array($resultconnect);
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
            <td width="64%"><font color="#000000"><strong><? echo $datam['Designation'];?></strong> 
			<? $nomprenom=substr($datam['nomprenom'],0,22); echo $nomprenom;?> </font></td>
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
            <td><strong>
            <? $dembauche=$datam['dembauche'];  echo  date("d-m-Y", strtotime($dembauche));?></strong></td>
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
            <td width="31%">
              Fonction              </td>
            <td width="20%"><? echo $datam['fonction']; ?>
             </td>
            </tr>
          <tr>
            <td>Taux </td>
            <td><? echo $datam['taux']; ?></td>
            <td>
              Transport</td>
            <td><? echo $datam['transport']; ?></td>
            </tr>
          <tr>
            <td>Salaire de Base (<? echo $datam['Tin']; ?>)%</td>
            <td><? echo $datam['sbase']; ?></td>
            <td>
       Logement</td>
            <td><? echo $datam['logement']; ?></td>
            </tr>
            
          <tr>
     <td>
	  Avancement au marité</td>
            <td><? echo $datam['avancement']; ?></td>
            
            
            <td> Téléphone </td>
            <td>
              <? echo $datam['telephone']; ?></td>
            </tr>
          <tr>
            <td>
              Prime d'anciennete              </td>
            <td><? echo $datam['anciennete']; ?></td>
            
            <td> 
              Risque / Autres Indemnite              </td>
             <td><? echo $datam['risque'];?></td>
            </tr>
            
          <tr>
            <td>
              Gratification              </td>
            <td><? echo $datam['gratification']; ?></td>
            
            
            <td>
              Caisse              </td>
            <td><? echo $datam['caisse'];?></td>
            </tr>
            
            
          <tr>
            <td>
              Rappel              </td>
            <td><? echo $datam['srappel'];?></td>
            
            
            <td>
              Prime Nuit (Astreinte)              </td>
            <td><? echo $datam['astreinte'];?></td>
            </tr>
            
            
          <tr>
            <td>
              Heures supplementaire              </td>
            <td><? echo $datam['heuressup']; ?></td>
            
            
            <td>
              Prime de panier              </td>
            <td><? echo $datam['panier']; ?></td>
            </tr>
            
            
          <tr>
            <td>
              Congé payé              </td>
            <td><? echo $datam['conge']; ?></td>
            
            
            <td>
              Remboursement de frais              </td>
            <td><? echo $datam['remboursement']; ?></td>
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
            <td width="26%">Caisse mutuelle</td>
            <td width="29%"><? echo $datam['cotisation']; ?></td>
            
            <td width="25%">
              IGR              </td>
            <td width="20%"><? echo $datam['igr']; ?></td>
          </tr>
          
          <tr>
            <td>              Avance sur Salaire              </td>
            <td><? echo $datam['avances'];?></td>
            
            
            <td>
              Caisse de retraite              </td>
            <td><? echo $datam['retraite'];?></td>
          </tr>
          
          
          <tr>
            <td>
              Pret              </td>
            <td><? echo $datam['pret'];?></td>
            
            
            <td>
              Caisse de prevoyances              </td>
            <td><? echo $datam['prevoyance'];?></td>
          </tr>
          
          <tr>
            <td>              Autre deduction              </td>
            <td><? echo $datam['adeduction'];?></td>
            
            
            <td>
              Autres retenue              </td>
            <td><? echo $datam['aretenue'];?></td>
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
  <p>Compte de virement
    <?php
echo $nCPP;
?>
  </p></td>
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



