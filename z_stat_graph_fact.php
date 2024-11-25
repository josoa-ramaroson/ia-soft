<?
require 'session.php';
?>
<html>
<head>
<title><? include 'titre.php'; ?></title>
<? include 'inc/head.php'; ?>
<?php
require 'z_stat_variable_fact.php';
?>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    var chart;
	//var v1 = document.getElementById("v1").value;
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
	var v12=  '<?php echo $b12 ?>';

    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                zoomType: 'xy'
            },
            title: {
                text: 'Facturation TTC'
            },
            subtitle: {
                text: ''
            },
            xAxis: [{
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    formatter: function() {
                        return this.value +'kg';
                    },
                    style: {
                        color: '#89A54E'
                    }
                },
                title: {
                    text: '',
                    style: {
                        color: '#89A54E'
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'Montant en KMF',
                    style: {
                        color: '#4572A7'
                    }
                },
                labels: {
                    formatter: function() {
                        return this.value +' KMF';
                    },
                    style: {
                        color: '#4572A7'
                    }
                },
                opposite: true
            }],
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +
                        (this.series.name == 'Rainfall' ? ' KMF' : 'KMF');
                }
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                x: 120,
                verticalAlign: 'top',
                y: 100,
                floating: true,
                backgroundColor: '#FFFFFF'
            },
            series: [{
                name: 'Montant',
                color: '#4572A7',
                type: 'column',
                yAxis: 1,
                data: [parseFloat(v1), parseFloat(v2), parseFloat(v3), parseFloat(v4), parseFloat(v5), parseFloat(v6), parseFloat(v7), parseFloat(v8), parseFloat(v9), parseFloat(v10), parseFloat(v11), parseFloat(v12)]
    
            }
			/*, {
                name: 'Temperature',
                color: '#89A54E',
                type: 'spline',
                data: [0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }*/
			]
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