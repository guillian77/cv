<div id="main-box">
	<div id="main">
		<h2><span>Créer une équipes</span></h2>
		<div class="content-padding">
			<p><a href="?page=team&view=teamlist&name=équipes%20e-sport" class="defbutton"><i class="fa fa-arrow-left"></i>Liste des équipes</a></p>

			<?php if(isset($errors) AND $_GET['view'] == "do_create"): ?>
				<div class="info-message" style="background-color: #a24026;">
					<a href="#" class="close-info"><i class="fa fa-times"></i></a>
						<?php foreach($errors as $error): ?>
							<p><strong>Erreur:</strong><?= $error; ?></p>
						<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<form method="POST" action="?page=team&view=do_create">
				<div class="comment-form" style="margin: 0;">
					<p class="form-name">
						<label for="">Nom:<span class="required">*</span></label>
						<input type="text" placeholder="Nom de l'équipe" name="name">
					</p>
					<p class="form-email">
						<label for="">Logo:<span class="required">*</span></label>
						<input type="text" placeholder="URL du logo" name="logo">
					</p>
					<p class="form-comment">
						<label for="">Description:<span class="required">*</span></label>
						<textarea placeholder="Description de votre équipe.." name="description"></textarea>
					</p>
					<p class="form-comment">
						<label for="">Experiences ONLINE:</label>
						<textarea placeholder="Ex: Tournoi Activ Gaming.." name="online"></textarea>
					</p>
					<p class="form-comment">
						<label for="">Experiences OFFLINE:</label>
						<textarea placeholder="Ex: Lyon E-sport.." name="offline"></textarea>
					</p>
					<p class="form-comment">
						<label for="">Status recrutement:</label>
						<select name="recrutement">
							<option>Ouvert</option>
							<option>Fermé</option>
						</select>
					</p>
					<br/>
					<p class="form-submit">
						<input type="submit" class="button" value="Créer l'équipe">
					</p>
				</div>
			</form>
		</div>
	</div>

	<aside id="sidebar">
	<?php require_once'application/side/controllers/side.php'; ?>
	</aside>

	<div class="clear-float"></div>
</div>