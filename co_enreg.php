<div style="padding:10px; width:500px">
<p><a href="re_affichage_user.php?id=<?php echo md5(microtime()).$datam['id'];?>" style="margin:0px; float:right" class="btn btn-xs btn-danger">Fermer</a>
</p>
<form id="form1" name="form1" method="post" action="co_enreg_save.php">
  <table width="101%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
    <tr>
      <td width="36%"><input name="id" type="hidden" value="<?php echo $datam['id']; ?>">
      <input name="Police" type="hidden" id="Police" value="<?php echo $datam['Police']; ?>">
      <font size="2"><strong><font size="2"><strong><font color="#FF0000">
      <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
      </font></strong></font></strong></font></td>
      <td width="64%">&nbsp;</td>
    </tr>
        <tr>
      <td><strong><font size="2">N° Phase</font></strong></td>
      <td><strong>
        <select name="phase" id="phase">
        <option selected="selected"><?php echo $datam['phase']; ?></option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
      </strong></td>
    </tr>
        <tr>
      <td><strong>Puissance</strong></td>
      <td><strong>
        <select name="puissance" id="puissance">
        <option selected="selected"><?php echo $datam['puissance']; ?></option>
          <option>1</option>
          <option>2</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td><strong><font color="#000000" size="2">Tarif</font></strong></td>
      <td><strong>
        <select name="Tarif" id="Tarif">
        <option selected="selected"><?php echo $datam['Tarif']; ?></option>
          <?php
$sql8 = ("SELECT * FROM tarif ORDER BY idt ASC");
$result8 = mysqli_query($linki,$sql8);
while ($row8 = mysqli_fetch_assoc($result8)) {
echo '<option value='.$row8['idt'].'> '.$row8['Libelle'].' </option>';
}

?>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td><strong><font size="2">Calibre ( Amperage)</font></strong></td>
      <td><strong>
        <select name="amperage" id="amperage">
          <option selected="selected"><?php echo $datam['amperage']; ?></option>
          <option>10</option>
          <option>15</option>
          <option>20</option>
          <option>25</option>
          <option>30</option>
          <option>35</option>
          <option>40</option>
          <option>45</option>
          <option>50</option>
          <option>55</option>
          <option>60</option>
          <option>65</option>
          <option>70</option>
          <option>75</option>
          <option>80</option>
          <option>85</option>
          <option>90</option>
          <option>95</option>
          <option>100</option>
          <option>110</option>
          <option>125</option>
          <option>200</option>
          <option>250</option>
          <option>500</option>
          <option>750</option>
          <option>1000</option>
          <option>1250</option>
          <option>1500</option>
          <option>1750</option>
          <option>2000</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td><strong><font size="2">Numero Compteur </font></strong></td>
      <td><strong>
        <input name="ncompteur" type="text" id="ncompteur" value="<?php echo $datam['ncompteur']; ?>" size="20" />
      </strong></td>
    </tr>
    <tr>
      <td><strong><font size="2">Index Jour </font></strong></td>
      <td><strong>
        <input name="Indexinitial" type="text" id="Indexinitial" value="<?php echo $datam['Indexinitial']; ?>" size="20" />
      </strong></td>
    </tr>
    <tr>
      <td>Index Nuit</td>
      <td><strong>
        <input name="index2" type="text" id="index2" value="<?php echo $datam['index2']; ?>" size="20" />
      </strong></td>
    </tr>
    <tr>
      <td><strong><font size="2">Date de pose </font></strong></td>
      <td><?php
					  $myCalendar = new tc_calendar("datepose", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong><span style="font-size:8.5pt;font-family:Arial">
        <input type="submit" name="Submit" value="Enregistrer les informations" />
      </span></strong></td>
    </tr>
  </table>
</form>
