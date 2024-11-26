<?php
Require 'session.php';
require 'fonction.php';
require_once('calendar/classes/tc_calendar.php');
?>
<?php
 if($_SESSION['u_niveau'] != 20) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
<script language="javascript" src="calendar/calendar.js"></script>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />

</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">Modifier un clients 
      <?php
$req1="SELECT * FROM $tb_comptcl  ";
$req=mysqli_query($linki,$req1);
?>
    </h3>
    </div>
  <div class="panel-body">
    <form action="compt_client_updatesave.php" method="post" name="testform" id="form1">
      <table width="78%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr> 
          <td width="19%"><strong><font size="2">Numero </font></strong></td>
          <td width="35%"><strong> 
        <?php
$Numcsave=$_GET['Numcsave'];
$sql="SELECT *  FROM $tb_comptcl where Numcsave='$Numcsave' "; 
$result=mysqli_query($linki,$sql);
$rows=mysqli_fetch_array($result);
   
mysqli_close($linki);
			
			?>
			 <input class="form-control" name="Numcsave"  readonly="readonly" type="text" id="nucl" value="<?php echo $rows['Numcsave'] ?>"> 
            </strong></td>
          <td width="13%">&nbsp;</td>
          <td width="33%">&nbsp;</td>
        </tr>
        <tr> 
          <td><font size="2"><strong>Nom</strong></font></td>
          <td><strong> 
            <input class="form-control" name="Nomcl" type="text" id="Numcsave" value="<?php echo $rows['Nomcl'] ?>" size="40">
            </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Prenom </td>
          <td> <strong>
            <input class="form-control" name="Prenomcl" type="text" id="Numcsave2" value="<?php echo $rows['Prenomcl'] ?>" size="40" >
            </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Adresse </td>
          <td> <strong>
            <input class="form-control" name="Adressecl" type="text" id="Numcsave3" value="<?php echo $rows['Adressecl'] ?>" size="40">
            </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Telephone</td>
          <td> <strong>
            <input class="form-control" name="Telephonecl" type="text" id="Numcsave4" value="<?php echo $rows['Telephonecl'] ?>" size="40">
            </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Domaine d'exploitation</td>
          <td> <strong>
            <input class="form-control" name="Statutcl" type="text" id="Numcsave5" value="<?php echo $rows['Statutcl'] ?>" size="40">
            </strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Date</td>
          <td> <strong>
            <input class="form-control" name="Date"   type="text" id="Numcsave6" value="<?php echo $rows['Date'] ?>">
            </strong></td>
          <td>&nbsp;</td>
          <td><strong><span style="font-size:8.5pt;font-family:Arial">
            <input type="submit" name="Submit" value="Enregistrer" class="btn btn-primary"/>
          </span></strong></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<table width="100%" border="0" align="center">
  <tr>
    <td width="84%"><div align="center"></div></td>
  </tr>
  <tr>
    <td>
      <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr bgcolor="#006ABE">
          <td width="8%" align="center"><font color="#CCCCCC" size="4"><strong>Numero</strong></font><font color="#000000" size="3">&nbsp;</font></td>
          <td width="14%" align="center"><font color="#CCCCCC" size="4"><strong>Nom</strong></font><font color="#000000" size="3">&nbsp;</font></td>
          <td width="14%" align="center"><font color="#CCCCCC" size="4"><strong>Prenom</strong></font><font color="#000000" size="3">&nbsp;</font></td>
          <td width="17%" align="center"><font color="#CCCCCC" size="4"><strong>Adresse</strong></font><font color="#000000" size="3">&nbsp;</font></td>
          <td width="12%" align="center"><font color="#CCCCCC" size="4"><strong>Telephone</strong></font><font color="#000000" size="3">&nbsp;</font></td>
          <td width="17%" align="center"><font color="#CCCCCC" size="4"><strong>D. Exploitation</strong></font></td>
          <td width="8%" align="center"><font color="#CCCCCC" size="3"><strong>Date </strong></font></td>
          <td width="10%" align="center">&nbsp;</td>
        </tr>
        <?php
while($data=mysqli_fetch_array($req)){ // Start looping table row 
?>
        <tr>
          <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Numcsave'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Nomcl'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Prenomcl'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Adressecl'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Telephonecl'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Statutcl'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"> <?php echo $data['Date'];?> <BR>
          </div></td>
          <td bgcolor="#FFFFFF"><div align="left"><a href="compt_client_update.php?Numcsave=<?php echo $data['Numcsave']; ?>" class="btn btn-sm btn-success" >Aperçu</a></div></td>
        </tr>
        <?php
// Exit looping and close connection 
}
//mysqli_close($linki);
?>
      </table>
   </td>
  </tr>
</table>
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
    var frmvalidator  = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();


    frmvalidator.addValidation("Nomcl","req","Nomcl");
	
	frmvalidator.addValidation("Telephonecl","req","Telephonecl");
	
	
</script>