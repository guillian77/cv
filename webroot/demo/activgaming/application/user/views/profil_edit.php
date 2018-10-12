<?php foreach($users as $user): ?>
<div id="main-box" class="full-width">
	
	<div id="main">

		<div class="user-profile">
			
			<div class="profile-shadow"></div>

			<?php require_once'sidebar.php' ?>

			<div class="profile-right-side">
				<h2><span>Modifier mon profil</span></h2>
				<div class="content-padding">
					<p class="p-padding">Vous pouvez modifier les informations et paramètres concernant votre compte sur cette page.</p>

					<div>
						<!-- GENERAL: left -->
						<div style="width:350px; padding: 0 10px;" class="left">
							<h2 style="margin-left:-30px;"><span>Général</span></h2>

							<!-- MODIFIER AVATAR -->
							<div class="the-form" style="margin: 0; margin-top:40px;">
								<?php if($error_avatar): ?>
									<span class="the-alert-msg"><i class="fa fa-warning"></i><?= $error_avatar; ?></span>
								<?php endif; ?>

								<form action="?page=user&view=profil_edit&action=update_avatar&uid=<?= $_GET['uid']; ?>" method="post">

									<p>
										<label for="avatar">Avatar:<span class="required">*</span></label>
										<input type="text" name="avatar" id="avatar" value="<?php echo $user['avatar']; ?>" placeholder="URL de l'avatar" />

										<a href="assets/plugins/ckeditor/plugins/imageuploader/imgbrowser.php?CKEditor=editor1&CKEditorFuncNum=1&langCode=fr" style="margin-left: 140px;" target="_blank"><i class="fa fa-image"></i> Uploader une image</a>
									</p>

									<p class="form-footer">
										<input type="submit" name="login_submit" id="login_submit" value="Modifier mon avatar">
									</p>

								</form>
								<div class="breaking-line"></div>
							</div>

							<!-- MODIFIER MOT DE PASSE -->
							<div class="the-form" style="margin: 0; margin-top:40px;">

								<?php if($password_modified): ?>
								<span class="the-success-msg"><i class="fa fa-check"></i>Mot de passe modifié avec succès</span>
								<?php endif; ?>

								<?php if($error): ?>
								<span class="the-alert-msg"><i class="fa fa-warning"></i><?= $error; ?></span>
								<?php endif; ?>

								<?php if($passwordEmpty): ?>
								<span class="the-alert-msg"><i class="fa fa-warning"></i>Veuillez renseigner un mot de passe.</span>
								<?php endif; ?>

								<form action="?page=user&view=profil_edit&action=update_password&uid=<?= $_GET['uid']; ?>" method="post">
									<p>
										<label for="password">Ancien passe:<span class="required">*</span></label>
										<input type="password" name="password_old" id="password" placeholder="Ancien mot de passe" ="">
									</p>

									<p>
										<label for="password">Mot de passe:<span class="required">*</span></label>
										<input type="password" name="password" id="password" placeholder="Nouveau mot de passe" ="">
									</p>

									<p>
										<label for="password_confirm">Confirmation:<span class="required">*</span></label>
										<input type="password" name="password_confirm" id="password_confirm" placeholder="Retapez mot de passe" ="">
									</p>

									<p class="form-footer">
										<input type="submit" name="login_submit" id="login_submit" value="Modifier mon mot de passe">
									</p>
									<div class="breaking-line"></div>
								</form>
							</div>

							<!-- MODIFIER EMAIL -->
							<div class="the-form" style="margin: 0; margin-top:40px;">

								<?php if($email_modified): ?>
								<span class="the-success-msg"><i class="fa fa-check"></i>E-mail modifié avec succès</span>
								<?php endif; ?>

								<form action="?page=user&view=profil_edit&action=update_email&uid=<?= $_GET['uid']; ?>" method="post">

									<p>
										<label for="email" >E-mail: <span class="required">*</span></label>
										<input type="text" name="email" id="email" value="<?php echo $user['email']; ?>" ="">
									</p>

									<p>
										<label for="email_confirm">Confirmation: <span class="required">*</span></label>
										<input type="text" name="email_confirm" id="email_confirm" placeholder="Retapez e-mail" ="">
									</p>

									<p class="form-footer">
										<input type="submit" name="login_submit" id="login_submit" value="Modifier mon e-mail">
									</p>
									<div class="breaking-line"></div>
								</form>
							</div>

							<!-- MODIFIER BIOGRAPHIE -->
							<div class="the-form" style="margin: 0; margin-top:40px;">

								<?php if($bio_modified): ?>
								<span class="the-success-msg"><i class="fa fa-check"></i>Biographie modifié avec succès</span>
								<?php endif; ?>

								<form action="?page=user&view=profil_edit&action=update_biographie&uid=<?= $_GET['uid']; ?>" method="post">

									<p class="form-comment">
										<label for="">Biographie:</label>
										<textarea name="biographie" placeholder="Ecrivez votre biographie en quelques mots"><?php echo $user['biographie']; ?></textarea>
									</p>

									<p class="form-footer">
										<input type="submit" name="login_submit" id="login_submit" value="Modifier ma biographie">
									</p>

								</form>
							</div>

							<div class="clear-float"></div>
						</div>

						<!-- MODIFIER SETUP: right -->
						<div style="width:300px;" class="right">
							<h2 style="margin-left: -30px;"><span>Mon setup</span></h2>
							<div class="the-form" style="margin: 0; margin-top:40px;">

								<form action="?page=user&view=profil_edit&action=update_setup&uid=<?= $_SESSION['uid']; ?>" method="post">

									<p>
										<label for="processor">Processeur:</label>
										<input type="text" name="processor" id="processor" value="<?php echo $user['processor']; ?>" placeholder="Nom de mon processeur" />
									</p>

									<p>
										<label for="ram">RAM:</label>
										<input type="text" name="ram" id="ram" value="<?php echo $user['ram']; ?>" placeholder="Nom de ma RAM" />
									</p>

									<p>
										<label for="stockage">Stockage:</label>
										<input type="text" name="stockage" id="stockage" value="<?php echo $user['stockage']; ?>" placeholder="Nom de mon périphérique de stockage" />
									</p>

									<p>
										<label for="gpu">Carte graphique:</label>
										<input type="text" name="gpu" id="gpu" value="<?php echo $user['gpu']; ?>" placeholder="Nom de ma carte graphique" />
									</p>

									<p>
										<label for="motherboard">Carte mère:</label>
										<input type="text" name="motherboard" id="motherboard" value="<?php echo $user['motherboard']; ?>" placeholder="Nom de ma carte mère" />
									</p>

									<p class="form-comment">
										<label for="">Autre:</label>
										<textarea name="freefield" placeholder="Ajoutez des équipements divers"><?php echo $user['freefield']; ?></textarea>
									</p>

									<p>
										<label for="setup_pic_1">Photo 1:</label>
										<input type="text" name="setup_pic_1" id="setup_pic_1" value="<?php echo $user['setup_pic_1']; ?>" placeholder="URL photo de mon setup" />
									</p>

									<p>
										<label for="setup_pic_2">Photo 2:</label>
										<input type="text" name="setup_pic_2" id="setup_pic_2" value="<?php echo $user['setup_pic_2']; ?>" placeholder="URL photo de mon setup" />
									</p>

									<p><a href="assets/plugins/ckeditor/plugins/imageuploader/imgbrowser.php?CKEditor=editor1&CKEditorFuncNum=1&langCode=fr" style="margin-left: 140px;" target="_blank"><i class="fa fa-image"></i> Uploader une image</a></p>

									<p class="form-footer">
										<input type="submit" name="login_submit" id="login_submit" value="Modifier mon setup">
									</p>

								</form>
							</div>
							<div class="clear-float"></div>
						</div>

						<!-- MODIFIER DIVERS: right -->
						<div style="width:300px; margin-top: 25px;" class="right">
							<h2 style="margin-left: -30px;" id="complement"><span>Infos complémentaires</span></h2>
							<div class="the-form" style="margin: 0; margin-top:40px;">
								<form action="?page=user&view=profil_edit&action=update_complement&uid=<?= $_SESSION['uid']; ?>#complement" method="post">

									<p>
										<label for="sexe">Sexe:</label>
										<select name="sexe" id="sexe">
											<option value="Masculin" <?php if($user['sexe'] == "Masculin"): ?> selected="selected"<?php endif; ?>>Masculin</option>
											<option value="Féminin" <?php if($user['sexe'] == "Féminin"): ?> selected="selected"<?php endif; ?>>Féminin</option>
											<option value="Inconnu" <?php if($user['sexe'] == "Inconnu"): ?> selected="selected"<?php endif; ?>>Inconnu</option>
										</select>
									</p>

									<p>
										<label for="birth">Anniversaire:</label>
										<input id="birth" name="birth" value="<?= date("Y-m-d",$user['birth']); ?>" type="date">
									</p>

									<p>
										<label for="localisation">Localisation:</label>
										<input type="text" name="localisation" id="localisation" value="<?php echo $user['localisation']; ?>" placeholder="Ex: Paris (75), France" />
									</p>

									<p>
										<label for="steam">Steam:</label>
										<input type="text" name="steam" id="steam" value="<?php echo $user['steam']; ?>" placeholder="Mon Steam ID" />
									</p>

									<p>
										<label for="origin">Origin:</label>
										<input type="text" name="origin" id="origin" value="<?php echo $user['origin']; ?>" placeholder="Mon pseudonyme Origin" />
									</p>

									<p>
										<label for="uplay">Uplay:</label>
										<input type="text" name="uplay" id="uplay" value="<?php echo $user['uplay']; ?>" placeholder="Mon pseudonyme Uplay" />
									</p>

									<p>
										<label for="twitch">Twitch:</label>
										<input type="text" name="twitch" id="twitch" value="<?php echo $user['twitch']; ?>" placeholder="Mon pseudonyme Twitch" />
									</p>

									<p>
										<label for="battlenet">Battle.net:</label>
										<input type="text" name="battlenet" id="battlenet" value="<?php echo $user['battlenet']; ?>" placeholder="Mon Battletag" />
									</p>

									<p>
										<label for="lolid">LoL:</label>
										<input type="text" name="lolid" id="lolid" value="<?php echo $user['lolid']; ?>" placeholder="Mon nom d'invocateur" />
									</p>

									<p>
										<label for="epicgame">Epic Game:</label>
										<input type="text" name="epicgame" id="epicgame" value="<?php echo $user['epicgame']; ?>" placeholder="Mon pseudonyme EG" />
									</p>

									<p class="form-footer">
										<input type="submit" name="login_submit" id="login_submit" value="Modifier mes infos">
									</p>

								</form>
							</div>
							<div class="clear-float"></div>
						</div>
						<div class="clear-float"></div>
					</div>

				</div>
			</div>

			<div class="clear-float"></div>
		</div>

	</div>
	
	<div class="clear-float"></div>
	
</div>
<?php endforeach; ?>