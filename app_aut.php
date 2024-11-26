<?php
require 'session.php';
require_once('calendar/classes/tc_calendar.php');
require 'fc-affichage.php';
require 'fonction.php';

if($_SESSION['u_niveau'] != 40) {
    header("location:index.php?error=false");
    exit;
}
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
.taille16 {
    font-size: 16px;
}
</style>
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?php
require("bienvenue.php"); // on appelle la page contenant la fonction
$sqldate = "SELECT * FROM $tbl_app_caisse";
$resultldate = mysqli_query($linki, $sqldate);
$datecaisse = mysqli_fetch_array($resultldate);
?>
<!-- Le reste du HTML reste identique jusqu'à la partie PHP de la liste déroulante des années -->

<?php
$sql81 = "SELECT * FROM annee ORDER BY annee ASC";
$result81 = mysqli_query($linki, $sql81);

while ($row81 = mysqli_fetch_assoc($result81)) {
    echo '<option>'.htmlspecialchars($row81['annee']).'</option>';
}
?>

<!-- Le reste du HTML reste identique jusqu'à la partie de pagination -->

<?php
$sql = "SELECT count(*) as total FROM $tbl_appaut";
$resultat = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));
$nb_total = mysqli_fetch_array($resultat)['total'];

if ($nb_total == 0) {
    echo 'Aucune reponse trouvee';
} else {
    if (!isset($_GET['debut'])) $_GET['debut'] = 0;
    $nb_affichage_par_page = 10;

    $sql = "SELECT * FROM $tbl_appaut ORDER BY idapp_aut DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;
    $req = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));

    while($data = mysqli_fetch_array($req)) {
?>
    <tr> 
        <td align="center" bgcolor="#FFFFFF"><div align="left"><?php echo htmlspecialchars($data['idapp_aut']); ?></div>
        <div align="left"></div></td>
        <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['date']); ?></em></div></td>
        <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['service']); ?></em></div></td>
        <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['Nature']); ?></em></div></td>
        <td width="281" style="background-color:#FFF;"><em><?php echo htmlspecialchars($data['Motif']); ?></em></td>
        <td width="98" style="background-color:#FFF;"><?php echo htmlspecialchars($data['Montant']); ?></td>
        <td width="78" style="background-color:#FFF;"><a href="app_aut_imp.php?id=<?php echo md5(microtime()).$data['idapp_aut']; ?>" style="margin:5px" class="btn btn-xs btn-warning" target="_blank">IMPRIMER</a></td>
    </tr>
<?php
    }

    mysqli_free_result($req);
    echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';
}

mysqli_free_result($resultat);
mysqli_free_result($result81);
mysqli_free_result($resultldate);
?>

</table>
</form>
<!-- Le reste du HTML reste identique -->
<script language="JavaScript" type="text/javascript" xml:space="preserve"> 
    var frmvalidator = new Validator("form1");
    frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("Nature","req","SVP entre un nombre");
    frmvalidator.addValidation("Motif","req","SVP entre un nombre");
    frmvalidator.addValidation("Montant","req","SVP entre un nombre");
</script>
</body>
</html>