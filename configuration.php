<?php
//----------------parametre de configuration--------
$sqlconf = "SELECT * FROM $tbl_config";
$resultconf = mysqli_query($linki, $sqlconf);
if (!$resultconf) {
    die('Erreur dans la requête : ' . mysqli_error($linki));
}

while ($rowconf = mysqli_fetch_assoc($resultconf)) {  // Correction ici
    $anneec = $rowconf['annee'];
    $ci = $rowconf['ci'];
    $nserie = $rowconf['nserie'];
    $cserie = $rowconf['cserie'];
    $datec = $rowconf['date'];
    $datcoupure = $rowconf['datelimite'];
}
//--------------------------------------------------- 
?>