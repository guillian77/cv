<div class="panel">
	<h2>Events à venir</h2>
	<div class="top-right"><a href="?page=event&name=Tournois">Tournois à venir</a></div>
	<div class="panel-content">
		
		<div class="panel-games-lobby">
			<ol>
				<?php foreach($events as $event): ?>
					<li>
						<div class="lobby-block" style="background:url(<?= $event['event_banner']; ?>) no-repeat center;">
							<span class="caption"><?= $event['event_title']; ?></span>
							<div class="join-button">
								<a href="?page=event&view=display&eid=<?= $event['event_id']; ?>&name=Event">En savoir plus</a>
							</div>
						</div>
						<div class="lobby-info">
							<span class="right"><?= getDayNum($event['event_date']); ?>.<?= getMonth($event['event_date']); ?> <?= getYear($event['event_date']); ?>, 
								<?= getHour($event['event_time']); ?></span>
							<span class="left"><b class="countdown-text" rel="1428482400" style="color: rgb(230, 45, 36);">00:00:00:00</b></span>
							<div class="clear-float"></div>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>

	</div>
</div>