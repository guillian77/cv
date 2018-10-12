<?php
/* Smarty version 3.1.34-dev-4, created on 2018-10-12 12:31:08
  from 'C:\wamp\www\cv\view\home\index.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-4',
  'unifunc' => 'content_5bc0940ccd8fc4_48626348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4c7dd6ebae17083e8a33b379431655d8056d72b' => 
    array (
      0 => 'C:\\wamp\\www\\cv\\view\\home\\index.php',
      1 => 1539273510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bc0940ccd8fc4_48626348 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
	<!-- PRESENTATION -->
	<div id="presentation" class="section" style="padding: 90px 0 120px;">
		<h1 class="text-center">Présentation<span>&nbsp;</span></h1>

		<div class="row" style="margin-top: 90px;">
			<div class="col-sm text-center">
				<img id="avatar" src="<?php echo '<?=';?> BASE_URL; <?php echo '?>';?>img/profile.jpg" alt="Avatar" width="230px" height="230px" />
			</div>
			<div class="col-lg margin">
				<p class="mt-4">Passionné d'informatique et autodidacte, je souhaite en apprendre toujours plus sur les nouvelles technologies.
				Mes expériences dans divers projets web m'ont beaucoup aidées à développer mes compétences.</p>
				<p>Avec une envie de savoir et de nouvelles aventures, je ne compte pas m'arrêter là !</p>
			</div>
		</div>
	</div>

	<!-- COMPETENCES -->
	<div id="competences" class="section" style="padding: 90px 0 120px;">
		<h1 class="text-center">Compétences<span>&nbsp;</span></h1>

		<div class="row text-center" style="margin-top: 90px;">
			<div class="col-sm">
			  <h4>Back-end</h4>
			  <div class="comp-icon back-end">
			    <i class="fas fa-code"></i>
			  </div>
			  <p>PHP / MySQL</p>
			  <p>POO / MVC / Frameworks</p>
			  <p>Linux Debian / CentOS / RedHat</p>
			</div>

			<div class="col-sm">
			  <h4>Front-end</h4>
			  <div class="comp-icon front-end">
			    <i class="fas fa-desktop"></i>
			  </div>
			  <p>HTML / CSS / SASS</p>
			  <p>Bootstrap</p>
			  <p>Photoshop</p>
			</div>

			<div class="col-sm">
			  <h4>Outils</h4>
			  <div class="comp-icon tools">
			    <i class="fas fa-wrench"></i>
			  </div>
			  <p>Git / Trello</p>
			  <p>Sécurité</p>
			  <p>Anglais technique</p>
			</div>
		</div>

		<div class="text-center" style="margin-top: 90px;">
			<p><small class="text-muted"><i class="fab fa-teamspeak"></i> Teamspeak server &nbsp; <i class="fas fa-terminal"></i> IPTables &nbsp; <i class="far fa-file-code"></i> Shell Scripts</small></p>
			<p><small class="text-muted">Trello <i class="fab fa-trello"></i></small></p>
		</div>
	</div>

	<!-- REALISATION -->
	<div id="realisations" class="section" style="padding: 90px 0 120px;">
		<h1 class="text-center">Réalisations<span>&nbsp;</span></h1>

		<div class="row justify-content-md-center text-center" style="margin-top: 90px;">
			<div class="col col-lg-4 real-block">
				<h2>Activ Gaming</h2>
				<a href="./demo/activgaming" class="tip" target="_blank">
					<img src="<?php echo '<?=';?> BASE_URL; <?php echo '?>';?>img/ag.jpg" class="img-fluid" alt="Activ Gaming">
					<span>Visiter le site web</span>
				</a>
				<blockquote class="blockquote">
					<p class="mb-0">Communauté Multigaming Francophone</p>
				</blockquote>
			</div>

			<div class="col col-lg-4 real-block">
				<h2>Sylvanar servers</h2>
				<a class="tip">
					<img src="<?php echo '<?=';?> BASE_URL; <?php echo '?>';?>img/sylvanar.jpg" class="img-fluid" alt="Activ Gaming">
					<span>Malheureusement, ce site n'est plus en ligne.</span>
				</a>
				<blockquote class="blockquote">
					<p class="mb-0">Serveur de jeu massivement multijoueurs</p>
				</blockquote>
			</div>

			<div class="col col-lg-4 real-block">
				<h2>Skillcomm</h2>
				<a class="tip">
					<img src="<?php echo '<?=';?> BASE_URL; <?php echo '?>';?>img/skillcomm.jpg" class="img-fluid" alt="Activ Gaming">
					<span>Malheureusement, ce site n'est plus en ligne.</span>
				</a>
				<blockquote class="blockquote">
					<p class="mb-0">Communauté Multigaming Francophone</p>
				</blockquote>
			</div>
		</div>
	</div>

	<!-- EXPERIENCE -->
	<div id="experiences" class="section" style="padding: 90px 0 120px;">
		<h1 class="text-center">Expériences<span>&nbsp;</span></h1>
		<div style="margin-top: 90px;">
			<div class="row">
				<div class="col col-lg-6 exp-desc">
					<h5 class="underline">
				  		Chef de projet sur <i>Activ Gaming</i>
					  <small class="text-muted date">2015 - 2018</small>
					</h5>
					<p><i class="small text-muted">HTML 5 - CSS3 - PHP 5 - MySQL - Composer - Teamspeak 3 server - Cron - Screen - Photoshop - Debian - Shell - IPTables </i></p>
					<p>Communauté créée afin de rassembler les joueurs dans un même lieu avec l'idée de ne pas jouer seul.</p>
					<p>Un serveur vocal permet aux membres de communiquer facilement.</p>
					<p>Un site a été mis en place pour permettre aux nouveaux joueurs de s'inscrire dans la communauté et de valider leurs droits sur le vocal via un Framework PHP.</p>
				</div>

				<div class="col col-lg-6">&nbsp;</div>
				<div class="col col-lg-6">&nbsp;</div>

				<div class="col col-lg-6 exp-desc">
					<h5 class="underline">
					  Administrateur <i>Système Contrôle Aérien Militaire</i>
					  <small class="text-muted">2015 - 2018</small>
					</h5>
					<p><i class="small text-muted">
						MySQL - RedHat - Windows Server 2008<br/>
						Liaisons MODEM - Mécanique - Electronique
					</i></p>
					<p>Administration et maintient en conditions opérationnelles du système de contrôle du traffic aérien militaire.</p>
					<p>Gestion des utilisateurs </p>
				</div>

				<div class="col col-lg-6">&nbsp;</div>
				<div class="col col-lg-6">&nbsp;</div>

				<div class="col col-lg-6 exp-desc">
					<h5 class="underline">
					  Chef de projet sur <i>Sylvanar servers</i>
					  <small class="text-muted">2013 - 2014</small>
					</h5>
					<p><i class="small text-muted">
						HTML 5 - CSS3 - PHP 5 - MySQL - Photoshop - Debian - Shell - IPTables<br/>
						C/C++ - Cmake - After Effect - Sony Vegas Pro 9 - Teamspeak 3 server - Cron - Screen
					</i></p>
					<p>Développement d'un serveur de jeu massivement multijoueurs codé en C/C++ couplé avec un site web.</p>
					<p>Le site permet l'inscription et la gestion des joueurs dans le jeu par le biai de la base de données SQL.</p>
					<p>Une boutique à été mise en place avec différents moyens de paiement pour assurer le finnancement du projet.</p>
				</div>
			</div>
		</div>
	</div>

	<!-- FORMATIONS -->
	<div id="formations" class="section" style="padding: 90px 0 120px;">
		<h1 class="text-center">Formations<span>&nbsp;</span></h1>
		<div style="margin-top: 90px;">
			<div class="row">
				<div class="col col-lg-6 exp-desc">
					<h5>
						<i class="fas fa-graduation-cap"></i>
					  	Technicien communication, navigation et surveillance
					  	<small class="text-muted">2014 - 2015</small>
					</h5>
					<p><i>-- Ecole de formation des sous-officiers de l'armée de l'air --</i></p>
					<p>Dépannage des équipements radio sol-sol et sol-air, des radars de détection, d’approche et d’atterrissage, et des calculateurs informatiques contribuant au contrôle aérien militaire, à la surveillance aérienne du territoire, et à la défense sol-air.</p>
				</div>

				<div class="col col-lg-6">&nbsp;</div>
				<div class="col col-lg-6">&nbsp;</div>

				<div class="col col-lg-6 exp-desc">
					<h5>
						<i class="fas fa-graduation-cap"></i>
					  	Formation militaire initiale
					  	<small class="text-muted">2014</small>
					</h5>
					<p><i>-- Ecole de formation des sous-officiers de l'armée de l'air --</i></p>
					<p>&nbsp;</p>
				</div>

				<div class="col col-lg-6">&nbsp;</div>
				<div class="col col-lg-6">&nbsp;</div>

				<div class="col col-lg-6 exp-desc">
					<h5>
						<i class="fas fa-graduation-cap"></i>
					  	Bachelor STI2D - SIN
					  	<small class="text-muted">2014</small>
					</h5>
					<p><i>-- Lycée Gaston Bachelard - Chelles --</i></p>
					<p>Sciences et technologies de l'industrie et du développement durable spécialité systèmes d'informations et numériques.</p>
				</div>
			</div>
		</div>
	</div>

	<div id="motivations" class="section" style="">
		<h1 class="text-center">Motivations<span>&nbsp;</span></h1>
		<div style="margin-top: 90px;">
			<div class="row">
				<p class="col col-lg-6">
					<i class="far fa-circle"></i>
					Particulièrement curieux et volontaire, je m'intéresse à tout ce qui touche les nouvelles technologies, l'électronique, la mécanique afin d'approfondir et renouveler mes connaissances.
				</p>

				<p class="col col-lg-6"><i class="far fa-circle"></i> Motivé et autonome, je me donne les moyens d'aller plus loin dans mes passions. Cependant, j'apprécie le travail en équipe et la mutualisation des expériences au service d'un projet commun.</p>

				<p class="col col-lg-6"><i class="far fa-circle"></i> Attentif et minutieux dans ce que j'entreprends, j'ai toujours pour objectif de finaliser dans le détail mes créations et réalisations afin d'être au plus prêt des besoins de l'entreprise.</p>

				<p class="col col-lg-6"><i class="far fa-circle"></i> Je suis performant grâce à mon expérience au sein de l'armée de l'air, avec pour habitude de travailler sous la pression dans le respecter des délais obligatoires de rendement et des dangers due à l'aéronautique et de la sécurité des vols.</p>

				<p class="col col-lg-6"><i class="far fa-circle"></i> Ces deux expériences passées ont considérablement renforcé ma rigueur dans le travail et ma conscience professionnelle sans nuire à ma créativité.</p>
			</div>
		</div>
	</div>
</div><?php }
}
