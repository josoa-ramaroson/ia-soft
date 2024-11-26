<?php
require("session.php"); 
require_once('calendar/classes/tc_calendar.php');

if($_SESSION['u_niveau'] != 40) {
    header("location:index.php?error=false");
    exit;
}

function barre_navigation($nb_total, $nb_affichage_par_page, $debut, $nb_liens_dans_la_barre) { 
    $barre = ''; 

    if ($_SERVER['QUERY_STRING'] == "") { 
        $query = $_SERVER['PHP_SELF'].'?debut='; 
    } else { 
        $tableau = explode("debut=", $_SERVER['QUERY_STRING']); 
        $nb_element = count($tableau); 

        if ($nb_element == 1) { 
            $query = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&debut='; 
        } else { 
            if ($tableau[0] == "") { 
                $query = $_SERVER['PHP_SELF'].'?debut='; 
            } else { 
                $query = $_SERVER['PHP_SELF'].'?'.$tableau[0].'debut='; 
            } 
        } 
    } 

    $page_active = floor(($debut/$nb_affichage_par_page)+1); 
    $nb_pages_total = ceil($nb_total/$nb_affichage_par_page); 

    if ($nb_liens_dans_la_barre%2==0) { 
        $cpt_deb1 = $page_active - ($nb_liens_dans_la_barre/2)+1; 
        $cpt_fin1 = $page_active + ($nb_liens_dans_la_barre/2); 
    } else { 
        $cpt_deb1 = $page_active - floor(($nb_liens_dans_la_barre/2)); 
        $cpt_fin1 = $page_active + floor(($nb_liens_dans_la_barre/2)); 
    } 

    if ($cpt_deb1 <= 1) { 
        $cpt_deb = 1; 
        $cpt_fin = $nb_liens_dans_la_barre; 
    } elseif ($cpt_deb1>1 && $cpt_fin1<$nb_pages_total) { 
        $cpt_deb = $cpt_deb1; 
        $cpt_fin = $cpt_fin1; 
    } else { 
        $cpt_deb = ($nb_pages_total-$nb_liens_dans_la_barre)+1; 
        $cpt_fin = $nb_pages_total; 
    } 

    if ($nb_pages_total <= $nb_liens_dans_la_barre) { 
        $cpt_deb=1; 
        $cpt_fin=$nb_pages_total; 
    } 

    if ($cpt_deb != 1) { 
        $cible = $query.(0); 
        $lien = '<A HREF="'.$cible.'">&lt;&lt;</A>&nbsp;&nbsp;'; 
    } else { 
        $lien=''; 
    } 
    $barre .= $lien; 

    for ($cpt = $cpt_deb; $cpt <= $cpt_fin; $cpt++) { 
        if ($cpt == $page_active) { 
            if ($cpt == $nb_pages_total) { 
                $barre .= $cpt; 
            } else { 
                $barre .= $cpt.'&nbsp;-&nbsp;'; 
            } 
        } else { 
            if ($cpt == $cpt_fin) { 
                $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
                $barre .= "'>".$cpt."</A>"; 
            } else { 
                $barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page); 
                $barre .= "'>".$cpt."</A>&nbsp;-&nbsp;"; 
            } 
        } 
    } 

    $fin = ($nb_total - ($nb_total % $nb_affichage_par_page)); 
    if (($nb_total % $nb_affichage_par_page) == 0) { 
        $fin = $fin - $nb_affichage_par_page; 
    } 

    if ($cpt_fin != $nb_pages_total) { 
        $cible = $query.$fin; 
        $lien = '&nbsp;&nbsp;<A HREF="'.$cible.'">&gt;&gt;</A>'; 
    } else { 
        $lien=''; 
    } 
    $barre .= $lien; 

    return $barre;   
}  
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript">
function AjaxFunction() {
    var httpxml;
    try {
        httpxml=new XMLHttpRequest();
    } catch (e) {
        try {
            httpxml=new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                httpxml=new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    function stateck() {
        if(httpxml.readyState==4) {
            var myarray = JSON.parse(httpxml.responseText);

            for(j=document.testform.quartier.options.length-1;j>=0;j--) {
                document.testform.quartier.remove(j);
            }

            for (i=0;i<myarray.data.length;i++) {
                var optn = document.createElement("OPTION");
                optn.text = myarray.data[i].quartier;
                optn.value = myarray.data[i].id_quartier;
                document.testform.quartier.options.add(optn);
            } 
        }
    }
    var url="fonction_dvq.php";
    var refville=document.getElementById('s1').value;
    url=url+"?refville="+refville;
    url=url+"&sid="+Math.random();
    httpxml.onreadystatechange=stateck;
    httpxml.open("GET",url,true);
    httpxml.send(null);
}
</script>
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<?php
require("bienvenue.php");
?>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">CONFIGURATION DE LA DATE D APPROVISONNEMENT</h3>
    </div>
    <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="panel-body">
            <tr>
                <td width="47%">
                    <form name="testform" method="post" action="app_caisse_save.php">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="32%">&nbsp;</td>
                                <td width="68%">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Login</td>
                                <td><input name="blogin" type="text" class="form-control" id="blogin" value="<?php echo $id_nom; ?>" size="50" readonly></td>
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
                                <td>Date approvisonement</td>
                                <td><?php
                                    $myCalendar = new tc_calendar("date", true, false);
                                    $myCalendar->setIcon("calendar/images/iconCalendar.gif");
                                    $myCalendar->setPath("calendar/");
                                    $myCalendar->setYearInterval($annee1, $annee2);
                                    $myCalendar->dateAllow($date3,$date2);
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
                                <td><font color="#FF0000">
                                    <input name="verification" type="hidden" id="verification" value="<?php 
                                        $sqfac="SELECT * FROM $tbl_app_caisse";
                                        $resultfac=mysqli_query($linki, $sqfac);
                                        $verification=mysqli_fetch_array($resultfac);
                                        $datesurv=$verification['date_verif'];
                                        echo $datesurv=$verification['date_verif'];
                                    ?>" />
                                </font></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="Submit" value="Mise à jours" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td width="53%">&nbsp;</td>
            </tr>
        </table>
    </div>
</div>
<p><font size="2"><font size="2"><font size="2">
<?php
require 'fonction.php';

$sql = "SELECT count(*) FROM $tbl_app_caisse";
$resultat = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));

