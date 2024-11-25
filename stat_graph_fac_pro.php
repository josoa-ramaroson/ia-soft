<?
require 'session.php';
?>
<html>
<head>
<title><? include 'titre.php'; ?></title>
<?php
require 'stat_variable_cons.php';
require 'stat_variable_pro.php';
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
                text: ''
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
                name: ' FACTURATION SANS CPP EN KWH',
                data:  [parseFloat(v1), parseFloat(v2), parseFloat(v3), parseFloat(v4), parseFloat(v5), parseFloat(v6), parseFloat(v7), parseFloat(v8), parseFloat(v9), parseFloat(v10), parseFloat(v11), parseFloat(v12)]
            }, {
                name: 'PRODUCTION EN KWH',
                data: [parseFloat(v13), parseFloat(v14), parseFloat(v15), parseFloat(v16), parseFloat(v17), parseFloat(v18),
				 parseFloat(v19), parseFloat(v20), parseFloat(v21), parseFloat(v22), parseFloat(v23), parseFloat(v24)]
            }]
        });
    });
    
});
		</script>
</head>
<?
require("bienvenue.php");    // on appelle la page contenant la fonction
?>

<BODY BGCOLOR="#ffffff" LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
 <span class="panel-body">
 <p>  </p>

<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

	</body>
</html>