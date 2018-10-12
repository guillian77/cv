<div id="main-box" class="full-width">
					
	<div id="main">
		<div class="signup-panel">

			<div class="left">
				<h2><span>S'enregistrer</span></h2>
				<div class="content-padding">
					<p class="p-padding">Laisse ta vie sociale de côté et viens passer des heures de folie chez nous.
					Parce que içi tu te sens comme à la maison.
					C'est la communauté multigaming PC francophone du moment !</p>

					<?php if($registered): ?>
					<span class="the-success-msg"><i class="fa fa-check"></i>Vous êtes maintenant enregistré .<br/>Vous pouvez maintenant vous connecter sur la <a href="?page=user&view=login&name=Se%20connecter">page de connection</span>
					<?php else: ?>
					
					<?php if ($errors): ?>
					<p><span class="the-alert-msg"><i class="fa fa-warning"></i><?= $errors; ?></span></p>
					<?php endif; ?>
					
					<div class="the-form">
						<form action="?page=user&view=register&action=do_register&name=S%27enregistrer" method="post">

							<p>
								<label for="signup_username">Nom d'utilisateur:<span class="required">*</span></label>
								<input type="text" name="username" id="signup_username" value="<?= $username; ?>" placeholder="Nom d'utilisateur" />
							</p>
							
							<p>
								<label for="signup_email">E-mail:<span class="required">*</span></label>
								<input type="text" name="email" id="signup_email" value="<?= $email; ?>" placeholder="Email" />
							</p>

							<p>
								<label for="signup_email">Confirmer E-mail:<span class="required">*</span></label>
								<input type="text" name="confrim_email" id="signup_email" value="<?= $confrim_email; ?>" placeholder="Confirmez l'email" />
							</p>

							<p>
								<label for="password">Mot de passe:<span class="required">*</span></label>
								<input type="password" name="password" id="password" value="<?= $password; ?>" placeholder="Mot de passe" />
							</p>

							<p>
								<label for="confirm_password">Répéter:<span class="required">*</span></label>
								<input type="password" name="confirm_password" id="confirm_password" value="<?= $confirm_password; ?>" placeholder="Retapez le mot de passe" />
							</p>

							<div class="breaking-line"></div>

							<p class="form-footer">
								<input type="submit" name="regsubmit" id="signup_submit" value="S'enregistrer" />
							</p>

							<p>
								<span class="info-msg">Si vous avez déjà un compte <a href="?page=user&view=login&name=Connexion">connectez vous</a> s'il vous plaît !</span>
							</p>
						</form>
					</div>
					<?php endif; ?>

				</div>
			</div>

			<div class="right">
					<h2><span>Qui sommes nous ?</span></h2>
					<div class="content-padding">
						
						<div class="form-split-about">
							<p class="p-padding">
							Nous sommes une jeune communauté multigaming voulant créer un lieu de regroupement pour les joueurs PC aimant jouer en groupe.
							</p>

							<ul>
								<li>
									<i class="fa fa-microphone"></i>
									<b>Teampseak</b>
									<p class="p-padding">
									Le serveur vocal Teampseak vous permettra de discuter avec les membres de la communauté et de trouver vos futurs coéquipiers.
									</p>
								</li>
								
								<li>
									<i class="fa fa-comments"></i>
									<b>Articles</b>
									<p class="p-padding">
									Le blog est un un excellent moyen de communiquer et d'apprendre des autres membres, ou même de se tenir au courant des dernières actus.
									</p>
								</li>

								<li>
									<i class="fa fa-trophy"></i>
									<b>Hauts faits</b>
									<p class="p-padding">
									Le système de hauts faits vous permettra que vous êtes un membre très actif sur le site.
									</p>
								</li>

								<li>
									<i class="fa fa-picture-o"></i>
									<b>Galerie d'image</b>
									<p class="p-padding">
									Nous disposons de notre propre galerie d'image afin que les membres puissent laisser une trace.
									</p>
								</li>
							</ul>
							
					</div>
						
					</div>
				</div>

			<div class="clear-float"></div>
		</div>
		
	</div>

	<div class="clear-float"></div>

</div>