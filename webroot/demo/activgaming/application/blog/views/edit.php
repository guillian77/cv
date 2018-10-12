<div id="main-box" class="full-width">
	
	<div id="main">
		<div class="forum-block">

			<h2><span>Editer cet article</span></h2>

			<div class="content-padding">
				<div class="forum-description">
					<a href="?page=blog&name=Derniers Articles" class="defbutton"><i class="fa fa-arrow-left"></i>Retour à la liste des articles</a>
				</div>
			</div>
			
			<?php foreach ($articles as $article): ?>
			<div class="content-padding full-reply">

				<div class="reply-box">
					<?php if($updated == 1): ?>
					<div class="info-message" style="background-color: #75a226;">
						<a href="#" class="close-info"><i class="fa fa-times"></i></a>
						<p><strong>Félicitation:</strong>L'article à été édité avec succès, vous allez automatiquement être redirigé vers l'article.</p>
					</div>
					<?php endif; ?>

					<div class="reply-textarea">
						<form action="?page=blog&view=edit&action=do_edit&id=<?= $_GET['id']; ?>" method="post">
							<div class="respond-input">
								<div class="da-customs">
									<input type="checkbox" name="pinned" id="pinned-topic" value="1" <?php if($article['a_pinned']): ?>checked<?php endif ?> />
									<label for="pinned-topic">Epinglé le post</label>
								</div>

								<select name="categorie" id="categorie">
									<?php foreach($categories as $categorie): ?>
										<option value="<?= $categorie['c_id']; ?>" <?php if($categorie['c_id'] == $article['a_categorie']): ?> selected="selected"<?php endif; ?>><?= $categorie['c_title']; ?></option>
									<?php endforeach; ?>
								</select>

								<input type="text" name="title" value="<?= $article['a_title']; ?>" />
								<input type="text" name="banner" value="<?= $article['a_banner']; ?>" />

								<br/>
								<a href="assets/plugins/ckeditor/plugins/imageuploader/imgbrowser.php?CKEditor=editor1&CKEditorFuncNum=1&langCode=fr" class="defbutton" target="_blank"><i class="fa fa-image"></i> Uploader une image</a>
								
							</div>

							<div class="respond-textarea">
								<textarea name="text" id="editor1">
									<p><?php if(empty($article['a_content'])): ?>Détails de votre article ...<?php else: ?><?= $article['a_content']; ?><?php endif; ?></p>
								</textarea>
							</div>

							<div class="respond-submit">
								<input type="submit" name="send" value="Editer l'article">
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

		</div>
		
	</div>
	
	<div class="clear-float"></div>
	
</div>