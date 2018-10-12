<div id="main-box">
	<div id="main">
		<?php if(isset($_SESSION['is_admin']) >= 50): ?>
			<div class="content-padding">
				<a href="?page=blog&view=create&name=Créer un nouveau sujet" class="defbutton"><i class="fa fa-comment-o"></i>Créer un article</a>
			</div>
		<?php endif; ?>

		<?php if($_GET['numpage'] < 2): ?>
		<h2><span>Articles épinglés</span></h2>
			<div class="content-padding">
				<div class="forum-description">
					<p>Retrouvez sur cette page toutes les nouvelles à propos de la communauté et de ses activités.<br/>N'hésitez pas à commenter les articles afin de nous donner votre avis.</p>
				</div>
			</div>

			<div class="content-padding">
				<?php foreach($pinned_articles as $pinned): ?>
					<div class="article-promo">
							<div class="article-photo">
								<span class="article-image-out">
									<span class="article-prefix"><?= $pinned['c_title']; ?></span>
									<span class="image-comments"><span><?= getNbrComment($pinned['a_id'], 1); ?></span></span>

								<span class="article-image">
									<span class="nth1 strike-tooltip" title="Lire l'article">
										<a href="?page=blog&view=article&name=<?= limitSize($pinned['a_title'], 25); ?>&id=<?= $pinned['a_id']; ?>"><i class="fa fa-eye"></i></a>
									</span>
									<span class="nth2 strike-tooltip" title="Regarder + tard">
										<a href="#"><i class="fa fa-plus"></i></a>
									</span>
									<a href="?page=blog&view=article&name=<?= limitSize($pinned['a_title'], 30); ?>&id=<?= $pinned['a_id']; ?>"><img widht="301" height="187" src="<?= $pinned['a_banner']; ?>" alt="" title="" /></a>
								</span>
							</span>
						</div>
						
						<div class="article-content" style="min-height: 210px;">
							
							<h3><a href="?page=blog&view=article&name=<?= limitSize($pinned['a_title'], 30); ?>&id=<?= $pinned['a_id']; ?>"><?= limitSize($pinned['a_title'], 30); ?></a></h3>

							<div class="article-icons">
								<a href="?page=user&view=profil&uid=<?= $pinned['uid']; ?>"><i class="fa fa-fire"></i><?= $pinned['username']; ?></a>
								<a href="?page=blog&view=article&name=<?= limitSize($post['a_title'], 25); ?>&id=<?= $pinned['a_id']; ?>"><i class="fa fa-eye"></i><?= $pinned['a_view']; ?> vue(s)</a>
							</div>

							
							<p><?= deleteCode(limitSize($pinned['a_content'], 180)); ?></p>
							<a href="?page=blog&view=article&name=<?= limitSize($pinned['a_title'], 30); ?>&id=<?= $pinned['a_id']; ?>" class="defbutton"><i class="fa fa-reply"></i>Lire l'article</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<h2><span>Derniers Articles</span></h2>

		<div class="content-padding">
			<?php foreach($articles as $post): ?>
				<div class="article-promo">
					<div class="article-photo">
						<span class="article-image-out">
							<span class="article-prefix"><?= $post['c_title']; ?></span>
							<span class="image-comments"><span><?= getNbrComment($post['a_id'], 1); ?></span></span>
							<span class="article-image">
								<span class="nth1 strike-tooltip" title="Lire l'article">
									<a href="?page=blog&view=article&name=<?= limitSize($post['a_title'], 25); ?>&id=<?= $post['a_id']; ?>"><i class="fa fa-eye"></i></a>
								</span>
								<span class="nth2 strike-tooltip" title="Regarder + tard">
									<a href="#"><i class="fa fa-plus"></i></a>
								</span>
								<a href="?page=blog&view=article&name=<?= limitSize($post['a_title'], 30); ?>&id=<?= $post['a_id']; ?>"><img widht="301" height="187" src="<?= $post['a_banner']; ?>" alt="" title="" /></a>
							</span>
						</span>
					</div>
					
					<div class="article-content" style="min-height: 210px;">
						<h3><a href="?page=blog&view=article&name=<?= limitSize($post['a_title'], 30); ?>&id=<?= $post['a_id']; ?>"><?= limitSize($post['a_title'], 30); ?></a></h3>
						<div class="article-icons">
							<a href="?page=user&view=profil&uid=<?= $post['a_author']; ?>"><i class="fa fa-fire"></i><?= $post['username']; ?></a>
							<i class="fa fa-eye"></i> <?= $post['a_view']; ?> vue(s)
							<i class="fa fa-calendar"></i> <?= getShortDate($post['a_date']); ?>
						</div>
						<p><?= deleteCode(limitSize($post['a_content'], 180)); ?></p>
						<a href="?page=blog&view=article&name=<?= limitSize($post['a_title'], 30); ?>&id=<?= $post['a_id']; ?>" class="defbutton"><i class="fa fa-reply"></i>Lire l'article</a>
					</div>
				</div>
			<?php endforeach; ?>

			<div class="clear-float do-the-split"></div>

			<div class="pagination">
				<?php for ($i = 1; $i <= $nbsearch; $i++): ?>
					<a href ="?page=blog&name=Derniers%20Articles&numpage=<?= $i; ?>" class="page-num <?php if($_GET['numpage'] == $i): ?>current<?php endif; ?>"><?= $i; ?></a>
				<?php endfor; ?>
			</div>			
		</div>
	</div>
	
	<aside id="sidebar">
		<?php require_once'application/side/controllers/side.php'; ?>
	</aside>
	
	<div class="clear-float"></div>
	
</div>