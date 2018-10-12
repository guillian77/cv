<div id="main-box" class="full-width">
	<!-- BEGIN #main -->
	<div id="main">
		
		<h2><span>Teamspeak 3 - Activ Gaming</span></h2>
		<div class="content-padding">

			<div class="article-full">

				<div class="article-content">
					
					<div class="clear-float do-the-split"></div>
					
					<p>Cette page permet à tous les visiteurs du site de visualiser en temps réel qui est connecté
					sur notre serveur vocal Teamspeak 3.</p>

					<p>Notre <strong>site est lié à notre serveur Teamspeak 3</strong>, ainsi à chaque connections le site va vérifier si vous avez bien le titre de membre.</p>

					<p>C'est le serveur Teampseak multigaming qui vous correspond !</p>

					<p>L'adresse: <b>ts.activ-gaming.com</b></p>

					<div class="clear-float do-the-split"></div>
					
					<p>
						<a href="ts3server://ts.activ-gaming.com?port=9987" target="_blank" rel="nofollow" class="button big-size" style="background-color: #313131;">Se connecter</a>
						<a href="https://www.teamspeak.com/downloads" class="button big-size" style="background-color: #c22828;">Télécharger Teamspeak</a>
					</p>
					
					<?php
					echo '
					<p>
						<span class="ts3status"><b>Status serveur:</b> '. $status .'</span><br/>
						<span class="ts3_clientcount"><b>Clients en ligne:</b> '. $tsonlinecount .'/'. $max .'</span>
					</p>
					'.$ts3->getViewer(new TeamSpeak3_Viewer_Html($conf['path']['teamspeak']."images/viewer/", $conf['path']['teamspeak']."images/flags/", "data:image")).'
					';
					?>

				</div>
			
			</div>

		<!-- END .content-padding -->
		</div>

		
	<!-- END #main -->
	</div>

	<!-- BEGIN #sidebar -->
	<div id="sidebar">
		<?php
		require'application/side/network.php'; // RESEAUX SOCIAUX
		?>
	<!-- END #sidebar -->
	</div>
</div>