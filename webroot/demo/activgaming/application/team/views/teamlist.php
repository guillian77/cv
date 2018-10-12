<div id="main-box">
	<div id="main">
		<h2><span>équipes e-sport</span></h2>
		<div class="content-padding">
			<?php if(!empty($_SESSION['uid'])): ?>
				<p><a href="?page=team&view=create&name=Créer%20une%20équipe" class="defbutton"><i class="fa fa-link"></i>Créer une équipe</a></p>
			<?php endif; ?>
			
			<div class="staff-block">
				<?php foreach ($teams as $team): ?>
					<div class="item" style="width: 100%;">
						<a href="?page=team&view=teampage&tid=<?= $team['tid']; ?>&name=<?= $team['tname']; ?>"><img src="<?= $team['timage']; ?>" class="item-photo" alt="" /></a>
						<div class="item-content">
							<h3><a href="?page=team&view=teampage&tid=<?= $team['tid']; ?>&name=<?= $team['tname']; ?>"><?= $team['tname']; ?><span>League of Legends</span></a></h3>
							<p><?= limitSize($team['tpresentation'], 260); ?></p>
						</div>
					</div>
					<br/>
				<?php endforeach ?>
			</div>
		</div>
	</div>

	<aside id="sidebar">
	<?php require_once'application/side/controllers/side.php'; ?>
	</aside>

	<div class="clear-float"></div>
</div>