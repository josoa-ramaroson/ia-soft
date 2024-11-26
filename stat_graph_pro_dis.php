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
?>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
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
	
	
	
	
	
	
	
	
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Production & Distribution en Kwh'
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

        }]
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

	</body>
</html>
