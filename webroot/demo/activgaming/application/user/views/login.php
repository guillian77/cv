<div id="main-box" class="full-width">
					
	<div id="main">
		<div class="signup-panel">

			<div class="left">
				<h2><span>Connection</span></h2>
				<div class="content-padding">
					<p class="p-padding">Laisse ta vie sociale de côté et viens passer des heures de folie chez nous.
					Parce que içi tu te sens comme à la maison.
					C'est la communauté multigaming PC francophone du moment !</p>

					<div class="the-form" style="margin-top:40px;">
						
						<?php if ($errors): ?>
							<p><span class="the-error-msg"><i class="fa fa-warning"></i><?= $errors; ?></span></p>
						<?php endif; ?>

						<form action="?page=user&view=login&action=do_login&name=Se connecter" method="post">
							<p>
								<span class="info-msg" style="margin-bottom:40px; background-color: #F5E500;">
									Se connecter en version de démonstration:<br/>
									Nom d'utilisateur: demo<br/>
									Mot de passe: demo
								</span>
							</p>

							<p>
								<label for="login_username">Nom d'utilisateur:</label>
								<input type="text" name="username" id="login_username" value="<?= $username; ?>" placeholder="Nom d'utilisateur" />
							</p>

							<p>
								<label for="login_password">Mot de passe:</label>
								<input type="password" name="password" id="login_password" value="<?= $_POST['password']; ?>" placeholder="Mot de passe" />
							</p>

							<p>
								<label for="">&nbsp;</label>
								<input type="checkbox" name="remember" id="login_remember" placeholder="" />

								<label class="iiiii" for="login_remember">Se souvenir de moi</label>
							</p>

							<p class="form-footer">
								<input type="submit" name="login_submit" id="login_submit" value="Se connecter" />
							</p>

							<p style="margin-top:40px;">
								<span class="info-msg">Si vous n'avez pas de compte, <a href="?page=user&view=register&name=S'enregistrer">enregistrez vous</a> !<br /><br />Mot de passe oublié <a href="?page=user&view=password_forgotten&name=Réinitialiser">cliquez ici</a> et nous allons vous aider à le réinitialiser !</span>
							</p>

						</form>
					</div>

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
								<b>Discord</b>
								<p class="p-padding">
								Le serveur vocal Discord vous permettra de discuter avec les membres de la communauté et de trouver vos futurs coéquipiers.
								</p>
							</li>
							
							<li>
								<i class="fa fa-comments"></i>
								<b>Blog</b>
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
</div>