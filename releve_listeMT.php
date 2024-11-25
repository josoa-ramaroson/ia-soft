<?
require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<html>
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?
require 'bienvenue.php';    // on appelle la page contenant la fonction

$RefQuartier=addslashes($_POST['quartier']);
$RefLocalite=substr($RefQuartier,0,5);
$RefCommune=substr($RefQuartier,0,3);

$refville=addslashes($_POST['refville']);

$sql1 = "SELECT * FROM quartier where id_quartier=$RefQuartier";
$result1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($result1)) {
$quartier=$row1['quartier'];
}  

$sql2 = "SELECT * FROM ville where refville=$refville";
$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($result2)) {
$ville=$row2['ville'];
} 
    $m1v=$ville;
	$m2q=$quartier;

    //$m1v=addslashes($_REQUEST['m1v']);
	//$m2q=addslashes($_REQUEST['m2q']);
?>
<body>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
    <a href="releve.php" class="btn btn-sm btn-success" > Monophase   </a> | 
    <a href="releveT.php" class="btn btn-sm btn-success" >  Triphase BT  </a> |
     <a href="releve_listeTG.php" class="btn btn-sm btn-success" target="_blank"> Triphase BT GLOBAL </a> |
    <a href="releveMT.php" class="btn btn-sm btn-success" > Triphase MT </a> |
    <a href="releve_listeMTG.php" class="btn btn-sm btn-success" target="_blank"> Triphase MT GLOBAL </a> |

  </div>
</div>

<a href="releve_listeimpMT.php?m1v=<? echo md5(microtime()).$m1v;?>&m2q=<? echo md5(microtime()).$m2q;?>" target="_blank"><img src="images/imprimante.png" width="50" height="30"></a>
 <p>
   <?php
require 'configuration.php';
$sql = "SELECT * FROM  $tbl_contact c  where c.ville='$m1v'  and statut='6' and Tarif='10'  ORDER BY c.id ASC";  
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  

$sql7 = "SELECT COUNT(*) AS bt FROM $tbl_contact c  where c.ville='$m1v'  and statut='6' and Tarif='10' ";   
$req7=mysql_query($sql7);
$data7= mysql_fetch_assoc($req7);
$cbt=$data7['bt']; 

?>
CARNET DE RELEVES: Ville : <em><? echo  $m1v;?></em> Quartier : <em><? //echo $m2q;?></em> -  Nombre des clients est : <? echo $cbt;?></p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="6%" align="center"><strong><font color="#FFFFFF">RANG</font></strong></td>
     <td width="9%"><font color="#FFFFFF" size="4"><strong>ID Client</strong></font></td>
     <td width="21%"><font color="#FFFFFF" size="3"><strong>Nom du client</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>N° Compteur </strong></font></td>
     <td width="12%" align="center"><font color="#FFFFFF"><strong>Ancien Index </strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Index +</strong></font></td>
     <td width="10%" align="center"><font color="#FFFFFF"><strong>Index ++</strong></font></td>
     <td width="20%" align="center"><strong><font color="#FFFFFF">OBSERVATION</font></strong></td>
  </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 
?>
   <tr>
     <td align="center" >&nbsp;</td>
     <td align="center" ><em><? echo $data['id'];?></em></td>
     <td><em><? echo $data['nomprenom'];?></em></td>
     <td align="center" ><em><? echo $data['ncompteur'];?></em></td>
     <td align="center" ><em><? echo $data['Indexinitial'];?></em></td>
     <td align="center" >&nbsp;</td>
     <td align="center" >&nbsp;</td>
     <td align="center" >&nbsp;</td>
   </tr>
   <?php
}
mysql_close ();  
			 
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>