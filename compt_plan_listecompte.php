     <table width="70%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0000FF" bgcolor="#FFFFFF">
                <tr>
                  <td width="24%"><strong><font size="2">Numero de Compte</font></strong></td>
                  <td width="60%"><strong>
                    <select name="Numc" id="select3">
                      <?php
$req="select Numc, Description  from $compte ";
$resultat4=mysql_query($req);
while ($row3 = mysql_fetch_assoc($resultat4)) {
//echo '<option> '.$row3['Numc'].' </option>';
echo '<option value='.$row3['Numc'].'> '.$row3['Numc'].' '.$row3['Description'].' </option>';
}

?>
                    </select>
                  </strong></td>
                  <td width="16%"><strong><span style="font-size:8.5pt;font-family:Arial">
                    <input type="submit" name="Submit2" value="Chercher" />
                  </span></strong></td>
                </tr>
              </table>