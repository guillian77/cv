<div id="main-box">
	<div id="main">
		<?php foreach($events as $event): ?>
			<h2><span>Event Activ Gaming</span></h2>

			<div class="content-padding">
				<div class="forum-description">
					<a href="?page=event&name=Évènements%20à%20venir" class="defbutton"><i class="fa fa-arrow-left"></i>Retour à la liste des events</a>

					<?php if($_SESSION['is_admin']): ?>
						<a href="?page=event&view=edit&eid=<?= $event['event_id']; ?>&name=<?= $event['event_title']; ?>" class="defbutton"><i class="fa fa-pencil-square-o"></i>Editer cet event</a>
						<a href="?page=event&action=delete&eid=<?= $event['event_id']; ?>" class="defbutton" style="background-color: #c22828; color: #fafafa;"><i class="fa fa-ban"></i>Supprimer cet event</a>
					<?php endif; ?>
				</div>


				<div class="article-full">
				
					<div class="clear-float do-the-split"></div>
					
					<div class="event-header">
						<div class="item-head">
							<a href="#" class="event-icon"><strong><?= getDayNum($event['event_date']); ?></strong><span><?= getMonth($event['event_date']); ?></span></a>
						</div>
						<div class="item-top">
							<h3><a href="#"><?= $event['event_title']; ?></a></h3>
							<strong class="post-a"><i class="fa fa-clock-o"></i><strong><?= getHour($event['event_time']); ?></strong></strong>
							<span class="post-a"><i class="fa fa-map-marker"></i><?= $event['event_location']; ?></span>
							<a href="#" class="post-a"><i class="fa fa-comment-o"></i><?= $nbrcomments; ?> commentaire(s)</a>
						</div>
					</div>
				
					<div class="clear-float do-the-split"></div>

					<div class="article-content">
						<p><?= $event['event_description']; ?></p>
					</div>
				</div>
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
									<a class="comment-reply-link post-a" href="#"><i class="fa fa-trash-o"></i><strong>Supprimer</strong></a>
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
							<form action="?<?= $_SERVER['QUERY_STRING']; ?>" method="post" id="commentform" class="comment-form">
								<p class="comment-notes">Vous pouvez laisser un commentaire sur cet article: <span class="required"></span></p>
								
								<p class="form-comment">
									<label for="comment">Commentaire:<span class="required">*</span></label>
									<textarea id="comment" name="comment" type="text" aria-required="true" placeholder="Contenu du commentaire"></textarea>
								</p>

								<p class="form-submit">
									<input type="hidden" name="article_id" value="<?= $_GET['id']; ?>" id="comment_post_ID" class="button">
									<input name="submit" type="submit" id="submit" value="Envoyer le commentaire" class="button">
								</p>
							</form>
						</div>
					</div>

				<?php else: ?>
					<p>Vous pouvez commenter cet event si vous vous connectez !</p>
				<?php endif; ?>

			</div>

		<!-- END .content-padding -->
		</div>

		
	<!-- END #main -->
	</div>

	<!-- BEGIN #sidebar -->
	<aside id="sidebar">
		<?php require_once'application/side/controllers/side.php'; ?>
	</aside>
	
	<div class="clear-float"></div>
	
</div>