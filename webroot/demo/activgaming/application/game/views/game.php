<div id="main-box" class="full-width">
					
	<div id="main">

		<!-- BEGIN. LISTE DES JEUX -->
		<h2><span>A quoi jouons nous ?</span></h2>
		<div class="content-padding">
			<div class="video-game-stores">
			
				<?php foreach ($game_list as $communaity_games): ?>

				<a href="?page=games-single&gid=<?php echo $communaity_games['gid']; ?>&name=Jeu" class="item">
					<span class="store-title">PC</span>
					<img src="/forum/<?php echo $communaity_games['imgurl']; ?>" height="180px" width="188px" alt="" />
					<strong><?php echo $communaity_games['name']; ?></strong>
				</a>

				<?php endforeach; ?>
			</div>
		</div>
		<!-- END. LISTE DES JEUX -->

	</div>
	
	<div class="clear-float"></div>
	
</div>