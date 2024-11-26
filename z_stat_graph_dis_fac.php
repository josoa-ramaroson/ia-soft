<?php
Require 'session.php';
?>
<html>
<head>
<title><?php include 'titre.php'; ?></title>
<?php
require 'z_stat_variable_cons.php';
require 'stat_variable_dis.php';
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
	var v12= '<?php echo  $b12 ?>';
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
            series: [
			
			{
				
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

	</body>
</html>