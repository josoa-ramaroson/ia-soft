<?php
Require 'session.php';
?>
<html>
<head>
<title><?php include 'titre.php'; ?></title>
<?php
require 'z_stat_variable_fac_client.php';
require 'z_stat_variable_rec_client.php';
?>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    var chart;
	var v1 = '<?php echo $b1 ?>';
	var v2 = '<?php echo $b2 ?>';
	var v3 = '<?php echo $b3 ?>';
	var v4 = '<?php echo $b4 ?>';
	var v5 = '<?php echo $b5 ?>';
	var v6 = '<?php echo $b6 ?>';
	var v7 = '<?php echo $b7 ?>';
	var v8 = '<?php echo $b8 ?>';
	var v9 = '<?php echo $b9 ?>';
	var v10 = '<?php echo $b10 ?>';
	var v11 = '<?php echo $b11 ?>';
	var v12= '<?php echo $b12 ?>';
	var v13 = '<?php echo $b13 ?>';
	var v14 = '<?php echo $b14 ?>';
	var v15 = '<?php echo $b15 ?>';
	var v16 = '<?php echo $b16 ?>';
	var v17 = '<?php echo $b17 ?>';
	var v18 = '<?php echo $b18 ?>';
	var v19 = '<?php echo $b19 ?>';
	var v20 = '<?php echo $b20 ?>';
	var v21 = '<?php echo $b21 ?>';
	var v22= '<?php echo $b22 ?>';
	var v23 = '<?php echo $b23 ?>';
	var v24 = '<?php echo $b24 ?>';
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'line'
            },
            title: {
                text: 'SUIVI FACTURATION  ( TOTAL NET ) ET LA RECOUVREMENT D UN CLIENT '
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Montant (KMF)'
                }
            },
            tooltip: {
                enabled: false,
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'kg';
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: ' FACTURATION',
                data:  [parseFloat(v1), parseFloat(v2), parseFloat(v3), parseFloat(v4), parseFloat(v5), parseFloat(v6), parseFloat(v7), parseFloat(v8), parseFloat(v9), parseFloat(v10), parseFloat(v11), parseFloat(v12)]
            }, {
                name: 'RECOUVREMENT',
                data: [parseFloat(v13), parseFloat(v14), parseFloat(v15), parseFloat(v16), parseFloat(v17), parseFloat(v18),
				 parseFloat(v19), parseFloat(v20), parseFloat(v21), parseFloat(v22), parseFloat(v23), parseFloat(v24)]
            }]
        });
    });
    
});
		</script>
</head>
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>

<BODY BGCOLOR="#ffffff" LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
 <span class="panel-body">
 <p>  </p>

<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<p>
  <?php
//$id=$_GET['id'];
$id=$_REQUEST["id"];

$sqlm="SELECT * FROM $tbl_contact WHERE id='$id'";
$resultm=mysqli_query($linki,$sqlm);
$datam=mysqli_fetch_array($resultm);

	/*$sqact="SELECT * FROM $tbl_activite WHERE id='$id'";
	 $resultact=mysqli_query($linki,$sqact);*/
	 
	 	 
	$sqfac="SELECT * FROM z_"."$ARCH"."_$tbl_fact WHERE id='$id' and st='E' ORDER BY idf desc";
	$resultfac=mysqli_query($linki,$sqfac);
	
	$sqfacd="SELECT * FROM z_"."$ARCH"."_$tbl_fact WHERE id='$id' and st!='E' ORDER BY idf desc";
	$resultfacd=mysqli_query($linki,$sqfacd);
	
	$sqpaie="SELECT * FROM z_"."$ARCH"."_$tbl_paiement   WHERE id='$id' and st='E' ORDER BY idp DESC";
	$resultpaie=mysqli_query($linki,$sqpaie);
	
	$sqpaied="SELECT * FROM z_"."$ARCH"."_$tbl_paiement  WHERE id='$id' and st!='E' ORDER BY idp DESC";
	$resultpaied=mysqli_query($linki,$sqpaied);
?></p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"> Historique des facturations et paiements Cyclique</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52%"><table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
              <tr bgcolor="#0794F0">
                <td width="5%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
                <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000">Facturation</font></td>
                <td width="6%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date facturé</strong></font></td>
                <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>ID_client</strong></font></td>
                <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Index J</strong></font></td>
                <td width="6%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Index N</strong></font></td>
                <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Mont TTC</strong></font></td>
                <td width="6%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>ortc</strong></font></td>
                <td width="7%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Impayee</strong></font></td>
                <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>D remise</strong></font></td>
                <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Total net</strong></font></td>
                <td width="9%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
                <td width="13%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <?php
while($rowsfac=mysqli_fetch_array($resultfac)){ 
?>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><em><a href="<?php if ($datam['Tarif']!=10){echo'co_bill.php';} else { echo'co_billMT.php';}?>?idf=<?php echo md5(microtime()).$rowsfac['idf'];?>" target="_blank" ><?php echo $rowsfac['nfacture'];?></a></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['nserie'];?>/<?php echo $rowsfac['fannee'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['date'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['id'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['nf'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['nf2'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['totalttc'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['ortc'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['impayee'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['Pre'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['totalnet'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsfac['report'];?></em></td>
                <td align="center" bgcolor="#FFFFFF"><em>
                  <?php if (($rowsfac['etat']=="facture") and (($_SESSION['u_niveau']==8)or ($_SESSION['u_niveau']==7))){?>
                  <a href="<?php if ($datam['Tarif']!=10){echo'co_modification.php';} else { echo'co_modificationMT.php';}?>?idf=<?php echo md5(microtime()).$rowsfac['idf'];?>" class="btn btn-sm btn-warning" >Modification</a>
                  <?php } else {} ?>
                </em></td>
              </tr>
              <?php
}
?>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#0794F0">
        <td width="9%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>N Reçu </strong></font></td>
        <td width="8%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>N Facture</strong></font></td>
        <td width="10%" align="center" bgcolor="#FFFFFF"><font color="#000000">Facturation</font></td>
        <td width="11%" align="center" bgcolor="#FFFFFF"><font color="#000000" size="3"><strong>Date Paiement</strong></font></td>
        <td width="25%" align="center" bgcolor="#FFFFFF"><strong><font color="#000000" size="3">Nom du client</font></strong></td>
        <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Total net</strong></font></td>
        <td width="13%" align="center" bgcolor="#FFFFFF"><font color="#000000"><strong>Payé</strong></font></td>
        <td width="11%" align="center" bgcolor="#FFFFFF">Reste à payer</td>
      </tr>
      <?php
while($rowsp=mysqli_fetch_array($resultpaie)){ 
?>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><em> <a href="paiement_billimp.php?idp=<?php echo md5(microtime()).$rowsp['idp'];?>" target="_blank" > <?php echo $rowsp['nrecu'];?></a></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['nfacture'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['nserie'];?>/<?php echo $rowsp['fannee'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['date'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['Nomclient'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['montant'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['paiement'];?></em></td>
        <td align="center" bgcolor="#FFFFFF"><em><?php echo $rowsp['report'];?></em></td>
      </tr>
      <?php
}
?>
    </table>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>