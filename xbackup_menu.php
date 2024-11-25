<table width="99%" border="0">
    <tr>
      <td width="33%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Backup selon la table </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%">&nbsp;</td>
          </tr>
        </table>
      </div>
    </div></td>
      <td width="1%">&nbsp;</td>
      <td width="33%"><div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Backup clientEDA &amp; paiement &amp; facturation</h3>
        </div>
        <div class="panel-body">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="52%"><form name="form1" method="post" action="xbackup_day.php">
                    
                        <select name="table" size="1" id="table">
      <?php

  //require 'fonction.php';
  	
  $sql81 = "SHOW TABLES FROM $db WHERE Tables_in_$db='paiement' or Tables_in_$db='billing' or Tables_in_$db='clienteda' " ;




$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_array($result81)) {
	 
$table = $row81[0];
echo '<option> '.$table.' </option>';
}
?>
    </select>
                        <input type="submit" name="IMPRIMER2" id="IMPRIMER2" class="btn btn-sm btn-default"value="BACKUP">
                  </form></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>
      </div></td>
      <td width="2%">&nbsp;</td>
      <td width="31%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Backup de toutes les tables</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
              <tr>
                <td width="52%"></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">EXPORTATION BILLING</h3>
        </div>
        <div class="panel-body">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="52%">
                   <a href="w_billing_extraction.php" class="btn btn-sm btn-info">1 : Extraction  </a> | 
                   &
                   <a href="w_billing_export.php" class="btn btn-sm btn-success">2 : Exportation </a> |
                   &
                   <a href="w_billing_initialisation.php" onclick="return confirm('Etes-vous sûr de vouloir initialiser')" class="btn btn-sm btn-danger" > 3: Initialiser </a> |</td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>
      </div></td>
      <td>&nbsp;</td>
      <td><div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">EXPORTATION PAIEMENT</h3>
        </div>
        <div class="panel-body">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="52%"> 
                   <a href="w_paiement_extraction.php" class="btn btn-sm btn-info">1 : Extraction P </a> | 
                   &
                   <a href="w_paiement_export.php" class="btn btn-sm btn-success">2 : Exportation P </a> |
                  &
                  <a href="w_paiement_initialisation.php" onclick="return confirm('Etes-vous sûr de vouloir initialiser')" class="btn btn-sm btn-danger" > 3 Initialiser P</a></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>
      </div></td>
      <td>&nbsp;</td>
      <td><div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">EXPORTATION CLIENT </h3>
        </div>
        <div class="panel-body">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td width="47%"><table width="100%" border="0.5" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="52%"><a href="w_client_extraction.php" class="btn btn-sm btn-info">1 : Extraction  </a> | 
                    &amp; <a href="w_client_export.php" class="btn btn-sm btn-success">2 : Exportation  </a> |
                    &amp; <a href="w_client_initialisation.php" onclick="return confirm('Etes-vous sûr de vouloir initialiser')" class="btn btn-sm btn-danger" > 3 Initialiser</a></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>
      </div></td>
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
      <td>&nbsp;</td>
    </tr>
  </table>
</p>

