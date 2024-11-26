<?php
$tps_max_connex = 180;  
$temps_actuel = date("U");  
$sqlnb = 'SELECT count(*) FROM chat_nb WHERE sid1= "'.$_SESSION['SID1'].'" AND sid2= "'.$_SESSION['SID2'].'" ';  
$reqnb = mysqli_query($linki,$sqlnb) or die('Erreur SQL !<br />'.$sqlnb.'<br />'.mysqli_error($linki));  
$datanb = mysqli_fetch_array($reqnb);  
 
mysqli_free_result($reqnb);  
 
if ($datanb[0]) { 
   $sqlnb = 'UPDATE  chat_nb SET time = "'.$temps_actuel.'" WHERE sid1= "'.$_SESSION['SID1'].'" AND sid2= "'.$_SESSION['SID2'].'"'; 
   $reqnb = mysqli_query($linki,$sqlnb) or die ('Erreur SQL !<br />'.$sqlnb.'<br />'.mysqli_error($linki));  
}  
else {  
   $sqlnb = 'INSERT INTO  chat_nb (time,SID1,SID2) VALUES ("'.$temps_actuel.'","'.$_SESSION['SID1'].'","'.$_SESSION['SID2'].'")';  
   $reqnb = mysqli_query($linki,$sqlnb) or die ('Erreur SQL !<br />'.$sqlnb.'<br />'.mysqli_error($linki));  
}  
 
$heure_max = $temps_actuel - $tps_max_connex;  
$sql2nb = 'DELETE  FROM  chat_nb where time < "'.$heure_max.'"';  
 
$req2nb = mysqli_query($linki,$sql2nb) or die ('Erreur SQL !<br />'.$sql2nb.'<br />'.mysqli_error($linki));  
?> 
<?php
$sqlaf = 'SELECT count(*) FROM chat_nb  WHERE (sid1= "'.$_SESSION['SID1'].'" AND sid2= "'.$_SESSION['SID2'].'") or (sid1= "'.$_SESSION['SID2'].'" AND sid2= "'.$_SESSION['SID1'].'")  ';  
$reqaf = mysqli_query($linki,$sqlaf) or die('Erreur SQL !<br />'.$sqlaf.'<br />'.mysqli_error($linki));  
$dataaf = mysqli_fetch_array($reqaf);  
mysqli_free_result($reqaf);
$nbligne=$dataaf[0];  
?> 