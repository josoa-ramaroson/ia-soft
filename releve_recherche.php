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
<title><? include 'titre.php' ?></title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<table width="98%" border="0">
  <tr>
    <td width="32%"><form name="form1" method="post" action="releve_recherche.php">
      <label for="mr2"></label>
      <input name="mr2" type="text" id="mr2" size="30">
      <input type="submit" name="Cherchez " id="Cherchez " value="Chercher ID">
    </form></td>
    <td width="0%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="37%"></td>
  </tr>
</table>
<p>
  <?php
if (isset($_POST['mr2']))
{
$mr2=addslashes($_POST['mr2']);

$sql = "SELECT count(*) FROM $tbl_fact";  
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
$nb_total = mysql_fetch_array($resultat);  
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
$nb_affichage_par_page = 2; 


$sql = "SELECT * FROM $tbl_fact where id='$mr2'"; 

$sql.=" ORDER BY idf DESC ";  

$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
?>
</p>
<table width="92%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="10%" align="center"><font color="#FFFFFF" size="3"><strong> ID </strong></font></td>
     <td width="27%" align="center"><font color="#FFFFFF" size="3"><strong> NOM DU CLIENT </strong></font></td>
     <td width="13%" align="center"><font color="#FFFFFF" size="3"><strong> N Facture</strong></font></td>
     <td width="11%" align="center"><font color="#FFFFFF"><strong>Ancien Index</strong></font></td>
     <td width="12%" align="center" bgcolor="#3071AA"><font color="#FFFFFF"><strong>Nouveau Index</strong></font></td>
     <td width="11%" align="center"><strong><font color="#FFFFFF">Consommation</font></strong></td>
     <td width="16%" align="center"><strong><font color="#FFFFFF">Montant </font></strong></td>
   </tr>
   <?php
while($data=mysql_fetch_array($req)){ // Start looping table row 

$id=$data['id'];

?>
   <tr>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['id'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><div align="left"><em><? echo $data['bnom'];?></em></div></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nserie'].'/'.$data['fannee'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['n'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['nf'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['cons'];?></em></td>
     <td align="center" bgcolor="#FFFFFF"><em><? echo $data['totalttc'];?></em></td>
   </tr>
   <?php
}
mysql_free_result ($req); 
   //echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysql_free_result ($resultat);  
mysql_close (); 
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