<style type="text/css">
<!--
table {
	vertical-align: top;
	text-align: center;
	font-size: 12px;
}
tr    { vertical-align: top; }
td    { vertical-align: top; }
}
.taille {
	font-size: 16px;
}
.taille {
	font-size: 16px;
}
-->
</style>
    <?php

    $m1v=substr($_REQUEST["m1v"],32);
	$m2q=substr($_REQUEST["m2q"],32);
	$CodeTypeClts=substr($_REQUEST["c"],32);
	
		
require 'fonction.php';
require 'configuration.php';

$sqfact=" SELECT * FROM $tbl_fact f , $tbl_contact c  where f.id=c.id and f.nserie=$nserie and f.fannee=$anneec  and c.ville='$m1v' and  c.quartier='$m2q' and CodeTypeClts='$CodeTypeClts' ORDER BY f.id ASC ";
$reqfact=mysql_query($sqfact);
?>
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 12pt">
<bookmark title="Lettre" level="0" ></bookmark>
    <p><font size="2"><font size="2"><font size="2">
    <span style="width: 25%; color: #444444;"><img src="images/eda.png" width="143" height="63" /></span></font></font></font></p>
    <p><font size="2"><font size="2"><font size="2" class="taille">Journal des ventes 
    </font></font></font>Ville : <?php echo  $m1v;  ?>  Quartier : <?php echo  $m1v;  ?> Categorie : <em>
    <? //$CodeTypeClts;
 
$sqltclient = "SELECT * FROM $tbl_client where idtclient='$CodeTypeClts'";
$resulttclient = mysql_query($sqltclient);
$rowtclient = mysql_fetch_assoc($resulttclient);
if ($rowtclient===FALSE) {}
else 
 {
echo $TypeClts=$rowtclient['TypeClts'];
 }


 ?>
    </em></p>
    <p><font size="2"><font size="2"><font size="2">

    </font></font></font><br>
    </p>
    <nobreak>
      <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr bgcolor="#3071AA">
          <td width="10%" align="center"><font color="#FFFFFF">ID</font></td>
          <td width="32%" align="center"><font color="#FFFFFF" size="4"><strong>Nom du client</strong></font></td>
          <td width="15%" align="center"><font color="#FFFFFF"><strong>A Index</strong></font></td>
          <td width="15%" align="center"><font color="#FFFFFF"><strong>N Index</strong></font></td>
          <td width="14%" align="center"><font color="#FFFFFF"><strong>Cons</strong></font></td>
          <td width="14%" align="center"><font color="#FFFFFF"><strong>M. HT</strong></font></td>
        </tr>
        <?php
while($datafact=mysql_fetch_array($reqfact)){ // Start looping table row 
?>
        <tr class="taille">
          <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['id'];?></font></td>
          <td bgcolor="#FFFFFF"><? echo $datafact['nomprenom'];?></font></td>
          <td align="center" bgcolor="#FFFFFF"><em><font color="#000000"><? echo $datafact['n'];?></font></em></td>
          <td align="center" bgcolor="#FFFFFF"><em><font color="#000000"><? echo $datafact['nf'];?></font></em></td>
          <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['cons'];?></font></td>
          <td align="center" bgcolor="#FFFFFF"><p><font color="#000000"><? echo $datafact['totalht'];?></font></p>
          <p>&nbsp;</p></td>
        </tr>
        <?php
}
mysql_close ();  
?>
      </table>
      <p>&nbsp;</p>
      <p><br>
      </p>
    </nobreak>
</page>