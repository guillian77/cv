<div id="main-box" class="full-width">
	<div id="main">
		<h2><span>Notre équipe</span></h2>
		<div class="content-padding">
			<div class="staff-block">
				<?php foreach($users as $user): ?>
					<div class="item">
						<a href="?page=user&view=profil&uid=<?= $user['uid']; ?>"><img src="<?= $user['avatar']; ?>" class="item-photo" alt="" /></a>
						<div class="item-content">
							<h3><a href="?page=user&view=profil&uid=<?= $user['uid']; ?>"><?= $user['username']; ?></a><span><?= $user['title']; ?></span></h3>
							
							<p><?= $user['biographie']; ?></p>
						</div>
					</div>
				<?php endforeach; ?>


			</div>
		</div>
	</div>	
</div>