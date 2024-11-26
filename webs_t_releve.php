<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require 'configuration.php';
?>
<?php
 if($_SESSION['u_niveau'] != 2) {
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
	 $sqlana="SELECT * FROM $tbl_releve_bach WHERE  id_nom='$id_nom' and miseajours!=1 and id NOT IN(SELECT id FROM $tbl_factsave where annee='$anneec' and nserie='$nserie')";
	 $resultana=mysqli_query($linki,$sqlana);

	$sql5="DELETE FROM $tbl_releve_bachtemp WHERE miseajours=1";
    $result5=mysqli_query($linki,$sql5);
	
	$sqlDEL="DELETE FROM $tbl_releve_bach WHERE miseajours=1";
    $resultDEL=mysqli_query($linki,$sqlDEL);
	
	 $sql6="SELECT * FROM $tbl_seq_transf  WHERE  n_transfert=2";
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
        <h3 class="panel-title">WEB SERVICE</h3>
      </div>
      <div class="panel-body">
        <div class="panel panel-primary">
          <div class="panel-body">
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
              <tr bgcolor="#FFFFFF">

                  <td width="71%" height="32">       
                  
                     <?php 
					 
					 
					 $Hcontrole=date("H"); $Icontrole=date("i");
  				     if (( 
					   ($Hcontrole==2)  or($Hcontrole==3)  or($Hcontrole==4)  or($Hcontrole==5)  or($Hcontrole==6)
					 or($Hcontrole==7)  or($Hcontrole==8)  or($Hcontrole==9)  or($Hcontrole==10) or($Hcontrole==11)
					 or($Hcontrole==12) or($Hcontrole==13) or($Hcontrole==14) or($Hcontrole==15) or($Hcontrole==16)
					 or($Hcontrole==17) or($Hcontrole==18) or($Hcontrole==19) or($Hcontrole==20) or($Hcontrole==21)
					 or($Hcontrole==22) or($Hcontrole==23) or($Hcontrole==1)
					 ) and 
					 (($Icontrole>0 and $Icontrole<6) or ($Icontrole>30 and $Icontrole<36) )
					 
					 )  { 
		   
				  ?>
                         
                  <a href="webs_t_releve_lecture.php?<?php echo md5(microtime()); ?>"  class="btn btn-sm btn-info" onClick="return !window.open(this.href, 'pop', 'width=450,height=450,left=120,top=120');"> SERVICE D EXTRACTION  </a>
                  
                  <?php } else {} 
				  ?>
                  
                  </td>
                  <td width="29%" height="32">&nbsp;</td>

              </tr>
            </table>
          </div>
        </div>
      </div>
    </div></td>
    <td width="38%"><div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">SERVICE DE REPARTION</h3>
      </div>
      <div class="panel-body">
        <div class="panel panel-primary">
          <div class="panel-body">
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">


                  <td width="82%" height="32"><a href="webs_t_releve_choix.php?id_nom=<?php echo $id_nom;?>&<?php echo md5(microtime()); ?>"  class="btn btn-sm btn-info" onClick="return !window.open(this.href, 'pop', 'width=450,height=450,left=120,top=120');"> PROCESSUS DE REPARTISION</a></td>
                  <td width="18%" height="32">

                  
                  </td>


            </table>
          </div>
        </div>
      </div>
    </div></td>
    <td width="22%"><div class="panel panel-primary">
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
    <h3 class="panel-title">AFFICHAGE NUMERIQUE DES RELEVES  : </h3>
  </div>
  <div class="panel-body">
    <div class="panel panel-primary">
      <div class="panel-body">

        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
          <tr bgcolor="#3071AA">
            <td width="8%"><strong><font color="#FFFFFF" size="3"> </font></strong></td>
            <td width="8%"><strong><font color="#FFFFFF" size="3">Id client </font></strong></td>
            <td width="23%"><strong><font color="#FFFFFF" size="3">Nom du client   </font></strong></td>
            <td width="9%"><strong><font color="#FFFFFF" size="3">A.  Index</font></strong></td>
            <td width="11%"><strong><font color="#FFFFFF" size="3">N. Index</font></strong></td>
             <td width="11%"><strong><font color="#FFFFFF" size="3">CONS</font></strong></td>
            <td width="11%"><strong><font color="#FFFFFF" size="3">Impayé</font></strong></td>
            <td width="27%">&nbsp;</td>
            <td width="11%">&nbsp;</td>
          </tr>
          <?php
while($client=mysqli_fetch_array($resultana)){ 
?>
             <tr bgcolor="<?php  $cons=$client['valeur']-$client['n']; gettatut($cons); ?>">
           
            <form action="webs_t_releve_save.php" method="post" name="form1" id="form1">
            
              <td align="center" ><div align="left">
  <a href="webs_t_releve_cancel.php?ID=<?php echo  md5(microtime()).$client['idpb']; ?>"  class="btn btn-danger">X</a>
        
        </div></td>
              <td height="39"><?php echo $client['id']; ?></td>
              <td height="39"><?php echo $client['bnom']; ?></td>
              <td height="39"><?php echo $client['n']; ?></td>
              <td height="39"><?php echo $client['valeur']; ?></td>
              <td height="39"><?php echo $client['valeur']-$client['n'];?></td>
              <td height="39"><?php $impayee=impaye($client['id'], $tbl_fact,$linki); echo $impayee[0];?></td>
              <td><em><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>" />
                <input name="id" type="hidden" id="id" value="<?php echo $client['id'];?>" size="30" readonly/>
                <input name="st" type="hidden" id="st" value="<?php echo $client['st'];?>" />
                <input name="libelle" type="hidden" id="libelle" value="<?php echo $client['libelle'];?>" />
                <input name="bnom" type="hidden" id="bnom" value="<?php echo $client['bnom'];?>" />
                <input name="bquartier" type="hidden" id="bquartier" value="<?php echo $client['bquartier'];?>" />
                <input name="bstatut" type="hidden" id="bstatut" value="<?php echo $client['bstatut'];?>" />
                <input name="n" type="hidden" id="n" value="<?php echo $client['n'];?>" />
                <input name="nf" type="hidden" id="nf" value="<?php echo $client['valeur'];?>" />
                <input name="Tarif" type="hidden" id="Tarif" value="<?php echo $client['Tarif'];?>" />
                <input name="coefTi" type="hidden" id="coefTi" value="<?php echo $client['coefTi'];?>" />
                <input name="amperage" type="hidden" id="amperage" value="<?php echo $client['amperage'];?>" />
                <input name="chtaxe" type="hidden" id="chtaxe" value="<?php echo $client['chtaxe'];?>" />
                <input name="impayee" type="hidden" id="impayee" value="<?php echo $impayee[0]; ?>" />
                 <input name="idf" type="hidden" id="idf" value="<?php echo $impayee[1]; ?>" />
                <input name="id_user" type="hidden" id="id_user" value="<?php echo $id_user; ?>" />
              </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></em></td>
              <td>
              
              <?php if ( $client['n']<= $client['valeur']) {?>
              
              <input name="upload" type="submit" class="btn btn-info" id="upload" value="Validation">
              <?php }?>
              </td>
            </form>
          </tr>
          <?php }
		  
    function impaye($idclient, $tbl_fact,$linki){
    $sqlp = "SELECT * FROM $tbl_fact WHERE id='$idclient' and st='E' ORDER BY idf desc limit 0,1";  
	$resultp=mysqli_query($linki,$sqlp);
	$datap=mysqli_fetch_array($resultp);	

	if((!isset($datap['report'])|| empty($datap['report']))) 
	{ //$qt2='0'.'_'.$datap['idf']; return $qt2;
	
	   $qt2 = array('0', $datap['idf']); return $qt2;
	   
	}
	else 
	{
		//$qt2=$datap['report'].'_'.$datap['idf']; return $qt2;
	    $qt2 = array($datap['report'], $datap['idf']); return $qt2;
	
	}
	
	}
	
					  function gettatut($fetat){
				  if ($fetat<=10 && $fetat>=1)              { echo $couleur="#D473D4";}//mouve  
				  if ($fetat<=750 && $fetat>=550)           { echo $couleur="#ffc88d";}//orange 
				  if ($fetat>=750)                          { echo $couleur="#ec9b9b";}//rouge -Declined
				  }
	
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
