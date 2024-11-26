<?php
Require("session.php"); 
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
		<div id="main" class="" role="main">			
			<section id="" class="wrapper">							
			<div class="container">				
					<!-- chat-display -->
					<div id="chat-refresh">
						<?php // Affichage 
							include 'chat_display.php';
							include 'chat_online.php'; 
						?>
					</div>
                    
					<?php
 				$sqlup = "UPDATE $tbl_ind SET nbligne = '2' WHERE sid1='".$_SESSION['SID2']."' AND sid2= '".$_SESSION['SID1']."' AND nbligne = '1'";
	
	//$sqlup = 'UPDATE  chat_ind SET nbligne = "2" WHERE sid1= "'.$_SESSION['SID2'].'" AND sid2= "'.$_SESSION['SID1'].'" AND nbligne = "1"'; 
						$requp = mysqli_query($linki,$sqlup);						
 mysqli_close($linki);; 					?>
					<!-- /chat-display -->				
					<!-- chat-form -->
					<div id="chat-form" class="row">
						<form id="send-message" name="send-message" method="post" action="chat_save.php">
							<div class="input-hidden">
								<input name="SID1" type="hidden" value="<?php  echo $_SESSION['SID1']; ?>">
								<input name="SID2" type="hidden"  value="<?php echo $_SESSION['SID2']; ?>">
								<input name="SID3" type="hidden"  value="<?php echo $verification; ?>">
                                <input name="nbligne" type="hidden"  value="<?php echo $nbligne; ?>">
							</div>
							<div class="input-group">
								<textarea class="form-control" rows="3" type="text" name="message" placeholder="Message"></textarea>
							</div>
							<div class="action-group">
								<button class="btn action-question" name="submit-form" type="submit"><span class="fa fa-sign-in fa-fw"></span>&nbsp; Send</button>
								<button class="btn action-message" name="submit-clear" type=""><span class="fa fa-trash"></span>&nbsp; Clear</button>
							</div>
						</form>
					</div>
					<!-- /chat-form -->					
				</div>
			</section>
			<!-- /chat -->		
		</div>
		<!-- main -->	
	</div>
	<!-- /page -->
	<?php include_once('inc/scripts.php'); ?>
	<script>
		$(document).ready(function(){
				$.ajaxSetup({cache:false}); // This part addresses an IE bug. without it, IE will only load the first number and will never refresh
				var firstTimer = setTimeout(function() {
					$('#chat-refresh').load('chat_display.php?sid1=<?php echo $_SESSION['SID1']; ?>&sid2=<?php echo $_SESSION['SID2']; ?>');
				}, 250);		
				var secondTimer = setInterval(function() {
					$('#chat-refresh').load('chat_display.php?sid1=<?php echo $_SESSION['SID1']; ?>&sid2=<?php echo $_SESSION['SID2']; ?>');
				}, 10000);			
		});
	</script>
</body>
</html>
