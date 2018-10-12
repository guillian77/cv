<h2><span>Les actualités</span></h2>
<div class="content-padding">
	<div class="grid-articles">

		<?php foreach($articles as $post): ?>
			<div class="item">
				
				<span class="article-image-out">
					<span class="image-comments"><span><?= getNbrComment($post['a_id'], 1); ?></span></span>
					<span class="article-prefix"><?= $post['c_title']; ?></span>

					<span class="article-image">
						<span class="nth1 strike-tooltip" title="Lire l'article">
							<a href="?page=blog&view=article&name=<?= limitSize($post['a_title'], 25); ?>&id=<?= $post['a_id']; ?>"><i class="fa fa-eye"></i></a>
						</span>
						<span class="nth2 strike-tooltip" title="Regarder + tard">
							<a href="#"><i class="fa fa-plus"></i></a>
						</span>
						<a href="?page=blog&view=article&name=<?= limitSize($post['a_title'], 25); ?>&id=<?= $post['a_id']; ?>"><img width="301px" height="187px" src="<?= $post['a_banner']; ?>" alt="<?= $post['a_title']; ?>" title=""></a>
					</span>
				</span>

				<h3><a href="?page=blog&view=article&id=<?= $post['a_id']; ?>"><?= limitSize($post['a_title'], 50); ?> ...</a></h3>

				<div class="article-icons">
					<a href="?page=user&view=profil&uid=<?= $post['uid']; ?>" class=""><i class="fa fa-fire"></i><?= $post['username']; ?></a>
					<i class="fa fa-eye"></i> <?= $post['a_view']; ?> vue(s)
					<i class="fa fa-calendar"></i> <?= getShortDate($post['a_date']); ?>
				</div>

				<p><?= deleteCode(limitSize($post['a_content'], 180)); ?></p>
				<div>
					<a href="?page=blog&view=article&name=<?= limitSize($post['a_title'], 25); ?>&id=<?= $post['a_id']; ?>" class="defbutton"><i class="fa fa-reply"></i>Lire l'article</a>
				</div>

			<!-- END .item -->
			</div>

		<?php endforeach; ?>

	</div>
</div>