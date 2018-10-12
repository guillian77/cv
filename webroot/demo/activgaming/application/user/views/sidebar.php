<div class="profile-left-side">

	<div class="the-profile-top">
		<div class="profile-user-name">
			<h1><?php echo $user['username']; ?></h1>
			<div class="sttaa"><span>Groupe:</span><?php echo $user['title']; ?></div>
		</div>

		<div class="avatar">
			<?php if($_GET['uid'] == $_SESSION['uid']): ?>
				<div class="avatar-button"><a href="?page=user&view=profil_edit&uid=<?php echo $user['uid']; ?>"><i class="fa fa-camera-retro"></i>Changer de Photo</a></div>
			<?php endif; ?>
			<span class="wrapimg" style="display:inline-block;position:relative;border-radius:inherit;-moz-border-radius:inherit;overflow:hidden;"><img src="<?= $user['avatar']; ?>" class="setborder"  width="220" height="220" alt=""></span>
			<span class="framborder"><img src="<?= $user['frame']; ?>" /></span>
		</div>
		
		<div>
			<ul class="user-button-list">
				<li><span class="info-msg"><?php echo $user['localisation']; ?></span></li>
			</ul>

			<div class="user-panel-about">
				<div>
					<b><i class="fa fa-male"></i>Biographie</b>
					<p><?php echo $user['biographie']; ?></p>
				</div>

				<div class="user-achievements">
					<a href="?page=award&name=Trophées"><b><i class="fa fa-trophy"></i>Trophées</b></a>
					<p>
						<span>Aucun trophée pour le moment. Système en cours de réalisation.</span>
						<!-- <span class="ach strike-tooltip" title="Joined Revelio"><i class="fa fa-unlock-alt"></i></span>
						<span class="ach strike-tooltip" title="Here from beginning"><i class="fa fa-bar-chart-o"></i></span>
						<span class="ach strike-tooltip" title="Active on forums"><i class="fa fa-comments-o"></i></span>
						<span class="ach strike-tooltip" title="Writes a lot"><i class="fa fa-keyboard-o"></i></span>
						<span class="ach strike-tooltip" title="Admin aproved"><i class="fa fa-thumbs-up"></i></span>
						<span class="ach strike-tooltip" title="Helps everyone"><i class="fa fa-medkit"></i></span>
						<span class="ach strike-tooltip" title="Night owl"><i class="fa fa-moon-o"></i></span>
						<span class="ach strike-tooltip" title="Comes and plays"><i class="fa fa-gamepad"></i></span> -->
					</p>
				</div>
			</div>

			<ul class="user-button-list">
				<?php if($_GET['uid'] == $_SESSION['uid'] AND $_GET['view'] != "profil_edit"): ?>
					<li><a href="?page=user&view=profil_edit&uid=<?php echo $_GET['uid']; ?>" class="defbutton profile-button disabled"><i class="fa fa-wrench"></i>Modifier profil</a></li>
				<?php endif; ?>

				<?php if($_SESSION['is_admin']): ?>
					<li><a href="#" class="defbutton profile-button disabled"><i class="fa fa-ban"></i>Bannir utilisateur</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	
	<div class="the-profile-navi">
		<ul class="profile-navi">
			<li><a href="?page=user&view=profil&uid=<?php echo $_GET['uid']; ?>#top"><i class="fa fa-globe"></i>Informations profil</a></li>
			<li><a href="?page=user&view=profil&uid=<?php echo $_GET['uid']; ?>#commentaire"><i class="fa fa-comment"></i>Livre d'or (commentaire)</a></li>
			<li><a href="#top"><span class="left-avatar"></span><i class="fa fa-arrow-up"></i>Haut de page<span class="clear-float"></span></a></li>
		</ul>
	</div>
</div>