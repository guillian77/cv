<style type="text/css">
#planning, {
	padding: 0;
	margin: 0;
}
.planning-day {
	border: 1px solid #c22828;
	border-left: 8px solid #c22828;
	display: flex;
	flex-direction: row;
	margin-bottom: 8px;
	padding: 5px;
}
.day-left {
	font-size: 22px;
	line-height: 22px;
	padding-left: 10px;
	min-width: 11%;
	max-width: 11%;
}
.day-right {
	font-size: 14px;
	line-height: 22px;
	/*padding-left: 10px;*/
}
</style>

<div id="main-box">
	<div id="main">
		<h2><span>Planning de la semaine</span></h2>
		<div class="content-padding">
			<ul id="planning">
				<li class="planning-day">
					<span class="day-left">Lun.<br/>05</span>
					<div class="day-right">
						<h3>After Work: Soirée libre</h3>
						<p>Jouez librement à vos jeux avec les autres membres de la communauté.</p>
					</div>
				</li>

				<li class="planning-day">
					<span class="day-left">Mar.<br/>06</span>
					<div class="day-right">
						<h3>Blind test</h3>
						<p>Connaissez vous vos classiques ?</p>
						<p>Dans quel film ce trouve cet scène ?</p>
					</div>
				</li>

				<li class="planning-day">
					<span class="day-left">Mer.<br/>07</span>
					<div class="day-right">
						<h3>Limite Limite</h3>
						<p>Faîte nous rêvez, bonne humeur garanti !</p>
					</div>
				</li>

				<li class="planning-day">
					<span class="day-left">Jeu.<br/>08</span>
					<div class="day-right">
						<h3>After Work: Soirée libre</h3>
						<p>Jouez librement à vos jeux avec les autres membres de la communauté.</p>
					</div>
				</li>

				<li class="planning-day">
					<span class="day-left">Ven.<br/>09</span>
					<div class="day-right">
						<h3>After Work: Soirée libre</h3>
						<p>Jouez librement à vos jeux avec les autres membres de la communauté.</p>
					</div>
				</li>

				<li class="planning-day">
					<span class="day-left">Sam.<br/>10</span>
					<div class="day-right">
						<h3>Tournoi 1vs1 League of Legends</h3>
						<p>Tournoi amical en 1 contre 1.</p>
						<p>Match à mort individuel avec le champion de votre choix sur l'abîme hurlante. Le premier qui tue l'autre peux passer au match suivant.</p>
					</div>
				</li>

				<li class="planning-day">
					<span class="day-left">Dim.<br/>11</span>
					<div class="day-right">
						<h3>L'équipe se repose</h3>
						<p>Nous faisons nos réserves de chakra pour mieux attaquer la semaine d'après !</p>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div id="sidebar">
		<?php require'application/side/controllers/side.php'; ?>
	</div>

	<div class="clear-float"></div>
</div>