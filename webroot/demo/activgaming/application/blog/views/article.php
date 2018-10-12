<div id="main-box">
	
	<!-- BEGIN #main -->
	<div id="main">
		
		<?php foreach($articles as $post): ?>
		<h2><span><?= $post['a_title']; ?></span></h2>

		<div class="content-padding">
			<div class="forum-description">
				<a href="?page=blog&name=Derniers%20Articles" class="defbutton"><i class="fa fa-arrow-left"></i>Retour à la liste des articles</a>
				
				<?php if($_SESSION['is_admin']): ?>
					<a href="?page=blog&view=edit&name=Editer cet article&id=<?= $_GET['id']; ?>" class="defbutton"><i class="fa fa-pencil-square-o"></i>Editer cet article</a>
					<a href="?page=blog&view=delete&name=Supprimer&id=<?= $post['a_id']; ?>" class="defbutton" style="background-color: #c22828; color: #fafafa;"><i class="fa fa-ban"></i>Supprimer cet article</a>
				<?php endif; ?>
			</div>
		</div>

		<div class="content-padding">

			<div class="article-full">
				<div class="article-main-photo">
					<img height="300" width="644" src="<?= $post['a_banner']; ?>" alt="" title="" />
				</div>
				<div class="article-icons">
					<a href="?page=user&view=profil&uid=<?= $post['uid']; ?>"><i class="fa fa-fire"></i><?= $post['username']; ?></a>
					<span><i class="fa fa-calendar"></i>   <?= getShortDate($post['a_date']); ?></span>
					<span><i class="fa fa-eye"></i>   <?= $post['a_view']; ?> vue(s)</span>
				</div>
			
				<div class="clear-float do-the-split"></div>

				<div class="article-content">
					<p><?= $post['a_content']; ?></p>
				</div>
			</div>
			
			<!-- <div class="clear-float do-the-split"></div> -->
			
			<!-- BEGIN .article-footer -->
			<div class="article-footer">
				<div class="about-author">
					
					<h2><span>à propos de l'auteur</span></h2>

					<div class="inner">
						<a href="?page=user&view=profil&uid=<?= $post['uid']; ?>" class="avatar avatar-large">
							<img src="<?= $post['avatar']; ?>" width="90px" height="90px" alt="" class="author-image setborder" />
						</a>
						<div class="side">
							<div class="about-head">
								<a href="?page=user&view=profil&uid=<?= $post['uid']; ?>" class="comment-user"><b><?= $post['username']; ?></b></a>
							</div>
							<i><?= $post['title']; ?></i>
							<a href="#"><i class="fa fa-pencil"></i><?= $post['comments']; ?> commentaire(s)</a>
							<a href="#"><i class="fa fa-comment"></i>102 Articles</a>
						</div>
					</div>

				</div>

				<div class="similar-posts">					
					<h2><span>Articles Similaires</span></h2>
					
					<div class="home-article right">
						<ul>
							<?php foreach($similars as $similar): ?>
								<li>
									<a href="?page=blog&view=article&name=<?= $similar['a_title']; ?>&id=<?= $similar['a_id']; ?>">
										<span class="image-comments"><span>21</span></span>
										<img src="<?= $similar['a_banner']; ?>" width="89px" height="55px" alt="" title="">
										<strong><?= mb_substr($similar['a_title'],0,26); ?>..</strong>
										<span class="a-txt">Catégorie: <?= $similar['c_title']; ?></span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>						
					</div>

				</div>

				<div class="clear-float"></div>
			<!-- END .article-footer -->
			</div>

		<!-- END .content-padding -->
		</div>
		<?php endforeach; ?>
		

		<h2 id="commentaire"><span>Commentaires (<?= $nbrcomments; ?>)</span></h2>
		<!-- BEGIN .content-padding -->
		<div class="content-padding">
			
			<div class="comment-part">

				<!-- BEGIN #comments -->
				<ol id="comments">
					<?php foreach($comments as $reponse): ?>
						<li id="<?= $reponse['c_id']; ?>">
							<div class="comment-inner">
								<div class="comment-avatar">
									<img src="<?= $reponse['avatar']; ?>" alt="Avatar <?= $reponse['username']; ?>">
								</div>
								<div class="comment-content">
									<div class="comment-header">
										<h3><a href="?page=user&view=profil&uid=<?= $reponse['c_author']; ?>"><?= $reponse['username']; ?></a></h3>
									</div>
									
									<p><?= $reponse['c_content']; ?></p>

									<?php if($_SESSION['is_admin']): ?>
										<a class="comment-reply-link post-a" href="#"><i class="fa fa-trash-o"></i><strong>Supprimer</strong></a>
									<?php endif; ?>

									<span class="post-a"><i class="fa fa-calendar-o"></i> <?= $reponse['c_date']; ?></span>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
				<!-- #comment-## -->
				</ol>
				<div class="comments-pager"></div>

				<?php if($_SESSION['uid']): ?>
					<div class="comment-form">
						<a href="#" name="respond"></a>
						<div id="respond" class="comment-respond">
							<h3 id="reply-title" class="comment-reply-title"> <small><a rel="nofollow" id="cancel-comment-reply-link" href="/integer-nam-varius/#respond" style="display:none;">Annuler la réponse</a></small></h3>
							<form action="?<?= $_SERVER['QUERY_STRING']; ?>#commentaire" method="post" id="commentform" class="comment-form">
								<p class="comment-notes">Vous pouvez laisser un commentaire sur cet article: <span class="required"></span></p>
								
								<p class="form-comment">
									<label for="comment">Commentaire:<span class="required">*</span></label>
									<textarea name="comment" type="text" aria-required="true" placeholder="Contenu du commentaire"></textarea>
								</p>

								<p class="form-submit">
									<input name="submit" type="submit" id="submit" value="Envoyer le commentaire" class="button">
								</p>
							</form>
						</div>
					</div>

				<?php else: ?>
					<p>Vous pouvez commenter cet article si vous vous connectez !</p>
				<?php endif; ?>

			</div>

		<!-- END .content-padding -->
		</div>

		
	</div>
	
	<aside id="sidebar">
		<?php require_once'application/side/controllers/side.php'; ?>
	</aside>

	<div class="clear-float"></div>
</div>