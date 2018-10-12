<div id="main-box" class="full-width">
	<div id="main">
		<div class="forum-block">

			<h2><span>Créer un event</span></h2>

			<div class="content-padding">
				<div class="forum-description">
					<a href="?page=event&name=Évènements%20à%20venir" class="defbutton"><i class="fa fa-arrow-left"></i>Retour à la liste des events</a>
				</div>
			</div>
			
			<div class="content-padding full-reply">
				<div class="reply-box">

					<?php if($created == 1): ?>
						<div class="info-message" style="background-color: #75a226;">
							<a href="#" class="close-info"><i class="fa fa-times"></i></a>
							<p><strong>Félicitation:</strong>L'event à été créer avec succès !</p>
						</div>
						<p>Vous allez automatiquement être redirigé vers votre event dans quelques secondes...</p>
						<p>Si ce n'est pas le cas cliquez sur ce <strong><a href="">lien</a></strong> ou le bouton situé en haut de page.</p>
					<?php endif; ?>

					<?php if($error): ?>
						<div class="info-message" style="background-color: #a24026;">
							<a href="#" class="close-info"><i class="fa fa-times"></i></a>
							<p><strong>Attention:</strong><?= $error; ?></p>
						</div>
					<?php endif; ?>

					<?php if(!$created): ?>
						<div class="reply-textarea">
							<form action="?page=event&view=create&action=do_create" method="post">
								<div class="respond-input">

									<input type="text" name="title" value="<?= $title; ?>" placeholder="Titre de votre event" /> <i class="fa fa-flag"></i> Titre de l'event<br/>

									<input type="text" name="banner" value="<?= $banner; ?>" placeholder="URL de l'image" /> <i class="fa fa-link"></i> Bannière de l'event<br/>

									<p><a href="assets/plugins/ckeditor/plugins/imageuploader/imgbrowser.php?CKEditor=editor1&CKEditorFuncNum=1&langCode=fr" class="defbutton" target="_blank"><i class="fa fa-image"></i> Uploader une image</a></p>

									<input id="date" name="date" value="<?= $undate; ?>" type="date"> <i class="fa fa-calendar"></i> Date de l'event<br/>

									<input id="time" name="time" value="<?= $untime; ?>" type="time"> <i class="fa fa-clock-o"></i> Heure de l'event<br/>

									<select name="location">
										<option>En ligne</option>
										<option>Rencontre IRL</option>
										<option>Rencontre vocal</option>
										<option>Autre</option>
									</select> <i class="fa fa-map-marker"></i> Lieu de l'event<br/>

									<select name="active">
										<option value="visible">Visible</option>
										<option value="hide">Caché</option>
									</select> <i class="fa fa-eye"></i> Visibilité de l'event<br/>
								</div>

								<div class="respond-textarea">
									<textarea name="text" id="editor1">
										<p><?php if(empty($text)): ?>Détails de votre event ...<?php else: ?><?= $text; ?><?php endif; ?></p>
									</textarea>
								</div>
								<div class="respond-submit">
									<input type="submit" name="send" value="Publier le post">
								</div>
							</form>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
		
	</div>
	
	<div class="clear-float"></div>
	
</div>