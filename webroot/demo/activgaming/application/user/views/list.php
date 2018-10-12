<div id="main-box" class="full-width">
	<div id="main">
		<h2><span>Liste des Membres</span></h2>

		<div class="content-padding">
			<div class="staff-block">
				<?php foreach($users as $user): ?>
					<div class="item">
						<a href="?page=user&view=profil&uid=<?= $user['uid']; ?>"><img src="<?= $user['avatar']; ?>" class="item-photo" alt=""></a>
						<div class="item-content">
							<h3><a href="?page=user&view=profil&uid=<?= $user['uid']; ?>"><?= $user['username']; ?></a><span><?= $user['title']; ?></span></h3>
							<div class="social-links">
								<?= getUserGamecount($user['uid']); ?> <i class="fa fa-gamepad"></i>
								<?= $user['comments']; ?> <i class="fa fa-pencil"></i>
							</div>
							
							<p><?= $user['biographie']; ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>