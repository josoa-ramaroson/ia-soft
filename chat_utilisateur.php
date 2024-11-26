<?php
Require("session.php"); 
?>
<?php
require 'fonction.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/stylechat.css">
</head>
<?php
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
				<?php

					$sql1="SELECT * FROM $tbl_utilisateur ORDER BY u_prenom";
					$req=mysqli_query($linki,$sql1);					
					// Check If array is empty
					if (mysqli_num_rows($req)==0) {
							
					} else { 
					// Put Content here ?>
						<!-- participants-list -->
						<section id="participants" class="wrapper">
							<div class="container">					
								<?php // Start while loop for content
								while($data=mysqli_fetch_array($req)){
									$filename = 'upload/utilisateurs/'.$data['id_u'].'.jpg'; ?>
									<div class="row">
										<?php if (file_exists($filename) == true) { ?>
											<img class="pix" width="100" src="<?php echo $filename; ?>" alt="<?php echo $data['u_nom']; ?>, <?php echo $data['u_prenom']; ?>" />
										<?php } else { ?>
											<img class="pix" height="100" width="100" src="upload/utilisateurs/no-picture.jpg" alt="<?php echo $data['u_nom']; ?>, <?php echo $data['u_prenom']; ?>" />
										<?php } ?>
										<div class="wrap">
											<p class="name"><?php echo $data['u_nom']; ?>, <?php echo $data['u_prenom']; ?></p>
											<p class="title"><?php echo $data['titre']; ?></p>
											<div class="action-group">
                                                <?php if ($sid1==$data['id_u']){ ?> <?php } else { ?>
<a class="btn action-message" href="chat.php?sid1=<?php echo $sid1; ?>&sid2=<?php echo $data['id_u']; ?>" title="Discuter avec cette personne"><span class="fa fa-comments fa-fw"></span> Envoyer un message </a><?php }?>
											</div>
										</div>
										<p class="name">											<?php 												$sqlnb ='SELECT * FROM chat_ind where sid1="'.$data['id_u'].'" and sid2="'.$_SESSION['SID'].'"';
												$reqnb = mysqli_query($linki,$sqlnb);
												while($datanb = mysqli_fetch_array($reqnb)){
													$nbligne=$datanb['nbligne'];
													if ($nbligne=='1'){														echo 'message en attente';													} else {																										}												}
											?>										</p>

									</div>					
								<?php } // End while loop ?>
       <?php $sqlmess ='SELECT wi.sid1, wi.sid2 , wi.nbligne , wp.id_u, wp.u_prenom , wp.u_nom  FROM chat_ind wi, utilisateur wp 	where wi.sid2="'.$_SESSION['SID'].'" and wi.nbligne=1 and wp.id_u=wi.sid1 order by id_ind asc';								   $reqmess = mysqli_query($linki,$sqlmess); while($datamess = mysqli_fetch_array($reqmess)){ $name=$datamess['u_prenom'].' '.$datamess['u_nom'];?>
          <div id="message"> <div> <?php echo " Message en attente de  $name </Br>" ; ?> </div>   </div>   <?php }  ?>
							</div>
						</section>
						<!-- /participants-list -->
				<?php	// End Content
					} mysqli_close($linki);
				?>		
				</div>
		<!-- main -->
	</div>
	<!-- /page -->
<?php include_once('inc/scripts.php'); ?>
</body>
</html>