<div id="main-box" class="full-width">
	<!-- BEGIN #main -->
	<div id="main">
		
		<h2><span>Coatching</span></h2>
		<div class="content-padding">

			<p>Activ Gaming vous permet d'améliorer votre niveau sur les jeux auxquels nous jouons.</p>
			<p>Avec notre système de <strong>coatching</strong> vous pouvez bénéficier gratuitement d'un apprentissage individuel ou pour votre équipe.</p>
			<p>N'hésitez pas à contacter l'un de nos coatchs pour obtenir un crénaux !</p>
		</div>

		<div class="content-padding">
			<div class="staff-block">
				<?php foreach($coatchs as $coatch): ?>
					<div class="item">
						<a href="?page=user&view=profil&uid=<?= $coatch['uid']; ?>"><img src="<?= $coatch['avatar']; ?>" class="item-photo" alt=""></a>
						<div class="item-content">
							<h3><a href="?page=user&view=profil&uid=<?= $coatch['uid']; ?>"><?= $coatch['username']; ?></a><span><?= $coatch['title']; ?></span></h3>
							
							<p><?= substr($coatch['biographie'], 0, 180); ?></p>
							<hr/>
							<p><a href="?page=message&action=create&username=<?= $coatch['username']; ?>&reason=Je cherche un coach&name=Nouvelle Conversation" class="button">Contacter ce coatch</a></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>