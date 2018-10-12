<div id="main-box">
	
	<!-- BEGIN #main -->
	<div id="main">
		
		<h2><span>Nouvelle Conversation</span></h2>
		<div class="content-padding">

			<div class="messages-control">
				<a href="?page=message&name=Boîte de réception" class="newdefbutton margin-right"><i class="fa fa-comments"></i>Boîte de réception</a>
			</div>

		</div>

		<!-- BEGIN .conversation-container -->
		<div class="conversation-container">
			<?php if($_GET['action'] == "do_create"): ?>
				<?php foreach($errors as $error): ?>
					<div class="content-padding">
						<div class="info-message" style="background-color: #a24026;">
							<a href="#" class="close-info"><i class="fa fa-times"></i></a>
							<p><strong>Erreur:</strong><?= $error; ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

			<form action="?page=message&action=do_create&name=Nouveau%20message" method="POST">
				<div class="conversation-start-new-block">
					<h3>Destinataire</h3>
					<div class="conv-recipent">
						<div class="select-replace">
							<input class="select-main-input" type="text" placeholder="Nom d'utilisateur .." value="<?php if(isset($for_user)) { echo $for_user; } ?>" name="for_user">
						</div>
					</div>

					<h3>Titre</h3>
					<div class="conv-recipent">
						<div class="select-replace">
							<input class="select-main-input" type="text" placeholder="Titre du message .." value="<?php if(isset($title)) { echo $title; } ?>" name="title">
						</div>
						
					</div>
					<h3>Contenu du message</h3>
				</div>

				<div class="conv-submit start-new">
					<div class="conv-textarea">
						<textarea name="content" id="" class="auto-height" placeholder="Votre message içi ..."><?php if(isset($content)) { echo $content; } ?></textarea>
						<div class="conv-bottom">
							<input type="submit" value="Envoyer" class="send-conv-button">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<aside id="sidebar" style="min-height: 778px;">
		<?php require_once'application/side/controllers/side.php'; ?>
	</aside>
	
	<div class="clear-float"></div>
	
</div>