<table width="99%" border="0">
  <tr>
    <td width="31%" height="71"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Les enregistrements</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="stk_Rapport_En_date.php" method="post" name="form1" id="form1">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="23%"><strong><font color="#000000">Date</font><font color="#FF0000">*</font></strong></td>
              <td width="57%"><?php
					  $myCalendar = new tc_calendar("date", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1, $date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('right', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
              <td width="20%" align="right"><input type="submit" name="Submit" value="Aperçu" class="btn btn-sm btn-default" /></td>
              </tr>
            </table>
          </form></td>
              </tr>
               <tr>
                <td width="52%">&nbsp;</td>
              </tr>
              <tr>
                <td width="52%"><form action="stk_Rapport_En_produit.php" method="post" name="form3" id="form3">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="23%" height="26"><strong><font color="#000000">Produit</font><font color="#FF0000">*</font></strong></td>
              <td width="57%"><select name="titre" id="select2">
                <?php
$sql2 = ("SELECT titre  FROM $tbl_enreg GROUP BY titre ORDER BY titre  ASC ");
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
echo '<option> '.$row2['titre'].' </option>';
}

?>
              </select></td>
              <td width="20%" align="right"><input type="submit" name="Submit3" value="Aperçu" class="btn btn-sm btn-default" /></td>
            </tr>
          </table>
        </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="2%">&nbsp;</td>
    <td width="36%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Les ventes</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="stk_Rapport_ven_date.php" method="post" name="form4" id="form4">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="23%"><strong><font color="#000000">Date</font><font color="#FF0000">*</font></strong></td>
                              <td width="57%"><?php
					  $myCalendar = new tc_calendar("vente", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1, $date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('right', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
                              <td width="20%" align="right"><input type="submit" name="Submit4" value="Aperçu" class="btn btn-sm btn-default" /></td>
                            </tr>
                          </table>
                    </form></td>
              </tr>
              <tr>
                <td width="52%">&nbsp;</td>
              </tr>
              <tr>
                <td width="52%"><form action="stk_Rapport_ven_produit.php" method="post" name="form5" id="form5">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="23%" height="26"><strong><font color="#000000">Produit</font><font color="#FF0000">*</font></strong></td>
                              <td width="57%"><select name="titre1" id="select3">
                                <?php
$sql2 = ("SELECT titre  FROM $tbl_vente  GROUP BY titre ORDER BY titre  ASC  ");
$result2 = mysqli_query($linki,$sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
echo '<option> '.$row2['titre'].' </option>';
}

?>
                              </select></td>
                              <td width="20%" align="right"><input type="submit" name="Submit32" value="Aperçu" class="btn btn-sm btn-default" /></td>
                            </tr>
                          </table>
                    </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="1%">&nbsp;</td>
    <td width="30%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Autres rapports</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="" method="post" name="form1" id="form7">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="64%" height="28"><strong><font color="#000000" size="4"><strong> Mensuel</strong></font></strong></td>
                          <td width="36%"><div align="right"><a href="stk_Rapport_w_mois.php"><img src="images/mois.jpg" width="82" height="27" border="0" /></a></div></td>
                        </tr>
                      </table>
                    </form></td>
              </tr>
              <tr>
                <td width="52%">&nbsp;</td>
              </tr>
              <tr>
                <td width="52%"><form action="" method="post" name="form3" id="form8">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="65%" height="26"><font color="#000000" size="4"><strong> Annuel</strong></font></td>
                          <td width="35%"><div align="right"><a href="stk_Rapport_w_annee.php"><img src="images/annee.jpg" width="82" height="27" border="0" /></a></div></td>
                        </tr>
                      </table>
                    </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="71"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Validite</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="stk_Rapport_En_valider.php" method="post" name="form2" id="form2">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="23%"><strong><font color="#000000">Validite</font><font color="#FF0000">* </font></strong></td>
              <td width="57%"><?php
					  $myCalendar = new tc_calendar("Validite", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1, $date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?></td>
              <td width="20%" align="right"><input type="submit" name="Submit2" value="Aperçu" class="btn btn-sm btn-default" /></td>
            </tr>
          </table>
        </form></td>
              </tr>
              <tr>
                <td width="52%">&nbsp;</td>
              </tr>
              <tr>
                <td width="52%">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td>&nbsp;</td>
    <td><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Les vendeurs</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="stk_Rapport_vendeur.php" method="post" name="form6" id="form6">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="23%"><strong><font color="#000000">Vendeur</font><font color="#FF0000">* </font></strong></td>
                              <td width="57%"><select name="user" id="select4">
                                <?php
$sql2 = ("SELECT id_nom FROM $tbl_vente  GROUP BY id_nom ORDER BY id_nom  ASC ");
$result2 = mysqli_query($linki,$sql2);
echo '<option>  </option>';
while ($row2 = mysqli_fetch_assoc($result2)) {
echo '<option> '.$row2['id_nom'].' </option>';
}

?>
                              </select></td>
                              <td width="20%" align="right"><input type="submit" name="Submit22" value="Aperçu" class="btn btn-sm btn-default" /></td>
                            </tr>
                          </table>
                        </form></td>
              </tr>
              <tr>
                <td width="52%">&nbsp;</td>
              </tr>
              <tr>
                <td width="52%"><form action="stk_Rapport_ven_vendeur.php" method="post" name="form6" id="form6">
                          <table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="23%"><strong><font color="#000000">Vendeur</font><font color="#FF0000">* </font></strong></td>
                              <td width="57%"><?php
					  $myCalendar = new tc_calendar("Vendeur", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1, $date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
                                <select name="user" id="select4">
                                  <?php
$sql2 = ("SELECT id_nom FROM $tbl_vente  GROUP BY id_nom ORDER BY id_nom  ASC ");
$result2 = mysqli_query($linki,$sql2);
echo '<option>  </option>';
while ($row2 = mysqli_fetch_assoc($result2)) {
echo '<option> '.$row2['id_nom'].' </option>';
}

?>
                                </select></td>
                              <td width="20%" align="right"><input type="submit" name="Submit22" value="Aperçu" class="btn btn-sm btn-default" /></td>
                            </tr>
                          </table>
                        </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td>&nbsp;</td>
    <td><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Les clients</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"><form action="stk_Rapport_fac_client.php" method="post" name="form21" id="form91">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="30%">Id_Client</td>
                        <td width="35%"><label for="nc"></label>
                          <input name="nc" type="text" id="nc" size="15" /></td>
                        <td width="35%"><div align="right">
                          <input type="submit" name="Submit6" value="Envoyer" class="btn btn-sm btn-default" />
                        </div></td>
                      </tr>
                    </table>
                    </form></td>
              </tr>
              <tr>
                <td width="52%">&nbsp;</td>
              </tr>
              <tr>
                <td width="52%"><form action="stk_Rapport_fac_client.php" method="post" name="form2" id="form9">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="30%"><strong>Edit Facture </strong></td>
                          <td width="35%"><select name="nc" id="select">
                            <?php
$sql4 = "SELECT *  FROM $tbl_contact where statut='2' ORDER BY nomprenom  ASC ";
$result4 = mysqli_query($linki,$sql4);
echo '<option>  </option>';
while ($row4 = mysqli_fetch_assoc($result4)) {
echo '<option value='.$row4['id'].'>'.$row4['nomprenom'].'</option>';
}
?>
                          </select></td>
                          <td width="35%"><div align="right">
                            <input type="submit" name="Submit5" value="Envoyer" class="btn btn-sm btn-default" />
                          </div></td>
                        </tr>
                      </table>
                    </form></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
