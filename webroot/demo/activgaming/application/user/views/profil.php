<div id="main-box" class="full-width">
	
	<div id="main">
		
		<?php foreach($users as $user): ?>
			<div class="user-profile">
				
				<div class="profile-shadow"></div>

				<?php require_once'sidebar.php' ?>

				<div class="profile-right-side">

					<h2><span>En résumé</span></h2>
					<div class="content-padding">

						<div class="info-blocks">
							<ul>
								<li><span class="info-block"><b><i class="fa fa-laptop" aria-hidden="true"></i></b><span>Setup</span></span></li>
								<li><span class="info-block"><b>0h</b><span>Activité</span></span></li>
								<li><span class="info-block"><b><?= $user['comments']; ?></b><span>Commentaires</span></span></li>
								<li><span class="info-block"><b><?= getUserGamecount($_GET['uid']); ?></b><span>Jeux</span></span></li>
								<li><span class="info-block"><b>0</b><span>Trophées</span></span></li>
								<li><span class="info-block"><b>0</b><span>Activ Points</span></span></li>
							</ul>

							<div class="clear-float"></div>
						</div>
						
						<div>
							<div style="width:350px;" class="left">
								<h2 style="margin-left:-30px;"><span>Informations générales</span></h2>
								
								<ul class="profile-info">
									<li>
										<span class="first">Sexe:</span>
										<span class="last"><?= $user['sexe']; ?></span>
									</li>
									<li>
										<span class="first">Anniversaire:</span>
										<span class="last"><?= $user['birthday']; ?></span>
									</li>
									<li>
										<span class="first">Membre depuis:</span>
										<span class="last"><?= date("Y-m-d",$user_info['regdate']); ?></span>
									</li>
									<?php if (!empty($user['steam'])): ?>
										<li>
											<span class="first">Steam:</span>
											<span class="last"><?= $user['steam']; ?></span>
										</li>
									<?php endif; ?>
									<?php if (!empty($user['origin'])): ?>
										<li>
											<span class="first">Origin:</span>
											<span class="last"><?= $user['origin']; ?></span>
										</li>
									<?php endif; ?>
									<?php if (!empty($user['uplay'])): ?>
										<li>
											<span class="first">Uplay:</span>
											<span class="last"><?= $user['uplay']; ?></span>
										</li>
									<?php endif; ?>
									<?php if (!empty($user['lolid'])): ?>
										<li>
											<span class="first">League Of Legend:</span>
											<span class="last"><?= $user['lolid']; ?></span>
										</li>
									<?php endif; ?>
									<?php if (!empty($user['battlenet'])): ?>
										<li>
											<span class="first">Battle.net:</span>
											<span class="last"><?= $user['battlenet']; ?></span>
										</li>
									<?php endif; ?>
									<?php if(!empty($user['epicgame'])): ?>
										<li>
											<span class="first">Epic Game:</span>
											<span class="last"><?= $user['epicgame']; ?></span>
										</li>
									<?php endif; ?>
									<?php if (!empty($user['twitch'])): ?>
										<li>
											<span class="first">Chaîne Twitch:</span>
											<span class="last">
												<?= $user['twitch']; ?>
													<a target="_blank" href="https://www.twitch.tv/<?= $user['twitch']; ?>" class="button" style="background-color: #c22828; color: #fafafa; margin-left: 10px;">Voir</a>
												</span>
										</li>
									<?php endif; ?>
								</ul>

								<div class="clear-float"></div>
							</div>

							<div style="width:300px;" class="right">
								
								<h2 style="margin-left: -30px;"><span>jeux (<?= getUserGamecount($_GET['uid']); ?>)</span></h2>
								
								<ul class="profile-friends-list">
									<?php foreach($games as $game): ?>
										<li>
											<span class="avatar">
												<img src="<?= $game['imgurl']; ?>" width="39px" height="39px" class="setborder" title="" alt="" />
											</span>
										</li>
									<?php endforeach; ?>
								</ul>
								<div class="clear-float"></div>
								
							</div>

							<div class="clear-float"></div>
						</div>
					</div>
					
					<div class="content-padding">
						<div style="width:350px;" class="left">
							<h2 style="margin-left:-30px;"><span>Informations du setup</span></h2>
							
							<ul class="profile-info">
								<li>
									<span class="first">Processeur:</span>
									<span class="last"><?= $user['processor']; ?></span>
								</li>
								<li>
									<span class="first">RAM:</span>
									<span class="last"><?= $user['ram']; ?></span>
								</li>
								<li>
									<span class="first">Stockage:</span>
									<span class="last"><?= $user['stockage']; ?></span>
								</li>
								<li>
									<span class="first">Carte graphique:</span>
									<span class="last"><?= $user['gpu']; ?></span>
								</li>
								<li>
									<span class="first">Carte mère:</span>
									<span class="last"><?= $user['motherboard']; ?></span>
								</li>
								<li>
									<span class="first">Autre:</span>
									<span class="last"><?= $user['freefield']; ?></span>
								</li>
							</ul>

							<div class="clear-float"></div>
						</div>

						<div style="width:300px;" class="right">
							<h2 style="margin-left: -30px;"><span>Photos du setup</span></h2>
							<div class="photo-blocks">
								<ul>
									<?php if ($user['setup_pic_1']): ?>
										<li>
											<a href="<?php echo $user['setup_pic_1']; ?>" target="_blank" class="article-image-out">
												<span><img src="<?php echo $user['setup_pic_1']; ?>" width="128" height="128" alt="" title="" /></span>
											</a>
										</li>
									<?php endif; ?>

									<?php if ($user['setup_pic_2']): ?>
										<li>
											<a href="<?php echo $user['setup_pic_2']; ?>" target="_blank" class="article-image-out">
												<span><img src="<?php echo $user['setup_pic_2']; ?>" width="128" height="128" alt="" title="" /></span>
											</a>
										</li>
									<?php endif; ?>
								</ul>
								<div class="clear-float"></div>
							</div>
						</div>
					</div>

					<h2 id="commentaire"><span>Livre d'or</span></h2>
					<!-- BEGIN .content-padding -->
					<div class="content-padding">
						<p>Le livre d'or permet de laisser un avis sur le profil d'un joueur que vous appréciez.</p>
						<div class="comment-part">

							<!-- BEGIN #comments -->
							<ol id="comments">
								<?php foreach($comments as $comment): ?>
									<li>
										<div class="comment-inner">
											<div class="comment-avatar">
												<img src="<?= $comment['avatar']; ?>" alt="" />
											</div>
											<div class="comment-content">
												<div class="comment-header">
													<h3><a href="?page=user&view=profil&uid=<?= $comment['uid']; ?>"><?= $comment['username']; ?></a></h3>
												</div>
												<p><?= $comment['c_content']; ?></p>
												<span class="post-a"><i class="fa fa-calendar-o"></i> <?= $comment['c_date']; ?></span>
											</div>
										</div>
									</li>
								<?php endforeach; ?>
							</ol>
							<div class="comments-pager"></div>

							<?php if($_SESSION['uid']): ?>
								<div class="comment-form">
									<a href="#" name="respond"></a>
									<div id="respond" class="comment-respond">
										<h3 id="reply-title" class="comment-reply-title"> <small><a rel="nofollow" id="cancel-comment-reply-link" href="/integer-nam-varius/#respond" style="display:none;">Cancel reply</a></small></h3>
										<form action="?<?= $_SERVER['QUERY_STRING']; ?>#commentaire" method="post" id="commentform" class="comment-form">
											<p class="form-comment">
												<label for="comment">Message:<span class="required">*</span></label>
												<textarea id="comment" name="comment" type="text" aria-required="true" placeholder="Contenu du message"></textarea>
											</p>

											<p class="form-submit">
												<input type="submit" id="submit" class="button">
											</p>
										</form>
									</div><!-- #respond -->
								</div>
							<?php else: ?>
								<p>Vous devez être <a href="?page=user&view=login&name=Se%20connecter">connecté</a> pour laisser un commentaire.</p>
							<?php endif; ?>
			
						</div>

					<!-- END .content-padding -->
					</div>

				<!-- END .profile-right-side -->
				</div>

				<div class="clear-float"></div>

			<!-- END .user-profile -->
			</div>
		<?php endforeach; ?>

	</div>
	
	<div class="clear-float"></div>
	
</div>