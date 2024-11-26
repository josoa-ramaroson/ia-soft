<?php
require 'session.php';
require 'fonction.php';
require 'fc-affichage.php';
require_once('calendar/classes/tc_calendar.php');

if($_SESSION['u_niveau'] != 40) {
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
<script type="text/javascript">
function AjaxFunction() {
   var httpxml;

   // Crée l'objet XMLHttpRequest
   try {
       httpxml = new XMLHttpRequest();
   } catch (e) {
       try {
           httpxml = new ActiveXObject("Msxml2.XMLHTTP");
       } catch (e) {
           try {
               httpxml = new ActiveXObject("Microsoft.XMLHTTP");
           } catch (e) {
               alert("Your browser does not support AJAX!");
               return false;
           }
       }
   }

   // Fonction appelée à chaque changement d'état de la requête
   httpxml.onreadystatechange = function() {
       if(httpxml.readyState == 4) {
           if(httpxml.status == 200) {
               try {
                   var myarray = JSON.parse(httpxml.responseText);
                   var subcatSelect = document.testform.subcat;

                   // Vide la liste déroulante
                   while(subcatSelect.options.length > 0) {
                       subcatSelect.remove(0);
                   }

                   // Ajoute les nouvelles options
                   for (var i = 0; i < myarray.data.length; i++) {
                       var optn = document.createElement("OPTION");
                       optn.text = myarray.data[i].service;
                       optn.value = myarray.data[i].idser;
                       subcatSelect.add(optn);
                   }
               } catch(e) {
                   console.error("Erreur lors du parsing JSON:", e);
               }
           } else {
               console.error("Erreur HTTP:", httpxml.status);
           }
       }
   };

   // Prépare et envoie la requête
   var idrh = document.getElementById('s1').value;
   var url = "rh_fonction_direction.php?idrh=" + encodeURIComponent(idrh) + "&sid=" + Math.random();
   
   httpxml.open("GET", url, true);
   httpxml.send(null);
}
</script>
</head>
<?php
require 'bienvenue.php';
$sqldate = "SELECT * FROM $tbl_app_caisse";
$resultldate = mysqli_query($linki, $sqldate);
$datecaisse = mysqli_fetch_array($resultldate);
?>
<body>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Ordre de service ( Bon de commande)</h3>
    </div>
    <div class="panel-body">
    <form action="app_bonachat_save.php" method="post" name="testform" id="form1">
        <!-- Début du formulaire -->
        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <!-- ... [Le reste du HTML du formulaire reste identique] ... -->
            <td><?php
                echo "<br><select name=direction id='s1' onchange=\"AjaxFunction()\";>
                <option value=''>Choisissez une direction</option>";
                $sql = "SELECT * FROM $tb_rhdirection";
                $result = mysqli_query($linki, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row['idrh']."'>".$row['direction']."</option>";
                }
                mysqli_free_result($result);
            ?></td>
            <!-- ... -->
            <td><font color="#000000">
                <select name="fournisseur" size="1" id="fournisseur">
                <?php
                $sqlS = "SELECT * FROM $tb_comptf ORDER BY Societef ASC";
                $resultS = mysqli_query($linki, $sqlS);
                while ($rowS = mysqli_fetch_assoc($resultS)) {
                    echo '<option>'.htmlspecialchars($rowS['Societef']).'</option>';
                }
                mysqli_free_result($resultS);
                ?>
                </select>
            </font></td>
            <!-- ... Fin du formulaire ... -->
        </table>
    </form>
    </div>
</div>

<?php
$sql = "SELECT count(*) as total FROM $tbl_appbonachat WHERE statut='Traitement'";
$resultat = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));
$row = mysqli_fetch_assoc($resultat);
$nb_total = $row['total'];

if ($nb_total == 0) {
    echo 'Aucune reponse trouvee';
} else {
    if (!isset($_GET['debut'])) $_GET['debut'] = 0;
    $nb_affichage_par_page = 10;

    $sql = "SELECT * FROM $tbl_appbonachat WHERE statut='Traitement' ORDER BY id_dem DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;
    $req = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));
?>
    <form name="form2" method="post" action="produit_cancel.php">
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
            <!-- ... [En-têtes de table restent identiques] ... -->
            <?php
            while($data = mysqli_fetch_array($req)) {
            ?>
            <tr>
                <td align="center" bgcolor="#FFFFFF"><div align="left"><?php echo htmlspecialchars($data['id_dem']); ?></div></td>
                <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['date_dem']); ?></em></div></td>
                <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['fournisseur']); ?></em></div></td>
                <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['direction']); ?></em></div></td>
                <td width="162" style="background-color:#FFF;"><div align="left"><em><?php echo htmlspecialchars($data['service']); ?></em></div></td>
                <td width="163" style="background-color:#FFF;">
                    <a href="app_bonachat_produit.php?id=<?php echo md5(microtime()).$data['id_dem']; ?>" 
                       class="btn btn-xs btn-success">Ajouter des produits</a>
                </td>
                <td width="163" style="background-color:#FFF;">
                    <a href="app_bonachat_archive.php?ID=<?php echo md5(microtime()).$data['id_dem']; ?>" 
                       onClick="return confirm('Etes-vous sûr de vouloir Archiver')" 
                       class="btn btn-xs btn-danger">Archiver</a>
                </td>
            </tr>
            <?php
            }
            mysqli_free_result($req);
            echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';
        }
        mysqli_free_result($resultat);
        mysqli_free_result($resultldate);
        ?>
        </table>
    </form>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><div align="center"></div></td>
        </tr>
        <tr>
            <td height="21">&nbsp;</td>
        </tr>
        <tr>
            <td height="21"><?php include_once('pied.php'); ?></td>
        </tr>
    </table>
</body>
</html>
<script language="JavaScript" type="text/javascript" xml:space="preserve">
var frmvalidator = new Validator("form1");
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();
frmvalidator.addValidation("nomprenom","req","nomprenom");
frmvalidator.addValidation("direction","req","direction");
</script>