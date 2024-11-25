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
    <span style="width: 25%; color: #444444;"><img src="images/eda.png" width="143" height="63" /></span>
    <p>Liste des clients qui n'ont pas été facturé <br>
      <br>
    <font size="2"><font size="2"><font size="2">
    <?php
require 'fonction.php';
require 'configuration.php';

$sqfact="SELECT * FROM $tbl_contact where statut='6'  and Tarif=10 and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec'  and nserie='$nserie') ORDER BY id  ASC";
$reqfact=mysql_query($sqfact);
?>
    </font></font></font><br>
    </p>

    <nobreak>
      <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr bgcolor="#3071AA">
          <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>Id_Client </strong></font></td>
          <td width="26%" align="center"><font color="#FFFFFF" size="4"><strong>Nom Raison social </strong></font></td>
          <td width="20%" align="center"><font color="#FFFFFF" size="4"><strong>Ville</strong></font></td>
          <td width="18%" align="center"><font color="#FFFFFF" size="3"><strong>Quartier </strong></font></td>
          <td width="12%" align="center"><font color="#FFFFFF" size="4"><strong>INDEX JOURS</strong></font></td>
          <td width="12%" align="center"><font color="#FFFFFF"><strong>INDEX NUIT</strong></font></td>
        </tr>
        <?php
while($data=mysql_fetch_array($reqfact)){ // Start looping table row 
?>
        <tr>
          <td align="center" bgcolor="#FFFFFF"><strong>
            <? echo $data['id'];?>
          </strong></td>
          <td align="center" bgcolor="#FFFFFF"><font color="#000000"><? echo $data['nomprenom'];?></font></td>
          <td align="center" bgcolor="#FFFFFF"><strong><? echo $data['ville'];?></strong></td>
          <td align="center" bgcolor="#FFFFFF"><strong><? echo $data['quartier'];?></strong></td>
          <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
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