<?php
Require 'session.php';
?>
<?php
 if($_SESSION['u_niveau'] != 4) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<title>Archive documentation</title>
</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>

<?php

	    //choix d espace de memoire pour les connection.---------------------------------------------------------------- 
	$valeur_existant = "SELECT COUNT(*) AS nb FROM $tbl_paiconn  WHERE idrecu='$id_nom' ";
	$sqLvaleur = mysqli_query($linki,$valeur_existant)or exit(mysqli_error($linki)); 
	$nb = mysqli_fetch_assoc($sqLvaleur);
	
	if($nb['nb'] == 1)
   {

   }
   else 
   {
	   	
	$sqlcon="INSERT INTO $tbl_paiconn (idrecu)VALUES('$id_nom')";
    $connection=mysqli_query($linki,$sqlcon);
    }
    //------------------------FIn du Programme ---------------------------------------------------------
	
	 $sqlana="SELECT * FROM $tbl_paiement_bach WHERE  id_nom='$id_nom' and miseajours!=1";
	 $resultana=mysqli_query($linki,$sqlana);
	 
	 $sqldate="SELECT * FROM $tbl_caisse "; //DESC  ASC
	$resultldate=mysqli_query($linki,$sqldate);
	$datecaisse=mysqli_fetch_array($resultldate);
	
	$sql5="DELETE FROM $tbl_paiement_bachtemp WHERE miseajours=1";
    $result5=mysqli_query($linki,$sql5);
	
	$sqlDEL="DELETE FROM $tbl_paiement_bach WHERE miseajours=1";
    $resultDEL=mysqli_query($linki,$sqlDEL);
	
    $sql6="SELECT * FROM $tbl_seq_transf  WHERE  n_transfert=1";
    $result6=mysqli_query($linki,$sql6);
	$affichedate=mysqli_fetch_array($result6)


	
?>
   
<body>
<script type="text/javascript"> 
function toggleBox(szDivID, iState)// 1 visible, 0 hidden
 {
   if(document.getElementById)   //gecko(NN6) + IE 5+
   {
    var obj = document.getElementById(szDivID);
    obj.style.display = iState ? "block" : "none";
   }
  }
</script>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="40%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">IMPORTATION VIA FICHIER </h3>
      </div>
      <div class="panel-body">
        <div class="panel panel-primary">
          <div class="panel-body">
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
              <tr bgcolor="#FFFFFF">
                  <form method="post" enctype="multipart/form-data" action="paiement_bach_transfert_save.php">
                  <td width="32%" height="32"><input type="file" name="fichier"  size="25"  />
                    <font color="#FF0000">
                      <input name="id_user" type="hidden" id="id_user" value="<?php echo $id_nom ;?>" size="30" readonly/>
                    </font></td>
                  <td width="13%" height="32"><input type="submit" name="upload" value="Mise à jour" class="btn btn-info"></td>
                </form>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div></td>
    <td width="41%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">IMPORTATION  VIA WEB SERVICE</h3>
      </div>
      <div class="panel-body">
        <div class="panel panel-primary">
          <div class="panel-body">
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">


                  <td width="54%" height="32"><a href="webs_t_paiement_choix.php?id_nom=<?php echo $id_nom;?>&<?php echo md5(microtime()); ?>"  class="btn btn-sm btn-info" onClick="return !window.open(this.href, 'pop', 'width=450,height=450,left=120,top=120');"> PROCESSUS DE REPARTISION </a></td>
                  <td width="46%" height="32">
                  
                  <?php /*$Hcontrole=date("H"); $Icontrole=date("i");
  				     if (( 
					   ($Hcontrole==2)  or($Hcontrole==3)  or($Hcontrole==4)  or($Hcontrole==5)  or($Hcontrole==6)
					 or($Hcontrole==7)  or($Hcontrole==8)  or($Hcontrole==9)  or($Hcontrole==10) or($Hcontrole==11)
					 or($Hcontrole==12) or($Hcontrole==13) or($Hcontrole==14) or($Hcontrole==15) or($Hcontrole==16)
					 or($Hcontrole==17) or($Hcontrole==18) or($Hcontrole==19) or($Hcontrole==20) or($Hcontrole==21)
					 or($Hcontrole==22) or($Hcontrole==23) or($Hcontrole==1)
					 ) and 
					 (($Icontrole>0 and $Icontrole<6) or ($Icontrole>30 and $Icontrole<36) )
					 
					 )  {*/
		   
				  ?>
                  <a href="webs_t_paiement_lecture.php?<?php echo md5(microtime()); ?>"  class="btn btn-sm btn-info" onClick="return !window.open(this.href, 'pop', 'width=450,height=450,left=120,top=120');"> SERVICE D EXTRACTION </a>
                  
                  <?php // } else {}
				  ?>
                  
                  </td>


            </table>
          </div>
        </div>
      </div>
    </div></td>
    <td width="19%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">DATE IMPORTATION</h3>
      </div>
      <div class="panel-body">
        <div class="panel panel-primary">
          <div class="panel-body">
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
              <tr bgcolor="#FFFFFF">
                <form method="post" enctype="multipart/form-data" action="paiement_bach_transfert_save.php">
                  <td width="32%" height="32"><?php echo $affichedate['periode'];?></td>
                  <td width="13%" height="32">&nbsp;</td>
                </form>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div></td>
  </tr>
</table>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">AFFICHAGE DES IMPORTATIONS : </h3>
  </div>
  <div class="panel-body">
    <div class="panel panel-primary">
      <div class="panel-body">
     <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
          <tr bgcolor="#3071AA">
            <td width="8%"><strong><font color="#FFFFFF" size="3"> </font></strong></td>
            <td width="10%"><strong><font color="#FFFFFF" size="3">Id client </font></strong></td>
            <td width="17%"><strong><font color="#FFFFFF" size="3">Date de paiement  </font></strong></td>
            <td width="14%">&nbsp;</td>
            <td width="20%"><strong><font color="#FFFFFF" size="3">Paiement</font></strong></td>
            <td width="27%">&nbsp;</td>
            <td width="12%">&nbsp;</td>
          </tr>
          <?php
while($document=mysqli_fetch_array($resultana)){ 
?>
          <tr bgcolor="#FFFFFF">
           
            <form action="paiement_bach_confirmation.php" method="post" name="form1" id="form1">
            
                          <td align="center" ><div align="left">
  <a href="webs_t_paiement_bach_cancel.php?ID=<?php echo  md5(microtime()).$document['idpb']; ?>"  class="btn btn-danger">X</a>
        
        </div></td>
            
              <td height="39"><?php echo $document['id']; ?> <font color="#FF0000">
                <input name="id" type="hidden" id="id" value="<?php echo $document['id'];?>" size="30" readonly/>
              </font></td>
              <td height="39"><input class="form-control" name="dt" type="text" id="dt" value="<?php echo $datecaisse['datecaisse'];?>" size="10" /></td>
              <td height="39">&nbsp;</td>
              <td height="39"><?php echo $document['paiement']; ?></td>
              <td><em><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                <input name="clique" type="hidden" id="clique" value="0" />
                <input name="idn" type="hidden" id="idn" value="<?php echo $id_nom; ?>" />
                <input name="pt" type="hidden" id="pt" value="<?php echo $document['paiement'];?>" size="30" readonly/>
              </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></em></td>
              <td><input name="upload" type="submit" class="btn btn-info" id="upload" value="Validation"></td>
            </form>
          </tr>
          <?php }
		  
 ?>
        </table>
      </div>
    </div>
  </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="21"><?php
include_once('pied.php');
?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
