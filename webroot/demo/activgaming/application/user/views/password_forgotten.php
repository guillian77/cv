<div id="main-box" class="full-width">
				
<div id="main">
	<div class="signup-panel">

		<div class="left">
			<h2><span>Mot de passe oublié</span></h2>
			<div class="content-padding">
				<p>Pensez à verifier vos spams si vous n'avez pas reçu l'email.</p>

				<?php if($password_changed): ?>
					<span class="the-success-msg"><i class="fa fa-check"></i>Mot de passe changé avec succès !<br/>Un email à été envoyé à l'adresse spécifié.<br/>L'envoi peut mettre du temps et veuillez vérifier vos spams.</span>
				<?php endif; ?>

				<div class="the-form" style="margin-top:40px;">

					<form action="?page=user&view=password_forgotten&name=Mot de passe oublié" method="post">
						<p>
							<label for="login_username">Nom d'utilisateur:</label>
							<input type="text" name="username" id="login_username" placeholder="Nom d'utilisateur" />
						</p>

						<p>
							<label for="login_password">E-mail:</label>
							<input type="text" name="email" id="email" placeholder="Email" />
						</p>

						<p>

						<p class="form-footer">
							<input type="submit" name="login_submit" id="login_submit" value="Réinitialiser" />
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
							<i class="fa fa-picture-o"></i>
							<b>Galerie d'image</b>
							<p class="p-padding">
							Nous disposons de notre propre galerie d'image afin que les membres puissent laisser une trace.
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
							<i class="fa fa-microphone"></i>
							<b>Teamspeak</b>
							<p class="p-padding">
							Le serveur vocal Teamspeak 3 vous permettra de discuter avec les membres de la communauté.
							</p>
						</li>
						
						<li>
							<i class="fa fa-comments"></i>
							<b>Forum</b>
							<p class="p-padding">
							Le forum est un un excellent moyen de communiquer et d'apprendre des autres membres, ou même de se tenir au courant des dernières actus.
							</p>
						</li>
					</ul>
					
				</div>
				
			</div>
		</div>

		<div class="clear-float"></div>
	</div>
	
</div>