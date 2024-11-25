<?
require 'session.php';
?>
<html>
<head>
<title><? include 'titre.php'; ?></title>
<? include 'inc/head.php'; ?>
<?php
require 'stat_variable_rec.php';
?>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    var chart;
	//var v1 = document.getElementById("v1").value;
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
                zoomType: 'xy'
            },
            title: {
                text: 'Recouvrement Electrique'
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
                data: [parseFloat(v13), parseFloat(v14), parseFloat(v15), parseFloat(v16), parseFloat(v17), parseFloat(v18), parseFloat(v19), parseFloat(v20), parseFloat(v21), parseFloat(v22), parseFloat(v23), parseFloat(v24)]
    
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