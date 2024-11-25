 <? // Verification de la presence du login - et les ID des utilisateurs	
      session_start();
	 /* if(!isset($_SESSION['SID1'])|| empty($_SESSION['SID1'])) {
		include('index.php');
		exit;
	}

	if(!isset($_SESSION['SID2'])|| empty($_SESSION['SID2'])) {
		include('index.php');
		exit;
	} */
	

	require 'fonction.php';

	// on verifie l'existance de l'image de la personne qu on souhaite dialoguer avec lui 	
	$filename = 'upload/utilisateur/no-picture.jpg';
	$filename1 = 'upload/utilisateur/'.$_SESSION['SID2'].'.jpg';
	$sd=$_SESSION['SID2'];
	if (file_exists($filename1)) { $filename2=$filename1;} else{ $filename2=$filename;}
	
	// affichage des informations personnel de la personne  
	$sqlSID2 = "SELECT * FROM $tbl_utilisateur where id_u=$sd";
	$reqSID2 = mysql_query($sqlSID2); 
	while($dataSID2=mysql_fetch_array($reqSID2)){
?>
		<div class="row header">
			<h3>Vous dialoguez à / You interact with</h3>
		</div>
		
		<div class="row">
<? /* <img class="pix" height="100" width="100" src="<? echo $filename2 ?>" alt="<? echo $dataSID2['u_nom'].' '.$dataSID2['u_prenom']; ?>"/> */?>
			<div class="wrap">
				<p class="name"><? echo $dataSID2['u_nom'].', '.$dataSID2['u_prenom']; ?></p>
				<p class="title"><? echo $dataSID2['titre']; ?></p>
			</div>
		</div>
	<? } ?>

<div id="chat-display" class="row">
	<div id="" class="well">		
    <?php

// Affichage des messages contenut dans la BD

$sid1=$_GET['sid1'];
$sid2=$_GET['sid2'];

$_SESSION['SID1']=$_GET['sid1'];
$_SESSION['SID2']=$_GET['sid2'];

$sql = "SELECT count(*) FROM $tbl_message ";  


$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
$nb_total = mysql_fetch_array($resultat);  
   
$sql = "SELECT * FROM $tbl_message  where (SID1=$sid1 and SID2=$sid2) or (SID1=$sid2 and SID2=$sid1) ORDER BY id_chat  ASC ";  //ASC DESC

   
//$sql = "SELECT * FROM $tbl_message  where (SID1=$sid1 and SID2=$sid2) or (SID1=$sid2 and SID2=$sid1) ORDER BY id_chat   DESC  LIMIT 20";  //ASC DESC
 
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
while($data=mysql_fetch_array($req)){ 
?>  

<?php
// Afficher les noms des personnes qui dialoguent 
$SID=$data['SID1'];
$sqlSID = "SELECT * FROM $tbl_utilisateur where id_u=$SID";
$reqSID = mysql_query($sqlSID);
while($dataSID=mysql_fetch_array($reqSID)){
?>
				<div class="sub-row">	
					<? if ($SID==$_SESSION['SID1']){ ?>
					
						<div id="" class="user panel panel-default">
							<div class="panel-body">
                           <? $filenameA = 'upload/utilisateurs/'.$_SESSION['SID1'].'.jpg'; ?>
                            
                            <? if (file_exists($filenameA) == true) { ?>
							<img class="pix"  src="<? echo $filenameA; ?>" />  <? } else { ?>
							<img class="pix"  src="upload/utilisateurs/no-picture.jpg" />
							<? } ?>
                           
							<? /*	<img class="pix" src="upload/utilisateur/<? echo $_SESSION['SID1'] ?>.jpg" alt=""/>*/?>
							    	<div class="wrap">
									<? echo $dataSID['u_prenom']; ?>
									<p class="date"><? echo $data['datetime']; ?></p>
									<p>
									<? if ($SID==$_SESSION['SID1']){ ?>
									<a href="chat_display_cancel.php?sid1=<? echo $data['SID1'];?>&sid2=<? echo $data['SID2'];?>&ID=<? echo  md5(microtime()).$data['id_chat']; ?>" class="btn-xs btn-danger">X</a>
									<? } ?>
									
									<? echo $data['message'];?></p>
							        </div>
							</div>
						</div>
						
					<? } else { ?> 
					
						<div id="" class="panel panel-default">
							<div class="panel-body">
                            
                            <? $filenameB = 'upload/utilisateurs/'.$_SESSION['SID2'].'.jpg'; ?>
                            
                            <? if (file_exists($filenameB) == true) { ?>
							<img class="pix"  src="<? echo $filenameB; ?>" />  <? } else { ?>
							<img class="pix"  src="upload/utilisateurs/no-picture.jpg" />
							<? } ?>
                            
							<? /* <img class="pix" src="upload/utilisateur/<? echo $_SESSION['SID2'] ?>.jpg" alt=""/>*/?>
								    <div class="wrap">
									<? echo $dataSID['u_prenom']; ?>
									<p class="date"><? echo $data['datetime']; ?></p>
									<p><? echo $data['message'];?></p>
									</div>
							</div>
						</div>
						
					<? } ?> 
				</div>
	 
	 
  <?php
  // fermer la boucle 
  } ?>

<?

  // fermeture de la boucle d'affichage des messages
}  
?>
</div> 
</div> 

  








