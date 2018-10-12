<h2><span>A quoi jouons nous ?</span></h2>
<div class="content-padding">
	<div class="video-game-stores">
	
		<?php foreach ($game_list as $community_games): ?>

		<a href="?page=games-single&gid=<?php echo $community_games['gid']; ?>&name=Jeu" class="item">
			<span class="store-title">PC</span>
			<img src="/forum/<?php echo $community_games['imgurl']; ?>" height="180px" width="188px" alt="" />
			<strong><?php echo $community_games['name']; ?></strong>
		</a>

		<?php endforeach; ?>
	</div>
</div>