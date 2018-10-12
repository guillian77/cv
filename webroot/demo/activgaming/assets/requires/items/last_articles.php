<h2><span>Derniers Sujets</span></h2>
<div class="content-padding">
	<div class="grid-articles">
		
		<?php
		
		// Rechercher les derniers messages
		$last_articles = $db->query("SELECT * FROM posts WHERE replyto = 0 ORDER BY `tid` DESC LIMIT 6");
		foreach($last_articles as $last_article)
		{
			$split = ''.substr($last_article['message'], 0, 160).' ...';
			echo '
			<!-- BEGIN .item -->
			<div class="item">
				
				<span class="article-image-out">
					<span class="image-comments"><span>21</span></span>
					<span class="article-image">
						<span class="nth1 strike-tooltip" title="Lire l\'article">
							<a href="post.html"><i class="fa fa-eye"></i></a>
						</span>
						<span class="nth2 strike-tooltip" title="Lire plus tard">
							<a href="#"><i class="fa fa-plus"></i></a>
						</span>
						<a href="?page=post&uid='.$last_article['uid'].'&pid='.$last_article['pid'].'"><img src="assets/images/photos/image-25.jpg" alt="" title="" /></a>
					</span>
				</span>
				<h3><a href="?page=post">'.decode_blank($last_article['subject']).'</a></h3>
				<p>'.decode_blank($split).'</p>
				<div>
					<a href="post.html" class="defbutton"><i class="fa fa-reply"></i>Lire l\'article</a>
				</div>

			<!-- END .item -->
			</div>
			';
		}
		?>
	</div>
</div>