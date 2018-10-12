<!-- BEGIN. DERNIERS ARTICLES STAFF -->
<h2><span>Derniers articles de l'équipe</span></h2>
<div class="content-padding">
	<!-- BEGIN. PARTIE GAUCHE -->
	<?php
	$last_articles_staff = $db->query("SELECT * FROM threads WHERE fid = 3 ORDER BY `tid` DESC LIMIT 1");
	foreach($last_articles_staff as $last_articles)
	{
		$get_subject_preview = $db->query("SELECT * FROM posts WHERE pid = ".$last_articles['firstpost']."");
		foreach($get_subject_preview as $preview)
		{
			if ($last_articles['threadimage'] == "")
			{
				$last_articles['threadimage'] = "assets/images/photos/image-9.jpg";
			}
			$split = ''.substr($preview['message'], 0, 180).' ...';
			echo '
			<div class="home-article left">
				<span class="article-image-out">
					<span class="image-comments"><span title="'.$last_articles['replies'].' réponse(s) à ce sujet">'.$last_articles['replies'].'</span></span>
					<span class="article-image">
						<span class="nth1 strike-tooltip" title="Lire l\'article">
							<a href="'.$forumpath.'showthread.php?tid='.$last_articles['tid'].'"><i class="fa fa-eye"></i></a>
						</span>
						<span class="nth2 strike-tooltip" title="Lire plus tard">
							<a href="#"><i class="fa fa-plus"></i></a>
						</span>
						<a href="'.$forumpath.'showthread.php?tid='.$last_articles['tid'].'">
							<img src="'.$last_articles['threadimage'].'" alt="" title="" />
						</a>
					</span>
				</span>
				<h3><a href="forum/showthread.php?tid='.$last_articles['tid'].'">'.$last_articles['subject'].'</a></h3>
				<p>'.decode_blank($split).'</p>
				<div>
					<a href="forum/showthread.php?tid='.$last_articles['tid'].'" class="defbutton"><i class="fa fa-reply"></i>Voir l\'article</a>
				</div>
			</div>
			';
		}
	}
	?>
	<!-- END. PARTIE GAUCHE -->
	
	<!-- BEGIN. PARTIE DROITE -->
	<div class="home-article right">
		<ul>
			<?php
			$articles_staff = $db->query("SELECT * FROM threads WHERE fid = 3 ORDER BY `tid` DESC LIMIT 1,6");
			foreach($articles_staff as $articles)
			{
				$get_subject_preview = $db->query("SELECT * FROM posts WHERE pid = ".$articles['firstpost']."");
				foreach($get_subject_preview as $preview)
				{
					$rand = rand(13, 29);
					if ($last_articles['threadimage'] == "")
					{
						$articles['threadimage'] = "assets/images/photos/image-".$rand.".jpg";
					}
					$split = ''.substr($preview['message'], 0, 45).' ...';
					echo '
					<li>
						<a href="'.$forumpath.'showthread.php?tid='.$articles['tid'].'">
							<span class="image-comments"><span>'.$articles['replies'].'</span></span>
							<img src="'.$articles['threadimage'].'" alt="" title="" />
							<strong>'.decode_blank($articles['subject']).'</strong>
							<span class="a-txt">'.$split.'</span>
						</a>
					</li>
					';
				}
			}
			?>
		</ul>

		<div>
			<a href="#" class="defbutton"><i class="fa fa-reply"></i>Voir plus d'articles</a>
		</div>
		
	</div>
	<!-- END. PARTIE DROITE -->
	<div class="clear-float"></div>
</div>
<!-- END. DERNIERS ARTICLES STAFF -->