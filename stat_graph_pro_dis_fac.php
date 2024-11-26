<?php
Require 'session.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>EDA</title>
<?php
require 'stat_variable_pro.php';
require 'stat_variable_dis.php';
require 'stat_variable_cons.php';
?>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">

		.centre {
      text-align: center;
      font-weight: bold;
    }
    </style>
		<script type="text/javascript">
$(function () {
	
	    var chart;
	var v31 = '<?php echo $b31 ?>';
	var v32 = '<?php echo $b32 ?>';
	var v33 = '<?php echo $b33 ?>';
	var v34 = '<?php echo $b34 ?>';
	var v35 = '<?php echo $b35 ?>';
	var v36 = '<?php echo $b36 ?>';
	var v37 = '<?php echo $b37 ?>';
	var v38 = '<?php echo $b38 ?>';
	var v39 = '<?php echo $b39 ?>';
	var v40 = '<?php echo $b40 ?>';
	var v41 = '<?php echo $b41 ?>';
	var v42= '<?php echo $b42 ?>';
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
	var v12= '<?php echo  $b12 ?>';
	
	
	
	
	
	
	
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Production & Distribution & Facturation en Kwh'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'KWH'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'PRODUCTION',
            data: [parseFloat(v13), parseFloat(v14), parseFloat(v15), parseFloat(v16), parseFloat(v17), parseFloat(v18),
				 parseFloat(v19), parseFloat(v20), parseFloat(v21), parseFloat(v22), parseFloat(v23), parseFloat(v24)]

        }, {
            name: 'DISTRIBUTION',
            data: [parseFloat(v31), parseFloat(v32), parseFloat(v33), parseFloat(v34), parseFloat(v35), parseFloat(v36), parseFloat(v37), parseFloat(v38), parseFloat(v39), parseFloat(v40), parseFloat(v41), parseFloat(v42)]

        },
		
		{
				name: ' FACTURATION SANS CPP EN KWH',
                data:  [parseFloat(v1), parseFloat(v2), parseFloat(v3), parseFloat(v4), parseFloat(v5), parseFloat(v6), parseFloat(v7), parseFloat(v8), parseFloat(v9), parseFloat(v10), parseFloat(v11), parseFloat(v12)]
            
            }
		
		
		
		]
    });
});
		</script>
	</head>
    <?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<table width="100%" border="1">
  <tr>
    <td width="8%">Kwh</td>
    <td width="8%">Janvier</td>
    <td width="9%">Fevrier</td>
    <td width="8%">Mars </td>
    <td width="8%">Avril </td>
    <td width="8%">Mai </td>
    <td width="8%">Juin </td>
    <td width="9%">Juillet </td>
    <td width="8%">Aout </td>
    <td width="7%">Sept </td>
    <td width="6%">Oct</td>
    <td width="6%">Nov</td>
    <td width="7%">Dec</td>
  </tr>
  <tr>
    <td>Production</td>
    <td><?php echo $b13 ?></td>
    <td><?php echo $b14 ?></td>
    <td><?php echo $b15 ?></td>
    <td><?php echo $b16 ?></td>
    <td><?php echo $b17 ?></td>
    <td><?php echo $b18 ?></td>
    <td><?php echo $b19 ?></td>
    <td><?php echo $b20 ?></td>
    <td><?php echo $b21 ?></td>
    <td><?php echo $b22 ?></td>
    <td><?php echo $b23 ?></td>
    <td><?php echo $b24 ?></td>
  </tr>
  <tr>
    <td>Distribution</td>
    <td><?php echo $b31 ?></td>
    <td><?php echo $b32 ?></td>
    <td><?php echo $b33 ?></td>
    <td><?php echo $b34 ?></td>
    <td><?php echo $b35 ?></td>
    <td><?php echo $b36 ?></td>
    <td><?php echo $b37 ?></td>
    <td><?php echo $b38 ?></td>
    <td><?php echo $b39 ?></td>
    <td><?php echo $b40 ?></td>
    <td><?php echo $b41 ?></td>
    <td><?php echo $b42 ?></td>
  </tr>
  <tr>
    <td>Facturation</td>
    <td><?php echo $b1 ?></td>
    <td><?php echo $b2 ?></td>
    <td><?php echo $b3 ?></td>
    <td><?php echo $b4 ?></td>
    <td><?php echo $b5 ?></td>
    <td><?php echo $b6 ?></td>
    <td><?php echo $b7 ?></td>
    <td><?php echo $b8 ?></td>
    <td><?php echo $b9 ?></td>
    <td><?php echo $b10 ?></td>
    <td><?php echo $b11 ?></td>
    <td><?php echo $b12 ?></td>
  </tr>
