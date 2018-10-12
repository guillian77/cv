<div id="main-box">
	
	<div id="main">
		
		<h2><span>Conversations (<?= $conversationsCount; ?>)</span></h2>
		<div class="content-padding">

			<div class="messages-control">
				<a href="?page=message&action=create&name=Nouveau message" class="newdefbutton margin-right"><i class="fa fa-comments"></i>Nouvelle conversation</a>
				<a href="?page=user&view=list&name=Liste%20des%20membres" rel="strike-modal" class="newdefbutton margin-right"><i class="fa fa-users"></i>Liste des membres</a>
			</div>

		</div>

		<?php if(isset($_SESSION['pm']['success'])): ?>
			<div class="content-padding">
				<div class="info-message" style="background-color: #75a226;">
					<a href="#" class="close-info"><i class="fa fa-times"></i></a>
					<p><strong>Bravo:</strong>Votre message à été envoyé </p>
				</div>
			</div>
		<?php endif; ?>

		<div class="messages-container">
			<?php foreach($conversations as $conversation): ?>
				<div class="message-block <?php if(empty($conversation['read_at'])): ?>unread<?php else: ?>read<?php endif; ?>">
					<a href="?page=user&view=profil&uid=<?= $conversation['uid']; ?>" class="avatar">
						<span class="wrapimg" style="display:inline-block;position:relative;border-radius:inherit;-moz-border-radius:inherit;overflow:hidden;">
							<img src="<?= $conversation['avatar']; ?>" class="setborder" title="" alt="">
						</span>

						<strong><?= $conversation['username']; ?></strong>
						<i><?= getShortDate($conversation['create_at']); ?> à <?= getHour($conversation['create_at']); ?></i>
					</a>
					<a href="?page=message&action=display&cid=<?= $conversation['c_id']; ?>&name=<?= $conversation['c_title']; ?>" class="message-link">
						<span class="msg-content"><strong><?= $conversation['c_title']; ?></strong></span>
						<font class="sidebar-comments" style="background: none;">
							<font><?php if(empty($conversation['read_at'])): ?>Non lu<?php else: ?>Lu<?php endif; ?></font>
						</font>
					</a>
					<a href="#" class="messages-delete-conv strike-tooltip" title="Delete conversation"><i class="fa fa-times"></i></a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	
	<aside id="sidebar" style="min-height: 778px;">
		<?php require_once'application/side/controllers/side.php'; ?>
	</aside>
	
	<div class="clear-float"></div>
	
</div>