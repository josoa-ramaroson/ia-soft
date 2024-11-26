<p>&nbsp;</p>
    <form action="rh_employer_salaire_save.php" method="post" name="form1" id="form2">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">
      <input name="id" type="hidden" value="<?php echo $datam['idrhp']; ?>" />
      <font size="2"><strong><font size="2"><strong><font color="#FF0000">
      <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
    </font></strong></font></strong></font>SALAIRES &amp; INDEMNITES</h3>
  </div>
  <div class="panel-body">

      <table width="100%" border="0">
        <tr>
          <td width="20%">SALAIRE </td>
          <td width="30%">&nbsp;</td>
          <td width="3%">&nbsp;</td>
          <td width="23%">INDEMNITES</td>
          <td width="24%">&nbsp;</td>
        </tr>
        <tr>
          <td>Indice de Base </td>
          <td><strong>
            <input class="form-control" name="indice" type="text" id="indice" value="<?php echo $datam['indice']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Fonction</td>
          <td><strong>
            <input name="fonction" type="text" class="form-control" id="fonction" value="<?php echo $datam['fonction']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Taux </td>
          <td><strong>
            <input name="taux" type="text" class="form-control" id="taux" value="<?php echo $datam['taux']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Transport</td>
          <td><strong>
            <input name="transport" type="text" class="form-control" id="transport" value="<?php echo $datam['transport']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Salaire de Base</td>
          <td><strong>
            <input name="sbase" type="text" class="form-control" id="sbase" value="<?php echo $datam['sbase']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Logement</td>
          <td><strong>
            <input name="logement" type="text" class="form-control" id="logement" value="<?php echo $datam['logement']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Avancement au marité</td>
          <td><strong>
            <input name="avancement" type="text" class="form-control" id="avancement" value="<?php echo $datam['avancement']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Téléphone</td>
          <td><strong>
            <input name="telephone" type="text" class="form-control" id="telephone" value="<?php echo $datam['telephone']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Prime d'anciennete</td>
          <td><strong>
            <input name="anciennete" type="text" class="form-control" id="anciennete" value="<?php echo $datam['anciennete']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Risque / Autres Indemnite</td>
          <td><strong>
            <input name="risque" type="text" class="form-control" id="risque" value="<?php echo $datam['risque']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Gratification</td>
          <td><strong>
            <input name="gratification" type="text" class="form-control" id="gratification" value="<?php echo $datam['gratification']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Caisse</td>
          <td><strong>
            <input name="caisse" type="text" class="form-control" id="caisse" value="<?php echo $datam['caisse']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Rappel</td>
          <td><strong>
            <input name="srappel" type="text" class="form-control" id="srappel" value="<?php echo $datam['srappel']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Prime Nuit ( Astreinte)</td>
          <td><strong>
            <input name="astreinte" type="text" class="form-control" id="astreinte" value="<?php echo $datam['astreinte']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Heures supplementaire</td>
          <td><strong>
            <input name="heuressup" type="text" class="form-control" id="heuressup" value="<?php echo $datam['heuressup']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Prime de panier</td>
          <td><strong>
            <input name="panier" type="text" class="form-control" id="panier" value="<?php echo $datam['panier']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>Congé payé</td>
          <td><strong>
            <input name="conge" type="text" class="form-control" id="conge" value="<?php echo $datam['conge']; ?>" size="20" />
          </strong></td>
          <td>&nbsp;</td>
          <td>Remboursement de frais</td>
          <td><strong>
            <input name="remboursement" type="text" class="form-control" id="remboursement" value="<?php echo $datam['remboursement']; ?>" size="20" />
          </strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">DEDUCTIONS &amp; RETENUES</h3>
  </div>
  <div class="panel-body">
    <table width="100%" border="0">
      <tr>
        <td width="20%">DEDUCTION</td>
        <td width="30%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="23%">RETENUES</td>
        <td width="24%">&nbsp;</td>
      </tr>
      <tr>
        <td>Caisse mutuelle</td>
        <td><strong>
          <input name="cotisation" type="text" class="form-control" id="cotisation" value="<?php echo $datam['cotisation']; ?>" size="20" />
        </strong></td>
        <td>&nbsp;</td>
        <td>IGR</td>
        <td><strong>
          <input name="igr" type="text" disabled="disabled" class="form-control" id="igr" value="<?php echo $datam['igr']; ?>" size="20" readonly="readonly" />
        </strong></td>
      </tr>
      <tr>
        <td>Avance sur Salaire</td>
        <td><strong>
          <input name="avances" type="text" class="form-control" id="avances" value="<?php echo $datam['avances']; ?>" size="20" />
        </strong></td>
        <td>&nbsp;</td>
        <td>Caisse de retraite</td>
        <td><strong>
          <input name="retraite" type="text" disabled="disabled" class="form-control" id="retraite" value="<?php echo $datam['retraite']; ?>" size="20" readonly="readonly" />
        </strong></td>
      </tr>
      <tr>
        <td>Pret</td>
        <td><strong>
          <input name="pret" type="text" class="form-control" id="pret" value="<?php echo $datam['pret']; ?>" size="20" />
        </strong></td>
        <td>&nbsp;</td>
        <td>Caisse de prevoyances</td>
        <td><strong>
          <input name="prevoyance" type="text" class="form-control" id="prevoyance" value="<?php echo $datam['prevoyance']; ?>" size="20" />
        </strong></td>
      </tr>
      <tr>
        <td>Autre deduction</td>
        <td><strong>
          <input name="adeduction" type="text" class="form-control" id="adeduction" value="<?php echo $datam['adeduction']; ?>" size="20" />
        </strong></td>
        <td>&nbsp;</td>
        <td>Autres retenue</td>
        <td><strong>
          <input name="aretenue" type="text" class="form-control" id="aretenue" value="<?php echo $datam['aretenue']; ?>" size="20" />
        </strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>NET A PAYER </td>
        <td><strong>
          <input name="SNET" type="text" disabled="disabled" class="form-control" id="SNET" value="<?php echo $datam['SNET']; ?>" size="20" readonly="readonly" />
        </strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong><span style="font-size:8.5pt;font-family:Arial">
          <input type="submit" name="Submit" value="Enregistrer"  class="btn btn-primary"/>
          <a href="rh_employer_user.php?id=<?php echo md5(microtime()).$datam['idrhp'];?>" class="btn btn-danger">FERMER</a></span></strong></td>
      </tr>
    </table>
  </div>
</div>
    </form>
<p>&nbsp; </p>
