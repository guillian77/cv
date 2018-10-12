<div id="main-box">
	
	<!-- BEGIN #main -->
	<div id="main">
		
		<h2><span>Conversation avec <?= $target['username']; ?></span></h2>
		<div class="content-padding">

			<div class="messages-control">
				<a href="?page=message&name=Boîte%20de%20réception" class="defbutton"><i class="fa fa-arrow-left"></i>Retour à la boîte de réception</a>

				<a href="?page=message&action=create&name=Nouveau%20message" class="defbutton margin-right"><i class="fa fa-comments"></i>Nouvelle conversation</a>
			</div>

		</div>

		<!-- BEGIN .conversation-container -->
		<div class="conversation-container">
			<div class="conv-submit">
				<div class="conv-user right">
					<a href="?page=user&view=profil&uid=<?= $target['uid']; ?>" class="avatar">
						<span class="wrapimg" style="display:inline-block;position:relative;border-radius:inherit;-moz-border-radius:inherit;overflow:hidden;"><img src="<?= $target['avatar']; ?>" class="setborder" title="" alt=""></span>
					</a>
				</div>
				<div class="conv-user left">
					<a href="?page=user&view=profil&uid=<?= $_SESSION['uid']; ?>" class="avatar">
						<span class="wrapimg" style="display:inline-block;position:relative;border-radius:inherit;-moz-border-radius:inherit;overflow:hidden;"><img src="<?= $_SESSION['avatar']; ?>" class="setborder" title="" alt=""></span>
					</a>
				</div>
				<form action="" method="POST">
					<div class="conv-textarea">
						<textarea name="content" id="" class="auto-height" placeholder="Ecrivez ici.."></textarea>

						<div class="conv-bottom">
							<input type="submit" value="Envoyer le message" class="send-conv-button">
						</div>
					</div>
				</form>
			</div>

			<div id="chatbox" class="inline-conversation" style="display: table; width: 100%;">

				<!-- BEGIN .inline-table-fix -->
				<div class="inline-table-fix">

					<?php foreach($messages as $message): ?>
						<div class="unread-messageline"><span><i class="fa fa-caret-down"></i>&nbsp;&nbsp;<?= getTextDate($message['m_create_at']); ?>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></span></div>
						
						<!-- BEGIN .conversation-single -->
						<div class="conversation-single has-avatar">
							<div class="conversation-user">
								<a href="user-single.html" class="avatar">
									<span class="wrapimg" style="display:inline-block;position:relative;border-radius:inherit;-moz-border-radius:inherit;overflow:hidden;"><img src="<?= $message['avatar']; ?>" class="setborder" title="" alt=""></span>
								</a>
							</div>
							<div class="conversation-text">
								<span class="date-time" title="20.Mar 2014"><?= getHour($message['m_create_at']); ?></span>
								<strong class="user-name"><a href="#"><?= $message['username']; ?></a></strong>
								<p><?= $message['m_content']; ?></p>
							</div>
						<!-- END .conversation-single -->
						</div>
					<?php endforeach; ?>

				<!-- END .inline-table-fix -->
				</div>

			</div>
		</div>
	</div>
	
	<aside id="sidebar" style="min-height: 778px;">
		<?php require_once'application/side/controllers/side.php'; ?>
	</aside>
	
	<div class="clear-float"></div>
	
</div>