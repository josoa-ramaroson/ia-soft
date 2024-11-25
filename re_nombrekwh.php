<?
require 'session.php';
//require_once('calendar/classes/tc_calendar.php');
//require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
?>
<html>
<head>

<title><? include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
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
<?
//Require("bienvenue.php");  // on appelle la page contenant la fonction
?>
<?
  
$sql = "SELECT COUNT(*) AS nbres, sum(cons2) as cons2 , sum(cons1) as cons1 , sum(cons) as cons , sum(mont1) as mont1 ,sum(mont2) as mont2 , sum(mont1+mont2) as mont, sum(puisct) as puisct , sum(totalht) as totalht, sum(tax) as tax, sum(totalttc) as totalttc , sum(ortc) as ortc , sum(impayee) as impayee , sum(Pre) as Pre, sum(totalnet) as totalnet  FROM  $tbl_fact WHERE nserie=$nserie and fannee=$anneec";  //ASC  DESC
  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
?>
 
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p>Recapitulatif de la facturation </p>
<p>&nbsp;</p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
      <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
  <tr>
         <td><p>NOMBRE DES CLIENTS </p></td>
         <td><p>&nbsp;</p>           <p><? echo  $data['nbres']; ?></p>
         <p>&nbsp;</p></td>
         <td>KWH</td>
       </tr>
       
  <tr>
         <td><p>CONSOMMATION  TRANCHE 1 ( MT + BT)</p></td>
         <td><p>&nbsp;</p>           <p><? echo  $data['cons1']; ?></p>
         <p>&nbsp;</p></td>
         <td>KWH</td>
       </tr>
              <tr>
         <td><p>&nbsp;</p>
         <p>CONSOMMATION TRANCHE 2 ( MT + BT)</p></td>
         <td><p>&nbsp;</p>           <p><? echo  $data['cons2']; ?></p>
           <p>&nbsp;</p></td>
         <td>KWH</td>
       </tr>
       
       <tr>
         <td width="384">CONSOMMATION TOTAL KWH</td>
         <td width="148"><? echo  $data['cons']; ?></td>
         <td width="570"><p>&nbsp;</p>
           <p>KWH</p>
         <p>&nbsp;</p></td>
  </tr>
       <tr>
         <td>MONTANT TRANCHE 1</td>
         <td><p><? echo  $data['mont1']; ?></p></td>
         <td><p>&nbsp;</p>
           <p>KMF</p>
         <p>&nbsp;</p></td>
       </tr>
       <tr>
         <td>MONTANT TRANCHE 2</td>
         <td><? echo  $data['mont2']; ?></td>
         <td><p>&nbsp;</p>
         <p>KMF</p>
         <p>&nbsp;</p></td>
       </tr>
       <tr>
         <td>MONTANT ( TRANCHE 1 + TRANCHE 2)</td>
         <td><? echo  $data['mont']; ?></td>
         <td><p>&nbsp;</p>
         <p>KMF</p>
         <p>&nbsp;</p></td>
       </tr>
       <tr>
         <td><span style="width: 40%; text-align: left">Puissance Souscrite (PS)</span></td>
         <td><? echo  $data['puisct']; ?></td>
         <td><p>&nbsp;</p>
         <p>KMF</p>
         <p>&nbsp;</p></td>
       </tr>
       <tr>
         <td><span style="width: 40%; text-align: left">Montant HT ( MONTANT + PS)</span></td>
         <td><? echo  $data['totalht']; ?></td>
         <td><p>&nbsp;</p>
         <p>KMF</p>
         <p>&nbsp;</p></td>
       </tr>
       <tr>
         <td><span style="width: 40%; text-align: left">Montant TCA ( 3%)</span></td>
         <td><? echo  $data['tax']; ?></td>
      <td><p>&nbsp;</p>
        <p>KMF</p>
        <p>&nbsp;</p></td>
       </tr>
       <tr>
         <td>MONTANT TTC </td>
         <td><? echo  $data['totalttc']; ?></td>
      <td><p>&nbsp;</p>
        <p>KMF</p>
        <p>&nbsp;</p></td>
       </tr>
       <tr>
         <td>CONTRIBUTION ORTC</td>
         <td><? echo  $data['ortc']; ?></td>
         <td><p>&nbsp;</p>
         <p>KMF</p>
         <p>&nbsp;</p></td>
       </tr>
       <tr>
         <td><p>&nbsp;</p>
           <p>IMPAYEE</p>
         <p>&nbsp;</p></td>
         <td><? echo  $data['impayee']; ?></td>
         <td>KMF</td>
       </tr>
       <tr>
         <td><p>&nbsp;</p>
           <p>FRAIS DE REMISE </p>
         <p>&nbsp;</p></td>
         <td><? echo  $data['Pre']; ?></td>
         <td>KMF</td>
       </tr>
       <tr>
         <td><p><span style="width:36%">MONTANT TOTAL A PAYER </span></p>
         <p>&nbsp;</p></td>
         <td><? echo  $data['totalnet']; ?></td>
         <td>KMF</td>
       </tr>
      <?php

//mysql_free_result ($resultat);  
}

mysql_close ();  

?>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center"></div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
  </tr>
  <tr> 
    <td height="21"> 
    
      <?php
include_once('pied.php');
?>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
