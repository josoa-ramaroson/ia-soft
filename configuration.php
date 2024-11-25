<?php
//----------------parametre de configuration--------
$sqlconf = "SELECT * FROM $tbl_config";
$resultconf = mysql_query($sqlconf);
while ($rowconf = mysql_fetch_assoc($resultconf)) {
$anneec=$rowconf['annee'];
$ci=$rowconf['ci'];
$nserie=$rowconf['nserie'];
$cserie=$rowconf['cserie'];
$datec=$rowconf['date'];
$datcoupure=$rowconf['datelimite'];
} 
//--------------------------------------------------- 
?>