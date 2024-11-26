<?php
require 'session.php';
require 'fonction.php';
require 'fc-affichage.php';
require_once('calendar/classes/tc_calendar.php');

if((($_SESSION['u_niveau'] != 20) ) && ($_SESSION['u_niveau'] != 40) && ($_SESSION['u_niveau'] != 90)) {
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
    function stateck() {
        if(httpxml.readyState == 4) {
            var myarray = JSON.parse(httpxml.responseText);
            for(j = document.testform.subcat.options.length-1; j >= 0; j--) {
                document.testform.subcat.remove(j);
            }
            for (i = 0; i < myarray.data.length; i++) {
                var optn = document.createElement("OPTION");
                optn.text = myarray.data[i].service;
                optn.value = myarray.data[i].idser;
                document.testform.subcat.options.add(optn);
            } 
        }
    }
    var url = "rh_fonction_direction.php";
    var idrh = document.getElementById('s1').value;
    url = url + "?idrh=" + idrh;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateck;
    httpxml.open("GET", url, true);
    httpxml.send(null);
}
</script>
</head>
<?php
require 'bienvenue.php';
$sqldate = "SELECT * FROM $tbl_caisse";
$resultldate = mysqli_query($linki, $sqldate);
$datecaisse = mysqli_fetch_array($resultldate);
?>
<body>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">ARCHIVES DES ORDRES DE SERVICE</h3>
    </div>
    <div class="panel-body"></div>
</div>
<p><font size="2"><font size="2"><font size="2">
<?php
$sql = "SELECT count(*) as total FROM $tbl_appbonachat WHERE statut='Finaliser'";
$resultat = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));
$nb_total = mysqli_fetch_array($resultat)['total'];

if ($nb_total == 0) {
    echo 'Aucune reponse trouvee';
} else {
    if (!isset($_GET['debut'])) $_GET['debut'] = 0;
    $nb_affichage_par_page = 50;

    $sql = "SELECT * FROM $tbl_appbonachat WHERE statut='Finaliser' ORDER BY id_dem DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;
    $req = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));
?>
</font></strong></font></font></font></p>
<form name="form2" method="post" action="produit_cancel.php">
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr bgcolor="#FFFFFF">
            <td width="64" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N&deg;</strong></font></td>
            <td width="266" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Date</font></td>
            <td width="313" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Fournisseur</font></td>
            <td width="192" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Direction</font></td>
            <td width="162" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Service</font></td>
            <td width="163" align="center" bgcolor="#3071AA">&nbsp;</td>
        </tr>
        <?php
        while($data = mysqli_fetch_array($req)) {
        ?>
        <tr>
            <td height="32" align="center" bgcolor="#FFFFFF"><div align="left"><?php echo htmlspecialchars($data['id_dem']); ?></div></td>
            <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['date_dem']); ?></em></div></td>
            <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['fournisseur']); ?></em></div></td>
            <td align="center" bgcolor="#FFFFFF"><div align="left"><em><?php echo htmlspecialchars($data['direction']); ?></em></div></td>
            <td width="162" style="background-color:#FFF;"><div align="left"><em><?php echo htmlspecialchars($data['service']); ?></em></div></td>
            <td width="163" style="background-color:#FFF;">
                <a href="app_bonachat_imp.php?<?php echo md5(microtime()); ?>&id=<?php echo md5(microtime()).$data['id_dem']; ?>" 
                   target="_blank" class="btn btn-xs btn-success">Visualiser les ordres</a>
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