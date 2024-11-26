<?php
Require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>


 </p>
 <style type="text/css">
 .taille16 {	font-size: 16px;
}
 </style>
 
 <CENTER>
   <table width="100%" border="0">
     <tr>
       <td width="1%">&nbsp;</td>
       <td width="74%"><div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">GESTION DES RDV ET PERSONALISATION </h3>
         </div>
         <div class="panel-body">
           <form id="form1" name="form1" method="post" action="evenement_liste_save.php">
           <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
             <tr>
               <td width="47%"><table width="99%" border="0.5" cellspacing="0" cellpadding="0">
                 <tr>
                   <td width="22%">Login :</td>
                   <td width="78%"><font color="#000000"><strong>
                     <select name="u_login" id="u_login">
                     <option  value = '<?php echo $id_nom; ?>' selected><?php echo $nom.''.$prenom ; ?></option>
                       <?php
$sql8 = "SELECT * FROM $tbl_utilisateur where (privileges !=7 and privileges !=6) and statut like 'Operationnel' ORDER BY id_nom ASC ";
$result8 = mysqli_query($linki,$sql8);

while ($row8 = mysqli_fetch_assoc($result8)) {
//echo '<option> '.$row8['u_login'].' </option>';
echo '<option value='.$row8['u_login'].' > '.$row8['u_nom'].' '.$row8['u_prenom'].' </option>';

}

