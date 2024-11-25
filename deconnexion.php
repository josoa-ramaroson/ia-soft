<?php
require 'fonction.php';
		$idsession=substr($_REQUEST["id"],32);
		$sqlp="update $tbl_utilisateur  set session=0  WHERE  id_u='$idsession'";
        $resultp=mysqli_query($linki,$sqlp);

// On appelle la session
session_start();
// On écrase le tableau de session
$_SESSION = array();
// On détruit la session
session_destroy();		
include "index.php";
?>

