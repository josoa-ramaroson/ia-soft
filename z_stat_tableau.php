<?php
Require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';
?>
<?php
Require 'fonction_niveau_statistique.php';
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.centrevaleur {
	text-align: center;
}
.centrevaleur td {
	text-align: center;
}
.taille16 {	font-size: 16px;
}
</style>
<script language="javascript" src="calendar/calendar.js"></script>

</head>
<?php
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
 <table width="100%" border="0">
   <tr>
     <td width="34%"><div class="panel panel-warning">
       <div class="panel-heading">
         <h3 class="panel-title">Production ( KWH)</h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><form action="stat_graph_pro.php" method="post" name="form1" id="form2">
               <font color="#000000">
                   <select name="annee" size="1" id="annee">
                     <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                   </select>
                   </font>
               <input type="submit" name="valider" id="valider" value="Valider" class="btn btn-warning" />
             </form></td>
           </tr>
         </table>
       </div>
     </div></td>
     <td width="3%">&nbsp;</td>
     <td width="30%"><div class="panel panel-warning">
       <div class="panel-heading">
         <h3 class="panel-title">Facturation Electrique ( KMF)</h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><form action="z_stat_graph_fact.php" method="post" name="form1" id="form3">
               <font color="#000000">
                 <select name="annee" size="1" id="annee">
                   <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                 </select>
                 </font>
               <input type="submit" name="valider2" id="valider2" value="Valider" class="btn btn-warning" />
             </form></td>
           </tr>
         </table>
       </div>
     </div></td>
     <td width="3%">&nbsp;</td>
     <td width="30%"><div class="panel panel-warning">
       <div class="panel-heading">
         <h3 class="panel-title">Recouvrement Electrique ( KMF )</h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><form action="z_stat_graph_rec.php" method="post" name="form1" id="form4">
               <font color="#000000">
                 <select name="annee" size="1" id="annee">
                   <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                 </select>
                 </font>
               <input type="submit" name="valider3" id="valider3" value="Valider"  class="btn btn-warning"/>
             </form></td>
           </tr>
         </table>
       </div>
     </div></td>
   </tr>
 </table>
 <p>&nbsp;</p>
 <table width="100%" border="0">
   <tr>
     <td width="34%"><div class="panel panel-warning">
       <div class="panel-heading">
         <h3 class="panel-title">Production &amp; Distribution  (KWH)</h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><form action="stat_graph_pro_dis.php" method="post" name="form1" id="form">
               <font color="#000000">
                 <select name="annee" size="1" id="annee">
                   <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                 </select>
                 </font>
               <input type="submit" name="valider4" id="valider5" value="Valider"  class="btn btn-warning"/>
             </form></td>
           </tr>
         </table>
       </div>
     </div></td>
     <td width="3%">&nbsp;</td>
     <td width="30%"><div class="panel panel-warning">
       <div class="panel-heading">
         <h3 class="panel-title">Distribution &amp; Facturation ( Kwh)</h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><form action="z_stat_graph_dis_fac.php" method="post" name="form1" id="form5">
               <font color="#000000">
                 <select name="annee" size="1" id="annee">
                   <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                 </select>
                 </font>
               <input type="submit" name="valider5" id="valider4" value="Valider" class="btn btn-warning" />
             </form></td>
           </tr>
         </table>
       </div>
     </div></td>
     <td width="3%">&nbsp;</td>
     <td width="30%"><div class="panel panel-warning">
       <div class="panel-heading">
         <h3 class="panel-title">Facturation &amp; Recouvrement ( KMF) </h3>
       </div>
       <div class="panel-body">
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
           <tr>
             <td width="47%"><form action="z_stat_graph_fac_rec.php" method="post" name="form1" id="form6">
               <font color="#000000">
                 <select name="annee" size="1" id="annee">
                   <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                 </select>
                 </font>
               <input type="submit" name="valider6" id="valider6" value="Valider" class="btn btn-warning" />
             </form></td>
           </tr>
         </table>
       </div>
     </div></td>
   </tr>
 </table>
<p><font size="2"><font size="2"><font size="2">
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>
<table width="100%" border="0">
  <tr>
    <td width="34%"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Production &amp; Distribution  &amp; Facturation</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="z_stat_graph_pro_dis_fac.php" method="post" name="form1" id="form9">
              <font color="#000000">
                <select name="annee" size="1" id="annee">
                  <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                </select>
                </font>
              <input type="submit" name="valider9" id="valider9" value="Valider" class="btn btn-warning" />
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="3%">&nbsp;</td>
    <td width="30%"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Suivi Client Facturation &amp; Recouvrement</h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="z_stat_graph_fac_rec_client.php" method="post" name="form1" id="form8">
              <font color="#000000"> Id client
                <input name="id" type="text" id="id" size="8" maxlength="8">
                <select name="annee" size="1" id="annee">
                  <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                </select>
                </font>
              <input type="submit" name="valider8" id="valider8" value="Valider" class="btn btn-warning"/>
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
    <td width="3%">&nbsp;</td>
    <td width="30%"><div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Autres recouvrement par mois </h3>
      </div>
      <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="47%"><form action="z_stat_graph_sclient.php" method="post" name="form1" id="form7">
              Mois : <font color="#000000">
                <select name="mois" size="1" id="mois">
                  <option value="1">Janvier</option>
                  <option value="2">Février</option>
                  <option value="3">Mars</option>
                  <option value="4">Avril</option>
                  <option value="5">Mai</option>
                  <option value="6">Juin</option>
                  <option value="7">Juillet</option>
                  <option value="8">Août</option>
                  <option value="9">Septembre</option>
                  <option value="10">Octobre</option>
                  <option value="11">Novembre</option>
                  <option value="12">Décembre</option>
                </select>
                </font> <font color="#000000">
                  <select name="annee" size="1" id="annee">
                    <?php
$sql81 = ("SELECT * FROM z_annee  ORDER BY annee ASC ");
$result81 = mysqli_query($linki,$sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
echo '<option> '.$row81['annee'].' </option>';
}
?>
                  </select>
                  </font>
              <input type="submit" name="valider7" id="valider7" value="Valider" class="btn btn-warning"/>
            </form></td>
          </tr>
        </table>
      </div>
    </div></td>
  </tr>
</table>
</p>
</div>
</td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
</tr>
<tr> 
    <td height="21"><p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center">
      <p>
        <?php
include_once('pied.php');
?>
    </p>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
