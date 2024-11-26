<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
?>
<?php
Require("session_niveau_role.php");
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>

</head>
<?php
Require("bienvenue.php"); // on appelle la page contenant la fonction
?>
<?php if($_SESSION['u_niveau']==70) {$aff='';} else {$aff='readonly';} ?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<p><font size="2"><font size="2"><font size="2">


  <?php
// Connect to server and select databse.

$id_role=substr($_REQUEST["id_role"],32);
 
$sql = "SELECT count(*) FROM $tb_role_user where id_role='$id_role' ";  

$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
 
 
$nb_total = mysqli_fetch_array($resultat);  
 
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    

   $nb_affichage_par_page = 50; 
   
$sql = "SELECT * FROM $tb_role_user  where id_role='$id_role'  ORDER BY id_role_user	DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
$req = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  



	function affichage_utilisateur($id,$tbl_utilisateur,$linki){
	$squser="SELECT * FROM $tbl_utilisateur  WHERE id_u='$id'";
	$resultuser=mysqli_query($linki,$squser);
	$text='';
	while($rowspd=mysqli_fetch_array($resultuser)){ 
	$u_nom=$rowspd['u_nom'];
    $u_prenom=$rowspd['u_prenom'];
	$u_email = $rowspd['u_email'] ;
    //$lemessage="$u_nom , $u_prenom , $u_email";
	$lemessage=array($u_nom,$u_prenom,$u_email);
	
	//$text  .= ' ' . $lemessage;	
	}
	
    // return $text;
	return $lemessage;
	}



?>
</font></strong></font></font></font></font></font></font></font></font></font></strong></font></font></font></font></font></font></font></font></font></font></p>

  <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#FFFFFF"> 
        <td width="138"  bgcolor="#3071AA"><font color="#FFFFFF">ID</font></td>
      <td width="177"  bgcolor="#3071AA" ><font color="#FFFFFF">Nom </font></td>
      <td width="194"  bgcolor="#3071AA" ><font color="#FFFFFF">Prenom </font></td>
      <td width="172"  bgcolor="#3071AA" ><font color="#FFFFFF">Email </font></td>
      <td width="121"  bgcolor="#3071AA" >&nbsp;</td>
      <td width="110"  bgcolor="#3071AA" >&nbsp;</td>
      <td width="125"  bgcolor="#3071AA" ><font color="#FFFFFF">Type Compte</font></td>
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
      <td height="29" align="center" ><div align="left"><em><?php echo $data['id_role_user'];?></em></div></td>
      <td align="center"><div align="left"><em>   </em><em><?php $id=$data['id_u']; 	  
	  $info=affichage_utilisateur($id,$tbl_utilisateur,$linki);
      //$tab = array($info);
	  $lenom=$info[0];
	  $leprenom=$info[1];
	  $lemail=$info[2];
	  echo $lenom;
	  
	  
	  ?></em></div></td>
      <td width="194" ><?php echo $leprenom;?></td>
      <td width="172"><?php echo $lemail;?></td>
      <td width="121">&nbsp;</td>
      <td width="110">&nbsp;</td>
      <td width="125"><em><?php  $data['r_p'];
	  
	  if ($data['r_p']==1){ echo "Role Principal";} else { ?>
      
      	<a href="role_cancel.php?ID=<?php echo  md5(microtime()).$data['id_role_user']; ?>&Idrole=<?php echo $_REQUEST["id_role"]; ?>" onClick="return confirm('Etes-vous s&ucirc;r de vouloir supprimer')" ; style="margin:5px"  class="btn btn-xs btn-danger"> x </a></td>
	  
	    <?php }  ?>
      
      </em></td> 
    </tr>
    <?php
$numboucle++;
}

mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';  
}  
mysqli_free_result ($resultat);  
mysqli_close ($linki);  
?>
  </table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center"></div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
  </tr>
  <tr> 
    <td height="21"> 
      <?php
include_once('pied.php');
?>
    </td>
  </tr>
</table>


<p>&nbsp; </p>
</body>
</html>