?>
                       </select>
                   </strong></font></td>
                   </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   </tr>
                 <tr>
                   <td>Date &amp; heure ( debut)</td>
                   <td><?php
					  $myCalendar = new tc_calendar("datet1", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval($annee1, $annee2);
					  $myCalendar->dateAllow($date1,$date2);
					  $myCalendar->setDateFormat('j F Y');
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->writeScript();
					  ?>
...Time ( hh : mm)
  
  <font color="#000000"><strong>
  <select name="heures" id="heures">
    <option>00:00</option>
    <option>00:15</option>
    <option>00:30</option>
    <option>00:45</option>
    <option>01:00</option>
    <option>01:15</option>
    <option>01:30</option>
    <option>01:45</option>
    <option>02:00</option>
    <option>02:15</option>
    <option>02:30</option>
    <option>02:45</option>   
    <option>03:00</option>
    <option>03:15</option>
    <option>03:30</option>
    <option>03:45</option>
        <option>04:00</option>
    <option>04:15</option>
    <option>04:30</option>
    <option>04:45</option>
        <option>05:00</option>
    <option>05:15</option>
    <option>05:30</option>
    <option>05:45</option>
        <option>06:00</option>
    <option>06:15</option>
    <option>06:30</option>
    <option>06:45</option>
        <option selected="selected">07:00</option>
    <option>07:15</option>
    <option>07:30</option>
    <option>07:45</option>
        <option>08:00</option>
    <option>08:15</option>
    <option>08:30</option>
    <option>08:45</option>
        <option>09:00</option>
    <option>09:15</option>
    <option>09:30</option>
    <option>09:45</option>
        <option>10:00</option>
    <option>10:15</option>
    <option>10:30</option>
    <option>10:45</option>
        <option>11:00</option>
    <option>11:15</option>
    <option>11:30</option>
    <option>11:45</option>
        <option>12:00</option>
    <option>12:15</option>
    <option>12:30</option>
    <option>12:45</option>
        <option>13:00</option>
    <option>13:15</option>
    <option>13:30</option>
    <option>13:45</option>
        <option>14:00</option>
    <option>14:15</option>
    <option>14:30</option>
    <option>14:45</option>
        <option>15:00</option>
    <option>15:15</option>
    <option>15:30</option>
    <option>15:45</option>
        <option>16:00</option>
    <option>16:15</option>
    <option>16:30</option>
    <option>16:45</option>
        <option>17:00</option>
    <option>17:15</option>
    <option>17:30</option>
    <option>17:45</option>
        <option>18:00</option>
    <option>18:15</option>
    <option>18:30</option>
    <option>18:45</option>
        <option>19:00</option>
    <option>19:15</option>
    <option>19:30</option>
    <option>19:45</option>
        <option>20:00</option>
    <option>20:15</option>
    <option>20:30</option>
    <option>20:45</option>
           <option>21:00</option>
    <option>21:15</option>
    <option>21:30</option>
    <option>21:45</option>
            <option>22:00</option>
    <option>22:15</option>
    <option>22:30</option>
    <option>22:45</option>
            <option>23:00</option>
    <option>23:15</option>
    <option>23:30</option>
    <option>23:45</option>    
    
    
    
    
    
    
    
  </select>
  </strong></font></td>
                 </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
                   <td>Durée</td>
                   <td><font color="#000000"><strong>
                     <select name="Ndh" id="Ndh">
                       <option value="0" selected="selected">0 heure</option>
                       <option value="1">1 heure</option>
                       <option value="2">2 heures</option>
                       <option value="3">3 heures</option>
                       <option value="4">4 heures</option>
                       <option value="5">5 heures</option>
                       <option value="6">6 heures</option>
                       <option value="7">7 heures</option>
                       <option value="8">8 heures</option>
                       <option value="9">9 heures</option>
                       <option value="10">10 heures</option>
                       <option value="11">11 heures</option>
                       <option value="12">12 heures</option>
                       <option value="13">13 heures</option> 
                       <option value="14">14 heures</option>
                       <option value="15">15 heures</option>
                       <option value="16">16 heures</option>
                       <option value="17">17 heures</option>                                                                   
                       <option value="18">18 heures</option>
                       <option value="19">19 heures</option>
                       <option value="20">20 heures</option>
                       <option value="21">21 heures</option> 
                       <option value="22">22 heures</option>
                       <option value="23">23 heures</option>
                       <option value="24">24 heures</option>
                       
                     </select>
                     <select name="Ndm" id="Ndm">
                       <option value="0">0 minute</option>
                       <option value="15">15 minutes </option>
                       <option value="30" selected="selected">30 minutes</option>
                       <option value="45">45 minutes</option>
                     </select>
                   </strong></font></td>
                 </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
                   <td>Commentaire</td>
                   <td><input class="form-control" name="evenement" type="text" id="evenement" size="80" /></td>
                 </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
                   <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                     <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
                   </font></strong></font></strong></font></td>
                   <td><input type="submit" name="Enregistrer" id="Enregistrer" value="AJOUTER UN RDV" /></td>
                 </tr>
               </table></td>
             </tr>
           </table>
         </form>
         </div>
       </div>
           
           </td>
       <td width="1%">&nbsp;</td>
       <td width="22%"><div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">AFFICHER LES RDV </h3>
         </div>
         <div class="panel-body">
           <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
             <tr>
               <td width="47%"><form id="form2" name="form2" method="post" action="evenement.php">
                 <table width="99%" border="0.5" cellspacing="0" cellpadding="0">
                   <tr>
                     <td width="27%">Date </td>
                     <td width="73%"><?php
					  $myCalendar = new tc_calendar("datet2", true, false);
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
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td height="28">&nbsp;</td>
                     <td><input type="submit" name="Afficher" id="Afficher" value="AFFICHER LES RDV" /></td>
                   </tr>
                   <tr>
                     <td height="28">&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td height="28">&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td height="28">&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td height="28">&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                 </table>
               </form></td>
             </tr>
           </table>
         </div>
       </div></td>
       <td width="2%">&nbsp;</td>
     </tr>
   </table>
     <H1> LES RENDEZ-VOUS </H1>

<?php

if (isset($_SESSION['datecalendrier'])and(!isset($_REQUEST['datet2'])) )
{
	$datecalendrier=$_SESSION['datecalendrier'];
}

if (isset($_SESSION['datecalendrier'])and(isset($_REQUEST['datet2'])) )
{
	$datecalendrier=$_REQUEST['datet2'];
}

if (!isset($_SESSION['datecalendrier'])and (!isset($_REQUEST['datet2'])) )
{
	$datecalendrier='';
}


if (isset($datecalendrier))
{

$date2=$datecalendrier;

$_SESSION['datecalendrier']=$date2;
	
$sql = "SELECT * FROM $tb_evenement where datev='$date2'  and  id_nom='$id_nom' ORDER BY heures "; // DESC ASC  
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  

?>     
     
 </CENTER>
 <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="15%" align="center"><strong><font color="#FFFFFF" size="4">DEBUT</font></strong></td>
     <td width="18%" align="center"><strong><font color="#FFFFFF" size="4">FIN</font></strong></td>
     <td width="47%" align="center"><strong><font color="#FFFFFF">EVENEMENT</font></strong></td>
     <td width="12%" align="center">&nbsp;</td>
     <td width="8%" align="center">&nbsp;</td>
   </tr>
   <?php

$numboucle=0; 

while($data=mysqli_fetch_array($req)){ // Start looping table row 

 if($numboucle %2 == 0) 
 
   $bgcolor = "#CCDD44"; 

        else 

   $bgcolor = "#FFFFFF"; 
?>
  <tr bgcolor=<?php echo "$bgcolor" ?>>
     <td height="35" align="center" ><div align="left"><em><?php echo $data['datev'].' '.$data['heures'];?></em></div></td>
    <td align="center" ><div align="left"><em><?php echo $data['datef'].' '.$data['heuresf'];?></em></div></td>
     <td align="center" ><div align="left"><em><?php echo $data['evenement'];?></em>
     </div></td>
     <td align="center" ><em>
       <?php $SID1=$data['Pris_par_user']; $SID2=$data['id_nom']; echo $SID1;?>
     </em></td>
     <td align="center" >
         
    <?php $sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysqli_query($linki,$sqldate);
	$datecaisse=mysqli_fetch_array($resultldate);
	$dateJour=$datecaisse['datecaisse'];
	$dareRDV=$data['datev'];
    ?>
    
    <?php if ((($SID1==$_SESSION['u_login']) or ($SID2==$_SESSION['u_login'])) and ($dateJour <=$dareRDV)) { ?>
	<a href="evenement_user_cancel.php?&ID=<?php echo  md5(microtime()).$data['idev']; ?>" class="btn-xs btn-danger">X</a>
	<?php } ?>
     
     </td>
   </tr>
   <?php
   
   $numboucle++;
}	
mysqli_close ($linki);  

}
else {

} 

?>
</table>

<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("heures","dontselect=00:00","nom ");
	frmvalidator.addValidation("evenement","req","nom ");
	frmvalidator.addValidation("datet1","dontselect=0000-00-00","date_sortie");
	
</script>