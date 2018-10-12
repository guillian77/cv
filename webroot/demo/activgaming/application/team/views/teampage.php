<div id="main-box">
	<div id="main">
		<h2><span><? $tinfo['tname']; ?> - équipes e-sport</span></h2>
		<style type="text/css">
			#lol-map {
				min-height: 500px;
				max-height: 500px;
				width: 100%;
				background-image: url('assets/images/lol_map.jpg');
				background-position: center;
				background-size: cover;
				overflow: hidden;
				border: 4px solid #0a0a0a;
			}

			#post {
				position: relative;
				left: 4px;
				top: -504px;
			}

			.player-box {
				display: block;
				max-width: 110px;
				background-color: #01070d;
				color: #f1f1f1;
				padding: 5px 15px;
				border: 1.5px solid #dbb059;
				opacity: 0.95;
				transition: 0.4s;
			}

			.player-box:hover {
				opacity: 1;
				cursor: pointer;
			}

			.player-post {
				display: block;
				text-transform: uppercase;
			}

			.player-name {
				display: block;
			}

			#top {
				position: absolute;
				top: 20px;
				left: 20px;
			}
			#jungler {
				position: absolute;
				top: 180px;
				left: 120px;
			}
			#mid {
				position: absolute;
				top: 200px;
				left: 290px;
			}
			#support {
				position: absolute;
				top: 420px;
				left: 400px;
			}
			#adc {
				position: absolute;
				top: 420px;
				left: 520px;
			}
		</style>

		<div class="content-padding">
			<h3>Disposition de l'équipe</h3>
			<div id="lol-map"></div>
			<div id="post">
				<?php foreach($teamusers as $teamuser): ?>
					<a href="?page=user&view=profil&uid=<?= $teamuser['uid']; ?>" class="player-box" id="<?= $teamuser['post']; ?>" title="Voir le profil">
						<span class="player-post"><?= $teamuser['post']; ?>:</span>
						<span class="player-name"><?= $teamuser['username']; ?></span>
					</a>
				<?php endforeach; ?>
			</div>
			<br/>
			<p><a href="#" class="button">Demander un match</a></p>
			<br/>
			<h3>Présentation de l'équipe</h3>
			<p><?= $tinfo['tpresentation']; ?></p>
		</div>
	</div>
	<aside id="sidebar">
		<?php require_once'application/side/controllers/side.php'; ?>
	</aside>
	<div class="clear-float"></div>
</div>