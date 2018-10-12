<div class="panel">
	<h2>Navigation</h2>
	<div class="panel-content">
		
		<div class="sidebarmenu">
			<a href="?page=home"><i class="fa fa-home"></i>&nbsp; Accueil</a>

			<a href="?page=vocal&action=teamspeak&name=Teamspeak%203"><i class="fa fa-microphone"></i>&nbsp; Teamspeak 3 <i>(vocal)</i></a>

			<a href="?page=shop&name=Boutique"><i class="fa fa-shopping-cart"></i>&nbsp; Boutique</a>

			<a href="?page=blog&name=Derniers Articles"><i class="fa fa-newspaper-o"></i>&nbsp; News</a>

			<a href="?page=event&name=Tournois"><i class="fa fa-trophy"></i>&nbsp; Tournois à venir</a>

			<!-- <a href="?page=award&name=Trophées"><i class="fa fa-trophy"></i>&nbsp; Trophées et récompenses</a> -->

			<a href="?page=home#presentation"><i class="fa fa-users"></i>&nbsp; Présentation la communauté</a>

			<a href="?page=rules&name=R%C3%A8glement"><i class="fa fa-gavel"></i>&nbsp; Règlement</a>

			<a href="?page=support&name=Support"><i class="fa fa-bell-o"></i>&nbsp; J'ai besoin d'aide</a>
			<?php if($_SESSION['is_admin']): ?>
				<a href="http://admin.activ-gaming.com"><i class="fa fa-user-secret"></i>&nbsp; Mode administration</a>
			<?php endif; ?>
		</div>
	</div>
</div>