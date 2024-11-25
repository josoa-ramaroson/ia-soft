<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>

<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
span.surlign1{font-style:italic; background-color:#ffff00;}
span.surlign2{font-style:italic; background-color:#ff99FF;}
span.surlign3{font-style:italic; background-color:#ff9999;}
span.surlign4{font-style:italic; background-color:#9999FF;}
body {
	background-image: url(images/bg.jpg);
	background-color: #FFF;
}
body,td,th {
	color: #000;
}
</style>
<title>Document sans titre</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<p>&nbsp;</p>
<table width="99%" border="0">
  <tr>
    <td width="33%">&nbsp;</td>
    <td width="0%">&nbsp;</td>
    <td width="26%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="39%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Id_Client, Id_demande , Description</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="client_anomalies_chercher.php" method="post" name="form1" id="form2">
                  <label for="mr1"></label>
                  <input name="mr1" type="text" id="mr1" size="30" />
                  <input type="submit" name="Cherchez " id="Cherchez " class="btn btn-sm btn-default"value="Chercher " />
                </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
<p>
  <?php
if (isset($_POST['mr1']))
{
$mr1=addslashes($_POST['mr1']);
$s=explode(" ",$mr1);

$sql = "SELECT count(*) FROM  $tbl_client_anom ";  
$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  
$nb_total = mysqli_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 2; 


$sql = "SELECT * FROM  $tbl_client_anom where "; 

foreach($s as $mot) {
        			 if (strlen($mot)>0)

	$sql.="idclient like '%".$mot."%' OR idanomalie like '%".$mot."%' OR description like '%".$mot."%' OR   "; 
					
					
					}
//$sql.=" 0 ORDER BY raisonsociale ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  

$sql.=" 0  ORDER BY idclient ASC ";  

$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  


    function Nom_prenom_client($LE_idclient, $tbl_contact,$linki){
	$sqld7 = "SELECT * FROM $tbl_contact where id='$LE_idclient'";
	$resultatd7 = mysqli_query($linki,$sqld7); 
	$nqtd7 = mysqli_fetch_assoc($resultatd7);
	if((!isset($nqtd7['nomprenom'])|| empty($nqtd7['nomprenom']))) { $qt7=''; return $qt7;}
	else {$qt7=$nqtd7['nomprenom'] ; return $qt7;}
	}	
	
?>
</p>
<table width="98%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
    <td width="15%" align="center"><font color="#FFFFFF" size="4"><strong>ID Client </strong></font></td>
     <td width="15%" align="center"><font color="#FFFFFF" size="4"><strong>ID Demande </strong></font></td>
    <td width="23%" align="center"><font color="#FFFFFF" size="3"><strong>Nom et Prenom </strong></font></td>
    <td width="48%" align="center"><font color="#FFFFFF"><strong>Description</strong></font></td>
    <td width="14%" align="center">&nbsp;</td>
   </tr>
   <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 

	$idclient=$data['idclient'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $idclient = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$idclient);
	 }
	 }
	 
    $idanomalie=$data['idanomalie'];
	$i=0;
    foreach($s as $mot){
	if ( strlen ($mot)>0){
     $i++;
	 if ($i>4){$i=1;}
    $idanomalie = str_replace($mot,'<span class="surlign'.$i.'">'.$mot.'</span>',$idanomalie);
	 }
	 }
?>
    <tr>
    
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $idclient;?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $idanomalie;?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left">
      <? $idclient=$data['idclient']; $nom_prenom=Nom_prenom_client($idclient, $tbl_contact,$linki); echo $nom_prenom;?>
    </div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['description'];?></em></div></td>
    <td align="center" bgcolor="#FFFFFF"><div align="left">
    
     <a href="client_anomalies_resoudre_intervension.php?id=<? echo md5(microtime()).$data['idanomalie'];?>" class="btn btn-sm btn-info" > Intervension</a>
     
    </div></td>
   </tr>
   <?php
}
mysqli_free_result ($req); 
   //echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ($linki); 
}
else {
echo " Pas de recherche <br>";
} 

?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>