<div id="main-box">
	<div id="main">
		
		<h2><span>Tournois</span></h2>
		<div class="content-padding">
			<div class="forum-description">
				<?php if($_SESSION['is_admin']): ?>
					<a href="?page=event&view=create&name=Créer un event" class="defbutton"><i class="fa fa-calendar-plus-o"></i>Créer un event</a>

					<?php if($_GET['action'] == "get-hidden"): ?>
						<a href="?page=event&name=Events cachés" class="defbutton"><i class="fa fa-eye"></i>Voir events visibles</a>
					<?php else: ?>
						<a href="?page=event&action=get-hidden&name=Events cachés" class="defbutton"><i class="fa fa-eye-slash"></i>Voir events cachés</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<div class="event-list">
				
				<?php foreach($events as $event): ?>
					<div class="item">
						<div class="item-head">
							<a href="?page=event&view=display&name=<?= $event['event_title']; ?>&eid=<?= $event['event_id']; ?>" class="event-icon"><strong><?= getDayNum($event['event_date']); ?></strong><span><?= getMonth($event['event_date']); ?></span></a>
						</div>
						<div class="item-top">
							<h3><a href="?page=event&view=display&name=<?= $event['event_title']; ?>&eid=<?= $event['event_id']; ?>"><?= $event['event_title']; ?></a></h3>
							<strong class="post-a"><i class="fa fa-clock-o"></i><strong><?= getHour($event['event_time']); ?></strong></strong>
							<span class="post-a"><i class="fa fa-map-marker"></i><?= $event['event_location']; ?></span>
							<a href="?page=event&view=display&eid=<?= $event['event_id']; ?>" class="post-a"><i class="fa fa-comment-o"></i><?= getNbrComment($event['event_id'], 3); ?> commentaires</a>
						</div>
						<div class="item-bottom">
							<a href="?page=event&view=display&name=<?= $event['event_title']; ?>&eid=<?= $event['event_id']; ?>" class="button invert">Voir détails de l'event</a>
						</div>
					</div>
				<?php endforeach; ?>

			</div>			
		</div>
	</div>

	<aside id="sidebar">
		<?php require_once'application/side/controllers/side.php'; ?>
	</aside>
	
	<div class="clear-float"></div>
	
</div>