$nb_total = mysqli_fetch_array($resultat);

if (($nb_total = $nb_total[0]) == 0) {
    echo 'Aucune reponse trouvee';
} else {
    if (!isset($_GET['debut'])) $_GET['debut'] = 0;
    
    $nb_affichage_par_page = 10;
    
    $sql = "SELECT * FROM $tbl_app_caisse ORDER BY idcaisse DESC LIMIT ".$_GET['debut'].",".$nb_affichage_par_page;
    
    $req = mysqli_query($linki, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($linki));
?>
</font></font></font></p>
<form name="form2" method="post" action="produit_cancel.php">
    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr bgcolor="#FFFFFF">
            <td width="64" align="center" bgcolor="#3071AA"><font color="#FFFFFF" size="4"><strong>N°</strong></font></td>
            <td width="266" align="center" bgcolor="#3071AA"><font color="#FFFFFF">LOGIN</font></td>
            <td width="313" align="center" bgcolor="#3071AA"><font color="#FFFFFF">Date</font></td>
            <td width="192" align="center" bgcolor="#3071AA">&nbsp;</td>
        </tr>
        <?php
        while($data=mysqli_fetch_array($req)) {
        ?>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><?php echo $data['idcaisse'];?><div align="left"></div></td>
            <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['blogin'];?></em></td>
            <td align="center" bgcolor="#FFFFFF"><em><?php echo $data['datecaisse'];?></em></td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <?php
        }
        
        mysqli_free_result($req);
        echo '<span class="gras">'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 10).'</span>';
    }
    mysqli_free_result($resultat);
    mysqli_close($linki);
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
        <td height="21">
            <?php
            include_once('pied.php');
            ?>
        </td>
    </tr>
</table>
<p>&nbsp;</p>
</body>
</html>