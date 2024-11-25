<style type="text/css">
<!--
table {
	vertical-align: top;
	text-align: center;
}
tr    { vertical-align: top; }
td    { vertical-align: top; }
}
-->
</style>
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 12pt">
<bookmark title="Lettre" level="0" ></bookmark>
    <p><font size="2"><font size="2"><font size="2">
    <span style="width: 25%; color: #444444;"><img src="images/eda.png" width="143" height="63" /></span></font></font></font></p>
    <p><font size="2"><font size="2"><font size="2">Liste des clients qui ont été facturés
    </font></font></font></p>
    <p><font size="2"><font size="2"><font size="2">
    <?php
require 'fonction.php';
require 'configuration.php';

$sqfact=" SELECT * FROM $tbl_fact f , $tbl_contact c  where f.id=c.id and f.nserie=$nserie and f.fannee=$anneec ORDER BY f.id ASC ";
$reqfact=mysql_query($sqfact);
?>
    </font></font></font><br>
    </p>
    <nobreak>
      <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr bgcolor="#3071AA">
          <td width="8%" align="center"><font color="#FFFFFF">ID</font></td>
          <td width="20%" align="center"><font color="#FFFFFF" size="4"><strong>Nom/ Raison social </strong></font></td>
          <td width="11%" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>Ville</strong></font></td>
          <td width="12%" align="center"><font color="#FFFFFF" size="3"><strong>Quartier </strong></font></td>
          <td width="11%" align="center"><font color="#FFFFFF"><strong>Montant</strong></font></td>
          <td width="8%" align="center"><font color="#FFFFFF"><strong>ORTC</strong></font></td>
          <td width="10%" align="center"><font color="#FFFFFF"><strong>Impayee</strong></font></td>
          <td width="8%" align="center"><font color="#FFFFFF"><strong>D remise</strong></font></td>
          <td width="12%" align="center"><font color="#FFFFFF"><strong>Montant net</strong></font></td>
        </tr>
        <?php
while($datafact=mysql_fetch_array($reqfact)){ // Start looping table row 
?>
        <tr>
          <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['id'];?></font></td>
          <td  bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['nomprenom'];?></font></td>
          <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['ville'];?></font></td>
          <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['quartier'];?></font></td>
          <td align="center" bgcolor="#FFFFFF"><em><font color="#000000"><? echo $datafact['totalttc'];?></font></em></td>
          <td align="center" bgcolor="#FFFFFF"><em><font color="#000000"><? echo $datafact['ortc'];?></font></em></td>
          <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['impayee'];?></font></td>
          <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['Pre'];?></font></td>
          <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $datafact['totalnet'];?></font></td>
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