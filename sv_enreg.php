<div style="padding:10px; width:440px"><a href="re_affichage_user.php?id=<?php echo md5(microtime()).$datam['id'];?>" style="margin:0px; float:right"  class="btn btn-xs btn-danger" >Fermer</a>
<form id="form1" name="form1" method="post" action="sv_enreg_save.php">
  <table width="101%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
    <tr>
      <td width="36%"><input name="id" type="hidden" value="<?php echo $datam['id']; ?>">
      <input name="nomprenom" type="hidden" value="<?php echo $datam['nomprenom']; ?>">
      <font size="2"><strong><font size="2"><strong><font color="#FF0000">
      <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
      </font></strong></font></strong></font></td>
      <td width="64%">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>
        <label for="checkbox_row_4">PlombCPT1</label></strong></td>
      <td><strong>
        <input name="c1" type="text" id="c1" value="" size="40" />
      </strong></td>
    </tr>
    <tr>
      <td><strong>PlombCPT2</strong></td>
      <td><strong>
        <input name="c2" type="text" id="c2" size="40" />
      </strong></td>
    </tr>
    <tr>
      <td><strong>PlombCPT3</strong></td>
      <td><strong>
        <input name="c3" type="text" id="c3" size="40" />
      </strong></td>
    </tr>
    <tr>
      <td><strong>PlombCPT4</strong></td>
      <td><strong>
        <input name="c4" type="text" id="c4" size="40" />
      </strong></td>
    </tr>
    <tr>
      <td><strong>PlombD1J1</strong></td>
      <td><strong>
        <input name="d1" type="text" id="d1" size="40" />
      </strong></td>
    </tr>
    <tr>
      <td><strong>PlombD1J2</strong></td>
      <td><strong>
        <input name="d2" type="text" id="d2" size="40" />
      </strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong><span style="font-size:8.5pt;font-family:Arial">
        <input type="submit" name="Submit" value="Enregistrer " />
      </span></strong></td>
    </tr>
  </table>
</form>

