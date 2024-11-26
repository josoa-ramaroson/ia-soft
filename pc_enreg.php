<div style="padding:10px; width:440px"><a href="pc_affichage_user.php?id=<?php echo md5(microtime()).$datam['id'];?>" style="margin:0px; float:right" class="btn btn-xs btn-danger">Fermer</a>
<form id="form1" name="form1" method="post" action="pc_enreg_save.php">
  <table width="101%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
    <tr>
      <td width="36%"><input name="id" type="hidden" value="<?php echo $datam['id']; ?>">
        <font size="2"><strong><font size="2"><strong><font color="#FF0000">
      <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
      <input name="nomprenom" type="hidden" value="<?php echo $datam['nomprenom']; ?>" />
      </font><font size="2"><strong><font size="2"><strong><font color="#FF0000">
      <input name="nom" type="hidden" id="nom" value="<?php echo $datam['nom']; ?>" />
      <input name="ile" type="hidden" id="ile" value="<?php echo $datam['ile']; ?>" />
      <input name="ville" type="hidden" id="ville" value="<?php echo $datam['id']; ?>" />
      <input name="agence" type="hidden" id="agence" value="<?php echo $datam['agence']; ?>" />
      </font><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
      <input name="utilisateur" type="hidden" id="utilisateur" value="<?php echo $datam['utilisateur']; ?>" />
      </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></td>
      <td width="64%">&nbsp;</td>
    </tr>
    <tr>
      <td><strong><font color="#000000" size="2">Tache </font></strong></td>
      <td><strong>
        <input name="taches" type="text" id="utilisateur2" size="40" />
      </strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Priorit&eacute;</strong></td>
      <td><select name="statut" size="1" id="select">
        <option>Urgent </option>
        <option selected="selected">Moyen </option>
        <option>Basse</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong><span style="font-size:8.5pt;font-family:Arial">
        <input type="submit" name="Submit" value="Enregistrer une tache" />
      </span></strong></td>
    </tr>
  </table>
</form>
