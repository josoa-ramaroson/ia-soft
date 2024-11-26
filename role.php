<?php
Require 'session.php';
require 'fc-affichage.php';
require 'fonction.php';
require 'role_fonction.php';
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
<div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">Gestion des roles</h3>
            </div>
            <div class="panel-body">
              <table width="1122" border="0">
                <tr>
                  <td width="418"><form name="form1" method="post" action="role_p_save.php">
                    <table width="96%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="32%">&nbsp;</td>
                        <td width="68%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Utilisateur</td>
                        <td><select name="id_u" id="id_u">
                          <?php
$sql2A = ("SELECT *  FROM $tbl_utilisateur  where  (privileges !=7 and privileges !=6) and id_u not in ( SELECT id_u FROM $tb_role_user  ) ORDER BY u_nom ASC ");
$result2A = mysqli_query($linki,$sql2A);
while ($row2A = mysqli_fetch_assoc($result2A)) {
echo '<option value='.$row2A['id_u'].'> '.$row2A['u_nom'].' '.$row2A['u_prenom'].'</option>';
}
?>
                        </select></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><p>&nbsp;</p></td>
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
                        <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                          <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>">
                        </font></strong></font></strong></font></td>
                        <td><input type="submit" name="Submit" value="Enregistrer role principal" class="btn btn-primary" ></td>
                      </tr>
                    </table>
                  </form></td>
                  <td width="471"><form name="form1" method="post" action="role_save.php">
                    <table width="99%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="32%">&nbsp;</td>
                        <td width="68%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Utilisateur</td>
                        <td><select name="id_u" id="id_u">
                          <?php
$sql2A = ("SELECT *  FROM $tbl_utilisateur where  id_u in ( SELECT id_u FROM $tb_role_user ) ORDER BY u_nom ASC ");
$result2A = mysqli_query($linki,$sql2A);
while ($row2A = mysqli_fetch_assoc($result2A)) {
echo '<option value='.$row2A['id_u'].'> '.$row2A['u_nom'].' '.$row2A['u_prenom'].'</option>';
}
?>
                        </select></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><p>&nbsp;</p></td>
                      </tr>
                      <tr>
                        <td>Type de role</td>
                        <td><select name="id_role" id="id_role">
                          <?php
if ($_SESSION['u_niveau']==7){ $sql2B ="SELECT *  FROM  $tb_role_type  ORDER BY nom_role ASC ";} else 

{ $sql2B ="SELECT *  FROM  $tb_role_type where  niveau!=7 and id_statut=1 ORDER BY nom_role ASC ";}

$result2B = mysqli_query($linki,$sql2B);
while ($row2B = mysqli_fetch_assoc($result2B)) {
echo '<option value='.$row2B['id_role'].'> '.$row2B['nom_role'].' </option>';
}
?>
                        </select></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><font size="2"><strong><font size="2"><strong><font color="#FF0000">
                          <input name="id_nom" type="hidden" id="id_nom" value="<?php echo $id_nom; ?>">
                        </font></strong></font></strong></font></td>
                        <td><input type="submit" name="Submit" value="Enregistrer" class="btn btn-primary" ></td>
                      </tr>
                    </table>
                  </form></td>
                  <td width="219"><table width="215" border="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    <tr>
                      <td><a href="role_principale.php?id_role=<?php echo md5(microtime()).$data['id_role']; ?>" class="btn btn-primary">Utilisateur ayant un role </a></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
            </div>
          </div>
<p><font size="2"><font size="2"><font size="2">
<p>
  <?
//require 'pro_fonctions.php';
?>
  
  <?php
// Connect to server and select databse.
  
$sql = "SELECT count(*) FROM $tb_role_type ";  

$resultat = mysqli_query($linki,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
 
 
$nb_total = mysqli_fetch_array($resultat);  
 
if (($nb_total = $nb_total[0]) == 0) {  
echo 'Aucune reponse trouvee';  
}  
else { 
 
if (!isset($_GET['debut'])) $_GET['debut'] = 0; 
    

   $nb_affichage_par_page = 50; 
   
$sql = "SELECT * FROM $tb_role_type  ORDER BY nom_role ASC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;  //ASC
 
$req = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));  
?>
  
</p>
<p>&nbsp; </p>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#FFFFFF"> 
        <td width="152"  bgcolor="#3071AA" ><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
      <td width="410"  bgcolor="#3071AA" ><font color="#FFFFFF">Nom Role</font></td>
      <td width="176"  bgcolor="#3071AA" ><font color="#FFFFFF">Statut  </font></td>
      <td width="303"  bgcolor="#3071AA" >&nbsp;</td>
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
      <td height="41" align="center" > <div align="left"><?php echo $data['id_role'];?></div>
        <div align="left"></div></td>
      <td align="center"><div align="left"><em><?php echo $data['nom_role'];?></em></div></td>
      <td width="176" ><em><?php $sta=$data['id_statut']; $statut=le_statut($sta,$tb_role_statut,$linki);  echo $statut;?>
      
      </em></td>
   
      <td width="303">
      
      <?php if ($sta==1){ ?>
      
   <a href="role_detail.php?id_role=<?php echo md5(microtime()).$data['id_role']; ?>" class="btn btn btn-success">Les utilisateurs   </a>
      <?php } else { } ?> 
      
      </td> 
    </tr>
    <?php
$numboucle++;
}

mysqli_free_result ($req); 
   echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 20).'</span>';  
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
