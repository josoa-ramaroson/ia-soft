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
	
	$m1v=substr($_REQUEST["m1v"],32);
	$m2q=substr($_REQUEST["m2q"],32);
	
require 'fonction.php';
require 'configuration.php';

$link = mysql_connect ($host,$user,$pass); 
mysql_select_db($db);

    $m1=$m1v;
	$m2=$m2q;

//$idf=substr($_REQUEST["idf"],32);
$sql5="SELECT * FROM $tbl_fact f , $tbl_contact c  WHERE f.id=c.id and f.nserie=$nserie and f.fannee=$anneec and st='E' and c.ville='$m1' and c.quartier='$m2' and  Tarif!='10' ORDER BY f.id ASC";
$req5=mysql_query($sql5);

	$sqlp="update  $tbl_fact  set impression='imprimé' WHERE nserie='$nserie' and st='E' and bquartier='$m2'";
    $resultp=mysql_query($sqlp);
	
while($data5=mysql_fetch_array($req5)){
?>
    <img src="images/eda.png" width="208" height="96" /></strong><strong> </strong></p></td>
    <td width="53%"><h1 class="centre"> FACTURE <span style="width: 75%; font-size: 24px;">
    </span></h1>
    <p align="center"> &nbsp;&nbsp;&nbsp;&nbsp;<b><? echo $data5['nserie'].'/'.$data5['fannee']; ?></b></p></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="41%" height="128"><p>Tel : 771 01 68 Fax : 771 02 09 </p>
      <p>Email: eda@comorestelecom.km</p>
      <p> http://www.edaanjouan.com</p>
    <p>Horaire : Lun-Jeu : 7h30-14h30 /</p>
    <p> Ven : 7h30-11h / Sam : 7h30-12h30</p></td>
    <td width="59%"><table width="98%" border="1">
      <tr>
        <td><table width="93%" border="0.5" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="71%"><table width="98%" border="0">
              <tr>
                <td><table width="93%" border="0.5" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="29%">Nom du client :</td>
                    <td width="71%"><font color="#000000">
                      <? $client=substr($data5['nomprenom'],0,18); echo $client;?>
                    </font></td>
                  </tr>
                  <tr>
                    <td>Adresse :</td>
                    <td><span style="width: 40%; text-align: left"><span style="width:36%"><? echo $data5['ville'];?></span> <span style="width:36%"><? echo $data5['quartier'];?></span></span></td>
                  </tr>
                  <tr>
                    <td>ID Client :</td>
                    <td><span style="width:36%"><? $Codebare=$data5['id']; echo $data5['id'];?> Type de compteur :<? echo $data5['typecompteur'];?></span></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><img src="codeBarre.php?Code=<?=$Codebare?>"></td>
                  </tr>
                </table></td>
              </tr>
            </table>              <font color="#000000">&nbsp;</font></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p align="center">DATE LIMITE DE PAIEMENT : <b> <? $datelimite=$data5['datelimite'];  echo  date("d-m-Y", strtotime($datelimite));?> </b> &nbsp;&nbsp;</p>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Information du compteur </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="18%"><strong>Ancien Index</strong></td>
            <td width="21%"><strong>Nouveau Index</strong></td>
            <td width="18%"><strong>Consommation </strong></td>
            <td width="13%"><strong>Facture N° </strong></td>
            <td width="12%"><strong>Ampere </strong></td>
            <td width="18%"><strong>Compteur  N° </strong></td>
            </tr>
          <tr>
            <td><span style="width:36%"> <? echo $data5['n'];?> KWH</span></td>
            <td><span style="width:36%"> <? echo $data5['nf'];?> KWH</span></td>
            <td><span style="width:36%"><? echo $data5['cons'];?> KWH</span></td>
            <td><span style="width:36%"><? echo $data5['nfacture'];$nfacture=$data5['nfacture']; ?></span></td>
            <td><span style="width:36%"><? echo $data5['amperage'];?></span></td>
            <td><span style="width:36%"><? echo $data5['ncompteur'];?></span></td>
            </tr>
        </table></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</div>
<table width="100%" border="1">
  <tr>
    <td><table width="99%" border="0" align="center">
      <tr>
        <td width="39%"><strong>Détail de la facture </strong></td>
        <td width="25%"><strong>Quantité</strong></td>
        <td width="23%"><strong>Tarification</strong></td>
        <td width="8%"><strong>Montant</strong></td>
        <td width="5%">&nbsp;</td>
      </tr>
      <tr>
        <td><span style="width: 40%; text-align: left">Consommation Tranche 1</span></td>
        <td><span style="width: 13%"><span style="width:36%"><? echo $data5['cons1'];?></span> KWH</span></td>
        <td><span style="width: 10%"><span style="width:36%"><? echo $data5['t1'];?> </span>KMF</span></td>
        <td><span style="width:36%"><? echo $data5['mont1'];?></span></td>
        <td><span style="width: 10%">KMF</span></td>
      </tr>
      <tr>
        <td><span style="width: 40%; text-align: left">Consommation Tranche 2</span></td>
        <td><span style="width: 13%"><span style="width:36%"><? echo $data5['cons2'];?></span> KWH</span></td>
        <td><span style="width: 10%"><span style="width:36%"><? echo $data5['t2'];?> </span>KMF</span></td>
        <td><span style="width:36%"><? echo $data5['mont2'];?></span></td>
        <td><span style="width: 10%">KMF</span></td>
      </tr>
      <tr>
        <td><span style="width: 40%; text-align: left">Puissance Souscrite</span></td>
        <td><span style="width:36%"><? echo $data5['amperage'];?></span> A</td>
        <td>&nbsp;</td>
        <td><span style="width:36%"><? echo $data5['puisct'];?></span></td>
        <td><span style="width: 10%">KMF</span></td>
      </tr>
      <tr>
        <td><span style="width: 40%; text-align: left">Montant HT</span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><span style="width:36%"><? echo $data5['totalht'];?></span></td>
        <td><span style="width: 10%">KMF</span></td>
      </tr>
      <tr>
        <td><span style="width: 40%; text-align: left">Montant TCA</span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><span style="width:36%"><? echo $data5['tax'];?></span></td>
        <td><span style="width: 10%">KMF</span></td>
      </tr>
      <tr>
        <td><span style="width: 40%; text-align: left">Montant TTC</span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><span style="width:36%"><? echo $data5['totalttc'];?></span></td>
        <td><span style="width: 10%">KMF</span></td>
      </tr>
      <tr>
        <td><span style="width: 40%; text-align: left">Contribution ORTC</span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><span style="width:36%"><? echo $data5['ortc'];?></span></td>
        <td><span style="width: 10%">KMF</span></td>
      </tr>
      <tr>
        <td><span style="width: 40%; text-align: left">Impayes/avoir</span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><span style="width:36%"><? echo $data5['impayee'];?></span></td>
        <td><span style="width: 10%">KMF</span></td>
      </tr>
      <? /* if ($data5['Pre']!=0){?>
      <tr>
        <td>Frais de remise </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><span style="width:36%"><? echo $data5['Pre'];?></span></td>
        <td><span style="width: 10%">KMF</span></td>
      </tr>
      <? } else {} */?>
      <tr>
        <td><span style="width:36%"><b> MONTANT TOTAL A PAYER </b> </span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><span style="width:36%"><b><? echo $data5['totalnet'];?></b></td>
        <td>KMF</td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">RECU DE : <font color="#000000"><? echo $client;?></font></h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="76%">MONTANT PAYE : ....................................KMF</td>
            <td width="24%"><strong>SIGNATURE</strong></td>
            </tr>
          <tr>
            </tr>
          <tr>
            <td>SOLDE A REPORTER :..............................KMF</td>
            <td>LE </td>
            </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<p>&nbsp;</p>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">COUPON D'ENCAISSEMENT : </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="17%"><strong>Ancien Index</strong></td>
            <td width="17%"><strong>Nouveau Index</strong></td>
            <td width="17%"><strong>Consommation </strong></td>
            <td width="17%"><strong>Facture N° </strong></td>
            <td width="17%"><strong>ID CLIENT</strong></td>
            <td width="17%"><strong>Compteur  N° </strong></td>
          </tr>
          <tr>
            <td><span style="width:36%"> <? echo $data5['n'];?> KWH</span></td>
            <td><span style="width:36%"> <? echo $data5['nf'];?> KWH</span></td>
            <td><span style="width:36%"><? echo $data5['cons'];?> KWH</span></td>
            <td><span style="width:36%"><? echo $data5['nfacture'];?></span></td>
            <td><span style="width:36%"><? echo $data5['id'];?></span></td>
            <td><span style="width:36%"><? echo $data5['ncompteur'];?></span></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="100%" border="0">
      <tr>
        <td width="50%"><p>Nom / Raison Sociale : <font color="#000000"><? echo $client;?></font></p>
        <p>ADRESSE : <span style="width: 40%; text-align: left"><span style="width:36%"><? echo $data5['ville'];?></span> - <span style="width:36%"><? echo $data5['quartier'];?></span></span></p>
        <p> <img src="codeBarre.php?Code=<?=$Codebare?>" /> DATE : </p></td>
        <td width="50%"><p><span style="width:36%">Montant total à payer </span>: <span style="width:36%"><? echo $data5['totalnet'];?></span> KMF</p>
        <p>Montant paye: ...................KMF</p>
        <p>Solde à reporter:................KMF</p></td>
      </tr>
    </table>
  </div>
</div>
  <?php
}
?>



