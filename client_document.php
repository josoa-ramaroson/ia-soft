<?
require 'session.php';
?>
<?
require 'session_niveau_client.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<title>Archive documentation</title>
</head>
<?
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<?php
require 'fonction.php';
$id=substr($_REQUEST["id"],32);
$sqlm="SELECT * FROM $tbl_contact WHERE id='$id'";
$resultm=mysqli_query($linki,$sqlm);
$datam=mysqli_fetch_array($resultm);
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
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;</h3>
  </div>
  <div class="panel-body">
<? require 'client_user_menu.php';?>
  </div>
</div>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr>
    <td height="133"><form action="re_enregistrement_save.php" method="post" name="form1" id="form1">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                   <tr bgcolor="#0794F0">
          <td colspan="6" bgcolor="#3071AA"><div align="center"><strong><font color="#FFFFFF">Information du client </font></strong></div></td>
        </tr>
                <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="16%">Code Client </td>
          <td width="1%">&nbsp;</td>
          <td width="30%"><strong><? echo $datam['id'];?></strong></td>
          <td width="1%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
                <tr>
          <td><strong><font size="2">Nom</font></strong></td>
          <td>&nbsp;</td>
          <td><? echo $datam['nomprenom'];?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">AJOUTER UN DOCUMENT</h3>
  </div>
  <div class="panel-body">
<form name="formtitre" method="post" action="client_document_save.php">
  <table width="1195" border="0">
    <tr>
      <td width="169"><font color="#FF0000">
        <input name="id_nom" type="hidden" id="id_nom" value="<? echo $id_nom; ?>"/>
        <input name="idclient" type="hidden" id="idclient" value="<? echo $datam['id'];?>"/>
        <input name="nom" type="hidden" id="nom" value="<? echo $datam['nomprenom']; ?>"/>
        <input name="prenom" type="hidden" id="prenom" value="<? echo  $datam['prenom']; ?>"/>
      </font></td>
      <td width="289">&nbsp;</td>
      <td width="300">&nbsp;</td>
      <td width="419">&nbsp;</td>
    </tr>
    <tr>
      <td>Titre </td>
      <td><strong>
        <input class="form-control" name="titre" type="text" id="titre" size="40" />
      </strong></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Enregistrer"></td>
    </tr>
  </table>
</form>
  </div>
</div>
<p>&nbsp;</p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">AFFICHAGE DES DOCUMENTS </h3>
  </div>
  <div class="panel-body">
    <div class="panel panel-primary">
      <div class="panel-body">
        <?php
	  $idclient=$datam['id'];
	 $sqlana="SELECT * FROM $tbl_client_doc WHERE  idclient='$idclient'";
	 $resultana=mysqli_query($linki,$sqlana);
?>

        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
          <tr bgcolor="#3071AA">
            <td width="23%"><strong><font color="#FFFFFF" size="3">Titre </font></strong></td>
            <td width="32%">&nbsp;</td>
            <td width="32%"><strong><font color="#FFFFFF" size="3">Résultat( 1Mo max en formats.jpg) </font></strong></td>
            <td width="13%"><strong><font color="#FFFFFF" size="3"></font></strong></td>
          </tr>
          <?php
while($document=mysqli_fetch_array($resultana)){ 
?>
          <tr bgcolor="#FFFFFF">
          
          <form method="post" enctype="multipart/form-data" action="client_document_file_save.php">
            <td height="32"><? echo $document['titre']; ?></td>
            
            <td height="32"> 
            
            <? if($document['statut'] == 1) { } else { ?>
               <input type="file" name="fichier"  size="25"  />           
                       
              <font color="#FF0000">
              <input name="iddocument" type="hidden" id="iddocument" value="<? echo $document['iddocument']; ?>">
              <input name="idclient" type="hidden" id="idclient" value="<? echo $idclient ;?>" size="30" readonly/>
              </font>
              
             <? } ?> 
              
             </td>
            
            <td height="32">
            
            <? $filename = 'upload/document_client/'.$document['iddocument'].'.jpg'; ?>
            <div class="row">
            <? if (file_exists($filename) == true) { ?>

<a href="client_document_file_apercu.php?doc=<? echo md5(microtime()).$document['iddocument']; ?>&amp;d=<? echo  md5(microtime());?>" onClick="return !window.open(this.href, 'pop', 'width=679,height=679,left=120,top=120');"> <img src="upload/document_client/document_file.jpg" width="57" height="63" class="pix" />
            </a>
           
       
            
            <? } else { ?>
          
            <? } ?>

             </td>
             
            <td height="32">
            
            <? if($document['statut'] == 0) { ?>
            <input type="submit" name="upload" value="Mise à jour" class="btn btn-info">
            <? } else { ?>
                          
            <a href="client_document_file_cancel.php?ID=<? echo  md5(microtime()).$document['iddocument'];?>&<? echo  md5(microtime());?>&idc=<? echo  md5(microtime()).$idclient;?>" onClick="return confirm('Etes-vous s&ucirc;r de vouloir supprimer')" ; style="margin:5px"  class="btn btn-sm btn-danger">SUPPRIMER</a>
             
             
             
             
            <? } ?>
            </td>
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
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator  = new Validator("formtitre");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("titre","req","nom ");
	
</script>