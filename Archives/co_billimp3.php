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
    <td width="47%" height="67"><p><strong><img src="images/eda.png" width="173" height="65" /></strong></p>
    <p><strong>BP 54 MUTSAMUD ANJOUAN UNION DES COMORES </strong></p></td>
    <td width="53%"><h1 class="centre"> FACTURE <span style="width: 75%; font-size: 24px;">
      <?php
require 'fonction.php';
$link = mysql_connect ($host,$user,$pass); 
mysql_select_db($db);
$idf=substr($_REQUEST["idf"],32);
$sql5="SELECT * FROM $tbl_contact c , $tbl_fact f WHERE c.id=f.id and f.idf='$idf' and st='E'";
$req5=mysql_query($sql5);

while($data5=mysql_fetch_array($req5)){
?>
    </span></h1></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="47%" height="173"><p style="width: 24%">TEL / 71 01 68</p>
    <p style="width: 24%">FAX / 71 10 88</p>
    <p style="width: 24%">Eda@comorestelecom.km</p>
    <p style="width: 24%">Horaire : 7H - 14H</p>
    <p style="width: 24%">VEN-SA: 7H-11H</p></td>
    <td width="53%"><div class="panel panel-info">
  <div class="panel-heading">
        <h3 class="panel-title">Informaton du client </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25%">Nom / Raison Sociale :</td>
                <td width="75%"> <font color="#000000"><? echo $data5['nomprenom'];?></font></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td>Adresse :</td>
                <td><span style="width: 40%; text-align: left"><span style="width:36%"><? echo $data5['secteur'];?> -<? echo $data5['ville'];?></span> - <span style="width:36%"><? echo $data5['quartier'];?></span></span></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td>ID_Client :<span style="width:36%"><? echo $data5['id'];?></span></td>
                <td>Police : <span style="width:36%"><? echo $data5['Police'];?></span></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Ref Client :</td>
                </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div> </td>
  </tr>
</table>
<p>A PAYER AVANT LE :</p>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Informaton du compteur </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="17%"><strong>Nouveau Index</strong></td>
            <td width="17%"><strong>Ancien Index</strong></td>
            <td width="17%"><strong>Consommation </strong></td>
            <td width="17%"><strong>Facture N° </strong></td>
            <td width="17%"><strong>Ampere </strong></td>
            <td width="17%"><strong>Compteur  N° </strong></td>
            </tr>
          <tr>
            <td><span style="width:36%"><? echo $data5['nf'];?> KWH</span></td>
            <td><span style="width:36%"><? echo $data5['n'];?> KWH</span></td>
            <td><span style="width:36%"><? echo $data5['cons'];?> KWH</span></td>
            <td><span style="width:36%"><? echo $data5['nfacture'];?></span></td>
            <td><span style="width:36%"><? echo $data5['amperage'];?></span></td>
            <td><span style="width:36%"><? echo $data5['ncompteur'];?></span></td>
            </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Description de la facture </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0">
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
            <td><span style="width: 10%">KMF</span></td>
            <td><span style="width:36%"><? echo $data5['mont1'];?></span></td>
            <td><span style="width: 10%">KMF</span></td>
          </tr>
          <tr>
            <td><span style="width: 40%; text-align: left">Consommation Tranche 2</span></td>
            <td><span style="width: 13%"><span style="width:36%"><? echo $data5['cons2'];?></span> KWH</span></td>
            <td><span style="width: 10%">KMF</span></td>
            <td><span style="width:36%"><? echo $data5['mont2'];?></span></td>
            <td><span style="width: 10%">KMF</span></td>
          </tr>
          <tr>
            <td><span style="width: 40%; text-align: left">Puissance Souscrite</span></td>
            <td>&nbsp;</td>
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
            <td><span style="width: 40%; text-align: left">Impayee</span></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><span style="width:36%"><? echo $data5['impayee'];?></span></td>
            <td><span style="width: 10%">KMF</span></td>
          </tr>
          <tr>
            <td><span style="width:36%">MONTANT TOTAL A PAYER </span></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><span style="width:36%"><? echo $data5['totalnet'];?></span></td>
            <td><span style="width: 10%">KMF</span></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
</div>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">RECU DE : <font color="#000000"><? echo $data5['nomprenom'];?></font></h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="17%">MONTANT PAYE : ....................................KMF</td>
            <td width="17%"><strong>SIGNATURE</strong></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
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
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">COUPON D ENCAISSEMENT : </h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="17%"><strong>Nouveau Index</strong></td>
            <td width="17%"><strong>Ancien Index</strong></td>
            <td width="17%"><strong>Consommation </strong></td>
            <td width="17%"><strong>Facture N° </strong></td>
            <td width="17%"><strong>ID_CLIENT</strong></td>
            <td width="17%"><strong>Compteur  N° </strong></td>
          </tr>
          <tr>
            <td><span style="width:36%"><? echo $data5['nf'];?> KWH</span></td>
            <td><span style="width:36%"><? echo $data5['n'];?> KWH</span></td>
            <td><span style="width:36%"><? echo $data5['cons'];?> KWH</span></td>
            <td><span style="width:36%"><? echo $data5['nfacture'];?></span></td>
            <td><span style="width:36%"><? echo $data5['amperage'];?></span></td>
            <td><span style="width:36%"><? echo $data5['ncompteur'];?></span></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="100%" border="0">
      <tr>
        <td width="50%"><p>Nom / Raison Sociale : <font color="#000000"><? echo $data5['nomprenom'];?></font></p>
        <p>ADRESSE : <span style="width: 40%; text-align: left"><span style="width:36%"><? echo $data5['ville'];?></span> - <span style="width:36%"><? echo $data5['quartier'];?></span></span></p>
        <p>DATE : </p></td>
        <td width="50%"><p><span style="width:36%">Montant total à payer </span>: <span style="width:36%"><? echo $data5['totalnet'];?></span> KMF</p>
        <p>Montant paye: ...................KMF</p>
        <p>Solde à reporter:................KMF</p></td>
      </tr>
    </table>
  </div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  <?php
}
?>
</p>
<p>&nbsp;</p>
</body>
</html>