</table>
<p class="centre">&nbsp;</p>
<p class="centre">LES PERTES <?php echo $annee ?> EN KWH </p>
<table width="100%" border="1">
  <tr>
    <td width="8%">Perte</td>
    <td width="8%">Janvier</td>
    <td width="9%">Fevrier</td>
    <td width="8%">Mars </td>
    <td width="8%">Avril </td>
    <td width="8%">Mai </td>
    <td width="8%">Juin </td>
    <td width="9%">Juillet </td>
    <td width="8%">Aout </td>
    <td width="7%">Sept </td>
    <td width="6%">Oct</td>
    <td width="6%">Nov</td>
    <td width="7%">Dec</td>
  </tr>
  <tr>
    <td>Centrale</td>
    <td><?php echo $c1=$b13-$b31; ?></td>
    <td><?php echo $c2=$b14-$b32; ?></td>
    <td><?php echo $c3=$b15-$b33; ?></td>
    <td><?php echo $c4=$b16-$b34; ?></td>
    <td><?php echo $c5=$b17-$b35; ?></td>
    <td><?php echo $c6=$b18-$b36; ?></td>
    <td><?php echo $c7=$b19-$b37; ?></td>
    <td><?php echo $c8=$b20-$b38; ?></td>
    <td><?php echo $c9=$b21-$b39; ?></td>
    <td><?php echo $c10=$b22-$b40; ?></td>
    <td><?php echo $c11=$b23-$b41; ?></td>
    <td><?php echo $c12=$b24-$b42; ?></td>
  </tr>
  <tr>
    <td>Ligne+fraude</td>
    <td><?php echo $l1=$b31-$b1; ?></td>
    <td><?php echo $l2=$b32-$b2; ?></td>
    <td><?php echo $l3=$b33-$b3; ?></td>
    <td><?php echo $l4=$b34-$b4; ?></td>
    <td><?php echo $l5=$b35-$b5; ?></td>
    <td><?php echo $l6=$b36-$b6; ?></td>
    <td><?php echo $l7=$b37-$b7; ?></td>
    <td><?php echo $l8=$b38-$b8; ?></td>
    <td><?php echo $l9=$b39-$b9; ?></td>
    <td><?php echo $l10=$b40-$b10; ?></td>
    <td><?php echo $l11=$b41-$b11; ?></td>
    <td><?php echo $l12=$b42-$b12; ?></td>
  </tr>
  <tr>
    <td>Total Mois</td>
    <td><?php echo $c1+$l1; ?></td>
    <td><?php echo $c2+$l2; ?></td>
    <td><?php echo $c3+$l3; ?></td>
    <td><?php echo $c4+$l4; ?></td>
    <td><?php echo $c5+$l5; ?></td>
    <td><?php echo $c6+$l6; ?></td>
    <td><?php echo $c7+$l7; ?></td>
    <td><?php echo $c8+$l8; ?></td>
    <td><?php echo $c9+$l9; ?></td>
    <td><?php echo $c10+$l10; ?></td>
    <td><?php echo $c11+$l11; ?></td>
    <td><?php echo $c12+$l12; ?></td>
  </tr>
</table>
<p class="centre">&nbsp;</p>
<p class="centre">LES PERTES <?php echo $annee ?> EN  FRANCS COMORIEN KMF</p>
<table width="100%" border="1">
  <tr>
    <td width="8%">Perte</td>
    <td width="8%">Janvier</td>
    <td width="9%">Fevrier</td>
    <td width="8%">Mars </td>
    <td width="8%">Avril </td>
    <td width="8%">Mai </td>
    <td width="8%">Juin </td>
    <td width="9%">Juillet </td>
    <td width="8%">Aout </td>
    <td width="7%">Sept </td>
    <td width="6%">Oct</td>
    <td width="6%">Nov</td>
    <td width="7%">Dec</td>
  </tr>
  <tr>
    <td>Total Mois</td>
    <?php $prix=132; ?>
    <td><?php echo $prix*($c1+$l1); ?></td>
    <td><?php echo $prix*($c2+$l2); ?></td>
    <td><?php echo $prix*($c3+$l3); ?></td>
    <td><?php echo $prix*($c4+$l4); ?></td>
    <td><?php echo $prix*($c5+$l5); ?></td>
    <td><?php echo $prix*($c6+$l6); ?></td>
    <td><?php echo $prix*($c7+$l7); ?></td>
    <td><?php echo $prix*($c8+$l8); ?></td>
    <td><?php echo $prix*($c9+$l9); ?></td>
    <td><?php echo $prix*($c10+$l10); ?></td>
    <td><?php echo $prix*($c11+$l11); ?></td>
    <td><?php echo $prix*($c12+$l12); ?></td>
  </tr>
</table>
<p></p>
<p class="centre">LES VENTES CPP <?php echo $annee ?> EN  FRANCS COMORIEN KMF</p>
<table width="100%" border="1">
  <tr>
    <td width="8%">VENTE</td>
    <td width="8%">Janvier</td>
    <td width="9%">Fevrier</td>
    <td width="8%">Mars </td>
    <td width="8%">Avril </td>
    <td width="8%">Mai </td>
    <td width="8%">Juin </td>
    <td width="9%">Juillet </td>
    <td width="8%">Aout </td>
    <td width="7%">Sept </td>
    <td width="6%">Oct</td>
    <td width="6%">Nov</td>
    <td width="7%">Dec</td>
  </tr>
  <tr>
    <td>CPP EGYT</td>
    <?php $prix=132; ?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>CPP TOGO</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p></p>
<p class="centre">LES PERTES REELS<?php echo $annee ?> EN  FRANCS COMORIEN KMF</p>
<table width="100%" border="1">
  <tr>
    <td width="8%">Perte REEL</td>
    <td width="8%">Janvier</td>
    <td width="9%">Fevrier</td>
    <td width="8%">Mars </td>
    <td width="8%">Avril </td>
    <td width="8%">Mai </td>
    <td width="8%">Juin </td>
    <td width="9%">Juillet </td>
    <td width="8%">Aout </td>
    <td width="7%">Sept </td>
    <td width="6%">Oct</td>
    <td width="6%">Nov</td>
    <td width="7%">Dec</td>
  </tr>
  <tr>
    <td>Total Mois</td>
    <?php $prix=132; ?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>

	</body>
</html>
