<?
require 'fonction.php';
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
           <h3 class="panel-title">AJOUTER MES RDV </h3>
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
                     <option  value = '<? echo $id_nom; ?>' selected><? echo $nom.''.$prenom ; ?></option>
                       </select>
                   </strong></font></td>
                   </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   </tr>
                 <tr>
                   <td>Date &amp; heure</td>
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
  <input name="heures" type="text" id="heures" value="00:00" size="7" /></td>
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
                   </strong></font><font color="#000000"><strong>
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
                   <td>&nbsp;</td>
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
$req = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());  

?>     
     
 </CENTER>
 <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#3071AA">
     <td width="16%" align="center"><strong><font color="#FFFFFF" size="4">DEBUT</font></strong></td>
     <td width="13%" align="center"><strong><font color="#FFFFFF" size="4">FIN</font></strong></td>
     <td width="45%" align="center"><strong><font color="#FFFFFF">EVENEMENT</font></strong></td>
     <td width="16%" align="center">&nbsp;</td>
     <td width="10%" align="center">&nbsp;</td>
   </tr>
   <?php

$numboucle=0; 

while($data=mysqli_fetch_array($req)){ // Start looping table row 

 if($numboucle %2 == 0) 
 
   $bgcolor = "#CCDD44"; 

        else 

   $bgcolor = "#FFFFFF"; 
?>
  <tr bgcolor=<? echo "$bgcolor" ?>>
     <td height="33" align="center" ><div align="left"><em><? echo $data['datev'].' '.$data['heures'];?></em></div></td>
    <td align="center" ><div align="left"><em><? echo $data['datef'].' '.$data['heuresf'];?></em></div></td>
     <td align="center" ><div align="left"><em><? echo $data['evenement'];?></em>
     </div></td>
     <td align="center" ><em>
       <? $SID1=$data['Pris_par_user']; $SID2=$data['id_nom']; echo $SID1;?>
     </em></td>
     <td align="center" >
         
    <? $sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysql_query($sqldate);
	$datecaisse=mysql_fetch_array($resultldate);
	$dateJour=$datecaisse['datecaisse'];
	$dareRDV=$data['datev'];
    ?>
    
    <? if ((($SID1==$_SESSION['u_login']) or ($SID2==$_SESSION['u_login'])) and ($dateJour <=$dareRDV)) { ?>
	<a href="evenement_user_cancel.php?&ID=<? echo  md5(microtime()).$data['idev']; ?>" class="btn-xs btn-danger">X</a>
	<? } ?>
     
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