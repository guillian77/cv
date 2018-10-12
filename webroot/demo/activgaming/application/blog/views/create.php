<div id="main-box" class="full-width">
	
	<div id="main">
		<div class="forum-block">

			<h2><span>Créer un article</span></h2>

			<div class="content-padding">
				<div class="forum-description">
					<a href="?page=blog&name=Derniers Articles" class="defbutton"><i class="fa fa-arrow-left"></i>Retour à la liste des articles</a>
				</div>
			</div>
			
			<div class="content-padding full-reply">
				<div class="reply-box">

					<?php if($created == 1): ?>
					<div class="info-message" style="background-color: #75a226;">
						<a href="#" class="close-info"><i class="fa fa-times"></i></a>
						<p><strong>Félicitation:</strong>L'article à été créer avec succès !</p>
					</div>
					<p>Vous allez automatiquement être redirigé vers votre article dans quelques secondes...</p>
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
						<form action="?page=blog&view=create&action=do_create" method="post">
							<div class="respond-input">
								<div class="da-customs">
									<input type="checkbox" name="pinned" id="pinned-topic" <?php if($pinned): ?>checked<?php endif ?> />
									<label for="pinned-topic">Epingler l'article</label>
								</div>

								<select name="categorie" id="categorie">
									<?php foreach($categories as $categorie): ?>
										<option value="<?= $categorie['c_id']; ?>" <?php if($categorie['c_title'] == $categorie['c_title']): ?> selected="selected"<?php endif; ?>><?= $categorie['c_title']; ?></option>
									<?php endforeach; ?>
								</select>

								<input type="text" name="title" value="<?= $title; ?>" placeholder="Titre de votre article" />
								<input type="text" name="banner" value="<?= $banner; ?>" placeholder="URL de l'image" />

								<a href="assets/plugins/ckeditor/plugins/imageuploader/imgbrowser.php?CKEditor=editor1&CKEditorFuncNum=1&langCode=fr" class="defbutton" target="_blank"><i class="fa fa-image"></i> Uploader une image</a>

							</div>

							<div class="respond-textarea">
								<textarea name="text" id="editor1">
									<p><?php if(empty($text)): ?>Détails de votre article ...<?php else: ?><?= $text; ?><?php endif; ?></p>
								</textarea>
							</div>

							<div class="respond-submit">
								<!-- <a href="forum-create.html#preview-post" class="newdefbutton">Aperçu</a> -->
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