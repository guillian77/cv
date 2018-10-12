<div id="main-box">
	<div id="main">
		<?php

		require_once'application/home/models/home.php';

		#########
		# EVENT #
		#########
		getEvent("", $conf['limit']['event']);
		require_once'application/home/views/events.php';

		########
		# NEWS #
		########
		require_once'application/blog/models/blog.php';
		getArticle('', $conf['limit']['article']);
		require_once'application/home/views/news.php';

		################
		# PRESENTATION #
		################
		require_once'application/home/views/presentation.php';

		?>
	</div>
	
	<!-- BEGIN #sidebar -->
	<aside id="sidebar" style="min-height: 1497px;">
		<?php require_once'application/side/controllers/side.php'; ?>
		<div class="clear-float"></div>
	</aside>

	<div class="clear-float"></div>
</div>

<div class="clear-float"></div>