<style type="text/css">
<!--
table {
	vertical-align: top;
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
	
require 'fonction.php';
require 'configuration.php';

$sqfact=" SELECT * FROM $tbl_fact f , $tbl_contact c  where f.id=c.id and f.nserie=$nserie and f.fannee=$anneec  and c.ville='$m1v' and  c.quartier='$m2q' ORDER BY f.id ASC ";
$reqfact=mysql_query($sqfact);
?>
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 12pt">
<bookmark title="Lettre" level="0" ></bookmark>
    <p><font size="2"><font size="2"><font size="2">
    <span style="width: 25%; color: #444444;"><img src="images/eda.png" width="143" height="63" /></span></font></font></font></p>
    <p><font size="2"><font size="2"><font size="2" class="taille">Journal des ventes 
    </font></font></font>Ville : <?php echo  $m1v;  ?>  Quartier : <?php echo  $m1v;  ?> </p>
    <p><font size="2"><font size="2"><font size="2">

    </font></font></font><br>
    </p>
    <nobreak>
      <table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr bgcolor="#3071AA">
          <td width="2%" align="center"><font color="#FFFFFF">ID</font></td>
          <td width="28%" align="center"><font color="#FFFFFF" size="4"><strong>Nom du client</strong></font></td>
          <td width="9%" align="center"><font color="#FFFFFF"><strong>A Index</strong></font></td>
          <td width="7%" align="center"><font color="#FFFFFF"><strong>N Index</strong></font></td>
          <td width="8%" align="center"><font color="#FFFFFF"><strong>Cons</strong></font></td>
          <td width="9%" align="center"><font color="#FFFFFF"><strong>M. HT</strong></font></td>
          <td width="10%" align="center"><font color="#FFFFFF"><strong>M. TTC</strong></font></td>
          <td width="8%" align="center"><font color="#FFFFFF"><strong>ORTC</strong></font></td>
          <td width="10%" align="center"><font color="#FFFFFF"><strong>IMPAYEE</strong></font></td>
          <td width="9%" align="center"><font color="#FFFFFF"><strong>M. NET TOTAL</strong></font></td>
        </tr>
        <?php
while($datafact=mysql_fetch_array($reqfact)){ // Start looping table row 
?>
        <tr class="taille">
          <td bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['id'];?></font></td>
          <td bgcolor="#FFFFFF"><? echo $datafact['nomprenom'];?></font></td>
          <td bgcolor="#FFFFFF"><em><font color="#000000"><? echo $datafact['n'];?></font></em></td>
          <td bgcolor="#FFFFFF"><em><font color="#000000"><? echo $datafact['nf'];?></font></em></td>
          <td bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['cons'];?></font></td>
          <td bgcolor="#FFFFFF"><p><font color="#000000"><? echo $datafact['totalht'];?></font></p></td>
          <td bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['totalttc'];?></font></td>
          <td bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['ortc'];?></font></td>
          <td bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['impayee'];?></font></td>
          <td bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['totalnet'];?></font></td>
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