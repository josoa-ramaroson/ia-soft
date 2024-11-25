<?
require 'session.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Representation Graphique </title>
<?php
require 'z_stat_variable_dclient.php';
?>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {

    Highcharts.data({
        csv: document.getElementById('tsv').innerHTML,
        itemDelimiter: '\t',
        parsed: function (columns) {

            var brands = {},
                brandsData = [],
                versions = {},
                drilldownSeries = [];

            // Parse percentage strings
            columns[1] = $.map(columns[1], function (value) {
                if (value.indexOf('%') === value.length - 1) {
                    value = parseFloat(value);
                }
                return value;
            });

            $.each(columns[0], function (i, name) {
                var brand,
                    version;

                if (i > 0) {

                    // Remove special edition notes
                    name = name.split(' -')[0];

                    // Split into brand and version
                    version = name.match(/([0-9]+[\.0-9x]*)/);
                    if (version) {
                        version = version[0];
                    }
                    brand = name.replace(version, '');

                    // Create the main data
                    if (!brands[brand]) {
                        brands[brand] = columns[1][i];
                    } else {
                        brands[brand] += columns[1][i];
                    }

                    // Create the version data
                    if (version !== null) {
                        if (!versions[brand]) {
                            versions[brand] = [];
                        }
                        versions[brand].push(['v' + version, columns[1][i]]);
                    }
                }

            });

            $.each(brands, function (name, y) {
                brandsData.push({
                    name: name,
                    y: y,
                    drilldown: versions[name] ? name : null
                });
            });
            $.each(versions, function (key, value) {
                drilldownSeries.push({
                    name: key,
                    id: key,
                    data: value
                });
            });

            // Create the chart
            $('#container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Electricite d Anjouan '
                },
                subtitle: {
                    text: 'Cliquez sur les colonnes pour afficher.'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: '%'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: brandsData
                }],
                drilldown: {
                    series: drilldownSeries
                }
            });
        }
    });
});


		</script>
	</head>
    <?
require("bienvenue.php");    // on appelle la page contenant la fonction
?>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/data.js"></script>
<script src="js/modules/drilldown.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<pre id="tsv" style="display:none">Browser Version	Total Market Share
Police 1 	<?php echo $qt1 ?>%
Devis  2  	<?php echo $qt2 ?>%
Changement de Nom 3  	<?php echo $qt3 ?>%
Changement de compteur 4	<?php echo $qt4 ?>%
Transfert  5  	<?php echo $qt5 ?>%
Compteur Activer  6  	<?php echo $qt6 ?>%
Fraude  7  	<?php echo $qt7 ?>%</pre>
<table width="100%" border="1">
  <tr>
    <td>TOTAL </td>
    <td>Police</td>
    <td>Devis </td>
    <td>Chan Nom</td>
    <td>Chan Compt</td>
    <td>Transfert</td>
    <td>Activer</td>
    <td>Fraude</td>
  </tr>
  <tr>
    <td><?php echo $tt ?></td>
    <td><?php echo $tFPn ?></td>
    <td><?php echo $tFDn ?></td>
    <td><?php echo $tFAtNn ?></td>
    <td><?php echo $tFAtCn ?></td>
    <td><?php echo $tFAtTn ?></td>
    <td><?php echo $tFAtRn ?></td>
    <td><?php echo $tFFn ?></td>
  </tr>
  <tr>
    <td>Montant</td>
    <td><?php echo $tFPt ?></td>
    <td><?php echo $tFDt ?></td>
    <td><?php echo $tFAtN ?></td>
    <td><?php echo $tFAtC ?></td>
    <td><?php echo $tFAtT ?></td>
    <td><?php echo $tFAtR ?></td>
    <td><?php echo $tFFt ?></td>
  </tr>
</table>
<p>&nbsp;</p>
	</body>
</html>
