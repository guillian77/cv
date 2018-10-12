<h2><span>Events à venir</span></h2>
<div class="content-padding">
	
	<div class="panel-games-lobby full-page">
		<ol>
			<?php
			// On enregistre la date actuelle
			$actual_date =  gmmktime();
			
			// On recherche les events avec une date posterieure la date actuelle
			$upcoming_events = $db->query("SELECT * FROM events WHERE starttime > ".$actual_date." ORDER BY starttime ASC LIMIT 6");
			foreach($upcoming_events as $events)
			{
				calculTimeLeft($events['starttime']);
				
				// Affichage du temps restant avant l'event
				if ($d_restants == 0) {
					$timeLeft = $i_restantes.' heure(s)';
				} else {
					$timeLeft = $d_restants.' jour(s)';
				}
				
				echo '
				<li>
					<div class="lobby-block" style="background:url('.$events['image'].') no-repeat center;">
						<span class="caption">'.$events['name'].'</span>
						<div class="join-button">
							<a href="calendar.php?action=event&eid='.$events['eid'].'" target="_blank">Voir page de l\'event</a>
						</div>
					</div>
					<div class="lobby-info">
						<span class="right">'.gmdate("d.M Y", $events['starttime']).'</span>
						<span class="left"><b rel="1428482400">Dans '.$timeLeft.'</span></b>
						<div class="clear-float"></div>
					</div>
				</li>
				';
				
				// Calcul du nombre d'event
				$event_count++;
			}
			
			if(!$events['eid'])
			{
				echo '<p>Il n\'y a pas d\'event à venir.</p>';
			}
			?>
		</ol>
		<div class="clear-float"></div>
	</div>
	
	<a href="calendar.php" class="defbutton"><i class="fa fa-calendar"></i>Voir tous les events</a>
	
	
</div>