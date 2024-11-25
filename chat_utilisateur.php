<?
Require("session.php"); 
?>
<?
require 'fonction.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/stylechat.css">
</head>
<?
Require("bienvenue.php");    // on appelle la page contenant la fonction
?>
<body>
	<!-- page -->
	<div id="page">
		<!-- page-header --><!-- /page-header -->
		<!-- main -->
		<div id="main" class="" role="main">		
				<!-- section-header -->
				<!-- /section-header -->
				<?
					$link = mysql_connect ($host,$user,$pass);
					mysql_set_charset('utf8',$link);
					mysql_select_db($db);
					$sql1="SELECT * FROM $tbl_utilisateur ORDER BY u_prenom";
					$req=mysql_query($sql1);					
					// Check If array is empty
					if (mysql_num_rows($req)==0) {
							
					} else { 
					// Put Content here ?>
						<!-- participants-list -->
						<section id="participants" class="wrapper">
							<div class="container">					
								<? // Start while loop for content
								while($data=mysql_fetch_array($req)){
									$filename = 'upload/utilisateurs/'.$data['id_u'].'.jpg'; ?>
									<div class="row">
										<? if (file_exists($filename) == true) { ?>
											<img class="pix" width="100" src="<? echo $filename; ?>" alt="<? echo $data['u_nom']; ?>, <? echo $data['u_prenom']; ?>" />
										<? } else { ?>
											<img class="pix" height="100" width="100" src="upload/utilisateurs/no-picture.jpg" alt="<? echo $data['u_nom']; ?>, <? echo $data['u_prenom']; ?>" />
										<? } ?>
										<div class="wrap">
											<p class="name"><? echo $data['u_nom']; ?>, <? echo $data['u_prenom']; ?></p>
											<p class="title"><? echo $data['titre']; ?></p>
											<div class="action-group">
                                                <? if ($sid1==$data['id_u']){ ?> <? } else { ?>
<a class="btn action-message" href="chat.php?sid1=<? echo $sid1; ?>&sid2=<? echo $data['id_u']; ?>" title="Discuter avec cette personne"><span class="fa fa-comments fa-fw"></span> Envoyer un message </a><? }?>
											</div>
										</div>
										<p class="name">											<? 												$sqlnb ='SELECT * FROM chat_ind where sid1="'.$data['id_u'].'" and sid2="'.$_SESSION['SID'].'"';
												$reqnb = mysql_query($sqlnb);
												while($datanb = mysql_fetch_array($reqnb)){
													$nbligne=$datanb['nbligne'];
													if ($nbligne=='1'){														echo 'message en attente';													} else {																										}												}
											?>										</p>

									</div>					
								<? } // End while loop ?>
       <? $sqlmess ='SELECT wi.sid1, wi.sid2 , wi.nbligne , wp.id_u, wp.u_prenom , wp.u_nom  FROM chat_ind wi, utilisateur wp 	where wi.sid2="'.$_SESSION['SID'].'" and wi.nbligne=1 and wp.id_u=wi.sid1 order by id_ind asc';								   $reqmess = mysql_query($sqlmess); while($datamess = mysql_fetch_array($reqmess)){ $name=$datamess['u_prenom'].' '.$datamess['u_nom'];?>
          <div id="message"> <div> <?php echo " Message en attente de  $name </Br>" ; ?> </div>   </div>   <? }  ?>
							</div>
						</section>
						<!-- /participants-list -->
				<?	// End Content
					} mysql_close();
				?>		
				</div>
		<!-- main -->
	</div>
	<!-- /page -->
<? include_once('inc/scripts.php'); ?>
</body>
</html>