 <? $sqlmess ='SELECT wi.sid1, wi.sid2 , wi.nbligne , wp.id_u, wp.u_prenom , wp.u_nom  FROM chat_ind wi, a_utilisateur wp 	where wi.sid2="'.$_SESSION['SID'].'" and wi.nbligne=1 and wp.id_u=wi.sid1 order by id_ind asc';								   $reqmess = mysql_query($sqlmess); while($datamess = mysql_fetch_array($reqmess)){ $name=$datamess['u_prenom'].' '.$datamess['u_nom'];?>
	<nav id="bottom-nav" class="navbar navbar-default navbar-fixed-bottom" role="navigation">
		<div class="container-fluid">
			<div class="row">			
				<ul id="newsticker" class="newsticker">
					<? while($datamess = mysql_fetch_array($reqmess)){
						$name=$datamess['u_prenom'].' '.$datamess['u_nom']; ?>
						<li class="news-item"><a href="/chat/chat.php?sid1=<? echo $sid1; ?>&sid2=<? echo $datamess['sid1']; ?>&sid3=<? echo $sid3; ?>">You got a new message from <b><? echo $name; ?></b></a></li>
					<? } ?>

				</ul>
			</div>
		</div>
	</nav>
<? } ?>